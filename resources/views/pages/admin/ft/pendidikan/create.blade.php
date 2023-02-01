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
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pendidikan</h6>
            </div>
            <div class="card-body">
                <form action="{{route('pendStore', $item->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="sd">Sekolah Dasar</label>
                        <input type="text" class="form-control" id="sd" name="sd" placeholder="Sekolah Dasar...">

                        <label for="smp" class="mt-3">Sekolah Menengah Pertama</label>
                        <input type="text" class="form-control" id="smp" name="smp" placeholder="Sekolah Menengah Pertama...">

                        <label for="sma" class="mt-3">Sekolah Menengah Atas</label>
                        <input type="text" class="form-control" id="sma" name="sma" placeholder="Sekolah Menengah Atas...">

                        <label for="univ" class="mt-3">Universitas</label>
                        <input type="text" class="form-control" id="univ" name="univ" placeholder="Universitas...">

                        <label for="kursus" class="mt-3">Kursus</label>
                        <input type="text" class="form-control" id="kursus" name="kursus" placeholder="Kursus...">

                        <label for="kursusImg" class="mt-3">Sertifikat Kursus</label>
                        <input type="file" class="form-control-file" id="kursusImg" name="kursusImg">

                        <label for="seminar" class="mt-3">Seminar</label>
                        <input type="text" class="form-control" id="seminar" name="seminar" placeholder="Seminar...">

                        <label for="semImg" class="mt-3">Sertifikat Seminar</label>
                        <input type="file" class="form-control-file" id="semImg" name="semImg">

                        <label for="pelatihan" class="mt-3">Pelatihan</label>
                        <input type="text" class="form-control" id="pelatihan" name="pelatihan" placeholder="Pelatihan...">

                        <label for="pelatihanImg" class="mt-3">Sertifikat Pelatihan</label>
                        <input type="file" class="form-control-file" id="pelatihanImg" name="pelatihanImg">
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
        CKEDITOR.replace( 'pelPernah' );
    </script>
@endpush