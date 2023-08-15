<?php 

require_once 'models/User.php';
class UserController{
    public function index(){
        echo "Soy el UserController, Acción: index (así como la función indica su nombre)";
    }

    public function register(){
        $url_direction = "controller=user&action=save";
        require_once 'views/user/register.php';
    }

    public function save(){
        if( isset($_POST) ){
            $name    = isset($_POST['name'])    ? $_POST['name']    : false;
            $surname = isset($_POST['surname']) ? $_POST['surname'] : false;
            $email   = isset($_POST['email'])   ? $_POST['email']   : false;
            $pwd     = isset($_POST['pwd'])     ? $_POST['pwd']     : false;
            $img  = "Una imagen.";
            // $Imagen  = isset($_POST['Imagen'])  ? $_POST['Imagen']  : null;

            if($name && $surname && $email && $pwd){
                $user = new User();
                $user->setName($name);
                $user->setSurname($surname);
                $user->setEmail($email);
                $user->setPwd($pwd);
                $user->setThumbnail($img);
    
                $status = $user->save();
    
                if($status){
                    $_SESSION['register'] = "complete";
                }else{
                    $_SESSION['register'] = "failed";
                }
            }else{
                $_SESSION['register'] = "failed";
            }
        }else{
            $_SESSION['register'] = 'failed';
        }
        // header("Location:".base_url.'user/register');
        header("Location:/user/register?");
    } 


}