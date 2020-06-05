<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	//creating hasmany relation
    public function categories(){
    	return $this->hasmany('App\Category','parent_id');
    }
}
