<?php
$errorMSG = [];
//Check required field name
if (empty($_POST['name'])) {
    $errorMSG[] = str_replace(':attribute', 'Name', $message['required']);
}
//Check required field start_date
if (empty($_POST['start_date'])) {
    $errorMSG[] = str_replace(':attribute', 'Start Date', $message['required']);
}
//Check required field end_date
if (empty($_POST['end_date'])) {
    $errorMSG[] = str_replace(':attribute', 'End Date', $message['required']);
}
//Check required field status
if (!isset($_POST['status'])) {
    $errorMSG[] = str_replace(':attribute', 'Status', $message['required']);
}
//Check numeric field status
if (isset($_POST['status']) && !is_numeric($_POST['status'])) {
    $errorMSG[] = str_replace(':attribute', 'Status', $message['numeric']);
}
