<?php 
class Database2{
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
        $sql = "SELECT * FROM pro_image WHERE id = '$id'";
        $this->execute($sql);
        if($this->num_rows()!=0){
            $data= mysqli_fetch_array($this->result);
        }
        else{
            $data = 0;
        }
        return $data;
    }
    public function getAllData($table)
    {
        $sql = "SELECT * from $table";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function num_rows()
    {
        if ($this->result) {
            $num = mysqli_num_rows($this->result);
        } else {
            $num = 0;
        }
        return $num;
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
    public function DeleteData($id, $table)
    {
        $sql = "DELETE from $table Where id = '$id'";
        return $this->execute($sql);
    }
    public function update_image($id, $images,$product_id)
    {
        $sql = "UPDATE pro_image set images='$images' product_id = '$product_id' WHERE id = '$id'";
        return $this->execute($sql);
    }
    public function getproduct_id($id){
        $sql = "SELECT * FROM product WHERE id = '$id'";
        return $this->execute($sql);
    }
    public function addproduct($id, $product_id,$color,$size){
        $sql = "INSERT INTO color (id,product_id,color,size) values (Null,'$product_id','$color','$size')";
        return $this->execute($sql);
    }
    public function getuser($name){
         $sql = "SELECT * FROM user where name = $name";
         return $this->execute($sql);
    }
    public function getcount($id){
        $sql = "SELECT AVG(star) FROM rating_star where product_id = $id";
        return $this->execute($sql);
    }
    public function check($id){
        $sql = "SELECT name FROM rating_star where product_id = $id";
        return $this->execute($sql);
    }
    public function getorderdetail(){
        $sql = "SELECT * FROM order_detail";
        return $this->execute($sql);
    }
    public function getorderdetail1()
    {
        $sql = "SELECT * FROM order_detail";
        return $this->execute($sql);
    }
    public function Delete($id){
        $sql = "DELETE FROM order_detail WHERE id= $id";
        return $this->execute($sql);
    }
    public function update_status($id,$status){
        $sql = "UPDATE order_detail SET status ='$status' WHERE id='$id'";
        return $this->execute($sql);
    }
    public function Contact($id,$name,$phone,$email,$note){
        $sql = "INSERT INTO contact (id,name,phone,email,note) VALUES (NULL,'$name', '$phone', '$email', '$note')";
        return $this->execute($sql);
    }
    public function getavatar(){
        $name = $_COOKIE["name"];
        $sql= "SELECT avatar FROM user where name='$name'";
        return $this->execute($sql);
    }
    public function getInfor()
    {
        $name = $_COOKIE["name"];
        $sql = "SELECT * FROM user where name='$name'";
        return $this->execute($sql);
    }
    public function getUserid($id){
        $sql = "SELECT * FROM user WHERE id=$id";
        return $this->execute($sql);
    }
    public function payment(){
        $sql = "SELECT * FROM payment";
        return $this->execute($sql);
    }
    public function delete_pay($id){
        $sql = "DELETE FROM payment WHERE id= $id";
        return $this->execute($sql);
    }
    public function cate_view(){
        $sql = "SELECT * FROM category";
        return $this->execute($sql);
    }
    public function cate_delete($id)
    {
        $sql = "DELETE * FROM category WHERE id = $id";
        return $this->execute($sql);
    }
    public function cate_edit($id)
    {
        $sql = "SELECT * FROM category WHERE id = $id";
        return $this->execute($sql);
    }
    public function edit_cate($id,$name,$image,$status){
        $sql = "UPDATE category SET name='$name',image='$image',status='$status' WHERE id='$id'";
        return $this->execute($sql);
    }
    public function getproductid($id){
        $sql = "SELECT * FROM product WHERE id='$id'";
        return $this->execute($sql);
    }
    public function getimageid($id){
        $sql = "SELECT * FROM pro_image WHERE id='$id'";
        return $this->execute($sql);
    }
    public function edit_image($id,$images,$product_id){
        $sql = "UPDATE pro_image SET images='$images', product_id='$product_id' WHERE id=$id ";
        return $this->execute($sql);
    }
    public function getallimages($id){
        $sql = "SELECT * FROM cart where product_id='$id'";
        return $this->execute($sql);
    }
    public function checkuser($uname){
        $sql = "SELECT * FROM user where name='$uname'";
        $a =$this->execute($sql);
        $b = mysqli_num_rows($a);
        return $b;
    }
    public function checkemail($uemail)
    {
        $sql = "SELECT * FROM user where email='$uemail'";
        $a = $this->execute($sql);
        $b = mysqli_num_rows($a);
        return $b;
    }
    public function checkphone($uphone)
    {
        $sql = "SELECT * FROM user where phone='$uphone'";
        $a = $this->execute($sql);
        $b = mysqli_num_rows($a);
        return $b;
    }
}
?>