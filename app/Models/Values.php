<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Values extends Model
{

    protected $table = 'currency_value';

    protected $fillable = [
        'date',
        'value',
    ];
}
