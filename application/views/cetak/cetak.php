<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
</head>

<body>
    <table style="text-align: center;" width="100%">
        <tr>
            <td rowspan="5"><img src="<?= base_url('assets/images/logo.jpg') ?>" width="70" alt=""></td>
        </tr>
        <tr>
            <td style="font-size: 15px; font-weight: bold;">PEMERINTAH KOTA SERANG</td>
        </tr>
        <tr>
            <td style="font-size: 15px; font-weight: bold;">KECAMATAN SERANG</td>
        </tr>
        <tr>
            <td style="font-size: 25px; font-weight: bold;">KELURAHAN KALIGANDU</td>
        </tr>
        <tr>
            <td style="font-size: 10px;">JL. WARUNG JAUD No.85 SERANG TELP. (0254) 200944</td>
        </tr>
    </table>
    <hr>


    <table style="text-align: center; margin-top: 10px; font-size: 11px; font-weight: bold; margin-left: 30%; margin-right: 30%;" width="100%">
        <tr>
            <td colspan="5"><?= $judul ?></td>
        </tr>
        <tr>
            <td>NOMOR </td>
            <td>: </td>
            <td><?= $row->id ?> / </td>
            <td>NO / </td>
            <td>Pem</td>
        </tr>
    </table>
    <p style="font-size: 11px;">Yang Bertanda tangan dibawah ini Kepala Kelurahan
        Kaligandu Kecamatan Serang, Kota Serang, menerangkan bahwa :
    </p>
    <table style="margin-top: 10px; font-size: 11px;margin-left: 50px;">
        <tr>
            <td>Nama</td>
            <td style="padding-left: 50px;">:</td>
            <td><?= $row->nama ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td style="padding-left: 50px;">:</td>
            <td><?= ($row->jenis_kelamin == 'pr') ? "PEREMPUAN" : "LAKI-LAKI" ?></td>
        </tr>
        <tr>
            <td>Tempat, Tgl Lahir</td>
            <td style="padding-left: 50px;">:</td>
            <td><?= $row->tempat_lahir . "," . $row->tanggal_lahir ?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td style="padding-left: 50px;">:</td>
            <td><?= strtoupper($row->status_menikah); ?></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td style="padding-left: 50px;">:</td>
            <td><?= $row->agama ?></td>
        </tr>
        <tr>
            <td>Warga Negara</td>
            <td style="padding-left: 50px;">:</td>
            <td><?= $row->negara ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td style="padding-left: 50px;">:</td>
            <td><?= $row->alamat ?></td>
        </tr>
    </table>

    <p style="font-size: 11px;">
        Benar nama tersebut diatas adalah penduduk warga kami dan bertempat tinggal pada alamat tersebut diatas.
    </p>

    <p style="font-size: 11px; text-align: center;">
        <?= $judul2 ?> ini berlaku sampai dengan
    </p>

    <p style="font-size: 11px; text-align: center; font-weight: bold;">
        <?php
        setlocale(LC_TIME, 'id_ID.utf8');
        $hariIni = new DateTime();
        echo "\"" . strftime('%d %B %Y', $hariIni->getTimestamp() + (60 * 60 * 24 * 10)) . "\"";
        // echo "Serang, " . strftime('%A %d %B %Y', $hariIni->getTimestamp());
        ?>
    </p>

    <p style="font-size: 11px;">
        Demikian <?= $judul2 ?> ini dibuat untuk dipergunakan sebagaimana mestinya.
    </p>
    <p style="font-size: 11px; text-align: right; align-self: flex-end;">
        <?php
        setlocale(LC_TIME, 'id_ID.utf8');
        $hariIni = new DateTime();
        echo "Serang, " . strftime('%d %B %Y', $hariIni->getTimestamp());
        // echo "Serang, " . strftime('%A %d %B %Y', $hariIni->getTimestamp());
        ?>
    </p>
    <table style=" text-align: right; align-self: flex-end; margin-top: 10px; font-size: 11px;margin-left: 50px;" width="100%">
        <tr>
            <td>Yang Bersangkutan,</td>
            <td style=" text-align: right; align-self: flex-end;">Kepala Kelurahan Kaligandu</td>
        </tr>
        <tr>
            <td><br><br></td>
            <td><br><br></td>
        </tr>
        <tr>
            <td><br><br></td>
            <td><br><br></td>
        </tr>
        <tr>
            <td><br><br></td>
            <td><br><br></td>
        </tr>
        <tr>
            <td><?= $row->nama ?></td>
            <td><?php
                $nama = $this->session->userdata('nama');
                echo strtoupper($nama);
                ?></td>
        </tr>
    </table>
</body>

</html>