<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

use App\Models\Article;

class ArticleCategory extends Model
{
    use HasFactory, Translatable;

    protected $table = 'article_category';
    protected $fillable = array();

    protected $translatable = ['name', 'seo_title', 'meta_description', 'meta_keywords',];

    public function article()
	{
	  return $this->hasMany(Article::class)->with(['translations']);
	}

    public function latestArticle()
    {
      return $this->hasMany(Article::class)->latest();
    }
}
