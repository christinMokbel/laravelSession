<!doctype html>
<html class="no-js" lang="zxx">
    <head>
       @include('include.head') 
		
    </head>
    <body>
	
	@include('include.preloader')
    @include('include.probotten')
		
	
		@include('include.header')

        @yield('content')

		@include('include.footer')
		@include('include.footerjs')
		
    </body>
</html>