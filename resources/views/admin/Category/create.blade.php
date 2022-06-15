@extends('admin.layout.master')
@section('title')
    Home
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Kinds Post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create Categories </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <section class="content">
            <div class="card">
                <div class="card-body p-0">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Create Categories</h3>
                        <div class="card-tools">
                            <a href="{{ route('dashboard.category.index') }}" title="Create Categories"
                                class="btn btn-block bg-gradient-success">Back</a>
                        </div>

                    </div>

                </div>
                <form action="{{ route('dashboard.category.store') }}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <!-- avarta -->



                            <div class="col-xs-12 col-sm-10 col-md-10">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Name kinds"> Categories name</label>
                                            <input type="text" name="cate_name" class="form-control"
                                                placeholder="Name Categories" />
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Name"> Status</label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary3" name="status" value="1" checked>
                                    <label for="checkboxPrimary1">
                                    </label>
                                </div>

                                <div class="icheck-primary d-inline">

                                    <label for="checkboxPrimary3">
                                        Enable
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="radioDanger1" name="status" value="0">

                                </div>
                                <div class="icheck-danger d-inline">

                                    <label for="radioDanger1">
                                        Disable
                                    </label>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-success">Save </button>



                    </div>
                </form>
            </div>


            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
