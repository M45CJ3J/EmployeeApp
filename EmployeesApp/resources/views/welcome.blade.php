
@extends('layout')
@section('content')
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">Employee Mangment</a>
   
    
      <a type="submit">Employee Mangment</a>
    
  </div>
</nav>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-6 margin-tb">
                <div class="pull-left">
                    <h2>List of Employee</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('create') }}"> Create Employee</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>employees Name</th>
                    <th> Address</th>
                     <th> Age</th>
                    <th> Birth Date</th>
                    <th> Hiring Date</th>
                    <th> Department</th>
                    <th> Division</th>
                    <th> img_path</th>
                     <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i =1; ?>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $employee->fname}}  {{ $employee->lname }}</td>                      
                        <td>{{ $employee->address }}</td>
                        <td>{{ $employee->age }}</td>
                        <td>{{ $employee->birth_date }}</td>
                        <td>{{ $employee->hired_date }}</td>
                        <td>{{ $employee->department->name }}</td>
                        <td>{{ $employee->division }}</td>
                        <td> <img src=/public/images/{{$employee->img_path}} width="100px" height="100px" alt={{$employee->img_path}}></td>
                        <td>
                            <form action="" method="Post">
                                <a class="btn btn-primary" href="#">Edit</a>
                                <a class="btn btn-danger" href="#">Delete</a>
                                @csrf
                                @method('DELETE')
                              
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $employees->links() !!}
    </div>

    @endsection


