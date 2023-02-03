@extends('layouts.admin')

@section('title')
    Edit Data
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Data</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Pendidikan</h6>
            </div>
            <div class="card-body">
                <form action="/gbt/pendUpdate/{{$pend->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="datadiri_id" name="datadiri_id" value="{{$pend->datadiri_id}}">

                        <label for="sd">Sekolah Dasar</label>
                        <input type="text" class="form-control" id="sd" name="sd" placeholder="Sekolah Dasar..." value="{{$pend->sd}}">

                        <label for="smp" class="mt-3">Sekolah Menengah Pertama</label>
                        <input type="text" class="form-control" id="smp" name="smp" placeholder="Sekolah Menengah Pertama..." value="{{$pend->smp}}">

                        <label for="sma" class="mt-3">Sekolah Menengah Atas</label>
                        <input type="text" class="form-control" id="sma" name="sma" placeholder="Sekolah Menengah Atas..." value="{{$pend->sma}}">

                        <label for="univ" class="mt-3">Universitas</label>
                        <input type="text" class="form-control" id="univ" name="univ" placeholder="Universitas..." value="{{$pend->univ}}">

                        <label for="kursus" class="mt-3">Kursus</label>
                        <input type="text" class="form-control" id="kursus" name="kursus" placeholder="Kursus..." value="{{$pend->kursus}}">

                        <label for="kursusImg" class="mt-3">Sertifikat Kursus</label>
                        <input type="file" class="form-control-file" id="kursusImg" name="kursusImg">
                        <img src="{{Storage::url($pend->kursusImg)}}" alt="" class="img-thumbnail mt-2 mb-3" width="15%">

                        <div class="sem">
                            <label for="seminar">Seminar</label>
                        </div>
                        <input type="text" class="form-control" id="seminar" name="seminar" placeholder="Seminar..." value="{{$pend->seminar}}">

                        <label for="semImg" class="mt-3">Sertifikat Seminar</label>
                        <input type="file" class="form-control-file" id="semImg" name="semImg">
                        <img src="{{Storage::url($pend->semImg)}}" alt="" class="img-thumbnail mt-2 mb-3" width="15%">

                        <div class="pel">
                            <label for="pelatihan">Pelatihan</label>
                        </div>
                        <input type="text" class="form-control" id="pelatihan" name="pelatihan" placeholder="Pelatihan..." value="{{$pend->pelatihan}}">

                        <label for="pelatihanImg" class="mt-3">Sertifikat Pelatihan</label>
                        <input type="file" class="form-control-file" id="pelatihanImg" name="pelatihanImg">
                        <img src="{{Storage::url($pend->pelatihanImg)}}" alt="" class="img-thumbnail mt-2" width="15%">
                    </div>
                    <button type="submit" class="btn btn-success mt-3" style="margin-top: 10px">Simpan</button>
                    <a href="{{route('datadiri.show', $pend->datadiri_id)}}" class="btn btn-secondary float-right">Batal</a>
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