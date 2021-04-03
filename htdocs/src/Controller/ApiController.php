<?php

namespace Controller;

use App\DB;

class ApiController{
    function nihList(){
        $data = [];
        if(!(isset($_GET['pageNo']) && isset($_GET['numOfRows']))){
            $data["statusCd"] = "400 Bad Request";
            $data["statusMsg"] = "필수 요청 항목이 없습니다.";
        }else{
            $pageNo = $_GET['pageNo'];
            $numOfRows = $_GET['numOfRows'];
            $bcodeName = isset($_GET['bcodeName']) ? "%".$_GET['bcodeName']."%" : "";
            $start = ($pageNo - 1 ) * $numOfRows;
            $end = $start + $numOfRows;
            $items = [];
            
            if($bcodeName == ""){
                $sql = "SELECT ccbaKdcd,ccbaAsno,ccbaCtcd,ccbaCpno,ccmaName,ccbaMnm1,ccbaMnm2,gcodeName,bcodeName,mcodeName,scodeName,ccbaQuan,ccbaAsdt,ccbaCtcdNm,ccsiName,ccbaLcad,ccceName,ccbaPoss,ccbaAdmin,ccbaCncl,ccbaCndt,`image`,content FROM cultures";
                $items = DB::fetchAll($sql);
                $items = array_slice($items,$start,$end);
            }else{
                $sql = "SELECT ccbaKdcd,ccbaAsno,ccbaCtcd,ccbaCpno,ccmaName,ccbaMnm1,ccbaMnm2,gcodeName,bcodeName,mcodeName,scodeName,ccbaQuan,ccbaAsdt,ccbaCtcdNm,ccsiName,ccbaLcad,ccceName,ccbaPoss,ccbaAdmin,ccbaCncl,ccbaCndt,`image`,content FROM cultures WHERE bcodeName LIKE ?";
                $items = DB::fetchAll($sql,[$bcodeName]);
                $items = array_slice($items,$start,$end);
            }
    
            foreach($items as $item) $item->image = $item->image == "" ? "" : base64_upload($item->image);
    
            $data["pageNo"] = $pageNo;
            $data["totalCount"] = count($items);
            $data["numOfRows"] = $numOfRows;
            $data["items"] = $items;    
        }
        
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    function showList(){
        $result = [];
        if(!(isset($_GET['searchType']) && isset($_GET['year']))){
            $result["statusCd"] = "400 Bad Request";
            $result["statusMsg"] = "필수 요청 항목이 없습니다.";
        }else{
            $searchType = $_GET['searchType'];
            $year = $_GET['year'];
            if($searchType == "M" && !isset($_GET['month'])){
                $result["statusCd"] = "400 Bad Request";
                $result["statusMsg"] = "필수 요청 항목이 없습니다.";
            }else{
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
                    
                    $result['showType'] = $searchType;
                    $result['year'] = $year;
                    $result["month"] = $month;
                    $result['totalCount'] = count($items);
                    $result['items'] = $items;
        
                }
            }
        }

        echo json_encode($result);
    }
}