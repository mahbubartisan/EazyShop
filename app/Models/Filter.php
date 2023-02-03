<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function filterValue(){

        return $this->hasMany(FilterValue::class, 'filter_id');
    }
   

    public static function filterAvailable($filter_id, $category_id)
    {
        $filterAvailable = Filter::select('cat_ids')
                         ->where('id', $filter_id)
                         ->first()
                         ->toArray();

        $catIDArr = explode(',' , $filterAvailable['cat_ids']);

       
        if ((in_array($category_id, $catIDArr))) {
            $available = 'Yes';
        } else {
            $available = 'No';
        }
        
        return $available;
        // echo"<pre>"; print_r($filterAvailable); die;
    }
    
}
