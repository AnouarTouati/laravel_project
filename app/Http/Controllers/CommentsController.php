<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Comment;
class CommentsController extends Controller
{
    public function index (){
        $comments= Comment::get();
        $comments = Comment::get();
        return view('pages.main',['comments'=>$comments]);
    }

    public function store(Request $request){
        $this->validate($request,['body'=>'required']);
        $path = $this->storeImageAndReturnPath($request);
        Comment::create(
            ['body'=>$request->body,
            'image_path'=>$path
            ]
        );
    
        return redirect()->route('comment');
    }
    
    public function destroy(Comment $comment){
        $this->deleteImageIfExists($comment);
        $comment->delete();
        return redirect()->route('comment');
        
    }
    public function edit(Comment $comment){
        return view('pages.edit',['comment'=>$comment]);
    }
    public function save(Request $request,Comment $comment){
        if($request->file('image')!=null){
           $this->deleteImageIfExists($comment);
           $path = $this->storeImageAndReturnPath($request);
        }else{
            $path=$comment->image_path;
        }

        $comment->update(['body'=>$request['body'], 'image_path'=>$path]);
        return redirect()->route('comment');
    }
    private function deleteImageIfExists(Comment $comment){
        if($comment->image_path!=""){
            if(File::exists($comment->image_path)){
                File::delete($comment->image_path);
            }
        }
        return;
    }
    private function storeImageAndReturnPath(Request $request){
        if($request->file('image')!=null){
            $name = $request->file('image')->getClientOriginalName();
            $suffix = $request->file('image')->store('images',['disk'=>'public']);
            $path = 'storage/'.$suffix;
            return $path;
        }else{
            $path="";
            return $path;
        }
    }
}
