
<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="<?= $SITE_URL ?>assets/img/logo/logo1.png" height="50" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto prompt-400">

                <?php if (isset($_SESSION['MM_Username']) && $_SESSION['MM_Username'] != '') { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $SITE_URL ?>logout.php">ออกจากระบบ </a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= $SITE_URL ?>index.php">หน้าแรก
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $SITE_URL ?>news.php?p=all">ข่าวสาร</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $SITE_URL ?>contact.php">คำร้อง</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $SITE_URL ?>login.php">เข้าสู่ระบบ</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead -->
<header class="masthead text-center">
    <div class="overlay" style="background-image: url('<?= $SITE_URL ?>assets/img/cover.jpg');background-repeat: no-repeat;background-position: center; "></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto text-primary">
                <h1 class="prompt-500"><span class="bg-white" style="padding: 0px 5px;">ระบบประเมินผลการปฏิบัติงานบุคลากร</span></h1>
                <h2 class="prompt-500" style="margin-top: 25px;"><span class="bg-white" style="padding: 0px 5px;">สำนักส่งเสริมวิชาการและงานทะเบียน มหาวิทยาลัยสวนดุสิต</span></h2>
            </div>

        </div>
    </div>
</header>