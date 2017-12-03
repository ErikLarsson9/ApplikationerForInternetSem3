<?php
namespace SecurityUtility;
Class Validator{

    public static function validateInt($int){
        if (!empty($int)) {

            $int = (int) $int;
        }
        else{
            $int = 0;
        }
        return $int;

    }
    public static function validateStringLetters($string){
        if(ctype_alpha($string)){
            return true;
        }
        else{
            return false;

        }



    }
    public static function validateStringLettersAndNumeric($string){
        if(ctype_alnum($string)){
            return true;
        }
        else{
            return false;

        }




    }
    public static function validateStringPrintable($string){
        if(ctype_print($string)){
            return true;
        }
        else{
            return false;

        }

    }




}

