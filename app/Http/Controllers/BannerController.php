<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Banner;
use Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy("id","DESC")->get();
        return view('backend.banners.index', compact('banners'));
    }

    public function bannerStatus(Request $request){
        if($request->mode=='true'){
            DB::table('banners')->where('id',$request->id)->update(['status'=>'active']);
        } else {
            DB::table('banners')->where('id',$request->id)->update(['status'=>'inactive']);
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
        return view('backend.banners.create');
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
            'description'=>'string|nullable',
            'photo'=>'required',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $slug=Str::slug($request->input('title'));
        $alug_count=Banner::where('slug',$slug)->count();
        if($alug_count> 0){
            $slug = time().'-'.$slug;
        }
        $data['slug']=$slug;
        // return $data;
        $status=Banner::create($data);
        if($status) {
            return redirect()->route('banner.index')->with('success', 'Баннер успешно создан');
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
        $banner=Banner::find($id);
        if($banner) {
            return view('backend.banners.edit', compact('banner'));
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
        $banner=Banner::find($id);
        if($banner) {
            $this->validate($request, [
                'title'=>'required',
                'description'=>'string|nullable',
                'photo'=>'required',
                'status'=>'required|in:active,inactive',
            ]);
            $data=$request->all();
            $status=$banner->fill($data)->save();
            if($status) {
                return redirect()->route('banner.index')->with('success', 'Баннер успешно отредактирован');
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
        $banner=Banner::findOrFail($id);
        $status=$banner->delete();
        if($status){
            request()->session()->flash('success','Баннер успешно удален');
        }
        else{
            request()->session()->flash('error','Возникла ошибка при удалении баннера');
        }
        return redirect()->route('banner.index');
    }
}
