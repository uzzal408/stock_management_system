@extends('backend.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-bold"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('backend.partials.flash')
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#about" data-toggle="tab">About Content</a></li>
                    <li class="nav-item"><a class="nav-link" href="#package" data-toggle="tab">Package Content</a></li>
                    <li class="nav-item"><a class="nav-link" href="#payment" data-toggle="tab">Payment Content</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="about">
                    @include('backend.mix-blades.about')
                </div>
                <div class="tab-pane fade" id="package">
                    @include('backend.mix-blades.package')
                </div>
                <div class="tab-pane fade" id="payment">
                    @include('backend.mix-blades.payment')
                </div>
            </div>
        </div>
    </div>
@endsection
