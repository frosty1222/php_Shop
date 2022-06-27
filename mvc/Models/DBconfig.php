<?php 
class Database{
    private $hostname = 'localhost';
    private $username = 'root';
    private $pass ='';
    private $dbname ='fashion_shop';
    private $conn = NULL;
    private $result = NULL;
    public function connect(){
        $this->conn = new mysqli($this->hostname,$this->username,$this->pass,$this->dbname);
        if(!$this->conn){
            echo "failed to connect to database";
            exit();
        }
        else{
            mysqli_set_charset($this->conn,'utf8');
        }
        return $this->conn;
    }
    // thuc thi cau lenh
    public function execute($sql){
      $this->result = $this->conn->query($sql);
      return $this->result;
    }
    public function insert_id(){
        $this->result= $this->conn->insert_id;
        return $this->result;
    }
    public function editDATA($id)
    {
        $sql = "SELECT * FROM product WHERE id = '$id'";
        $this->execute($sql);
        if($this->num_rows()!=0){
            $data= mysqli_fetch_array($this->result);
        }
        else{
            $data = 0;
        }
        return $data;
    }
    public function editDATA2($product_id)
    {
        $datas = "SELECT * FROM pro_image WHERE product_id = '$product_id'";
        $this->execute($datas);
        if ($this->num_rows() != 0) {
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }
    public function getData()
    {
        if ($this->result) {
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }
    //lay toan bo du lieu 
    public function getAllData($table){
        $sql ="SELECT * from $table";
        $this->execute($sql);
        if($this->num_rows()==0){
         $data = 0;
        }
        else{
            while($datas = $this->getData()){
                $data[] =$datas;
            }
        }
        return $data;
    }
    public function searchMember($k){
        $sql = "SELECT * FROM product  Where name like'%".$k."%'";
        return $this->execute($sql);
    }
    public function CountMember(){
        $sql ="SElECT * FROM product Where category_id =1";
        $query = mysqli_query($this->conn,$sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
        $count = count($result);
        $result = $this->execute($sql);
        return $count;
    }
    public function baby()
    {
        $sql = "SElECT * FROM product Where category_id =4";
        $query = mysqli_query($this->conn, $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        $count = count($result);
        $result = $this->execute($sql);
        return $count;
    }
    public function access()
    {
        $sql = "SElECT * FROM product Where category_id =3";
        $query = mysqli_query($this->conn, $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        $count = count($result);
        $result = $this->execute($sql);
        return $count;
    }
    public function women()
    {
        $sql = "SElECT * FROM product Where category_id =2";
        $query = mysqli_query($this->conn, $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        $count = count($result);
        $result = $this->execute($sql);
        return $count;
    }
    public function CountMember2()
    {
        $sql = "SElECT *FROM pro_image";
        $query = mysqli_query($this->conn, $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        $count = count($result);
        $result = $this->execute($sql);
        return $count;
    }
    public function CountMemberlist()
    {
        $sql = "SElECT *FROM product";
        $query = mysqli_query($this->conn, $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        $count = count($result);
        $result = $this->execute($sql);
        return $count;
    }
    public function Countprocess()
    {
        $sql = "SElECT *FROM order_detail";
        $query = mysqli_query($this->conn, $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        $count = count($result);
        $result = $this->execute($sql);
        return $count;
    }
    public function getProduct(){
        if(isset($_GET['pages'])){
            $pages = $_GET['pages'];
        }else{
            $pages = 1;
        }
        $row =4;
        $from = ($pages - 1 ) * $row;
        $sql = "SELECT * from  product LIMIT $from,$row";
        $b = $this->execute($sql);
        return $b;
    }
    public function getProductlist()
    {
        if (isset($_GET['pages'])) {
            $pages = $_GET['pages'];
        } else {
            $pages = 1;
        }
        $row = 4;
        $from = ($pages - 1) * $row;
        $sql = "SELECT * from  product LIMIT $from,$row";
        $b = $this->execute($sql);
        return $b;
    }
    public function Cart($id){
        $sql = "SELECT * FROM product WHERE id = $id";
        return $this->execute($sql);
    }
    //phuong thuc dem so ban ghi
    public function num_rows(){
        if($this->result){
           $num = mysqli_num_rows($this->result);
        }else{
            $num =0;
        }
        return $num;
    }

    //phuong thuc them du lieu 
    public function InsertData($name,$price, $image,$sale_price,$category_id)
    {
        $sql = "INSERT INTO product(id,name,price,image,sale_price,category_id)VALUES(Null,'$name','$price', '$image','$sale_price','$category_id')";
        // print($sql);
        return $this->execute($sql);
        
    }
    // cap nhat du lieu
    public function UpdateData($id,$name, $price, $image, $sale_price, $category_id)
    {
        $sql = "UPDATE product  SET name='$name',price='$price',sale_price='$sale_price',image='$image',category_id='$category_id' Where id = '$id'";
        return $this->execute($sql);
    }
    public function DeleteData($id,$table)
    {
        $sql = "DELETE from $table Where id = '$id'";
        return $this->execute($sql);
    }
    public function RegisterData($name){
        $sql = "SELECT * FROM user where name ='$name'";
        return $this->execute($sql);
    }
    public function insertUser($name,$email,$phone,$address,$pass,$re_pass){
        $sql = "INSERT INTO user(id,name,email,address,phone,pass,re_pass) VALUES (NULL,'$name','$email','$address','$phone','$pass','$re_pass')";
        return $this->execute($sql);
    }
    public function Login($name,$pass){
        $sql = "SELECT * FROM user where name='$name' AND 'pass'='$pass'";
        $result = $this->execute($sql);
        $row = mysqli_fetch_row($result);
        $count = count(array($row));
        return $count;
    }
    public function getCategory(){
        $sql = "SELECT * FROM category";
        return $this->execute($sql);
    }
    public function Payment($name,$email,$address,$phone,$home_number,$note,$color,$size,$pay_type,$total_price){
        $sql = "INSERT INTO payment(name,email,address,phone,home_number,note,color,size,pay_type,total_price) values ('$name','$email','$address','$phone','$home_number','$note','$color','$size','$pay_type','$total_price')";
        return $this->execute($sql);
    }
    public function Paymen($name,$image,$color,$size,$price,$quantity,$total_price,$payment_id)
    {
        $sql = "INSERT INTO order_detail(name,image,color,size,price,quantity,total_price,payment_id) values ('$name','$image','$color','$size','$price','$quantity','$total_price','$payment_id')";
        return $this->execute($sql);
    }
    public function edit_process($id,$name, $image,$color,$size, $price, $quantity, $total_price, $payment_id)
    {
        $sql = "UPDATE order_detail SET name='$name',image='$image',color='$color',size='$size',price='$price',quantity='$quantity',total_price='$total_price',payment_id='$payment_id' WHERE id = '$id'";
        return $this->execute($sql);
    }
    public function process(){
        $sql = "SELECT * FROM order_detail";
        return $this->execute($sql);
    }
    public function getid_process($id){
        $sql = "SELECT * FROM order_detail WHERE id = '$id'";
        $this->execute($sql);
        if ($this->num_rows() != 0) {
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }
    public function add_image($images,$product_id){
        $sql = "INSERT INTO pro_image(id,images,product_id) values (Null,'$images','$product_id')";
        return $this->execute($sql);
    }
    public function getPro($id){
        $sql = "SELECT * FROM product where id = $id";
        // $data = "SELECT * FROM pro_image where id = $id";
        return $this->execute($sql);
    }
    public function getP($id){
        $sql = "SELECT * FROM pro_image where product_id = $id";
        return $this->execute($sql);
    }
    public function updateProduct_image($id,$images,$product_id){
        $sql = "UPDATE pro_image SET images='$images', product_id = '$product_id' WHERE id = '$id'";
        return $this->execute($sql);
    }
    public function pro_select(){
       $sql = "SELECT * FROM pro_image";
       return $this->execute($sql);
    }
    public function comment($id, $name, $email, $content, $star, $product_id,$admin_rep)
    {
        $sql="INSERT INTO rating_star (id,name,email,content,star,product_id,admin_rep) values(Null,'$name','$email','$content','$star','$product_id','$admin_rep')";
        return $this->execute($sql);
    }
    public function Stars($id)
    {
        $sql = "SELECT star FROM rating_star WHERE product_id = $id";
        $a = $this->execute($sql);
       return $a;
    } 
    public function getcolor($id){
       $sql ="SELECT * FROM color where product_id = $id";
       return $this->execute($sql);
    }
    public function Add_Cart($product_id,$color,$size,$images,$quantity)
    {
        $sql="INSERT INTO cart (id,product_id,color,size,images,quantity) values (Null,'$product_id','$color','$size','$images','$quantity')";
        return $this->execute($sql);
    }
    public function getCart(){
        $sql = "SELECT * FROM cart";
        return $this->execute($sql);
    }
    public function get_heart($product_id,$user_name){
        $sql = "INSERT INTO product_heart (id,product_id,user_name) values (Null,'$product_id','$user_name')";
        return $this->execute($sql);
    }
    public function getheart(){
        $sql = "SELECT * FROM product_heart";
        return $this->execute($sql);
    }
    public function getproducts(){
        $sql = "SELECT * FROM product";
         return $this->execute($sql);
    }
    public function DeleteWish($id){
        $sql = "DELETE FROM product_heart Where id = '$id'";
        return $this->execute($sql);
    }
    public function getProd(){
        $sql = "SELECT * FROM product order by id desc limit 12";
        return $this->execute($sql);
    }
    public function updateava($avatar){
        $name = $_COOKIE['name'];
        $sql = "UPDATE user SET avatar='$avatar' where name ='$name'";
        return $this->execute($sql);
    }
    public function getuserinfor(){
        $name = $_COOKIE['name'];
        $sql= "SELECT * FROM user WHERE name = '$name'";
        return $this->execute($sql);
    }
    public function updateProfile($id, $name, $email, $address, $phone, $pass, $re_pass,$avatar)
    {
        $sql = "UPDATE user SET name='$name', email='$email', address='$address', phone='$phone', pass='$pass', re_pass ='$re_pass',avatar ='$avatar' WHERE id=$id";
        return $this->execute($sql);
    }
    public function add_cate($name,$image,$status){
        $sql = "INSERT INTO category (id,name,image,status) values (Null,'$name','$image','$status')";
        return $this->execute($sql);
    }
    public function getProduct1(){
        if (isset($_GET['pages'])) {
            $pages = $_GET['pages'];
        } else {
            $pages = 1;
        }
        $row = 4;
        $from = ($pages - 1) * $row;
       $sql = "SELECT * FROM product WHERE category_id =2 LIMIT $from,$row";
       return $this->execute($sql);
    }
    public function getProduct2()
    {
        if (isset($_GET['pages'])) {
            $pages = $_GET['pages'];
        } else {
            $pages = 1;
        }
        $row = 4;
        $from = ($pages - 1) * $row;
        $sql = "SELECT * FROM product WHERE category_id =4 LIMIT $from,$row";
        return $this->execute($sql);
    }
    public function getProduct3()
    {
        if (isset($_GET['pages'])) {
            $pages = $_GET['pages'];
        } else {
            $pages = 1;
        }
        $row = 4;
        $from = ($pages - 1) * $row;
        $sql = "SELECT * FROM product WHERE category_id =3 LIMIT $from,$row";
        return $this->execute($sql);
    }
    public function getemail(){
        $name = $_COOKIE['name'];
        $sql = "SELECT * FROM user WHERE name ='$name'";
        return $this->execute($sql);
    }
    public function getImage($id){
        $sql = "SELECT * FROM pro_image WHERE product_id=$id";
        return $this->execute($sql);
    }
    public function getCarts($id){
        $sql = "SELECT * FROM cart WHERE product_id=$id";
        return $this->execute($sql);
    }
    public function getname($id){
       $sql = "SELECT * FROM product WHERE id= $id";
       return $this->execute($sql);
    }
    public function get_image($id){
       $sql = "SELECT * FROM pro_image WHERE product_id = $id";
       return $this->execute($sql);
    }
    public function detele_detail($id){
        $sql= "DELETE FROM cart WHERE id = $id";
        return $this->execute($sql);
    }
    public function comments($id){
        $sql = "SELECT * FROM rating_star where product_id = $id";
        return $this->execute($sql);
    }
}
?>