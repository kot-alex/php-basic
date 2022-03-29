<h2>Calculator</h2>
<form class="calc" action="/calc/" method="GET">
    <input type="text" name="arg1" value="<?= $arg1 ?>">
    <select name="operation">
        <option <?php if ($operation == '+') echo 'selected'; ?>>+</option>
        <option <?php if ($operation == '-') echo 'selected'; ?>>-</option>
        <option <?php if ($operation == '*') echo 'selected'; ?>>*</option>
        <option <?php if ($operation == '/') echo 'selected'; ?>>/</option>
    </select>
    <input type=" text" name="arg2" value="<?= $arg2 ?>">
    <input type="submit" value="=">
    <input readonly type="text" name="result" value="<?= $result ?>">
</form>
<br>
<form class="calc" action="/calc/" method="GET">
    <input type="text" name="arg1" value="<?= $arg1 ?>">
    <input type="text" name="arg2" value="<?= $arg2 ?>">
    <input type="submit" name="operation" value="+">
    <input type="submit" name="operation" value="-">
    <input type="submit" name="operation" value="*">
    <input type="submit" name="operation" value="/">
    <input readonly type="text" name="result" value="<?= $result ?>">
</form>