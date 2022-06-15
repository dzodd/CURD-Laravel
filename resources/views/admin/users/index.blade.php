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

                    <a href="{{ route('dashboard.users.create') }}" title="Create New"
                        class="btn btn-block bg-gradient-success">Create New</a>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <img src="{{ asset('backend/dist/img/upload/user') }}/{{ $user->profile_photo_path}}"
                                        style="width:30px; border-radius:100%" class="img-circle elevation-2"
                                        alt="User Image">

                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if ($user->status == 1)
                                        <span class="badge badge-success"> Enable</span>
                                    @else
                                        <span class="badge badge-danger"> Disabled</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.users.edit',$user->id) }}" title="Edit" class="btn btn-success">Edit</a>
                                    <a href="{{ route('dashboard.users.delete',$user->id) }}" title="Delete" class="btn btn-danger">Delete</a>
                                    <a href="{{ route('dashboard.users.show',$user->id) }}" title="Show" class="btn btn-warning">Show</a>
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
