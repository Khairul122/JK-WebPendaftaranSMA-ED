<?php

include('../config/koneksi.php');

require '../vendor/autoload.php';

// // reference the Dompdf namespace
use Dompdf\Dompdf;

// // instantiate and use the dompdf class
$dompdf = new Dompdf();

$html = '<style>
    table, th, td {
        font-size: 12px;
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
    }

</style>

<img src="../assets/img/logo-tutwuri.jpg" style="float: left; height: 60px;">

<div style="margin-left: 20px">
    <div style="font-size: 18px">Data Pendaftaran Siswa Baru Tahun Pelajaran 2022/2023</div>
    <div style="font-size: 20px"><b>SMAN 1 PARIANGAN</b></div>
    <div style="font-size: 12px">JL. Ujung Ganting, Jorong, Simabur, Kec. Pariangan, Kabupaten Tanah Datar</div>
</div>

<hr style="border-0,5px solid-black; margin:10px 5px 10px 5px">

<div stlye="font-size: 12px; margin-left: 10px;">&nbsp;
    Tanggal Cetak: ' . date("d-m-Y") . '
</div>

<table width="100%">
    <tr>
        <th width="5%">No</th>
        <th width="10%">Nama</th>
        <th width="20%">TTL</th>
        <th width="5%">JK</th>
        <th width="5%">Alamat</th>
        <th width="7%">Telepon</th>
        <th width="5%">Nilai Bahasa Indonesia</th>
        <th width="5%">Nilai Bahasa Inggris</th>
        <th width="5%">Nilai MTK</th>
        <th width="5%">Nilai IPA</th>
        <th width="10%">Status</th>
    </tr>';



$all_pendaftar = mysqli_query($koneksi, "SELECT pendaftar.*, nilai.nilai_indo, nilai.nilai_inggris, nilai.nilai_mtk, nilai.nilai_ipa, nilai.status FROM pendaftar, nilai WHERE pendaftar.id = nilai.pendaftar_id order by nama");
// $all_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar");

$no = 1;
while ($p = mysqli_fetch_array($all_pendaftar)) {
    if ($p['status'] == 0) {
        $status = "BARU";
    } else if ($p['status'] == 1) {
        $status = "DITERIMA";
    } else {
        $status = "DITOLAK";
    }


    $html .= '
    <tr>
        <td align="center">' . $no++ . '</td>
        <td>' . $p['nama'] . '</td>
        <td  align="center">' . $p['tmpt_lahir'] . ', ' . $p['tgl_lahir'] . '</td>
        <td align="center">' . $p['jenis_kelamin'] . '</td>
        <td>' . $p['alamat'] . '</td>
        <td align="center">' . $p['telepon'] . '</td>
        <td align="center">' . $p['nilai_indo'] . '</td>
        <td align="center">' . $p['nilai_inggris'] . '</td>
        <td align="center">' . $p['nilai_mtk'] . '</td>
        <td align="center">' . $p['nilai_ipa'] . '</td>
        <td align="center">' . $status . '</td>
    </tr>';
}

$html .= '
</table>';






$dompdf->loadHtml($html);

// // (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// // Render the HTML as PDF
$dompdf->render();

// // Output the generated PDF to Browser
// // $dompdf->stream();
$dompdf->stream("data_pendaftar.pdf", array("Attachment" => 0));
