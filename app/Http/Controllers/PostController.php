<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\post;
use App\Models\category;
use App\Models\kind;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
class PostController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=post::all();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=category::all();
        $kinds=kind::all();
        $users=user::all();
        return view('admin.post.create',compact('kinds'),compact('users'),compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!empty($request->image))
        {
            $filename=time() . '.' .$request->image->getClientOriginalName();

        }
        $request->validate([

            'title' => ['required', 'string', 'max:255'],
            'kind_id' => ['required'],
            'content'=>['required'],
            'user_id'=>['required'],
            'image'=>['required']


        ]);

        $post = new post();
        $post ->title= $request->title;
        $post ->content= $request->content;
        $post ->kind_id=$request->kind_id;
         $user_id= Auth::user()->id;
        $post ->user_id= $user_id;
        $post ->status= $request->status;
        $post ->mota=$request->mota;
        $post->tacgia=$request->tacgia;

            if(!empty($request->image))
            {

                $post->image=$filename;

                $request->image->move(public_path('/backend/dist/img/upload/post'), $filename);

            }

        if($post->save())
        {
            return redirect(route('dashboard.post.index'));
        }else{
            return redirect()->back();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kinds=kind::all();
        $post = post::find($id);
        return view('admin.post.show',compact('post'),compact('kinds'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $kinds=kind::all();
        $post = post::find($id);
        return view('admin.post.edit',compact('post'),compact('kinds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        if(!empty($request->image))
        {
            $filename=time() . '.' .$request->image->getClientOriginalName();
        }
        else{
            $filename=null;
         }


        $request->validate([

            'title' => ['required', 'string', 'max:255'],
            'kind_id' => ['required'],
            'content'=>['required'],
            'user_id'=>['required'],


        ]);

        $post = post::find($id);
        $post ->title= $request->title;
        $post ->content= $request->content;
        $post ->kind_id=$request->kind_id;
         $user_id= Auth::user()->id;
        $post ->user_id= $user_id;
        $post ->status= $request->status;
        $post ->mota=$request->mota;
        $post->tacgia=$request->tacgia;
        if (!empty($filename)){
            $file=$post->image;

        }
        else{
            $file=null;
        }
        if(!empty($filename)){
        $post->image=$filename;
        }

        if($post->save())
        {   if(!empty($filename)){
            $request->image->move(public_path('/backend/dist/img/upload/post'), $filename);

        }
                if(!empty ($file)){

                    unlink(public_path('/backend/dist/img/upload/post/') . $file);
                }
            return redirect(route('dashboard.post.index'));
        } else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $post = post::find($id);
        if (!empty($post->image)){
            $file=$post->image;
        }
        else{
            $file=null;
        }



       if($post->delete())
        {


            if (file_exists( public_path('/backend/dist/img/upload/post/'). $file) ){
                if (is_null($file)){
                    return redirect(route('dashboard.post.index'));}
            }else{
                unlink(public_path('/backend/dist/img/upload/post/') . $file);
            }
            return redirect(route('dashboard.post.index'));
        }    else{
            return redirect()->back();
        }
    }
}

