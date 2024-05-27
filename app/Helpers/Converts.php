<?php

namespace App\Helpers;
use Carbon\Carbon;

class Converts
{
    public static function formatNegara($val)
    {
        if($val = "1") {
            $str = "Indonesia";
        }
        else {
            $str = $val;
        }

        return $str;
    }

    public static function formatRupiah($val)
    {
        if($val != "") {
            $str = "Rp. ";
            $str .= number_format($val);
        }
        else {
            $str = "-";
        }

        return $str;
    }

    public static function formatUsia($val)
    {
        
        if($val != "") {
            $age = Converts::generateAge($val);
            $str = Converts::formatYmdToDmy($val);
            
            $str .= " ( Usia: ";
            $str .= $age ." Tahun";
            $str .= " )";
        }
        else {
            $str = "-";
        }

        return $str;
    }

    public static function formatDmyToYmd($val)
    {
        $str = "";
        if($val != "") {
            $str = Carbon::createFromFormat('D-m-Y', $val)->format('Y-m-d');
        }
        
        return $str;
    }
    
    public static function formatYmdToDmy($val)
    {
        $str = "";
        if($val != "") {
            $str = Carbon::createFromFormat('Y-m-d', $val)->format('d-m-Y');
        }
        
        return $str;
    }

    public static function generateAge($date)
    {
        $val = Carbon::parse($date)->age;
        return $val;
    }


    public static function generateYear()
    {
        $now = Carbon::now();
        $yearNow  = Carbon::createFromFormat('Y-m-d H:i:s', $now)->format('Y'); 
        
        $arr = array();
        for($i=0; $i<=2; $i++) {
            $arr[] = intval($yearNow) - $i;
        }
        
        return $arr;
    }

    public static function convertHtmlToText($str) {
        $str = strip_tags($str);
        $str = utf8_decode($str);
        $str = str_replace("&nbsp;", " ", $str);
        $str = preg_replace('/\s+/', ' ',$str);
        $str = trim($str);

        return $str;
    }

    public static function str_ellipsis($text, $length) {
        $text = Status::convertHtmlToText($text);
        if(strlen($text) > $length) {
            $str = substr($text, 0, $length) ." ...";
        }
        else {
            $str = $text;
        }

        return $str;
    }

    public static function monthName($value) {
        switch($value) {
            case "01" :
                $string = 'Januari';
            break;
            case "02" :
                $string = 'Februari';
            break;
            case "03" :
                $string = 'Maret';
            break;
            case "04" :
                $string = 'April';
            break;
            case "05" :
                $string = 'Mei';
            break;
            case "06" :
                $string = 'Juni';
            break;
            case "07" :
                $string = 'Juli';
            break;
            case "08" :
                $string = 'Agustus';
            break;
            case "09" :
                $string = 'September';
            break;
            case "10" :
                $string = 'Oktober';
            break;
            case "11" :
                $string = 'November';
            break;
            case "12" :
                $string = 'Desember';
            break;
            
            default :
                $string = '-';
            break;
        }

        return $string;
    }

    public static function dayStartInMonth() {
        $now = Carbon::now();     
        $firstDay = $now->firstOfMonth(); 
        $string = Carbon::createFromFormat('Y-m-d H:i:s', $firstDay)
                    ->format('d-m-Y'); 

        return $string;
    }

    public static function dayEndInMonth() {
        $now = Carbon::now();     
        $lastDay = $now->lastOfMonth();        
        $string  = Carbon::createFromFormat('Y-m-d H:i:s', $lastDay)
                    ->format('d-m-Y'); 

        return $string;
    }

    public static function dayCountInMonth() {
        $now = Carbon::now();     
        $firstDay = $now->firstOfMonth(); 
        $startDay = Carbon::createFromFormat('Y-m-d H:i:s', $firstDay)
                    ->format('d'); 
        $lastDay = $now->lastOfMonth();        
        $endDay  = Carbon::createFromFormat('Y-m-d H:i:s', $lastDay)
                    ->format('d'); 

        $count = intval($endDay) - intval($startDay);
        $count = $count + 1;
        return $count;
    }
    
    public static function bytesToHuman($bytes)
    {
        // $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        // return round($bytes, 2) . ' ' . $units[$i];
        return round($bytes);
    }
       

}
