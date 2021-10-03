<?php
     if (!isset($_SESSION['user']) || $_SESSION['user'] ['access'] == 5){
             if ($_GET['module'] != 'static' || $_GET['page'] != 'main') {
                 header("Location: /admin/static/main");
                 exit();
             }
     }else{
         if ($_SESSION['user'] ['active'] == 2 && $_GET['page'] != 'log_exit'){
             header("Location: /login/log_exit");
             exit();
         }
     }
