<?php
include_once "product.php";
include_once "productManager.php";
include_once "data.php";

$manager = new ProductManager();
$data = loadData();
foreach ($data as $value){
    $product = new Product($value[0],$value[1],$value[2],$value[3],$value[4],$value[5],$value[6],$value[7]);
    $manager->add($product);
}

$listProduct = $manager->getListProduct();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $searchDate = $_POST['searchDate'];
    $searchDate = formatDate($searchDate);

    if ($searchDate != '//') {
        $filteredList = [];
        foreach ($listProduct as $product) {
            if ($product->getDate() == $searchDate) {
                array_push($filteredList, $product);
            }
        }
        $listProducts = $filteredList;
    }
}


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
<script>
    function confirmDelete(id) {
        let confirm = window.confirm("Bạn có chắc chắn muốn xóa không ?");
        if (confirm == true) {
            document.getElementById("deleteBtn" + id).click();
        }
    }
</script>
<table id="table1">
    <caption>
        Date created: <input type="date" name="searchDate" required>
        <button class="submitBtn" type="submit" onclick="test()">Search</button>
    </caption>
</table>
<table id="table2">
    <caption>
        <h2>Danh sách mặt hàng</h2>
        <a href="add.php"><button>Thêm</button></a>
    </caption>

    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>category</th>
        <th>Amount</th>
        <th>Price</th>
        <th>Description</th>
        <th>Date</th>
        <th>Img</th>
        <th>Action</th>
    </tr>
    <?php if (count($listProduct)): ?>
        <?php foreach ($listProduct as $product): ?>
    <tr>
        <td><?php echo $product->getId() ?></td>
        <td><?php echo $product->getName() ?></td>
        <td><?php echo $product->getCategory() ?></td>
        <td><?php echo $product->getAmount() ?></td>
        <td><?php echo $product->getPrice() ?></td>
        <td><?php echo $product->getDescription() ?></td>
        <td><?php echo $product->getDate() ?></td>
        <td><img class="image" src="<?php echo $product->getImg() ?>" alt="img"></td>
        <td>
            <form id="editForm<?php echo $product->getId(); ?>" action="edit.php" method="post"
                  style="display: inline">
                <input type="text" name="id" value="<?php echo $product->getId() ?>" hidden>
                <input type="text" name="action" value="edit" hidden>
                <button type="submit" form="editForm<?php echo $product->getId(); ?>">Edit</button>
            </form>
            <form id="deleteForm<?php echo $product->getId();?>" action="manager.php" method="post" style="display: inline">
                <input type="text" name="id" value="<?php echo $product->getId() ?>" hidden>
                <input type="text" name="action" value="delete" hidden>
                <button type="button" onclick="confirmDelete('<?php echo $product->getId();?>')">Delete</button>
                <button type="submit" form="deleteForm<?php echo $product->getId();?>" id="deleteBtn<?php echo $product->getId();?>" hidden></button>
            </form>
        </td>
    </tr>

    <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="9">No Data</td>
        </tr>
    <?php endif; ?>
</table>
<script>
    function test(){
        alert(document.getElementById('222').value)
    }
</script>
</body>
</html>
<?php
function formatDate($date)
{
    $dateFormat = explode("-", $date);
    return "$dateFormat[2]/$dateFormat[1]/$dateFormat[0]";
}
