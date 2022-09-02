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
                <form action="{{ route('admin.products.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Name<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name',$t_product->name) }}" />
                            <input type="hidden" name="id" value="{{ $t_product->id }}">
                            @error('name')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="category_id">Category<span class="m-l-5 text-danger"> *</span></label>
                            <select name="category_id" class="form-control" id="category_id">
                                <option value=" ">Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ ($t_product->category_id==$category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')<p style="color: red">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="sku">SKU<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('sku') is-invalid @enderror" type="text" name="sku" id="sku" value="{{ old('sku',$t_product->sku) }}" />
                            <input type="hidden" name="id" value="{{ $t_product->id }}">
                            @error('sku')<p style="color: red">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="mobile">Price<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{ old('price',$t_product->price) }}" />
                            <input type="hidden" name="id" value="{{ $t_product->id }}">
                            @error('price')<p style="color: red">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="minimum_qty">Minimum Qty<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('minimum_qty') is-invalid @enderror" type="number" name="minim_qty" id="minimum_qty" value="{{ old('minim_qty',$t_product->minimum_qty) }}" />
                            <input type="hidden" name="id" value="{{ $t_product->id }}">
                            @error('minimum_qty')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="unit">Unit<span class="m-l-5 text-danger"> *</span></label>
                            <select name="unit" class="form-control" id="unit">
                                <option value=" ">Select a unit</option>
                                <option value="pcs" {{ ($t_product->unit=='pcs') ? 'selected' : '' }}>PCS</option>
                                <option value="packet" {{ ($t_product->unit=='packet') ? 'selected' : '' }}>Packet</option>
                                <option value="kg" {{ ($t_product->unit=='kg') ? 'selected' : '' }}>KG</option>
                                <option value="ltr" {{ ($t_product->unit=='ltr') ? 'selected' : '' }}>Litre</option>
                            </select>
                            @error('unit')<p style="color: red">{{ $message }}</p> @enderror
                        </div>


                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="status" name="status"
                                        {{ (old('status'=='on') || $t_product->status==1) ? 'checked' : '' }}
                                    />Enable
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.products.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
