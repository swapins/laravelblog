<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::paginate(5);
        return view('guest', compact('posts'));
    }

    public function showPost($id){
        $post = Post::find($id);

        $currentPost = Post::find($id);

        $authorId = $currentPost->user_id;

        $previousPost = Post::where('user_id', $authorId)
                            ->where('id', '<', $id)
                            ->orderBy('id', 'desc')
                            ->first();

        $nextPost = Post::where('user_id', $authorId)
                        ->where('id', '>', $id)
                        ->orderBy('id', 'asc')
                        ->first();

        return view('post', compact('post','previousPost','nextPost'));
    }

    public function showPosts($id){
        $posts = Post::where('user_id',$id)->paginate(5);
        return view('guest', compact('posts'));
    }

    public function showPostEdit($id){
        $post = Post::find($id);

        $currentPost = Post::find($id);

        $authorId = $currentPost->user_id;

        $previousPost = Post::where('user_id', $authorId)
                            ->where('id', '<', $id)
                            ->orderBy('id', 'desc')
                            ->first();

        $nextPost = Post::where('user_id', $authorId)
                        ->where('id', '>', $id)
                        ->orderBy('id', 'asc')
                        ->first();

        return view('editblog', compact('post','previousPost','nextPost'));
    }

    public function createblog($id){
        return view('writeblog');
    }

    public function manageblog($id){
        $posts = Post::where('user_id',$id)->paginate(15);
        return view('manageblog', compact('posts'));
    }

    public function writePost(Request $request){

        
        $request->validate([
            // Add validation rules for each field in the request
            'id' => 'required',
            'title' => 'required|string|max:255|unique:posts',
            'Content' => 'required|string',
            // Add more fields and validation rules as needed
        ]);

        $done = Post::create([
                    'user_id' => $request->input('id'),
                    'title' => $request->input('title'),
                    'Content' => $request->input('Content'),
                ]);

       return redirect('/posts/'.$request->input('id'));
    }

    public function editPost(Request $request, $id){
        $request->validate([
            // Add validation rules for each field in the request
            'id' => 'required',
            'title' => 'required|string|max:255',
            'Content' => 'required|string',
            // Add more fields and validation rules as needed
        ]);

        $done = Post::findOrFail($id)->update(
            [
                'user_id' => $request->input('id'),
                'title' => $request->input('title'),
                'Content' => $request->input('Content'),
            ]
        );
        
        return redirect('/posts/'.$request->input('id'));
    }

    public function delPost($id) {
        $done = Post::findOrFail($id)->delete();
        return redirect()->back();
    }

   
}
