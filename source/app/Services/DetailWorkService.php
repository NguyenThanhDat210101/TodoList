<?php
require_once('../models/Model.php');
require_once('../models/config.php');
require_once('../models/Work.php');
require_once('../controllers/WorkController.php');
use App\Controllers\WorkController;
use App\Models\Work;

$model = new Work();
$workController = new WorkController($model);

$id = $_GET['workId'];
echo json_encode($workController->find($id));
