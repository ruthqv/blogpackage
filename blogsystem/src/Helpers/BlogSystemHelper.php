<?php

namespace blog\blogsystem\Helpers;

use blog\blogsystem\Models\Blogcategory;
use blog\blogsystem\Models\Post;

class BlogSystemHelper
{
    public static function geturiarrayparameters($entity, $id)
    {

        $blogcategory = Blogcategory::find($id);

        if (!$blogcategory['parent_id'] == 0) {

            $uri[] = self::geturiarrayparameters('blog\blogsystem\Models\BlogCategory', $blogcategory['parent_id']);

            $uri[] = self::geturi($blogcategory);

        } else {

            $uri[] = self::geturi($blogcategory);

        }
        $uri = array_flatten($uri);

        return $uri;
    }

    public static function geturi($blogcategory)
    {
        if ($blogcategory) {
            if (env('LANGS') == true) {
                $langtranslateuri = $blogcategory->langstable()->first();

            }

            if (isset($langtranslateuri) && isset($langtranslateuri['uri']) && !is_null($langtranslateuri['uri'])) {

                return $langtranslateuri['uri'];

            } else {
                return $blogcategory['uri'];
            }

        }

    }

    public static function geturipostarrayparameters($entity, $id)
    {

        // posts, posts

        $postid = Post::find($id);

        $posturi = self::geturipost($postid);

        $postblogcategory = $postid->blogcategory()->first();

        $uri = self::geturiarrayparameters('blog\blogsystem\Models\BlogCategory', $postblogcategory['id']);

        $uri[] = $posturi;

        $uri = array_flatten($uri);

        return $uri;

    }

    public static function geturipost($post)
    {
        if (env('LANGS') == true) {

            $langtranslateuri = $post->langstable()->first();
        }
        if (isset($langtranslateuri['uri'])) {

            return $langtranslateuri['uri'];

        } else {
            return $post['uri'];
        }
    }

}
