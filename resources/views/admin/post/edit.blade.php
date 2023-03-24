@extends('admin.layout.master')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Post
                        <small>Edit</small>
                    </h1>
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
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('admin.post.update',$post->id)}} " method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Post </label>
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id }} " @if($post->category_id==$category->id) selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input value="{{$post->title}}" class="form-control" name="title" placeholder="Please Enter title" />
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input value="{{$post->description}}" class="form-control" name="description" placeholder="Please Enter description" />
                        </div>
                        <div class="form-group">
                            <label>New_post</label>
                            <input type="checkbox" name="new_post" @if ($post->new_post) Checked @endif />
                        </div>
                        <div class="form-group">
                            <label>Hightlight_post</label>
                            <input value="$post->title" type="checkbox" name="hightlight_post" @if ($post->hightlight_post) Checked @endif  />
                        </div>
                        <div class="form-group">
                            <label>image</label>
                            <input type="file" class="form-control" name="image" accept="image/*"/>
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <textarea   name="content" id="content"class="ckeditor">{!! $post->content !!} </textarea>
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