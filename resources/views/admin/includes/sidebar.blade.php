{{-- from main panel --}}
{{-- <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>
      </div> --}}
{{-- from main panel end --}}
<!-- ########## START: LEFT PANEL ########## -->
<div class="sl-sideleft">
  <div class="sl-sideleft-menu">
    <a href="{{ url('admin/home')}}" class="sl-menu-link active">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">Dashboard</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
        <span class="menu-item-label">Category</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('category') }}" class="nav-link">Category</a></li>
      <li class="nav-item"><a href="{{ route('sub_Category') }}" class="nav-link">Sub Category</a></li>
      <li class="nav-item"><a href="{{ route('brand') }}" class="nav-link">Brand</a></li>
    </ul>
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
        <span class="menu-item-label">Coupon</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('admin.coupon')}}" class="nav-link">Coupon</a></li>
    </ul>
   
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
        <span class="menu-item-label">Products</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('add_product') }}" class="nav-link">Add Product</a></li>
      <li class="nav-item"><a href="{{ route('all_product') }}" class="nav-link">All Products</a></li>
    </ul>

    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
        <span class="menu-item-label">Other's</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('admin.newslatter')}}" class="nav-link">Newslatter</a></li>
      <li class="nav-item"><a href="page-signin.html" class="nav-link">Signin Page</a></li>
      <li class="nav-item"><a href="page-signup.html" class="nav-link">Signup Page</a></li>
      <li class="nav-item"><a href="page-notfound.html" class="nav-link">404 Page Not Found</a></li>
    </ul>
  </div><!-- sl-sideleft-menu -->

  <br>
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: RIGHT PANEL ########## -->
<div class="sl-sideright">
  <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
    </li>
  </ul><!-- sidebar-tabs -->

  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
      <div class="media-list">
        <!-- loop starts here -->
        <a href="" class="media-list-link">
          <div class="media">
            <img src="{{asset('backend/img/img3.jpg')}}" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
              <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
              <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
            </div>
          </div><!-- media -->
        </a>
        <!-- loop ends here -->
        <a href="" class="media-list-link">
          <div class="media">
            <img src="{{asset('backend/img/img4.jpg')}}" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
              <span class="d-block tx-11 tx-gray-500">3 hours ago</span>
              <p class="tx-13 mg-t-10 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link">
          <div class="media">
            <img src="{{asset('backend/img/img7.jpg')}}" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Robert Walker</p>
              <span class="d-block tx-11 tx-gray-500">5 hours ago</span>
              <p class="tx-13 mg-t-10 mg-b-0">I should be incapable of drawing a single stroke at the present moment..</p>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link">
          <div class="media">
            <img src="{{asset('backend/img/img5.jpg')}}" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Larry Smith</p>
              <span class="d-block tx-11 tx-gray-500">Yesterday, 8:34pm</span>

              <p class="tx-13 mg-t-10 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes..</p>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link">
          <div class="media">
            <img src="{{asset('backend/img/img3.jpg')}}" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
              <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
              <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
            </div>
          </div><!-- media -->
        </a>
      </div><!-- media-list -->
      <div class="pd-15">
        <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
      </div>
    </div><!-- #messages -->

    <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
      <div class="media-list">
        <!-- loop starts here -->
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="{{asset('backend/img/img8.jpg')}}" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
              <span class="tx-12">October 03, 2017 8:45am</span>
            </div>
          </div><!-- media -->
        </a>
        <!-- loop ends here -->
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="{{asset('backend/img/img9.jpg')}}" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
              <span class="tx-12">October 02, 2017 12:44am</span>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="{{asset('backend/img/img10.jpg')}}" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
              <span class="tx-12">October 01, 2017 10:20pm</span>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="{{asset('backend/img/img5.jpg')}}" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
              <span class="tx-12">October 01, 2017 6:08pm</span>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="{{asset('backend/img/img8.jpg')}}" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
              <span class="tx-12">September 27, 2017 6:45am</span>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="{{asset('backend/img/img10.jpg')}}" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
              <span class="tx-12">September 28, 2017 11:30pm</span>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="{{asset('backend/img/img9.jpg')}}" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
              <span class="tx-12">September 26, 2017 11:01am</span>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="{{asset('backend/img/img5.jpg')}}" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
              <span class="tx-12">September 23, 2017 9:19pm</span>
            </div>
          </div><!-- media -->
        </a>
      </div><!-- media-list -->
    </div><!-- #notifications -->

  </div><!-- tab-content -->
</div><!-- sl-sideright -->
<!-- ########## END: RIGHT PANEL ########## --->