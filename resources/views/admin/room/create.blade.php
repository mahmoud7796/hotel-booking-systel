@extends('admin.layouts.master')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Room
                                <a href="{{route('admin.room')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @include('admin.includes.alerts.errors')
                            @include('admin.includes.alerts.success')
                            <div class="table-responsive">
                                <form method="post" action="{{route('admin.room.store')}}">
                                    @csrf
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Title<span class="text-danger">*</span></th>
                                            <td><input value="{{old('title')}}" name="title" type="text" placeholder="title Name" class="form-control" />
                                                @error('title')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Location<span class="text-danger">*</span></th>
                                            <td> <label for="projectinput1"> Choose Location</label>
                                                <select name="location_id" class="select2 form-control">
                                                    <optgroup label="Choose Location">
                                                        @if($locations && $locations -> count() > 0 )
                                                            @foreach($locations as $location)
                                                                <option value="{{$location -> id}}"> {{$location -> address}} </option>
                                                            @endforeach
                                                        @endif
                                                    </optgroup>
                                                </select>
                                                @error('location_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Room Type<span class="text-danger">*</span></th>
                                            <td> <label for="projectinput1"> Choose Room Type</label>
                                                <select name="room_type_id" class="select2 form-control">
                                                    <optgroup label="Choose Room Type">
                                                        @if($roomTypes && $roomTypes -> count() > 0 )
                                                            @foreach($roomTypes as $roomType)
                                                                <option value="{{$roomType -> id}}"> {{$roomType -> title}} </option>
                                                            @endforeach
                                                        @endif
                                                    </optgroup>

                                                </select>
                                                @error('room_type_id')
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
