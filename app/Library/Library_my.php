<?php
namespace App\Library;
 class Library_my
 {
    public static function category_listid($list,$parentid,$arr)
    {

        foreach($list as $row)
            {
                if($row->parentid==$parentid)
                {
                    $arr[]=$row->id;
                    Library_my::category_listid($list,$row->id,$arr);
                }
            }
        return $arr;
    }
    public static function catid($list,$catid,$arr)
    {
        foreach ($list as $row)
        {
            if($row->catid==$catid)
            {
                $arr[]=$row->catid;
                Library_my::catid($list,$row->catid,$arr);
            }
        }
        return $arr;
    }
    public static function newsid($list, $topid,$arr)
    {
        foreach ($list as $row)
        {
            if ($row->topid==$topid)
            {
                $arr[]=$row->topid;
                Library_my::newsid($list,$row->topid,$arr);
            }
        } 
        return $arr;
    }
   
 }

