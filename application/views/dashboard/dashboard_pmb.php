<?php
	$th_aktif = $this->session->userdata('th_aktif');
?>
<script src="<?=base_url()?>assets/js/hightchart/highcharts.js"></script>
<script src="<?=base_url()?>assets/js/hightchart/exporting.js"></script>

<script type="text/javascript">
	var chart1; // globally available
	$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'grafik',
            type: 'line'
         },
		title: {
			text: 'Grafik pendaftaran calon mahasiswa baru'
		},
		subtitle: {
			text: 'Data tahunan pendaftaran mahasiswa baru'
		},
        plotOptions: {
        	series: {
            	pointStart: 2019
			}
		},
        yAxis: {
            title: {
               text: 'Jumlah Pendaftar'
            }
        },
		 legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'middle'
		},
        series: [{
        name: 'Calon Mahasiswa',
        data: [
		
		<?php 
			$sql   = $this->db->query("SELECT DISTINCT tahun_kurikulum as tahun from pmb_mahasiswa");
			foreach ($sql->result() as $row) {
            	$th_ 		= $row->tahun;  
                $sql_jumlah = $this->db->query("SELECT * from pmb_mahasiswa where tahun_kurikulum='$th_'")->num_rows();
                $jumlah 	= $sql_jumlah;              
        ?>
                   <?php echo $jumlah; ?>,
         <?php } ?>
		]
		}]
      });
   });	

	var chart2; // globally available
	$(document).ready(function() {
      chart2 = new Highcharts.Chart({
         chart: {
            renderTo: 'grafik2',
            plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
         },   
         title: {
            text: 'Data Calon Mahasiswa Perjurusan'
         },
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.1f} %',
					style: {
						color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
					}
				}
			}
		},
		 
       series: [{
        name: 'Jurusan',
        colorByPoint: true,
        data: [
            <?php
            $sql   = $this->db->query("SELECT akademik_prodi.kode_prodi,akademik_prodi.nama_prodi, m_jenjang.nm, m_jenjang.kd_jenjang
            							from akademik_prodi 
            							INNER JOIN m_jenjang ON m_jenjang.kd_jenjang = akademik_prodi.jenjang");
            foreach ($sql->result() as $ret) {
            	$pst 			= $ret->nama_prodi;                     
            	$kd_pst			= $ret->kode_prodi;                     
            	$jen 			= $ret->nm;                     
            	$kd_jenjang 	= $ret->kd_jenjang;                     
                
                $sql_jumlah   	= $this->db->query("SELECT * from pmb_mahasiswa where prodi='$kd_pst' and tahun_kurikulum='$th_aktif'")->num_rows();                
				$jumlah1 		= $sql_jumlah;                 
				$jumlah 		= $sql_jumlah*11/100;              
            ?>
                  {
                      name: '<?php echo $pst.'|'.$jen.' ('.$jumlah1.' Orang)'; ?>',
                      y: <?php echo $jumlah; ?>
                  },
            <?php } ?>
            ]
		}]
      });
   });
</script>
<form action="<?=base_url("dashboard_pmb")?>" method="POST">
	<div class="col-lg-3">
		<select name="th_chart" class='form-control' title="Pilih tahun untuk mengelola data pada tahun yang dipilih">
			<option value="">--Pilih Tahun--</option>
			<?php			
			foreach ($data_tahun as $th) {
				echo"<option value='$th->tahun'"; if($th_aktif==$th->tahun){echo"selected";} echo">$th->tahun</option>";
			}
			?>
		</select>
	</div>
	<div class="col-lg-2">
		<button type="submit" class="btn btn-sm btn-primary">Pilih</button>
	</div>
</form>
<div class="col-sm-12">
	<div class="widget-box widget-color-blue">
		<div class="widget-header widget-header-flat ">
			<h4 class="widget-title">Garfik Pendaftaran Calon Mahasiswa Pertahun</h4>
		</div>
		<div class="widget-body">
			<div class="widget-main">
				<div id='grafik' style="width: 100%; height: 400px; margin: 0 auto"></div>										
			</div>
		</div>
	</div>
</div>
<div class="col-sm-12">
	<div class="widget-box widget-color-blue">
		<div class="widget-header widget-header-flat">
			<h4 class="widget-title">Garfik Pendaftaran Calon Mahasiswa Perjurusan</h4>
		</div>
		<div class="widget-body">
			<div class="widget-main">
				
				<div id='grafik2' style="width: 100%; height: 400px; margin: 0 auto"></div>										
			</div>
		</div>
	</div>
</div>


