<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\binh_luan;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments=binh_luan::all();
        return view('admin.comment.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this-> validate($request,[
            'cate_name'=>'required|unique:categories'
        ]);
        $category = new categories();
        $category->cate_name= $request->cate_name;
        $category->status=$request->status;
        if($category->save()){
            return redirect(route('dashboard.category.index'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $category = categories::find($id);
        return view('admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $category
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $cate = categories::find($id);
        return view('admin.category.edit',compact('cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'cate_name' => 'required',



        ]);

        $cate = binh_luan::find($id);
        $cate ->cate_name= $request->cate_name;

        $cate ->status= $request->status;

        if($cate->save()){
            return redirect(route('dashboard.category.index'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $comments= binh_luan::find($id);
        if($comments->delete()){
            return redirect(route('dashboard.comment.index'));
        }    else{
            return redirect()->back();
        }
    }
    }

