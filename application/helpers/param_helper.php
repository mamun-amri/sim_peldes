<?php
function kelamin($id){
    if($id=="L"){
        $value = "Laki-Laki";
    }elseif ($id=="P") {
        $value = "Perempuan";
    }
    return $value;  
}
// function sts_aktif($id){
//     if($id=="A"){
//         $value = "Aktif";
//     }elseif ($id=="D") {
//         $value = "Drop Out / Dikeluarkan";
//     }elseif ($id=="G") {
//         $value = "Sedang Double Degree";
//     }elseif ($id=="K") {
//         $value = "Mengundurkan Diri / Keluar";
//     }elseif ($id=="L") {
//         $value = "Lulus";
//     }elseif ($id=="T") {
//         $value = "Transfer / Mutasi";
//     }elseif ($id=="W") {
//         $value = "Wafat";
//     }
//     return $value;  
// }
function sts_daftar($id){
    if($id=="D"){
        $value = '<div><span class="label label-sm label-primary">Daftar</span></div>';
    }elseif ($id=="T") {
        $value = '<div><span class="label label-sm label-danger">Tidak Diterima</span></div>';
    }elseif ($id=="Y") {
        $value = '<div><span class="label label-sm label-success">Diterima</span></div>';
    }
    return $value;  
}
function sts_post($id){
    if($id=="1"){
        $value = '<div><span class="label label-sm label-primary">Publis</span></div>';
    }elseif ($id=="2") {
        $value = '<div><span class="label label-sm label-warning">Pending</span></div>';
    }
    return $value;  
}
function status_nikah($id){
    if($id=="S"){
        $value = "Lajang";
    }elseif ($id=="N") {
        $value = "Menikah";
    }elseif ($id=="D") {
        $value = "Duda";
    }elseif ($id=="J") {
       $value = "Janda";
    }
    return $value;  
}
function transport($id){
    if($id==0){
        $value = "kendaraan umum";
    }elseif ($id==1) {
        $value = "Sepeda";
    }elseif ($id==2) {
        $value = "Motor";
    }elseif ($id==3) {
       $value = "Mobil";
    }
    return $value;  
}
function sts_hidup($id){
    if ($id==1) {
        $value = "Hidup";
    }elseif ($id==2) {
        $value = "Meninggal";
    }
    return $value;  
}
function sts_kerabat($id){
    if ($id==1) {
        $value = "Kandung";
    }elseif ($id==2) {
        $value = "Tiri";
    }
    return $value;  
}

function sts_aktif($id){
    $ci = get_instance();
    $row = $ci->db->get_where('m_status_mhs',array('kode_status' => $id, ))->row();
    return $row->status;  
}
function suku($id){
    $ci = get_instance();
    $row = $ci->db->get_where('m_suku',array('id_suku' => $id, ))->row();
    return $row->suku;  
}

function pekerjaan($id){
    $ci = get_instance();
    $row = $ci->db->get_where('m_pekerjaan',array('id_pekerjaan' => $id, ))->row();
    return $row->nm_pekerjaan;  
}
function penghasilan($id){
    $ci = get_instance();
    $row = $ci->db->get_where('m_penghasilan',array('id_penghasilan' => $id, ))->row();
    return $row->nm_penghasilan;  
}
function prov($id){
    $ci = get_instance();
    $row = $ci->db->get_where('m_provinsi',array('id' => $id, ))->row();
    return $row->nama;  
}
function kabkot($id){
    $ci = get_instance();
    $row = $ci->db->get_where('m_kabkot',array('id' => $id, ))->row();
    return $row->nama;  
}
function kec($id){
    $ci = get_instance();
    $row = $ci->db->get_where('m_kecamatan',array('id' => $id, ))->row();
    return $row->nama;  
}
function desa($id){
    $ci = get_instance();
    $row = $ci->db->get_where('m_desa',array('id' => $id, ))->row();
    return $row->nama;  
}
function tinggal($id){
    $ci = get_instance();
    $row = $ci->db->get_where('m_jenis_tinggal',array('id_jns_tinggal' => $id, ))->row();
    return $row->nm_jns_tinggal;  
}
function pendidikan($id){
    $ci = get_instance();
    $row = $ci->db->get_where('m_jenjang_pend',array('id_jenjang' => $id, ))->row();
    return $row->jenjang."/".$row->keterangan;  
}
function pdasal($id){
    $ci = get_instance();
    $row = $ci->db->get_where('m_pendidikan_asal',array('id_pend_asal' => $id, ))->row();
    return $row->pendidikan_asal;  
}

function prodi($id){
    $ci = get_instance();
    $row = $ci->db->get_where('akademik_prodi',array('kode_prodi' => $id, ))->row();
    return $row->nama_prodi;  
}

function kaprodi($id){
    $ci = get_instance();
    $row = $ci->db->get_where('akademik_prodi',array('kode_prodi' => $id, ))->row();
    return "<u>".$row->kaprodi."</u><br>".$row->nip;  
}
function periode_masuk($id){
    $ci = get_instance();
    $row = $ci->db->get_where('akademik_tahun_akademik',array('tahun_semester' => $id, ))->row();
    $sms = substr($id,4,1);
    if($sms == 1){
        $ket = "Ganjil";
    }else{
        $ket = "Genap";
    }
    return $row->tahun_akademik." ".$ket;  
}

function menu_mhs($nim){
    $menu = '<div class="btn-group">
                <button data-toggle="dropdown" class="btn btn-info btn-xs dropdown-toggle" aria-expanded="false">
                    <i class="fa fa-list" aria-hidden="true"></i>
                </button>
                <ul class="dropdown-menu dropdown-info dropdown-menu-right">
                    <li>
                        <a href="'.site_url("mahasiswa/krs/".ec($nim)).'">Kartu Rencana Studi</a>
                    </li>
                    <li>
                        <a href="'.site_url("mahasiswa/krs/".ec($nim)).'">Kartu Hasil Studi</a>
                    </li>
                    <li>
                        <a href="'.site_url("mahasiswa/krs/".ec($nim)).'">Riwayat Keuangan</a>
                    </li>
                    <li>
                        <a href="'.site_url("mahasiswa/krs/".ec($nim)).'">Status Semester</a>
                    </li>
                    <li>
                        <a href="'.site_url("mahasiswa/krs/".ec($nim)).'">Berhenti Studi</a>
                    </li>
                    <li>
                        <a href="'.site_url("mahasiswa/krs/".ec($nim)).'">MK Mengulang</a>
                    </li>
                    <li>
                        <a href="'.site_url("mahasiswa/krs/".ec($nim)).'">Nilai Kuliah</a>
                    </li>
                    <li>
                        <a href="'.site_url("mahasiswa/krs/".ec($nim)).'">Transkrip</a>
                    </li>
                </ul>
            </div>';
    return $menu; 

    
                    // <li>
                    //     <a href="'.site_url("mahasiswa/krs/".ec($nim)).'">Sunting KRS</a>
                    // </li>
                    // <li>
                    //     <a href="'.site_url("mahasiswa/krs/".ec($nim)).'">Kemajuan Belajar</a>
                    // </li>
                    // <li>
                    //     <a href="'.site_url("mahasiswa/krs/".ec($nim)).'">Kuesioner</a>
                    // </li>
}