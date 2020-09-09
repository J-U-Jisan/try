@extends('layouts.index')

@section('content')
    <section class="clearfix section-padding" style="background: #e5e7e6">
        <div class="container">
            <div class="d-flex justify-content-center flex-wrap">
                @foreach($members as $member)
                    <div class="card m-2" style="width: 20rem;height: 400px; background: #abe0cf">
                        <img class="card-img-top" style="height: 220px;" src="{{ asset('storage/member/'.$member->image) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $member->name }}</h5>
                            <p class="card-text">{{ $member->rank }}</p>
                            <ul class="list-unstyled list-group-horizontal">
                                <li class="">Mobile: {{ $member->mobile ?? 'N/A' }}</li>
                                <li class="">Email: {{ $member->email ?? 'N/A' }}</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $members->render() }}
        </div>
    </section>
@endsection
