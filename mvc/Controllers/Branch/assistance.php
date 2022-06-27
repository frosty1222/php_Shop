<?php
if (isset($_GET['run'])) {
    $action = $_GET['run'];
} else {
    $action = '';
}
$thanhcong = array();

switch($action){
    case 'pro': {
            $sum = $db->CountMember2();
            $pages = $sum / 4;
            $data = $db->pro_select();
            $getavatar = $db1->getavatar();
            require_once('mvc/Views/pro_image/pro_list.php');
            break;
    }
    case'delete':{
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tblTable = "pro_image";
                if ($db1->DeleteData($id, $tblTable)) {
                    header('location:index.php?controller=Branch&run=pro');
                }
            } else {
                echo 'delete is not successful';
            }
            break;
        }

    case'up_color':{
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $product= $db1->getproduct_id($id);
            if(isset($_POST['submit'])){
                    $product_id = $_GET['id'];
                    // $product_id = $_POST['product_id'];
                    $color = $_POST['color'];
                    $size = $_POST['size'];
                $db1->addproduct($id, $product_id,$color,$size);
            }
        }
        // echo '<pre/>';
        // print_r($_POST);
        // die();
        require_once('mvc/Views/shopping/color_size.php');
        break;
    }
    case 'admin':{
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
            $sum = $db->Countprocess();
            $pages = $sum / 3;
            $dat= $db1->getorderdetail1();
            require_once('mvc/Views/admin/index.php');
            break;
    }
    case'delete_ad':{
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $data1 = $db1->Delete($id);
                if($data1){
                    header('location:admin.html');
                }
            }
               // echo '<pre/>';
                // print_r($data1);
                // die();
         require_once('mvc/Views/admin/index.php');
         break;
    }
    case'update_status':{
        if(isset($_GET['id'])){
            $id= $_GET['id'];
            $status = $_GET['status'];
            $data3 = $db1->update_status($id,$status);
            // echo '<pre/>';
            //     print_r($data3);
            //     die();
            if($data3){
                header("Location:index.php?controller=Branch&run=admin");
            }
        }
       break;
    }
    case 'status_up': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $status = $_GET['status'];
                $data4= $db1->update_status($id, $status);
                // echo '<pre/>';
                //     print_r($data4);
                //     die();
                if ($data4) {
                    header("location:index.php?controller=Branch&run=user_view");
                }
            }
            break;
        }
    case'user_view':{
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
            $sum = $db->Countprocess();
            $pages = $sum / 3;
            $data = $db1->getorderdetail();
            $getavatar = $db1->getavatar();
            require_once('mvc/Views/admin/user_view.php');
            break;
    }
    // default: {
    //         require_once('mvc/Views/main.php');
    //     }
    case'contact':{
        if(isset($_POST['contact'])){
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $note = $_POST['note'];
            $data = $db1->Contact($id, $name, $phone, $email, $note);
            if($data){
                header('location:index.php?controller=Branch&run=contact');
            }
        }
            $getavatar = $db1->getavatar();
            require_once('mvc/Views/contact/contact.php');
            break;
    }
    case'user_site':{
            session_start();
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
            require_once('mvc/Views/user_site.php');
            break;
    }
    case 'admin_site': {
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
            require_once('mvc/Views/admin_site.php');
            break;
        }
    case 'account':{
            $getavatar = $db1->getavatar();
            $account = $db1->getInfor();
            require_once('mvc/Views/user/account.php');
            break;
    }
    case'payment_view':{
        $data =$db1->payment();
            require_once('mvc/Views/admin/payment_view.php');
            break;
    }
    case'delete_pay':{
        if(isset($_GET['id'])){
           $id = $_GET['id'];
           $db1->delete_pay($id);
           header("Location:pay_view.html");
        }
        break;
    }
    case 'about':{
            $getavatar = $db1->getavatar();
            require_once('mvc/Views/admin/about.php');
            break;
    }
    case 'women_outfit':{
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
            $sum = $db->women();
            $pages = $sum / 4;
            if (empty($keyword)) {
                $data = $db->getProduct1();
            } elseif (!empty($keyword)) {
                $data = $db->searchMember($keyword);
            } else {
                $data = $db->getProduct1();
            }
            //   echo '<pre/>';
            //   print_r($c);
            //   die();
            $getavatar = $db1->getavatar();
            require_once('mvc/Views/shop/women_outfit.php');
            break; 
    }
    case 'baby_outfit': {
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
            $sum = $db->baby();
            $pages = $sum / 3;
            if (empty($keyword)) {
                $data = $db->getProduct2();
            } elseif (!empty($keyword)) {
                $data = $db->searchMember($keyword);
            } else {
                $data = $db->getProduct2();
            }
            //   echo '<pre/>';
            //   print_r($c);
            //   die();
            $getavatar = $db1->getavatar();
            require_once('mvc/Views/shop/baby_outfit.php');
            break;
        }
    case 'accessories': {
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
            $sum = $db->access();
            $pages = $sum / 3;
            if (empty($keyword)) {
                $data = $db->getProduct3();
            } elseif (!empty($keyword)) {
                $data = $db->searchMember($keyword);
            } else {
                $data = $db->getProduct3();
            }
            //   echo '<pre/>';
            //   print_r($c);
            //   die();
            $getavatar = $db1->getavatar();
            require_once('mvc/Views/shop/accessories.php');
            break;
        }
    case 'cate_view': {
            $getavatar = $db1->getavatar();
            $data = $db1->cate_view();
            require_once('mvc/Views/admin/cate_view.php');
            break;
        }
    case 'add_image':{
        if($_GET['id']){
          $id = $_GET['id'];
          $putid = $db1->getproductid($id);
            if(isset($_POST['add_image'])){
                $product_id = $_GET['id'];
                    if (isset($_FILES['images'])) {
                        $files = $_FILES['images'];
                        $file_names = $files['name'];
                        foreach ($file_names as $key => $fil) {
                                move_uploaded_file($files['tmp_name'][$key], 'upload/' . $fil);
                        }
                        
                    }
                foreach($file_names as $key => $fils) {
                    $db->add_image("upload/".$fils, $product_id);
                }
            }
        }
        $getavatar = $db1->getavatar();
        require_once('mvc/Views/pro_image/add_pro_image.php');
        break;
    }
    case 'pro_edit': {
            if ($_GET['id']) {
                $id = $_GET['id'];
                $putid = $db1->getimageid($id);
                if (isset($_POST['edit_image'])) {
                    $product_id = $_POST['product_id'];
                    if (isset($_FILES['images'])) {
                        $file = $_FILES['images'];
                        $file_name = $file['name'];
                        if ($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] == 'image/png' || $file['type'] == 'image/jfif') {
                            move_uploaded_file($file['tmp_name'], 'upload/'.$file_name);
                        } else {
                            echo 'image is wrong type';
                            $file_name = '';
                        }
                    }
                    $data = $db1->edit_image($id,"upload/".$file_name,$product_id);
                }
            }
            require_once('mvc/Views/pro_image/pro_edit.php');
            break;
        }
        case'item_detail':{
            session_start();
                 $ses = $_SESSION['item2'];
            //   echo '<pre/>';
            //   print_r($ses);
            //   die();
            $getavatar = $db1->getavatar();
            require_once('mvc/Views/shopping/item_detail.php');
            break;
        }
        case'delete_detail':{
          if(isset($_GET['id'])){
              $id = $_GET['id'];
              $db->detele_detail($id);
              header("Location:idetail.html");
          }
        }
        case'checkuser':{
            $uname  = $_GET['uname'];
            $checku = $db1->checkuser($uname);
            print_r($checku);
            break;
        }
        case 'checkphone':{
            $uphone  = $_GET['uphone'];
            $checkp = $db1->checkphone($uphone);
            print_r($checkp);
            break;
        }
        case 'checkemail':{
              $uemail  = $_GET['uemail'];
              $checke = $db1->checkemail($uemail);
              print_r($checke);
            break;
        }
}
?>