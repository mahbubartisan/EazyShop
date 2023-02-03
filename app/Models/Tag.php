<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function types(){

        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function products(){

        return $this->belongsToMany(Product::class, 'product_tag', 'product_id', 'tag_id')->withTimestamps();
    }

}
