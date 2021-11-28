@extends('site.layouts.master')
@section('content')
<div class="container my-4">
	<h3 class="mb-3">Room Booking</h3>

    @include('admin.includes.alerts.errors')
    @include('admin.includes.alerts.success')
    <div class="table-responsive">
        <form method="post" enctype="multipart/form-data" action="{{route('site.booking.store')}}">
            @csrf
            <table class="table table-bordered">
                @Auth('customer')
                    <input type="hidden" name="id" value="{{Auth::guard('customer')->user()->id}}">
                    @endif
                <tr>
                    <th>Branch<span class="text-danger">*</span></th>
                    <td> <label for="projectinput1"> Choose Locations</label>
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
                    <th>CheckIn Date <span class="text-danger">*</span></th>
                    <td><input name="checkin_date" type="date" class="form-control checkin-date" />
                        @error('checkin_date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>CheckOut Date <span class="text-danger">*</span></th>
                    <td><input name="checkout_date" type="date" class="form-control" />
                        @error('checkout_date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>Avaiable Rooms <span class="text-danger">*</span></th>
                    <td>
                        <select class="form-control room-list" name="room_id">

                        </select>
                        <p>Price: <span class="show-room-price"></span></p>
                        @error('room_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>Total Adults <span class="text-danger">*</span></th>
                    <td><input name="total_adults" type="text" class="form-control" />
                        @error('total_adults')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>Total Children</th>
                    <td><input name="total_children" type="text" class="form-control" />
                        @error('total_children')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="roomprice" class="room-price" value="" />
                        <input type="submit" class="btn btn-primary" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $(".checkin-date").on('blur',function(){
            var _checkindate=$(this).val();
            // Ajax
            $.ajax({
                url:"{{url('site/booking')}}/available-rooms/"+_checkindate,
                dataType:'json',
                beforeSend:function(){
                    $(".room-list").html('<option>--- Loading ---</option>');
                },
                success:function(res){
                    var _html='';
                    $.each(res.data,function(index,row){
                        _html+='<option data-price="'+row.roomtype.price+'" value="'+row.room.id+'">'+row.room.title+'-'+row.roomtype.title+'</option>';
                    });
                    $(".room-list").html(_html);

                    var _selectedPrice=$(".room-list").find('option:selected').attr('data-price');
                    $(".room-price").val(_selectedPrice);
                    $(".show-room-price").text(_selectedPrice);

                }
            });
        });

        $(document).on("change",".room-list",function(){
            var _selectedPrice=$(this).find('option:selected').attr('data-price');
            $(".room-price").val(_selectedPrice);
            $(".show-room-price").text(_selectedPrice);
        });

    });
</script>

@endsection
