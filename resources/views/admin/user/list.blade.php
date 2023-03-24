@extends('admin.layout.master')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>List</small>
                    </h1>
                    @if (session('success'))
                        <div class="alert alert-success">
                        {{session('success')}}
                        </div>
                    @endif
                    <button class="btn btn-success text-center" type="submit"><a href="{{route('admin.user.create')}} "><i class="fa fa-pencil fa-fw"></i>Create user</a></button>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Is_admin</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="even gradeC" align="center">
                                <td>{{$user->id}} </td>
                                <td>{{$user->name}} </td>
                                <td>{{$user->email }} </td>
                                <td>{{$user->is_admin ? "x" : ""}} </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.user.edit',$user->id)}}">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.user.delete',$user->id)}}"> Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection