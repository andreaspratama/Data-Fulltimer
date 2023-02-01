@extends('layouts.admin')

@section('title')
    Tambah Data
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pekerjaan</h6>
            </div>
            <div class="card-body">
                <form action="{{route('pekerjaStore')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="datadiri_id" value="{{$item->id}}">

                        <label for="pengKerja">Pengalaman Kerja</label>
                        <textarea class="form-control" id="pengKerja" rows="3" name="pengKerja"></textarea>

                        <label for="pekSkrng" class="mt-3">Pekerjaan Sekarang</label>
                        <input type="text" class="form-control" id="pekSkrng" name="pekSkrng" placeholder="Pekerjaan Sekarang...">
                    </div>
                    <button type="submit" class="btn btn-success mt-3" style="margin-top: 10px">Simpan</button>
                    <a href="/admin/datadiri/{{$item->id}}" class="btn btn-secondary float-right">Batal</a>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css">
@endpush

@push('addon-script')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush