@extends('admin.layouts.master')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update Banner
                                <a href="{{route('admin.banner')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @include('admin.includes.alerts.errors')
                            @include('admin.includes.alerts.success')
                            <div class="table-responsive">
                                <form method="post" enctype="multipart/form-data" action="{{route('admin.banner.update', $banners->id)}}">
                                    @csrf
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Banner Image<span class="text-danger">*</span></th>
                                            <input name="id" value="{{$banners -> id}}" type="hidden">
                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src="{{$banners ->banner_src}}"
                                                        class="rounded-circle" style="width: 150px; height: 150px" alt="Banner Image">
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <th>Alt Text <span class="text-danger">*</span></th>
                                            <td><input value="{{$banners->alt_text}}" name="alt_text" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Publish Status<span class="text-danger">*</span></th>
                                            <td><input @if($banners->publish_status==1) checked @endif name="publish_status" type="checkbox" /></td>
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

