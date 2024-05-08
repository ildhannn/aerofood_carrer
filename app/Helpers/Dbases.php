<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;

class Dbases
{
    public static function json($arr) {
        echo json_encode($arr); die();
    }    

    public static function getFieldById($table, $column, $field, $id) {
        $db = DB::table($table)->where($field, $id)->first($column .' AS temp');
        if($db != null) {
            $str = $db->temp;
        }
        else {
            $str = "";
        }

        return $str;
    }

    public static function getFieldByTwoId($table, $column, $field, $id, $fields, $ids) {
        $db = DB::table($table)->where($field, $id)->where($fields, $ids)->first($column .' AS temp');
        if($db != null) {
            $str = $db->temp;
        }
        else {
            $str = "";
        }

        return $str;
    }

    public static function getFieldByThreeId($table, $column, $field, $id, $fields, $ids, $fieldss, $idss) {
        $db = DB::table($table)->where($field, $id)->where($fields, $ids)->where($fieldss, $idss)->first($column .' AS temp');
        if($db != null) {
            $str = $db->temp;
        }
        else {
            $str = "";
        }

        return $str;
    }


    public static function getCount($table) {
        $db = DB::table($table)->count();
        if($db != null) {
            return $db;
        }
        else {
            return 0;
        }
    }

    public static function getCountById($table, $field, $id) {
        $db = DB::table($table)->where($field, $id)->count();
        if($db != null) {
            return $db;
        }
        else {
            return 0;
        }
    }

    public static function getCountByTwoId($table, $field, $id, $fields, $ids) {
        $db = DB::table($table)->where($field, $id)->where($fields, $ids)->count();
        if($db != null) {
            return $db;
        }
        else {
            return 0;
        }
    }

    public static function getCountByTripleId($table, $field, $id, $fields, $ids, $fieldss, $idss) {
        $db = DB::table($table)->where($field, $id)->where($fields, $ids)->where($fieldss, $idss)->count();
        if($db != null) {
            return $db;
        }
        else {
            return 0;
        }
    }


    public static function getOrder($table, $order, $by) {
        $db = DB::table($table)->orderBy($order, $by)->get();
        return $db;
    }

    public static function getByIdOrder($table, $field, $id, $order, $by) {
        $db = DB::table($table)->where($field, $id)->orderBy($order, $by)->get();
        return $db;
    }

    public static function getByTwoIdOrder($table, $field, $id, $order, $by) {
        $db = DB::table($table)->where($field, $id)->where($fields, $ids)->orderBy($order, $by)->get();
        return $db;
    }

    
    public static function getOrderLimit($table, $order, $by, $limit) {
        $db = DB::table($table)->orderBy($order, $by)->limit($limit)->get();
        return $db;
    }

    public static function getByIdOrderLimit($table, $field, $id, $order, $by, $limit) {
        $db = DB::table($table)->where($field, $id)->orderBy($order, $by)->limit($limit)->get();
        return $db;
    }

    public static function getByTwoIdOrderLimit($table, $field, $id, $order, $by, $limit) {
        $db = DB::table($table)->where($field, $id)->where($fields, $ids)->orderBy($order, $by)->limit($limit)->get();
        return $db;
    }
    

    public static function sumFieldById($table, $column, $field, $id) {
        $db = DB::table($table)->where($field, $id)->sum($column);
        if($db != null) {
            return $db;
        }
        else {
            return 0;
        }
    }

    public static function setFieldById($table, $column, $value, $field, $id) {
        $db = DB::table($table)->where($field, $id)->update([$column => $value]);
        if($db != null) {
            return $db;
        }
        else {
            return 0;
        }
    }

    

    



    

}
