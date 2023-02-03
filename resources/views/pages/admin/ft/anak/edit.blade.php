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
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Anak {{$dt->nama}}</h6>
            </div>
            <div class="card-body">
                <form action="/gbt/anakUpdate/{{$kbl->datadiri_id}}" method="POST">
                    @csrf
                    @method('PUT')
                    @foreach ($anak as $ank)
                        <div class="form-group">
                            {{-- <input type="text" class="form-control" id="namaAnak" name="datadiri_id[]" placeholder="Nama Lengkap..." value="{{$ank->datadiri_id}}"> --}}
                            {{-- <input type="text" value="{{$kbl->datadiri_id}}" name="datadiri_id[]"> --}}
                            <input type="hidden" value="{{$ank->datadiri_id}}" name="datadiri_id[]">

                            <label for="namaAnak">Nama Lengkap</label>
                            <input type="text" class="form-control" id="namaAnak" name="namaAnak[]" placeholder="Nama Lengkap..." value="{{$ank->namaAnak}}">

                            <input type="hidden" value="{{$ank->id}}" name="id[]">

                            <label for="jk" class="mt-3">Jenis Kelamin</label>
                            <select class="form-control" id="jk" name="jk[]">
                            <option></option>
                            <option value="Laki-Laki" @if($ank->jk == 'Laki-Laki') selected @endif>Laki-Laki</option>
                            <option value="Perempuan" @if($ank->jk == 'Perempuan') selected @endif>Perempuan</option>
                            </select>

                            <label for="tlahirAnak" class="mt-3">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tlahirAnak" name="tlahirAnak[]" placeholder="Tempat Lahir..." value="{{$ank->namaAnak}}">

                            <label for="tgllahirAnak" class="mt-3">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgllahirAnak" name="tgllahirAnak[]" placeholder="Tanggal Lahir..." value="{{$ank->tgllahirAnak}}">

                            <label for="pendpekerja" class="mt-3">Pendidikan / Pekerjaan</label>
                            <textarea class="form-control" id="pendpekerja" rows="3" name="pendpekerja[]">{{$ank->pendpekerja}}</textarea>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <a href="#" class="btn btn-primary float-right plus mb-3 ml-3">Tambah Form</a>
                    </div>
                    <div class="tambahLagi mt-3"></div>
                    <button type="submit" class="btn btn-success mt-3" style="margin-top: 10px">Simpan</button>
                    <a href="/gbt/datadiri/{{$kbl->datadiri_id}}" class="btn btn-secondary float-right">Batal</a>
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
    <script>
        $(document).ready(function() {
            $('.plus').on('click', function(){
            tambahForm();
            });
            function tambahForm(){
                var tambahLagi = '<div class="tambahAja"><div class="form-group"><input type="hidden" class="form-control" id="namaAnak" name="datadiri_id[]" placeholder="Nama Lengkap..." value="{{$kbl->datadiri_id}}"><label for="namaAnak" class="mt-5">Nama Lengkap</label><input type="text" class="form-control" id="namaAnak" name="namaAnak[]" placeholder="Nama Lengkap..."><label for="jk" class="mt-3">Jenis Kelamin</label><select class="form-control" id="jk" name="jk[]"><option>-- Pilih --</option><option value="Laki-Laki">Laki-Laki</option><option value="Perempuan">Perempuan</option></select><label for="tlahirAnak" class="mt-3">Tempat Lahir</label><input type="text" class="form-control" id="tlahirAnak" name="tlahirAnak[]" placeholder="Tempat Lahir..."><label for="tgllahirAnak" class="mt-3">Tanggal Lahir</label><input type="date" class="form-control" id="tgllahirAnak2" name="tgllahirAnak[]" placeholder="Tanggal Lahir..."><label for="pendpekerja" class="mt-3">Pendidikan / Pekerjaan</label><textarea class="form-control" id="pendpekerja2" rows="3" name="pendpekerja[]"></textarea></div><div class="form-group"><a href="#" class="remove btn btn-danger float-right mb-3 ml-3">Hapus Form</a></div></div>';
                $('.tambahLagi').append(tambahLagi);
            };
            $("body").on("click",".remove",function(){ 
                $(this).parents(".tambahAja").remove();
            });
        });
    </script>
@endpush