<?php

namespace App\Models;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use Translatable;
    protected $translatable = ['first_content', 'second_content'];   
}
