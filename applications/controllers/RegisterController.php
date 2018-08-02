<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 12.07.18
 * Time: 13:41
 */

class RegisterController extends Controller
{
    private $auth;

    public function __construct()
    {
        $this->registerQueryManipulation();
    }
    /*
     * View connect
     */
    public function RegisterAction(){
        $view = new View();
        $view->generate('Register');
    }
    /*
     *
     */
    private function registerQueryManipulation(){
        $this->auth = new Auth2();
        array_pop($this->auth->post);
        //var_dump($this->auth->post);
        $reg_model = new RegisterModel();
        $validate = new Validation();

        $valid =  $validate->checkData($_POST, [
                "name" => [
                    'required' => true,
                    'min' => 3,
                    'max' => 15
                ],
                'login' => [
                    'required' => true,
                    'min' => 3,
                    'max' => 12,
                    'unique' => true
                ],
                'email' => [
                    'min' => 8,
                    'max' => 25,
                    'unique'=>true
                ],
                'password' => [
                    'required' => true,
                    'min' => 6,

                ]
            ]);
    if($valid !==false){
        $reg_model->my_execute($reg_model->regAction(), $this->auth->post);
    }
     var_dump($validate->getError())   ;

      /*  if(!empty($this->auth->post) ){
            //echo 'ok';
            ////Сделать валидацию
         //if($valid->strLength($this->auth->post['name'],3,10,'Имя')
         //    && $valid->strLength($this->auth->post['login'],5,10,'Login')){
            $reg_model->my_execute($reg_model->regAction(), $this->auth->post);
         }*/


        }


}

