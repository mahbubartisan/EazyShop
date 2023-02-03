<?php

namespace App\Models;

use App\Models\Type;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category as ModelsCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function parents(){

        return $this->belongsTo(Category::class, 'parent_id');
    }
    
    public function subCategories(){

        return $this->hasMany(Category::class, 'parent_id');
    }

    public function types(){

        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function products(){

        return $this->hasMany(Product::class);
    }

    public static function getCategoryName($category_id){

        $getCategoryName = Category::select('category_name_eng')->where('id', $category_id)->first();

        return $getCategoryName->category_name_eng;
    }

}
