@extends('backend.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $pageSubTitle }}</p>
        </div>
{{--        <a href="{{ route('admin.products.create') }}" class="btn btn-primary pull-right">Add new product</a>--}}
    </div>
    @include('backend.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th>Product name</th>
                            <th>SKU</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $sl = 0 @endphp
                        @foreach($stocks as $key=>$stock)
                            <tr>
                                <td>{{ ++$sl }}</td>
                                <td>{{ $stock->product->name }}</td>
                                <td>{{ $stock->product->sku }}</td>
                                <td>{{ $stock->quantity }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('public/backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
