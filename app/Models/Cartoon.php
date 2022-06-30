<?php

namespace App\Models;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class Cartoon extends Model
{
    use Translatable, Resizable;
    protected $translatable = ['name'];
    
    public function getThumbicAttribute()
    {
        return $this->thumbnail('cropped', 'image');
    }
}
