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
                <input type="submit" class="form-control col-md-2 btn btn-outline-danger mt-4">
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
            <input type="submit" class="mt-2 p-1 btn-outline-success" name="submit" value="Upload">
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
<section class="help clearfix py-5">
    <div class="container" id="approve">
        <h3>Volunteer For Approval</h3>
        <div class="border-dark border-bottom my-2"></div>
        @if($approval_list->count()==0)
            <div class="border-bottom border-dark my-2 text-danger text-center">No Volunteer for approval.</div>
        @endif

        @foreach($approval_list as $approval)
        <div class="border-bottom border-dark clearfix">
            <form method="POST" action="{{ route('admin.volunteer.action') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $approval->id }}">
                <div class="col-md-8 my-4 float-left">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname" class="font-weight-bold">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $approval->firstname }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname" class="font-weight-bold">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $approval->lastname }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email" class="font-weight-bold">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $approval->email }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contact" class="font-weight-bold">Contact No</label>
                            <input type="number" class="form-control" id="contact" name="contact" value="{{ $approval->contact }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="gender" class="font-weight-bold">Gender</label>
                            <select class="form-control" name="gender" id="gender" readonly>
                                <option value="Male" {{ $approval->gender=='Male'?'selected':'' }}>Male</option>
                                <option value="Female" {{ $approval->gender=='Female'?'selected':'' }}>Female</option>
                                <option value="Others" {{ $approval->gender=='Others'?'selected':'' }}>Common Gender</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address" class="font-weight-bold">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $approval->address }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 float-left ml-5 mt-5 pt-5">
                    <div class="form-row">
                        <input type="submit" name="approve" value="Approve" class="form-control btn btn-outline-dark col-md-5">
                        <input type="submit" name="decline" value="Decline" class="ml-1 form-control btn btn-outline-danger col-md-5" onclick="if (!confirm('Are you sure?')) { return false }">
                    </div>
                </div>
            </form>
        </div>
        @endforeach
        {{ $approval_list->appends(['volunteer'=> $volunteer_list->currentPage()])->onEachSide(2)->render("pagination::bootstrap-4") }}
    </div>
</section>
<section class="help clearfix py-5">
    <div class="container" id="volunteer">
        <h3>Volunteer List</h3>
        <div class="border-dark border-bottom my-2"></div>
        @if($volunteer_list->count()==0)
            <div class="border-bottom border-dark my-2 text-danger text-center">No Volunteer.</div>
        @endif

        @foreach($volunteer_list as $volunteer)
            <div class="border-bottom border-dark clearfix">
                <form method="POST" action="{{ route('admin.volunteer.delete') }}">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="id" value="{{ $volunteer->id }}">
                    <div class="col-md-8 my-4 float-left">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname" class="font-weight-bold">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $volunteer->firstname }}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname" class="font-weight-bold">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $volunteer->lastname }}" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $volunteer->email }}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="contact" class="font-weight-bold">Contact No</label>
                                <input type="number" class="form-control" id="contact" name="contact" value="{{ $volunteer->contact }}" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="gender" class="font-weight-bold">Gender</label>
                                <select class="form-control" name="gender" id="gender" readonly>
                                    <option value="Male" {{ $volunteer->gender=='Male'?'selected':'' }}>Male</option>
                                    <option value="Female" {{ $volunteer->gender=='Female'?'selected':'' }}>Female</option>
                                    <option value="Others" {{ $volunteer->gender=='Others'?'selected':'' }}>Common Gender</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="address" class="font-weight-bold">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $volunteer->address }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 float-left ml-5 mt-5 pt-5">
                        <div class="form-row">
                            <input type="submit" name="delete" value="Delete" class="ml-1 form-control btn btn-outline-danger col-md-5" onclick="if (!confirm('Are you sure?')) { return false }">
                        </div>
                    </div>
                </form>
            </div>
        @endforeach
        {{ $volunteer_list->appends(['approval'=> $approval_list->currentPage()])->onEachSide(2)->render("pagination::bootstrap-4") }}
    </div>
</section>
<section class="help clearfix py-5" id="footer">
    <div class="container">
        <h2>Footer Section</h2>
        @if (session()->has('footerFail'))
            <div class="alert alert-danger w-25">
                <strong>{{ session('footerFail') }}</strong>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.footer') }}">
            @csrf
            <labe>Mobile No: </labe>
            <input type="text" name="mobile" placeholder="Enter mobile no" required class="form-control col-md-4 pl-2">
            <label>Email:</label>
            <input type="email" name="email" placeholder="Enter email" class="form-control col-md-4 pl-2">
            <input type="submit" name="submit" value="ADD" class="form-control btn-outline-dark col-md-2 my-3">
        </form>
        <h4 class="my-3">Footer Data list: </h4>
        <div class="border-bottom border-dark py-2"></div>

        @if($contact_list->count()==0)
            <div class="border-bottom border-dark text-danger py-2 text-center">No Contact Information </div>
        @endif

        @foreach($contact_list as $contact)
            <div class="border-dark border-bottom py-2 clearfix">
               <form method="POST" action="{{ route('admin.footer') }}">
                   @csrf
                   @method('PUT')
                    <input type="hidden" value="{{ $contact->id }}" name="id">
                    <div class="col-md-7 float-left">
                        <label>Mobile No: </label>
                        <input type="text" name="mobile" value="{{ $contact->mobile }}" class="form-control col-md-8 pl-2">
                        <label>Email: </label>
                        <input type="email" name="email" value="{{ $contact->email }}" class="form-control col-md-8 pl-2">
                    </div>
                   <div class="col-md-5 float-left my-5">
                       <input type="submit" name="edit" value="EDIT" class="form-control col-md-2 btn btn-outline-dark">
                       <input type="submit" name="delete" value="DELETE" class="form-control col-md-2 btn btn-outline-danger ml-3" onclick="if (!confirm('Are you sure?')) { return false }">
                   </div>
               </form>
            </div>
        @endforeach
    </div>
</section>
@endsection
