
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Car</title>
</head>
<body>
    <h2>{{$car-> title}}</h2>
    <h3>{{$car-> description}}</h3>
    <h3>{{($car->published)?"published":"not published"}}</h3>
    <img src="{{ asset('assets/images/'.$car->image) }}" alt="car" style="width:500px;">
    <p>  {{$car->category->cat_name}}  </p>
    <h3>{{$car-> created_at}}</h3>


</body>
</html>
