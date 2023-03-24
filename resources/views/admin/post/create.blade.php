@extends('admin.layout.master')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Post
                        <small>Create</small>
                    </h1>
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
                    <form action="{{route('admin.post.store')}} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Category </label>
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id }} ">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" name="title" placeholder="Please Enter title" />
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control" name="description" placeholder="Please Enter description" />
                        </div>
                        <div class="form-group">
                            <label>New_post</label>
                            <input type="checkbox" name="new_post" />
                        </div>
                        <div class="form-group">
                            <label>Hightlight_post</label>
                            <input type="checkbox" name="hightlight_post"  />
                        </div>
                        <div class="form-group">
                            <label>image</label>
                            <input type="file" class="form-control" name="image" accept="image/*"/>
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" id="content"class="ckeditor"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Add</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection