@extends('admin.layouts.master')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Location
                                <a href="{{route('admin.location')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @include('admin.includes.alerts.errors')
                            @include('admin.includes.alerts.success')
                            <div class="table-responsive">
                                <form method="post" action="{{route('admin.location.store')}}">
                                    @csrf
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Country<span class="text-danger">*</span></th>
                                            <td><input value="{{old('country')}}" name="country" type="text" placeholder="Country Name" class="form-control" />
                                                @error('country')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>City<span class="text-danger">*</span></th>
                                            <td><input value="{{old('city')}}"  name="city" type="text" placeholder="City Name" class="form-control"/>
                                                @error('city')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Address<span class="text-danger">*</span></th>
                                            <td><input value="{{old('address')}}" name="address" class="form-control" type="text" placeholder="Address Details"/>
                                                @error('address')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Latitude</th>
                                            <td><input value="{{old('latitude')}}" name="latitude" type="text" placeholder="Latitude (optional)" class="form-control"/>
                                                @error('Latitude')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Longitude</th>
                                            <td><input value="{{old('longitude')}}" name="longitude" type="text" class="form-control" placeholder="Longitude (optional)"/>
                                                @error('longitude')
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
