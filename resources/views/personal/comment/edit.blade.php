@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('main')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Категории</a></li>
                            <li class="breadcrumb-item active">{{$category->title}}</li>
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
                        <form action="{{route('admin.category.update',$category->id)}}" method="post" class="col-3 p-0">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <input type="text" name="title"  class="form-control" placeholder="Enter name category" value="{{$category->title}}">
                                @error('title')
                                <div class="text-danger">Обязательно для заполнения</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary col-4" value="Edit">
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

