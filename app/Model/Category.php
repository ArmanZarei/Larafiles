<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function files()
    {
        return $this->morphedByMany(File::class,'categorizable');
    }

    public function packages()
    {
        return $this->morphedByMany(Package::class, 'categorizable');
    }
}
