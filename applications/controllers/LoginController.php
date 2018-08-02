<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 15.07.18
 * Time: 13:36
 */

class LoginController extends Controller
{
    private $auth;

    public function __construct(){
        $this->queryLoginManipulation();
        $this->rememberMe();
        $this->logout();

        /*if(!empty($_SESSION['auth'] )){
            //var_dump( $_SESSION['auth'] );
           /// var_dump($_COOKIE['remember']);
        }*/
    }

    public function LoginAction(){
        $login = "";
        if(!empty($_SESSION['auth'] )){
            $login = $_SESSION['auth']['login'];
        }else{
            $login = "";
        }
        $view = new View();
        $view->generate('Login',$login);
    }

    private function queryLoginManipulation(){
        $this->auth = new Auth2();
        $log_model = new LoginModel();
        //$log_model->loginAction();
       // var_dump($this->auth->post);
        if(!empty($this->auth->post) && is_array($this->auth->post)
            && !empty($this->auth->post['login'] ) && $this->auth->post['password']){
                 $result = $log_model->query_login($log_model->loginAction(),
                    $this->auth->post['login'],$this->auth->post['password']);
                if(!empty($result)){
                  //  var_dump($result);
                    $_SESSION['auth']['name'] = $result[0]['name'];
                    $_SESSION['auth']['login'] = $result[0]['login'];
                }else{
                    echo "НЕ перный пароль или логин";
                }
        }
        return false;
       // var_dump($result);
    }
    public function rememberMe(){
        if(isset($_POST ['remembermme']) && isset($_SESSION['auth'])){
           // echo "ok Coocie";
            setcookie('remember', $_SESSION['auth']['login'], time()+3600);
           // var_dump($_COOKIE['remember']);
        }
        if(isset($_COOKIE['remember']) ) {
            $_SESSION['auth']['login'] = $_COOKIE['remember'];
        }
    }

    public function logout(){
        if(isset ($_POST['logout']) ) {
            if (isset($_SESSION['auth'])) {
                //echo "DESTROY";
                setcookie('remember', '', time() - 3600);
                unset($_SESSION ['auth']);
               /// session_destroy();
            }
        }
    }
}