<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\category;
use App\Models\kind;
use Illuminate\Http\Request;

class KindController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kinds=kind::all();

        return view('admin.kind.index',compact('kinds'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kind.create',compact('categories'));
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

            'name'=>'required',

        ]);
        $kinds = new kind();
        $kinds->name= $request->name;
        $kinds->status=$request->status;


        if($kinds->save()){
            return redirect(route('dashboard.kind.index'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kind  $kind
     * @return \Illuminate\Http\Response
     */
    public function show(kind $kind)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kind  $kind
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {

        $kinds  = kind::find($id);

        return view('admin.kind.edit',compact('kinds'),compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kind  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {



        $this->validate($request,[

            'name' => 'required',



        ]);

        $kinds = kind::find($id);
        $kinds ->name= $request->name;

        $kinds ->status= $request->status;

        if($kinds->save()){
            return redirect(route('dashboard.kind.index'));
        }else{
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kind  $kind
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $kinds= kind::find($id);
        if($kinds->delete()){
            return redirect(route('dashboard.kind.index'));
        }    else{
            return redirect()->back();
        }
    }
}
