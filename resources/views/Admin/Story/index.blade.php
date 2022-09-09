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
                    <h1>Manage Stories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage-stories</li>
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
                            <h3 class="card-title">Manage Stories</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" >
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Page no</th>
                                        <th>Date published</th>
                                        <th>Category</th>
                                        <th>Formation</th>
                                        {{-- <th>Amount</th> --}}
                                        <th>Posted by</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stories as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->page_no }}</td>
                                            <td>{{ $item->date_publish }}</td>
                                            <td>{{ $item->category->category }}</td>
                                            <td>{{ $item->formation->formation }}</td>
                                            {{-- @foreach ($item->contributors as $itm)
                                                 <td>{{ $itm->pivot->sum('amount') }}</td>
                                            @endforeach --}}
                                            <td>{{ $item->user->name }}</td>
                                            
                                            <td>
                                                <div class="dropdown show">
                                                    <a class="btn btn-success dropdown-toggle" role="button"
                                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Action
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        {{-- <a  data-toggle="modal" data-target="#UpdateModal{{$item->id}}"
                                                            class="dropdown-item">
                                                            <i class="nav-icon fas fa-copy" style="color: blue"></i>
                                                            Edit
                                                        </a> --}}
                                                        <form action="{{ route('stories.destroy', $item->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="nav-icon fas fa-cut" style="color: red"></i>
                                                                Terminate
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <x-edit-modal title="Update freelancer" routeName="stories" :id="$item->id">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Title</label>
                                                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title" value="{{ $item->title }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail2">Page No</label>
                                                        <input type="number" class="form-control" name="page_no" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter page number" value="{{ $item->page_no }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail3">Date published</label>
                                                        <input type="date" class="form-control" name="date_publish" id="exampleInputEmail3" aria-describedby="emailHelp" placeholder="Enter date published" value="{{ $item->date_publish }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Category</label>
                                                        <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                                                            <option selected disabled>Select a category</option>
                                                            @foreach($story_category as $category)
                                                                <option value="{{ $category->id }}"  {{$category->id == $item->category_id ? 'selected' : ''}}>{{ $category->category }}</option>
                                                            @endforeach
                                                      </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect2">Formation</label>
                                                        <select class="form-control" name="formation_id" id="exampleFormControlSelect2">
                                                            <option selected disabled>Select a formation</option>
                                                            @foreach($story_formation as $formation)
                                                                <option value="{{ $formation->id }}"  {{$formation->id == $item->formation_id ? 'selected' : ''}}>{{ $formation->formation }}</option>
                                                            @endforeach
                                                      </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect3">User</label>
                                                        <select class="form-control" name="posted_by" id="exampleFormControlSelect3">
                                                            <option selected disabled>Select a User</option>
                                                            @foreach($users as $user)
                                                                <option value="{{ $user->id }}"  {{$user->id == $item->posted_by ? 'selected' : ''}}>{{ $user->name }}</option>
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
