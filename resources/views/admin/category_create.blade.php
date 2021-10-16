
@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"></h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title font-weight-bold">Create New</h3>

                              <div class="card-tools">
                                <a href="{{url('dashboard/category/')}}" class="btn btn-secondary btn-sm">Categories</a>
                              </div>

                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <form method="post" action="{{ isset($category) ? url("dashboard/category/{$category->id}") : url('dashboard/category')}}">

                                    @csrf

                                    <input type="hidden" value="{{ isset($category) ? $category->user_id : '0'}}" name="user_id">
                                    <input type="hidden" value="{{ isset($category) ? 'PUT' : 'POST'}}" name="_method">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ isset($category) ? $category->name : ''}}" autocomplete="off">
                                        <span class="text-danger">{{$errors->first('name')}}</span>
                                    </div>

                                    <input type="hidden" value="{{ isset($category) ? $category->status : '0'}}" name="status">
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </form>
                              </div>
                            <!-- /.card-body -->
                          </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection