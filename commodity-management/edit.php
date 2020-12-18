<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <fieldset>
        <legend>sửa sản phẩm</legend>
        <input type="number" name="action" value="add" hidden>
        ID:<input type="text" name="ID" placeholder="Nhap ID">
        Tên:<input type="text" name="Name" placeholder="Name">
        Loại:<input type="text" name="Category" placeholder="Category">
        Số lượng:<input type="number" name="Amount" placeholder="Amount">
        Giá:<input type="number" name="Price" placeholder="Price">
        Mô tả:<input type="text" name="Description" placeholder="Description">
        Ngày tạo:<input type="text" id="add" name="TimeCreated">
        <input type="file" name="Img">
        <button type="submit">Add</button>
    </fieldset>
</form>


</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $action = $_POST['action'];

    $id = $_POST['idEdit'];

    $product = $GLOBALS['manager']->read($id);
    if ($action == "edit") {
        $script = "<script>
                        document.getElementById('id').value = '$id';
                        document.getElementById('name').value = '$product->getName()'
                        document.getElementById('category').value = '$product->getCategory()'
                    </script>";
        echo $script;
    }
}
