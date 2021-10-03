<div class="margin_block2">
    <?php
echo '<ul>';
    foreach ($home as $k=>$v){

    $home_elem = $dir . '/' . $v;

    if (is_dir($home_elem)) {
    $img = $img1;
    $type = '<a href="/index.php?module=program&page=main&dir=' . $dir . '/' . $v . '">' . $img . '<br>' . $v . '</a>';
    }else{
    $img = $img2;
    $type = '<p>' . $img . '<br>' . $v . '</p>';
    }
    $li = '<li>' . $type . '</li>';
    echo $li;
    }
    echo '</ul>';
    echo '</form>';
    ?>
</div>