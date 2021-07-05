<!--Single blog area start here-->
<section class="single-blog-area section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="blog">
                    <?php
                    $date = date_create($artikel_detail->artikel_tanggal);
                    $tgl  = date_format($date, 'd');
                    $bln  = date_format($date, 'M');
                    ?>
                    <figure><img src="<?= base_url('assets/mosque/') ?>images/artikel/<?= $artikel_detail->artikel_foto ?>" alt="" /></figure>
                    <div class="content">
                        <div class="date"><span><strong><?= $tgl ?></strong>
                                <div> <?= $bln ?></div>
                            </span></div>
                        <div class="con mr-b30">
                            <a href="#">
                                <h4><?= $artikel_detail->artikel_judul ?></h4>
                            </a>

                            <?= $artikel_detail->artikel_isi ?>

                        </div>
                        <ul class="list-inline data">
                            <li><i class="fa fa-user"></i>- by <?= $artikel_detail->artikel_user ?></li>
                            <!-- <li><i class="fa fa-comment"></i>04 Comm.</li> -->
                            <li><i class="fa fa-tags"></i><?= $artikel_detail->artikel_tag ?></li>
                        </ul>
                    </div>
                </div>
            </div>