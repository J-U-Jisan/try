@extends('admin.index')

@section('content')
    <section class="help clearfix section-padding mt-5" id="partner">
        <div class="container pb-5">
            <h2>SPONSORS</h2>

            @if (session()->has('partner_success'))
                <div class="alert alert-success w-25">
                    <strong>{{ session('partner_success') }}</strong>
                </div>
            @endif
            @if (session()->has('partner_fail'))
                <div class="alert alert-danger w-25">
                    <strong>{{ session('partner_fail') }}</strong>
                </div>
            @endif
            <form method="POST" action="{{ route('admin.partner') }}" enctype="multipart/form-data">
                @csrf
                <label>Enter Name:</label>
                <input type="text" name="title" class="form-control col-md-4 p-2 mb-2" placeholder="Enter Name" required>
                <label>Select Logo:</label>
                <input type="file" name="logo" class="form-control col-md-4" accept="image/*" required>
                <input type="submit" name="submit" value="UPLOAD" class="form-control btn-success mt-3 col-md-1">
            </form>
            <div class="mt-3">
                <div>
                    <p style="font-size: 20px;">Partners List: </p>
                </div>
                <div  class="mt-2">
                    <hr class="m-1">
                    <div class="text-danger">{{ $partners->count()==0?'No Sponsor Added':'' }}</div>
                    @foreach($partners as $partner)
                        <div class="col-md-12">
                            <div class="ImageContainer col-md-1 float-left">
                                <a data-lightbox="mygallery" href="{{ asset('storage/partner/'.$partner->name) }}">
                                    <img src="{{ asset('storage/partner/'.$partner->name) }}" alt="..." class="img-fluid" style="width: 1000px !important; height: 60px !important;">
                                </a>
                            </div>
                            <form method="POST" action="{{ route('admin.partner.edit') }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $partner->id }}">
                                <div class="col-md-3 float-left ml-4">
                                    <input type="text" name="title" class="form-control" required value="{{ $partner->title }}">
                                </div>
                                <div class="col-md-1 float-left ml-4">
                                    <input type="submit" name="submit" value="EDIT" class="form-control btn btn-success">
                                </div>
                            </form>
                            <form method="POST" action="{{ route('admin.partner.delete') }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $partner->id }}">
                                <div class="col-md-1 ml-5 float-left">
                                    <button type="submit" class="btn form-control bg-danger text-white" onclick="if (!confirm('Are you sure?')) { return false }">DELETE</button>
                                </div>
                            </form>
                        </div>
                        <br><br>
                        <hr class="m-3">
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
