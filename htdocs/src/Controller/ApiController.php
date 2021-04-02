<?php

namespace Controller;

use App\DB;

class ApiController{
    function nihList(){
        if(!(isset($_GET['pageNo']) && isset($_GET['numOfRows']))) return go("/openCulture","필수값을 입력해 주세요.");
        $pageNo = $_GET['pageNo'];
        $numOfRows = $_GET['numOfRows'];
        $bcodeName = isset($_GET['bcodeName']) ? "%".$_GET['bcodeName']."%" : "";
        $start = ($pageNo * $numOfRows) - 1;
        $end = $start + $numOfRows;

        $items = [];
        if($bcodeName == ""){
            $sql = "SELECT ccbaKdcd,ccbaAsno,ccbaCtcd,ccbaCpno,ccmaName,ccbaMnm1,ccbaMnm2,gcodeName,bcodeName,mcodeName,scodeName,ccbaQuan,ccbaAsdt,ccbaCtcdNm,ccsiName,ccbaLcad,ccceName,ccbaPoss,ccbaAdmin,ccbaCncl,ccbaCndt,`image`,content FROM cultures LIMIT $start, $numOfRows";
            $items = DB::fetchAll($sql);
        }else{
            $sql = "SELECT ccbaKdcd,ccbaAsno,ccbaCtcd,ccbaCpno,ccmaName,ccbaMnm1,ccbaMnm2,gcodeName,bcodeName,mcodeName,scodeName,ccbaQuan,ccbaAsdt,ccbaCtcdNm,ccsiName,ccbaLcad,ccceName,ccbaPoss,ccbaAdmin,ccbaCncl,ccbaCndt,`image`,content FROM cultures WHERE bcodeName LIKE '$bcodeName' LIMIT $start, $numOfRows";
            $items = DB::fetchAll($sql,[$bcodeName]);
        }

        foreach($items as $item){
            $item->image = base64_upload($item->image);
        }

        $data = [];
        $data["pageNo"] = $pageNo;
        $data["totalCount"] = count($items);
        $data["numOfRows"] = $numOfRows;
        $data["items"] = $items;
        echo json_encode($data);
    }

    function showList(){
        if(!(isset($_GET['searchType']) && isset($_GET['year']))) return go("/openShow","필수값을 입력해주세요.");
        $searchType = $_GET['searchType'];
        $year = $_GET['year'];
        if($searchType == "M" && !isset($_GET['month'])) return go("/openShow","필수값을 입력해주세요.");
        if($searchType == "Y"){
            $start = "{$year}-01-01";
            $end = "{$year}-12-31";
            $sql = "SELECT * FROM shows WHERE `showDate` >= ? AND `showDate` <= ?";
            $data = DB::fetchAll($sql,[$start,$end]);
            $items = [];
            foreach($data as $item){
                $input = [];
                $input['showUid'] = $item->showUid;
                $input['showName'] = $item->showName;
                $input['showDt'] = $item->showDate." ".$item->showTime;
                $input['organizer'] = $item->organizer;
                $input['place'] = $item->place;
                $input['cast'] = $item->cast;
                $input['rm'] = $item->rm;
                $items[] = $input;
            }

            $result = [];
            $result['showType'] = $searchType;
            $result['year'] = $year;
            $result["month"] = "";
            $result['totalCount'] = count($items);
            $result['items'] = $items;
        }else{
            $month = $_GET['month'];
            $start = "{$year}-{$month}-01";
            $end = "{$year}-{$month}-".date("t",strtotime("{$year}-{$month}"));
            $sql = "SELECT * FROM shows WHERE `showDate` >= ? AND `showDate` <= ?";
            $data = DB::fetchAll($sql,[$start,$end]);
            $items = [];
            foreach($data as $item){
                $input = [];
                $input['showUid'] = $item->showUid;
                $input['showName'] = $item->showName;
                $input['showDt'] = $item->showDate." ".$item->showTime;
                $input['organizer'] = $item->organizer;
                $input['place'] = $item->place;
                $input['cast'] = $item->cast;
                $input['rm'] = $item->rm;
                $items[] = $input;
            }

            $result = [];
            $result['showType'] = $searchType;
            $result['year'] = $year;
            $result["month"] = $month;
            $result['totalCount'] = count($items);
            $result['items'] = $items;

        }

        echo json_encode($result);
    }
}