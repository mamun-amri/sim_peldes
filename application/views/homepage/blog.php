<!--Blog area start here-->
<section class="blog-area section">
    <div class="container">
        <div class="row">
            <div class="section-heading-two">
                <?php if ($this->uri->segment(2) != null) :
                    if ($keyword) :
                        echo '<h2>' . $title . ' : ' . $keyword . '</h2>';
                    else :
                        echo '<h2>' . $title . '</h2>';
                    endif;
                else :
                    echo '<h2>' . $this->uri->segment(1) . '</h2>';
                endif; ?>
                <h4><?= 'Jumlah Data : ' . $totalRows ?></h4>
                <p>Denean sollicitudin. This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean itudin. This is Photoshop's sion of Lorem Ipsum. Proin gravida nibh vel velit.</p>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 pd-r45">
                <!-- start artikel -->
                <?php

                function limit_words($string, $word_limit)
                {
                    $words = explode(" ", $string);
                    return implode(" ", array_splice($words, 0, $word_limit));
                }

                foreach ($artikel as $b) :
                    $date = date_create($b->artikel_tanggal);
                    $tgl  = date_format($date, 'd');
                    $bln  = date_format($date, 'M');
                    ?>

                    <div class="blog mr-b60">
                        <figure><img src=" <?= base_url('assets/mosque/') ?>images/artikel/<?= $b->artikel_foto ?>" alt="" /></figure>
                        <div class="content">
                            <div class="date"><span><strong><?= $tgl ?></strong><em> <?= $bln ?></em></span></div>
                            <div class="con mr-b30">
                                <a href="<?= base_url('artikels/detail/') . $b->artikel_slug ?>">
                                    <h4><?= $b->artikel_judul ?></h4>
                                </a>
                                <p><?= limit_words($b->artikel_isi, 50) ?></p>
                                <a href="<?= base_url('artikels/detail/') . $b->artikel_slug ?>" class="btn6">Read More</a>
                            </div>
                            <ul class="list-inline">
                                <li><i class="fa fa-user"></i>- by <?= $b->artikel_user ?></li>
                                <!-- <li><i class="fa fa-comment"></i>04 Comm.</li> -->
                                <li><i class="fa fa-tags"></i> <?= $b->artikel_tag ?></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end artikel -->
                <?php
                endforeach; ?>
                <!-- start pagination -->
                <?= $this->pagination->create_links(); ?>
                <!-- end pagination -->
            </div>