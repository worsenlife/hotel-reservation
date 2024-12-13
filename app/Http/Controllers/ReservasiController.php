<?php

namespace App\Http\Controllers;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ReservasiController extends Controller
{
    
    public function index()
    {
        $data = Reservasi::all(); // Ambil semua data
        return view('pemesanan.index', compact('data'));
    }
    
    public function store(Request $request)
    {
        Reservasi::create($request->all());
        return redirect()->route('Reservasi.store');
    }
    
    public function edit($id)
    {
        $edit_data = Reservasi::findOrFail($id);
        $data = Reservasi::all();
        return view('pemesanan.index', compact('data', 'edit_data'));
    }

    public function update(Request $request, $id)
    {
        $pemesanan = Reservasi::findOrFail($id);
        $pemesanan->update($request->all());
        return redirect()->route('Reservasi.update');
    }
    
    public function destroy($id)
    {
        reservasi::destroy($id);
        return redirect()->route('Reservasi.destroy');
    }
    public function cetakPdf()
    {
        $data = Reservasi::all();
        $pdf = Pdf::loadView('pemesanan.pdf', compact('data'));
        return $pdf->download('data_pemesanan.pdf');
    }
}
