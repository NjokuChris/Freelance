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
                    <h1>Category price</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category-price</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <p class="">
                <a class="btn btn-primary"  data-toggle="modal" data-target="#AddModal">Create Category Price</a>
                <x-add-modal title="Add new category price" routeName="category-price">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Price Name</label>
                        <input type="text" class="form-control" name="cat_price_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price name">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Formation</label>
                      <select class="form-control" name="formation_id" id="exampleFormControlSelect1">
                          <option selected disabled>Select a status</option>
                            @foreach ($formation as $itm)
                              <option value="{{ $itm->id }}">{{ $itm->formation }}</option>
                            @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                            <option selected disabled>Select a status</option>
                              @foreach ($category as $itm)
                                <option value="{{ $itm->id }}">{{ $itm->category }}</option>
                              @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Posted by</label>
                        <select class="form-control" name="posted_by" id="exampleFormControlSelect1">
                            <option selected disabled>Select a status</option>
                            <option value="0">Active</option>
                            <option value="1">Inactive</option>
                        </select>
                      </div> 
                </x-add-modal>
            </p>
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category prices</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" >
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category price</th>
                                        <th>Formation</th>
                                        <th>Category</th>
                                        <th>Posted by</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($price as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->cat_price_name }}</td>
                                            <td>{{ $item->formation->formation }}</td>
                                            <td>{{ $item->category->category }}</td>
                                            <td>{{ $item->posted_by }}</td>
                                            
                                            <td>
                                                <div class="dropdown show">
                                                    <a class="btn btn-success dropdown-toggle" href="#" role="button"
                                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Action
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a  data-toggle="modal" data-target="#UpdateModal{{$item->id}}"
                                                            class="dropdown-item">
                                                            <i class="nav-icon fas fa-copy" style="color: blue"></i>
                                                            Edit</a>
                                                            <form action="{{ route('category-price.destroy', $item->id)}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item">
                                                                    <i class="nav-icon fas fa-cut" style="color: red"></i>
                                                                    Terminate
                                                                </button>
                                                            </form>
                                                    </div>
                                                </div>
                                                <x-edit-modal title="Update category price" routeName="category-price" :id="$item->id">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Category Price Name</label>
                                                        <input type="text" class="form-control" name="cat_price_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price name" value="{{ $item->cat_price_name }}">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="exampleFormControlSelect1">Formation</label>
                                                      <select class="form-control" name="formation_id" id="exampleFormControlSelect1">
                                                          <option selected disabled>Select a status</option>
                                                            @foreach ($formation as $itm)
                                                              <option value="{{ $itm->id }}" {{$itm->id == $item->formation_id ? 'selected' : ''}}>{{ $itm->formation }}</option>
                                                            @endforeach
                                                      </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Category</label>
                                                        <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                                                            <option selected disabled>Select a status</option>
                                                              @foreach ($category as $itm)
                                                                <option value="{{ $itm->id }}" {{$itm->id == $item->category_id ? 'selected' : ''}}>{{ $itm->category }}</option>
                                                              @endforeach
                                                        </select>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Posted by</label>
                                                        <select class="form-control" name="posted_by" id="exampleFormControlSelect1">
                                                            <option selected disabled>Select a status</option>
                                                            <option value="0">Active</option>
                                                            <option value="1">Inactive</option>
                                                        </select>
                                                      </div>
                                                </x-edit-modal>
                                            </td>

                                        </tr>
                                    @endforeach



                                </tbody>
                                {{-- <tfoot>
                                    <tr>
                                        <th>Member ID</th>
                                            <th>Title</th>
                                            <th>Name</th>
                                            <th>Savings Amount</th>
                                            <th>Location</th>
                                            <th>Date joined</th>
                                            <th>Action</th>
                                    </tr>
                                </tfoot> --}}
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
