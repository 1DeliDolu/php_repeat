<?php
    include 'classes/db.class.php';
    include 'classes/product.class.php';   
?>

<?php

    // Provide the required arguments for Product constructor
    $product = new Product();

    if(isset($_POST["deleteProduct"])) {
        $id = $_POST["productId"];

        if($product->deleteProduct($id)) {
            header('location: index.php');
        }
     }

?>
