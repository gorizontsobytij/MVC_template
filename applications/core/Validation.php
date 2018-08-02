<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 12.07.18
 * Time: 15:36
 */

class Validation
{

    /*public function strLength($str,$num_one=null,$num_two=null,$column = null){
        if(strlen($str) < $num_one || strlen($str) > $num_two)
        {
            echo "Поле $column должно быть  не меньше $num_one, и не больше $num_two";
            return false;
        }
        return $str;
    }*/
    private $_passed = false,
            $_errors = [],
            $_link = null;

    public function __construct(){
        $this->_link = LinkDB::getLink();
    }

    public function checkData($source, $items = []){
        foreach ($items as $item => $rules){
           // var_dump($items);
            foreach ($rules as $rule => $rule_value){
                if(!empty($_POST)){
                    $value = $source[$item];
                   // var_dump($value);
                }

                 if($rule === 'required' && empty($value)){
                    $this->addError("{$item} is required");
                   // var_dump($this->getError());
                } else if (!empty($value)){
                     switch ($rule){
                         case 'min':
                             if(strlen($value) < $rule_value){
                                 $this->addError("{$item} должно быть не меньше {$rule_value}");
                             }
                             break;
                         case 'max':
                             if(strlen($value) > $rule_value){
                                 $this->addError("{$item} должно быть не больше {$rule_value}");
                             }
                             break;
                         case 'matches':
                             if($value != $source[$rule_value]){
                                 $this->addError("{$rule_value} должно совпадать {$item}");
                             }
                             break;
                         case 'unique':
                           //  var_dump($value);
                            // var_dump($item);
                             $model = new Model();
                             $check = $model->my_query("SELECT '$item' FROM new_schema.users 
                                                              WHERE $item = '$value'");
                            // var_dump($check);
                         if(!empty($check))
                         {
                             $this->addError("Поле {$item} -  {$value} уже существуют");
                         }
                             break;
                     }
                 }
            }
        }
        if(empty($this->getError()))
        {
            $this->_passed = true;
        }
       // var_dump($this->_passed);

        return $this->_passed;
    }

    private function addError($error){
        $this->_errors[] = $error;
    }
    public function getError()
    {
        return $this->_errors;
    }


}