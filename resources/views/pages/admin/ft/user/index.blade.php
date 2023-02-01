@extends('layouts.admin')

@section('title')
    List User
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">List User</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List User Full Timer, Staff, Karyawan</h6>
                @if (Auth::user()->role === 'Admin')
                    <a href="{{route('ddexportExcel')}}" class="btn btn-success mt-2">Export Excel</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">
                        Import Data User
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('importExcelUser')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                      <label for="exampleFormControlFile1">Pilih File</label>
                                      <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover" id="listTable">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $i)
                            <tr>
                                <td>{{$i->name}}</td>
                                <td>{{$i->email}}</td>
                                <td>{{$i->role}}</td>
                                <td>Aksi</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    @include('sweetalert::alert')
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
@endpush

@push('addon-script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    {{-- <script>
        var datatable = $('#listTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'nama', name: 'nama' },
                {
                    data: 'aksi',
                    name: 'aksi',
                    orderable: false,
                    searcable: false,
                    width: '25%'
                },
            ]
        })
    </script> --}}
    <script>
        $(document).ready(function () {
            $('#listTable').DataTable();
        });
    </script>
@endpush