<div class="margin_block2">
    <form action="index.php?module=game">
        <?php
    echo @$vis;
    ?>
        <?php
    echo '<pre>';
        echo '<img width="150" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQtrSxBC0WOXmt8dw0qM0-Osy753e7BQiwUvA&usqp=CAU">'. '                 ' . '<img width="150" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSVVyfc0fvG80VWtBkkA5nQbnmIbTyhdVb8IA&usqp=CAU">';
        echo '<br>';
        echo '        <big>' . $_SESSION ['client'] . 'ХП</big>' . '                                   <big>' . $_SESSION ['bot'] . 'ХП</big>';
        echo '<br>';
        echo '</pre>';
        ?>
        Введите число от 1-ого до 3-ёх
        <br>
        <input type="hidden" name="module" value="game">
        <input type="number" name="atack" min="1" max="3">
        <br>
        <br>
        <input type="submit" name="submit">
    </form>
</div>