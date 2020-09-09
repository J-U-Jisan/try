@extends('layouts.index')

@section('content')
<section class="section-padding" style="background: #d7d5cf">
    <div class="row justify-content-center">
    <div class="w-75">
        <img src="{{ asset('/storage/post/'.$post->featured_image) }}" class="w-75">
        <h2 class="mt-3">{{ $post->title }}</h2>
        <p><i class="far fa-calendar-alt"></i> {{ $post->created_at }}</p>
        <div class="p-5 bg-white">
            {!! $post->details !!}
        </div>
        <div class="mt-4 float-right row">
            <button type="button" class="btn btn-facebook m-1"><i class="fab fa-facebook-f"></i>&nbsp;&nbsp; Share</button>
            <button type="button" class="btn btn-whatsapp m-1"><i class="fab fa-whatsapp"></i>&nbsp;&nbsp; Share</button>
        </div>
        <div>
             <h4 class="mt-3 d-inline-block">Comment <i class="fa fa-comment-alt"></i></h4><span class="ml-2"> {{ $comments->count() }} {{ $comments->count()>1?'comments':'comment'}}</span>
            <div class="mt-3">
                @foreach($comments as $comment)
                    <div class="col-md-5 p-1 rounded mt-2" style="background: #ffffff">
                        <span style="color: blue"><i class="fa fa-user-circle"></i> {{ $comment->name }}</span>
                        <p class="ml-3">&nbsp{{ $comment->comment }}</p>
                    </div>
                @endforeach
            </div>
            <div class="mt-3">
                @if($comments->count())
                    <h5>Comment Here</h5>
                @endif
                <form method="POST" action="{{ route('comment') }}">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    @guest
                        <input type="text" name="name" class="form-control col-md-3 p-1 d-inline-block mb-1" placeholder="Enter your name" required>
                    @else
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                        <i class="fa fa-user-circle"></i> {{ Auth::user()->name }}
                    @endguest
                    <textarea name="comment" class="form-control mt-1 col-md-5 p-1 d-block" placeholder="Enter Comment" required></textarea>
                    <input type="submit" value="Comment" class="form-control mt-3 btn btn-outline-dark col-md-1">
                </form>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
