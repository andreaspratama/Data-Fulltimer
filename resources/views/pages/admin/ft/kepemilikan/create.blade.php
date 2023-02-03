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
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kepemilikan</h6>
            </div>
            <div class="card-body">
                <form action="{{route('kepStore', $item->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="tptTinggal">Tempat Tinggal</label>
                        <select class="form-control" id="tptTinggal" name="tptTinggal">
                          <option></option>
                          <option value="HM">HM</option>
                          <option value="Ikut Ortu">Ikut Ortu</option>
                          <option value="Kontrak / Kost">Kontrak / Kost</option>
                        </select>

                        <label for="ket" class="mt-3">Jelaskan</label>
                        <textarea class="form-control" id="ket" rows="3" name="ket"></textarea>

                        <label for="transport" class="mt-3">Transportasi</label>
                        <select class="form-control" id="transport" name="transport">
                          <option></option>
                          <option value="Angkutan Umum">Angkutan Umum</option>
                          <option value="Sepeda">Sepeda</option>
                          <option value="Motor">Motor</option>
                          <option value="Mobil">Mobil</option>
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