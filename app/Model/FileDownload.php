<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FileDownload extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    protected $dates = ['date'];
}
