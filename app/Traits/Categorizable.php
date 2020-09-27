<?php

namespace App\Traits;


use App\Model\Category;

trait Categorizable
{
    public function categories()
    {
        return $this->morphToMany(Category::class,'categorizable');
    }
}