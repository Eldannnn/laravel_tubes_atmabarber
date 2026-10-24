<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayananController extends Controller
{
    /**
     * Mengambil daftar layanan per barber (Many-to-Many).
     * Output disesuaikan dengan kontrak entity Flutter (id, id_barber, jenis_layanan, tarif, deskripsi_layanan).
     */
    public function index()
    {
        $layanan = DB::table('barber_layanan')
            ->join('layanan', 'barber_layanan.id_layanan', '=', 'layanan.id')
            ->select(
                'barber_layanan.id as id',
                'barber_layanan.id_barber',
                'layanan.id as id_master_layanan',
                'layanan.jenis_layanan',
                DB::raw('COALESCE(barber_layanan.tarif_khusus, layanan.tarif) as tarif'),
                'layanan.deskripsi_layanan'
            )
            ->orderBy('barber_layanan.id_barber')
            ->orderBy('layanan.id')
            ->get();

        return response()->json($layanan, 200);
    }

    /**
     * Mengambil katalog master layanan unik (6 layanan utama).
     */
    public function master()
    {
        $master = Layanan::all();
        return response()->json($master, 200);
    }

    public function show($id)
    {
        $layanan = Layanan::find($id);

        if (!$layanan) {
            return response()->json(['message' => 'Layanan not found'], 404);
        }

        return response()->json($layanan);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_layanan' => 'required|string|max:255',
            'tarif' => 'required|numeric',
            'deskripsi_layanan' => 'required|string|max:500',
            'id_barber' => 'required|exists:barbers,id',
        ]);

        $layanan = Layanan::create([
            'jenis_layanan' => $request->jenis_layanan,
            'tarif' => $request->tarif,
            'deskripsi_layanan' => $request->deskripsi_layanan,
            'id_barber' => $request->id_barber,
        ]);

        return response()->json($layanan, 201);
    }

    public function update(Request $request, $id)
    {
        $layanan = Layanan::find($id);

        if (!$layanan) {
            return response()->json(['message' => 'Layanan not found'], 404);
        }

        $request->validate([
            'jenis_layanan' => 'required|string|max:255',
            'tarif' => 'required|numeric',
            'deskripsi_layanan' => 'required|string|max:500',
            'id_barber' => 'required',
        ]);

        $layanan->update($request->all());

        return response()->json($layanan);
    }

    public function destroy($id)
    {
        $layanan = Layanan::find($id);

        if (!$layanan) {
            return response()->json(['message' => 'Layanan not found'], 404);
        }

        $layanan->delete();

        return response()->json(['message' => 'Layanan deleted successfully']);
    }
}
