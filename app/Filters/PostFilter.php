<?php

namespace App\Filters;

class PostFilter extends QueryFilter
{
    public function cat_id($id=null)
    {
        return $this->builder->when($id, function($query) use($id){
            $query->where('cat_id', $id);
        });

    }
    public function search_field($search_string = ''){
    return $this->builder
        ->where('cat_id', 'LIKE', '%' . $search_string . '%')
        ->orWhere('price', '<=',  $search_string);

    }
}
