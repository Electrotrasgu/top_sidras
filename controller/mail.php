<?php

class FormularioViewController {
   
    
    public function sendEmail($nombre,$apellido,$email,$mensaje){
        if($this->validar($nombre,$apellido, $email,$mensaje)){
            mail("topsidras@gmail.com","Nuevo mensaje de ".$nombre,$mensaje);
            return true;
        }else{
            return false;
        }
    }
}
