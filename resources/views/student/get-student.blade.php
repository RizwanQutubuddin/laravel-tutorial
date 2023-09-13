@extends('/layouts/masterLayout')
@section('section')
<div class="container mt-3">
    <h1>Update Students</h1> 
    
    <form action="{{route('updateStudent',$student->id)}}" method="POST">
      @csrf
      <div class="mb-3 mt-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{$student->name}}">
      </div>
      <div class="mb-3 mt-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{$student->email}}">
      </div>
      <div class="mb-3 mt-3">
        <label for="age" class="form-label">Age:</label>
        <input type="text" class="form-control" id="age" placeholder="Enter age" name="age" value="{{$student->age}}">
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

 
@endsection