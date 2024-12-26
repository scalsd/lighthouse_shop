<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use DB;
use Str;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::orderBy("id","DESC")->get();
        return view('backend.authors.index', compact('authors'));
    }

    public function authorStatus(Request $request){
        if($request->mode=='true'){
            DB::table('authors')->where('id',$request->id)->update(['status'=>'active']);
        } else {
            DB::table('authors')->where('id',$request->id)->update(['status'=>'inactive']);
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
        return view('backend.authors.create');
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
            'name'=>'required',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $slug=Str::slug($request->input('name'));
        $alug_count=Author::where('slug',$slug)->count();
        if($alug_count> 0){
            $slug = time().'-'.$slug;
        }
        $data['slug']=$slug;
        $status=Author::create($data);
        if($status) {
            return redirect()->route('author.index')->with('success', 'Автор успешно добавлен');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author=Author::find($id);
        if($author) {
            return view('backend.authors.edit', compact('author'));
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
        $authors=Author::find($id);
        if($authors) {
            $this->validate($request, [
                'name'=>'required',
                'status'=>'required|in:active,inactive',
            ]);
            $data=$request->all();
            $status=$authors->fill($data)->save();
            if($status) {
                return redirect()->route('author.index')->with('success', 'Автор успешно отредактирован');
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
        $authors=Author::findOrFail($id);
        $status=$authors->delete();
        if($status){
            request()->session()->flash('success','Автор успешно удален');
        }
        else{
            request()->session()->flash('error','Возникла ошибка при удалении автора');
        }
        return redirect()->route('author.index');
    }
}
