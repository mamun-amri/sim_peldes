
<div class="page-header"><h1>Detail Data Mahasiswa</h1></div>
<div class="row">
	 <div class="col-sm-2">       
        <div class="col-xs-12 col-sm-12 center">
           
        </div>
    </div>
    <div class="col-sm-12">
            <div class="col-sm-12">
            	<table class="table">
				    
				    <tr>
				    	<td rowspan="7" width="15%">
				    		 <span class="profile-picture">
				                <img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="<?php
									if(empty($this->session->userdata('images'))){
										echo"".base_url()."assets/foto_profil/people.png";
									}else{
										echo "".base_url()."assets/foto_profil/".$this->session->userdata('images')."";
									}
								?>" >
				            </span>
				    	</td>
				    	<td width="20%">No Pendaftaran</td><td width="1%">:</td><td><?=$no_pendaftaran?></td>
				    	<td width="20%">Status</td><td width="1%">:</td><td><?=sts_daftar($status)?></td>
				    </tr>
				    <tr>
				    	<td width="20%">Nama</td><td width="1%">:</td><td><?=$nama?></td>
				    	<td width="20%">Kelas</td><td width="1%">:</td><td></td>
				    </tr>
				    <tr>
				    	<td width="20%">Program Studi</td><td width="1%">:</td><td><?=$prodi?></td>
				    	<td width="20%">Jenis Pendaftaran</td><td width="1%">:</td><td><?=$jenis_pendaftaran?></td>
				    </tr>
				    <tr>
				    	<td width="20%">Konsentrasi</td><td width="1%">:</td><td><?=$konsentrasi?></td>
				    	<td width="20%">Jalur Pendaftaran</td><td width="1%">:</td><td><?=$jalur_pendaftaran?></td>
				    </tr>
				    <tr>
				    	<td width="20%">Periode Masuk</td><td width="1%">:</td><td><?=periode_masuk($periode_masuk)?></td>
				    	<td width="20%">Gelombang</td><td width="1%">:</td><td>Ke-<?=$gelombang?></td>
				    </tr>
				    <tr>
				    	<td width="20%">Tahun Kurikulum</td><td width="1%">:</td><td><?=$tahun_kurikulum?></td>
				    	<td width="20%">Tanggal Masuk</td><td width="1%">:</td><td><?=date_indo($tgl_masuk)?></td>
				    </tr>
				    <tr>
				    	<td width="20%">Sistem Kuliah</td><td width="1%">:</td><td><?=$sistem_kuliah?></td>
				    	<td width="20%"></td><td width="1%"></td><td></td>
				    </tr>
            	</table>
            </div>
            <div class="col-sm-12">
                <div class="tabbable">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a data-toggle="tab" href="#informasi">Informasi Umum</a></li>
                        <li><a data-toggle="tab" href="#domisili">Domisili</a></li>
                        <li><a data-toggle="tab" href="#orangtua">Orang Tua</a></li>
                        <li><a data-toggle="tab" href="#wali">Wali</a></li>
                        <li><a data-toggle="tab" href="#sekolah">Sekolah</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="informasi" class="tab-pane fade in active">
                            <table class="table no-border">                            	
                                <tr>
                                	<td width="20%">Jenis Kelamin</td><td width="1%">:</td><td><?=kelamin($jenis_kelamin)?></td>
                                	<td width="20%">Email Pribadi</td><td width="1%">:</td><td><?=$email_pribadi?></td>
                                </tr>
                                <tr>
                                	<td width="20%">Tempat Lahir</td><td width="1%">:</td><td><?=$tmp_lahir?></td>
                                	<td width="20%">Status Nikah</td><td width="1%">:</td><td><?=status_nikah($status_nikah)?></td>
                                </tr>
							    <tr>
							    	<td width="20%">Tanggal Lahir</td><td width="1%">:</td><td><?=date_indo($tgl_lahir)?></td>
							    	<td width="20%">NIK</td><td width="1%">:</td><td><?=$nik?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Agama</td><td width="1%">:</td><td><?=$agama?></td>
							    	<td width="20%">No. Kk</td><td width="1%">:</td><td><?=$no_kk?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Suku</td><td width="1%">:</td><td><?=suku($suku)?></td>
							    	<td width="20%">No. KPS</td><td width="1%">:</td><td><?=$no_kps?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Gol. Darah</td><td width="1%">:</td><td><?=$gol_darah?></td>
							    	<td width="20%">Pekerjaan</td><td width="1%">:</td><td><?=pekerjaan($pekerjaan)?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Berat Badan</td><td width="1%">:</td><td><?=$berat_badan?></td>
							    	<td width="20%">Penghasilan</td><td width="1%">:</td><td><?=penghasilan($penghasilan)?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Tinggi Badan</td><td width="1%">:</td><td><?=$tinggi_badan?></td>
							    	<td width="20%">Instansi Pekerjaan</td><td width="1%">:</td><td><?=$instansi_pekerjaan?></td>
							    </tr>
							    <tr>
							    	<td width="20%">No. Telp</td><td width="1%">:</td><td><?=$no_telp?></td>
							    	<td width="20%">Transportasi</td><td width="1%">:</td><td><?=transport($transportasi)?></td>
							    </tr>
							    <tr>
							    	<td width="20%">No. Hp</td><td width="1%">:</td><td><?=$no_hp?></td>
							    	<td width="20%">Akta Lahir</td><td width="1%">:</td><td><?=$akta_lahir?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Email Kampus</td><td width="1%">:</td><td><?=$email_kampus?></td>
							    	<td width="20%"></td><td width="1%"></td><td></td>
							    </tr>

							                          
                            </table>
                        </div>
                        <div id="domisili" class="tab-pane fade">
                            <table class="table no-border">
                            	<tr>
                            		<td width="20%">Propinsi</td><td width="1%">:</td><td><?=prov($propinsi)?></td>
                            		<td width="20%">Kewarganegaraan</td><td width="1%">:</td><td><?=$kewarganegaraan?></td>
                            	</tr>
							    <tr>
							    	<td width="20%">Kota</td><td width="1%">:</td><td><?=kabkot($kota)?></td>
							    	<td width="20%">RT</td><td width="1%">:</td><td><?=$rt?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Kecamatan</td><td width="1%">:</td><td><?=kec($kecamatan)?></td>
							    	<td width="20%">RW</td><td width="1%">:</td><td><?=$rw?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Desa</td><td width="1%">:</td><td><?=desa($desa)?></td>
							    	<td width="20%">Kode Pos</td><td width="1%">:</td><td><?=$kode_pos?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Dusun</td><td width="1%">:</td><td><?=$dusun?></td>
							    	<td width="20%">Status Tinggal</td><td width="1%">:</td><td><?=tinggal($status_tinggal)?></td>
							    </tr>
                            	<tr>
                            		<td width="20%">Alamat</td><td width="1%">:</td><td><?=$alamat?></td></tr>                                                
                            		<td width="20%"></td><td width="1%"></td><td></td>
                            	</tr>                                                
                            </table>                    
                        </div>
                        <div id="orangtua" class="tab-pane fade">
                            <table class="table no-border">
                                <tr>
                                    <td colspan="3"><h3 class="header smaller lighter green"><b>Biodata Ayah</b></h3></td>
                                    <td colspan="3"><h3 class="header smaller lighter green"><b>Biodata Ibu</b></h3></td>
                                </tr>
                                <tr>
                                	<td width="20%">Nama Ayah</td><td width="1%">:</td><td><?=$nama_ayah?></td>
                                	<td width="20%">Nama Ibu</td><td width="1%">:</td><td><?=$nama_ibu?></td>
                                </tr>
							    <tr>
							    	<td width="20%">NIK Ayah</td><td width="1%">:</td><td><?=$nik_ayah?></td>
							    	<td width="20%">NIK Ibu</td><td width="1%">:</td><td><?=$nik_ibu?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Tanggal Lahir Ayah</td><td width="1%">:</td><td><?=date_indo($tgl_lahir_ayah)?></td>
							    	<td width="20%">Tanggal Lahir Ibu</td><td width="1%">:</td><td><?=date_indo($tgl_lahir_ibu)?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Status Hidup Ayah</td><td width="1%">:</td><td><?=sts_hidup($status_hidup_ayah)?></td>
							    	<td width="20%">Status Hidup Ibu</td><td width="1%">:</td><td><?=sts_hidup($status_hidup_ibu)?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Status Kekerabatan Ayah</td><td width="1%">:</td><td><?=sts_kerabat($status_kekerabatan_ayah)?></td>
							    	<td width="20%">Status Kekerabatan Ibu</td><td width="1%">:</td><td><?=sts_kerabat($status_kekerabatan_ibu)?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Pendidikan Ayah</td><td width="1%">:</td><td><?=pendidikan($pendidikan_ayah)?></td>
							    	<td width="20%">Pendidikan Ibu</td><td width="1%">:</td><td><?=pendidikan($pendidikan_ibu)?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Pekerjaan Ayah</td><td width="1%">:</td><td><?=pekerjaan($pekerjaan_ayah)?></td>
							    	<td width="20%">Pekerjaan Ibu</td><td width="1%">:</td><td><?=pekerjaan($pekerjaan_ibu)?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Penghasilan Ayah</td><td width="1%">:</td><td><?=penghasilan($penghasilan_ayah)?></td>
							    	<td width="20%">Penghasilan Ibu</td><td width="1%">:</td><td><?=penghasilan($penghasilan_ibu)?></td>
							    </tr>
							    <tr><td width="20%">Alamat Ayah</td><td width="1%">:</td><td><?=$alamat_ayah?></td>
							    	<td width="20%">Alamat Ibu</td><td width="1%">:</td><td><?=$alamat_ibu?></td>
							    </tr>
							    <tr>
							    	<td width="20%">No. Telp Ayah</td><td width="1%">:</td><td><?=$no_telp_ayah?></td>
							    	<td width="20%">No. Telp Ibu</td><td width="1%">:</td><td><?=$no_telp_ibu?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Email Ayah</td><td width="1%">:</td><td><?=$email_ayah?></td>
							    	<td width="20%">Email Ibu</td><td width="1%">:</td><td><?=$email_ibu?></td>
							    </tr>
                            </table>                    
                        </div>
                        <div id="wali" class="tab-pane fade">
                            <table class="table no-border">
                            	<tr>
                            		<td width="20%">Nama Wali</td><td width="1%">:</td><td><?=$nama_wali?></td>
                            		<td width="20%">Pekerjaan Wali</td><td width="1%">:</td><td><?=pekerjaan($pekerjaan_wali)?></td>
                            	</tr>
							    <tr>
							    	<td width="20%">NIK Wali</td><td width="1%">:</td><td><?=$nik_wali?></td>
							    	<td width="20%">Penghasilan Wali</td><td width="1%">:</td><td><?=penghasilan($penghasilan_wali)?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Tanggal Lahir Wali</td><td width="1%">:</td><td><?=date_indo($tgl_lahir_wali)?></td>
							    	<td width="20%">Alamat Wali</td><td width="1%">:</td><td><?=$alamat_wali?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Status Hidup Wali</td><td width="1%">:</td><td><?=sts_hidup($status_hidup_wali)?></td>
							    	<td width="20%">No. Telp Wali</td><td width="1%">:</td><td><?=$no_telp_wali?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Status Kekerabatan Wali</td><td width="1%">:</td><td><?=sts_kerabat($status_kekerabatan_wali)?></td>
							    	<td width="20%">Email Wali</td><td width="1%">:</td><td><?=$email_wali?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Pendidikan Wali</td><td width="1%">:</td><td><?=pendidikan($pendidikan_wali)?></td>
							    	<td width="20%"></td><td width="1%"></td><td></td>
							    </tr>							  
                            </table>
                        </div>
                        <div id="sekolah" class="tab-pane fade">
                            <table class="table no-border">
                            	<tr>
                            		<td width="20%">Pendidikan Asal</td><td width="1%">:</td><td><?=pdasal($pendidikan_asal)?></td>
                            		<td width="20%">Alamat Sekolah</td><td width="1%">:</td><td><?=$alamat_sekolah?></td>
                            	</tr>
							    <tr>
							    	<td width="20%">Propinsi Sekolah</td><td width="1%">:</td><td><?=prov($propinsi_sekolah)?></td>
							    	<td width="20%">Telp. Sekolah</td><td width="1%">:</td><td><?=$telp_sekolah?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Kota Sekolah</td><td width="1%">:</td><td><?=kabkot($kota_sekolah)?></td>
							    	<td width="20%">No. Ijazah</td><td width="1%">:</td><td><?=$no_ijazah?></td>
							    </tr>
							    <tr>
							    	<td width="20%">Sekolah</td><td width="1%">:</td><td><?=$sekolah?></td>
							    	<td width="20%">Ijazah</td><td width="1%">:</td><td><?=$ijazah?></td>
							    </tr>
							    <tr>
							    	<td width="20%">NISN</td><td width="1%">:</td><td><?=$nisn?></td>
							    	<td width="20%"></td><td width="1%"></td><td></td>
							    </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>