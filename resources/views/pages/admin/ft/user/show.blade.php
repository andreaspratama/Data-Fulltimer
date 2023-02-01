@extends('layouts.admin')

@section('title')
    Detail Data {{$item->nama}}
    @endsection
    
    @section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <a href="{{route('datadiri.index')}}" class="btn btn-secondary float-right">Kembali</a>

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detail Data {{$item->nama}}</h1>

        <div class="card mt-3">
            <div class="card-header">
              Data Diri
              <a href="{{route('datadiri.edit', $item->id)}}" class="btn btn-warning btn-sm float-right">
                Edit
              </a>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                    <th width="30%">Nama</th>
                    <td>{{$item->nama}}</td>
                </tr>
                <tr>
                    <th width="30%">Tempat Lahir</th>
                    <td>{{$item->tlahirDiri}}</td>
                </tr>
                <tr>
                    <th width="30%">Tanggal Lahir</th>
                    <td>{{$item->tgllahirDiri}}</td>
                </tr>
                <tr>
                    <th width="30%">Mulai Bekerja</th>
                    <td>{{$item->mulai_bekerja}}</td>
                </tr>
                <tr>
                    <th width="30%">Jabatan</th>
                    <td>{{$item->jabatan}}</td>
                </tr>
                <tr>
                    <th width="30%">Alamat</th>
                    <td>{{$item->alamat}}</td>
                </tr>
                <tr>
                    <th width="30%">Telephone</th>
                    <td>{{$item->telp}}</td>
                </tr>
                <tr>
                    <th width="30%">HP</th>
                    <td>{{$item->hp}}</td>
                </tr>
                <tr>
                    <th width="30%">Email</th>
                    <td>{{$item->email}}</td>
                </tr>
              </table>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
              Data Keluarga
              @if ($dk === null)
                  <a href="{{route('kelCreate', $item->id)}}" class="btn btn-primary btn-sm float-right">
                    Tambah Data
                  </a>
              @endif
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                @if ($dk === null)
                    <div class="alert alert-danger" role="alert">
                        Data Kosong
                    </div>
                @else
                    <tr>
                        <th width="30%">Status</th>
                        <td>{{$dk->status}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Nama</th>
                        <td>{{$dk->namaPasa}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Tempat Lahir</th>
                        <td>{{$dk->tlahirPasa}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Tanggal Lahir</th>
                        <td>{{$dk->tgllahirPasa}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Pekerjaan</th>
                        <td>{{$dk->pekerjaanPasa}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Pendidikan Akhir</th>
                        <td>{{$dk->pend_akhir}}</td>
                    </tr>
                @endif
              </table>
              @if ($dk != null)
                  <a href="{{route('kelEdit', $dk->id)}}" class="btn btn-warning btn-sm">
                    Edit Data
                  </a>
                  @if (Auth::user()->role === 'Admin')
                    <a href="{{route('kelExport', $dk->datadiri_id)}}" class="btn btn-success btn-sm">
                      Export Data
                    </a>
                  @endif
              @endif
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
              Data Anak
              @if ($anak === null)
                  <a href="{{route('anakCreate', $item->id)}}" class="btn btn-primary btn-sm float-right">
                    Tambah Data
                  </a>
              @endif
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                @if ($anak === null)
                    <div class="alert alert-danger" role="alert">
                        Data Kosong
                    </div>
                @else
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Pendidikan / Pekerjaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anhasil as $an)
                            @if ($an->datadiri_id === $item->id)
                                <tr>
                                    <td>{{$an->namaAnak}}</td>
                                    <td>{{$an->jk}}</td>
                                    <td>{{$an->tlahirAnak}}</td>
                                    <td>{{$an->tgllahirAnak}}</td>
                                    <td>{{$an->pendpekerja}}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                @endif
              </table>
              @if ($anak != null)
                  <a href="{{route('anakEdit', $item->id)}}" class="btn btn-warning btn-sm">
                    Edit Data
                  </a>
                  @if (Auth::user()->role === 'Admin')
                    <a href="{{route('anakExport', $anak->datadiri_id)}}" class="btn btn-success btn-sm">
                      Export Data
                    </a>
                  @endif
              @endif
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
              Data Kepemilikan
              @if ($dkep === null)
                  <a href="{{route('kepCreate', $item->id)}}" class="btn btn-primary btn-sm float-right">
                    Tambah Data
                  </a>
              @endif
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                @if ($dkep === null)
                    <div class="alert alert-danger" role="alert">
                        Data Kosong
                    </div>
                @else
                    <tr>
                        <th width="30%">Tempat Tinggal</th>
                        <td>{{$dkep->tptTinggal}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Keterangan</th>
                        <td>{{$dkep->ket}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Transportasi</th>
                        <td>{{$dkep->transport}}</td>
                    </tr>
                @endif
              </table>
              @if ($dkep != null)
                  <a href="{{route('kepEdit', $dkep->id)}}" class="btn btn-warning btn-sm">
                    Edit Data
                  </a>
                  @if (Auth::user()->role === 'Admin')
                    <a href="{{route('kepExport', $dkep->id)}}" class="btn btn-success btn-sm">
                      Export Data
                    </a>
                  @endif
              @endif
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
              Data Pekerjaan
              @if ($pek === null)
                  <a href="{{route('pekerjaCreate', $item->id)}}" class="btn btn-primary btn-sm float-right">
                    Tambah Data
                  </a>
              @endif
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                @if ($pek === null)
                    <div class="alert alert-danger" role="alert">
                        Data Kosong
                    </div>
                @else
                    <tr>
                        <th width="30%">Pengalaman Kerja</th>
                        <td>{{$pek->pengKerja}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Pekerjaan Sekarnag</th>
                        <td>{{$pek->pekSkrng}}</td>
                    </tr>
                @endif
              </table>
              @if ($pek != null)
                  <a href="{{route('pekerjaEdit', $pek->id)}}" class="btn btn-warning btn-sm">
                    Edit Data
                  </a>
                  @if (Auth::user()->role === 'Admin')
                    <a href="{{route('pekerjaExport', $pek->id)}}" class="btn btn-success btn-sm">
                      Export Data
                    </a>
                  @endif
              @endif
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
              Data Pelayanan
              @if ($pel === null)
                  <a href="{{route('pelayanCreate', $item->id)}}" class="btn btn-primary btn-sm float-right">
                    Tambah Data
                  </a>
              @endif
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                @if ($pel === null)
                    <div class="alert alert-danger" role="alert">
                        Data Kosong
                    </div>
                @else
                    <tr>
                        <th width="30%">Pengalaman Pelayanan</th>
                        <td>{{$pel->pelPernah}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Pelayanan Sekarnag</th>
                        <td>{{$pel->pelSkrng}}</td>
                    </tr>
                @endif
              </table>
              @if ($pel != null)
                  <a href="{{route('pelayanEdit', $pel->id)}}" class="btn btn-warning btn-sm">
                    Edit Data
                  </a>
                  @if (Auth::user()->role === 'Admin')
                    <a href="{{route('pelayanExport', $pek->id)}}" class="btn btn-success btn-sm">
                      Export Data
                    </a>
                  @endif
              @endif
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
              Data Pendidikan
              @if ($pend === null)
                  <a href="{{route('pendCreate', $item->id)}}" class="btn btn-primary btn-sm float-right">
                    Tambah Data
                  </a>
              @endif
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                @if ($pend === null)
                    <div class="alert alert-danger" role="alert">
                        Data Kosong
                    </div>
                @else
                    <tr>
                        <th width="30%">Sekolah Dasar</th>
                        <td>{{$pend->sd}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Sekolah Menengah Pertama</th>
                        <td>{{$pend->smp}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Sekolah Menengah Atas</th>
                        <td>{{$pend->sma}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Universitas</th>
                        <td>{{$pend->univ}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Kursus</th>
                        <td>{{$pend->kursus}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Sertifikat Kursus</th>
                        <td><img src="{{Storage::url($pend->kursusImg)}}" alt="" class="img-thumbnail" width="20%"></td>
                    </tr>
                    <tr>
                        <th width="30%">Seminar</th>
                        <td>{{$pend->seminar}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Sertifikat Seminar</th>
                        <td><img src="{{Storage::url($pend->semImg)}}" alt="" class="img-thumbnail" width="20%"></td>
                    </tr>
                    <tr>
                        <th width="30%">Pelatihan</th>
                        <td>{{$pend->pelatihan}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Sertifikat Pelatihan</th>
                        <td><img src="{{Storage::url($pend->pelatihanImg)}}" alt="" class="img-thumbnail" width="20%"></td>
                    </tr>
                @endif
              </table>
              @if ($pend != null)
                  <a href="{{route('pendEdit', $pend->id)}}" class="btn btn-warning btn-sm">
                    Edit Data
                  </a>
                  @if (Auth::user()->role === 'Admin')
                    <a href="{{route('pendExport', $pend->id)}}" class="btn btn-success btn-sm">
                      Export Data
                    </a>
                  @endif
              @endif
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
              Data Prestasi
              @if ($pres === null)
                  <a href="{{route('presCreate', $item->id)}}" class="btn btn-primary btn-sm float-right">
                    Tambah Data
                  </a>
              @endif
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                @if ($pres === null)
                    <div class="alert alert-danger" role="alert">
                        Data Kosong
                    </div>
                @else
                    <tr>
                        <th width="30%">Prestasi</th>
                        <td>{{$pres->pres}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Sertifikat Prestasi</th>
                        <td><img src="{{Storage::url($pres->presImg)}}" alt="" class="img-thumbnail" width="20%"></td>
                    </tr>
                @endif
              </table>
              @if ($pres != null)
                  <a href="{{route('presEdit', $pres->id)}}" class="btn btn-warning btn-sm">
                    Edit Data
                  </a>
                  @if (Auth::user()->role === 'Admin')
                    <a href="{{route('presExport', $pres->id)}}" class="btn btn-success btn-sm">
                      Export Data
                    </a>
                  @endif
              @endif
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
              Data Dokumen
              @if ($dok === null)
                  <a href="{{route('dokCreate', $item->id)}}" class="btn btn-primary btn-sm float-right">
                    Tambah Data
                  </a>
              @endif
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                @if ($dok === null)
                    <div class="alert alert-danger" role="alert">
                        Data Kosong
                    </div>
                @else
                    <tr>
                        <th width="30%">KTP</th>
                        <td><img src="{{Storage::url($dok->ktp)}}" alt="" class="img-thumbnail" width="20%"></td>
                    </tr>
                    <tr>
                        <th width="30%">KK</th>
                        <td><img src="{{Storage::url($dok->kk)}}" alt="" class="img-thumbnail" width="20%"></td>
                    </tr>
                    <tr>
                        <th width="30%">Surat Menikah</th>
                        <td><img src="{{Storage::url($dok->surat_nikah)}}" alt="" class="img-thumbnail" width="20%"></td>
                    </tr>
                    <tr>
                        <th width="30%">Surat Baptis</th>
                        <td><img src="{{Storage::url($dok->surat_baptis)}}" alt="" class="img-thumbnail" width="20%"></td>
                    </tr>
                @endif
              </table>
              @if ($dok != null)
                  <a href="{{route('dokEdit', $dok->id)}}" class="btn btn-warning btn-sm">
                    Edit Data
                  </a>
                  @if (Auth::user()->role === 'Admin')
                    <a href="{{route('dokExport', $dok->id)}}" class="btn btn-success btn-sm">
                      Export Data
                    </a>
                  @endif
              @endif
            </div>
        </div>

    </div>
    @include('sweetalert::alert')
    <!-- /.container-fluid -->
@endsection