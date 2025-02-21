<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;

class PenilaianController extends Controller
{
    /**
     * Menampilkan halaman utama dengan tabel data penilaian dan ranking.
     */
    public function index()
    {
        // Ambil semua data dari tabel penilaian
        $data = Penilaian::all();

        // Langkah 1: Matriks Keputusan
        $matrix = $data->map(function ($item) {
            return [
                'id' => $item->id,
                'nama_pendaftar' => $item->nama_pendaftar,
                'tes_pemrograman_web' => $item->tes_pemrograman_web,
                'tes_pemrograman_mobil' => $item->tes_pemrograman_mobil,
                'tes_photoshop' => $item->tes_photoshop,
                'tes_microsoft_office' => $item->tes_microsoft_office,
            ];
        });

        // Langkah 2: Normalisasi Matriks
        $columns = ['tes_pemrograman_web', 'tes_pemrograman_mobil', 'tes_photoshop', 'tes_microsoft_office'];
        $normalizedMatrix = $matrix->map(function ($item) use ($columns, $matrix) {
            foreach ($columns as $column) {
                $max = sqrt($matrix->sum(fn($row) => $row[$column] ** 2));
                $item[$column] /= $max ?: 1; // Hindari pembagian oleh nol
            }
            return $item;
        });

        // Langkah 3: Menghitung Nilai MOORA
        $weights = [
            'tes_pemrograman_web' => 0.3,
            'tes_pemrograman_mobil' => 0.3,
            'tes_photoshop' => 0.2,
            'tes_microsoft_office' => 0.2,
        ];

        $ranking = $normalizedMatrix->map(function ($item) use ($weights) {
            $benefit = $weights['tes_pemrograman_web'] * $item['tes_pemrograman_web']
                     + $weights['tes_pemrograman_mobil'] * $item['tes_pemrograman_mobil'];
            $cost = $weights['tes_photoshop'] * $item['tes_photoshop']
                  + $weights['tes_microsoft_office'] * $item['tes_microsoft_office'];
            $item['score'] = $benefit - $cost;
            return $item;
        })->sortByDesc('score');

        // Kirim data ranking ke view
        return view('penilaian.index', ['ranking' => $ranking]);
    }

    /**
     * Menyimpan data penilaian yang diinput melalui form.
     */
    public function simpan(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'nama_pendaftar' => 'required|string|max:255',
            'tes_pemrograman_web' => 'required|numeric|min:0',
            'tes_pemrograman_mobil' => 'required|numeric|min:0',
            'tes_photoshop' => 'required|numeric|min:0',
            'tes_microsoft_office' => 'required|numeric|min:0',
        ]);

        // Simpan data ke database
        Penilaian::create($validatedData);

        // Redirect ke halaman utama
        return redirect('/penilaian')->with('success', 'Data penilaian berhasil disimpan!');
    }

    /**
     * Menampilkan halaman tambah data.
     */
    public function tambah()
    {
        $penilaian = Penilaian::all();
        return view('penilaian.tambah', compact('penilaian'));
    }

    /**
     * Menampilkan halaman edit data.
     */
    public function edit($id)
    {
        $penilaian = Penilaian::findOrFail($id);
        return view('penilaian.edit', compact('penilaian'));
    }

    /**
     * Memperbarui data penilaian yang diubah melalui form.
     */
    public function update(Request $request, $id)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama_pendaftar' => 'required|string|max:255',
            'tes_pemrograman_web' => 'required|numeric|min:0',
            'tes_pemrograman_mobil' => 'required|numeric|min:0',
            'tes_photoshop' => 'required|numeric|min:0',
            'tes_microsoft_office' => 'required|numeric|min:0',
        ]);

        // Perbarui data di database
        $penilaian = Penilaian::findOrFail($id);
        $penilaian->update($validatedData);

        // Redirect ke halaman utama
        return redirect('/penilaian')->with('success', 'Data penilaian berhasil diperbarui!');
    }

    /**
     * Menghapus data penilaian berdasarkan ID.
     */
    public function destroy($id)
    {
        $penilaian = Penilaian::findOrFail($id);
        $penilaian->delete();

        return redirect('/penilaian')->with('success', 'Data penilaian berhasil dihapus!');
    }
}
