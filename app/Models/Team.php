<?php

namespace App\Models;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use Translatable;
    protected $translatable = ['name', 'position'];
}
