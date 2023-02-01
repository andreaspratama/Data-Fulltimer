<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keluarga;

class KeluargaController extends Controller
{
    public function detail($id)
    {
        $dk = Keluarga::findOrFail($id);
        
        return view('pages.admin.ft.datadiri.show', compact('dk'));
    }
}
