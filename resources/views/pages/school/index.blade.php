@extends('layouts.master')

@push('title') BK Task | Schools @endpush

@push('custom-styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <style>
        .row-margin{
            margin-top: 10px;
        }
    </style>
@endpush

@section('content')
    @include('partials.messages')
    
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Schools</h1>
                </div>
        
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Schools</li>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('school.add') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add School</a>
                                </div>
                            </div>

                            <div class="row row-margin">
                                <div class="col-md-12">
                                    <table id="schoolTable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>School Name</th>
                                                <th>Status</th>
                                                <th>Action(s)</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('custom-scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    <script>
        $('#schoolTable').DataTable({
            "ajax": {
                "url": "{{ route('school.get') }}",
                "type": "GET",
                dataSrc:""
            },
            columns: [
                { 
                    "className": "text-center",
                    "render": function ( data, type, full, meta ) {
                        if(full.name != null){
                            var name    = full.name;
                            return '<label id="entity_'+full.id+'">'+name+'</label>';
                        }else{
                            return '<label style="color:red"> Not Set </label>';
                        }
                    }
                },
                { 
                    "className": "text-center",
                    "render": function ( data, type, full, meta ) {
                        if(full.status != null){
                            var status = full.status;

                            if(status === 1){
                                return '<label style="color:green"> Active </label>';
                            }else{
                                return '<label style="color:red"> Inactive </label>';
                            }
                        }else{
                            return '<label style="color:red"> Not Set </label>';
                        }
                    }
                },
                {
                    "className": "text-center",
                    "render": function ( data, type, full, meta ) {
                        var content     = '';
                        var id          = full.id;
                        var edit_user   = "{{ route('school.edit',['id' => 'id']) }}";
                        edit_user       = edit_user.replace('id', id);
                        var del_user    = "{{ route('school.delete',['id' => 'id']) }}";
                        del_user        = del_user.replace('id', id);
                        content         += '<a href='+edit_user+' id='+id+' name="edit" class="btn btn-outline-warning" style="color:#ffe100;cursor: pointer;"><i class="fas fa-edit"></i></a> ';
                        content         += '<button type="button" id='+id+' name="delete" class="delete-entity btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-route="'+del_user+'" data-table="schoolTable" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" style="cursor: pointer;"><i class="fas fa-trash"></i></button> ';
                        return content;       
                    }
                }
            ]
        });
    </script>
@endpush