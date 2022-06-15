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
                        <h1 class="m-0">User Detail</h1>
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

                <h3 class="card-title">User</h3>
                <div class="card-tools">

                    <a href="{{ route('dashboard.users.index') }}" title="Back"
                        class="btn btn-block bg-gradient-success">Back</a>
                </div>

            </div>
            <!-- Main content -->


            <!-- Info boxes -->
            <div class="card">


            <div class="card-body p-0">

                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Profile</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>

                            <tr>
                                <td>
                                    <img src="{{ asset('backend/dist/img/upload/user') }}/{{ $users->profile_photo_path}}"
                                        style="width:30px; border-radius:100%" class="img-circle elevation-2"
                                        alt="User Image">

                                </td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->name }}</td>
                                <td>
                                    @if ($users->status == 1)
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
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": false,
                "autoWidth": false,
                "responsive": false,
            });
        });
    </script>
@endsection

@endsection
