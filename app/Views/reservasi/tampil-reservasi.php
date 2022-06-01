<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Reservasi</h2>
<p>Berikut ini daftar Reservasihotel.</p>
<p>
    <a href="/reservasi/tambah" class="btn btn-primary btn-sm">Tambah Reservasi</a>
</p>
<?php if (!empty(session()->getFlashdata('berhasil'))) { ?>
    <div class="alert alert-success">
        <?php echo session()->getFlashdata('berhasil'); ?>
    </div>
<?php } ?>
<table class="table table-sm table-hovered">
    <thead class="bg-light text-center">
        <tr>
            <th>No</th>
            <th>Nama Tamu</th>
            <th>Cek In</th>
            <th>Cek Out</th>
            <th>Tipe Kamar</th>
            <th>Jumlah Kamar</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $htmlData = null;
        $nomor = null;
        foreach ($ListReservasi as $row) {
            $nomor++;
            $htmlData = '<tr>';
            $htmlData .= '<td class="text-center">' . $nomor . '</td>';
            $htmlData .= '<td class="text-center">' . $row['nama'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['cek-in'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['cek-out'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['nama_tipe_kamar'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['jumlah_kamar'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['harga'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['total'] . '</td>';
            $htmlData .= '<td class="text-center">';
            $htmlData .= '<a href="/reservasi/checkin/' . $row['id_reservasi'] . '" class="btn btn-info btn-sm mr-1">Check-In</a>';
            $htmlData .= '<a href="/reservasi/checkout/' . $row['id_reservasi'] . '" class="btn btn-danger btn-sm">Check-Out</a>';
            $htmlData .= '</td>';
            $htmlData .= '</tr>';
            echo $htmlData;
        }
        ?>
    </tbody>
</table>
<?= $this->endSection() ?>