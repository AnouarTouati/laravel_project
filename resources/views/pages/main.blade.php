@extends('layouts.app')

@section('content')

<div class="flex justify-center mt-5 mb-5">
    <div class="w-4/12 bg-white p-6 rounded-lg flex justify-center">
       Comments
    </div>
</div>

<form action="{{ route('comment') }}" method='post'  enctype="multipart/form-data" class="mb-4">
    @csrf
    <div class="mb-4">
        <label for="body" class="sr-only">Body</label>
        <textarea name="body" id="body" cols="30" rows="4" 
            class="bg-white border-2 w-full p-4 rounded-lg 
            @error('body') border-red-500 @enderror"
            placeholder="Comment something!"></textarea>

        @error('body')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
        @enderror
        <img id="image_display" class="w-40 object-contain">
        <input type="file" accept="image/*" name="image" placeholder="Choose image" id="image" onchange="loadFile(event)">
    </div>
    <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Comment</button>
    </div>
</form>

    @if ($comments->count())
        @foreach ($comments as $comment)
           <div class="mb-4 flex gap-7">
           
           <p>{{$comment->body}}</p> 

           @if($comment->image_path!="")
            <img class=" w-40 object-contain" src="{{ asset($comment->image_path)}}" alt="an image">
          @endif
           <div>
            <form action="{{route('edit', $comment)}}" method="get">
                @csrf
                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded font-small">edit</button>
                    </div>
                </form>
            <form action="{{route('delete', $comment)}}" method="post">
                    @csrf
                        <div>
                            <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded font-small">delete</button>
                        </div>
                    </form>
            </div>

           </div>
            
        @endforeach

    @else
        <p>There are no comments</p>
    @endif
@endsection
