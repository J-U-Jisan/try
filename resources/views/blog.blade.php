@extends('layouts.index')

@section('content')

<section class="section-padding" style="background: #e5e7e6">
<div class="row justify-content-center">
    <div class="leftcolumn">
        @foreach($posts as $post)
        <div class="card p-2" style="box-shadow: 0px 0px 4px 1px black">
            <div>
            <h2>{{ $post->title }}</h2>
            <p><i class="far fa-calendar-alt"></i> {{ $post->created_at }}</p>
            <div class="fakeimg"><img src="{{ asset('storage/post/'.$post->featured_image) }}" style="height:400px;"></div>
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

