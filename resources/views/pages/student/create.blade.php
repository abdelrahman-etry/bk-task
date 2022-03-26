@extends('layouts.master')

@push('title') BK Task | Add Students @endpush

@push('custom-styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Students</h1>
                </div>
        
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('student.students') }}">Students</a></li>
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
                            <h3 class="card-title">Students Information</h3>
                        </div>
                    
                        <form class="cmxform" method="POST" action="{{ route('student.store') }}">
                            @csrf
                            {{-- schools --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Student Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name">
                                </div>

                                <div class="form-group">
                                    <label>Schools</label>
                                    <select class="form-control select2" name="school">
                                        <option value="-1">Select School</option>
                                        @if(count($schools) > 0)
                                            @foreach($schools as $school)
                                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
      
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success col-md-12">Add Student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('custom-scripts')
    <!-- Select2 -->
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>$('.select2').select2();</script>
@endpush