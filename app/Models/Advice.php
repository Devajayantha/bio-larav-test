<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    use Translatable;

    protected $fillable = ['prev_migrate_id'];

    public $translatedAttributes = ['name', 'information', 'actual_tip', 'tip_example', 'locale'];
}
