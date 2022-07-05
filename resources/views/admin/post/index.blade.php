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
                        <h1 class="m-0">posts Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">posts Management</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->
      <section class="content">


                <!-- box Info -->
            <div class="card-header border-transparent">

                <h3 class="card-title">All posts</h3>
                <div class="card-tools">

                    <a href="{{ route('dashboard.post.create') }}" title="Create New"
                        class="btn btn-block bg-gradient-success">Create posts</a>
                </div>

            </div>
            <!-- Main content -->z


            <!-- Info boxes -->
            <div class="card">
                <div class="card-body p-0">

                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>ID</th>
                                <th>Title</th>
                                <th>kinds Name</th>
                                <th>Post By</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        <img src="{{ asset('backend/dist/img/upload/post') }}/{{ $post->image}}"
                                            style="width:30px; border-radius:100%" class="img-circle elevation-2"
                                            alt="Image">

                                    </td>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->kinds['name']}}</td>
                                    <td>{{ $post->users['name']}}</td>

                                    <td>
                                        @if ($post->status == 1)
                                            <span class="badge badge-success"> Enable</span>
                                        @else
                                            <span class="badge badge-danger"> Disabled</span>
                                        @endif
                                    </td>
                                    <td>{{ $post->created_at }}</td>


                                    <td>
                                        <a href="{{ route('dashboard.post.edit',$post->id) }}" title="Edit" class="btn btn-success">Edit</a>
                                        <a href="{{ route('dashboard.post.delete',$post->id) }}" title="Delete" class="btn btn-danger">Delete</a>
                                        <a href="{{ route('dashboard.post.show',$post->id) }}" title="Show" class="btn btn-warning">show</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.row -->


            <!-- /.row -->

            <!-- Main row -->

            <!-- /.row -->
         </div>


    <!-- /.content -->
    </section>

</div>


@section('script')
    <script>
        $(function() {

            $('#example').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
@endsection

@endsection
