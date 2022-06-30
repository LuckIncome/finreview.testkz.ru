<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use TCG\Voyager\Traits\Translatable;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;

use App\Models\ArticleCategory;
use App\Models\Tag;
use App\Models\Tema;

class Article extends Model
{
    use HasFactory, Translatable, SearchableTrait;

    protected $table = 'article';
    protected $fillable = array();

    protected $translatable = [
    	'author', 
    	'title', 
    	'subtitle', 
    	'excerpt',
    	'content',
    	'seo_title', 
    	'meta_description', 
    	'meta_keywords',
    ];

    protected $searchable = [
        'columns' => [
            'title' => 10,
            'content' => 10,
        ],
    ];


    public function article_category()
	{
	  return $this->belongsTo(ArticleCategory::class)->with(['translations']);
	}

    public function tag()
    {
        return $this->belongsToMany(Tag::class)->with(['translations']);
    }

    public function tema()
    {
      return $this->belongsTo(Tema::class);
    }

    public function cat()
    {
        $categories = $this->article_category()->whereNotIn('slug', ['ratings', 'opinions']);
        return $categories;
    }
}
