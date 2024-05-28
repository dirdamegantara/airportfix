<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keberangkatan;
use App\Models\kedatangan;
use App\Models\pegawai;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AirportController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    
     // Kedatangan dan Keberangkatan
    public function index() : View 
    {
        $kedatangan = kedatangan::orderBy('waktu_kedatangan', 'asc')->paginate(10);
        $keberangkatan = keberangkatan::orderBy('waktu_keberangkatan', 'asc')->paginate(10);

        return view('airport.index', compact('kedatangan', 'keberangkatan'));
    }
    
    /**
     * show
     * 
     * @param mixed $id
     * @return View
     */
    public function tampildata_kedatangan(string $id) : View
    {
        $kedatangan = kedatangan::findOrFail($id);
        return view('airport.tampildata_kedatangan', compact('kedatangan'));
    }

    public function tampildata_keberangkatan(string $id) : View
    {
        $keberangkatan = keberangkatan::findOrFail($id);
        return view('airport.tampildata_keberangkatan', compact('keberangkatan'));
    }

    /**
     * 
     * tambahdata
     * 
     * @return View
     */
    public function tambahdata_kedatangan() : View
    {
        return view('airport.tambahdata_kedatangan');
    }

    /**
     * 
     * storedata
     * 
     * @param mixed $request
     * @return RedirectResponse
     */
    public function storedata_kedatangan(Request $request) : RedirectResponse
    {
        $request->validate([
            'nama_maskapai'     => 'required',
            'kode_penerbangan'  => 'required',
            'asal'              => 'required',
            'waktu_kedatangan'  => 'required',
            'keterangan'        => 'required',
            'jumlah_penumpang'  => 'required',
            'jenis_pesawat'     => 'required',
            'model_pesawat'     => 'required',
            'kode_registrasi'   => 'required',
            'origin'            => 'required',
        ]);

        kedatangan::create([
            'nama_maskapai'     => $request->nama_maskapai,
            'kode_penerbangan'  => $request->kode_penerbangan,
            'asal'              => $request->asal,
            'waktu_kedatangan'  => $request->waktu_kedatangan,
            'keterangan'        => $request->keterangan,
            'jumlah_penumpang'  => $request->jumlah_penumpang,
            'jenis_pesawat'     => $request->jenis_pesawat,
            'model_pesawat'     => $request->model_pesawat,
            'kode_registrasi'   => $request->kode_registrasi,
            'origin'            => $request->origin,
        ]);
        return redirect()->route('airport.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function tambahdata_keberangkatan() : View
    {
        return view('airport.tambahdata_keberangkatan');
    }

    public function storedata_keberangkatan(Request $request) : RedirectResponse
    {
        $request->validate([
            'nama_maskapai'     => 'required',
            'kode_penerbangan'  => 'required',
            'tujuan'              => 'required',
            'waktu_keberangkatan'  => 'required',
            'keterangan'        => 'required',
            'jumlah_penumpang'  => 'required',
            'jenis_pesawat'     => 'required',
            'model_pesawat'     => 'required',
            'kode_registrasi'   => 'required',
            'origin'            => 'required',
        ]);

        keberangkatan::create([
            'nama_maskapai'     => $request->nama_maskapai,
            'kode_penerbangan'  => $request->kode_penerbangan,
            'tujuan'              => $request->tujuan,
            'waktu_keberangkatan'  => $request->waktu_keberangkatan,
            'keterangan'        => $request->keterangan,
            'jumlah_penumpang'  => $request->jumlah_penumpang,
            'jenis_pesawat'     => $request->jenis_pesawat,
            'model_pesawat'     => $request->model_pesawat,
            'kode_registrasi'   => $request->kode_registrasi,
            'origin'            => $request->origin,
        ]);
        return redirect()->route('airport.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    /**
     * editdata
     * 
     * @param mixed $id
     * @return View
     */
    public function editdata_kedatangan(string $id) : View
    {
        $kedatangan = kedatangan::findOrFail($id);
        return view('airport.editdata_kedatangan', compact('kedatangan'));
    }
    
    public function editdata_keberangkatan(string $id) : View
    {
        $keberangkatan = keberangkatan::findOrFail($id);
        return view('airport.editdata_keberangkatan', compact('keberangkatan'));
    }

    /**
     * updatedata
     * 
     * @param mixed $request
     * @param mixed $id
     * @return RedirectResponse
     */
    public function updatedata_kedatangan(Request $request, $id) : RedirectResponse 
    {
        // Validate form
        $request->validate([
            'nama_maskapai'     => 'required',
            'kode_penerbangan'  => 'required',
            'asal'              => 'required',
            'waktu_kedatangan'  => 'required',
            'keterangan'        => 'required',
            'jumlah_penumpang'  => 'required',
            'jenis_pesawat'     => 'required',
            'model_pesawat'     => 'required',
            'kode_registrasi'   => 'required',
            'origin'            => 'required',
        ]);

        $kedatangan = kedatangan::findOrFail($id);

        $kedatangan->update([
            'nama_maskapai'     => $request->nama_maskapai,
            'kode_penerbangan'  => $request->kode_penerbangan,
            'asal'              => $request->asal,
            'waktu_kedatangan'  => $request->waktu_kedatangan,
            'keterangan'        => $request->keterangan,
            'jumlah_penumpang'  => $request->jumlah_penumpang,
            'jenis_pesawat'     => $request->jenis_pesawat,
            'model_pesawat'     => $request->model_pesawat,
            'kode_registrasi'   => $request->kode_registrasi,
            'origin'            => $request->origin,
        ]);

        return redirect()-> route('airport.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function updatedata_keberangkatan(Request $request, $id) : RedirectResponse 
    {
        // Validate form
        $request->validate([
            'nama_maskapai'     => 'required',
            'kode_penerbangan'  => 'required',
            'tujuan'            => 'required',
            'waktu_keberangkatan'  => 'required',
            'keterangan'        => 'required',
            'jumlah_penumpang'  => 'required',
            'jenis_pesawat'     => 'required',
            'model_pesawat'     => 'required',
            'kode_registrasi'   => 'required',
            'origin'            => 'required',
        ]);

        $keberangkatan = keberangkatan::findOrFail($id);

        $keberangkatan->update([
            'nama_maskapai'         => $request->nama_maskapai,
            'kode_penerbangan'      => $request->kode_penerbangan,
            'tujuan'                => $request->tujuan,
            'waktu_keberangkatan'   => $request->waktu_keberangkatan,
            'keterangan'            => $request->keterangan,
            'jumlah_penumpang'      => $request->jumlah_penumpang,
            'jenis_pesawat'         => $request->jenis_pesawat,
            'model_pesawat'         => $request->model_pesawat,
            'kode_registrasi'       => $request->kode_registrasi,
            'origin'                => $request->origin,
        ]);

        return redirect()-> route('airport.index')->with(['success' => 'Data berhasil diubah']);
    }

    /**
     * hapusdata
     * 
     * @param mixed $id
     * @return RedirectResponse
     */
    public function hapusdata_kedatangan($id) : RedirectResponse
    {
        $kedatangan = kedatangan::findOrFail($id);
        $kedatangan->delete();

        return redirect()-> route('airport.index')->with(['success' => 'Data berhasil dihapus']);
    }

    public function hapusdata_keberangkatan($id) : RedirectResponse
    {
        $keberangkatan = keberangkatan::findOrFail($id);
        $keberangkatan->delete();

        return redirect()-> route('airport.index')->with(['success' => 'Data berhasil dihapus']);
    }

    // Pegawai
    public function pegawai() : view
    {
        $pegawai = pegawai::orderBy('id_pegawai', 'asc')->paginate(100);

        return view('airport.pegawai', compact('pegawai'));
    }

    /**
     * show
     * 
     * @param mixed $id
     * @return View
     */
    public function tampildata_pegawai(string $id) : View
    {
        $pegawai = pegawai::findOrFail($id);
        return view('airport.tampildata_pegawai', compact('pegawai'));
    }

    /**
     * 
     * tambahdata
     * 
     * @return View
     */
    public function tambahdata_pegawai() : View
    {
        return view('airport.tambahdata_pegawai');
    }

    /**
     * 
     * storedata
     * 
     * @param mixed $request
     * @return RedirectResponse
     */
    public function storedata_pegawai(Request $request) : RedirectResponse
    {
        $request->validate([
            'id_pegawai'     => 'required',
            'nama_lengkap'   => 'required',
            'alamat'         => 'required',
            'jenis_kelamin'  => 'required',
            'tanggal_lahir'  => 'required',
            'no_telp'        => 'required',
            'divisi'         => 'required',
            'jabatan'        => 'required',
            'gaji'           => 'required',
            'diterima_sejak' => 'required',
            'lama_bekerja'   => 'required',
        ]);

        pegawai::create([
            'id_pegawai'     => $request->id_pegawai,
            'nama_lengkap'   => $request->nama_lengkap,
            'alamat'         => $request->alamat,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'no_telp'        => $request->no_telp,
            'divisi'         => $request->divisi,
            'jabatan'        => $request->jabatan,
            'gaji'           => $request->gaji,
            'diterima_sejak' => $request->diterima_sejak,
            'lama_bekerja'   => $request->lama_bekerja,
        ]);
        return redirect()->route('pegawai')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    /**
     * editdata
     * 
     * @param mixed $id
     * @return View
     */
    public function editdata_pegawai(string $id) : View
    {
        $pegawai = pegawai::findOrFail($id);
        return view('airport.editdata_pegawai', compact('pegawai'));
    }

    /**
     * updatedata
     * 
     * @param mixed $request
     * @param mixed $id
     * @return RedirectResponse
     */
    public function updatedata_pegawai(Request $request, $id) : RedirectResponse 
    {
        // Validate form
        $request->validate([
            'id_pegawai'     => 'required',
            'nama_lengkap'   => 'required',
            'alamat'         => 'required',
            'jenis_kelamin'  => 'required',
            'tanggal_lahir'  => 'required',
            'no_telp'        => 'required',
            'divisi'         => 'required',
            'jabatan'        => 'required',
            'gaji'           => 'required',
            'diterima_sejak' => 'required',
            'lama_bekerja'   => 'required',
        ]);

        $pegawai = pegawai::findOrFail($id);

        $pegawai->update([
            'id_pegawai'     => $request->id_pegawai,
            'nama_lengkap'   => $request->nama_lengkap,
            'alamat'         => $request->alamat,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'no_telp'        => $request->no_telp,
            'divisi'         => $request->divisi,
            'jabatan'        => $request->jabatan,
            'gaji'           => $request->gaji,
            'diterima_sejak' => $request->diterima_sejak,
            'lama_bekerja'   => $request->lama_bekerja,
        ]);

        return redirect()-> route('pegawai')->with(['success' => 'Data berhasil diubah']);
    }

    /**
     * hapusdata
     * 
     * @param mixed $id
     * @return RedirectResponse
     */
    public function hapusdata_pegawai($id) : RedirectResponse
    {
        $pegawai = pegawai::findOrFail($id);
        $pegawai->delete();

        return redirect()-> route('pegawai')->with(['success' => 'Data berhasil dihapus']);
    }

    // Userlist
    public function userlist() : view
    {
        $User = User::orderBy('name', 'asc')->paginate(100);

        return view('airport.userlist', compact('User'));
    }
    
}
