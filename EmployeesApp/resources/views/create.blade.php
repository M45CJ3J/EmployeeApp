
@extends('layout')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>first Name:</strong>
                <input type="text" name="fname" class="form-control" placeholder="first Name" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>last Name:</strong>
                <input type="text" name="lname" class="form-control" placeholder="last Name" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>address:</strong>
                <textarea class="form-control" style="height:150px" name="address" required placeholder="address"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>age:</strong>
                <input class="form-control" type="number"  name="age" placeholder="age" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Department:</strong>
        <select class="form-select" name="department_id" >
            <option selected>Open this select menu</option>
            @foreach ($departments as $department)
            <option value="{{$department->id}}" style="font ">{{$department->name}}</option>
            @endforeach
        </select>
        </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>birth date :</strong>
                <input type="date" name="birth_date" class="form-control" required placeholder="birth date">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>hired date:</strong>
                <input type="date" name="hired_date" class="form-control" required placeholder="hired date">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> division:</strong>
                <input type="text" name="division" class="form-control" required placeholder="division">
            </div>
        </div>

        <div class="mb-3">
        <label for="formFile" class="form-label">Image</label>
        <input class="form-control" type="file" id="formFile" name="img_path">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>

    @endsection


