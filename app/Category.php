<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subcategory(){
        return $this->hasMany(self::class, 'parent_id');
    }
}
