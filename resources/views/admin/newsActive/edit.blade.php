@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add news</h1>
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
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->

                <div class="row">
                    <div class="col-12">
                        <form action="{{route('newsActive.update',$news->id)}}" method="post" class="col-3 p-0"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <h4>Text</h4>
                                <input type="text" name="text" value="{{$news->text}}">
                                @error('text')
                                <div class="text-danger">Обязательно для заполнения</div>
                                @enderror
                                <h4>Title</h4>
                                <input type="text" name="title" value="{{$news->title}}">
                                @error('title')
                                <div class="text-danger">Обязательно для заполнения</div>
                                @enderror

                                <div class="m-1">
                                    <img src="{{asset('storage/' . $news->image)}}" style="width: 25%">
                                </div>
                                <label for="photo">Выберите фотографию:</label>
                                <input type="file" name="image" id="photo" accept="image/*">
                                @error('image')
                                <div class="text-danger">Обязательно для заполнения</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <!-- radio -->
                                <h3 class="mt-1">News</h3>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_active" value="1">
                                        <label class="form-check-label">Active</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_active" value="0" checked="">
                                        <label class="form-check-label">Disable</label>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary col-4" value="update">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

