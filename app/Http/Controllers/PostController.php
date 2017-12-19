<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
//        $posts = DB::table('posts')
//            ->where('publish', 1)
//            ->get();
        /*$posts = Post::query()
            ->where("publish",1)
            ->orderByDesc("created_at")
            ->get()
        ;*/
        $posts = Post::where(['publish'=>1])->get();


        return view('posts.index',
            compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);

//        $post->setAttribute('visit_count',
//            $post->visit_count + 1);
//        $post->visit_count++;
//        $post->save();
        $post->incVisitCount();


        return view('posts.show',
            compact('post'));
    }

    public function create()
    {
        return view('posts.new');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->visit_count = 0;
        $post->fill($request->all());

        $post->save();

        return redirect()->route('posts.index');

//        return $request->all();
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit',compact('post'));
    }

    public function update(Request $request,$id)
    {
        $post = Post::find($id);

        $post->fill($request->all());

        $post->save();

        return redirect()->route('posts.index');

    }
    
}
