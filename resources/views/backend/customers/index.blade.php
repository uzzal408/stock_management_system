@extends('backend.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $pageSubTitle }}</p>
        </div>
        <a href="{{ route('admin.customers.create') }}" class="btn btn-primary pull-right">Add new customer</a>
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
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th class="text-center">Status</th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $sl = 0 @endphp
                        @foreach($customers as $key=>$customer)
                            <tr>
                                <td>{{ ++$sl }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->mobile }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->address }}</td>
                                <td class="text-center">
                                    @if ($customer->status == 1)
                                        <span class="badge badge-success">Yes</span>
                                    @else
                                        <span class="badge badge-danger">No</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        <a onclick="return confirm('Are you sure?')" href="{{ route('admin.customers.delete', $customer->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
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
