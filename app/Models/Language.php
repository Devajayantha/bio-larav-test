<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /** {@inheritDoc} */
    protected $fillable = ['name', 'code'];

    /** {@inheritdoc} */
    public $timestamps = false;
}
