<?php

namespace App\Classes;

use App\Http\Requests;
use Auth;
use Illuminate\Support\Facades\Hash;
use Datetime;
use Request;
use Redirect;
use DB;


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
   
       
   

}
