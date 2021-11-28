@extends('site.layouts.master')
@section('content')
<div class="container my-4">
	<h3 class="mb-3">Register</h3>
    @include('admin.includes.alerts.errors')
    @include('admin.includes.alerts.success')
	<form method="post" enctype="multipart/form-data" action="{{route('site.register.store')}}">
		@csrf
		<table class="table table-bordered">

            <tr>
				<th>Full Name<span class="text-danger">*</span></th>
				<td><input type="text" class="form-control" name="full_name">
                    @error('full_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </td>
			</tr>
			<tr>
				<th>Email<span class="text-danger">*</span></th>
				<td><input type="email" class="form-control" name="email">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </td>
			</tr>
			<tr>
				<th>Password<span class="text-danger">*</span></th>
				<td><input type="password" class="form-control" name="password">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </td>
			</tr>
			<tr>
				<th>Mobile<span class="text-danger">*</span></th>
				<td><input type="text" class="form-control" name="mobile">
                    @error('mobile')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </td>
			</tr>
			<tr>
				<th>Address</th>
				<td><input type="text" class="form-control" name="address">
                    @error('address')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" class="btn btn-primary" /></td>
			</tr>
		</table>
	</form>
</div>
@endsection
