<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publishing_house;
use DB;
use Str;

class Publishing_houseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishing_houses = Publishing_house::orderBy("id","DESC")->get();
        return view('backend.publishing_houses.index', compact('publishing_houses'));
    }

    public function publishing_houseStatus(Request $request){
        if($request->mode=='true'){
            DB::table('publishing_houses')->where('id',$request->id)->update(['status'=>'active']);
        } else {
            DB::table('publishing_houses')->where('id',$request->id)->update(['status'=>'inactive']);
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
        return view('backend.publishing_houses.create');
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
        ]);
        $data=$request->all();
        $slug=Str::slug($request->input('title'));
        $alug_count=Publishing_house::where('slug',$slug)->count();
        if($alug_count> 0){
            $slug = time().'-'.$slug;
        }
        $data['slug']=$slug;
        $status=Publishing_house::create($data);
        if($status) {
            return redirect()->route('publishing_house.index')->with('success', 'Издательство успешно добавлено');
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
        $publishing_house=Publishing_house::find($id);
        if($publishing_house) {
            return view('backend.publishing_houses.edit', compact('publishing_house'));
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
        $publishing_houses=Publishing_house::find($id);
        if($publishing_houses) {
            $this->validate($request, [
                'title'=>'required',
                'status'=>'required|in:active,inactive',
            ]);
            $data=$request->all();
            $status=$publishing_houses->fill($data)->save();
            if($status) {
                return redirect()->route('publishing_house.index')->with('success', 'Издательство успешно отредактировано');
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
        $publishing_houses=Publishing_house::findOrFail($id);
        $status=$publishing_houses->delete();
        if($status){
            request()->session()->flash('success','Издательство успешно удалено');
        }
        else{
            request()->session()->flash('error','Возникла ошибка при удалении издательства');
        }
        return redirect()->route('publishing_house.index');
    }
}
