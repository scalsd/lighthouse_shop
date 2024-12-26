<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['id','title','slug','author_id','series_id','category_id','publishing_house_id',
    'age_limit','year','amount_pages','binding_type','format','weight','price','stock','isbn',
    'description','book_cover','status'];

    // Модель Book

    public function author()
    {
        return $this->belongsTo(Author::class);  // Связь с моделью Author
    }

    public function series()
    {
        return $this->belongsTo(Series::class);  // Связь с моделью Series
    }

    public function category()
    {
        return $this->belongsTo(Category::class);  // Связь с моделью Category
    }

    public function publishingHouse()
    {
        return $this->belongsTo(Publishing_house::class);  // Связь с моделью PublishingHouse
    }

}

