<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use DB;
use Str;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Series::orderBy("id","DESC")->get();
        return view('backend.series.index', compact('series'));
    }

    public function seriesStatus(Request $request){
        if($request->mode=='true'){
            DB::table('series')->where('id',$request->id)->update(['status'=>'active']);
        } else {
            DB::table('series')->where('id',$request->id)->update(['status'=>'inactive']);
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
        return view('backend.series.create');
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
        $alug_count=Series::where('slug',$slug)->count();
        if($alug_count> 0){
            $slug = time().'-'.$slug;
        }
        $data['slug']=$slug;
        $status=Series::create($data);
        if($status) {
            return redirect()->route('series.index')->with('success', 'Серия успешно добавлена');
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
        $series=Series::find($id);
        if($series) {
            return view('backend.series.edit', compact('series'));
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
        $series=Series::find($id);
        if($series) {
            $this->validate($request, [
                'title'=>'required',
                'status'=>'required|in:active,inactive',
            ]);
            $data=$request->all();
            $status=$series->fill($data)->save();
            if($status) {
                return redirect()->route('series.index')->with('success', 'Серия успешно отредактирована');
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
        $series=Series::findOrFail($id);
        $status=$series->delete();
        if($status){
            request()->session()->flash('success','Серия успешно удалена');
        }
        else{
            request()->session()->flash('error','Возникла ошибка при удалении серии');
        }
        return redirect()->route('series.index');
    }
}
