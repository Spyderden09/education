<div class="search_users">
<div class="clearfix">
    <br>
    <form action="/admin/search" method="post">
        <input type="text" name="search" placeholder="Искать пользователей" class="search_input">
        <br>
        <input type="submit" value="🔎" class="search_sub">
    </form>
    <br>
    <div>
        <?php
        if(isset($_POST['search'])) {
            if (isset($search, $search_arr) && $search != 'Ничего не найдено') {
                    echo $search;
            } elseif ($search == 'Ничего не найдено') {
                echo $search;
            }
        }
        ?>
    </div>
</div>
</div>