
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @php $i=1; @endphp
                                  @forelse ($data['users'] as $user)
                                    <tr id="row_{{$user->id}}">
                                      <td>{{$i}}</td>
                                      <td>{{$user->name}}</td>
                                      <td>{{$user->email}}</td>
                                      <td><span class="badge badge-secondary">{{ $user->role }}</span></td>
                                      <td>
                                          @if ($user->status == 1)
                                            <span class="badge badge-primary"><i class="fas fa-check-circle"></i> Active</span>
                                          @else
                                            <span class="badge badge-primary">Disabled</span> 
                                          @endif
                                      </td>
                                      <td>
                                        <a class="btn btn-secondary btn-sm" href="/dashboard/user/{{$user->id}}/edit">Edit</a>
                                        <a data-id="{{$user->id}}" class="btn btn-danger btn-sm delete_item" href="{{url("user/destroy/{$user->id}")}}">Delete</a>
                                      </td>
                                    </tr>
                                    @php $i++; @endphp
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