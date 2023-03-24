@extends('admin.layout.master')

@section('title')
    Category
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class=" col-md-3 col-sm-3">
                    <h1 class="page-header">
                        <button class="btn btn-success text-center btn-lg" type="button"><a href="{{route('admin.category.index')}} ">Category</a></button>
                        {{-- <small>List</small> --}}
                    </h1>
                    <button class="btn btn-success text-center" type="submit"><a href="{{route('admin.category.create')}} "><i class="fa fa-pencil fa-fw"></i>Create</a></button>
                </div>
                <div class=" col-md-3 col-sm-3">
                    <h1 class="page-header">
                        <button class="btn btn-success text-center btn-lg" type="button"><a href="{{route('admin.post.index')}} ">Post</a></button>
                    </h1>
                </div>
                <div class=" col-md-3 col-sm-3">
                    <h1 class="page-header">
                        <button class="btn btn-success text-center btn-lg" type="button"><a href="{{route('admin.user.index')}} ">User</a></button>
                    </h1>
                </div>
                <div class=" col-md-3 col-sm-3">
                    <h1 class="page-header">
                        <button class="btn btn-success text-center btn-lg" type="button"><a href="{{route('admin.contact.index')}} ">Contact</a></button>
                    </h1>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                       {{session('success')}}
                    </div>
                @endif
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr class="odd gradeX" align="center">
                                <td >{{$category->id}} </td>
                                <td >{{$category->name}} </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.category.edit',$category->id)}} ">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.category.delete',$category->id)}}"> Delete</a></td>
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