@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Adding User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Main</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Users</a></li>
                            <li class="breadcrumb-item active">Add user</li>
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
                        <form action="{{route('admin.user.store')}}" class="w-25" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" placeholder="Name of user" name="name">
                            </div>
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <input type="text" placeholder="Email" name="email">
                            </div>
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <input type="text" placeholder="Password" name="password">
                            </div>
                            @error('password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label>Choose role</label>
                                <select name="role" class="form-control">
                                    @foreach($roles as $id => $role)
                                        <option
                                            value="{{$id}}" {{$id == old('role') ? 'selected' : ''}}>{{$role}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('role')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <input type="submit" class="btn btn-primary" value="Add">

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
