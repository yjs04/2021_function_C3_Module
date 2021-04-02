<?php

namespace Controller;

use App\DB;

class ViewController{
    function index(){view("index");}
    function phone(){view("phone");}
    function history(){view("history");}
    function cultures(){
        $type = isset($_GET['type']) ? $_GET['type'] : "list";
        $bcode = isset($_GET['bcode']) ? $_GET['bcode'] : "";
        if($bcode == "") {
            $sql = "SELECT * FROM cultures ORDER BY `sn` ASC";
            $item = pagination(DB::fetchAll($sql),$type);
        } else{
            $sql = "SELECT * FROM cultures WHERE bcodename = ? ORDER BY `sn` ASC";
            $item = pagination(DB::fetchAll($sql,[$bcode]),$type);
        }

        view("cultures",compact("item","bcode","type"));
    }

    function addCulture(){view("addCulture");}
    function modCulture($id){
        $data = DB::fetch("SELECT * FROM cultures WHERE `sn` = ?",[$id]);
        view("modCulture",compact("data"));
    }

    function monthShow(){
        $year = isset($_GET["year"]) ? $_GET['year'] : date("Y");
        $month = isset($_GET["month"]) ? $_GET["month"] : date("m");

        $calendar = calendar($year,$month);
        $sql = "SELECT * FROM shows WHERE `showDate` >= ? AND `showDate` <= ? ORDER BY `showDate` ASC";
        $data = DB::fetchAll($sql,[date("Y-m-d",$calendar['first']),date("Y-m-d",$calendar['last'])]);
        view("monthShow",compact("year","month","data","calendar"));
    }

    function yearShow(){
        $year = isset($_GET["year"]) ? $_GET["year"] : 2021;
        $sql = "SELECT * FROM shows WHERE `showDate` >= ? AND `showDate` <= ? ORDER BY `showDate` ASC";
        $data = DB::fetchAll($sql,["{$year}-01-01","{$year}-12-31"]);
        $prev = date("Y",strtotime("{$year}-01-01"."-1 year"));
        $next = date("Y",strtotime("{$year}-01-01"."+1 year"));
        view("yearShow",compact("data","year","prev","next"));
    }

    function addShow(){view("addShow");}
    function modShow($id){
        $data = DB::fetch("SELECT * FROM shows WHERE `showUid` = ?",[$id]);
        view("modShow",compact("data"));
    }

    function openCulture(){view("openCulture");}
    function openShow(){view("openShow");}
}