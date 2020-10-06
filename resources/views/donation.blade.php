@extends('layouts.index')

@section('content')
<section class="section-padding" style="background: #e5e7e6">
    <div class="container">
        @if (session()->has('success'))
            <div class="col-sm-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        @if (session()->has('failed'))
            <div class="col-sm-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('failed') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif


        <div class="text-center">
          @if(isset($image))
                <a data-lightbox="mygallery" href="{{ asset('storage/donation_image/'.$image->donation_image) }}">
                    <img src="{{ asset('storage/donation_image/'.$image->donation_image) }}" alt="..." class="img-fluid" style="width: 1000px !important;">
                </a>
          @endif

        </div>
        <div class="mt-5">
            <h4 class="mb-3">Select Payment Method</h4>
            <form method="POST" action="{{ route('donation') }}">
                @csrf
                <select class="form-control col-md-5 p-2" name="payment_method" onchange="showDiv(this.value)">
                    <option value="" selected> Choose Payment Method</option>
                    @foreach($methods as $method)
                        <option value="{{ $method->id }}">{{ $method->payment_method }}</option>
                    @endforeach
                </select>
                <div class="mt-3" id="account_div">

                </div>
            </form>
        </div>
        <script>
            function showDiv(str){
                var xhttp;
                if(str==""){
                    document.getElementById("account_div").innerHTML = "";
                    return;
                }
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200){
                        document.getElementById("account_div").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET","/payment_account/"+str , true);
                xhttp.send();
            }
        </script>
    </div>
</section>
@endsection
