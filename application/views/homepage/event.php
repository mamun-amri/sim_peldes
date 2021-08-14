<!--Event area start here-->
<section class="event-area-page section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-heading-two">
                    <h2><?= $title ?></h2>
                    <h4><?= 'Jumlah Data : ' . $totalRows ?></h4>
                    <p>Denean sollicitudin. This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean itudin. This is Photoshop's sion of Lorem Ipsum. Proin gravida nibh vel velit.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php
            function limit_words($string, $word_limit)
            {
                $words = explode(" ", $string);
                return implode(" ", array_splice($words, 0, $word_limit));
            }

            foreach ($event as $e) :
                $date   = date_create($e->event_tanggal);
                $tgl    = date_format($date, 'd M Y');
                $jam    = date_format($date, 'h : i : s a');
                ?>
                <!-- start list event -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pd-l0 mr-b30">
                    <div class="event-list-right">
                        <div class="row mr-r0">
                            <div class="col-sm-5 pd-r0">
                                <div class="event-img">
                                    <figure>
                                        <img src="<?= base_url('assets/mosque/') ?>images/event/<?= $e->event_foto ?>" alt="" style="height:300px" />
                                        <ul class="count-list list-inline">
                                            <li><span class="count days">00</span>
                                                <p>DAYS</p>
                                            </li>
                                            <li><span class="count hours">00</span>
                                                <p>hours</p>
                                            </li>
                                            <li><span class="count minutes">00</span>
                                                <p>minutes</p>
                                            </li>
                                            <li><span class="count seconds">00</span>
                                                <p>seconds</p>
                                            </li>
                                        </ul>
                                    </figure>
                                </div>
                            </div>
                            <div class="col-sm-7 pd-0">
                                <div class="content">
                                    <span class="date"><?= $tgl ?></span>
                                    <h4><?= $e->event_judul ?></h4>
                                    <ul class="list-inline">
                                        <li><i class="fa fa-clock-o"></i> <?= $jam ?></li>
                                        <li><i class="fa fa-map-marker"></i> <?= $e->event_lokasi ?></li>
                                    </ul>
                                    <p><?= limit_words($e->event_isi, 30) ?><a href="<?= base_url('event-detail/') . $e->event_slug ?>">Read More</a></p>
                                    <a href="#" class="btn4"><span>Join Us!</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end list event -->
            <?php endforeach ?>
            <!-- start pagination -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= $this->pagination->create_links(); ?>
            </div>
            <!-- end pagination -->