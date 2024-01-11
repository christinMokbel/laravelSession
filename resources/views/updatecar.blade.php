<!DOCTYPE html>
<html lang="en">
<head>
  <title>update Car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @include('include.nav')
<div class="container">
  <h2>update car data</h2>
  <form action="{{ route('update', $car->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ $car->title }}">
    </div>
    <div class="form-group">
      <label for="description">description:</label>
      <textarea class="form-control" name="description" id="" cols="60" rows="3">{{ $car->description }}</textarea>
    </div>

    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" name="image">
      <img src="{{ asset('assets/images/'.$car->image) }}" alt="car" style="width:200px;">
      @error('image')
        {{ $message }}
      @enderror
    </div>

    <div class="form-group">
      <label for="category">Category:</label>
      <select name="category_id" id="">
        @foreach($categories as $category)
        <!--@selected($category->cat_name == $car->category['cat_name'])حل اخر -->
        <!--@selected($category->id == $car->category_id)هذه افضل-->
        <option value="{{ $category->id }}"{{ $car->category_id == $category->id ? 'selected' : '' }}>{{ $category->cat_name }}</option>
        @endforeach
      </select>
      
    </div>
    
    <!--{{($car->published)?"checked":""}} مممكن بدل السطرين -->
    <!-- @checked($car->published) -->
    <div class="checkbox">
        @if($car->published)
      <label><input type="checkbox" name="published"  checked > Published me</label>
      @else
      <label><input type="checkbox" name="published"> Published me</label>
      @endif
    </div>
    <button type="submit" class="btn btn-default">update</button>
  </form>
</div>

</body>
</html>
