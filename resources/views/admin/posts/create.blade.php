@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add post</h1>
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
                        <form action="{{route('admin.post.store')}}" method="post" class="col-6 p-0"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" value="{{old('title')}}"
                                       placeholder="Enter name post">
                                @error('title')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="content">{{old('content')}}</textarea>
                                @error('content')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Add image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label">Choose image</label>

                                    </div>

                                    {{--                                    <div class="input-group-append">--}}
                                    {{--                                        <span class="input-group-text">Upload</span>--}}
                                    {{--                                    </div>--}}
                                </div>
                                @error('image')
                                <div class="text-danger ">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Select category</label>
                                    <select class="form-control" name="category_id">

                                        @foreach($categories as $category)

                                            <option value="{{$category->id}}"
                                                    @if( old('category_id') == $category -> id) selected @endif>{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Select tag</label>
                                    <select class="select2" name="tags[]" multiple="multiple"
                                            data-placeholder="Select a State" style="width: 100%;">

                                        @foreach($tags as $tag)

                                            <option value="{{$tag->id}}"
                                                    @if(in_array($tag->id, old('tags',[]))) selected @endif>{{$tag->title}}</option>
                                        @endforeach

                                    </select>
                                    @error('tags')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror

                                </div>
                            </div>


                            <div class="form-group">
                                <input type="submit" class="btn btn-primary col-4" value="Add">
                            </div>
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

