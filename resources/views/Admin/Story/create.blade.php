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
                    <h1>Create stories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create-stories</li>
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
                            <h3 class="card-title">Create Stories</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" >
                            <form  method="post" action="{{ route('stories.store') }}" enctype="multipart/form-data" class="container">
                                @csrf
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
                                    </div>
                                    <div class="form-group col">
                                        <label for="exampleInputEmail2">Page No</label>
                                        <input type="number" class="form-control" name="page_no" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter page number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="exampleInputEmail3">Date published</label>
                                        <input type="date" class="form-control" name="date_publish" id="exampleInputEmail3" aria-describedby="emailHelp" placeholder="Enter date published">
                                    </div>
                                    <div class="form-group col">
                                        <label for="exampleFormControlSelect1">Category</label>
                                        <select class="form-control category" name="category_id" id="exampleFormControlSelect1">
                                            <option selected disabled>Select a category</option>
                                            @foreach($story_category as $category)
                                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                                            @endforeach
                                    </select>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="exampleFormControlSelect2">Formation</label>
                                        <select class="form-control" name="formation_id" id="exampleFormControlSelect2">
                                            <option selected disabled>Select a formation</option>
                                            @foreach($story_formation as $formation)
                                                <option value="{{ $formation->id }}">{{ $formation->formation }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col">
                                        <label for="exampleFormControlSelect3">User</label>
                                        <select class="form-control" name="posted_by" id="exampleFormControlSelect3">
                                            <option selected disabled>Select a User</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect4">Freelancers</label>
                                    <div class="dropdown show">
                                        <a class="btn border-secondary dropdown-toggle w-50 text-left" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Select freelancers
                                        </a>
                                      
                                        <div class="dropdown-menu w-50" aria-labelledby="dropdownMenuLink">
                                            @foreach($freelancers as $freelancer)
                                                <div class="dropdown-item">
                                                    <div class="form-check">
                                                        <input class="form-check-input freelanceChx" name="freelancers[]" type="checkbox" value="{{$freelancer->id}}" id="defaultCheck{{$freelancer->id}}">
                                                        <label class="form-check-label" for="defaultCheck{{$freelancer->id}}">
                                                            {{ $freelancer->full_name }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                      </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
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
        $(function() {
            $("#exampleFormControlSelect1").change(() =>
            {
                console.log('selectedCategory');
                var selectedCategory = $("#exampleFormControlSelect1").val()
                console.log(selectedCategory)

                if (selectedCategory == '2')
                {
                    $(".freelanceChx").attr("type", "radio")
                }
                else{
                    $(".freelanceChx").attr("type", "checkbox")
                }
            })
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
