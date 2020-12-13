@extends('layouts.index')

@section('title','Dashboard | ')

@section('meta_title', 'Dashboard | Try')

@section('description', 'Your donations info are here.')

@section('content')
<section class="section-padding clearfix">
    <div class="container">
        <div class="mb-3 p-1 text-center text-uppercase" style="background: #dddfde; border-radius: 5px;">
            <p style="font-size: 25px;font-family: 'Source Sans Pro', sans-serif;">"Remember that the happiest people are not those getting , but those giving more"</p>
            <p class="font-italic">-H. Jackson Brown Jr.</p>
        </div>

        <h3 class="text-center">Your Donation Information</h3>

        <table class="table table-bordered text-center table-striped table-responsive-sm mt-3">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Payment Method</th>
                <th scope="col">Account</th>
                <th scope="col">Amount</th>
                <th scope="col">Received</th>
            </tr>
            </thead>
            <tbody>
            @if($donations->count()==0)
                <tr>
                    <td colspan="5" class="text-black-50">No donations</td>
                </tr>
            @endif
            <?php $cnt =0; ?>
            @foreach($donations as $donation)
                <tr>
                    <th scope="row">{{ ++$cnt }}</th>
                    <td>{{ $donation->method }}</td>
                    <td>{{ $donation->account }}</td>
                    <td>{{ $donation->amount }}</td>
                    <td>{{ $donation->received==0?'No':'Yes' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $donations->onEachSide(2)->render() }}
    </div>
</section>
@endsection
