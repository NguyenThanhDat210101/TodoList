<?php
require_once('./app/validator/CreateWorkValidate.php');
if (isset($_POST['create'])) {
    $dataInsert = $_POST;
    unset($dataInsert['create']);
    if (empty($errorMSG)) {
        $workController->insert($dataInsert);
    } else {
        $message = '<div class="form-save">
                        <div class="alert alert-danger" role="alert">
                            <p>';
                        foreach ($errorMSG as $detailMSG) {
                            $message .= $detailMSG . '<br>';
                        }
                        $message .= '</p>
                        </div>
                    </div>';
        echo $message;
    }
}
?>
<!-- Modal -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post" id="insert_form">
                <div class="modal-header">
                    <h5 class="modal-title">Screen Create</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <!-- Work name -->
                        <div class="row">
                            <div class="col">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <!-- Start date -->
                        <div class="row">
                            <div class="col">
                                <label for="name">Start Date</label>
                                <input type="datetime-local" class="form-control" name="start_date" id="start_date">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col">
                                <label for="name">End Date</label>
                                <input type="datetime-local" class="form-control" name="end_date" id="end_date">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <!-- Status -->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <?php foreach ($statusWorks as $status) {
                                        }
                                        ?>
                                        <?php foreach ($statusWorks as $key => $status) { ?>
                                            <tr>
                                                <option value="<?php echo $key; ?>"><?php echo $status; ?></option>
                                            </tr>
                                        <?php }; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="create">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>