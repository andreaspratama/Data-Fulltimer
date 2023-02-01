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
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Kepemilikan</h6>
            </div>
            <div class="card-body">
                <form action="/admin/kepUpdate/{{$kep->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="datadiri_id" name="datadiri_id" value="{{$kep->datadiri_id}}">

                        <label for="tptTinggal">Tempat Tinggal</label>
                        <select class="form-control" id="tptTinggal" name="tptTinggal">
                          <option></option>
                          <option value="HM" @if($kep->tptTinggal == 'HM') selected @endif>HM</option>
                          <option value="Ikut Ortu" @if($kep->tptTinggal == 'Ikut Ortu') selected @endif>Ikut Ortu</option>
                          <option value="Kontrak / Kost" @if($kep->tptTinggal == 'Kontrak / Kost') selected @endif>Kontrak / Kost</option>
                        </select>

                        <label for="ket" class="mt-3">Jelaskan</label>
                        <textarea class="form-control" id="ket" rows="3" name="ket">{{$kep->ket}}</textarea>

                        <label for="transport" class="mt-3">Transportasi</label>
                        <select class="form-control" id="transport" name="transport">
                          <option></option>
                          <option value="Angkutan Umum" @if($kep->transport == 'Angkutan Umum') selected @endif>Angkutan Umum</option>
                          <option value="Sepeda" @if($kep->transport == 'Sepeda') selected @endif>Sepeda</option>
                          <option value="Motor" @if($kep->transport == 'Motor') selected @endif>Motor</option>
                          <option value="Mobil" @if($kep->transport == 'Mobil') selected @endif>Mobil</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success mt-3" style="margin-top: 10px">Simpan</button>
                    <a href="{{route('datadiri.show', $kep->datadiri_id)}}" class="btn btn-secondary float-right">Batal</a>
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