<?php
require_once 'UserManager.php';




class Login {

    public function user_login() {
        
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userManager = new UserManager();
        $email = $_POST['email'];
        $password = md5($_POST['password']);
    
        $result = $userManager->login($email, $password);
    
        echo $result;
    }
    include_once 'login_view.php';
    

    }

    
}

$loginObj = new Login();

$loginObj->user_login();


?>






