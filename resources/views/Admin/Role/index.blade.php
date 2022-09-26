@extends('layouts.admin')
@section('css')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Roles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage-roles</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <p class="">
                <a class="btn btn-primary"  data-toggle="modal" data-target="#AddModal">Create New Role</a>
                <x-add-modal title="Add new role" routeName="roles">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Role name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter role">
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <p>Permissions</p>
                            <p><label><input type="checkbox" id="checkAllAdd"/> Check all/Uncheck all</label></p>
                        </div>
                        @foreach($permissions as $permission)
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input add" id="btn-check-outlined-{{ $permission->id }}" value="{{$permission->name}}" autocomplete="off" name="permissions[]">
                                <label class="form-check-label" for="btn-check-outlined-{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </x-add-modal>
            </p>
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Manage roles</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" >
                            <table id="example1" class="table table-bordered table-striped mb-4">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>No of permissions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->permissions->count() }}</td>
                                            <td>
                                                <div class="dropdown show">
                                                    <a class="btn btn-success dropdown-toggle" role="button"
                                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Action
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a  data-toggle="modal" data-target="#UpdateModal{{$item->id}}"
                                                            class="dropdown-item">
                                                            <i class="nav-icon fas fa-copy" style="color: blue"></i>
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('roles.destroy', $item->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="nav-icon fas fa-cut" style="color: red"></i>
                                                                Terminate
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <x-edit-modal title="Update role" routeName="roles" :id="$item->id">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Name</label>
                                                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter first name" value="{{ $item->name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="d-flex justify-content-between">
                                                            <p>Permissions</p>
                                                            <p><label><input type="checkbox" id="checkAllEdit"/> Check all/Uncheck all</label></p>
                                                        </div>
                                                        @foreach($permissions as $permission)
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" class="form-check-input edit" id="btn-check-outlined-edit-{{ $permission->id }}" autocomplete="off" value="{{$permission->name}}" name="permissions[]"  {{ $item->permissions->contains($permission) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="btn-check-outlined-edit-{{ $permission->id }}">{{ $permission->name }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </x-edit-modal>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  
    <script>
        $(document).ready(function() {
            $("#checkAllAdd").change(function () {
                $("input.add").prop('checked', this.checked);
            });
            $("#checkAllEdit").change(function () {
                $("input.edit").prop('checked', this.checked);
            });
        });
     </script>  
@endsection

@push('scripts')

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>



    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-sm-12:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
