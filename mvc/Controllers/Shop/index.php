<?php
if(isset($_GET['action'])){
    $action = $_GET['action'];
}
else{
    $action = '';
}
$thanhcong = array();

switch($action){
    case 'product':{
            // $tblTable ="product";
            // $data = $db->getAllData($tblTable);
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
            $sum = $db->CountMember();
            $pages = $sum / 3;
            if (empty($keyword)) {
                $data = $db->getProduct();
            } elseif (!empty($keyword)) {
                $data = $db->searchMember($keyword);
            } else {
                $data = $db->getProduct();
            }
            //   echo '<pre/>';
            //   print_r($c);
            //   die();
            $getavatar = $db1->getavatar();
        require_once('mvc/Views/product.php');
        break;
    }
    case 'add':{
        if(isset($_POST['add'])){
                $name = $_POST['name'];
                $sale_price = $_POST['sale_price'];
                $price = $_POST['price'];
                $category_id = $_POST['category_id'];
                if(isset($_FILES['image'])){
                    $file = $_FILES['image'];
                    $file_name = $file['name'];
                    if($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] == 'image/png' || $file['type'] =='image/jfif'){
                        move_uploaded_file($file['tmp_name'],'uploads/'.$file_name);
                    }
                    else{
                        echo 'image is wrong type';
                        $file_name= '';
                    }
                }
                if (isset($_FILES['images'])) {
                    $files = $_FILES['images'];
                    $file_names = $files['name'];
                    // echo '<pre/>';
                    // var_dump($file_names);
                    // die();
                    foreach ($file_names as $key=> $fil) {
                        if ($files['type'] == 'image/jpeg' || $files['type'] == 'image/jpg' || $files['type'] == 'image/png' || $files['type'] == 'image/jfif') {
                            move_uploaded_file($files['tmp_name'][$key], 'uploads/'.$fil);
                        }
                    }
                }
                $db->InsertData($name, $price, "uploads/".$file_name, $sale_price, $category_id);
                $product_id =$db->insert_id();
                
                // if($product_id){
                //     foreach($file_names as $key=>$values){
                //        $db->add_image("uploads/".$values,$product_id);
                //     }
                //     //  echo '<pre/>';
                //     //  var_dump($db->add_image($values,$product_id));
                //     // die();
                // }else{
                //     echo 'false';
                // }
               }
              
            $data = $db->getCategory();
            $getavatar = $db1->getavatar();
            require_once('mvc/Views/CRUD/Add_product.php');
            break;
        }
    case 'edit':{
        session_start();
            if (isset($_SESSION['item2'])) {
                $a = $_SESSION['item2'];
            }
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $dataID = $db->editDATA($id);
            $data = $db->editDATA2($id);
            if(isset($_POST['edit'])){
                $name = $_POST['name'];
                $price = $_POST['price'];
                $sale_price = $_POST['sale_price'];
                $category_id = $_POST['category_id'];
                    if (isset($_FILES['image'])) {
                        $file = $_FILES['image'];
                        $target_dir = "uploads/";
                        // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                        $file_name =$target_dir .basename($file['name']);
                        if ($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] =='image/png') {
                            move_uploaded_file($file['tmp_name'],$file_name);
                        } else {
                            echo 'image is wrong type';
                            $file_name = '';
                        }
                     $db->UpdateData($id,$name,$price,$file_name,$sale_price,$category_id);
                    }
                    if (isset($_FILES['images'])) {
                        $files = $_FILES['images'];
                        $target_dir = "uploads/";
                        $file_names = $files['name'];
                        // echo '<pre/>';
                        // var_dump($file_names);
                        // die();
                        foreach ($file_names as $key => $fil) {
                            if ($files['type'] == 'image/jpeg' || $files['type'] == 'image/jpg' || $files['type'] == 'image/png' || $files['type'] == 'image/jfif') {
                                move_uploaded_file($files['tmp_name'][$key], 'uploads/'.$fil);
                            }
                              $product_id =$_GET['id'];
                              $product_id = $_POST['product_id'];
                              foreach($file_names as $key => $value){
                                  if(!$data){
                                     $db->add_image("uploads/".$value, $product_id);
                                  }else{
                                       $db->updateProduct_image($id,'uploads/'.$value,$product_id);
                                  }
                                   
                              }
                        }
                    // echo '<pre/>';
                    // print_r($product_id);
                    // die();
                    }
            }  
        }
            require_once('mvc/Views/CRUD/edit.php');
            break;
    }
    case 'delete1': {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $tblTable = "product";
            if($db->DeleteData($id,$tblTable)){
                header('location:list.html');
            }
        }else{
            $a = 'delete is not successful';
        }
            // require_once('mvc/Views/CRUD/list.php');
            break;
    }
    case 'list': {
    $keyword= isset($_GET['keyword']) ? $_GET['keyword'] : '';
    $sum = $db->CountMemberlist(); 
    $pages = $sum / 6;
    if(empty($keyword)){
        $data = $db->getProductlist();
    }elseif(!empty($keyword)){
        $data = $db->searchMember($keyword);
    }else{
        $data = $db->getProductlist();
    }
            $getavatar = $db1->getavatar();
            require_once('mvc/Views/CRUD/list.php');
            break;
    }
    case 'register': {
            session_start();
            if (isset($_SESSION['item2'])) {
                $a = $_SESSION['item2'];
            }
            if(isset($_POST['Register']) && $_POST['name'] != '' && $_POST['phone'] != '' && $_POST['email'] != '' && $_POST['address'] != ''
                && $_POST['pass'] != '' && $_POST['re_pass'] != ''
            ) {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $pass = $_POST['pass'];
                $re_pass = $_POST['re_pass'];
                  if($pass != $re_pass){ 
                    header('location:register.html');
                  }
                    $db->RegisterData($name);
                    $pass = md5($pass);
                    if(mysqli_num_rows($db->RegisterData($name)) > 0) {
                        header('location:register.html');
                    }
                    $db->insertUser($name, $email, $phone, $address, $pass, $re_pass);
                    echo 'registered successfully';
                }else{
                    echo 'failed to register';
                }
            require_once('mvc/Views/user/register.php');
            break;
    }
    case 'login': {
        session_start();
        if(!isset($_SESSION['number_log'])) {
            $_SESSION['number_log']=0;
        }
        else{
             $_SESSION['number_log'] += 1;
        }
        if (isset($_POST["lg"]) && $_POST['name'] != '' && $_POST['pass'] != '') {
            // echo"<pre>";
            // print_r($_POST);
            // die;
            $name = $_POST['name'];
            $pass = $_POST['pass'];
            $pass = md5($_POST['pass']); 
            if(isset($_POST['remember'])){
                $_COOKIE['name'] = $name;
                $_COOKIE['pass'] = $pass;
                setcookie("name",$name,time() + (86400 *30),"/");//;
                setcookie("pass",$_POST['pass'],time() + (86400 * 30), "/" );//
            }

            $a = $db->Login($name,$pass);
            // print_r($a);
            // die();
            if(count(array($a))){
                $_SESSION["user"] = $a;
                header("location:shop.html",'success');
            }else{
                echo"faled to login";
            }
        }
        $name ="";
        $pass = "";
        $check = false;
        if($_COOKIE['name'] && $_COOKIE['pass']){
            $name = $_COOKIE['name'];
            $pass = $_COOKIE['pass'];
            $check = true;
        }else{
            echo 'you must login first';
        }
            if (isset($_SESSION['item2'])) {
                $a = $_SESSION['item2'];
            }
        require_once('mvc/Views/user/login.php');
        break;
        }
    case 'logout':{
        session_start();
        if(isset($_SESSION["user"])){
              session_destroy();
              header('location:index.php?controller=Shop&action=login');
        }
        break;
    }
    case'cart':{
            require_once('mvc/Views/shopping/cart.php');
            require_once('mvc/Views/shopping/list_item.php');
            break;
    }
    case'cart_delete':{
             
                require_once('mvc/Views/shopping/cart.php');
                break;
         }
    case 'cart_clear': {
            require_once('mvc/Views/shopping/cart.php');
            break;
        }
    case 'cart_update': {
            require_once('mvc/Views/shopping/cart.php');
            break;
        }
    case'list_item':{
            session_start();
            $getavatar = $db1->getavatar();
            $products = !empty($_SESSION['item2']) ? $_SESSION['item2'] : []; 
        require_once('mvc/Views/shopping/list_item.php');
        break;
    }
    case'payment':{
        session_start();
            if(isset($_POST['payment'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $home_number = $_POST['home_number'];
                $note = $_POST['note']; 
                $pay_type = $_POST['pay_type'];
                 foreach($_SESSION['item2'] as $key => $val){
                     $total_price = $val['price'] * $val['quantity'];
                     $total_price +=$total_price;
                     $color = $val['color'];
                     $size = $val['size'];
                 }
                $payment_id = $db->Payment($name, $email, $address, $phone, $home_number, $note,$color,$size, $pay_type, $total_price);
                if(isset($_SESSION['item2'])){
                    foreach($_SESSION['item2'] as $value){
                    $name= $value['name'];
                    $image=$value['image'];
                    $color=$value['color'];
                    $size=$value['size'];
                    $price=$value['price'];
                    $quantity=$value['quantity'];
                    $total_price =$value['price'] * $value['quantity'];
                    $payment_id = rand(0,9999);
                  }  
                 $db->Paymen($name, $image,$color,$size, $price, $quantity, $total_price, $payment_id);
            }
            unset($_SESSION['item2']);
            header("location:success.html"); 
        }
            if (isset($_SESSION['item2'])) {
                $a = $_SESSION['item2'];
            }
            $getavatar = $db1->getavatar();
            $data = $db->getuserinfor();
        require_once('mvc/Views/shopping/payment.php');
        break;
    }
    case'success':{
            $getavatar = $db1->getavatar();
            require_once('mvc/Views/shopping/success.php');
            break; 
    }
    case'process':{
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        $sum = $db->Countprocess();
        $pages = $sum / 3;
        $data = $db->process();
            require_once('mvc/Views/admin/process_bill.php');
            break;
    }
    case'delete_process':{
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tblTable = "order_detail";
                if ($db->DeleteData($id, $tblTable)) {
                    header('location:process.html');
                }
            }else{
                $a = 'delete is not successful';
            }
        require_once('mvc/Views/admin/process_bill.php');
        break; 
    }
    case'edit_process':{
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $data=$db->getid_process($id);
            if(isset($_POST['edit_process'])){
             $name= $_POST['name'];
             $image = $_POST['image'];
             $price = $_POST['price'];
             $quantity = $_POST['quantity'];
             $total_price = $_POST['total_price'];
             $payment_id = $_POST['payment_id'];
            if($db->edit_process($id, $name, $image, $price, $quantity, $total_price, $payment_id)){
                header("location:index.php?controller=Shop&action=process");
            }
         }
        }
          require_once('mvc/Views/admin/edit_process.php');
         break; 
    }
    case'product_detail':{
        session_start();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $stop = $db->Stars($id);
            $b =0;
            $c = 0;
            $d=0;
            $f= 0;
            foreach($stop as $star){
               $b +=$star['star'];
               $d = array($star['star']);
               $e= count($d);
               $f +=$e;
               $total = $b / $f;
            } 
            $check = $db1->check($id);
            foreach ($check as $row){
                $a1 = $row['name'];
            }
            //   echo '</pre>'; 
            //   print_r($b);
            //   exit();
            if(!@$a1){
               if (isset($_POST['rating'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $content = $_POST['content'];
                    $star = $_POST['star'];
                    $product_id = $_GET['id'];
                    $admin_rep = 'thanks for your feedback';
                    $datas = $db->comment($id, $name, $email, $content, $star, $product_id,$admin_rep);
                } 
            }else{
                $you = "thanks for your feedback";
            }
            $color = $db->getcolor($id);
            $data = $db->getPro($id);
            $data2= $db->getP($id);
            $proimage = $db->getImage($id);
            $number_star = $db1->getcount($id);
                
            if(isset($_POST['add_cart'])){
               if(isset($_SESSION['item2'])){
                   foreach($_SESSION['item2'] as $item){
                    $b =$item['quantity'];
                   }
                };
               
               $product_id = $_GET['id'];
               $color = $_POST['color'];
               $size = $_POST['size'];
               $images = $_POST['images'];
               $quantity = $b;
               $db->Add_Cart($product_id, $color, $size,$images, $quantity);
               header("location:index.php?controller=Shop&action=cart".'&'.'id='.$id);
            }
        }
            $d = 0;
            if (isset($_SESSION['item2'])) {
                $a = $_SESSION['item2'];
                foreach ($a as $c) {
                    $d += $c['quantity'];
                }
            } else if (!isset($_SESSION['item2'])) {
                $no = 'none';
            }
            //    echo '</pre>'; 
            //   print_r($a);
            //   exit();
            $getavatar = $db1->getavatar();
            $getmail = $db->getemail();

            $comments = $db->comments($id);
            $getava = $db1->getavatar();
        require_once('mvc/Views/shopping/product_detail.php');
        break;
    }
    case'main':{
        $main = $db->getProd();
            // $data = $db->getAllData($tblTable);
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
            $sum = $db->CountMember();
            $pages = $sum / 3;
            if (empty($keyword)) {
                $data = $db->getProduct();
            } elseif (!empty($keyword)) {
                $data = $db->searchMember($keyword);
            } else {
                $data = $db->getProduct();
            }
        $getavatar = $db1->getavatar();
            require_once('mvc/Views/main.php');
            break;
    }
    case'admin_log':{
            session_start();
            if (isset($_POST["lg"]) && $_POST['email'] != '' && $_POST['pass'] != '' && $_POST['phone'] !='') {
                // echo"<pre>";
                // print_r($_POST);
                // die;
                $name = $_POST['email'];
                $pass = $_POST['pass'];
                $phone = $_POST['phone'];
                $pass = md5($_POST['pass']);
                if (isset($_POST['remember'])) {
                    $_COOKIE['email'] = $email;
                    $_COOKIE['pass'] = $pass;
                    $_COOKIE['phone'] = $phone;
                    setcookie("email", $_POST['email'], time() + (86400 * 30), "/"); //;
                    setcookie("pass", $_POST['pass'], time() + (86400 * 30), "/"); //
                    setcookie("phone", $_POST['phone'], time() + (86400 * 30), "/"); //
                }

                $a = $db->Login($name, $pass,$phone);
                // print_r($a);
                // die();
                if (count(array($a))) {
                    $_SESSION["user2"] = $a;
                    header("location:index.php?controller=Branch&run=admin");
                } else {
                    echo "faled to login";
                }
            }
            $email = "";
            $pass = "";
            $phone = "";
            $check = false;
            if ($_COOKIE['email'] && $_COOKIE['pass'] && $_COOKIE['phone']) {
                $email = $_COOKIE['email'];
                $pass = $_COOKIE['pass'];
                $pass = $_COOKIE['phone'];
                $check = true;
            } else {
                echo 'you must login first';
            }
        require_once('mvc/Views/admin/login_admin.php');
        break;
    }
    case'head':{
        session_start();
        $d = 0;
        if(isset($_SESSION['item2'])){
           $a = $_SESSION['item2'];
          foreach($a as $c){
              $d += $c['quantity'];
          }
        }else if(!isset($_SESSION['item2'])){
           echo 'none';
        }
            $getavatar = $db1->getavatar();
            // $data = $db->getAllData($tblTable);
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
            $sum = $db->CountMember();
            $pages = $sum / 3;
            if (empty($keyword)) {
                $data = $db->getProduct();
            } elseif (!empty($keyword)) {
                $data = $db->searchMember($keyword);
            } else {
                $data = $db->getProduct();
            }
         require_once('mvc/Views/header.php');
         break;
    }
    case'get_heart':{
        if(isset($_GET['id'])){
             $product_id = $_GET['id'];
             $user_name = $_COOKIE['name'];
            //  echo '<pre/>';
            //  print_r($user_name);
            //  die();
             if($data = $db->get_heart($product_id,$user_name)){
                header("Location:index.php?controller=Shop&action=product");
             }
        }
            require_once('mvc/Views/product.php');
    }
    case 'wishlist':{ 
        session_start();
            $data1 = $db->getheart();
            $getfetch = $db->getproducts();
                    // echo '<pre/>';
                    // print_r($data);
                    // die();
            $getavatar = $db1->getavatar();
            if (isset($_SESSION['item2'])) {
                $a = $_SESSION['item2'];
            }
         require_once('mvc/Views/user/wishlist.php');
         break;
    }
    case 'deletewish':{
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $db->Deletewish($id);
            header("Location:wish.html");
        }
            require_once('mvc/Views/user/wishlist.php');
            break;
    }
    case'add_avatar':{
        if(isset($_POST['add_avatar'])){
                if (isset($_FILES['avatar'])) {
                    $file = $_FILES['avatar'];
                    $file_name = $file['name'];
                    if ($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] == 'image/png' || $file['type'] == 'image/jfif') {
                        move_uploaded_file($file['tmp_name'], 'upload/' . $file_name);
                    } else {
                        echo 'image is wrong type';
                        $file_name = '';
                    }
                }
          $data = $db->updateava("upload/".$file_name);
        }else{
            echo 'update failed!';
        }
            $getavatar = $db1->getavatar();
        //  echo '<pre/>';
        //      print_r($data);
        //      die();
        require_once('mvc/Views/user/add_avatar.php');
        break;
    }
    case'edit_profile':{
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $data = $db1->getUserid($id);
                if (isset($_POST['profile'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $pass = $_POST['pass'];
                    $re_pass = $_POST['re_pass'];
                    if (isset($_FILES['avatar'])) {
                    $file = $_FILES['avatar'];
                    $file_name = $file['name'];
                    if ($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] == 'image/png' || $file['type'] == 'image/jfif') {
                        move_uploaded_file($file['tmp_name'],'upload/'.$file_name);
                    } else {
                        echo 'image is wrong type';
                        $file_name = '';
                    }
                    
                   }
                    $prof = $db->updateProfile($id, $name, $email, $address, $phone, $pass, $re_pass,"upload".$file_name);
                    echo '<pre/>';
                    var_dump($prof);
                    die();
                    header('Location:account.html');
                }
            }
            $getavatar = $db1->getavatar();
            require_once('mvc/Views/user/edit_profile.php');
    }
    case'add_category':{
        if(isset($_POST['add_cate'])){
            $name = $_POST['name'];
            $status = $_POST['status'];
                if (isset($_FILES['image'])) {
                    $file = $_FILES['image'];
                    $file_name = $file['name'];
                    if ($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] == 'image/png' || $file['type'] == 'image/jfif') {
                        move_uploaded_file($file['tmp_name'], 'uploads/'.$file_name);
                    } else {
                        echo 'image is wrong type';
                        $file_name = '';
                    }
                }
            $data = $db->add_cate($id,$name,"uploads/".$file_name,$status);
            if($data){
               header("Location:cate_view.html");
            }
        }
            require_once('mvc/Views/CRUD/add_category.php');
            break;
    }
    case'cate_delete':{
        if(isset($_GET['id'])){
          $id = $_GET['id'];
          $data = $db1->cate_delete($id);
          if($data){
              header("Location:cate_view.html");
          } 
        }
    }
    case'edit_cate':{
        if(isset($_GET['id'])){
          $id=$_GET['id'];
          $cate = $db1->cate_edit($id);
          if(isset($_POST['edit_cate'])){
              $name =$_POST['name'];
              $status = $_POST['status'];
                if (isset($_FILES['image'])) {
                    $file = $_FILES['image'];
                    $file_name = $file['name'];
                    if ($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] == 'image/png' || $file['type'] == 'image/jfif') {
                        move_uploaded_file($file['tmp_name'], 'uploads/'.$file_name);
                    } else {
                        echo 'image is wrong type';
                        $file_name = '';
                    }
                
                }
                $data = $db1->edit_cate($id,$name,"uploads/".$file_name,$status);
                // echo '<pre/>';
                // print_r($data);
                // die();
                if($data){
                header("Location:cate_view.html");
                }
           }
        }

            require_once('mvc/Views/CRUD/edit_cate.php');
            break;
    }
    default: {
        require_once('mvc/Views/main.php');
    }
}
?>
