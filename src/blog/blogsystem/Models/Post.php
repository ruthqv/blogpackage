<?php


namespace blog\blogsystem\Models;

use App\Helpers\CustomHelper;
use blog\blogsystem\Models\Blogcategory;
use DB;
use Illuminate\Database\Eloquent\Model;
use Schema;
use langs\langssystem\Models\Lang;
class Post extends Model
{

    protected $fillable = [
        'name',
        'uri',
        'description',
        'user_id',
        'blogcategory_id',
        'special',
        'new',
        'order',
        'meta_name',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
    public function langstable()
    {   
        $lang= new Lang();
        $lang= $lang->getLang();
        return $this->morphOne('langs\langssystem\Models\LangFields', 'langstable')->where('id_lang', $lang);
    }

    public function langstab()
    {
        return $this->morphMany('langs\langssystem\Models\LangFields','langstable');
    }
    public function fields()
    {

        if(env('LANGS') == true) {

            foreach ($this->fillable as $field) {
                $column   = DB::connection()->getDoctrineColumn($this->table, $field);
                $fields[] = [
                    'name'       => $field,
                    'lenght'     => $column->getLength(),
                    'type'       => Schema::getColumnType($this->table, $field),
                    'values'     => CustomHelper::getEnumValues($this->table, $field),
                    'default'    => $column->getDefault(),
                    'nonullable' => $column->getNotnull(),

                ];
            }

            return $fields;
        }
    }

    public static function translatablefields()
    {
        if (env('LANGS') == true) {
            $post            = new Post();
            $lang_fields        = DB::connection()->getSchemaBuilder()->getColumnListing('lang_fields');
            $translatablefields = array_intersect($lang_fields, $post->fillable);

            foreach ($translatablefields as $field) {
                $column   = DB::connection()->getDoctrineColumn('lang_fields', $field);
                $fields[] = [
                    'name'       => $field,
                    'lenght'     => $column->getLength(),
                    'type'       => Schema::getColumnType('lang_fields', $field),
                    'values'     => CustomHelper::getEnumValues('lang_fields', $field),
                    'default'    => $column->getDefault(),
                    'nonullable' => $column->getNotnull(),

                ];
            }
            return $fields;

        }

    }

    public function relatedposts($id)
    {
        $post = $id;

        $blogcategory = $this->blogcategory()->first();

        return $blogcategory->posts()->where('id', '!=', $id)->get();

    }

    public function comments()
    {
        return $this->morphMany('comments\commentssystem\Models\Comment', 'commentstable')->where('approved', 1);
    }    

    public function author()
    {
        return $this->hasOne('App\Models\User', 'id','user_id');
    }    
    public function photos()
    {
        return $this->morphMany('App\Models\Photo', 'photostable')->orderBy('order');
    }

    public function defaultPhoto()
    {
        return $this->morphOne('App\Models\Photo', 'photostable')->where('default', true);
    }

    public function blogcategory()
    {
        return $this->belongsTo('blog\blogsystem\Models\Blogcategory');
    }



}
