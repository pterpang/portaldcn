<!DOCTYPE html>
<html>
	
<head>
    @include('head')
	@yield('content-head')
</head>

<body class="theme-red">
	<!--pageloader section-->
    @include('pageloader')
	
	<!--searchbar section-->
    @include('searchbar')

	<!--topbar section-->	
	@include('topbar')
   
	<!--sidebar section-->
	@include('sidebar')
   
    <!--content section-->    
    @yield('content')

	<!--script section-->   
    @include('script')
   
	<!--content-script-->
	@yield('content-script')   
</body>

</html>
