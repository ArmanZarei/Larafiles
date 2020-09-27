<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $guarded = ['id'];

    protected $dates = [
        'expires_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
