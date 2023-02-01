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
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Dokumen</h6>
            </div>
            <div class="card-body">
                <form action="{{route('dokStore', $item->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="ktp">KTP</label>
                        <input type="file" class="form-control-file" id="ktp" name="ktp">

                        <label for="kk" class="mt-3">KK</label>
                        <input type="file" class="form-control-file" id="kk" name="kk">

                        <label for="surat_nikah" class="mt-3">Surat Nikah</label>
                        <input type="file" class="form-control-file" id="surat_nikah" name="surat_nikah">

                        <label for="surat_baptis" class="mt-3">Surat Baptis</label>
                        <input type="file" class="form-control-file" id="surat_baptis" name="surat_baptis">
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
    <script>
        $('#tgllahirPasa').datepicker();
    </script>
    <script>
        CKEDITOR.replace( 'pres' );
    </script>
@endpush