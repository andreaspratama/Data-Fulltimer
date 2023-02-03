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
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Full Timer, Staff, Karyawan</h6>
            </div>
            <div class="card-body">
                <form action="{{route('kelStore', $item->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="datadiri_id" name="datadiri_id" value="{{$item->id}}">

                        <label for="exampleFormControlSelect1">Status</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="status">
                        <option></option>
                        <option value="Single">Single</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                        </select>

                        <label for="namaPasa" class="mt-3">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namaPasa" name="namaPasa" placeholder="Nama Lengkap...">

                        <label for="tlahirPasa" class="mt-3">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tlahirPasa" name="tlahirPasa" placeholder="Tempat Lahir...">

                        <label for="tgllahirPasa" class="mt-3">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgllahirPasa" name="tgllahirPasa" placeholder="Tanggal Lahir...">

                        <label for="pekerjaanPasa" class="mt-3">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaanPasa" name="pekerjaanPasa" placeholder="pekerjaan...">

                        <label for="pend_akhir" class="mt-3">Pendidikan Akhir</label>
                        <select class="form-control" id="pend_akhir" name="pend_akhir">
                          <option></option>
                          <option value="SD">SD</option>
                          <option value="SMP">SMP</option>
                          <option value="SMA">SMA</option>
                          <option value="S1">S1</option>
                          <option value="S2">S2</option>
                          <option value="S3">S3</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success mt-3" style="margin-top: 10px">Simpan</button>
                    <a href="/gbt/datadiri/{{$item->id}}" class="btn btn-secondary float-right">Batal</a>
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