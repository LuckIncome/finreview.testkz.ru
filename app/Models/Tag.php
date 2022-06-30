<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

use App\Models\Article;

class Tag extends Model
{
    use HasFactory, Translatable;

    protected $table = 'tag';

    protected $translatable = ['name', 'seo_title', 'meta_description', 'meta_keywords',];

    public function article()
    {
        return $this->belongsToMany(Article::class)->with(['translations']);
    }

}
