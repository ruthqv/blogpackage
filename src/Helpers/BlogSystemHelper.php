<?php

namespace blog\blogsystem\Helpers;

use blog\blogsystem\Models\Blogcategory;
use blog\blogsystem\Models\Post;
use blog\blogsystem\Models\Photo;
use Storage;
use Validator;
use DB;
class BlogSystemHelper
{


    public static function getEnumValues($table, $column)
    {
        $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        if (!empty($enum)) {
            foreach (explode(',', $matches[1]) as $value) {
                $v    = trim($value, "'");
                $enum = array_add($enum, $v, $v);
            }

            return $enum;
        } else {
            return null;
        }

    }


    public static function cleanuri($string) //función para limpiar strings

    {

        $string = trim($string);

        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C'),
            $string
        );

        $vars = array(".", "¨", "º", "~",
            "#", "@", "|", "!",
            "·", "(", ")", "?", "'", "¡",
            "¿", "[", "^", "<code>", "]",
            "+", "}", "{", "¨", "´",
            ">", "< ", ";", ",", ":",
            ".", " ", "$", "%", "&", "/");
        //Esta parte se encarga de eliminar cualquier caracter extraño
        $string = str_replace($vars, '', $string);

        return $string;

    }

    public static function gettranslatefield($entity, $field, $id)
    {

        $langfield = $entity::find($id);

        if (isset($langfield)) {

            $chain = $langfield['' . $field . ''];

            if (env('LANGS') == true) {

                $tablelangfield = $langfield->langstable()->first();

                $fieldinlangstables = $tablelangfield['' . $field . ''];
            }

            if (isset($fieldinlangstables) && $fieldinlangstables !== '' && $fieldinlangstables !== null) {

                $chain = $fieldinlangstables;
            }
            if (isset($chain)) {

                return $chain;

            } else {
                return null;
            }

        }
    }
    public static function wordlimit($string, $length = 50, $ellipsis = "...")
    {
        $words = explode(' ', $string);
        if (count($words) > $length) {
            return implode(' ', array_slice($words, 0, $length)) . " " . $ellipsis;
        } else {
            return $string;
        }
    }
    public static function uploadphotos($id, $morphtype, $photosData, $folder)
    {
        // Initiate Storage
        $storelocal = Storage::disk('local');

        // For each photo uploaded
        foreach ($photosData as $index => $file) {
            // Validating each file
            $validator = Validator::make(['file' => $file], ['file' => 'mimes:jpeg,png']);

            if ($validator->passes()) {
                $extension = $file->getClientOriginalName();
                $fileName  = $file->getClientOriginalName();

                // $img = Image::make($file)->resize(100, 100);
                $exists = $storelocal->exists('photos/' . $folder . '/' . $fileName);

                if (!empty($exists)) {
                    redirect()->back()->with('alert-warning', 'In the storage exists other file with same name. We recommend change the name of the image to be load. If not, you will erase this image in all' . $folder . ' images called equal');
                }

                // Upload photo to storelocal
                $storelocal->put('photos/' . $folder . '/' . $fileName, file_get_contents($file), 'public');

                // Create the Photo record
                $photo = [
                    'name'             => $file->getClientOriginalName(),
                    'original_name'    => $file->getClientOriginalName(),
                    'photostable_id'   => $id,
                    'photostable_type' => $morphtype,
                ];

                // Set the first uploaded photo as default
                if ($index == 0) {
                    $photo['default'] = true;
                }

                Photo::create($photo);
            } else {
                // Redirect back with errors.
                return back()->withErrors($validator);
            }
        }
    }

    public static function updatephotos($id, $morphtype, $photosData, $folder)
    {

        $photos = Photo::where('photostable_id', $id)->where('photostable_type', $morphtype)->get();

        // Initiate Storage
        $storelocal = Storage::disk('local');

        // Photos - Update new default
        if (!empty($photosData['photos_default'])) {
            Photo::where('photostable_id', $id)->where('photostable_type', $morphtype)
                ->update(['default' => false]); // Set the current default photo to not default

            Photo::where('id', $photosData['photos_default'])
                ->update(['default' => true]); // Set the new default photo
        }

        if (!empty($photosData['photos_remove'])) {
            foreach ($photosData['photos_remove'] as $photoRemoveId) {
                foreach ($photos as $photo) {
                    if ($photo['id'] == $photoRemoveId) {

                        Photo::find($photo['id'])->delete();
                        $fileName = $photo['original_name'];
                        $storelocal->delete('photos/' . $folder . '/' . $fileName, 'public');
                    }
                }
            }
        }

    }

    public static function removephotosfromfolder($photos, $folder)
    {
        $storelocal = Storage::disk('local');

        foreach ($photos as $photo) {
            $fileName = $photo['original_name'];
            $storelocal->delete('photos/' . $folder . '/' . $fileName, 'public');
        }
    }
    public static function generateJson($path, $array)
    {

        $jsonencoded = json_encode($array, JSON_UNESCAPED_UNICODE);

        $fh = fopen($path, 'w');

        fwrite($fh, $jsonencoded);
        fclose($fh);

    }



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
