<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>

<form action="manager.php" method="post">
    <input type="text" name="action" value="add" hidden>
    <fieldset>
        <input id="id" type="text" name="id" placeholder="nhập id" required maxlength="5">
        <input id="name" type="text" name="name" placeholder="Tên mặt hàng" required>
        <input id="category" type="text" name="category" placeholder="Loại mặt hàng" required>
        <input id="amount" type="number" name="amount" placeholder="Số lượng" required>
        <input id="price" type="number" name="price" placeholder="Giá" required>
        <input id="description" type="text" name="description" placeholder="Mô tả" required>
        <input id="date" type="text" name="Date" placeholder="Ngày tạo" disabled required>
        <input id="img" type="text" name="img" placeholder="link" required>
        <button type="submit">Thêm</button>
    </fieldset>
</form>
<script>
    document.getElementById('date').value = '<?php echo date('d/m/o') ?>';
</script>
</body>
</html>
<?php
