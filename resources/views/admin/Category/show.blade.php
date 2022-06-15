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
                        <h1 class="m-0">User Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Management</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->
        <section class="content">


            <!-- box Info -->
            <div class="card-header border-transparent">

                <h3 class="card-title">All Users</h3>
                <div class="card-tools">

                    <a href="{{ route('dashboard.category.create') }}" title="Create New"
                        class="btn btn-block bg-gradient-success">Create Category</a>
                </div>

            </div>
            <!-- Main content -->


            <!-- Info boxes -->
            <div class="card">


            <div class="card-body p-0">

                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->cate_name}}</td>
                                <td>
                                    @if ($category->status == 1)
                                        <span class="badge badge-success"> Enable</span>
                                    @else
                                        <span class="badge badge-danger"> Disabled</span>
                                    @endif
                                </td>
                            </tr>

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
