<?php

include 'toys.php';
require_once './Twig/Autoloader.php';
Twig_Autoloader::register();

$loader= new Twig_Loader_Filesystem('./template');
$twig = new Twig_Environment($loader);


$num_per_page = 5;
if(isset($_REQUEST['page'])){
    $page=$_REQUEST['page'];
}
else{
    $page = 1;
}

$start_page=($page-1)*$num_per_page;

$obj= new toys();

$x=$obj->all_air($start_page, $num_per_page);

    $total_rows= $obj->count_air();
//echo $total_rows;
    $total_toys= $total_rows['toy_id'];
    $total_pages = ceil($total_rows/$num_per_page);
    $f=$x->fetch_all(MYSQLI_ASSOC);
    
    $data['allair'] = $f;


echo $twig->render('displayair.tpl', [
    'allair' => $f,
    'total_toys' =>$total_toys,
    'total_pages' =>$total_pages,
    'page' =>$page
]);


?>