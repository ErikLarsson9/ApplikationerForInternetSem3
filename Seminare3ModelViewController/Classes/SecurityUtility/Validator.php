<?php
namespace SecurityUtility;
Class Validator{

    public static function validateRecipe($string){
        return Validator::validateStringLetters($string);
    }

    public static function validateComment($string){
        if(false === (Validator::validateNotScript($string) && Validator::validateString($string)
                && Validator::validateNotOnlyWhiteSpace($string))){
            return false;
        }
        else{
            return true;
        }

    }


    public static function validateNotScript($string){

        if(preg_match ("/\<[Ss][Cc][Rr][Ii][Pp][Tt]\>/", $string)){
            return false;

        }
        else{
            return true;
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

    public static function validateString($string){
        //if(preg_match ("/^[a-zA-ZåäöÅÄÖ0-9!.,'\"=-%\\$€\s]*$/", $string)){
//        if(preg_match ("/^[\\p{L}0-9]*$/", $string)){
        if(preg_match ("/^[a-zA-Z0-9åäöÅÄÖ!.,\s]+$/", $string)){
//            if(preg_match ("/[\s]*$/", $string)){
        //$string = " ";
        //if(ctype_space($string)){
            return true;
        }
        else{
            return false;
        }

    }

    public static function validateUsername($string){
        return Validator::validateStringLettersAndNumeric($string);

    }

    public static function validateURI($Uri){
//        if(preg_match ("/ \/~Likecoke\/Seminare3ModelViewController\/.+php/", $Uri)){
        if(preg_match ("/\/~Likecoke\/Seminare3ModelViewController\/.+php/", $Uri)){
//            echo "\n\n\n\n\nWin!!!!!!!!!!";
            return true;


        }
        else{
//            echo "\n\n\n\n\nLose!!!!!!!!!!";
            return false;
        }
    }

    public static function validatePassword($string){
        if(preg_match ("/[a-zA-Z0-9()!#]*/", $string)){
            return true;

        }
        else{
            return false;
        }

    }

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

    public static function validateNotOnlyWhiteSpace($string){
        if(ctype_space($string)){
            return false;
        }
        else{
            return true;

        }

    }
//    public static function validateStringPrintable($string){
//        if(ctype_print($string)){
//            //echo $string;
//            return true;
//        }
//        else{
//            return false;
//
//        }
//
//    }




}

