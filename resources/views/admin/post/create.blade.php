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
                        <h1 class="m-0">Write Post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Write Post</li>
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
                        <h3 class="card-title">Create Post</h3>
                        <div class="card-tools">
                            <a href="{{ route('dashboard.post.index') }}" title="Write Post"
                                class="btn btn-block bg-gradient-success">Back</a>
                        </div>

                    </div>

                </div>
                <form action="{{ route('dashboard.post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="card-body">
                            <div class="row">
                                <!-- avarta -->
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                    <div class="form-group profile-user-img"
                                        style="width: 150px; height:150px;backgroud:#eee ;position: relative;border-radius:100%">
                                        <img src="{{ asset('/backend/dist/img/upload/avatar.png') }}" alt=""
                                            style="width: 100%; height:100%;border-radius:100%;z-index:-1" id="output-image">
                                        <input type="file" name="image" id="profile-img"
                                            style="width:100%;height:100%;border-radius:100%;opacity:0">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-10">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="title"> Title</label>
                                                <input type="text" name="title" class="form-control" placeholder="Title" />
                                                <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id; }}"/>

                                            </div>
                                            <div class="form-group">
                                                <label for="Decription"> Description</label>
                                                <input type="text" name="mota" class="form-control" placeholder="Description" />


                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="category"> Category</label>
                                                <select name="kind_id" id="" required="" class="form-control">
                                                    <option value="1" style="display:none">Select categories</option>
                                                    @foreach ($kinds as $kind)
                                                        <option value="{{ $kind->id }}">{{ $kind->name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Author"> Author</label>
                                                <input type="text" name="tacgia" class="form-control" placeholder="Author" />


                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="content"> Content</label>
                                <textarea id="compose-textarea" name="content" class="form-control" style="height: 300px">
                                    <h1><u>Heading Of Message</u></h1>
                                    <h4>Subheading</h4>
                                    <p></p>
                                    <ul>
                                      <li>List item one</li>
                                      <li>List item two</li>
                                      <li>List item three</li>
                                      <li>List item four</li>
                                    </ul>
                                    <p>Thank you,</p>
                                    <p> Dzod</p>
                                  </textarea>
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

    <!-- /.scrip of textarea -->
    <script>
        $(function() {
            //Add text editor
            $('#compose-textarea').summernote()
        })
    </script>
@endsection
@endsection
