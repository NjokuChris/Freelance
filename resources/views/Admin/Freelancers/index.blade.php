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
                    <h1>Manage Freelancers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage-freelancers</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Manage freelancers</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" >
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Middle name</th>
                                        <th>Unit</th>
                                        <th>Location</th>
                                        <th>Posted by</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($freelancers as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->f_name }}</td>
                                            <td>{{ $item->l_name }}</td>
                                            <td>{{ $item->m_name }}</td>
                                            <td>
                                                @if($item->unit == NULL)
                                                    --
                                                @else
                                                    {{ $item->unit->unit_name }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->state == NULL)
                                                    --
                                                @else
                                                    {{ $item->state->st_name }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->user == NULL)
                                                    --
                                                @else
                                                    {{ $item->user->name }}
                                                @endif
                                            </td>
                                            
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
                                                        <form action="{{ route('freelancers.destroy', $item->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="nav-icon fas fa-cut" style="color: red"></i>
                                                                Terminate
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <x-edit-modal title="Update freelancer" routeName="freelancers" :id="$item->id">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">First name</label>
                                                        <input type="text" class="form-control" name="f_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter first name" value="{{ $item->f_name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail2">Middle name</label>
                                                        <input type="text" class="form-control" name="m_name" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter middle name" value="{{ $item->m_name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail3">Last name</label>
                                                        <input type="text" class="form-control" name="l_name" id="exampleInputEmail3" aria-describedby="emailHelp" placeholder="Enter last name" value="{{ $item->l_name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Unit</label>
                                                        <select class="form-control" name="unit_id" id="exampleFormControlSelect1">
                                                            <option selected disabled>Select a unit</option>
                                                            @foreach($units as $unit)
                                                                <option value="{{ $unit->id }}"  {{$unit->id == $item->unit_id ? 'selected' : ''}}>{{ $unit->unit_name }}</option>
                                                            @endforeach
                                                      </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect2">Location</label>
                                                        <select class="form-control" name="location_id" id="exampleFormControlSelect2">
                                                            <option selected disabled>Select a location</option>
                                                            @foreach($locations as $location)
                                                                <option value="{{ $location->id }}"  {{$location->id == $item->location_id ? 'selected' : ''}}>{{ $location->st_name }}</option>
                                                            @endforeach
                                                      </select>
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
