@extends('admin.layouts.master')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Locations
                                <a href="{{route('admin.roomType.create')}}" class="float-right btn btn-success btn-sm">Add New</a>
                            </h6>
                        </div>
                        @include('admin.includes.alerts.errors')
                        @include('admin.includes.alerts.success')
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Details</th>
                                            <th>Price</th>
                                            <th>Gallary</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Details</th>
                                            <th>Price</th>
                                            <th>Gallary</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if(isset($roomTypes) && $roomTypes->count()>0)
                                            @foreach($roomTypes as $roomType)
                                            <tr>
                                                <td>{{$roomType->title}}</td>
                                                <td>{{$roomType->details ?? 'No Details Avalibile'}}</td>
                                                <td>{{$roomType->price}}<span>$</span></td>
                                                <td>{{count($roomType->roomtypeimgs)}}</td>
                                                <td>
                                                    <a href="{{route('admin.roomType.show', $roomType->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                    <a href="{{route('admin.roomType.edit', $roomType->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete this data?')" href="{{route('admin.roomType.delete', $roomType->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@section('scripts')
    <!-- Custom styles for this page -->
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Page level plugins -->
    <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('assets/js/demo/datatables-demo.js')}}"></script>

@endsection
@endsection
