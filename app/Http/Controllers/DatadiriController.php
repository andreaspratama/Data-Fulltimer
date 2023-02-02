<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datadiri;
use App\Models\Prestasi;
use App\Models\Keluarga;
use App\Models\Kepemilikan;
use App\Models\Pekerjaan;
use App\Models\Pelayanan;
use App\Models\Pendidikan;
use App\Models\Dokumen;
use App\Models\Anak;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\DatadiriExport;
use App\Exports\KepemilikanExport;
use App\Exports\KeluargaExport;
use App\Exports\PekerjaanExport;
use App\Exports\PelayananExport;
use App\Exports\PendidikanExport;
use App\Exports\PrestasiExport;
use App\Exports\DokumenExport;
use App\Exports\AnakExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DatadiriImport;
use App\Imports\KeluargaImport;
use Illuminate\Support\Str;

class DatadiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Datadiri::all();
        // if(request()->ajax())
        // {
        //     $query = Datadiri::query();

        //     return Datatables::of($query)
        //         ->addColumn('aksi', function($item) {
        //             return '
        //                 <a href="' . route('datadiri.show', $item->id) . '" class="btn btn-info btn-sm">
        //                     Detail
        //                 </a>
        //             ';
        //         })
        //         ->rawColumns(['aksi'])
        //         ->make();
        // }

        return view('pages.admin.ft.datadiri.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.ft.datadiri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tgllahir = new Carbon($request->tgllahirDiri);
        $bekerja = new Carbon($request->mulai_bekerja);

        // Insert ke User
        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('user123**');
        $user->role = 'user';
        $user->save();        

        // Insert ke Datadiri
        $request->request->add(['user_id' => $user->id]);
        $data = $request->all();
        $data['tgllahirDiri'] = $tgllahir;
        $data['mulai_bekerja'] = $bekerja;
        Datadiri::create($data);

        return redirect()->route('datadiri.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Datadiri::findOrFail($id);
        $dk = Keluarga::where('datadiri_id', $item->id)->first();
        $dkep = Kepemilikan::where('datadiri_id', $item->id)->first();
        $pek = Pekerjaan::where('datadiri_id', $item->id)->first();
        $pel = Pelayanan::where('datadiri_id', $item->id)->first();
        $pend = Pendidikan::where('datadiri_id', $item->id)->first();
        $pres = Prestasi::where('datadiri_id', $item->id)->first();
        $dok = Dokumen::where('datadiri_id', $item->id)->first();
        $anak = Anak::where('datadiri_id', $item->id)->first();
        $anhasil = Anak::all();

        return view('pages.admin.ft.datadiri.show', compact('item', 'dk', 'dkep', 'pek', 'pel', 'pend', 'pres', 'dok', 'anak', 'anhasil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Datadiri::findOrFail($id);

        return view('pages.admin.ft.datadiri.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Datadiri::findOrFail($id);
        $item->update($data);

        return redirect('admin/datadiri/'.$id)->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Datadiri::findOrFail($id);
        $item->delete();

        $hapus_diri = $item->user_id;
        User::where('id', $hapus_diri)->delete();
        Keluarga::where('datadiri_id', $item->id)->delete();
        Anak::where('datadiri_id', $item->id)->delete();
        Kepemilikan::where('datadiri_id', $item->id)->delete();
        Pekerjaan::where('datadiri_id', $item->id)->delete();
        Pelayanan::where('datadiri_id', $item->id)->delete();
        Pendidikan::where('datadiri_id', $item->id)->delete();
        Prestasi::where('datadiri_id', $item->id)->delete();
        Dokumen::where('datadiri_id', $item->id)->delete();

        return redirect()->route('datadiri.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function importExcelDiri(Request $request)
    {
        // Excel::import(new SiswaImport, $request->file('DataSiswa'));
        $file = $request->file('file');
        // dd($file);
        $namaFile = $file->getClientOriginalName();
        $file->move('DataDiri', $namaFile);

        Excel::import(new DatadiriImport, public_path('/DataDiri/'.$namaFile));

        return redirect()->route('datadiri.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    // Data Keluarga
    public function kelCreate($id)
    {
        $item = Datadiri::findOrFail($id);

        return view('pages.admin.ft.keluarga.create', compact('item'));
    }

    public function kelStore(Request $request, $id)
    {
        $item = Datadiri::findOrFail($id);

        $kel = new Keluarga;
        $kel->datadiri_id = $item->id;
        $kel->status = $request->status;
        $kel->namaPasa = $request->namaPasa;
        $kel->tlahirPasa = $request->tlahirPasa;
        $kel->tgllahirPasa = $request->tgllahirPasa;
        $kel->pekerjaanPasa = $request->pekerjaanPasa;
        $kel->pend_akhir = $request->pend_akhir;
        $kel->save();

        return redirect('admin/datadiri/'.$id)->with('success', 'Data Berhasil Ditambah');
    }

    public function kelEdit($id)
    {
        $kel = Keluarga::findOrFail($id);

        return view('pages.admin.ft.keluarga.edit', compact('kel'));
    }

    public function kelUpdate(Request $request, $id)
    {
        $dd = $request->datadiri_id;
        $kel = Keluarga::find($id);
        $kel->datadiri_id = $dd;       
        $kel->status = $request->status;
        $kel->namaPasa = $request->namaPasa;
        $kel->tlahirPasa = $request->tlahirPasa;
        $kel->tgllahirPasa = $request->tgllahirPasa;
        $kel->pekerjaanPasa = $request->pekerjaanPasa;
        $kel->pend_akhir = $request->pend_akhir;
        $kel->save();

        return redirect('admin/datadiri/'.$dd)->with('success', 'Data Berhasil Diubah');
    }

    public function importExcelKel(Request $request)
    {
        // Excel::import(new SiswaImport, $request->file('DataSiswa'));
        $file = $request->file('file');
        // dd($file);
        $namaFile = $file->getClientOriginalName();
        $file->move('DataKel', $namaFile);

        Excel::import(new KeluargaImport, public_path('/DataKel/'.$namaFile));

        return redirect()->route('datadiri.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    // Data Kepemilikan
    public function kepCreate($id)
    {
        $item = Datadiri::findOrFail($id);

        return view('pages.admin.ft.kepemilikan.create', compact('item'));
    }

    public function kepStore(Request $request, $id)
    {
        $item = Datadiri::findOrFail($id);

        $kep = new Kepemilikan;
        $kep->datadiri_id = $item->id;
        $kep->tptTinggal = $request->tptTinggal;
        $kep->ket = $request->ket;
        $kep->transport = $request->transport;
        $kep->save();

        return redirect('admin/datadiri/'.$id)->with('success', 'Data Berhasil Ditambah');
    }

    public function kepEdit($id)
    {
        $kep = Kepemilikan::findOrFail($id);

        return view('pages.admin.ft.kepemilikan.edit', compact('kep'));
    }

    public function kepUpdate(Request $request, $id)
    {
        $dd = $request->datadiri_id;
        $kep = Kepemilikan::find($id);
        $kep->datadiri_id = $dd;       
        $kep->tptTinggal = $request->tptTinggal;
        $kep->ket = $request->ket;
        $kep->transport = $request->transport;
        $kep->save();

        return redirect('admin/datadiri/'.$dd)->with('success', 'Data Berhasil Diubah');
    }

    // Data Pekerjaan
    public function pekerjaCreate($id)
    {
        $item = Datadiri::findOrFail($id);

        return view('pages.admin.ft.pekerjaan.create', compact('item'));
    }

    public function pekerjaStore(Request $request)
    {
        $kem = $request->datadiri_id;

        $pekerja = new Pekerjaan;
        $pekerja->datadiri_id = $kem;
        $pekerja->pengKerja = $request->pengKerja;
        $pekerja->pekSkrng = $request->pekSkrng;
        $pekerja->save();

        return redirect('admin/datadiri/'.$kem)->with('success', 'Data Berhasil Ditambah');
    }

    public function pekerjaEdit($id)
    {
        $pekerja = Pekerjaan::findOrFail($id);

        return view('pages.admin.ft.pekerjaan.edit', compact('pekerja'));
    }

    public function pekerjaUpdate(Request $request, $id)
    {
        $dd = $request->datadiri_id;
        $pekerja = Pekerjaan::find($id);
        $pekerja->datadiri_id = $dd;
        $pekerja->pengKerja = $request->pengKerja;
        $pekerja->pekSkrng = $request->pekSkrng;
        $pekerja->save();

        return redirect('admin/datadiri/'.$dd)->with('success', 'Data Berhasil Diubah');
    }

    // Data Pelayanan
    public function pelayanCreate($id)
    {
        $item = Datadiri::findOrFail($id);

        return view('pages.admin.ft.pelayanan.create', compact('item'));
    }

    public function pelayanStore(Request $request, $id)
    {
        $item = Datadiri::findOrFail($id);

        $pelayan = new Pelayanan;
        $pelayan->datadiri_id = $item->id;
        $pelayan->pelPernah = $request->pelPernah;
        $pelayan->pelSkrng = $request->pelSkrng;
        $pelayan->save();

        return redirect('admin/datadiri/'.$id)->with('success', 'Data Berhasil Ditambah');
    }

    public function pelayanEdit($id)
    {
        $pelayan = Pelayanan::findOrFail($id);

        return view('pages.admin.ft.pelayanan.edit', compact('pelayan'));
    }

    public function pelayanUpdate(Request $request, $id)
    {
        $dd = $request->datadiri_id;
        $pelayan = Pelayanan::find($id);
        $pelayan->datadiri_id = $dd;
        $pelayan->pelPernah = $request->pelPernah;
        $pelayan->pelSkrng = $request->pelSkrng;
        $pelayan->save();

        return redirect('admin/datadiri/'.$dd)->with('success', 'Data Berhasil Diubah');
    }

    // Data Pendidikan
    public function pendCreate($id)
    {
        $item = Datadiri::findOrFail($id);

        return view('pages.admin.ft.pendidikan.create', compact('item'));
    }

    public function pendStore(Request $request, $id)
    {
        $item = Datadiri::findOrFail($id);

        $pend = new Pendidikan;
        $pend->datadiri_id = $item->id;
        $pend->sd = $request->sd;
        $pend->smp = $request->smp;
        $pend->sma = $request->sma;
        $pend->univ = $request->univ;
        $pend->kursus = $request->kursus;
        $pend->seminar = $request->seminar;
        $pend->pelatihan = $request->pelatihan;
        $pend->kursusImg = request()->file('kursusImg')->store('assets/ft', 'public');
        $pend->semImg = request()->file('semImg')->store('assets/ft', 'public');
        $pend->pelatihanImg = request()->file('pelatihanImg')->store('assets/ft', 'public');
        $pend->save();

        return redirect('admin/datadiri/'.$id)->with('success', 'Data Berhasil Ditambah');
    }

    public function pendEdit($id)
    {
        $pend = Pendidikan::findOrFail($id);

        return view('pages.admin.ft.pendidikan.edit', compact('pend'));
    }

    public function pendUpdate(Request $request, $id)
    {
        $dd = $request->datadiri_id;
        $pend = Pendidikan::find($id);
        $kImg = ('public/'.$pend->kursusImg);
        $sImg = ('public/'.$pend->semImg);
        $pImg = ('public/'.$pend->pelatihanImg);

        // Kursus Img
        if(request('kursusImg')) {
            Storage::disk('local')->delete($kImg);
            $ki = request()->file('kursusImg')->store('assets/ft', 'public');
        } elseif($pend->kursusImg) {
            $ki = $pend->kursusImg;
        } else {
            $ki = null;
        }

        // Seminar Img
        if(request('semImg')) {
            Storage::disk('local')->delete($sImg);
            $si = request()->file('semImg')->store('assets/ft', 'public');
        } elseif($pend->semImg) {
            $si = $pend->semImg;
        } else {
            $si = null;
        }

        // Pelatihan Img
        if(request('pelatihanImg')) {
            Storage::disk('local')->delete($pImg);
            $pi = request()->file('pelatihanImg')->store('assets/ft', 'public');
        } elseif($pend->pelatihanImg) {
            $pi = $pend->pelatihanImg;
        } else {
            $pi = null;
        }

        $pend->datadiri_id = $dd;
        $pend->sd = $request->sd;
        $pend->smp = $request->smp;
        $pend->sma = $request->sma;
        $pend->univ = $request->univ;
        $pend->kursus = $request->kursus;
        $pend->seminar = $request->seminar;
        $pend->pelatihan = $request->pelatihan;
        $pend->kursusImg = $ki;
        $pend->semImg = $si;
        $pend->pelatihanImg = $pi;
        $pend->save();

        return redirect('admin/datadiri/'.$dd)->with('success', 'Data Berhasil Diubah');
    }

    // Data Prestasi
    public function presCreate($id)
    {
        $item = Datadiri::findOrFail($id);

        return view('pages.admin.ft.prestasi.create', compact('item'));
    }

    public function presStore(Request $request, $id)
    {
        $item = Datadiri::findOrFail($id);

        $pres = new Prestasi;
        $pres->datadiri_id = $item->id;
        $pres->pres = $request->pres;
        $pres->presImg = request()->file('presImg')->store('assets/ft', 'public');
        $pres->save();

        return redirect('admin/datadiri/'.$id)->with('success', 'Data Berhasil Ditambah');
    }

    public function presEdit($id)
    {
        $pres = Prestasi::findOrFail($id);

        return view('pages.admin.ft.prestasi.edit', compact('pres'));
    }

    public function presUpdate(Request $request, $id)
    {
        $dd = $request->datadiri_id;
        $pres = Prestasi::find($id);
        $pImg = ('public/'.$pres->presImg);

        // Prestasi Img
        if(request('presImg')) {
            Storage::disk('local')->delete($pImg);
            $pi = request()->file('presImg')->store('assets/ft', 'public');
        } elseif($pres->presImg) {
            $pi = $pres->presImg;
        } else {
            $pi = null;
        }

        $pres->datadiri_id = $dd;
        $pres->pres = $request->pres;
        $pres->presImg = $pi;
        $pres->save();

        return redirect('admin/datadiri/'.$dd)->with('success', 'Data Berhasil Diubah');
    }

    // Data Dokumen
    public function dokCreate($id)
    {
        $item = Datadiri::findOrFail($id);

        return view('pages.admin.ft.dokumen.create', compact('item'));
    }

    public function dokStore(Request $request, $id)
    {
        $item = Datadiri::findOrFail($id);

        $dok = new Dokumen;
        $dok->datadiri_id = $item->id;
        $dok->ktp = request()->file('ktp')->store('assets/ft', 'public');
        $dok->kk = request()->file('kk')->store('assets/ft', 'public');
        $dok->surat_nikah = request()->file('surat_nikah')->store('assets/ft', 'public');
        $dok->surat_baptis = request()->file('surat_baptis')->store('assets/ft', 'public');
        $dok->save();

        return redirect('admin/datadiri/'.$id)->with('success', 'Data Berhasil Ditambah');
    }

    public function dokEdit($id)
    {
        $dok = Dokumen::findOrFail($id);

        return view('pages.admin.ft.dokumen.edit', compact('dok'));
    }

    public function dokUpdate(Request $request, $id)
    {
        $dd = $request->datadiri_id;
        $dok = Dokumen::find($id);
        $ktpImg = ('public/'.$dok->ktp);
        $kkImg = ('public/'.$dok->kk);
        $snImg = ('public/'.$dok->surat_nikah);
        $sbImg = ('public/'.$dok->surat_baptis);

        // ktp Img
        if(request('ktp')) {
            Storage::disk('local')->delete($ktpImg);
            $ktp = request()->file('ktp')->store('assets/ft', 'public');
        } elseif($dok->ktp) {
            $ktp = $dok->ktp;
        } else {
            $ktp = null;
        }

        // kk Img
        if(request('kk')) {
            Storage::disk('local')->delete($kkImg);
            $kk = request()->file('kk')->store('assets/ft', 'public');
        } elseif($dok->kk) {
            $kk = $dok->kk;
        } else {
            $kk = null;
        }

        // Surat Nikah Img
        if(request('surat_nikah')) {
            Storage::disk('local')->delete($snImg);
            $sn = request()->file('surat_nikah')->store('assets/ft', 'public');
        } elseif($dok->surat_nikah) {
            $sn = $dok->surat_nikah;
        } else {
            $sn = null;
        }

        // Surat Baptis Img
        if(request('surat_baptis')) {
            Storage::disk('local')->delete($sbImg);
            $sb = request()->file('surat_baptis')->store('assets/ft', 'public');
        } elseif($dok->surat_baptis) {
            $sb = $dok->surat_baptis;
        } else {
            $sb = null;
        }

        $dok->datadiri_id = $dd;
        $dok->ktp = $ktp;
        $dok->kk = $kk;
        $dok->surat_nikah = $sn;
        $dok->surat_baptis = $sb;
        $dok->save();

        return redirect('admin/datadiri/'.$dd)->with('success', 'Data Berhasil Diubah');
    }

    // Data Anak
    public function anakCreate($id)
    {
        $item = Datadiri::findOrFail($id);

        return view('pages.admin.ft.anak.create', compact('item'));
    }

    public function anakStore(Request $request, $id)
    {
        $item = Datadiri::findOrFail($id);
        $data = $request->all();
        // dd($data);
        
        if(count(array($data['namaAnak'] > 0))) {
            foreach ($data['namaAnak'] as $item => $value) {
                $data2 = array(
                    'datadiri_id' => $data['datadiri_id'][$item],
                    'namaAnak' => $data['namaAnak'][$item],
                    'jk' => $data['jk'][$item],
                    'tlahirAnak' => $data['tlahirAnak'][$item],
                    'tgllahirAnak' => $data['tgllahirAnak'][$item],
                    'pendpekerja' => $data['pendpekerja'][$item],
                );
                // dd($data2);
                Anak::create($data2);
            }
        }

        return redirect('admin/datadiri/'.$id)->with('success', 'Data Berhasil Ditambah');
    }

    public function anakEdit($id)
    {
        $dt = Datadiri::findOrFail($id);
        $anak = Anak::where('datadiri_id', $dt->id)->get();
        $kbl = Anak::where('datadiri_id', $dt->id)->first();

        return view('pages.admin.ft.anak.edit', compact('anak', 'dt', 'kbl'));
    }

    public function anakUpdate(Request $request, $id)
    {
        $data = $request->all();
        $diri = $request->datadiri_id;
        $cek = Datadiri::with('anak')->find($diri);
        Anak::where('datadiri_id', $diri)->delete();
        // dd($cek);

        if(count(array($data['namaAnak'] > 0))) {
            foreach($data["namaAnak"] as $item => $value) {
                $data2 = array(
                    'datadiri_id' => $data['datadiri_id'][$item],
                    'namaAnak' => $data['namaAnak'][$item],
                    'jk' => $data['jk'][$item],
                    'tlahirAnak' => $data['tlahirAnak'][$item],
                    'tgllahirAnak' => $data['tgllahirAnak'][$item],
                    'pendpekerja' => $data['pendpekerja'][$item],
                );
                Anak::create($data2);
            }
        }

        return redirect('admin/datadiri/'.$id)->with('success', 'Data Berhasil Diubah');
    }

    public function ddexportExcel()
    {
        return Excel::download(new DatadiriExport, 'datadiri.xlsx');
    }

    public function kepExport($id)
    {
        return Excel::download(new KepemilikanExport, 'kepemilikan.xlsx');
    }

    public function kelExport($id)
    {
        return Excel::download(new KeluargaExport, 'keluarga.xlsx');
    }

    public function pekerjaExport($id)
    {
        return Excel::download(new PekerjaanExport, 'pekerjaan.xlsx');
    }

    public function pelayanExport($id)
    {
        return Excel::download(new PelayananExport, 'pelayanan.xlsx');
    }

    public function pendExport($id)
    {
        return Excel::download(new PendidikanExport, 'pendidikan.xlsx');
    }

    public function presExport($id)
    {
        return Excel::download(new PrestasiExport, 'prestasi.xlsx');
    }

    public function dokExport($id)
    {
        return Excel::download(new DokumenExport, 'dokumen.xlsx');
    }

    public function anakExport($id)
    {
        return Excel::download(new AnakExport('id'), 'anak.xlsx');
    }
}
