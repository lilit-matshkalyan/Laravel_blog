<?php

namespace App\Classes;

use App\Http\Requests;
use Auth;
use Illuminate\Support\Facades\Hash;
use Hijri_GregorianConvert;
use datetime;
use Request;
use Redirect;
use DB;
use App\Language;
use App\Settings;


class Help
{

    // languages changer
    public static function languages($text)
    {
        if(session('lang') == '-rtl') {
            $rtl = Language::where('en',$text)->first();
            return $rtl->ar;
        }
        else
            $ltr = Language::where('en',$text)->first();
                return $ltr->en;
    }

    // Company Data
    public static function company()
    {
        $company = Settings::find(1);
        return $company;
    }

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
   
    // date convertor
    public static function convert_date($date)
    {
        if ($date && $date < '1900-01-01') {
            require_once "vendor/jquery.calendars.package-2.0.1/Hijri_Gregorian.php";
            $DateConv = new Hijri_GregorianConvert;
            $format = "YYYY-MM-DD";
            $result = $DateConv->HijriToGregorian($date, $format);
            return (new datetime($result))->modify('-1 day')->format("Y-m-d");
        } else
            return $date;
    }

   
   

}
