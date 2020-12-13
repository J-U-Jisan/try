@extends('layouts.index')

@section('title','Member | ')

@section('meta_title','Member | Try')

@section('description', 'Members of Try. The people who work voluntarily for helping helpless people.')

@section('content')
    <section class="clearfix section-padding" style="background: #e5e7e6">
        <div class="event container">
            <div class="d-flex justify-content-center flex-wrap">
                @foreach($members as $member)
                    <div class="card m-2" style="width: 20rem;height: 430px; background: #abe0cf; border-radius: 1%;">
                        <img class="card-img-top" style="max-height: 260px;" src="{{ asset('storage/member/'.$member->image) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $member->name }}</h5>
                            <p class="card-text">{{ $member->rank }}</p>
                            <ul class="list-unstyled list-group-horizontal ml-0">
                                <li class="">Mobile: {{ $member->mobile ?? 'N/A' }}</li>
                                <li class="">Email: {{ $member->email ?? 'N/A' }}</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $members->onEachSide(2)->render() }}
        </div>
    </section>
@endsection
