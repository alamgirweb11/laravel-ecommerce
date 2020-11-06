@include('admin.includes.header')
@section('title')
    Ecommerce Admin Panel
@endsection
  @guest
    @else
    @include('admin.includes.navbar')
    @include('admin.includes.sidebar')
  @endguest
  @yield('admin_content')
@include('admin.includes.footer')