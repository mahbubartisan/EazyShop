<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function attributevalue(){

        return $this->belongsToMany(AttributeValue::class, 'attribute_product', 'product_id', 'attr_value_id')
        ->withTimestamps();
    }

    public function tags(){

        return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id')->withTimestamps();
    }

    public function multiImages(){

        return $this->hasMany(MultiImage::class, 'product_id', 'id');
    }

    public function categories(){

        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function brand(){

        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    
    public function filter(){

        return $this->hasMany(Filter::class);
    }
   
}
