<?php

namespace blog\blogsystem;
use App\Http\Controllers\Controller;

use blog\blogsystem\Models\Blogcategory;
use blog\blogsystem\Models\Post;
use Illuminate\Http\Request;
use langs\langssystem\Models\LangFields;
class BlogController extends Controller
{

    public function index()
    {

        $posts = Post::paginate(10);

        $blogcategories = Blogcategory::where('special', 1)->get()->take(3);

        return view('blog::front.index', compact('posts', 'blogcategories'));
    }

   public function url(Request $request, $blogcategoryuri, ...$suburis)
    {
        // if came an array of parameters, we will deal with the last parameter, because lang_fields table has a unique uri for all table
        if ($suburis) {

            $suburis = array_flatten($suburis);

            $total = count($suburis);

            $indextotal = $total - 1;

            if ((env('LANGS') == true)) {
                //we look for uri (unique) in all lang_fields table
                $id = LangFields::where('uri', '=', $suburis[$indextotal])->first();

                if (isset($id)) {
                    // if isset uri and is a blogcategory langstable type we will return the views and variables for this entity:blogcategory
                    if ($id['langstable_type'] == 'blog\blogsystem\Models\Blogcategory') {

                        return $this->blogcategoryresult($id['langstable_id']);

                        // if it isset uri and is a post langstable type we will return the views and variables for this entity:post
                    } elseif ($id['langstable_type'] == 'blog\blogsystem\Models\Post') {

                        return $this->postresult($id['langstable_id']);

                        //if langstable type is not blogcategory or post , probably we are wrong routed
                    } else {

                        return 404;

                    }
                    // if not isset this last uri on lang_fields, we have to looking for this last parameter directly on tables of posts and blogcategories
                } else {

                    // first:look for this uri in post table and if is a post, return post view
                    $post = $this->lookforuriinposttable($suburis[$indextotal]); //give me the id from the table, looking between uris
                    if (isset($post)) {
                        return $this->postresult($post);

                    }
                    // if is not in post uri table, find in blogcategories table and return blogcategory view
                    else {

                        $blogcategory = $this->lookforuriinblogcategorytable($suburis[$indextotal]); //give me the id from the table, looking between uris
                        return $this->blogcategoryresult($blogcategory);

                    }

                }

            } else {
                $idpost = Post::where('uri', '=', $suburis[$indextotal])->value('id');
                if (isset($idpost)) {
                    return $this->postresult($idpost);

                } else {
                    $idblogcategory = Blogcategory::where('uri', '=', $suburis[$indextotal])->value('id');

                    return $this->blogcategoryresult($idblogcategory);
                }
            }
            // if only came $blogcategoryuri,necessary parameter
        } else {

            if ((env('LANGS') == true)) {

                $id = LangFields::where('uri', '=', $blogcategoryuri)->where('langstable_type', '=', 'blog\blogsystem\Models\Blogcategory')->first();

                // if isset a uri (unique) just for this field translating in langs field
                if (isset($id)) {

                    return $this->blogcategoryresult($id['langstable_id']);

                    // if not isset a translatable uri, we will find in the blogcategory table
                } else {
                    $blogcategory = $this->lookforuriinblogcategorytable($blogcategoryuri);
                    return $this->blogcategoryresult($blogcategory);
                }
                // if langs is not active we find directly in blogcategory table
            } else {

                $blogcategory = $this->lookforuriinblogcategorytable($blogcategoryuri);
                return $this->blogcategoryresult($blogcategory);

            }

        }

    }

    public function lookforuriinposttable($uri)
    {
        $post = Post::where('uri', '=', $uri)->first();
        return $post['id'];
    }

    public function lookforuriinblogcategorytable($uri)
    {
        $blogcategory = Blogcategory::where('uri', '=', $uri)->first();
        return $blogcategory['id'];

    }

    public function blogcategoryresult($idblogcategory)
    {

        $blogcategories = Blogcategory::all();

        $blogcategory = Blogcategory::find($idblogcategory);

        $posts = Post::where('blogcategory_id', '=', $blogcategory['id'])->paginate(10);


        return view('blog::front.index', compact('blogcategory', 'posts','blogcategories'));
    }

    public function postresult($idpost)
    {

        $post = Post::find($idpost);

        $blogcategory = Blogcategory::find($post['blogcategory_id']);

        if (env('LANGS') == true) {
            if ($post) {
                $post->langstable();
            }

        }

        return view('blog::front.posts.show', compact('blogcategory', 'post'));
    }



}
