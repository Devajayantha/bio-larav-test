<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdviceTranslation extends Model
{
    /**
     * {@inheritdoc}
     */
    public $timestamps = false;

    /**
     * {@inheritdoc}
     */
    protected $fillable = ['name', 'information', 'actual_tip', 'tip_example', 'locale'];
}
