@extends('layouts.master')

@push('title') BK Task | Add School @endpush

@push('custom-styles')
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add School</h1>
                </div>
        
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('school.schools') }}">Schools</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">School Information</h3>
                        </div>
                    
                        <form class="cmxform" method="POST" action="{{ route('school.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="status">School Status</label> <br>
                                            <input type="checkbox" id="status" name="status" class="form-control" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary col-md-12">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('custom-scripts')
    <!-- Bootstrap Switch -->
    <script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script>
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    </script>
@endpush