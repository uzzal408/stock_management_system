@extends('backend.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $pageSubTitle }}</p>
        </div>
    </div>
    @include('backend.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $pageSubTitle }}</h3>
                <form action="{{ route('admin.packages.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Name<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $t_package->name) }}" />
                            <input type="hidden" name="id" value="{{ $t_package->id }}">
                            @error('name')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $t_package->title) }}" />
                            <input type="hidden" name="id" value="{{ $t_package->id }}">
                            @error('title')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="line_one">Line One<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('line_one') is-invalid @enderror" type="text" name="line_one" id="line_one" value="{{ old('line_one', $t_package->line_one) }}" />
                            <input type="hidden" name="id" value="{{ $t_package->id }}">
                            @error('line_one')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="line_two">Line Two<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('line_two') is-invalid @enderror" type="text" name="line_two" id="line_two" value="{{ old('line_two', $t_package->line_two) }}" />
                            <input type="hidden" name="id" value="{{ $t_package->id }}">
                            @error('line_two')<p style="color: red">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="line_three">Line Three<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('line_three') is-invalid @enderror" type="text" name="line_three" id="line_three" value="{{ old('line_three', $t_package->line_three) }}" />
                            <input type="hidden" name="id" value="{{ $t_package->id }}">
                            @error('line_three')<p style="color: red">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="price">Price<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{ old('price', $t_package->price) }}" />
                            <input type="hidden" name="id" value="{{ $t_package->id }}">
                            @error('price')<p style="color: red">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="price_time">Price On Time<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('price_time') is-invalid @enderror" type="text" name="price_time" id="price_time" value="{{ old('price_time', $t_package->price_time) }}" />
                            <input type="hidden" name="id" value="{{ $t_package->id }}">
                            @error('price_time')<p style="color: red">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="url">Sorting<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('sorting') is-invalid @enderror" type="text" name="sorting" id="sorting" value="{{ old('sorting',$t_package->sorting) }}" />
                            @error('sorting')<p style="color: red">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="status" name="status" {{ (old('status',$t_package->status)) == 1 ? 'checked' : '' }} />Enable
                                </label>
                            </div>
                        </div>
                    </div>
            <div class="tile-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                &nbsp;&nbsp;&nbsp;
                <a class="btn btn-secondary" href="{{ route('admin.packages.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
