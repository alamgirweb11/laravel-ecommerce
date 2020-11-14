@include('frontend.includes.header')
<body>

    <div class="super_container">
<header class="header">

    <!-- Top Bar -->

    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('frontend/images/phone.png')}}" alt=""></div>+38 068 005 3570</div>
                    <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('frontend/images/mail.png')}}" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
                    <div class="top_bar_content ml-auto">
                        <div class="top_bar_menu">
                            <ul class="standard_dropdown top_bar_dropdown">
                                <li>
                                    <a href="#">English<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="#">Italian</a></li>
                                        <li><a href="#">Spanish</a></li>
                                        <li><a href="#">Japanese</a></li>
                                    </ul>
                                </li>
                                {{-- <li>
                                    <a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="#">EUR Euro</a></li>
                                        <li><a href="#">GBP British Pound</a></li>
                                        <li><a href="#">JPY Japanese Yen</a></li>
                                    </ul>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="top_bar_user">
                            @guest
                              <div><a href="{{ route('login') }}">Register/Login</a></div>
                            @else 
                            <div class="top_bar_menu">
                                <ul class="standard_dropdown top_bar_dropdown">
                                    <li>
                                        <a href="{{ url('/') }}"><div class="user_icon"><img src="{{ asset('frontend/images/user.svg') }}" alt=""></div>
                                            {{ Auth::user()->name }}<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="">Wishlist</a></li>
                                            <li><a href="">Checkout</a></li>
                                            <li><a href="{{ route('user.logout') }}">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>		
    </div>
    <div class="header_main">
        <div class="container">
            <div class="row">

                <!-- Logo -->
                <div class="col-lg-2 col-sm-3 col-3 order-1">
                    <div class="logo_container">
                        <div class="logo"><a href="{{ url('/') }}">Ecom</a></div>
                    </div>
                </div>
                @php
                $categories = DB::table('categories')->get();
                @endphp
                <!-- Search -->
                <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">
                                <form action="#" class="header_search_form clearfix">
                                    <input type="search" required="required" class="header_search_input" placeholder="Search for products...">
                                    <div class="custom_dropdown">
                                        <div class="custom_dropdown_list">
                                            <span class="custom_dropdown_placeholder clc">All Categories</span>
                                            <i class="fas fa-chevron-down"></i>
                                            <ul class="custom_list clc">
                                                @foreach ($categories as $category)
                                                <li><a class="clc" href="#">{{ $category->category_name }}</a></li>
                                                @endforeach  
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="submit" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wishlist -->
                <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                    <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                        <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist_icon"><img src="images/heart.png" alt=""></div>
                            <div class="wishlist_content">
                                <div class="wishlist_text"><a href="#">Wishlist</a></div>
                                <div class="wishlist_count">115</div>
                            </div>
                        </div>

                        <!-- Cart -->
                        <div class="cart">
                            <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                <div class="cart_icon">
                                    <img src="images/cart.png" alt="">
                                    <div class="cart_count"><span>10</span></div>
                                </div>
                                <div class="cart_content">
                                    <div class="cart_text"><a href="#">Cart</a></div>
                                    <div class="cart_price">$85</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table> 
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img  src="{{ asset('frontend/images/avatar.png') }}"
                     style="border-radius: 50%; height: 150px; width:150px; margin-left:62px" alt="Card image cap">
                     <div class="card-body">
                         <div class="card-title text-center">{{ Auth::user()->name }}</div>
                     </div>
                     <ul class="list-group list-group-flush mt-2">
                      <li class="list-group-item"><a href="{{ route('password.change') }}">Password Change</a></li>
                      <li class="list-group-item">Dapibus ac facilisis in</li>
                      <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                    <div class="card-body">
                      <a href="{{ route('user.logout') }}" class="btn btn-block btn-primary">Logout</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@include('frontend.includes.footer')