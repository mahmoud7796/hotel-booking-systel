@extends('admin.layouts.master')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Banner
                                <a href="{{route('admin.banner')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @include('admin.includes.alerts.errors')
                            @include('admin.includes.alerts.success')
                            <div class="table-responsive">
                                <form method="post" enctype="multipart/form-data" action="{{route('admin.banner.store')}}">
                                    @csrf
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Banner Image<span class="text-danger">*</span></th>
                                            <td><input name="banner_src" type="file" />
                                                @error('banner_src')
                                            <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Alt Text <span class="text-danger">*</span></th>
                                            <td><input name="alt_text" type="text" class="form-control" />
                                                @error('alt_text')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Publish Status<span class="text-danger">*</span></th>
                                            <td><input name="publish_status" type="checkbox" />

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
