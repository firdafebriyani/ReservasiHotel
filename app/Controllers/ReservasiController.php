<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Reservasi;

class ReservasiController extends BaseController
{
    public function tampilReservasi()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'resepsionis') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }

        $data['ListReservasi'] = $this->reservasi
            ->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar = reservasi.id_tipe_kamar')
            ->findAll();
        return view('reservasi/tampil-Reservasi', $data);
    }
    public function tambahReservasi()
    {
        return view('reservasi/tambah-Reservasi');
    }
    public function simpanReservasi()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        helper(['form']);
        $datanya = [
            'id_reservasi' => $this->request->getPost('txtTipeReservasi'),
            'id_tamu' => $this->request->getPost('txtTipeIdTamu'),
            'cek_in' => $this->request->getPost('txtInputCekIn'),
            'cek_out' => $this->request->getPost('txtInputCekOut'),
            'tipe_kamar' => $this->request->getPost('txtTipeKamar'),
            'jumlah_kamar' => $this->request->getPost('txtTipeKamar'),
            'harga' => $this->request->getPost('txtTipeHarga'),
        ];
        $this->reservasi->insert($datanya);
        return redirect()->to('/reservasi/tampil')->with('berhasil', 'Data Berhasil di Simpan');
    }
}
