<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{


    /**
     * PostController constructor.
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

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
        $categories = Category::all();
        return view('posts.new',compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> "required",
            'slug'=> "required|unique:posts",
            'photo'=> "image|max:5000",
            'categories'=> "required|min:1",
        ]);
        $post = new Post();
        $post->visit_count = 0;
        $post->fill($request->all());
        $post->user_id = Auth::id();

        //upload photo
        $photo = $request->file('photo');

        $photoName = time().$photo->getClientOriginalName();

        $path = "uploads/";

        $photo->move($path, $photoName);

        $post->photo = "/".$path.$photoName;
        //end file upload

        $post->save();


        $post->categories()->attach($request->input("categories"));


        $post->save();

        return redirect()->route('posts.index');

//        return $request->all();
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('posts.edit',compact('post','categories'));
    }

    public function update(Request $request,$id)
    {
        $post = Post::find($id);

        $post->fill($request->all());

        $photo = $request->file('photo');

        $photoName = time().$photo->getClientOriginalName();

        $path = "uploads/";

        $photo->move($path, $photoName);

        $post->photo = "/".$path.$photoName;

        $post->categories()->sync($request->input('categories'));

        $post->save();

        return redirect()->route('posts.index');
    }

    public function newComment($id, Request $request)
    {
        $post = Post::query()->findOrFail($id);

        /*$newComment = new Comment($request->all());
        $post->comments()->save($newComment);*/

       /* $newComment = new Comment();
        $newComment->fill($request->all());*/

//        $post->comments()->save($newComment);

        $post->comments()->create($request->all());

        return back();

    }
    
}
