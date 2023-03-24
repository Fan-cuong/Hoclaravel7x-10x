@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Contacts
                        <small>Create</small>
                    </h1>
<!-- neu khong dien ten se bao loi -->
                     @if(count($errors))
                         <div class="alert alert-danger">
                             @foreach ($errors->all() as $error)
                                 {{$error}}<br>
                             @endforeach
                         </div>
                     @endif
                </div>
<!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('admin.contact.store')}} " method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" placeholder="Please Enter contact Name" />
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" name="address" placeholder="Please Enter contact Address" />
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input class="form-control" name="phone" placeholder="Please Enter contact Phone" />
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input class="form-control" name="subject" placeholder="Please Enter contact Subject" />
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <input class="form-control" name="message" placeholder="Please Enter contact Message" />
                        </div>
                        <button type="submit" class="btn btn-default">Create</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
<!-- /.container-fluid -->
    </div>
@endsection