@extends('admin.index')

@section('content')
    <section class="clearfix section-padding">
        <div class="container">
            <h3>Include Member</h3>
            @if (session()->has('member_success'))
                <div class="alert alert-success w-25">
                    <strong>{{ session('member_success') }}</strong>
                </div>
            @endif
            @if (session()->has('member_fail'))
                <div class="alert alert-danger w-25">
                    <strong>{{ session('member_fail') }}</strong>
                </div>
            @endif
            <form method="POST" action="{{ route('admin.member') }}" enctype="multipart/form-data">
                @csrf
                <label>Name:</label>
                <input type="text" name="name" class="form-control col-md-4 pl-1" placeholder="Enter Name" required>
                <label>
                    Select Image:
                </label>
                <input type="file" name="image" class="form-control col-md-4 p-1" accept="image/*" required>

                <label>Rank: </label>
                <input type="text" name="rank" class="form-control col-md-4 pl-1" placeholder="Enter Rank" required>

                <label>Mobile No: </label>
                <input type="text" name="mobile" class="form-control col-md-4 pl-1" placeholder="Enter Mobile No">

                <label>Email:</label>
                <input type="email" name="email" class="form-control col-md-4 pl-1" placeholder="Enter Email">

                <input type="submit" name="submit" class="form-control btn btn-dark col-md-4 mt-3" value="ADD">
            </form>
            <div class="mt-4">
                <h4>Member List</h4>
                <div class="border-top border-dark"></div>
                @if($members->count()==0)
                    <span class="text-danger">No Member Added</span>
                    <div class="border-top border-dark"></div>
                @endif
                @foreach($members as $member)
                    <div class="row border-bottom border-dark pb-2 mt-2">
                        <form method="POST" action="{{ route('admin.member.action') }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $member->id }}" name="id">
                            <div class="col-md-8 float-left">
                                <div class="d-inline-flex">
                                    <div class="ImageContainer col-md-2">
                                        <a data-lightbox="mygallery" href="{{ asset('storage/member/'.$member->image) }}">
                                            <img src="{{ asset('storage/member/'.$member->image) }}" alt="..." class="img-fluid" style="width: 1000px !important; height: 60px !important;">
                                        </a>
                                    </div>
                                    <div class="col-md-3 m-2 ml-4">
                                        <input type="text" name="name" value="{{ $member->name }}" class="form-control text-center">
                                    </div>
                                    <div class="col-md-4 m-2 ml-4">
                                        <input type="text" name="rank" value="{{ $member->rank }}" class="form-control text-center">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="col-md-5 float-left">
                                        <input type="text" name="mobile" value="{{ $member->mobile }}" class="form-control text-center">
                                    </div>
                                    <div class="col-md-5 float-left">
                                        <input type="email" name="email" value="{{ $member->email }}" class="form-control text-center">
                                    </div>
                                </div>
                            </div>
                            <div class="btn-group float-left col-md-4 mt-4 pt-1" role="group" aria-label="Basic example">
                                <div class="col-md-3 m-1 float-left">
                                    <input type="submit" name="edit" value="EDIT" class="form-control btn btn-success">
                                </div>
                                <div class="col-md-3 m-1 float-left">
                                    <input type="submit" name="delete" value="DELETE" class="form-control btn btn-danger">
                                </div>
                            </div>

                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
