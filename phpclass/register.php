<?php
require_once 'UserManager.php';

class Register {

    public function user_registration() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userManager = new UserManager();
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $result = $userManager->register($email, $password);

            echo $result;
        }
        include_once 'register_view.php';

    }

}
$registrationObj = new Register();
$registrationObj->user_registration(); 

?>
