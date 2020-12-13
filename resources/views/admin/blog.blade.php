@extends('admin.index')

@section('content')
    <section class="help clearfix section-padding" id="upcoming">
        <div class="container">
            <h2>Add New Post</h2>
            @if (session()->has('post_success'))
                <div class="alert alert-success w-75">
                    <strong>{{ session('post_success') }}</strong>
                </div>
            @endif
            @if (session()->has('post_fail'))
                <div class="alert alert-danger w-75">
                    <strong>{{ session('post_fail') }}</strong>
                </div>
            @endif
            <form method="POST" action="" enctype="multipart/form-data" class="col-md-8">
                @csrf
                <label>Enter Title:</label>
                <input type="text" name="title" class="form-control" placeholder="Enter post title" required>
                <label>Featured Image:</label>
                <input type="file" accept="image/*" name="featured" class="form-control p-1" required>
                <label>Description: </label>
                <textarea name="details" id="details" required class="form-control">

                </textarea>
                <script type="text/javascript">
                    CKEDITOR.replace( 'details' );
                </script>
                <input type="submit" name="submit" value="POST" class="form-control col-md-2 mt-3 btn btn-outline-dark">
            </form>

            <div class="mt-5">
                <h3>Posts List</h3>

                @if($posts->count()==0)
                    <div class="border border-dark mt-4 mb-1 p-2">
                         <p class="text-danger">No Post</p>
                    </div>

                @endif
                @foreach($posts as $post)
                    <div class="border-dark border mt-3 p-1 clearfix">
                        <form method="POST" action="{{ route('admin.blog') }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <div class="col col-md-8 float-left">
                                <div class="d-inline-flex">
                                    <div class="ImageContainer col-md-2">
                                        <a data-lightbox="mygallery" href="{{ asset('storage/post/'.$post->featured_image) }}">
                                            <img src="{{ asset('storage/post/'.$post->featured_image) }}" alt="..." class="img-fluid" style="width: 1000px !important; height: 60px !important;">
                                        </a>
                                    </div>
                                    <div class="col-md-9 m-2">
                                        <input type="text" name="title" value="{{ $post->title }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <textarea class="form-control" rows="7" name="details" id="post{{ $post->id }}">{{ $post->details }}</textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace( 'post{{ $post->id }}' );
                                    </script>
                                </div>
                            </div>

                            <div class="btn-group col-md-4 mt-5 pt-5" role="group" aria-label="Basic example">
                                <div class="col-md-3 m-1 ml-4 float-left">
                                    <input type="submit" name="edit" value="EDIT" class="form-control btn btn-success">
                                </div>
                                <div class="col-md-3 m-1 float-left">
                                    <input type="submit" name="delete" value="DELETE" class="form-control btn btn-danger" onclick="if (!confirm('Are you sure?')) { return false }">
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
                {{ $posts->onEachSide(2)->render() }}
            </div>
        </div>
    </section>
@endsection
