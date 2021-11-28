@extends('admin.layouts.master')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Banners
                                <a href="{{route('admin.booking.create')}}" class="float-right btn btn-success btn-sm">Add New</a>
                            </h6>
                        </div>
                        @include('admin.includes.alerts.errors')
                        @include('admin.includes.alerts.success')
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Room No.</th>
                                    <th>Room Type</th>
                                    <th>CheckIn Date</th>
                                    <th>CheckOut Date</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Room No.</th>
                                    <th>Room Type</th>
                                    <th>CheckIn Date</th>
                                    <th>CheckOut Date</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($bookings as $booking)
                                    <tr>
                                        <td>{{$booking->id}}</td>
                                        <td>{{$booking->customer->full_name}}</td>
                                        <td>{{$booking->room->title}}</td>
                                        <td>{{$booking->room->Roomtype->title}}</td>
                                        <td>{{$booking->checkin_date}}</td>
                                        <td>{{$booking->checkout_date}}</td>
                                        <td>{{$booking->status}}</td>
                                        <td><a href="{{route('admin.booking.delete',$booking->id)}}" class="text-danger" onclick="return confirm('Are you sure you want to delete this data?')"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                @endforeach
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
