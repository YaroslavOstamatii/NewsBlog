@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-1 mb-3">
                        <a href="{{route('newsActive.create')}}" class="btn btn-block btn-primary">Add</a>
                    </div>
                    <div class="col-12">

                    </div>


                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">

                            <div class="card-body table-responsive p-0 ">
                                <table class="table table-hover text-nowrap align-content-center">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Text</th>
                                        <th>Created by</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($news as $item)
                                        <tr >
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>{{$item->text}}</td>
                                            <td>{{$item->user->name}}</td>

                                            <td ><a href="{{route('newsActive.edit',$item->id)}}"
                                                   class="text-success"><i class="fas fa-solid fa-pen"></i></a>
                                                <img src="{{asset('storage/' . $item->image)}}" style="width: 2rem">


                                            </td>
                                            <td>

                                                <form action="{{route('newsActive.destroy',$item)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="fas fa-solid fa-trash text-danger"  role="button"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

