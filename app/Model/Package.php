<?php

namespace App\Model;

use App\Traits\Categorizable;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use Categorizable;

    protected $guarded = ['id'];

    public function files()
    {
        return $this->belongsToMany(File::class,'package_file','package_id','file_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'user_package')->withPivot(['amount' , 'created_at']);
    }
}
