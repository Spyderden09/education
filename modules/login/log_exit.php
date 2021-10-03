<?php
session_unset();
session_destroy();

setcookie('login','',time()-3600,'/');
setcookie('id','',time()-3600,'/');
setcookie('hash','',time()-3600,'/');
setcookie('aa','',time()-3600,'/');

header("Location: /");
exit();