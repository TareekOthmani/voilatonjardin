<?php
include_once "connect.php";

    function data($data,$inputs){
        $arr=[];
        foreach($inputs as $input )
        $arr[$input]=isset($data[$input])?$data[$input]:"";
        return $arr;
    }
    if(isset($_POST['csrfmiddlewaretoken'])){
        $data=json_encode(data($_POST,["name_first","name_last","name_child","gender","profession","number","location"]));
        $sql = "INSERT INTO inscri ( metadata, club_id) VALUES (?,?)";
        $stm=$conn->prepare($sql);
        $stm->execute([$data, $_POST['club']]);
        header("Location:index.html");
    }
?>