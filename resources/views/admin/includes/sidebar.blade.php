<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        
      @if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='moderator')
      
      <li  class="{{url()->current() == url('/moderator')?'active':''}}">
          <a href="{{URL::to('/moderator')}}"><i class="fa fa-home"></i> <span>Dashboard</span> </a>
      </li>
      @elseif(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='admin')
      <li  class="{{url()->current() == url('/admin')?'active':''}}">
          <a href="{{URL::to('/admin')}}"><i class="fa fa-home"></i> <span> Dashboard</span> </a>
      </li>
      @endif


      @if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='moderator')

        <li class="treeview">
          <a href="#"><i class="fa fa-list"></i> <span>My Listings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php $userId = Sentinel::getUser()->id;?>
            <li><a href="{{url('/view-authactive-lists')}}">Active listing
              <i>({{$AddList->where('user_id',$userId)->where('status',1)->count()}})</i></a></li>
            <li><a href="{{url('/view-authpending-lists')}}">Pending listing 
              <i class="">({{$AddList->where('user_id',$userId)->where('status',0)->count()}})</i></a></li>
            <li><a href="{{url('/view-authexpired-lists')}}">Expired listing
                <i class="">({{$AddList->where('user_id',$userId)->where('status',2)->count()}})</i></a></li>
          </ul>
        </li>

        <li class="">
          <a href="{{url('/authorBookmark')}}"><i class="fa fa-bookmark"></i> <span>My Bookmarks</span></a>
        </li>
        <li class="">
          <a href="{{url('/add-lists-user')}}"><i class="fa fa-plus"></i> <span>Add Listing</span></a>
        </li>
        <li class="{{url()->current() == url('/categroy')?'active':''}}">
          <a href="{{url('/category')}}"><i class="fa fa-th-list"></i> <span>Manage Category</span></a>
        </li>
        <li class="{{url()->current() == url('/city')?'active':''}}">
          <a href="{{url('/city')}}"><i class="fa fa-map-marker"></i> <span>Manage City</span></a>
        </li>
        <li class="{{url()->current() == url('/posts')?'active':''}}">
          <a href="{{url('/posts')}}"><i class="fa fa-gift"></i> <span>Manage Listings</span></a></li>
      @endif
      
      @if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='admin')  

        <li class="treeview">
          <a href="#"><i class="fa fa-list"></i> <span>My Listings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php $userId = Sentinel::getUser()->id;?>
            <li><a href="{{url('/view-authactive-lists')}}">Active listing
              <i>({{$AddList->where('user_id',$userId)->where('status',1)->count()}})</i></a></li>
            <li><a href="{{url('/view-authpending-lists')}}">Pending listing 
              <i class="">({{$AddList->where('user_id',$userId)->where('status',0)->count()}})</i></a></li>
            <li><a href="{{url('/view-authexpired-lists')}}">Expired listing
                <i class="">({{$AddList->where('user_id',$userId)->where('status',2)->count()}})</i></a></li>
          </ul>
        </li>
        <li class="{{url()->current() == url('/authorBookmark')?'active':''}}">
          <a href="{{url('/authorBookmark')}}"><i class="fa fa-bookmark"></i> <span>My Bookmarks</span></a>
        </li>
        <li class="{{url()->current() == url('/add-lists-user')?'active':''}}">
          <a href="{{url('/add-lists-user')}}"><i class="fa fa-plus"></i> <span>Add Listing</span></a>
        </li>

        <li class="{{url()->current() == url('/categroy')?'active':''}}">
          <a href="{{url('/category')}}"><i class="fa fa-th-list"></i> <span>Manage Category</span></a>
        </li>
        <li class="{{url()->current() == url('/city')?'active':''}}">
          <a href="{{url('/city')}}"><i class="fa fa-map-marker"></i> <span>Manage City</span></a>
        </li>
        <li class="{{url()->current() == url('/posts')?'active':''}}">
          <a href="{{url('/posts')}}"><i class="fa fa-gift"></i> <span>Manage Listings</span></a></li>
        
        <li class="{{url()->current() == url('/clients')?'active':''}}">
          <a href="{{url('/clients')}}"><i class="fa fa-medium"></i> <span>Manage Clients</span></a></li>

        <li class="{{url()->current() == url('/amenities')?'active':''}}">
          <a href="{{url('/amenities')}}"><i class="fa fa-lock"></i> <span>Manage Amenities</span></a></li>

        <li ><a href="{{url('/staffs')}}"><i class="fa fa-users"></i> <span>Manage Users</span></a></li>
        
        <li class="{{url()->current() == url('/advertise')?'active':''}}">
          <a href="{{url('/advertise')}}"><i class="fa fa-link"></i> <span>Advertisements</span></a></li>
        <li class="{{url()->current() == url('/subscribers')?'active':''}}">
          <a href="{{url('/subscribers')}}"><i class="fa fa-users"></i> <span>Subscribers</span></a>
        </li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-cogs"></i> <span>General Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
            <a href="{{url('/general-setting')}}"><i class="fa fa-picture-o" aria-hidden="true"></i>Logo & Favicon</a></li>

            <li>
              <a href="{{url('/social-settings')}}">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>Manage Social</a></li>
            <li>
            <li>
              <a href="{{url('/menu')}}">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>Manage Menu</a></li>
            <li>
            <li>
              <a href="{{url('/manage-slider')}}">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>Manage Slider</a></li>
            
            <li><a href="{{url('/general-setting-text')}}"><i class="fa fa-sitemap" aria-hidden="true"></i>About us / Sitemap</a></li>
            <li><a href="{{url('/background-image')}}"><i class="fa fa-picture-o" aria-hidden="true"></i>Background Image Setup</a></li>
          </ul>
        </li>

        <li class="{{url()->current() == url('/testimonial')?'active':''}}">
          <a href="{{url('/testimonial')}}"><i class="fa fa-commenting-o" aria-hidden="true"></i> <span>Testimonial</span></a>
        </li>
        @endif  
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>