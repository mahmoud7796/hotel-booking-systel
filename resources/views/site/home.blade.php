@extends('site.layouts.master')
@section('content')
	<!-- Slider Section Start -->
	<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
	  <div class="carousel-inner">
          @if(isset($banners) && $banners->count()>0)
	  	@foreach($banners as $index => $banner)
	    <div class="carousel-item {{$index == 0 ? 'active':''}}">
	      <img src="{{$banner->banner_src ?? ''}}" class="d-block w-100" alt="{{$banner->alt_text ?? 'no photo available'}}">
	    </div>
	    @endforeach
          @else
              <h1 style="text-align: center">There is no Sliders Added</h1>  {{-- No data display message --}}
              @endif
	  </div>
	  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Previous</span>
	  </button>
	  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Next</span>
	  </button>
	</div>
	<!-- Slider Section End -->

	<!-- Service Section Start -->
	<div class="container my-4">
		<h1 class="text-center border-bottom" id="services">Services</h1>
		<div class="row my-4">
			<div class="col-md-3">
                @if(isset($banners) && $banners->count()>0)
				<a href=""><img class="img-thumbnail" style="width:100%;" src="{{$banners[1]['banner_src']}}" /></a>
                    @else
                    <a href=""><img alt="There is no photo added" class="img-thumbnail" style="width:100%;" src="" /></a>
                    @endif
            </div>
			<div class="col-md-8">
				<h3>Servie</h3>
				<p>Anothe Service</p>
				<p>
					<a href="" class="btn btn-primary">Read More</a>
				</p>
			</div>
		</div>
	</div>
	<!-- Service Section End -->
	<!-- Gallery Section Start -->
	<div class="container my-4">
		<h1 class="text-center border-bottom" id="gallery">Gallery</h1>
		<div class="row my-4">
            @if(isset($roomTypes)&&$roomTypes->count()>0)
            @foreach($roomTypes as $rtype)
			<div class="col-md-3">
				<div class="card">
					<h5 class="card-header">{{$rtype->title}}</h5>
					<div class="card-body">
						@foreach($rtype->roomtypeimgs as $index => $img)
                        	<a href="{{$img->img_src}}" data-lightbox="rgallery{{$rtype->id ?? ''}}">
                        		@if($index > 0)
                        		<img class="img-fluid hide" src="{{$img->img_src ?? ''}}"/>
                        		@else
                        		<img class="img-fluid" src="{{$img->img_src ?? ''}}" />
                        		@endif
                        	</a>
                        </td>
                        @endforeach

					</div>
				</div>
			</div>
			@endforeach
            @else
                <h1 style="text-align: center">There is no Gallery Added</h1>  {{-- No data display message --}}
            @endif
		</div>
	</div>
	<!-- Gallery Section End -->


<!-- LightBox css -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/lightbox2-2.11.3/dist/css/lightbox.min.css')}}" />
<!-- LightBox Js -->
<script type="text/javascript" src="{{asset('assets/vendor/lightbox2-2.11.3/dist/js/lightbox.min.js')}}"></script>
<style type="text/css">
	.hide{
		display: none;
	}
</style>
@endsection
</body>
</html>
