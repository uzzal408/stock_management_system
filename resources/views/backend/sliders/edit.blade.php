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
            <form action="{{ route('admin.sliders.update') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label" for="title_one">Title <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('title_one') is-invalid @enderror" type="text" name="title_one" id="title_one" value="{{ old('title_one',$t_slider->title_one) }}" />
                        <input type="hidden" name="id" value="{{ $t_slider->id }}">
                        @error('title_one')<p style="color: red">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="title_two">Title (part two) <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('title_two') is-invalid @enderror" type="text" name="title_two" id="title_two" value="{{ old('title_two',$t_slider->title_two) }}" />
                        @error('title_two')<p style="color: red">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="url">Sorting<span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('sorting') is-invalid @enderror" type="text" name="sorting" id="sorting" value="{{ old('sorting',$t_slider->sorting) }}" />
                        @error('sorting')<p style="color: red">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="status" name="status" {{ (old('status',$t_slider->status)) == 1 ? 'checked' : '' }} />Enable
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12" id="dropzone">
                                <div>Image [height: 300px; File Size: Maximum 160KB ]</div>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                                @error('image') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                @if ($t_slider->image != null)
                                <figure class="mt-2" style="width: 80px; height: auto;">
                                    <img src="{{ asset('storage/'.$t_slider->image) }}" id="image" class="img-fluid" alt="img">
                                </figure>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="tile-footer">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
            &nbsp;&nbsp;&nbsp;
            <a class="btn btn-secondary" href="{{ route('admin.sliders.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
        </div>
        </form>
    </div>
</div>
</div>
@endsection
