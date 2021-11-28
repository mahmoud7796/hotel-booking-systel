@extends('admin.layouts.master')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Customer
                                <a href="{{route('admin.customer')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @include('admin.includes.alerts.errors')
                            @include('admin.includes.alerts.success')
                            <div class="table-responsive">
                                <form method="post" enctype="multipart/form-data" action="{{route('admin.customer.store')}}">
                                    @csrf
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Customer Image<span class="text-danger">*</span></th>
                                            <td><input name="photo" type="file" />
                                                @error('photo')
                                            <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Full Name <span class="text-danger">*</span></th>
                                            <td><input name="full_name" type="text" class="form-control" />
                                                @error('full_name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Email <span class="text-danger">*</span></th>
                                            <td><input type="email" name="email" type="text" class="form-control" />
                                                @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Password <span class="text-danger">*</span></th>
                                            <td><input type="password" name="password" type="text" class="form-control" />
                                                @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Mobile <span class="text-danger">*</span></th>
                                            <td><input name="mobile" type="text" class="form-control" />
                                                @error('mobile')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Address <span class="text-danger">*</span></th>
                                            <td><input name="address" type="text" class="form-control" />
                                                @error('address')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                        </tr>



                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" class="btn btn-primary" />
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection
