<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{route('createCar')}}">insert car</a></li>
      <li><a href="cars">all car</a></li>
      <li><a href="{{ route('trashed') }}">trashed</a></li>
      <li><a href="{{ LaravelLocalization::getLocalizedURL('en') }}">english</a></li>
      <li><a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">عربي</a></li>
    </ul>
  </div>
</nav>
