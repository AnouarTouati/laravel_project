<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentsController extends Controller
{
    public function index (){
        $comments= Comment::get();
        return view('pages.main',['comments'=>$comments]);
    }

    public function store(Request $request){
        $this->validate($request,['body'=>'required']);
        
        Comment::create(
            ['body'=>$request->body]
        );
    
        return redirect()->route('comment');
    }
    public function destroy(Comment $comment){
        $comment->delete();
        return redirect()->route('comment');
        
    }
    public function edit(Comment $comment){
        return view('pages.edit',['comment'=>$comment]);
    }
    public function save(Request $request,Comment $comment){
      
        $comment->update(['body'=>$request['body']]);
        return redirect()->route('comment');
    }
}
