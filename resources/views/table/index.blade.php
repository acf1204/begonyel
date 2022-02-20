@extends('templates.master')
@section('title.List Table')

@section('main')

<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>DataTable</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('/table/create')}}"class="btn btn-primary rounded-pill">add product</a>
           
           
            </div>
            <div class="card-body">
                @if(session('status'))
            <div class="row">
                <div class="col-6">
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            {{session('status')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                </div>
            </div>
            @endif

            
            @if(session('status_edit'))
            <div class="row">
                <div class="col-6">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{session('status_edit')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                </div>
            </div>
            @endif

            @if(session('status_hapus'))
            <div class="row">
                <div class="col-6">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{session('status_hapus')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                </div>
            </div>
            @endif
            
                <table class="table table-striped" id="table2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Table</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tables as $tbl)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $tbl->number}}</td>
                            <td>{{ $tbl->status_table}}</td>
                            <td>
                            <a href="{{ url('/table/' .$tbl->id. '/edit')}}"class="btn btn-warning">Edit</a> 
                            <form action="{{ url('/table/'.$tbl->id)}}" method="POST" class="d-inline"> 
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>

    </section>
</div>

@endsection