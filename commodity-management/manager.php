<?php
include_once "product.php";
include_once "productManager.php";

const FILENAME = 'data.json';
$dataLoad = loadData();
$manager = new ProductManager();
if (count($dataLoad) > 0) {
    foreach ($dataLoad as $value) {
        $product = new Product($value[0], $value[1], $value[2], $value[3], $value[4], $value[5], $value[6], $value[7]);
        $manager->add($product);
    }
}

$listProducts = $manager->getProducts();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $action = $_POST['action'];

    $id = $_POST['ID'];
    $name = $_POST['Name'];
    $category = $_POST['Category'];
    $amount = $_POST['Amount'];
    $price = $_POST['Price'];
    $description = $_POST['Description'];
    $dateCreated = $_POST['H:i - j/m/Y'];
    $img = $_POST['Img'];

    $productArray = [$id,$name,$category,$amount,$price,$description,$dateCreated,$img];

    switch ($action) {
        case "add":
            if (!isExit($id)){
                addProduct($productArray);
            }
            break;
        case "edit":
            header("location:EditPage.php");
            updateProduct($id,productToArray($productArray));
            break;
        case "Delete":
            deleteProduct($id);
            break;
    }

    $dataSave = [];
    foreach ($manager->getProducts() as $value) {
        array_push($dataSave, productToArray($value));
    }
    saveData($dataSave);
    header("location:index.php");


}


function addProduct($array)
{
    $product = productToArray($array);
    $GLOBALS["manager"]->add($product);
    saveData(productToArray($product));
}

function deleteProduct($id)
{
    $GLOBALS['productManager']->delete($id);
}

function updateProduct($id, $product)
{
    $GLOBALS['productManager']->update($id, $product);
}


function productToArray($obj)
{
    return [$obj->getID(), $obj->getName(), $obj->getCategory(), $obj->getAmount(), $obj->getPrice(), $obj->getDescription(), $obj->getDateCreated(), $obj->getImg()];
}

function saveData($data)
{
    $dataJson = json_encode($data);
    file_put_contents(FILENAME,$dataJson);
}

function loadData(){
    return json_encode(file_get_contents(FILENAME),true);
}
