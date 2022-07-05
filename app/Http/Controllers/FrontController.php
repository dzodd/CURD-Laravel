<?php

namespace App\Http\Controllers;

use App\Models\kind;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;

class FrontController extends Controller
{
    public function index()

    {
        $posts = post::all();
        $categories = kind::all();
        return view('frontpage.layouts.index', compact('posts'), compact('categories'));
    }
    public function show($id)

    {
        $posts = post::all();
        $categories = kind::find($id);
        $cates = kind::all();
        return view('frontpage.layouts.category', compact('posts'), compact('categories','cates'));
    }
    public function view($id)

    {

        $post = post::find($id);
        $cates = kind::all();
        return view('frontpage.layouts.view',compact('post'),compact('cates'));
    }
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
        $cates = kind::all();
        // Search in the title and body columns from the posts table
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('mota', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the resluts compacted
        return view('frontpage.layouts.search', compact('posts'),compact('cates'));
    }
}
