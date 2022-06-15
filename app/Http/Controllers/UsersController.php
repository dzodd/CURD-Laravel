<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Monolog\Handler\IFTTTHandler;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = user::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $request->validate([

                'name' => ['required', 'string', 'max:255'],
                'email' => ['required','unique:users'],
                'password' => ['required'],
                'profile_photo_path'=>'required'
            ]);

            $user = new User();
            $user ->name= $request->name;
            $user ->email= $request->email;
            $user->password=$request->password;
            $user ->status= $request->status;
            $user ->number= $request->number;

                if(!empty($request->profile_photo_path))
                {
                    $filename=time() . '.' .$request->profile_photo_path->getClientOriginalName();
                    $user->profile_photo_path=$filename;
                    $request->profile_photo_path->move(public_path('/backend/dist/img/upload/user'), $filename);
                }

            if($user->save())
            {
                return redirect(route('dashboard.users.index'));
            }else{
                return redirect()->back();
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

        $users  = user::find($id);
        return view('admin.users.show',compact('users'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $users  = user::find($id);
        return view('admin.users.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function logout (Request $request) {



       Auth::guest();
       session()->flush();
       return redirect('/');
    }
    public function update(Request $request, $id)
    {    $user = user::find($id);
        if(!empty($request->profile_photo_path))
        {
            $filename=time() . '.' .$request->profile_photo_path->getClientOriginalName();



        }
        else{
            $filename=null;
        }
        $this->validate($request,[

            'name' => 'required',
            'email' => 'required',

        ]);

        $user ->name= $request->name;
        $user ->email= $request->email;
        $user ->status= $request->status;
        $user ->number= $request->number;

        if (!empty($filename)){
            $file=$user->profile_photo_path;

        }
        else{
            $file=null;
        }

        if(!empty($filename)){
            $user->profile_photo_path  = $filename;
        }
        if($user->save())
        {
            if(!empty ($filename)){
                $request->profile_photo_path->move(public_path('/backend/dist/img/upload/user'), $filename);
            }

          if(!empty($file)) {


                unlink(public_path('/backend/dist/img/upload/user/') . $file);
            }
            return redirect(route('dashboard.users.index'));
             }
             else{
                     return redirect()->back();
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
        $user = user::find($id);
        if (!empty($user->profile_photo_path)){
            $file=$user->profile_photo_path;
        }
        else{
            $file=null;
        }
        if($user->delete()){
        if (file_exists( public_path('/backend/dist/img/upload/user/'). $file) ){
            if (is_null($file)){
                return redirect(route('dashboard.users.index'));}
                else{
                    unlink(public_path('/backend/dist/img/upload/user/') . $file);
                }

            return redirect(route('dashboard.users.index'));
    }
    else{
            return redirect()->back();
        }
    }
}
}
