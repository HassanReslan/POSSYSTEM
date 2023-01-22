<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pos";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$invoice_nb = $_GET['invoice_nb'];
$customer_id =$_GET['customer_id'];
$total =$_GET['total'];

$stock_id = $_GET['stock_id'];

$id_array = $_GET['id_array'];
$qty_array = $_GET['qty_array'];
//echo "<pre>";print_r($qty_array);exit();
$price_array = $_GET['price_array'];
$p_price_array = $_GET['p_price_array'];
$product_array = $_GET['product_array'];
$discount_array = $_GET['discount_array'];
$p_total = 0;
for($i=0;$i<count($id_array);$i++){
    $p_total = $p_total + ($p_price_array[$i]*$qty_array[$i]) ;
}

$sql = "INSERT INTO invoices (stock_id,invoice_nb,customer_id,total,p_total,date)VALUES(" . $stock_id . ",'" . $invoice_nb . "', " . $customer_id . "," . $total . "," . $p_total . ",'" . request('date') . "')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    $last_id = $conn->insert_id;
    for($i=0;$i<count($id_array);$i++){
        $sql_content = "INSERT INTO content_invoices (invoice_id,product_id,product_name,quantity,price,purchasing_price,discount)VALUES(" .$last_id . "," . $id_array[$i] . ",'" . $product_array[$i] . "'," . $qty_array[$i] . "," . $price_array[$i] . "," . $p_price_array[$i] . "," . $discount_array[$i]. ")";
        $conn->query($sql_content);

        if( $stock_id == 0 )
        {
            $edit_quantity = "UPDATE stocks set quantity= quantity - '$qty_array[$i]' WHERE product_id=" . $id_array[$i];
        }
        else{
            $edit_quantity = "UPDATE es_contents set quantity= quantity - '$qty_array[$i]' WHERE product_id=" . $id_array[$i];
        }
      
       //echo $edit_quantity;exit;
       $conn->query($edit_quantity);
    }


} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();


