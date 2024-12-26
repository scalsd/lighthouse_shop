<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Post;
use Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy("id","DESC")->get();
        return view('backend.posts.index', compact('posts'));
    }

    public function postStatus(Request $request){
        if($request->mode=='true'){
            DB::table('posts')->where('id',$request->id)->update(['status'=>'active']);
        } else {
            DB::table('posts')->where('id',$request->id)->update(['status'=>'inactive']);
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
        return view('backend.posts.create');
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
            'text'=>'required',
            'photo'=>'required',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $slug=Str::slug($request->input('title'));
        $alug_count=Post::where('slug',$slug)->count();
        if($alug_count> 0){
            $slug = time().'-'.$slug;
        }
        $data['slug']=$slug;
        // return $data;
        $status=Post::create($data);
        if($status) {
            return redirect()->route('post.index')->with('success', 'Статья успешно создана');
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
        $post=Post::find($id);
        if($post) {
            return view('backend.posts.edit', compact('post'));
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
        $post=Post::find($id);
        if($post) {
            $this->validate($request, [
                'title'=>'required',
                'text'=>'required',
                'photo'=>'required',
                'status'=>'required|in:active,inactive',
            ]);
            $data=$request->all();
            $status=$post->fill($data)->save();
            if($status) {
                return redirect()->route('post.index')->with('success', 'Статья успешно отредактирована');
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
        $post=Post::findOrFail($id);
        $status=$post->delete();
        if($status){
            request()->session()->flash('success','Статья успешно удалена');
        }
        else{
            request()->session()->flash('error','Возникла ошибка при удалении статьи');
        }
        return redirect()->route('post.index');
    }
}
