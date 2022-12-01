<?php
    $alldata=["1"=>"kshitiz","2"=>"white","3"=>"chhetri"];
$groupedArray=[];

foreach($alldata as $data)
{
     if($groupedArray[$data[2]])
     {
        $groupedArray[$data[2]]=$data;
     }
     else{
        $groupedArray[$data[2]]=$data;
     }
}


?>