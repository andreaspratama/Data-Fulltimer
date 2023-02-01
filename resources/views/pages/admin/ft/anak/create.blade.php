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
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Anak</h6>
            </div>
            <div class="card-body">
                <form action="{{route('anakStore', $item->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="namaAnak" name="datadiri_id[]" placeholder="Nama Lengkap..." value="{{$item->id}}">

                        <label for="namaAnak">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namaAnak" name="namaAnak[]" placeholder="Nama Lengkap...">

                        <label for="jk" class="mt-3">Jenis Kelamin</label>
                        <select class="form-control" id="jk" name="jk[]">
                          <option></option>
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>

                        <label for="tlahirAnak" class="mt-3">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tlahirAnak" name="tlahirAnak[]" placeholder="Tempat Lahir...">

                        <label for="tgllahirAnak" class="mt-3">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgllahirAnak" name="tgllahirAnak[]" placeholder="Tanggal Lahir...">

                        <label for="pendpekerja" class="mt-3">Pendidikan / Pekerjaan</label>
                        <textarea class="form-control" id="pendpekerja" rows="3" name="pendpekerja[]"></textarea>
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-primary float-right plus mb-3">Tambah Form</a>
                    </div>
                    <div class="tambahLagi"></div>
                    {{-- <div class="after-more">
                        <div class="form-group">
                            <label for="namaAnak">Nama Lengkap</label>
                            <input type="text" class="form-control" id="namaAnak" name="namaAnak[]" placeholder="Nama Lengkap...">
    
                            <label for="jk" class="mt-3">Jenis Kelamin</label>
                            <select class="form-control" id="jk" name="jk[]">
                              <option>-- Pilih --</option>
                              <option value="Laki-Laki">Laki-Laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
    
                            <label for="tlahirAnak" class="mt-3">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tlahirAnak" name="tlahirAnak[]" placeholder="Tempat Lahir...">
    
                            <label for="tgllahirAnak" class="mt-3">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tgllahirAnak" name="tgllahirAnak[]" placeholder="Tanggal Lahir...">
    
                            <label for="pendpekerja" class="mt-3">Pendidikan / Pekerjaan</label>
                            <textarea class="form-control" id="pendpekerja" rows="3" name="pendpekerja[]"></textarea>
                        </div>
                    </div> --}}
                    <div class="tombolAksi mt-3">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="/admin/datadiri/{{$item->id}}" class="btn btn-secondary float-right mr-3">Batal</a>
                        {{-- <a href="{{route('gb.index')}}" class="btn btn-secondary">Batal</a> --}}
                    </div>
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
    {{-- <script>
        $('#tgllahirAnak').datepicker();
    </script>
    <script>
        $('#tgllahirAnak2').datepicker();
    </script> --}}
    @push('addon-script')
        {{-- <script type="text/javascript">
            $(document).ready(function() {
            $(".add").click(function(){ 
                var html = $(".copy").html();
                $(".after-more").after(html);
            });
            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click",".remove",function(){ 
                $(this).parents(".control-group").remove();
            });
            });
        </script> --}}
        <script>
            $(document).ready(function() {
                $('.plus').on('click', function(){
                tambahForm();
                });
                function tambahForm(){
                    var tambahLagi = '<div class="tambahAja"><div class="form-group"><input type="text" class="form-control" id="namaAnak" name="datadiri_id[]" placeholder="Nama Lengkap..." value="{{$item->id}}"><label for="namaAnak">Nama Lengkap</label><input type="text" class="form-control" id="namaAnak" name="namaAnak[]" placeholder="Nama Lengkap..."><label for="jk" class="mt-3">Jenis Kelamin</label><select class="form-control" id="jk" name="jk[]"><option>-- Pilih --</option><option value="Laki-Laki">Laki-Laki</option><option value="Perempuan">Perempuan</option></select><label for="tlahirAnak" class="mt-3">Tempat Lahir</label><input type="text" class="form-control" id="tlahirAnak" name="tlahirAnak[]" placeholder="Tempat Lahir..."><label for="tgllahirAnak" class="mt-3">Tanggal Lahir</label><input type="date" class="form-control" id="tgllahirAnak2" name="tgllahirAnak[]" placeholder="Tanggal Lahir..."><label for="pendpekerja" class="mt-3">Pendidikan / Pekerjaan</label><textarea class="form-control" id="pendpekerja2" rows="3" name="pendpekerja[]"></textarea></div><div class="form-group"><a href="#" class="remove btn btn-danger float-right mb-3">Hapus Form</a></div></div>';
                    $('.tambahLagi').append(tambahLagi);
                };
                $("body").on("click",".remove",function(){ 
                    $(this).parents(".tambahAja").remove();
                });
            });
        </script>
    @endpush
@endpush