@extends('admin.layout.master')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Contact
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
                    <form action="{{route('admin.contact.update',$contact->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input  value="{{$contact->name }} " class="form-control" name="name" placeholder="Please Enter Name" />
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input value="{{$contact->address }} " class="form-control" type="address" name="address" placeholder="Please Enter address" />
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input value="{{$contact->phone }} " class="form-control" type="phone" name="phone" placeholder="Please Enter phone" />
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input value="{{$contact->subject }} " class="form-control" type="subject" name="subject" placeholder="Please  subject" />
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <input value="{{$contact->message }} " class="form-control" type="message" name="message" placeholder="Please  message" />
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