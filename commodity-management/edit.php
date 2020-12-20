<?php
include_once "data.php";
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
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>

<form action="manager.php" method="post">
    <input type="text" name="action" value="update" hidden>
    <input type="text" name="idOld" value="<?php echo $_POST['id']; ?>" hidden>
    <fieldset>
        <input id="id" type="text" name="id" placeholder="nhập id" required maxlength="5">
        <input id="name" type="text" name="name" placeholder="Tên mặt hàng" required>
        <input id="category" type="text" name="category" placeholder="Loại mặt hàng" required>
        <input id="amount" type="number" name="amount" placeholder="Số lượng" required>
        <input id="price" type="number" name="price" placeholder="Giá" required>
        <input id="description" type="text" name="description" placeholder="Mô tả" required>
        <input id="date" type="text" name="Date" placeholder="Ngày tạo" disabled required>
        <input id="img" type="text" name="img" placeholder="link" required>
        <button type="submit">Sửa</button>
    </fieldset>
</form>
<script>
    document.getElementById('date').value = '<?php echo date('d/m/o') ?>';
</script>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $id = $_POST['id'];
    $editProduct = null;

    if($action = "edit"){
        $manager = new ProductManager();
        $data = loadData();
        foreach ($data as $value){
            $manager->add(arrayToObj($value));
        }

        foreach ($manager->getListProduct() as $product){
            if ($product->getId() == $id){
                $editProduct = $product;
            }
        }

        $name = $editProduct->getName();
        $category = $editProduct->getCategory();
        $amount = $editProduct->getAmount();
        $price = $editProduct->getPrice();
        $description = $editProduct->getDescription();
        $date = $editProduct->getDate();
        $img = $editProduct->getImg();

        $script = "<script>
            document.getElementById('id').value = '$id';
            document.getElementById('name').value = '$name';
            document.getElementById('category').value = '$category';
            document.getElementById('amount').value = '$amount';
            document.getElementById('price').value = '$price';
            document.getElementById('description').value = '$description';
            document.getElementById('date').value = '$date';
            document.getElementById('img').value = '$img';
        </script>";
        echo $script;
    }
}