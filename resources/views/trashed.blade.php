<!DOCTYPE html>
<html lang="en">
<head>
  <title>trashed cars</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('include.nav')

<div class="container">
  <h2>trashed car</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>title</th>
        <th>description</th>
        <th>published</th>

        <th>trashed</th>
        <th>restore</th>
      </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
      <tr>
        <td>{{$car-> title}}</td>
        <td>{{$car-> description}}</td>
        <td>
            @if($car-> published)
            Yes
            @else
            No
            @endif
        </td>

        <td><a href="forceDelete/{{ $car->id }}" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>

        <td><a href="restoreCar/{{ $car->id }}" >restore</a></td>

      </tr>
      @endforeach

    </tbody>
  </table>
</div>

</body>
</html>
