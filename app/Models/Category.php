<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug','description','status','photo'];

    public function books(){
        return $this->hasMany('App\Models\Book','category_id','id');
    }
}
