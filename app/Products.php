<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function attributes(){
    	return $this->hasmany('App\ProductsAttributes','product_id');
    }
}
