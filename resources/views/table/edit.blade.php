@extends('templates.master')
@section ('title', 'Edit Table')

@section('main')

<!-- Include Choices CSS -->
<link rel="stylesheet" href="{{asset('assets/vendors/choices.js/choices.min.css')}}" />

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
                    <h3>Form Edit table</h3>
                    <p class="text-subtitle text-muted">Multiple form layout you can use</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit table</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">

                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit table</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ url ('/table/' .$tableModel->id)}}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Nomor Meja</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control @error('no_meja') is-invalid  @enderror" placeholder="Masukan No Meja" id="first-name-icon" name="no_meja" value="{{ $tableModel -> number }}">
                                                        @error('no_meja')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Price</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <select class="choices form-select" name="status_meja">
                                                        @if($tableModel->status_table=='available')
                                                        <option selected>available</option>
                                                        <option >occupied</option>
                                                        @else
                                                        <option >available</option>
                                                        <option selected>occupied</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>


    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Mazer</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://ahmadsaugi.com">A. Saugi</a></p>
            </div>
        </div>
    </footer>
</div>

<!-- Include Choices JavaScript -->
<script src="{{asset('assets/vendors/choices.js/choices.min.js') }}"></script>
<script src="{{asset('assets/js/pages/form-element-select.js') }}"></script>

@endsection