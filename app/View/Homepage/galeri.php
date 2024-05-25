<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="../assets/css/bootstrap-select.min.css">
<link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" href="../assets/css/magnific-popup.css">
<link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
<link rel="stylesheet" href="../assets/css/animate.css">
<link rel="stylesheet" href="../assets/css/hover-min.css">
<link rel="stylesheet" href="../assets/css/muzex-icons.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/responsive.css">
</head>
<body>
<div class="preloader">
    <div class="lds-ripple">
        <div></div>
        <div></div>
    </div>
</div><!-- /.preloader -->
<div class="page-wrapper">

    <nav class="main-nav-one stricky main-nav-one__home-three">
        <div class="container">
            <div class="inner-container">
                <div class="logo-box">
                    <a href="/">
                        <img src="../assets/img/logo-nav.png" alt="" width="143">
                    </a>
                </div><!-- /.logo-box -->
                <div class="main-nav__main-navigation">
                    <ul class="main-nav__navigation-box">
                        <li><a href="/">Beranda</a></li>
                        <li><a href="/sejarah">Sejarah</a></li>
                        <li><a href="/acara">Acara</a></li>
                        <li><a href="/galeri">Galeri</a></li>
                        <li><a href="/lokasi">Lokasi</a></li>
                    </ul><!-- /.main-nav__navigation-box -->
                </div><!-- /.main-nav__main-navigation -->
                <div class="main-nav__right">
                    <a href="#" class="side-menu__toggler"><i class="muzex-icon-menu"></i></a>
                </div><!-- /.main-nav__right -->
            </div><!-- /.inner-container -->
        </div><!-- /.container -->
    </nav><!-- /.main-nav-one -->

    <section class="page-header" style="background-image: url(../assets/img/gallery-background.png);">
        <div class="container">
            <h2>Galeri Budaya Pampang</h2>
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <section class="collection-grid">
        <div class="container">
            <div class="collection-grid__top">
                <div class="block-title-two text-center">
                    <p>Gallery</p>
                    <h3>Eksplorasi <br> Budaya Pampang</h3>
                </div><!-- /.block-title-two -->
            </div><!-- /.collection-grid__top -->

            <div class="row high-gutter filter-layout">
                <?php if ($model['galeri_list'] !== null): ?>
                    <?php foreach ($model['galeri_list'] as $galeri): ?>
                        <div class="col-lg-4 col-md-6 filter-item pic">
                            <div class="collection-grid__single">
                                <div class="collection-grid__image">
                                    <img src="/uploads/galeri/<?= htmlspecialchars($galeri->image_galeri) ?>" alt="Image" style="width: 363px; height: 363px">
                                    <a href="/galeri" class="collection-grid__link">+</a><!-- /.collection-grid__link -->
                                </div><!-- /.collection-grid__image -->
                                <div class="collection-grid__content">
                                    <h3><a href="/galeri"><?= htmlspecialchars($galeri->title_galeri) ?></a></h3>
                                    <p><?= htmlspecialchars($galeri->subtitle_galeri) ?></p>
                                </div><!-- /.collection-grid__content -->
                            </div><!-- /.collection-grid__single -->
                        </div><!-- /.col-lg-4 -->
                    <?php endforeach; ?>
                <?php endif; ?>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.collection-grid -->

    <section class="cta-one" style="background-image: url(../assets/img/shapes/cta-bg-1-1.jpg);">
        <div class="container text-center">
            <h3>Wisata Budaya Pampang</h3>
            <p>
                Desa Budaya Pampang menawarkan pengalaman unik untuk menjelajahi kekayaan budaya Dayak Kenyah. Setiap minggunya, desa ini menyajikan berbagai pertunjukan tarian tradisional, upacara adat, dan pameran kerajinan tangan yang memukau.
            </p>
            <p>
                Tidak hanya sebagai destinasi wisata, Pampang juga berfungsi sebagai pusat edukasi di mana pengunjung dapat belajar langsung tentang sejarah dan tradisi suku Dayak Kenyah. Ini adalah kesempatan langka untuk menyaksikan dan berpartisipasi dalam kegiatan budaya yang autentik dan penuh warna.
            </p>
            <div class="cta-one__btn-block">
                <a href="/" class="thm-btn cta-one__btn-one">Pelajari Lebih Lanjut</a><!-- /.thm-btn cta-one__btn-one -->
                <a href="/lokasi" class="thm-btn cta-one__btn-two">Rencanakan Kunjungan</a><!-- /.thm-btn cta-one__btn-two -->
            </div>
            <!-- /.cta-one__btn-block -->
        </div>
        <!-- /.container -->
    </section>

    <footer class="site-footer">
        <div class="site-footer__upper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-widget footer-widget__about">
                            <p>Selamat datang di Wisata Budaya Pampang, tempat di mana Anda bisa mengeksplorasi warisan budaya Kalimantan Timur yang kaya dan mempesona. Nikmati berbagai pertunjukan seni dan budaya tradisional di sini.</p>
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-2">
                        <div class="footer-widget footer-widget__links">
                            <h3 class="footer-widget__title">Tautan Cepat</h3><!-- /.footer-widget__title -->
                            <ul class="footer-widget__links-list list-unstyled">
                                <li>
                                    <a href="/sejarah">Sejarah</a>
                                </li>
                                <li>
                                    <a href="/acara">Acara</a>
                                </li>
                                <li>
                                    <a href="/galeri">Galeri Foto</a>
                                </li>
                                <li>
                                    <a href="/lokasi">Lokasi</a>
                                </li>
                            </ul><!-- /.footer-widget__links-list -->
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-lg-2 -->
                    <div class="col-lg-3">
                        <div class="footer-widget footer-widget__contact">
                            <h3 class="footer-widget__title">Kontak</h3><!-- /.footer-widget__title -->
                            <p>Desa Budaya Pampang <br>
                                Samarinda, Kalimantan Timur</p>
                            <p><a href="#">(+62) 812-3456-789</a></p>
                            <p><a href="#">info@pampangculture.com</a></p>
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-lg-3 -->
                    <div class="col-lg-3">
                        <div class="footer-widget footer-widget__open-hrs">
                            <h3 class="footer-widget__title">Jam Buka</h3><!-- /.footer-widget__title -->
                            <p>Setiap Hari: 8.30 AM–5.00 PM <br/>
                                Minggu: 11.00 AM–5.00 PM</p>
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-lg-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.site-footer__upper -->
        <div class="site-footer__bottom">
            <div class="container">
                <div class="inner-container">
                    <p>&copy; Copyright 2024 Fauzan Gifari. All Rights Reserved</p>
                    <a href="/" class="site-footer__bottom-logo">
                        <img src="../assets/img/logo-footer.png" alt="">
                    </a>
                    <div class="site-footer__bottom-links">
                        <a href="#">Syarat & Ketentuan</a>
                        <a href="#">Kebijakan Privasi & Ketentuan Penggunaan</a>
                    </div><!-- /.site-footer__bottom-links -->
                </div><!-- /.inner-container -->
            </div><!-- /.container -->
        </div><!-- /.site-footer__bottom -->
    </footer><!-- /.site-footer -->
</div><!-- /.page-wrapper -->

<div class="side-content__block">
    <div class="side-content__block-overlay custom-cursor__overlay">
        <div class="cursor"></div>
        <div class="cursor-follower"></div>
    </div><!-- /.side-content__block-overlay -->
    <div class="side-content__block-inner ">
        <a href="index.html">
            <img src="assets/images/logo-1-1.png" alt="" width="143">
        </a>
        <div class="side-content__block-about">
            <h3 class="side-content__block__title">About Us</h3><!-- /.side-content__block__title -->
            <p class="side-content__block-about__text">We must explain to you how all seds this mistakens idea off denouncing pleasures and praising pain was born and I will give you a completed accounts off the system and </p><!-- /.side-content__block-about__text -->
            <a href="#" class="thm-btn side-content__block-about__btn">Get Consultation</a>
        </div><!-- /.side-content__block-about -->
        <hr class="side-content__block-line" />
        <div class="side-content__block-contact">
            <h3 class="side-content__block__title">Contact Us</h3><!-- /.side-content__block__title -->
            <ul class="side-content__block-contact__list">
                <li class="side-content__block-contact__list-item">
                    <i class="fa fa-map-marker"></i>
                    Rock St 12, Newyork City, USA
                </li><!-- /.side-content__block-contact__list-item -->
                <li class="side-content__block-contact__list-item">
                    <i class="fa fa-phone"></i>
                    <a href="tel:526-236-895-4732">(526) 236-895-4732</a>
                </li><!-- /.side-content__block-contact__list-item -->
                <li class="side-content__block-contact__list-item">
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:example@mail.com">example@mail.com</a>
                </li><!-- /.side-content__block-contact__list-item -->
                <li class="side-content__block-contact__list-item">
                    <i class="fa fa-clock"></i>
                    Week Days: 09.00 to 18.00 Sunday: Closed
                </li><!-- /.side-content__block-contact__list-item -->
            </ul><!-- /.side-content__block-contact__list -->
        </div><!-- /.side-content__block-contact -->
        <p class="side-content__block__text site-footer__copy-text"><a href="#">Muzex</a> <i class="fa fa-copyright"></i> 2020 All Right Reserved</p>
    </div><!-- /.side-content__block-inner -->
</div><!-- /.side-content__block -->

<div class="side-menu__block">

    <a href="#" class="side-menu__toggler side-menu__close-btn"><i class="fa fa-times"></i>
        <!-- /.fa fa-close --></a>

    <div class="side-menu__block-overlay custom-cursor__overlay">
        <div class="cursor"></div>
        <div class="cursor-follower"></div>
    </div><!-- /.side-menu__block-overlay -->
    <div class="side-menu__block-inner ">

        <a href="index.html" class="side-menu__logo"><img src="assets/images/logo-light-1-1.png" alt="" width="143"></a>
        <nav class="mobile-nav__container">
            <!-- content is loading via js -->
        </nav>
        <p class="side-menu__block__copy">(c) 2024 <a href="https://fauzangifari.com/" target="_blank">Fauzan Gifari</a> - All rights reserved.</p>
    </div><!-- /.side-menu__block-inner -->
</div><!-- /.side-menu__block -->

<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/bootstrap-datepicker.min.js"></script>
<script src="../assets/js/bootstrap-select.min.js"></script>
<script src="../assets/js/isotope.js"></script>
<script src="../assets/js/jquery.ajaxchimp.min.js"></script>
<script src="../assets/js/jquery.counterup.min.js"></script>
<script src="../assets/js/jquery.magnific-popup.min.js"></script>
<script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="../assets/js/jquery.validate.min.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/TweenMax.min.js"></script>
<script src="../assets/js/waypoints.min.js"></script>
<script src="../assets/js/wow.min.js"></script>
<script src="../assets/js/jquery.lettering.min.js"></script>
<script src="../assets/js/jquery.circleType.js"></script>

<!-- Custom Scripts -->
<script src="../assets/js/theme.js"></script>