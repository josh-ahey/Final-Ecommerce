<?php

include 'toys.php';
require_once './Twig/Autoloader.php';

session_start();

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('./template');//the template folder
$twig = new Twig_Environment($loader);


$toy = new toys();
$i = 0;
////$qty[] = null;
$tid = null;
$total = 0;
////
if (isset($_GET['toy_id'])) {

    $tid = $_GET['toy_id'];

    if (!isset($_SESSION['cart'][$tid])) {

        $cc = $toy->getDetails($tid);
        $addItem = $cc->fetch_array(MYSQLI_ASSOC);

        $_SESSION['cart'][$tid] = [
            'item' => $addItem['toy_id'],
            'toy_name' => $addItem['toy_name'],
            'toy_Type' => $addItem['toy_type'],
            'quantity' => 1,
            'price' => $addItem['price'],
            'total' => $addItem['price']
        ];
    }
}

if (isset($_GET['id']) && isset($_GET['action'])) {

    if (isset($_GET['action'])) {
        $someAction = $_GET['action'];
        $id = $_GET['id'];

        switch ($someAction) {

            case 'add':
                $_SESSION['cart'][$id]['quantity']++;
                $cc = $toy->getDetails($id);
                $addItem = $cc->fetch_array(MYSQLI_ASSOC);

                $_SESSION['cart'][$id] = [
                    'item' => $addItem['toy_Id'],
                    'toy_name' => $addItem['toy_name'],
                    'toy_Type' => $addItem['toy_type'],
                    'quantity' => $_SESSION['cart'][$id]['quantity'],
                    'price' => $addItem['price'],
                    'total' => $addItem['price'] * $_SESSION['cart'][$id]['quantity']
                ];
//                echo "end at break";
                break;

            case 'subtract':
                $_SESSION['cart'][$id]['quantity']--;
                $cc = $toy->getDetails($id);
                $addItem = $cc->fetch_array(MYSQLI_ASSOC);

                $_SESSION['cart'][$id] = [
                    'item' => $addItem['toy_Id'],
                    'toy_name' => $addItem['toy_name'],
                    'toy_Type' => $addItem['toy_type'],
                    'quantity' => $_SESSION['cart'][$id]['quantity'],
                    'price' => $addItem['price'],
                    'total' => $addItem['price'] * $_SESSION['cart'][$id]['quantity']
                ];

                if($_SESSION['cart'][$id]['quantity']<= 0){
                    unset($_SESSION['cart'][$id]);
                }
                break;

            case 'clear':
                unset($_SESSION['cart']);
                break;

            case 'remove':
                unset($_SESSION['cart'][$id]);
                break;
        }
    }
}

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {

    foreach ($_SESSION['cart'] as $toy_id => $details) {
        $total += $_SESSION['cart'][$toy_id]['total'];
    }
}

$numPerPage = 10;
////
if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else {
    $page = 1;
}
//
$start_from = ($page - 1) * $numPerPage;
//
$toy = new toys();
////$admin = new admin();

    $all = $toy->showToys($start_from, $numPerPage);
    $ar = $all->fetch_all(MYSQLI_ASSOC);
    $totalNumRows = $toy->countToy();
    $total_toys = $totalNumRows['toy_Id'];

    $total_pages = ceil($totalNumRows / $numPerPage);

    
    $i = 0;

    $allData['alltoys'] = $ar;

    /** @var array $data */
    echo $twig->render('showcart.tpl', [
        'alltoys' => $ar,
        'total_toys' => $total_toys,
        'page' => $page,
        'total_pages' => $total_pages,
        'carts' => isset($_SESSION['cart']) ? $_SESSION['cart'] : '',
        'total' => $total
    ]);


//print_r("echo");
//print_r($_SESSION['cart']);
//unset($_SESSION['cart']);
//session_destroy();
