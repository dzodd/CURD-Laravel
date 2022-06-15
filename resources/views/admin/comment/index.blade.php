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
                        <h1 class="m-0">Comment Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Commnent Management</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->
        <section class="content">


            <!-- box Info -->
            <div class="card-header border-transparent">

                <h3 class="card-title">All Comment</h3>


            </div>
            <!-- Main content -->


            <!-- Info boxes -->
            <div class="card">


                <div class="card-body p-0">

                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th>ID</th>
                                <th>Email</th>
                                <th>Content</th>
                                <th>Created_at</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->id}}</td>
                                <td>{{ $comment->email}}</td>
                                <td>{{ $comment->noidungbinhluan}}</td>
                                <td>
                                    @if ($comment->trangthai == 1)
                                        <span class="badge badge-success"> Enable</span>
                                    @else
                                        <span class="badge badge-danger"> Disabled</span>
                                    @endif
                                </td>
                                <td>{{ $comment->created_at }}</td>
                                <td>
                                    <a href="{{ route('dashboard.comment.delete' , $comment->id) }}" title="Delete" class="btn btn-danger">Delete</a>
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
