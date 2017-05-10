<?php

namespace App\Classes;

use App\User;
use App\Company;


class Help
{
     // check password strength with PHP
    public static function pass_check($pwd)
    {

        if( strlen($pwd) < 8 )
            return "Password too short";
        if( strlen($pwd) > 20 )
            return "Password too long";
        if( !preg_match("#[0-9]+#", $pwd) )
            return "Password must include at least one number";
        if( !preg_match("#[a-z]+#", $pwd) )
            return "Password must include at least one letter";
        if( !preg_match("#[A-Z]+#", $pwd) )
            return "Password must include at least one CAPS";
        if( !preg_match("#\W+#", $pwd) )
            return "Password must include at least one symbol";
    }
   
    // view for big strings
    public static function string_lenght($string, $val)
    {
        $lenght = strlen($string);
        if ($lenght <= $val)
            return $string;
        else
            return substr($string, 0, $val - 3) . '...';
    }

    public static function license_key($length = 50){
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }


    public static function root_user($token){

        return  User::where('remember_token',$token)->where('id',0)->first();

    }


    public static function admin_user($token){

        $company = Company::where('remember_token',$token)->first();

        return  @$company->id;
    }


    public static function system_user($token){

        $user = User::where('remember_token',$token)->where('id','!=',0)->first();

        return  @$user->id;
    }



   
       
   

}
