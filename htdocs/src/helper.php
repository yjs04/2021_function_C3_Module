<?php

use App\DB;

function init(){
    if(count(DB::searchAll("cultures"))) return false;
    $xml = simplexml_load_file(XML."/nihList.xml");
    $totalCnt = (int)$xml->totalCnt;
    $sql = "INSERT INTO `cultures`(
        `no`, 
        `ccmaName`,
        `crltsnoNm`,
        `ccbaMnm1`,
        `ccbaMnm2`,
        `ccbaCtcdNm`,
        `ccsiName`,
        `ccbaAdmin`,
        `ccbaKdcd`,
        `ccbaAsno`,
        `ccbaCtcd`,
        `ccbaCncl`,
        `ccbaCpno`,
        `longitude`,
        `latitude`,
        `gcodeName`,
        `bcodeName`,
        `scodeName`,
        `mcodeName`,
        `ccbaQuan`,
        `ccbaAsdt`,
        `ccbaLcad`,
        `ccceName`,
        `ccbaPoss`,
        `ccbaCndt`,
        `image`,
        `content`)
        VALUES
        (?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?)";
    
    for($i = 0; $i < $totalCnt; $i++){
        $item = $xml->item[$i];
        $no = (string)$item->no; 
        $ccmaName = (string)$item->ccmaName;
        $crltsnoNm = (string)$item->crltsnoNm;
        $ccbaMnm1 = (string)$item->ccbaMnm1;
        $ccbaMnm2 = (string)$item->ccbaMnm2;
        $ccbaCtcdNm = (string)$item->ccbaCtcdNm;
        $ccsiName = (string)$item->ccsiName;
        $ccbaAdmin = (string)$item->ccbaAdmin;
        $ccbaKdcd = (string)$item->ccbaKdcd;
        $ccbaAsno = (string)$item->ccbaAsno;
        $ccbaCtcd = (string)$item->ccbaCtcd;
        $ccbaCncl = (string)$item->ccbaCncl;
        $ccbaCpno = (string)$item->ccbaCpno;
        $longitude = (string)$item->longitude;
        $latitude = (string)$item->latitude;
        $detail = simplexml_load_file(DETAIL."/{$ccbaKdcd}_{$ccbaCtcd}_{$ccbaAsno}.xml");
        $detail = $detail->item;
        $gcodeName = (string)$detail->gcodeName;
        $bcodeName = (string)$detail->bcodeName;
        $scodeName = (string)$detail->scodeName;
        $mcodeName = (string)$detail->mcodeName;
        $ccbaQuan = (string)$detail->ccbaQuan;
        $ccbaAsdt = (string)$detail->ccbaAsdt;
        $ccbaAsdt = date('Y-m-d',mktime(0,0,0,(int)substr($ccbaAsdt,4,2),(int)substr($ccbaAsdt,6,2),(int)substr($ccbaAsdt,0,4)));
        $ccbaLcad = (string)$detail->ccbaLcad;
        $ccceName = (string)$detail->ccceName;
        $ccbaPoss = (string)$detail->ccbaPoss;
        $ccbaCndt = (string)$detail->ccbaCndt;
        $image = (string)$detail->imageUrl;
        $content = (string)$detail->content;

        DB::query($sql,[$no,$ccmaName,$crltsnoNm,$ccbaMnm1,$ccbaMnm2,$ccbaCtcdNm,$ccsiName,$ccbaAdmin,$ccbaKdcd,$ccbaAsno,$ccbaCtcd,$ccbaCncl,$ccbaCpno,$longitude,$latitude,$gcodeName,$bcodeName,$scodeName,$mcodeName,$ccbaQuan,$ccbaAsdt,$ccbaLcad,$ccceName,$ccbaPoss,$ccbaCndt,$image,$content]);
    }

}

function view($name,$data=[]){
    extract($data);
    include_once VIEW."/header.php";
    include_once VIEW."/$name.php";
    include_once VIEW."/footer.php";
}

function go($url,$msg){
    echo "<script>alert('$msg'); location.href='$url'; </script>";
    exit;
}

function back($msg){
    echo "<script> alert('$msg'); history.back(); </script>";
    exit;
}

function dbBack($msg){
    echo "<script> alert('$msg'); history.go(-2); </script>";
    exit;
}

function extname($filename){
    return strtolower(substr($filename,strrpos($filename,".")));
}

function image_upload($file){
    $filename = time().extname($file['name']);
    move_uploaded_file($file['tmp_name'],IMAGE."/$filename");
    return $filename;
}

function base64_upload($data){
    $data = base64_encode(file_get_contents(IMAGE."/$data"));
    $filename = "data:image/jpg;base64,".$data;
    return $filename;
}

function pagination($data,$type){
    define("LIST_LENGTH",$type == "list" ? 10 : 8);
    define("BLOCK_LENGTH", 10);

    $totalPage = ceil(count($data) / LIST_LENGTH);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $block = ceil($page / BLOCK_LENGTH);
    $end = $block * BLOCK_LENGTH;
    $start = $end - BLOCK_LENGTH + 1;

    $prev_block = true;
    $prev = true;
    $next_block = true;
    $next = true;
    
    if($end >= $totalPage) {
        $end = $totalPage;
        $next_block = false;
    }

    if($start <= 1){
        $start = 1;
        $prev_block = false;
    }

    $next = $page + 1 > $totalPage ? false : true;
    $prev = $page - 1 < 1 ? false : true;

    $items = array_slice($data,($page - 1) * LIST_LENGTH,LIST_LENGTH);
    return compact("items","type","page","totalPage","end","start","prev","prev_block","next","next_block");
}

function calendar($year,$month){
    $first = strtotime("{$year}-{$month}-01");
    $start = $first;

    while(true){
        $day = date("w",$start);
        if($day == 0) break;
        $start = strtotime(date("Y-m-d",$start)."-1 day");
    }

    $prev_month = date("Y-m-d",strtotime(date("Y-m-d",$first)."-1 month"));
    $next_month = date("Y-m-d",strtotime(date("Y-m-d",$first)."+1 month"));

    $last = strtotime($next_month."-1 day");
    $end = $last;

    while(true){
        $day = date("w",$end);
        if($day == 6) break;
        $end = strtotime(date("Y-m-d",$end)."+1 day");
    }

    $prevQ = "/monthShow?year=".date("Y",strtotime($prev_month))."&month=".date("m",strtotime($prev_month));
    $nextQ = "/monthShow?year=".date("Y",strtotime($next_month))."&month=".date("m",strtotime($next_month));

    return compact("first","start","last","end","prevQ","nextQ");
}