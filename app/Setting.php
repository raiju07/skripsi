<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = "setting";
    protected $guarded = [];
    public $timestamps = false;
}
