<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from www.webstrot.com/html/mosque/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Oct 2019 14:50:47 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mosque | <?= $this->uri->segment(1) ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../../../webstrot.com/html/mosque/apple-touch-icon.html">
    <!-- Place favicon.ico in the root directory -->

    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="<?= base_url('assets/mosque/') ?>css/bootstrap.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="<?= base_url('assets/mosque/') ?>css/animate.css">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="<?= base_url('assets/mosque/') ?>css/jquery-ui.min.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="<?= base_url('assets/mosque/') ?>css/meanmenu.min.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?= base_url('assets/mosque/') ?>css/owl.carousel.min.css">
    <!-- bxslider css -->
    <link rel="stylesheet" href="<?= base_url('assets/mosque/') ?>css/jquery.bxslider.css">
    <!-- magnific popup css -->
    <link rel="stylesheet" href="<?= base_url('assets/mosque/') ?>css/magnific-popup.css">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="<?= base_url('assets/mosque/') ?>css/font-awesome.min.css">
    <!-- flaticon css -->
    <link rel="stylesheet" href="<?= base_url('assets/mosque/') ?>css/flaticon.css">
    <!-- style css -->
    <link rel="stylesheet" href="<?= base_url('assets/mosque/') ?>style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="<?= base_url('assets/mosque/') ?>css/responsive.css">
    <!-- modernizr css -->
    <script src="<?= base_url('assets/mosque/') ?>js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!--Header area start here-->
    <header>
        <div class="topbar hidden-sm-down">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12">
                        <div class="header-event">
                            <ul class="list-inline count-list">
                                <li>
                                    <h6>Next Big Event :</h6>
                                </li>
                                <li><span class="count days">00</span><span class="con">days</span></li>
                                <li><span class="count hours">00</span><span class="con">Hours</span></li>
                                <li><span class="count minutes">00</span><span class="con">minutes</span></li>
                                <li><span class="count seconds">00</span><span class="con">Seconds</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
                        <div class="header-social text-right">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-header hidden-sm-down" id="sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="logo-area">
                            <a href="<?= base_url('home') ?>"><img src="<?= base_url('assets/mosque/') ?>images/logo/logo.png" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="menu-area">
                            <nav>
                                <ul class="list-inline">
                                    <li><a href="<?= base_url('home') ?>">Home</a></li>
                                    <li><a href="<?= base_url('events') ?>">Event</a></li>
                                    <li><a href="<?= base_url('artikels/blog') ?>">artikel</a></li>
                                    </li>
                                    <li><a href="<?= base_url('contactus') ?>">Contact Us</a></li>
                                    <li class="menu-btn">
                                        <ul>
                                            <li><span class="search-ico"><i class="flaticon-magnifying-glass"></i></span></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="search-box">
                            <form action="<?= base_url('artikels/blog') ?>" method="post">
                                <input type="text" name="keyword" placeholder="Search keyword..." autocomplete="off">
                                <button type="submit" name="submit"> <i class="flaticon-magnifying-glass"></i></button>
                                <span class="close-search"><i class="flaticon-cancel"></i></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul class="list-inline">
                                    <li><a href="<?= base_url('home') ?>">Home</a></li>
                                    <li><a href="<?= base_url('events') ?>">Event</a></li>
                                    <li><a href="<?= base_url('artikels/blog') ?>">artikel</a></li>
                                    </li>
                                    <li><a href="<?= base_url('contact') ?>">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--Header area end here-->
    <!--Breadcumb area start here-->
    <section class="breadcumb-area bg-img jarallax af">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcumb">
                        <h2><?= $title ?></h2>
                        <ul class="list-inline">
                            <li><a href="<?= base_url('home') ?>">Home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li><a href="<?= $link ?>"><?= $title ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Breadcumb area end here-->

    <?php
    echo $contents;
    ?>

    <?php
    $uri    = $this->uri->segment(1);
    if ($uri === 'events') : elseif ($uri === 'contactus') : elseif ($uri === 'home' && $this->uri->segment(2) === 'create_action') : else : ?>
        <!-- start sidebar -->
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <div class="sidbear">
                <div class="widget search-sid">
                    <h3>Search Here</h3>
                    <form action="<?= base_url('artikels/blog') ?>" method="post">
                        <input type="text" name="keyword" placeholder="Search keyword.." autocomplete="off">
                        <button type="submit" name="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="widget categories">
                    <h3>Blog Categories</h3>
                    <ul>
                        <?php
                            foreach ($kategori as $kat) :
                                ?>
                            <li><a href="<?= base_url('category/') . $kat->artikel_kategori ?>"><i class="fa fa-hand-o-right"></i><?= $kat->artikel_kategori ?></a></li>
                        <?php endforeach;
                            ?>
                    </ul>
                </div>
                <div class="widget categories">
                    <h3>Archives</h3>
                    <ul>
                        <?php foreach ($archive as $ar) :
                                $date = date_create($ar->artikel_tanggal);
                                $arc = date_format($date, 'M Y');
                                $link = date_format($date, 'Y m');
                                ?>
                            <li><a href="<?= base_url('archive/') . str_replace(" ", "-", $link) ?>"><i class="fa fa-hand-o-right"></i><?= $arc ?></a></li>
                        <?php endforeach; ?>
                </div>
                <div class="widget tags">
                    <h3>Tags Cloud</h3>
                    <ul class="list-inline">
                        <?php
                            foreach ($tag as $t) : ?>
                            <li><a href="<?= base_url('tag/') . $t->artikel_tag ?>"> <?= $t->artikel_tag ?> </a></li>
                        <?php endforeach;
                            ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end sidebar -->
    <?php endif ?>
    </div>
    </div>
    </section>
    <!--Blog area end here-->

    <!--Footer area start here-->
    <footer>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="foo-bot">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12 pd-0">
                                    <div class="logo-area">
                                        <a href="<?= base_url('home') ?>"><img src="<?= base_url('assets/mosque/') ?>images/logo/logo2.png" alt="" /></a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 pd-0">
                                    <div class="copyright text-right">
                                        <p>© Copyright 2019 by <span>Mosque</span> Made with <i class="fa fa-heart text-danger"></i> Design By <a href="#">Webstrot</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--Footer area end here-->


    <!-- all js here -->
    <!-- jquery latest version -->
    <script src="<?= base_url('assets/mosque/') ?>js/vendor/jquery-1.12.0.min.js"></script>
    <!-- tether js -->
    <script src="<?= base_url('assets/mosque/') ?>js/tether.min.js"></script>
    <!-- bootstrap js -->
    <script src="<?= base_url('assets/mosque/') ?>js/bootstrap.min.js"></script>
    <!-- owl.carousel js -->
    <script src="<?= base_url('assets/mosque/') ?>js/owl.carousel.min.js"></script>
    <!-- bxslider js -->
    <script src="<?= base_url('assets/mosque/') ?>js/jquery.bxslider.min.js"></script>
    <!-- isotope js -->
    <script src="<?= base_url('assets/mosque/') ?>js/isotope.pkgd.min.js"></script>
    <!-- magnific popup js -->
    <script src="<?= base_url('assets/mosque/') ?>js/jquery.magnific-popup.min.js"></script>
    <!-- meanmenu js -->
    <script src="<?= base_url('assets/mosque/') ?>js/jquery.meanmenu.js"></script>
    <!-- jarallax js -->
    <script src="<?= base_url('assets/mosque/') ?>js/jarallax.min.js"></script>
    <!-- jquery-ui js -->
    <script src="<?= base_url('assets/mosque/') ?>js/jquery-ui.min.js"></script>
    <!-- downCount JS -->
    <script src="<?= base_url('assets/mosque/') ?>js/jquery.downCount.js"></script>
    <!-- counterup JS -->
    <script src="<?= base_url('assets/mosque/') ?>js/jquery.counterup.min.js"></script>
    <script src="<?= base_url('assets/mosque/') ?>js/waypoints.min.js"></script>
    <!-- mixitup js -->
    <script src="<?= base_url('assets/mosque/') ?>js/jquery.mixitup.min.js"></script>
    <!-- wow js -->
    <script src="<?= base_url('assets/mosque/') ?>js/wow.min.js"></script>
    <!-- plugins js -->
    <script src="<?= base_url('assets/mosque/') ?>js/plugins.js"></script>
    <!-- main js -->
    <script src="<?= base_url('assets/mosque/') ?>js/main.js"></script>
</body>

<!-- Mirrored from www.webstrot.com/html/mosque/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Oct 2019 14:53:56 GMT -->

</html>