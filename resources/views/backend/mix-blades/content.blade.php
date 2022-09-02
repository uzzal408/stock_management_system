@extends('backend.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-cab"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('backend.partials.flash')
    <div class="row user">
        <div class="col-md-1"></div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tile">
                    <form action="{{ route('admin.contents.update') }}" method="POST" role="form">
                        @csrf
                        <h3 class="tile-title">Page Static Content</h3>
                        <hr>
                        <div class="tile-body">
                            <div class="form-group">
                                <label class="control-label" for="total_file">About Page Title</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Enter a title for about page"
                                    id="about_page_title"
                                    name="about_page_title"
                                    value="{{ config('settings.about_page_title') }}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="about_page">About Page Content</label>
                                <textarea
                                    class="form-control"
                                    rows="4"
                                    placeholder="Write Description for about page"
                                    id="about_page"
                                    name="about_page"
                                >{!! Config::get('settings.about_page') !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="package_page_title">Packages Page title</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="package_page_title"
                                    id="package_page_title"
                                    name="package_page_title"
                                    value="{{ config('settings.package_page_title') }}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="about_page">Package Page Content</label>
                                <textarea
                                    class="form-control"
                                    rows="4"
                                    placeholder="Write Description for package page"
                                    id="package_page"
                                    name="package_page"
                                >{!! Config::get('settings.package_page') !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="total_project">Payment Page Title</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Enter payment page title"
                                    id="payment_page_title"
                                    name="payment_page_title"
                                    value="{{ config('settings.payment_page_title') }}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="payment_page">Payment Page Content</label>
                                <textarea
                                    class="form-control"
                                    rows="4"
                                    placeholder="Write Description for payment page"
                                    id="payment_page"
                                    name="payment_page"
                                >{!! Config::get('settings.payment_page') !!}</textarea>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Portfolio</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
