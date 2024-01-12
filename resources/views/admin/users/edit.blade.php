@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit user</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('main')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Users</a></li>
                            <li class="breadcrumb-item active">{{$user->name}}</li>
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
                        <form action="{{route('admin.user.update',$user->id)}}" method="post" class="col-3 p-0">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Enter name user" value="{{$user->name}}">
                                @error('name')
                                <div class="text-danger">Обязательно для заполнения</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{$user->email}}">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Select role</label>
                                    <select class="form-control" name="role">

                                        @foreach($roles as $id=>$role)

                                            <option value="{{$id}}"
                                                    @if( $user->role ==  $id) selected @endif>{{$role}}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- select -->
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="{{$user->id}}" >
                                </div>
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

