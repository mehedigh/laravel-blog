
@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Starter Page</h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

       
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                   <div class="col-md-12">
              
                        {{-- {{auth()->user()}} --}}
            
                        @auth
                            <h2 class="text-success">The user is login...</h2>
                        @endauth
                
                
                        @guest
                            <h2 class="text-danger">The user is not login...</h2>
                        @endguest
                   </div>

                
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>

                                <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of the card's
                                content.
                                </p>

                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection