<!DOCTYPE html>
<html lang="en">

<head>
    <title>BaTik || Bank PTIK</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('landing/') ?>fonts/icomoon/style.css" />

    <link rel="stylesheet" href="<?= base_url('landing/') ?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url('landing/') ?>css/jquery-ui.css" />
    <link rel="stylesheet" href="<?= base_url('landing/') ?>css/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?= base_url('landing/') ?>css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="<?= base_url('landing/') ?>css/owl.theme.default.min.css" />

    <link rel="stylesheet" href="<?= base_url('landing/') ?>css/jquery.fancybox.min.css" />

    <link rel="stylesheet" href="<?= base_url('landing/') ?>css/bootstrap-datepicker.css" />

    <link rel="stylesheet" href="<?= base_url('landing/') ?>fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="<?= base_url('landing/') ?>css/aos.css" />

    <link rel="stylesheet" href="<?= base_url('landing/') ?>css/style.css" />
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div class="site-wrap">
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <header class="site-navbar js-sticky-header site-navbar-target" role="banner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 col-xl-2">
                        <h1 class="mb-0 site-logo">
                            <a href="index.html" class="h2 mb-0">BaTik<span class="text-primary">.</span> </a>
                        </h1>
                    </div>

                    <div class="col-12 col-md-10 d-none d-xl-block">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                <li><a href="#home-section" class="nav-link">Home</a></li>
                                <li class="has-children">
                                    <a href="#about-section" class="nav-link">About Us</a>
                                    <ul class="dropdown">
                                        <li><a href="#about-section" class="nav-link">Bank PTIK</a></li>
                                        <li><a href="#services-section" class="nav-link">Services</a></li>
                                    </ul>
                                </li>

                                <li><a href="#blog-section" class="nav-link">Blog</a></li>
                                <li><a href="<?= base_url('auth') ?>" class="nav-link">Login</a></li>
                                <li class="social">
                                    <a href="#" class="nav-link"><span class="icon-facebook"></span></a>
                                </li>
                                <li class="social">
                                    <a href="#" class="nav-link"><span class="icon-twitter"></span></a>
                                </li>
                                <li class="social">
                                    <a href="#" class="nav-link"><span class="icon-instagram"></span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px">
                        <a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a>
                    </div>
                </div>
            </div>
        </header>

        <div class="site-blocks-cover overlay" style="background-image: url(<?= base_url('landing/') ?>images/hero_2.jpg)" data-aos="fade" id="home-section">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-10 mt-lg-5 text-center">
                        <div class="single-text owl-carousel">
                            <div class="slide">
                                <h1 class="text-uppercase" data-aos="fade-up">Banking Solutions</h1>
                                <p class="mb-5 desc" data-aos="fade-up" data-aos-delay="100">Menabung, kirim uang, bayar tagihan, mencetak bank statement hingga membuat deposito berjangka dapat dilakukan dengan aman dan mudah dari genggaman tangan.</p>
                            </div>

                            <div class="slide">
                                <h1 class="text-uppercase" data-aos="fade-up">Savings Accounts</h1>
                                <p class="mb-5 desc" data-aos="fade-up" data-aos-delay="100">
                                    Melayani lebih dari jutaan pengguna, BaTik senantiasa memberikan kemudahan dan kecepatan merespon berbagai kebutuhan nasabah dengan dukungan layanan perbankan lewat aplikasi.
                                </p>
                            </div>

                            <div class="slide">
                                <h1 class="text-uppercase" data-aos="fade-up">Layanan Online</h1>
                                <p class="mb-5 desc" data-aos="fade-up" data-aos-delay="100">Nikmati gampangnya transaksi dan segala kebutuhan finansial hanya dengan BaTik Online.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a href="#about-section" class="mouse smoothscroll">
                <span class="mouse-icon">
                    <span class="mouse-wheel"></span>
                </span>
            </a>
        </div>

        <div class="site-section cta-big-image" id="about-section">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="col-md-8 text-center">
                        <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="">About Us</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">
                        <figure class="circle-bg">
                            <img src="<?= base_url('landing/') ?>images/img_2.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid" />
                        </figure>
                    </div>
                    <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="text-black mb-4">The Safe Way to Multiply Money is to Save and Put it in PTIK Bank.</h3>

                        <p>Melayani lebih dari jutaan pengguna, BaTik senantiasa memberikan kemudahan dan kecepatan merespon berbagai kebutuhan nasabah. Terus memantapkan diri menjadi yang terdepan dalam arus perkembangan teknologi dan informasi.</p>

                        <p>Bank PTIK selalu berbenah untuk maju melalui transformasi, inovasi, keamanan data, dan sumber daya manusia yang unggul. Memberikan makna bagi kehidupan yang lebih baik.</p>
                    </div>
                </div>
            </div>
        </div>

        <section class="site-section border-bottom bg-light" id="services-section">
            <div class="container text-center">
                <div class="row mb-5">
                    <div class="col-12 text-center" data-aos="fade">
                        <h2 class="section-title mb-3">Our Services</h2>
                    </div>
                </div>
                <div class="row align-items-stretch">
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                        <div class="unit-4">
                            <div class="unit-4-icon">
                                <img src="<?= base_url('landing/') ?>images/flaticon-svg/svg/001-wallet.svg" alt="Free Website Template by Free-Template.co" class="img-fluid w-25 mb-4" />
                            </div>
                            <div>
                                <h3>Business Consulting</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="unit-4">
                            <div class="unit-4-icon">
                                <img src="<?= base_url('landing/') ?>images/flaticon-svg/svg/006-credit-card.svg" alt="Free Website Template by Free-Template.co" class="img-fluid w-25 mb-4" />
                            </div>
                            <div>
                                <h3>Credit Card</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="unit-4">
                            <div class="unit-4-icon">
                                <img src="<?= base_url('landing/') ?>images/flaticon-svg/svg/002-rich.svg" alt="Free Website Template by Free-Template.co" class="img-fluid w-25 mb-4" />
                            </div>
                            <div>
                                <h3>Income Monitoring</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="">
                        <div class="unit-4">
                            <div class="unit-4-icon">
                                <img src="<?= base_url('landing/') ?>images/flaticon-svg/svg/003-notes.svg" alt="Free Website Template by Free-Template.co" class="img-fluid w-25 mb-4" />
                            </div>
                            <div>
                                <h3>Insurance Consulting</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="unit-4">
                            <div class="unit-4-icon">
                                <img src="<?= base_url('landing/') ?>images/flaticon-svg/svg/004-cart.svg" alt="Free Website Template by Free-Template.co" class="img-fluid w-25 mb-4" />
                            </div>
                            <div>
                                <h3>Financial Investment</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="unit-4">
                            <div class="unit-4-icon">
                                <img src="<?= base_url('landing/') ?>images/flaticon-svg/svg/005-megaphone.svg" alt="Free Website Template by Free-Template.co" class="img-fluid w-25 mb-4" />
                            </div>
                            <div>
                                <h3>Financial Management</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="site-section" id="blog-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center" data-aos="fade">
                        <h2 class="section-title mb-3">Our Blog</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="">
                        <div class="h-entry">
                            <a href="single.html">
                                <img src="<?= base_url('landing/') ?>images/img_1.jpg" alt="Image" class="img-fluid" />
                            </a>
                            <h2 class="font-size-regular"><a href="#">Banking is good for business? Why?</a></h2>
                            <div class="meta mb-4">Ham Brook <span class="mx-2">&bullet;</span> Jan 18, 2019<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                            <p><a href="#">Continue Reading...</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="h-entry">
                            <a href="single.html">
                                <img src="<?= base_url('landing/') ?>images/img_4.jpg" alt="Image" class="img-fluid" />
                            </a>
                            <h2 class="font-size-regular"><a href="#">Banking is good for business? Why?</a></h2>
                            <div class="meta mb-4">James Phelps <span class="mx-2">&bullet;</span> Jan 18, 2019<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                            <p><a href="#">Continue Reading...</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="h-entry">
                            <a href="single.html">
                                <img src="<?= base_url('landing/') ?>images/img_3.jpg" alt="Image" class="img-fluid" />
                            </a>
                            <h2 class="font-size-regular"><a href="#">Banking is good for business? Why?</a></h2>
                            <div class="meta mb-4">James Phelps <span class="mx-2">&bullet;</span> Jan 18, 2019<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                            <p><a href="#">Continue Reading...</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="site-section bg-light" id="contact-section" data-aos="fade">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <h2 class="section-title mb-3">Contact Us</h2>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-4 text-center">
                        <p class="mb-4">
                            <span class="icon-room d-block h2 text-primary"></span>
                            <span>Pabelan, Sukoharjo, Jawa Tengah</span>
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <p class="mb-4">
                            <span class="icon-phone d-block h2 text-primary"></span>
                            <a href="#">081-111-222-333</a>
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <p class="mb-0">
                            <span class="icon-mail_outline d-block h2 text-primary"></span>
                            <a href="#">batikuns@gmail.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <div class="border-top pt-5">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- .site-wrap -->

    <script src="<?= base_url('landing/') ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('landing/') ?>js/jquery-ui.js"></script>
    <script src="<?= base_url('landing/') ?>js/popper.min.js"></script>
    <script src="<?= base_url('landing/') ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('landing/') ?>js/owl.carousel.min.js"></script>
    <script src="<?= base_url('landing/') ?>js/jquery.countdown.min.js"></script>
    <script src="<?= base_url('landing/') ?>js/jquery.easing.1.3.js"></script>
    <script src="<?= base_url('landing/') ?>js/aos.js"></script>
    <script src="<?= base_url('landing/') ?>js/jquery.fancybox.min.js"></script>
    <script src="<?= base_url('landing/') ?>js/jquery.sticky.js"></script>
    <script src="<?= base_url('landing/') ?>js/isotope.pkgd.min.js"></script>

    <script src="<?= base_url('landing/') ?>js/main.js"></script>
</body>

</html>