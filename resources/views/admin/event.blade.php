@extends('admin.index')

@section('content')
    <section class="help clearfix section-padding" id="upcoming">
        <div class="container">
            <h2>Upcoming Event</h2>
            <div class="col-md-5">
            @if (session()->has('event_success'))
                <div class="alert alert-success w-75">
                    <strong>{{ session('event_success') }}</strong>
                </div>
            @endif
            @if (session()->has('event_fail'))
                <div class="alert alert-danger w-75">
                    <strong>{{ session('event_fail') }}</strong>
                </div>
            @endif
            <form method="POST" action="{{ route('admin.event.upcoming') }}" enctype="multipart/form-data">
                @csrf
                <label>Enter Title:</label>
                <input class="form-control" type="text" name="title" placeholder="Enter title" required>
                <lable>Select Image:</lable>
                <input class="form-control p-1" type="file" name="event" accept="image/*" required>
                <label>Description about event:</label>
                <textarea name="details" id="upcoming_event" class="form-control" rows="8" required placeholder="Enter description about event"></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace( 'upcoming_event' );
                </script>
                <input type="submit" class="form-control btn-success col-md-2 mt-2" value="POST">
            </form>
            </div>
            <div class="mt-3"><h5>Upcoming Event List</h5></div>
            <div class="border-dark border-bottom mt-2 mb-1"></div>
            @if($upcomings->count()==0)
                <p class="text-danger">No Upcoming Event</p>
                <div class="border-dark border-bottom mt-2 mb-1"></div>
            @endif
            @foreach($upcomings as $upcoming)
                <div class="row border-bottom border-dark pb-2 mt-2">
                    <form method="POST" action="{{ route('admin.event.upcoming') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $upcoming->id }}">
                        <div class="col col-md-6 float-left">
                            <div class="d-inline-flex">
                                <div class="ImageContainer col-md-2">
                                    <a data-lightbox="mygallery" href="{{ asset('storage/event/'.$upcoming->name) }}">
                                        <img src="{{ asset('storage/event/'.$upcoming->name) }}" alt="..." class="img-fluid" style="width: 1000px !important; height: 60px !important;">
                                    </a>
                                </div>
                                <div class="col-md-6 m-2">
                                    <input type="text" name="title" value="{{ $upcoming->title }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-10 mt-3">
                                <textarea class="form-control" rows="7" name="details" id="upcoming{{ $upcoming->id }}">{{ $upcoming->details }}</textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace( 'upcoming{{ $upcoming->id }}' );
                                </script>
                            </div>
                        </div>

                        <div class="btn-group float-left col-md-4 mt-5 pt-5" role="group" aria-label="Basic example">
                            <div class="col-md-3 m-1 float-left">
                                <input type="submit" name="edit" value="EDIT" class="form-control btn btn-success">
                            </div>
                            <div class="col-md-3 m-1 float-left">
                                <input type="submit" name="delete" value="DELETE" class="form-control btn btn-danger" onclick="if (!confirm('Are you sure?')) { return false }">
                            </div>
                            <div class="col-md-6 m-1 float-left">
                                <input type="submit" name="event" value="Mark as ON-GOING" class="form-control btn btn-dark">
                            </div>
                        </div>

                    </form>
                </div>

            @endforeach
        </div>
    </section>
    <section class="help clearfix pt-5 pb-5" id="ongoing">
        <div class="container">
            <h2>On-Going Event</h2>
            <div class="col-md-5">
                @if (session()->has('ongoing_success'))
                    <div class="alert alert-success w-75">
                        <strong>{{ session('ongoing_success') }}</strong>
                    </div>
                @endif
                @if (session()->has('ongoing_fail'))
                    <div class="alert alert-danger w-75">
                        <strong>{{ session('ongoing_fail') }}</strong>
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.event.ongoing') }}" enctype="multipart/form-data">
                    @csrf
                    <label>Enter Title:</label>
                    <input class="form-control" type="text" name="title" placeholder="Enter title" required>
                    <lable>Select Image:</lable>
                    <input class="form-control p-1" type="file" name="event" accept="image/*" required>
                    <label>Description about event:</label>
                    <textarea name="details" id="ongoing_event" class="form-control" rows="8" required placeholder="Enter description about event"></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace( 'ongoing_event' );
                    </script>
                    <input type="submit" class="form-control btn-success col-md-2 mt-2" value="POST">
                </form>
            </div>
            <div class="mt-3"><h5>On-Going Event List</h5></div>
            <div class="border-dark border-bottom mt-2 mb-1"></div>
            @if($ongoings->count()==0)
                <p class="text-danger">No On-Going Event</p>
                <div class="border-dark border-bottom mt-2 mb-1"></div>
            @endif
            @foreach($ongoings as $ongoing)
                <div class="row border-bottom border-dark pb-2 mt-2">
                    <form method="POST" action="{{ route('admin.event.ongoing') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $ongoing->id }}">
                        <div class="col col-md-6 float-left">
                            <div class="d-inline-flex">
                                <div class="ImageContainer col-md-2">
                                    <a data-lightbox="mygallery" href="{{ asset('storage/event/'.$ongoing->name) }}">
                                        <img src="{{ asset('storage/event/'.$ongoing->name) }}" alt="..." class="img-fluid" style="width: 1000px !important; height: 60px !important;">
                                    </a>
                                </div>
                                <div class="col-md-6 m-2">
                                    <input type="text" name="title" value="{{ $ongoing->title }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-10 mt-3">
                                <textarea class="form-control" id="ongoing{{ $ongoing->id }}" rows="7" name="details">{{ $ongoing->details }}</textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace( 'ongoing{{ $ongoing->id }}' );
                                </script>
                            </div>
                        </div>

                        <div class="btn-group float-left col-md-4 mt-5 pt-5" role="group" aria-label="Basic example">
                            <div class="col-md-3 m-1 float-left">
                                <input type="submit" name="edit" value="EDIT" class="form-control btn btn-success">
                            </div>
                            <div class="col-md-3 m-1 float-left">
                                <input type="submit" name="delete" value="DELETE" class="form-control btn btn-danger" onclick="if (!confirm('Are you sure?')) { return false }">
                            </div>
                            <div class="col-md-6 m-1 float-left">
                                <input type="submit" name="event" value="Mark as CLOSED" class="form-control btn btn-dark">
                            </div>
                        </div>

                    </form>
                </div>

            @endforeach
        </div>
    </section>
    <section class="help clearfix pt-5 pb-5" id="closed">
        <div class="container">
            <div class="mt-3 mb-3"><h2>Closed Event</h2></div>
            <div class="border-dark border-bottom mt-2 mb-1"></div>
            @if($closed_list->count()==0)
                <p class="text-danger">No Closed Event</p>
                <div class="border-dark border-bottom mt-2 mb-1"></div>
            @endif
            @foreach($closed_list as $closed)
                <div class="row border-bottom border-dark pb-2 mb-2">
                    <form method="POST" action="{{ route('admin.event.closed') }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $closed->id }}">
                        <div class="col col-md-6 float-left">
                            <div class="d-inline-flex">
                                <div class="ImageContainer col-md-2">
                                    <a data-lightbox="mygallery" href="{{ asset('storage/event/'.$closed->name) }}">
                                        <img src="{{ asset('storage/event/'.$closed->name) }}" alt="..." class="img-fluid" style="width: 1000px !important; height: 60px !important;">
                                    </a>
                                </div>
                                <div class="col-md-6 m-2">
                                    <input type="text" name="title" value="{{ $closed->title }}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-10 mt-3">
                                <textarea class="form-control" id="closed{{ $closed->id }}" rows="7" name="details" readonly>{{ $closed->details }}</textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace( 'closed{{ $closed->id }}' );
                                </script>
                            </div>
                        </div>

                        <div class="col-md-2 m-5 p-5 float-left">
                            <input type="submit" name="delete" value="DELETE" class="form-control btn btn-danger" onclick="if (!confirm('Are you sure?')) { return false }">
                        </div>
                    </form>
                </div>

            @endforeach
            {{ $closed_list->render("pagination::bootstrap-4") }}
        </div>
    </section>
@endsection
