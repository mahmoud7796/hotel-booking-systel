<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link href="{{asset('assets/bs5/bootstrap.min.css')}}" rel="stylesheet" />
	<script type="text/javascript" src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/bs5/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <div class="container">
	    <a class="navbar-brand" href="{{url('/')}}">A Hotel</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	      <div class="navbar-nav ms-auto">
              <a class="nav-link" aria-current="page" href="{{url('/')}}">Home</a>
              <a class="nav-link" aria-current="page" href="#services">Services</a>
	        <a class="nav-link" href="#gallery">Gallery</a>
	        <a class="nav-link" href="{{route('site.about')}}">About Us</a>
	        <a class="nav-link" href="{{route('site.contactUs')}}">Contact Us</a>
            @auth('customer')
	        <a class="nav-link" href="{{url('logout')}}">Logout</a>
              @endif
              @guest('customer')
	        <a class="nav-link" href="{{route('site.login')}}">Login</a>
	        <a class="nav-link" href="{{route('site.register')}}">Register</a>
              @endif
              <a class="nav-link btn btn-sm btn-danger" href="{{route('site.booking')}}">Booking</a>
	      </div>
	    </div>
	  </div>
	</nav>
		<main>
			@yield('content')
		</main>
	</body>
</html>
