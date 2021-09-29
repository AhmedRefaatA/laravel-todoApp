<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Edit Todo List</h2>
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif
  <form method="post" action='{{  url("/todo/$data->id") }}'  enctype ="multipart/form-data">
    @csrf
    @method('put')
    <input type="hidden" name= "add_by" value="{{$data->add_by}}">
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" name="title" value="{{$data->title}}" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Title">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <input type="text" name="description" value="{{$data->description}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Date</label>
        <input type="date" name="date" value="{{$data->date}}"  class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Start Time</label>
        <input type="time" name="start_time" value="{{$data->start_time}}"  class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">End Time</label>
        <input type="time" name="end_time" value="{{$data->end_time}}"  class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Add ToDO </button>
</form>
</div>



</body>
</html>
