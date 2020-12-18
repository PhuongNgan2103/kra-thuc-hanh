<?php
include_once "manager.php";
include_once "product.php";
include_once "productManager.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    table {
        width: 100%;
        border: black solid;
        background-color: dodgerblue;
        border-collapse: collapse;
    }
</style>
<body>
<form method="post">
    <fieldset>
        <legend>Thêm sản phẩm</legend>
        <input type="text" name="action" value="add" hidden>
        ID:<input type="text" name="ID" placeholder="Nhap ID">
        Tên:<input type="text" name="Name" placeholder="Name">
        Loại:<input type="text" name="Category" placeholder="Category">
        Số lượng:<input type="number" name="Amount" placeholder="Amount">
        Giá:<input type="number" name="Price" placeholder="Price">
        Mô tả:<input type="text" name="Description" placeholder="Description">
        Ngày tạo:<input type="text" id="now" name="TimeCreated">
        <input type="file" name="Img">
        <button type="submit">Add</button>
    </fieldset>
</form>

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
        <button type="submit">Edit</button>
    </fieldset>
</form>

<table>
    <caption><h2>Danh sách sản phẩm</h2></caption>
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Loại</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Mô tả</th>
        <th>Ngày tạo</th>
        <th>Ảnh</th>
    </tr>
    <?php foreach ($GLOBALS['listProducts'] as $key => $product): ?>
        <tr>
            <td><?php echo $product ?></td>
            <td><?php echo $product->getId() ?></td>
            <td><?php echo $product->getName() ?></td>
            <td><?php echo $product->getCategory() ?></td>
            <td><?php echo $product->getAmount() ?></td>
            <td><?php echo $product->getPrice() ?></td>
            <td><?php echo $product->getDescription() ?></td>
            <td><?php echo $product->getDateCreated() ?></td>
            <td><?php echo $product->getImg() ?></td>
            <td>
                <form action="edit.php" method="post">
                    <button>Edit</button>
                </form></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
<?php
$today = date("H:i:s j:m:Y");
$script = "<script>document.getElementById('now').value = '$today'</script>";
?>
