<?php

namespace blog\blogsystem;

use App\Helpers\CustomHelper;
use App\Http\Controllers\Controller;
use blog\blogsystem\Models\Blogcategory;
use langs\langssystem\Models\Lang;
use Illuminate\Http\Request;
use App\Models\Photo;

class BlogcategoriesController extends Controller
{

    public $morphtables_type = 'blog\blogsystem\Models\Blogcategory';

    public $class = 'Blogcategory';

    public function store(Request $request)
    {
        $data = $request->all();

        
        if ((env('LANGS') == true)) {

            $langs = Lang::getLangsCountdos();

            foreach ($langs as $key => $value) {
                    $this->validate($request, [
                        'uri'.$value['id']        => 'alpha_dash',

                    ]);
             }
         }
        // Validation
        $this->validate($request, [
            'name'        => 'required|min:2|max:45|unique:blogcategories',
            'description' => 'required|min:2|max:255',
            'uri'         => 'required|min:2|max:45|alpha_dash|unique:blogcategories',
        ]);

        if ($data['parent_id'] == 0) {
            unset($data['parent_id']);
        }

        $createdBlogategory = Blogategory::create($data);
        // If Product record is created we begin store photos and languages fields

        // If Product record is created we begin store photos and languages fields
        if ($createdBlogategory) {
            if ((env('LANGS') == true)) {
                $idlangstable = $createdBlogategory['id'];

                $langs = Lang::getLangsCountdos();

                foreach ($langs as $id_lang) {
                    foreach ($data['lang'] as $field => $value) {

                        $array[$field] = $value[$id_lang['id_lang']];

                    }

                    $langobject = new Lang;
                    $id_lang    = $id_lang['id_lang'];

                    $insertdata = $langobject->insertDatas($this->morphtables_type, $idlangstable, $id_lang, $array);

                }
            }

            // Photos - Upload new photos
            if ($request->hasFile('photos')) {

                $files = $request->file('photos');

                $upload = CustomHelper::uploadphotos($createdBlogategory['id'], $this->morphtables_type, $files, 'blogcategories');
            }

            cache()->flush();

            return redirect(route('admin.blog.blogcategories.show', $createdBlogategory['id']))->with('alert-success', 'The blogcategories has been added successfully.');
        }
    }


    public function update(Request $request, $blogcategory)
    {
        $blogcategory = Blogcategory::find($blogcategory);
        $photosData = [
            'photos_default' => $request->input('photos_default'),
            'photos_remove'  => $request->input('photos_remove'),
        ];
        $data = $request->all();

        // Validation
        $this->validate($request, [
            'name'        => 'required|min:2|max:45|unique:blogcategories,name,' . $blogcategory['id'],
            'description' => 'required|min:2|max:255,' . $blogcategory['id'],
            'uri'         => 'required|min:2|max:45|alpha_dash|unique:blogcategories,uri,' . $blogcategory['id'],
        ]);

        if ($data['parent_id'] == $blogcategory['id']) {
            return back()->with('alert-danger', 'The blogcategory cannot be under itself.');
        }

        // Sanitizing data
        $data['menu']    = isset($data['menu']);
        $data['special'] = isset($data['special']);

        $updatephotos = CustomHelper::updatephotos($blogcategory['id'], $this->morphtables_type, $photosData, 'blogcategory');

        // Photos - Upload new photos
        if ($request->hasFile('photos')) {

            $files = $request->file('photos');

            $upload = CustomHelper::uploadphotos($blogcategory['id'], $this->morphtables_type, $files, 'blogcategory');

        }

        foreach ([
            'name',
            'description',
            'uri',
            'parent_id',
            'order',
            'menu',
            'special',
        ] as $field) {
            if ($data[$field] != $blogcategory->{$field}) {
                $blogcategory->{$field} = $data[$field];
            }
        }

        if ((env('LANGS') == false)) {

            $blogcategory->save();
            cache()->flush();

            return redirect(route('admin.blog.blogcategories.show', $blogcategory['id']))->with('alert-success', 'The blogcategory has been updated successfully.');

        }

        // Initiate Langsupdate
        if ((env('LANGS') == true)) {

            $blogcategory->save();

            $idlangstable = $blogcategory['id'];

            $langs = Lang::getLangsCountdos();

            $array = array();

            foreach ($data['lang'] as $field => $value) {
                foreach ($langs as $id_lang) {
                    $array = array(
                        $field => $value[$id_lang['id_lang']],
                    );

                    $id_lang    = $id_lang['id_lang'];
                    $langobject = new Lang;
                    $checkid    = $langobject->checkid($this->morphtables_type, $idlangstable, $id_lang, $array);
                    $insertdata = $langobject->updateDatas($this->morphtables_type, $idlangstable, $id_lang, $array);
                }
            }
            cache()->flush();

            return redirect(route('admin.blog.blogcategories.show', $blogcategory['id']))->with('alert-success', 'The blogcategory has been updated successfully.');

        }

    }

    public function destroy($blogcategory)
    {
        $blogcategory = Blogcategory::find($blogcategory);

        // The Blogategory must not have any associated Products to be deleted
        if ($blogcategory->posts() && $blogcategory->posts()->count() > 0) {
            return back()->with('alert-danger', 'This blogcategory cannot be removed because there are currently ' . $blogcategory->posts()->count() . ' posts associated with it. Please remove the posts first.');
        } elseif ($blogcategory->children() && $blogcategory->children()->count() > 0) {
            return back()->with('alert-danger', 'This blogcategory cannot be removed because there are currently ' . $blogcategory->children()->count() . ' sub-blogcategories associated with it. Please remove the posts first.');
        } else {
            if ($blogcategory->photos()) {
                CustomHelper::removephotosfromfolder($blogcategory->photos()->get(), 'blogcategory');

                $photo = Photo::where('photostable_id', '=', $blogcategory['id'])->where('photostable_type', '=', $this->morphtables_type)->delete();

            }

            if ((env('LANGS') == false)) {

                $blogcategory->delete();

            }

            if ((env('LANGS') == true)) {

                $blogcategory->delete();
                $langobject = new Lang;
                $insertdata = $langobject->deleteDatas($this->morphtables_type, $blogcategory['id']);
            }

            cache()->forget('blogcategories');

            return redirect(route('admin.blog.blogcategories.index'))->with('alert-success', 'The blogcategory has been removed successfully.');
            }
        }
}
