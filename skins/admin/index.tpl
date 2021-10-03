
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo @$title; ?></title>
    <meta name="description" content="<?php hscALL(Core::$META['description']);?>" />
    <meta name="keywords" content="<?php hscALL(Core::$META['keywords']);?>" />
    <title>Template</title>
    <link href="/skins/default/normalize.css" rel="stylesheet">
    <link rel="shortcut icon" href="/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/skins/default/sprite.css" />
    <link rel="stylesheet" href="/skins/admin/admin_style.css?r=<?=rand(1,99999999);?>">
    <?php if (count(Core::$CSS)){echo implode("\n",Core::$CSS);}?>
    <?php if (count(Core::$JS)){echo implode("\n",Core::$JS);}?>
</head>
<body>
<div id="header">
    <div class="a_block">
        <div class="pse_a_block">
            <div class="margin_block">
                <div class="mini_a_block">
                    <div class="clearfix">
                        <div class="a_img">
                            <a href="/">
                                <img src="/images/logo_admin.png">
                            </a>
                        </div>
                        <div class="a_butt">
                            <div class="clearfix">
                                <a href="/admin" class="a_2">Home</a>
                                <?php
                                if (isset($_SESSION['user']) && $_SESSION['user'] ['access'] == 2){?>
                                    <a href="/admin/catalog" class="a_3">Catalog</a>
                                    <?php } ?>
                                <?php
                                if (isset($_SESSION['user']) && $_SESSION['user'] ['access'] == 2){?>
                                    <a href="/admin/search" class="a_3">Search</a>
                                <?php }
                                if (isset($_SESSION['user']) && $_SESSION['user'] ['access'] == 2){?>
                                    <a href="/admin/managing" class="a_3">Managing</a>
                                <?php } ?>
                                <a href="/admin/library" class="a_4">Library</a>
                            </div>
                        </div>
                        <div class="search">
                            <div class="search-icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="content">
    <?php echo $content; ?>
</div>

<div id="footer">
    <div class="view_footer">
        <br>
        <div class="cont_line"></div>
        <div class="cont_end">&copy; 2020<a href="#" class="a_cont"> Edemy</a>. All Rights Reserved.</div>
    </div>
</div>

</body>

</html>


