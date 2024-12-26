<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(){
        $banners = Banner::where(['status'=>'active'])->orderBy('id','DESC')->limit('4')->get();
        $categories = Category::where(['status'=> 'active'])->limit('3')->orderBy('id','DESC')->get();
        return view("frontend.index", compact("banners","categories"));
    }

    public function bookCategory($slug){
        $categories = Category::with('books')->where("slug",$slug)->first();
        return view('frontend.pages.book.book-category', compact(['categories']));
    }

    public function bookDetail($slug){
        $book=Book::where('slug',$slug)->first();
        if($book){
            return view('frontend.pages.book.book-detail', compact('book'));
        }
        else{
            return 'Информация о книге не найдена';
        }
    }
}
