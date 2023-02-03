<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [

        'value_eng' => 'array',
        'value_hindi' => 'array',
        'attr_id' => 'array',
    ];



    public function attributes(){

        return $this->belongsTo(Attribute::class, 'attribute_id', 'id');
    }

    public function products(){

        return $this->belongsToMany(Product::class, 'attribute_product')->withTimestamps();
    }
}
