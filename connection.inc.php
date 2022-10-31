<?php 
    session_start();
    $con=mysqli_connect("localhost","root","","ecommerce");
    define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/ecom/');
    define('SITE_PATH','http://localhost/ecom/');

    define('PRODUCT_IMAGE_SERVER_PATH','media/product/');
    define('PRODUCT_IMAGE_SITE_PATH','media/product/');


    


?>    