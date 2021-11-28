<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-hotel"></i>
        </div>
        <div class="sidebar-brand-text mx-3">A Hotel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Masters
    </div>

    <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/banner*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#bannerSection"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-images"></i>
            <span>HomePage Banners</span>
        </a>
        <div id="bannerSection" class="collapse @if(request()->is('admin/banner*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.banner.create')}}">Add New</a>
                <a class="collapse-item" href="{{route('admin.banner')}}">View All</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/location*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#locationsection"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-images"></i>
            <span>Locations</span>
        </a>
        <div id="locationsection" class="collapse @if(request()->is('admin/location*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.location.create')}}">Add New</a>
                <a class="collapse-item" href="{{route('admin.location')}}">View All</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/room-type*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#roomtype"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-table"></i>
            <span>RoomType</span>
        </a>
        <div id="roomtype" class="collapse @if(request()->is('admin/room-type*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.roomType.create')}}">Add New</a>
                <a class="collapse-item" href="{{route('admin.roomType')}}">View All</a>
            </div>
        </div>
    </li>

    <!-- RoomMaster -->
    <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/rooms*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#roomMaster"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-box"></i>
            <span>Room</span>
        </a>
        <div id="roomMaster" class="collapse @if(request()->is('admin/rooms*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.room.create')}}">Add New</a>
                <a class="collapse-item" href="{{route('admin.room')}}">View All</a>
            </div>
        </div>
    </li>

    <!-- CustomerMaster -->
    <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/customer*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#CustomerMaster"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Customers</span>
        </a>
        <div id="CustomerMaster" class="collapse @if(request()->is('admin/customer*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.customer.create')}}">Add New</a>
                <a class="collapse-item" href="{{route('admin.customer')}}">View All</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.booking')}}">
            <i class="fas fa-hotel"></i>
            <span>Bookings</span></a>
    </li>


    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/logout')}}">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

</ul>
