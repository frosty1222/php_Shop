<?php
    session_start();
    require_once('mvc/Views/connect/connect.php');
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $quantity = !empty($_GET['quantity']) ? (int)$_GET['quantity'] : 1;
    $action = !empty($_GET['action']) ? $_GET['action'] : 'cart';
    $query = $db2->query("SELECT * FROM product WHERE id = $id");
    $query3 = $db2->query("SELECT * FROM cart WHERE product_id = $id");
    $pro = $query->fetch_object();
    $pro3 = $query3->fetch_object();
    $query2 = $db2->query("SELECT * FROM pro_image WHERE id ='$pro3->images'"); 
    $pro2 = $query2->fetch_object();
    // echo '<pre/>';
    // print_r($pro);
    // die();
    if($pro && $action == 'cart') {
      if(isset($_SESSION['item2'][$id])) {
        $_SESSION['item2'][$id]['quantity'] +=$quantity;
      } else {
        $item = [
            'id' => $pro3->product_id,
            'name' => $pro->name,
            'images'=>$pro2->images ? $pro2->images : $pro->image,
            'color'=>$pro3->color,
            'size' => $pro3->size,
            'price' => $pro->sale_price ? $pro->sale_price : $pro->price,
            'quantity' =>$quantity,
          ];
          $_SESSION['item2'][$id] = $item;
      }
    }
      if($action =='cart_delete'){
        if(isset($_SESSION['item2'][$id])){
          unset($_SESSION['item2'][$id]);
        }
      }
      if($action == 'cart_update') {
        $quantity = $quantity >= 1 ? $quantity : 1;
        if(isset($_SESSION['item2'][$id])) {
         $_SESSION['item2'][$id]['quantity'] += $quantity;
        }
      }
      
      if ($action == 'cart_clear') {
        if (isset($_SESSION['item2'])) {
          unset($_SESSION['item2']);
        }
      }
    header("location:item.html");
?>