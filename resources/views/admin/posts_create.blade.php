
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
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title font-weight-bold">Create New</h3>

                              <div class="card-tools">
                                <a href="{{url('dashboard/post')}}" class="btn btn-secondary btn-sm">Posts</a>
                              </div>
                            </div>


                            @if (isset($data['post']))
                                @php $post = $data['post'] @endphp
                            @endif
                           

                            <div class="card-body">
                                <form method="POST" action="{{ isset($post) ? url("dashboard/post/{$post->id}") : url('dashboard/post')}}" enctype="multipart/form-data">

                                    @csrf
                                    
                                    <input type="hidden" value="{{ isset($post) ? 'PUT' : 'POST'}}" name="_method">

                                    <div class="form-group">
                                        <input class="form-control" type="file" name="image" accept="*">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>
                                        <select class="form-control" name="category_id">
                                            <option value="">Select</option>
                                            @foreach ($data['categories'] as $category)
                                                <option {{ isset($post) && $post->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{$errors->first('category_id')}}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" name="title" value="{{ isset($post) ? $post->title : old('title') }}"  autocomplete="off">
                                        <span class="text-danger">{{$errors->first('title')}}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Details</label>
                                        <textarea class="form-control" name="details" rows="4">{{ isset($post) ? $post->details : old('details') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tags</label>
                                        <input type="text" data-role="tagsinput" name="tags" 
                                        value="{{ isset($post) ? json_decode($post->tags) : old('tags') }}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input {{ isset($post) && $post->status == 1 ? 'checked' : '' }} class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1">
                                            <label class="form-check-label" for="inlineRadio1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input {{ isset($post) && $post->status == 2 ? 'checked' : '' }} class="form-check-input" type="radio" name="status" id="inlineRadio2" value="2">
                                            <label class="form-check-label" for="inlineRadio2">Hide</label>
                                        </div>
                                    </div>

                                    <input type="hidden" value="1" name="user_id">
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