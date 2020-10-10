@extends('layouts.index')

@section('title','Blog | ')

@section('content')

<section class="section-padding" style="background: #e5e7e6">
<div class="row justify-content-center">
    @if($posts->count()==0)
        <span class="text-center w-100 text-danger">No Post to show</span>
    @endif
    <div class="leftcolumn">
        @foreach($posts as $post)
        <div class="card p-2" style="box-shadow: 0px 0px 10px 1px #999ca1; padding: 15px !important; border-radius: 1%;">
            <div>
            <h2>{{ $post->title }}</h2>
            <p><i class="far fa-calendar-alt"></i> {{ $post->created_at }}</p>
            <div class="fakeimg"><img class="blog-img" src="{{ asset('storage/post/'.$post->featured_image) }}"></div>
            <p></p>
            <p> {!! \Illuminate\Support\Str::limit($post->details, 200, '...') !!}</p>
            </div>
            <div>
                @if (strlen($post->details) > 200)
                    <a href="{{ route('blog.view',[$post->id]) }}">
                        <button class="btn btn-outline-dark">Read more <i class="fas fa-directions"></i></button></a>
                @endif
            </div>
        </div>
        @endforeach
        {{ $posts->render() }}
    </div>
</div>
</section>
@endsection

