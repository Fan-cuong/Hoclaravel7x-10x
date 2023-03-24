@extends('admin.layout.master')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <h1 class="page-header">
                        <button class="btn btn-success text-center btn-lg" type="button"><a href="{{route('admin.category.index')}} ">Category</a></button>
                    </h1>
                    <button class="btn btn-success text-center" type="submit"><a href="{{route('admin.category.create')}} "><i class="fa fa-pencil fa-fw"></i>Create category</a></button>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <h1 class="page-header">
                        <button class="btn btn-success text-center btn-lg" type="button"><a href="{{route('admin.post.index')}} ">Post</a></button>
                    </h1>
                    <button class="btn btn-success text-center" type="submit"><a href="{{route('admin.post.create')}} "><i class="fa fa-pencil fa-fw"></i>Create post</a></button>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                    {{session('success')}}
                    </div>
                @endif

                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" >
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Hightlight_post</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr class="odd gradeX" align="center">
                                <td>{{$post->id}} </td>
                                <td>{{$post->title}} </td>
                                <td><img src="{{$post->imageUrl()}}" alt="" width="50px" height="auto">  </td>
                                <td>{{$post->category->name}} </td>
                                <td>{{$post->hightlight_post == 1 ? "x": ""}} </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.post.edit',$post->id)}}">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.post.delete',$post->id)}}"> Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            {!!$posts->links()!!}
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection