<header class="header-section" id="header-section">

    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 d-flex justify-content-start reunir-content-center">
                    <div class="header-left">
                        <ul>
                            <li class="header-left-list">
                                <p class="header-left-text">
                                    <span class="header-left-icon">
                                        <i class="icofont-headphone-alt"></i> </span>Support
                                </p>
                            </li>
                            <li class="header-left-list">
                                <p class="header-left-text">
                                    <span class="header-left-icon">
                                        <i class="icofont-email"></i> </span>admin@kpbladababel.com
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 d-flex justify-content-end reunir-content-center">
                    <div class="header-right">
                        <ul>
                            <li class="header-right-list">
                                <div class="dropdown show header-dropdown header-right-text">
                                    <span class="header-left-icon"><i class="icofont-web"></i></span>
                                    <select class="selectpicker" name="languages" id="op_lang" tabindex="-98">
                                        <!-- <option value="">English</option> -->
                                        <option value="1" href="#in" id='lang_in'>Indonesia</option>
                                        <option value="2" href="#en" id='lang_en'>English</option>
                                    </select>
                                </div>
                                <script>
                                    $(document).ready(function() {

                                        var lang_in = $('#lang_in');
                                        var lang_en = $('#lang_en');
                                        var op_lang = $('#op_lang');
                                        <?php if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') { ?>
                                            op_lang.val('2')
                                        <?php } else { ?>
                                            op_lang.val('1')
                                        <?php } ?>
                                        op_lang.on('change', function() {
                                            console.log(op_lang.val())
                                            if (op_lang.val() == '1') {
                                                to_indonesia()
                                            } else {
                                                to_english()
                                            }
                                        })

                                        function to_indonesia() {
                                            document.cookie = "lang_set=in";
                                            location.reload();
                                        };

                                        function to_english() {
                                            document.cookie = "lang_set=en";
                                            location.reload();
                                        };
                                    });
                                </script>
                            </li>
                            <!-- <li class="header-right-list">
                                <p class="header-right-text">
                                    <span class="header-right-icon carticon"><i class="icofont-shopping-cart"></i></span>My cart (0)
                                </p>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- nav top begin -->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light reunir-navbar">
        <div class="container">
            <div class="logo-section">
                <a class="logo-title navbar-brand" href="<?= base_url('') ?>"><img src="<?= base_url('assets/') ?>img/logo-kpb.png" alt="logo" />KPB-LADA</a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icofont-navigation-menu"></i>
            </button>
            <div class="collapse navbar-collapse nav-main justify-content-end" id="navbarNav">
                <ul class="navbar-nav" id="primary-menu">
                    <li class="nav-item active">
                        <a class="nav-link active" href="<?= base_url('') ?>#header-section">HOME
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about-section"><?php if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {
                                                                        echo "ABOUT";
                                                                    } else {
                                                                        echo "TENTANG KITA";
                                                                    } ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#affiliate-section"><?php if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {
                                                                            echo "PRODUCT";
                                                                        } else {
                                                                            echo "PRODUK";
                                                                        } ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#investment-section"><?php if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {
                                                                            echo "NEWS";
                                                                        } else {
                                                                            echo "BERITA";
                                                                        } ?></a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">BLOG</a>
                    </li> -->

                    <!-- <li class="nav-item dropdown mr-1">
                        <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            TRADING
                        </a>
                        <ul class="dropdown-menu mr-1" style="background: #1c1646;">
                            <li class="nav-item"><a class='nav-link dropdown-item' style="width: 200px" href="http://mpms.kpbladababel.com/trading">PASAR BURSA LADA</a></li>
                            <li class="nav-item"> <a class='nav-link dropdown-item' style="width: 200px" href="http://pss.kpbladababel.com">SHIPPING & LAPORAN</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="#contact-us-section"><?php if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {
                                                                            echo "CONTACT";
                                                                        } else {
                                                                            echo "KONTAK";
                                                                        } ?></a>
                    </li>


                </ul>
            </div>
            <div class="right-side-box">
                <a class="join-btn" href="<?= site_url('login') ?>">SIM KPB</a>
            </div>
        </div>
    </nav>
    <!-- nav top end -->
</header>