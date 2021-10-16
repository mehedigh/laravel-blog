
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
                          <i class="fas fa-check-circle"></i> {{ Session::get('success_msg') }}
                          </div>
                      @endif

                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title font-weight-bold">Posts</h3>

                              <div class="card-tools">
                                <a href="{{url('dashboard/post/create')}}" class="btn btn-secondary btn-sm"><i class="fas fa-plus-circle"></i> Create New</a>
                              </div>

                            </div>
                            <!-- /.card-header -->

                            <div class="card-body p-0">
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Tags</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                  @php $i=1; @endphp
                                  @foreach ($posts as $post)
                                    <tr>
                                      <td>{{ $i }}</td>
                                      <td>{{ $post->category_name }}</td>
                                      <td>{{ $post->title }}</td>
                                      <td>
                                        @foreach(explode(',', $post->tags) as $tags) 
                                          <span class="badge badge-primary">{{$tags}}</span>
                                        @endforeach
                                      </td>
                                      <td>
                                        <img width="100px" src="{{ asset($post->image) }}" alt="">
                                      </td>
                                      <td>
                                        <a class="btn btn-secondary btn-sm" href="/dashboard/post/{{$post->id}}/edit">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="{{url("post/destroy/{$post->id}")}}">Delete</a>
                                      </td>
                                    </tr>
                                    @php $i++; @endphp
                                  @endforeach
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