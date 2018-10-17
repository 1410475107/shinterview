<?php
require('./common/admin.php');
$data = $_POST;
$data['aid'] = $_SESSION['aid'];
$data['username'] = $_SESSION['username'];

// $r = $mysql->insertData('cate', $data);
$cid = $data['cid'];
//销毁cid
unset($data['cid']);
if($cid){ //修改数据
    $data['updatetimes'] = date('Y-m-d H:i:s');
    $r = $mysql->updateData('cate', $data, 'cid = ' . $cid);
}else{
    $data['addtimes'] = date('Y-m-d H:i:s');
    $r = $mysql->insertData('cate', $data);
}
if ($r) {
    echo json_encode(['r'=>'ok', 'id'=>100]);
} else {
    echo json_encode(['r'=>'fail']);
}
