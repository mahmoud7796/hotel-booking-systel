@extends('admin.layouts.master')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{$roomTypes->title}}
                                <a href="{{route('admin.roomType')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" >
                                    <tr>
                                        <th>Title</th>
                                        <td>{{$roomTypes->title}}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{$roomTypes->price}}</td>
                                    </tr>
                                    <tr>
                                        <th>Detail</th>
                                        <td>{{$roomTypes->details}}</td>
                                    </tr>
                                    <tr>
                                        <th>Gallery Images</th>
                                        <td>
                                            <table class="table table-bordered mt-3">
                                                <tr>
                                                    @foreach($roomTypes->roomtypeimgs as $img)
                                                    <td class="imgcol{{$img->id}}">
                                                        <img width="150" src="{{$img->img_src}}" />
                                                    </td>
                                                    @endforeach
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection
