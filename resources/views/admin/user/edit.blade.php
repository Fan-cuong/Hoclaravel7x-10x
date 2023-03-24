@extends('admin.layout.master')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Edit</small>
                    </h1>
                </div>
                <!-- neu khong dien ten se bao loi -->
                @if(count($errors))
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{$error}}<br>
                        @endforeach
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
               
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('admin.user.update',$user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input  value="{{$user->name }} " class="form-control" name="name" placeholder="Please Enter Name" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input value="{{$user->email }} " class="form-control" type="email" name="email" placeholder="Please Enter Email" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input value="{{$user->password }} " class="form-control" type="password" name="password" placeholder="Please Enter Password" />
                        </div>
                        <div class="form-group">
                            <label>Confirm password</label>
                            <input value="{{$user->confirm }} " class="form-control" type="password" name="confirm" placeholder="Please Confirm Password" />
                        </div>
                        <div class="form-group">
                            <label>Roll</label>
                            <label class="radio-inline">
                                <input name="is_admin" value="0" @if (!$user->is_admin) checked @endif type="radio">User
                            </label>
                            <label class="radio-inline">
                                <input name="is_admin" value="1" @if ($user->is_admin) checked @endif type="radio">Admin
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Update</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection