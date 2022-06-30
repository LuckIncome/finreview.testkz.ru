<?php

namespace App\Models;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use Translatable;
    protected $translatable = ['translate_value'];
}
