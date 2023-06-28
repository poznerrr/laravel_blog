@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.post.update', $post->id)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <label>Id (readonly)</label>
                            <div class="form-group">
                                <input type="text" name="id" value="{{$post->id}}" readonly>
                            </div>
                            <label>Title</label>
                            <div class="form-group w-25">
                                <input type="text" placeholder="Name of post" name="title" value="{{$post->title}}">
                            </div>
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <textarea id="summernote" name="content">{{$post->content}}</textarea>
                            </div>
                            @error('content')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group w-50">
                                <label>Edit preview</label>
                                <div class="w-25 mb-2">
                                    <img src="{{asset('storage/'.$post->preview_image)}}" alt="preview image"
                                         class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label">Choose image</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            @error('preview_image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group w-50">
                                <label>Edit main image</label>
                                <div class="w-25 mb-2">
                                    <img src="{{asset('storage/'.$post->main_image)}}" alt="main image" class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label">Choose image</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>

                            @error('main_image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group w-50">
                                <label> Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}"
                                            {{$category->id === $post->category_id ? 'selected': ''}}>
                                            {{$category->title}}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label>Tags</label>
                                    <select class="select2" name="tag_ids[]" multiple="multiple"
                                            data-placeholder="Select tags" style="width:100%;">
                                        @foreach($tags as $tag)
                                            <option
                                                {{is_array( $post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray(), true) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Edit">
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
