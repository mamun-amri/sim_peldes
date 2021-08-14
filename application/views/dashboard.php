<?php
foreach ($visitor as $result) {
	$bulan[] = $result->tgl;
	$value[] = (float) $result->jumlah;
}
?>
<script src="<?php echo base_url() ?>assets/js/hightchart/highcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/hightchart/exporting.js" type="text/javascript"></script>
<script src="<?php echo base_url() . 'assets/js/chartjs/Chart.min.js' ?>"></script>

<div class="page-header">
	<h1>Dashboard </h1>
</div>
<div class="content-wrapper">
	<section class="content">
		<?php
		if (!empty($this->session->flashdata())) {
			echo alert('alert-info', 'Selamat Datang', 'Selamat Datang Di Sistem Infromasi Pelayanan Desa');
		}
		?>
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="infobox infobox-blue infobox-big infobox-dark">
					<div class="infobox-icon">
						<i class="ace-icon fa fa-chrome"></i>
					</div>
					<div class="infobox-data">
						<?php
						$query = $this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Chrome'");
						$jml = $query->num_rows();
						?>
						<span class="infobox-data-number">Chrome</span>
						<div class="infobox-content"><?php echo $jml; ?></div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-8 col-xs-12">
				<div class="infobox infobox-red infobox-big infobox-dark">
					<div class="infobox-icon">
						<i class="ace-icon fa fa-firefox"></i>
					</div>
					<div class="infobox-data">
						<?php
						$query = $this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Firefox' OR pengunjung_perangkat='Mozilla'");
						$jml = $query->num_rows();
						?>
						<span class="infobox-data-number">Firefox</span>
						<div class="infobox-content"><?php echo $jml; ?></div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="infobox infobox-green infobox-big infobox-dark">
					<div class="infobox-icon">
						<i class="ace-icon fa fa-bug"></i>
					</div>
					<div class="infobox-data">
						<?php
						$query = $this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Googlebot'");
						$jml = $query->num_rows();
						?>
						<span class="infobox-data-number">Googlebot</span>
						<div class="infobox-content"><?php echo $jml; ?></div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="infobox infobox-orange infobox-big infobox-dark">
					<div class="infobox-icon">
						<i class="ace-icon fa fa-opera"></i>
					</div>
					<div class="infobox-data">
						<?php
						$query = $this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Opera'");
						$jml = $query->num_rows();
						?>
						<span class="infobox-data-number">Opera</span>
						<div class="infobox-content"><?php echo $jml; ?></div>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="widget-box">
			<div class="widget-header widget-header-flat">
				<h4 class="widget-title">Pengunjung bulan ini</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="row">
						<canvas id="canvas" width="1000" height="280"></canvas>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">
	var lineChartData = {
		labels: <?php echo json_encode($bulan); ?>,
		datasets: [

			{
				fillColor: "rgba(60,141,188,0.9)",
				strokeColor: "rgba(60,141,188,0.8)",
				pointColor: "#3b8bba",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(152,235,239,1)",
				data: <?php echo json_encode($value); ?>
			}

		]

	}

	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);

	var canvas = new Chart(myLine).Line(lineChartData, {
		scaleShowGridLines: true,
		scaleGridLineColor: "rgba(0,0,0,.005)",
		scaleGridLineWidth: 0,
		scaleShowHorizontalLines: true,
		scaleShowVerticalLines: true,
		bezierCurve: true,
		bezierCurveTension: 0.4,
		pointDot: true,
		pointDotRadius: 4,
		pointDotStrokeWidth: 1,
		pointHitDetectionRadius: 2,
		datasetStroke: true,
		tooltipCornerRadius: 2,
		datasetStrokeWidth: 2,
		datasetFill: true,
		legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
		responsive: true
	});
</script>