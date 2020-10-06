@extends('admin.index')

@section('content')
    <section class="section-padding">
        <div class="container">
            <h3>Donation Image</h3>
            @if (session()->has('image_success'))
                <div class="alert alert-success w-75">
                    <strong>{{ session('image_success') }}</strong>
                </div>
            @endif
            @if (session()->has('image_fail'))
                <div class="alert alert-danger w-75">
                    <strong>{{ session('image_fail') }}</strong>
                </div>
            @endif
            @if(isset($image))
                <p class="text-danger mb-5">Delete below image before uploading new one</p>
            @endif
            <form method="POST" action="{{ route('admin.donation.image') }}" enctype="multipart/form-data">
                @csrf
                <input type="file" name="donation_image" accept="image/*" class="form-control col-md-4 p-1" required>
                <input type="submit" value="Upload" class="form-control col-md-1 mt-3 btn btn-outline-dark" {{ isset($image)?'disabled':'' }}>
            </form>

            <div class="row mt-4 border border-dark p-2">
                @if(isset($image))
                <div class="ImageContainer col-md-1">
                    <a data-lightbox="mygallery" href="{{ asset('storage/donation_image/'.$image->donation_image) }}">
                        <img src="{{ asset('storage/donation_image/'.$image->donation_image) }}" alt="..." class="img-fluid" style="width: 1000px !important; height: 60px !important;">
                    </a>
                </div>

                <form method="POST" action="{{ route('admin.donation.image') }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $image->id }}">
                    <div class="col-md-12 ml-5 mt-2">
                        <button type="submit" class="btn form-control bg-danger text-white" onclick="if (!confirm('Are you sure?')) { return false }">DELETE</button>
                    </div>
                </form>
                @else
                    <div class="text-danger">No Image Uploaded</div>
                @endif
            </div>
            <div class="mt-5">
                <h3>Payment Method</h3>
                <form method="POST" action="{{ route('admin.donation.method') }}">
                    @csrf
                    <label class="d-block">Enter Name:</label>
                    <input type="text" name="payment_method" required class="form-control col-md-4 p-1 d-inline-block" placeholder="Enter Name">
                    <input type="submit" value="ADD" class="form-control btn btn-outline-dark col-md-1 ml-2">
                </form>

            </div>
            <div class="mt-5">
                <h3 class="mb-3 d-inline-block">Payment Method List</h3>
                <span class="d-inline-block font-italic text-danger">(Fillup those information which are necessary for you)</span>
                @foreach($methods as $method)
                    <div class="border border-info p-2 m-2 clearfix" style="background: #cbeabd">
                        <div class="d-inline-block col-md-2 float-left">
                            <h5>{{ $method->payment_method }} -></h5>
                        </div>
                        <div class="col-md-10 float-left mb-3">
                            <form method="POST" action="{{ route('admin.donation.id',[$method->id]) }}">
                                @csrf
                                <div class="d-inline-block col-md-4 m-1">
                                    <input type="text" name="account_no" class="form-control p-1" required placeholder="Enter {{ $method->payment_method }} account no...">
                                </div>
                                <div class="d-inline-block col-md-5 m-1">
                                    <input type="text" name="name" class="form-control p-1" placeholder="Enter A/C holder name(Optional)">
                                </div>
                                <div class="d-inline-block col-md-1 ml-3">
                                    <input type="submit" value="ADD" class="form-control btn btn-success">
                                </div>
                                <div class="d-inline-block col-md-4 m-1">
                                    <input type="text" name="routing_no" class="form-control p-1" placeholder="Enter routing no(Optional)">
                                </div>
                                <div class="d-inline-block col-md-5 m-1">
                                    <input type="text" name="branch" class="form-control p-1" placeholder="Enter branch name(Optional)">
                                </div>
                                <div class="d-inline-block col-md-4 m-1">
                                    <input type="text" name="mobile_no" class="form-control p-1" placeholder="Enter mobile no(Optional)">
                                </div>
                                <div class="col-md-5 m-1 d-inline-block text-center">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_agent" id="personal" value="0">
                                    <label class="form-check-label" for="personal">Personal</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_agent" id="agent" value="1">
                                    <label class="form-check-label" for="agent">Agent</label>
                                </div>
                                </div>
                            </form>
                        </div>
                        <?php $cnt=0; ?>
                        @foreach($accounts as $account)
                            @if($account->method_id==$method->id)
                                @if($cnt==0)
                                    <div class="col-md-10 float-right">
                                    <h5>{{ $method->payment_method }} Accounts:</h5>
                                    </div>
                                @endif
                                <?php $cnt=1; ?>
                                <div class="col-md-10 float-right border border-dark p-1 mt-2" style="background: #f1ada3">

                                    <div class="d-inline-block col-md-4 bg-white m-1">
                                        <h6 class="text-center">A/C: {{ $account->account_no }}</h6>
                                    </div>
                                    <div class="d-inline-block m-1 col-md-5 bg-white">
                                        <h6 class="text-center">Name: {{ $account->name??'' }}</h6>
                                    </div>
                                    <div class="d-inline-block col-md-1 ml-3">
                                        <form method="POST" action="{{ route('admin.donation.id',[$account->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="DELETE" class="form-control btn btn-dark" onclick="if (!confirm('Are you sure?')) { return false }">
                                        </form>
                                    </div>
                                    @isset($account->routing_no)
                                    <div class="d-inline-block col-md-4 bg-white m-1">
                                        <h6 class="text-center">Routing No: {{ $account->routing_no }}</h6>
                                    </div>
                                    @endisset
                                    @isset($account->branch)
                                    <div class="d-inline-block m-1 col-md-5 {{ $account->branch?'bg-white':'' }}">
                                        <h6 class="text-center">Branch: {{ $account->branch??'' }}</h6>
                                    </div>
                                    @endisset
                                    @isset($account->mobile_no)
                                    <div class="d-inline-block col-md-4 bg-white m-1">
                                        <h6 class="text-center">Mobile No: {{ $account->mobile_no }}</h6>
                                    </div>
                                    @endisset
                                    @isset($account->is_agent)
                                    <div class="col-md-4 bg-white m-1 d-inline-block">
                                        <h6 class="text-center">{{ $account->is_agent==0?'Personal':'Agent' }} Account</h6>
                                    </div>
                                    @endisset
                                </div>
                            @endif
                        @endforeach
                        <div class="container text-center d-block">
                            <form method="POST" action="{{ route('admin.donation.method.delete',[$method->id]) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="DELETE METHOD" class="col-md-2 mt-3 form-control btn btn-danger" onclick="if (!confirm('Are you sure?')) { return false }">
                            </form>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>
    <section class="mb-5">
        <div class="container">
            <h3>Donation for Confirmation</h3>
            <table class="table table-striped table-bordered text-center mt-3 table-responsive-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Account</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Received</th>
                    <th scope="col">#</th>
                </tr>
                </thead>
                <tbody>
                @if($pendings->count()==0)
                    <tr>
                        <td colspan="6">No donation for confirmation</td>
                    </tr>
                @endif

                @foreach($pendings as $pending)
                <tr>
                    <td>{{ $pending->method }}</td>
                    <td>{{ $pending->account }}</td>
                    <td>{{ $pending->amount }}</td>
                    <td>{{ $pending->name }}</td>
                    <td>{{ $pending->mobile }}</td>
                    <form method="POST" action="{{ route('admin.donation.confirm',[$pending->id]) }}">
                        @csrf
                    <td>
                        <input type="submit" class="btn btn-outline-dark" name="confirm" value="Confirm">

                    </td>
                    <td>
                        <input type="submit" class="btn btn-outline-danger" name="delete" value="Cancel" onclick="if (!confirm('Are you sure?')) { return false }">
                    </td>
                    </form>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $pendings->appends(['received'=>$confirms->currentPage()])->render() }}
        </div>
    </section>
    <section class="celarfix my-5 pb-5">
        <div class="container pb-5">
            <h3>Donation Information</h3>
            <table class="table table-striped table-bordered text-center mt-3 table-responsive-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Account</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @if($confirms->count()==0)
                    <tr>
                        <td colspan="6">No donation</td>
                    </tr>
                @endif

                @foreach($confirms as $confirm)
                    <tr>
                        <td scope="row">{{ $confirm->method }}</td>
                        <td>{{ $confirm->account }}</td>
                        <td>{{ $confirm->amount }}</td>
                        <td>{{ $confirm->name }}</td>
                        <td>{{ $confirm->mobile }}</td>
                        <form method="POST" action="{{ route('admin.donation.delete',[$confirm->id]) }}">
                            @csrf
                            @method('DELETE')
                            <td>
                                <input type="submit" class="btn btn-outline-danger" name="delete" onclick="if (!confirm('Are you sure?')) { return false }" value="Delete">
                            </td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $confirms->appends(['pending'=>$confirms->currentPage()])->render() }}
        </div>
    </section>
@endsection
