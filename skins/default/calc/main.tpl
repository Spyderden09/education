<br>
<form action="/admin/calc">
    <input type="text" name="a">
    <select name="act">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="text" name="b">
    <input type="submit" value="Считать">
</form>
<br>
<?php if (isset($_GET['a'],$_GET['b'],$_GET['act'])){echo calc($_GET['a'],$_GET['b'],$_GET['act']);} ?>