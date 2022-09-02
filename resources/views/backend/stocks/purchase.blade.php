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
        <div class="col-md-12 mx-auto">
            <div class="tile">
                <div class="tile-body">
                    <form action="{{ route('stock.search') }}" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <select class="form-control" id="cate" data-live-search="true" name="category">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            @if($products!=null)
                <form method="POST" action="{{ route('stock.in') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <div class="tile">
                                <div class="tile-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="supplier">Supplier<span class="m-l-5 text-danger"> *</span></label>
                                                <select class="form-control @error('supplier_id') is-invalid @enderror" id="supplier" data-live-search="true" name="supplier_id">
                                                    @foreach($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('supplier_id')<p style="color: red">{{ $message }}</p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="name">P.O<span class="m-l-5 text-danger"> *</span></label>
                                                <input class="form-control @error('po_number') is-invalid @enderror" type="text" name="po_number" id="po_number" value="{{ old('po_number') }}" />
                                                @error('po_number')<p style="color: red">{{ $message }}</p> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <table class ="table table-hover table-bordered" id="example">
                                            <thead>
                                                <th>Product Name</th>
                                                <th>SKU</th>
                                                <th>Qty</th>
                                            </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                            <div class="form-group">
                                                <td>
                                                    {{ $product->name }}
                                                    <input type="hidden" class="form-control" name="product_id[]" value="{{ $product->id }}">
                                                </td>
                                                <td>{{ $product->sku }}</td>
                                                <td>
                                                    <input type="text" class="form-control" name="qty[]" value="0">
                                                </td>
                                            </div>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <input type="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('public/backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
