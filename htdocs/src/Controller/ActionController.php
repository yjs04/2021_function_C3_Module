<?php

namespace Controller;

use App\DB;

class ActionController{
    function addCultureProccess(){
        extract($_POST);
        $sql = "INSERT INTO `cultures`(`no`, `ccmaName`,`crltsnoNm`,`ccbaMnm1`,`ccbaMnm2`,`ccbaCtcdNm`,`ccsiName`,`ccbaAdmin`,`ccbaKdcd`,`ccbaAsno`,`ccbaCtcd`,`ccbaCncl`,`ccbaCpno`,`longitude`,`latitude`,`gcodeName`,`bcodeName`,`scodeName`,`mcodeName`,`ccbaQuan`,`ccbaAsdt`,`ccbaLcad`,`ccceName`,`ccbaPoss`,`ccbaCndt`,`image`,`content`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        if($_FILES['image']) $image = image_upload($_FILES['image']);
        DB::query($sql,[$no,$ccmaName,$crltsnoNm,$ccbaMnm1,$ccbaMnm2,$ccbaCtcdNm,$ccsiName,$ccbaAdmin,$ccbaKdcd,$ccbaAsno,$ccbaCtcd,$ccbaCncl,$ccbaCpno,$longitude,$latitude,$gcodeName,$bcodeName,$scodeName,$mcodeName,$ccbaQuan,$ccbaAsdt,$ccbaLcad,$ccceName,$ccbaPoss,$ccbaCndt,$image,$content]);
        go("/cultures","문화재가 등록되었습니다.");
    }

    function modCultureProccess($id){
        extract($_POST);
        $culture = DB::fetch("SELECT `image` FROM cultures WHERE sn = ? ",[$id])->image;
        if(isset($imageDel) && $imageDel == "on"){unlink(IMAGE."/$culture");$image = "";}
        else{
            if($_FILES['image'] !== []) $image = image_upload($_FILES['image']);         
            else $image = $culture;
        }
        $sql = "UPDATE cultures SET `no`=?, `ccmaName`=?,`crltsnoNm`=?,`ccbaMnm1`=?,`ccbaMnm2`=?,`ccbaCtcdNm`=?,`ccsiName`=?,`ccbaAdmin`=?,`ccbaKdcd`=?,`ccbaAsno`=?,`ccbaCtcd`=?,`ccbaCncl`=?,`ccbaCpno`=?,`longitude`=?,`latitude`=?,`gcodeName`=?,`bcodeName`=?,`scodeName`=?,`mcodeName`=?,`ccbaQuan`=?,`ccbaAsdt`=?,`ccbaLcad`=?,`ccceName`=?,`ccbaPoss`=?,`ccbaCndt`=?,`image`=?,`content`=? WHERE sn = ?";
        DB::query($sql,[$no,$ccmaName,$crltsnoNm,$ccbaMnm1,$ccbaMnm2,$ccbaCtcdNm,$ccsiName,$ccbaAdmin,$ccbaKdcd,$ccbaAsno,$ccbaCtcd,$ccbaCncl,$ccbaCpno,$longitude,$latitude,$gcodeName,$bcodeName,$scodeName,$mcodeName,$ccbaQuan,$ccbaAsdt,$ccbaLcad,$ccceName,$ccbaPoss,$ccbaCndt,$image,$content,$id]);
        go("/cultures","문화재가 수정되었습니다.");
    }

    function delCultureProccess($id){
        $sql = "DELETE FROM cultures WHERE sn = ?";
        DB::query($sql,[$id]);
        go("/cultures","문화재가 삭제되었습니다.");
    }

    function addShowProccess(){
        extract($_POST);
        $sql = "INSERT INTO shows(`showName`,`showDate`,`showTime`,`organizer`,`place`,`cast`,`rm`,`registDt`) VALUES (?,?,?,?,?,?,?,?)";
        DB::query($sql,[$showName,$showDate,$showTime,$organizer,$place,$cast,$rm,date("Y-m-d")]);
        dbBack("공연일정이 등록되었습니다.");
    }

    function modShowProccess($id){
        extract($_POST);
        $sql = "UPDATE shows SET `showName` = ?, `showDate` = ?, `showTime` = ?, `organizer` = ?, `place` = ?, `cast` = ?, `rm` = ?, `updtDt` = ? WHERE `showUid` = ?";
        DB::query($sql,[$showName,$showDate,$showTime,$organizer,$place,$cast,$rm,date("Y-m-d"),$id]);
        dbBack("공연일정이 수정되었습니다.");
    }

    function delShowProccess($id){
        $sql = "DELETE FROM shows WHERE showUid = ?";
        DB::query($sql,[$id]);
        dbBack("공연일정이 삭제되었습니다.");
    }

    function loadImage(){
        $name = $_GET['name'];
        $path = IMAGE . DIRECTORY_SEPARATOR . $name;
        if(!file_exists($path)) return exit;
        header('Content-Description:application/octet-stream');
        header("Content-Disposition:attachment;filename=$name");
        header("Content-Length:".filesize($path));
        readfile($path);  
    }
}