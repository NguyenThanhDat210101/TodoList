<!doctype html>
<html lang="en">
<link rel="icon" href="./resources/images/icon.ico">
<head>
    <title>Todo List</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Custom CSS-->
    <link rel="stylesheet" href="./resources/css/cusstom.css">
    <link rel="stylesheet" href="./resources/js/jqueryui/jquery-ui.structure.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    require_once('./app/models/Model.php');
    require_once('./app/models/config.php');
    require_once('./app/models/Work.php');
    require_once('./app/controllers/WorkController.php');
    // You can use to variable message in file message.php
    require_once('./app/label/message.php');
    require_once('./app/label/works/status.php');
    require_once('./resources/views/index.php');
    ?>
    <!-- Optional JavaScript -->
    <script src="./resources/fullcalendar-6.1.4/dist/index.global.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./resources/js/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="./resources/js/jquery/jquery.validate.js" type="text/javascript"></script>
    <script src="./resources/js/jqueryui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>