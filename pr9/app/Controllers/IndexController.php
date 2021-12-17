<?php
 const ADMIN_PASSWORD = '111111';
 const ADMIN_EMAIL = 'admin@admin.com';
class IndexController
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db->getConnect();
    }

   public function index()
   {
       // виклик відображення
       include_once 'views/home.php';
   }

   public function auth(){
    filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    include_once 'app/Models/UserModel.php';
    if($_POST['email'] == ADMIN_EMAIL && $_POST['password'] == ADMIN_PASSWORD){
        $_SESSION['auth'] = true;
    }
    header('Location: index.php');
   }

   public function denyaccess(){
       include_once 'views/denyaccess.php';
   }

   public function logout(){
        session_unset();
        header('Location: index.php');
   }
}



