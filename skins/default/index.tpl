
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
    <link rel="stylesheet" href="/skins/default/temp_style.css?r=<?=rand(1,99999999);?>">
    <script type="text/javascript" src="/skins/js/scripts_v1_8.js?v=<?=rand(1,999999);?>"></script>
    <script type="text/javascript" src="/skins/js/chat_scripts_v1_1.js?v=<?=rand(1,999999);?>"></script>
    <script type="text/javascript" src="/skins/js/components/jquery-3.6.0.min.js"></script>
    <?php if (count(Core::$CSS)){echo implode("\n",Core::$CSS);}?>
    <?php if (count(Core::$JS)){echo implode("\n",Core::$JS);}?>
</head>
<body>
<div id="header">
    <div class="start_a">
        <div class="margin_block">
            <div class="clearfix">
                <div class="start-a_block2">
                    <?php
                    if (isset($_SESSION['user'])){
                        ?>
                        <a href="/ed_profile" class="a_profile">PROFILE</a>
                        <?php
                    }
                    if (isset($_SESSION['user']) && $_SESSION['user'] ['access'] == 2){
                    ?>
                    <a href="/admin" class="a_admin">ADMIN</a>
                    <?php
                        }
                        if (isset($_SESSION['user'])){
                    ?>
                    <a href="/login/log_exit" class="a_exit">EXIT</a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="a_block">
        <div class="pse_a_block">
            <div class="margin_block">
                <div class="mini_a_block">
                    <div class="clearfix">
                        <div class="a_img">
                            <a href="/">
                                <img src="http://theme.bitspecksolutions.com/html-template/edemy/demo/images/logo.png">
                            </a>
                        </div>
                        <div class="a_butt">
                            <div class="clearfix">
                                <div class="a-1">
                                    Home
                                    <div class="drop-list">
                                        <a href="/login" class="drop-a">Register</a>
                                        <a href="/game" class="drop-a">Game</a>
                                        <a href="/program" class="drop-a">File Meneger</a>
                                        <a href="/calc" class="drop-a">Calc</a>
                                    </div>
                                </div>
                                <a href="/" class="a_2">To home</a>
                                <?php if (!isset($_SESSION['user'])) {?>




                                <a class="a_2_2" onmousedown="hideShow('auth');hideShow('darkV')">Log in</a>
                                <div id="darkV" class="dark-veil"></div>




                                <?php
                                include './skins/default/login/login.tpl';
                                }
                                if (isset($_SESSION['user']) && ($_SESSION['user'] ['access'] == 1 || $_SESSION['user'] ['access'] == 2)){?>
                                    <a href="/catalog" class="a_4">Catalog</a>
                                    <?php
                                }
                                if (isset($_SESSION['user']) || isset($_COOKIE['aa'],$_COOKIE['pass'], $_COOKIE['login'])) {?>
                                    <a href="/comments" class="a_4">Comments</a>
                                <?php }
                                if (isset($_SESSION['user']) && ($_SESSION['user'] ['access'] == 1 || $_SESSION['user'] ['access'] == 2)){?>
                                <a href="/library" class="a_4">Library</a>
                                <?php
                                }?>
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
        <div class="cont_end">&copy; 2020<a href="#" class="a_cont"> Edemy</a>. All Rights Reserved. <a href=""></a></div>
    </div>
</div>

</body>

</html>


