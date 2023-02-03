<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function tags(){

        return $this->hasMany(Tag::class);
    }

    public function categories(){

        return $this->hasMany(Category::class, 'type_id')->where('parent_id', NULL)->with('subCategories');
    }
}
