<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

use App\Models\Article;

class Tema extends Model
{
    use HasFactory, Translatable;

    protected $table = 'tema';
    protected $fillable = array();
    protected $translatable = ['name'];

    public function article()
    {
      return $this->hasMany(Article::class)->with(['translations']);
    }
}
