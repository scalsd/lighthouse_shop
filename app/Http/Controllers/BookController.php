<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Book;
use Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy("id","DESC")->get();
        $books = Book::with(['author', 'series', 'category', 'publishingHouse'])->get();
        return view('backend.books.index', compact('books'));
    }

    public function bookStatus(Request $request){
        if($request->mode=='true'){
            DB::table('books')->where('id',$request->id)->update(['status'=>'active']);
        } else {
            DB::table('books')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Успешно обновлен статус', 'status'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'status'=>'required|in:active,inactive',
            'isbn'=>['required'],
            'stock'=>['required'],
            'price'=>['required'],
        ]);
        $data=$request->all();
        $slug=Str::slug($request->input('title'));
        $alug_count=Book::where('slug',$slug)->count();
        if($alug_count> 0){
            $slug = time().'-'.$slug;
        }
        $data['slug']=$slug;
        $status=Book::create($data);
        if($status) {
            return redirect()->route('book.index')->with('success', 'Книга успешно добавлена');
        }
        else {
            return back()->with('error', 'Что-то пошло не так');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book=Book::find($id);
        if($book) {
            return view('backend.book.view', compact('book'));
        }
        else {  
            return back()->with('error','Книга не найдена');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=Book::find($id);
        if($book) {
            return view('backend.books.edit', compact('book'));
        }
        else {  
            return back()->with('error','Данные не найдены');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $books=Book::find($id);
        if($books) {
            $this->validate($request, [
                'title'=>'required',
                'status'=>'required|in:active,inactive',
                'isbn'=>'required',
                'stock'=>'required',
                'price'=>'required',
            ]);
            $data=$request->all();
            $status=$books->fill($data)->save();
            if($status) {
                return redirect()->route('book.index')->with('success', 'Книга успешно отредактирована');
            }
            else {
                return back()->with('error', 'Что-то пошло не так');
            }
        }
        else {  
            return back()->with('error','Данные не найдены');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $books=Book::findOrFail($id);
        $status=$books->delete();
        if($status){
            request()->session()->flash('success','Книга успешно удалена');
        }
        else{
            request()->session()->flash('error','Возникла ошибка при удалении книги');
        }
        return redirect()->route('book.index');
    }
}
