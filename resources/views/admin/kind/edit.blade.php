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
                        <h1 class="m-0">Edit Kinds</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edid Kinds</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <section class="content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-body p-0">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Edit Kinds</h3>
                        <div class="card-tools">
                            <a href="{{ route('dashboard.kind.index') }}" title="Create New"
                                class="btn btn-block bg-gradient-success">Back</a>
                        </div>

                    </div>

                </div>
                <form action="{{ route('dashboard.kind.update', $kinds->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <!-- avarta -->


                            <div class="col-xs-12 col-sm-10 col-md-10">
                                <div class="form-group">
                                    <label for="category"> Category</label>
                                 <select name="cate_id" id="" required="" class="form-control">
                                     <option value="1" style="display:none">select Category</option>
                                     @foreach ($categories as $cate )
                                     <option value="{{ $cate->id }}" @if($cate->id==$kinds->cate_id)  selected="" @endif>{{ $cate->cate_name }}</option>

                                     @endforeach
                                 </select>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Name"> Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Name"
                                                value="{{ $kinds->name }}" />
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Name"> Status</label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary3" name="status" value="1"
                                        {{ $kinds->status == '1' ? 'checked' : '' }}>
                                    <label for="checkboxPrimary1">
                                    </label>
                                </div>

                                <div class="icheck-primary d-inline">

                                    <label for="checkboxPrimary3">
                                        Enable
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="radioDanger1" name="status" value="0"
                                        {{ $kinds->status == '0' ? 'checked' : '' }}>

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
@section('script2')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#output-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }

        }
        $("#profile-img").change(function() {
            readURL(this);
        });
    </script>
@endsection
@endsection
