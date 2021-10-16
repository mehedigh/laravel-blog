
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
                        
                        @if (Session::has('success_msg'))
                            <div class="alert alert-success" role="alert">
                            {{ Session::get('success_msg') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title font-weight-bold">Categories</h3>

                              <div class="card-tools">
                                <a href="{{url('dashboard/category/create')}}" class="btn btn-secondary btn-sm"><i class="fas fa-plus-circle"></i> Create New</a>
                              </div>

                            </div>
                            <!-- /.card-header -->

                            <div class="card-body p-0">
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @forelse ($data['categories'] as $category)
                                    <tr id="row_{{$category->id}}">
                                      <td>{{$category->id}}</td>
                                      <td>{{$category->name}}</td>
                                      <td>
                                        {{$category->status}}
                                      </td>
                                      <td>
                                        <a class="btn btn-secondary btn-sm" href="/dashboard/category/{{$category->id}}/edit">Edit</a>
                                        <a data-id="{{$category->id}}" class="btn btn-danger btn-sm delete_item" href="{{url("category/destroy/{$category->id}")}}">Delete</a>
                                      </td>
                                    </tr>
                                  @empty
                                      
                                  @endforelse
                                </tbody>
                              </table>
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