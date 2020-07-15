@extends('admin.index')

@section('content')

<section class="help clearfix section-padding mt-5" id="slider">
    <div class="container">
        <div class="mb-5">
            <h4>Change Password:</h4>
            @if (session()->has('message'))
                <div class="alert alert-success col-md-4 pl-4">
                    <strong>{{ session('message') }}</strong>
                </div>
            @endif
            <form method="POST" action="{{ route('admin.password.change') }}">
                @csrf

                <label>New Password: </label>
                <input type="password" name="password" class="form-control col-md-4 pl-2" placeholder="Enter New Password" required>

                <label>Confirm Password: </label>
                <input type="password" name="confirm" class="form-control col-md-4 pl-2" placeholder="Confirm Password" required>
                <div class="text-danger font-weight-bold">{{ $errors->first() }}</div>
                <input type="submit" class="form-control col-md-2 btn btn-danger mt-4">
            </form>
        </div>
        <h2>Slider Image Selection</h2>

        @if (session()->has('slider_success'))
            <div class="alert alert-success w-25">
                <strong>{{ session('slider_success') }}</strong>
            </div>
        @endif
        @if (session()->has('slider_fail'))
            <div class="alert alert-danger w-25">
                <strong>{{ session('slider_fail') }}</strong>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.slider') }}" enctype="multipart/form-data">
            @csrf
            <label>Select Image:</label>
            <input type="file" accept="image/*" name="slider" class="form-control w-25 p-1"required>
            <input type="submit" class="mt-2 p-1 btn-success" name="submit" value="Upload">
        </form>

        <div class="mt-3">
            <div>
                <p style="font-size: 20px;">Image List: </p>
            </div>
            <div  class="mt-2">
                <hr class="m-1">
                @foreach($sliders as $slider)
                    <div class="row">

                        <div class="ImageContainer col-md-1">
                            <a data-lightbox="mygallery" href="{{ asset('storage/slider/'.$slider->name) }}">
                                <img src="{{ asset('storage/slider/'.$slider->name) }}" alt="..." class="img-fluid" style="width: 1000px !important; height: 60px !important;">
                            </a>
                        </div>
                        <form method="POST" action="{{ route('admin.slider.delete') }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $slider->id }}">
                            <div class="col-md-12 ml-5">
                                <button type="submit" class="btn form-control bg-danger text-white" onclick="if (!confirm('Are you sure?')) { return false }">DELETE</button>
                            </div>
                        </form>
                    </div>
                    <hr class="m-1">
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="help clearfix" id="notice">
    <div class="container pb-5">
        <div>
            <h2>Notice</h2>
        </div>
        @if (session()->has('notice_success'))
            <div class="alert alert-success w-25">
                <strong>{{ session('notice_success') }}</strong>
            </div>
        @endif
        @if (session()->has('notice_fail'))
            <div class="alert alert-danger w-25">
                <strong>{{ session('notice_fail') }}</strong>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.notice') }}" enctype="multipart/form-data">
            @csrf
            <label>Enter Title:</label>
            <input type="text" name="title" class="form-control col-md-4 p-2 mb-2" placeholder="Enter title"required>
            <label>Select File:</label>
            <input type="file" name="notice" class="form-control col-md-4 p-1" required>
            <input type="submit" name="submit" value="UPLOAD" class="form-control btn-success mt-3 col-md-1">
        </form>
        <div class="mt-3">
            <div>
                <p style="font-size: 20px;">Notice List: </p>
            </div>
            <div  class="w-100 mt-2">
                <hr class="m-1">
                @foreach($notices as $notice)
                    <div class="col-md-12">
                        <div class="col-md-2 float-left">
                            <a target="_blank"href="{{ route('admin.notice.view',['id'=>$notice->id]) }}">{{ $notice->name }}</a>
                        </div>
                        <form method="POST" action="{{ route('admin.notice.edit') }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $notice->id }}">
                            <div class="col-md-3 float-left ml-4">
                                <input type="text" name="title" class="form-control" required value="{{ $notice->title }}">
                            </div>
                            <div class="col-md-1 float-left ml-4">
                                <input type="submit" name="submit" value="EDIT" class="form-control btn btn-success">
                            </div>
                        </form>
                        <form method="POST" action="{{ route('admin.notice.delete') }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $notice->id }}">
                            <div class="col-md-1 ml-5 float-left">
                                <button type="submit" class="btn form-control bg-danger text-white" onclick="if (!confirm('Are you sure?')) { return false }">DELETE</button>
                            </div>
                        </form>
                    </div>
                    <br>
                    <br>
                    <hr class="mb-2">
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="help clearfix" id="video">
    <div class="container pb-5">
        <div class="row">
            <h2>Embed Video</h2>
            <sub><h5 class="font-italic pt-2"> &nbsp(2 Video)</h5></sub>
        </div>
        @if (session()->has('videoFail'))
            <div class="alert alert-danger w-25">
                <strong>{{ session('videoFail') }}</strong>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.video') }}">
            @csrf
            <label>Enter Link:</label>
            <input type="text" name="video" class="form-control col-md-4 p-2" placeholder="Enter Embedded Link"required>
            <input type="submit" name="submit" value="UPLOAD" class="form-control btn-success mt-3 col-md-1">
        </form>
        <div class="mt-3">
            <div>
                <p style="font-size: 20px;">Videos: </p>
            </div>
            <div  class="mt-2">
                <hr class="m-1">
                @foreach($videos as $video)
                <div class="row">
                    <div class="col-md-5">
                        <iframe class="col-md-8"src="{{ $video->link }}"
                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                        </iframe>
                    </div>
                    <form method="POST" action="{{ route('admin.video.delete') }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $video->id }}">
                        <div class="col-md-12 ml-5 mt-5">
                            <button type="submit" class="btn form-control bg-danger text-white" onclick="if (!confirm('Are you sure?')) { return false }">DELETE</button>
                        </div>
                    </form>
                </div>
                <hr class="m-1">
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
