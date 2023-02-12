<?php
$works = $workController->getList();
foreach ($works as $key => $value) {
    switch ($works[$key]['color']) {
        case 0:
            $works[$key]['color'] = '#dac42a';
            break;
        case 1:
            $works[$key]['color'] = '#368ee5';
            break;
        case 2:
            $works[$key]['color'] = '#257e4a';
            break;
    }
}
?>
<div>
    <div id="calendar" class="form-save"></div>
</div>