<?php

namespace blog\blogsystem;

use blog\blogsystem\Helpers\BlogSystemHelper;
use App\Http\Controllers\Controller;
use App\Models\Photo;
use blog\blogsystem\Models\Post;
use File;
use Illuminate\Http\Request;
use langs\langssystem\Models\Lang;

class PostsController extends Controller
{

    public $morphtables_type = 'blog\blogsystem\Models\Post';

    public $class = 'Post';

    public function store(Request $request)
    {

        $data = $request->all();

        // Validation
        $this->validate($request, [
            'name'        => 'required|min:2|max:45|unique:posts',
            'description' => 'required|min:2',
            'uri'         => 'required|min:2|max:45|alpha_dash|unique:posts',
            'order'       => 'required|numeric',
        ]);

        // Sanitize input data
        $data['special'] = isset($data['special']) && $data['special'] == 'on';

        $data['new'] = isset($data['new']) && $data['new'] == 'on';

        $createdPost = Post::create($data);

        // If Post record is created we begin store photos and languages fields
        if ($createdPost) {
            if ((env('LANGS') == true)) {
                $idlangstable = $createdPost['id'];

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

                $upload =blog\blogsystem\Helpers\BlogSystemHelper::uploadphotos($createdPost['id'], $this->morphtables_type, $files, 'posts');
            }

            cache()->flush();

            return redirect(route('admin.blog.posts.show', $createdPost['id']))->with('alert-success', 'The post has been added successfully.');
        }
    }

    public function update(Request $request, $post)
    {
        $post = Post::find($post);

        $photosData = [
            'photos_default' => $request->input('photos_default'),
            'photos_remove'  => $request->input('photos_remove'),
        ];

        $data = $request->all();
        // Validation
        $this->validate($request, [
            'name'        => 'required|min:2|max:45|unique:posts,name,' . $post['id'],
            'description' => 'required|min:2|max:255,' . $post['id'],
            'uri'         => 'required|min:2|max:45|alpha_dash|unique:posts,uri,' . $post['id'],

        ]);

        // Sanitize input data
        $data['special'] = isset($data['special']) && $data['special'] == 'on';
        $data['new']     = isset($data['new']) && $data['new'] == 'on';

        $updatephotos =blog\blogsystem\Helpers\BlogSystemHelper::updatephotos($post['id'], $this->morphtables_type, $photosData, 'posts');
        // Photos - Upload new photos
        if ($request->hasFile('photos')) {
            $files  = $request->file('photos');
            $upload =blog\blogsystem\Helpers\BlogSystemHelper::uploadphotos($post['id'], $this->morphtables_type, $files, 'posts');
        }

        $productarray = ['name', 'uri', 'description', 'blogcategory_id', 'special', 'new', 'order'];

        foreach ($productarray as $field) {
            if ($data[$field] != $post->{$field}) {
                $post->{$field} = $data[$field];
            }
        }

        if ((env('LANGS') == false)) {

            $post->save();
            cache()->flush();
            return redirect(route('admin.blog.posts.show', $post['id']))->with('alert-success', 'The post has been updated successfully.');

        }

        // Initiate Langsupdate
        if ((env('LANGS') == true)) {

            $post->save();

            $idlangstable = $post['id'];

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

            return redirect(route('admin.blog.posts.show', $post['id']))->with('alert-success', 'The post has been updated successfully.');

        }

    }

    public function destroy($post)
    {
        $post = Post::find($post);


        if ($post->photos()) {
           blog\blogsystem\Helpers\BlogSystemHelper::removephotosfromfolder($post->photos()->get(), 'posts');

            $photo = Photo::where('photostable_id', '=', $post['id'])->where('photostable_type', '=', $this->morphtables_type)->delete();

        }

        if ((env('LANGS') == false)) {

            $post->delete();

        }

        if ((env('LANGS') == true)) {

            $post->delete();
            $langobject = new Lang;
            $deletedata = $langobject->deleteDatas($this->morphtables_type, $post['id']);
        }

        return redirect(route('admin.blog.posts.index'))->with('alert-success', 'The post has been removed successfully.');

    }

}
