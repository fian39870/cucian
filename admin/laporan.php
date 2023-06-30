<?php
include "../config.php";
$collection_datapaket = $db->laporan;
$aggregate = array(
    array(
    '$lookup' => array(
        'from' => 'transaksi',
        'localField' => 'transaksi_id',
        'foreignField' => '_id',
        'as' => 'hasil'
    ),
),
);
$results = $collection_datapaket->aggregate($aggregate);
foreach($results as $hasil){
    echo $hasil['nama'];
}
?>