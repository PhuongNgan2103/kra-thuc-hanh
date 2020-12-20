<?php
include_once "product.php";
include_once "productManager.php";
include_once "data.php";

const ACTION_ADD = 'add';
const ACTION_EDIT = 'edit';
const ACTION_DELETE = 'delete';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_POST['action'];
    $id = $_POST['id'];

    $manager = new ProductManager();
    $data = loadData();
    foreach ($data as $value){
        $manager->add(arrayToObj($value));
    }

    $manager = new ProductManager();
    $product = new Product($_POST['id'],$_POST['name'],$_POST['category'],$_POST['amount'],$_POST['price'],$_POST['description'],$_POST['Date'],$_POST['img']);


    switch ($action){
        case ACTION_ADD:
            addProduct($product);
            break;
        case ACTION_DELETE:
            deleteProduct(getIndexById($id));
            break;
        case ACTION_EDIT:
            $product->setDate($_POST['date']);
            editProduct(getIndexById($_POST['idOld']), $product);
            break;
    }
}
function addProduct($product){
$GLOBALS['manager']->add($product);
saveData(objToArray($product));
}

function editProduct($index, $product){
    $listProducts = $GLOBALS['manager']->listProduct();
    $data = [];
    $listProducts[$index] = $product;
    foreach ($listProducts as $product) {
        array_push($data, objToArray($product));
    }
    saveData($data, true);
}
function deleteProduct($index){
    $GLOBALS['manager']->delete($index);
    $data = [];
    $listProducts = $GLOBALS['manager']->listProduct();
    foreach ($listProducts as $product) {
        array_push($data, objToArray($product));
    }
    saveData($data,true);
}

function getIndexById($id){
    $listProducts = $GLOBALS['manager']->listProduct();
    foreach ($listProducts as $key=>$value){
        if ($value->getId() == $id){
            return $key;
        }
    }
    return -1;
}

function getListProducts(){
    $list = [];
    $data = loadData();
    foreach ($data as $value){
        array_push($list, arrayToObj($value));
    }
    return $list;
}