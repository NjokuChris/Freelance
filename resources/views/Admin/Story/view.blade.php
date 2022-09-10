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
                    <h1>View story</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">View-story</li>
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
                            <h3 class="card-title">View Story</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" >
                            <div class="container">
                                <div class="row mb-5">
                                    <div class="col-8">
                                        <p class="text-dark">
                                            <strong>Story title</strong>
                                        </p>
                                        <p class="text-secondary text-lg">
                                            {{ $story->title}}
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p class="text-dark">
                                            <strong>Page number</strong>
                                        </p>
                                        <p class="text-secondary text-lg">
                                            {{ $story->page_no}}
                                        </p>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col">
                                        <p class="text-dark">
                                            <strong>Date published</strong>
                                        </p>
                                        <p class="text-secondary text-lg">
                                            {{ $story->date_publish}}
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="text-dark">
                                            <strong>Category</strong>
                                        </p>
                                        <p class="text-secondary text-lg">
                                            {{ $story->category->category}}
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="text-dark">
                                            <strong>Formation</strong>
                                        </p>
                                        <p class="text-secondary text-lg">
                                            {{ $story->formation->formation}}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="text-dark">
                                            <strong>Posted by</strong>
                                        </p>
                                        <p class="text-secondary text-lg">
                                            {{ $story->user->name}}
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="text-dark">
                                            <strong>Contributors</strong>
                                        </p>
                                        <ul class="text-secondary text-lg">
                                            @foreach($story->contributors as $item)
                                                <li>{{ $item->ful_name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <p class="text-dark">
                                            <strong>Total amount earned</strong>
                                        </p>
                                        <ul class="text-secondary text-lg">
                                            @foreach($amount as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
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
