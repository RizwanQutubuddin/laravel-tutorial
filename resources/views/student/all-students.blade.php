@extends('/layouts/masterLayout')
@section('section')
<div class="container mt-3">
    <h1>All Students</h1> 
    <a href="{{URL::to('student/add-student')}}" class="btn btn-primary">Add New Record</a>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Age</th>
          <th>City</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $student)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$student->name}}</td>
              <td>{{$student->email}}</td>
              <td>{{$student->age}}</td>
              <td>{{$student->city}}</td>
              <td><a href="{{route('getStudent',$student->id)}}" class="btn btn-primary">Update</a> | <a href="{{route('deleteStudent',$student->id)}}" class="btn btn-danger">Delete</a></td>
            </tr>
    
        @endforeach  
      </tbody>
    </table>
    <div>{{$students->links('pagination::bootstrap-5')}}</div>
  </div>

 
@endsection