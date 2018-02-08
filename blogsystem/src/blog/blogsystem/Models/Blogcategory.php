<?php


namespace blog\blogsystem\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Schema;
use App\Helpers\CustomHelper;
use langs\langssystem\Models\Lang;
class Blogcategory extends Model
{
    protected $table = 'blogcategories';
    protected $fillable = [
        'name',
        'description',
        'uri',
        'parent_id',
        'order',
        'special',
        'menu'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'parent_id' => 'integer',
        'order' => 'integer',
        'menu' => 'boolean'
    ];

    public function langstable()
    {
        if (env('LANGS') == true) {

            $lang = new Lang();
            $lang = $lang->getLang();
            return $this->morphOne('langs\langssystem\Models\LangFields', 'langstable')->where('id_lang', $lang);
        }
    }

    public function langstab()
    {
        if (env('LANGS') == true) {

            return $this->morphMany('langs\langssystem\Models\LangFields', 'langstable');
        }
    }

    
    public function fields()
    {
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

    public static function translatablefields()
    {
        $blogcategory = New BlogCategory();
        $lang_fields        = DB::connection()->getSchemaBuilder()->getColumnListing('lang_fields');
        $translatablefields = array_intersect($lang_fields, $blogcategory->fillable);

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
    public function photos() {
        return $this->morphMany('App\Models\Photo','photostable')->orderBy('order');
    }

    
    public function defaultPhoto() {
        return $this->morphOne('App\Models\Photo','photostable')->where('default', true);
    }


    public function posts() {
        
        return $this->hasMany('blog\blogsystem\Models\Post','blogcategory_id', 'id');
    }


    public function children(){
        return $this->hasMany('blog\blogsystem\Models\BlogCategory', 'parent_id');
    }


    public function parent(){
        return $this->belongsTo('blog\blogsystem\Models\BlogCategory', 'parent_id');
    }


    public static function allPosts($blogcategory, $posts = null) {
        if ($posts === null) {
            $posts = collect();
        }

        $posts = $posts->merge($blogcategory->posts);

        $blogcategory->children->each(function($child) use(&$posts) {
            $posts = self::allPosts($child, $posts);
        });

        $posts = $posts->sortBy('order');

        return $posts;
    }
}