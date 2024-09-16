<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    use Translatable;

    /**
     * {@inheritdoc}
     */
    protected $fillable = ['prev_migrate_id'];

    public $translatedAttributes = ['name', 'information', 'actual_tip', 'tip_example', 'locale'];

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'prev_migrate_id' => 'integer',
    ];
}
