<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>ระบบประเมินผลการปฏิบัติงานบุคลากร</title>
        <?php require_once("layouts/header_asset.php"); ?>
    </head>
    <body>
        <?php require_once("layouts/header.php"); ?>
        <!-- Icons Grid -->
        <section class="bg-light" style="padding-top: 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="prompt-400 text-primary"><i class="fa fa-comments" aria-hidden="true"></i> ข่าวสาร/ประชาสัมพันธ์</h3>
                        
                            <?php include('news_list_index.php'); ?>
                            <p align="right">
                                <a href="news.php?p=all" class="btn btn-primary btn-sm pull-right">แสดงทั้งหมด</a>
                            </p>
                        
                    </div>
                </div>
            </div>
        </section>
        <?php require_once("layouts/footer.php"); ?>
    </body>
</html>