@extends('layouts.master')

@push('title') BK Task @endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Current Directory Files</h3>
                        </div>
                    
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0 text-center">
                                    <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Name</th>
                                            <th>Path</th>
                                        </tr>
                                    </thead>
                                
                                    {{-- <tbody>
                                        @foreach ($files as $file)
                                            <tr>
                                                <td># {{ $loop->iteration }}</td>
                                                <td>{{ basename($file) }}</td>
                                                <td>{{ $file }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody> --}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
