<!--Single blog area start here-->
<section class="single-blog-area section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="blog">
                    <?php
                    $date = date_create($event->event_tanggal);
                    $tgl  = date_format($date, 'd M Y');
                    $jam  = date_format($date, 'h : i : s a');
                    ?>
                    <figure><img src="<?= base_url('assets/mosque/') ?>images/event/<?= $event->event_foto ?>" alt="" /></figure>
                    <div class="content">
                        <div class="date"><span><strong><?= $tgl ?></strong>
                                <div> <?= $bln ?></div>
                            </span></div>
                        <div class="con mr-b30">
                            <a href="#">
                                <h4><?= $event->event_judul ?></h4>
                            </a>

                            <?= $event->event_isi ?>

                        </div>
                        <ul class="list-inline data">
                            <li><i class="fa fa-map-marker"></i> <?= $event->event_lokasi ?></li>
                            <!-- <li><i class="fa fa-comment"></i>04 Comm.</li> -->
                            <li><i class="fa fa-clock-o"></i><?= $jam ?></li>
                            <li><i class="fa fa-calendar-check-o"></i><?= $tgl ?></li>
                        </ul>
                    </div>
                </div>
            </div>