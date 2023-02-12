<?php 
require_once('../models/Work.php');
$model = new Work();

$id = $_GET['workId'];
echo json_encode($model->find($id));