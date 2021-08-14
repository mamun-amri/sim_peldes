<script src="<?php echo base_url() ?>assets/js/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/ace.min.js"></script>
<script type="text/javascript">
  jQuery(function($) {
    $('.easy-pie-chart.percentage').each(function() {
      var $box = $(this).closest('.infobox');
      var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
      var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
      var size = parseInt($(this).data('size')) || 50;
      $(this).easyPieChart({
        barColor: barColor,
        trackColor: trackColor,
        scaleColor: false,
        lineCap: 'butt',
        lineWidth: parseInt(size / 10),
        animate: ace.vars['old_ie'] ? false : 1000,
        size: size
      });
    })

    $('.sparkline').each(function() {
      var $box = $(this).closest('.infobox');
      var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
      $(this).sparkline('html', {
        tagValuesAttribute: 'data-values',
        type: 'bar',
        barColor: barColor,
        chartRangeMin: $(this).data('min') || 0
      });
    });
  })
</script>
<div id="content">
  <div class="container no-padding">
    <div class="row">
      <div id="carousel-example" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <?php
          $slide = 0;
          foreach ($banner as $row) {
            if ($slide == 0) {
              $item_active = "active";
            } else {
              $item_active = "";
            }
            echo "<li data-target='#carousel-example' data-slide-to='$slide' class='$item_active'></li>";
            $slide++;
          }
          ?>
        </ol>
        <div class="clearfix"></div>
        <div class="carousel-inner">
          <?php
          $slide = 0;
          foreach ($banner as $row) {
            if ($slide == 0) {
              $item_active = "active";
            } else {
              $item_active = "";
            }
            echo "
            <div class='item " . $item_active . "'>
              <img src='" . base_url() . "template/img/slideshow/" . $row->file . "'>
            </div>
          ";
            $slide++;
          }
          ?>
        </div>
        <a class="left carousel-control" href="#carousel-example" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
    </div>
  </div>
  <div class="container background-gray-lighter">
    <div class="row">
      <h2 class="animate fadeIn text-center margin-top-50">Selamat Datang di PPDB Online<br>MAN 1 Pandeglang</h2>
      <hr class="margin-top-15">
    </div>
  </div>
  <div class="container">
    <div class="row margin-vert-30">
      <div class="col-md-12">
        <h3 class="animate fadeIn text-center margin-top-5">Batas penerimaan jumlah siswa perjurusan (<?= $this->session->userdata('th_akad') ?>)</h3>
        <div class="row padding-top-20">
          <div class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-heading text-center">
                <h3 class="margin-bottom-10">Kelas Bahasa</h3>
              </div>
              <div class="panel-body text-center">
                <?php
                foreach ($bahasa as $row) {
                  $presntasi = ($row->jml_daftar * $row->daya_tampung) / 100;
                  echo '<div class="easy-pie-chart percentage" data-percent="' . $presntasi . '" data-size="100" id="bubbletooltip1" title="Presensi Penerimaan siswa: ' . $presntasi . ' %">
                            <span class="percent">' . $row->jml_daftar . '/' . $row->daya_tampung . '</span>
                        </div>';
                }
                ?>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-heading text-center">
                <h3 class="margin-bottom-10">Kelas IPA</h3>
              </div>
              <div class="panel-body text-center">
                <?php
                foreach ($ipa as $row) {
                  $presntasi = ($row->jml_daftar * $row->daya_tampung) / 100;
                  echo '<div class="easy-pie-chart percentage" data-percent="' . $presntasi . '" data-size="100" id="bubbletooltip2" title="Presensi Penerimaan siswa: ' . $presntasi . ' %">
                          <span class="percent">' . $row->jml_daftar . '/' . $row->daya_tampung . '</span>
                        </div>';
                }
                ?>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-heading text-center">
                <h3 class="margin-bottom-10">Kelas IPS</h3>
              </div>
              <div class="panel-body text-center">
                <?php
                foreach ($ips as $row) {
                  $presntasi = ($row->jml_daftar * $row->daya_tampung) / 100;
                  echo '<div class="easy-pie-chart percentage" data-percent="' . $presntasi . '" data-size="100" id="bubbletooltip3" title="Presensi Penerimaan siswa: ' . $presntasi . ' %" >
                          <span class="percent">' . $row->jml_daftar . '/' . $row->daya_tampung . '</span>
                        </div>';
                }
                ?>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-heading text-center">
                <h3 class="margin-bottom-10">Kelas Agama</h3>
              </div>
              <div class="panel-body text-center">
                <?php
                foreach ($agama as $row) {
                  $presntasi = ($row->jml_daftar * $row->daya_tampung) / 100;
                  echo '<div class="easy-pie-chart percentage" data-percent="' . $presntasi . '" data-size="100" id="bubbletooltip4" title="Presensi Penerimaan siswa: ' . $presntasi . ' %">
                          <span class="percent">' . $row->jml_daftar . '/' . $row->daya_tampung . '</span>
                        </div>';
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <hr>
        <div class="row padding-top-20">
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading text-center">
                <i class="fa fa-arrow-right fa-4x"></i>
              </div>
              <div class="panel-body text-center">
                <h3 class="margin-bottom-10">Alur Pendaftaran</h3>
                Informasi mengenai alur pendaftaran sistem PPDB online silahkan pelajari terlebih dahulu.
                <a class="thumbBox btn btn-sm btn-primary" rel="lightbox-thumbs" href="<?php echo base_url(); ?>template/img/alur daftar ppdb.jpg">View Details</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading text-center">
                <i class="fa fa-book fa-4x"></i>
              </div>
              <div class="panel-body text-center">
                <h3 class="margin-bottom-10">Syarat Pendaftaran</h3>
                Informasi mengenai persyaratan yang harus dipenuhi oleh calon pendaftar.<br>
                <a class="thumbBox btn btn-sm btn-primary" rel="lightbox-thumbs" href="<?php echo base_url(); ?>template/img/Syarat-Pendaftaran.png">View Details</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading text-center">
                <i class="fa fa-question-circle fa-4x"></i>
              </div>
              <div class="panel-body text-center">
                <h3 class="margin-bottom-10">Panduan Pendaftaran</h3>
                Untuk mendapat informasi yang lebih lengkap panduan penggunaan PPDB Online.
                <a target="_blank" href="<?= base_url("PANDUAN PENDAFTARAN PPDB ONLINE MAN 1 PANDEGLANG.pdf") ?>" class="btn btn-sm btn-primary">View Details</a>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </div>
      <div class="col-md-9">
      </div>
    </div>
  </div>

</div>