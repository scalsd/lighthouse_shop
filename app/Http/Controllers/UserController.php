<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy("id","DESC")->get();
        return view('backend.users.index', compact('users'));
    }


    public function userStatus(Request $request){
        if($request->mode=='true'){
            DB::table('users')->where('id',$request->id)->update(['status'=>'active']);
        } else {
            DB::table('users')->where('id',$request->id)->update(['status'=>'inactive']);
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
        return view('backend.users.create');
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
            'username'=>'string|nullable',
            'email'=>'required|email',
            'password'=> 'required|string',
            'role'=>'required|in:admin,user',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        // $slug=Str::slug($request->input('title'));
        // $alug_count=User::where('slug',$slug)->count();
        // if($alug_count> 0){
        //     $slug = time().'-'.$slug;
        // }
        // $data['slug']=$slug;
        $status=User::create($data);
        if($status) {
            return redirect()->route('user.index')->with('success', 'Пользователь успешно создан');
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
        $user=User::find($id);
        if($user) {
            return view('backend.users.edit', compact('user'));
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
        $user=User::find($id);
        if($user) {
            $this->validate($request, [
                'name'=>'required',
                'username'=>'string|nullable',
                'email'=>'required|email',
                'password'=> 'required|string',
                'role'=>'required|in:admin,user',
                'status'=>'required|in:active,inactive',
            ]);
            $data=$request->all();
            $status=$user->fill($data)->save();
            if($status) {
                return redirect()->route('user.index')->with('success', 'Пользователь успешно отредактирован');
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
        $user=User::findOrFail($id);
        $status=$user->delete();
        if($status){
            request()->session()->flash('success','Пользователь успешно удален');
        }
        else{
            request()->session()->flash('error','Возникла ошибка при удалении пользователя');
        }
        return redirect()->route('user.index');
    }
}
