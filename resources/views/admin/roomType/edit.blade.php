@extends('admin.layouts.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Room Type
                    <a href="{{route('admin.roomType')}}" class="float-right btn btn-success btn-sm">View All</a>
                </h6>
            </div>
            <div class="card-body">
                @include('admin.includes.alerts.errors')
                @include('admin.includes.alerts.success')
                <div class="table-responsive">
                    <form enctype="multipart/form-data" method="post" action="{{route('admin.roomType.update', $roomTypes->id)}}">
                        @csrf
                        <input name="id" value="{{$roomTypes -> id}}" type="hidden">
                        <table class="table table-bordered" >
                            <tr>
                                <th>Title<span class="text-danger">*</span></th>
                                <td><input value="{{$roomTypes->title}}" name="title" type="text" placeholder="Country Name" class="form-control" />
                                    @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Details<span class="text-danger">*</span></th>
                                <td><input value="{{$roomTypes->details}}"  name="details" type="text" placeholder="City Name" class="form-control"/>
                                    @error('details')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <th>Price<span class="text-danger">*</span></th>
                                <td><input value="{{$roomTypes->price}}" name="price" class="form-control" type="text" placeholder="Address Details"/>
                                    @error('price')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <th>Gallery Images</th>
                                <td>
                                    <table class="table table-bordered mt-3">
                                        <tr>
                                            <input type="file" multiple name="imgs[]" />
                                            @foreach($roomTypes->roomtypeimgs as $img)
                                                <td class="imgcol{{$img->id}}">
                                                    <img width="150" src="{{$img->img_src}}" />
                                                    <p class="mt-2">
                                                        <button type="button" onclick="return confirm('Are you sure you want to delete this image??')" class="btn btn-danger btn-sm delete-image" data-image-id="{{$img->id}}"><i class="fa fa-trash"></i></button>
                                                    </p>
                                                </td>
                                            @endforeach
                                        </tr>
                                    </table>
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
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".delete-image").on('click',function(){
                var _img_id=$(this).attr('data-image-id');
                var _vm=$(this);
                $.ajax({
                    url:"{{url('admin/room-type/destroy-img')}}/"+_img_id,
                    dataType:'json',
                    beforeSend:function(){
                        _vm.addClass('disabled');
                    },
                    success:function(res){
                        if(res.bool==true){
                            $(".imgcol"+_img_id).remove();
                        }
                        _vm.removeClass('disabled');
                    }
                });
            });
        });
    </script>
@endsection

@endsection
