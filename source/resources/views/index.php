<?php
require_once('./app/models/Work.php');
require_once('./app/controllers/WorkController.php');
// You can use to variable message in file message.php
require_once('./app/label/message.php');
require_once('./app/label/works/status.php');

$model = new Work();
$workController = new WorkController($model);
?>
<div class="form-container space-top">
  <!-- create -->
  <?php require_once('./resources/views/create.php'); ?>
  <!-- Edit -->
  <?php require_once('./resources/views/edit.php'); ?>
  <!-- Table list -->
  <?php require_once('./resources/views/table.php'); ?>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    let currentDate = new Date();
    let calendarEl = document.getElementById('calendar');
    let calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      initialDate: currentDate,
      navLinks: true,
      events: <?php echo json_encode($works); ?>,
      editable: true,
      eventClick: function(event) {
        let workId = event.event._def.publicId;
        $('#modalEdit').modal('show');
        $.ajax({
          url: "./app/Services/DetailWorkService.php",
          type: "GET",
          data: {
            workId: workId
          },
          success: function(result) {
            let work = $.parseJSON(result);
            $('#id_edit').val(work.id);
            $('#name_edit').val(work.name);
            $('#end_date_edit').val(work.end_date);
            $('#start_date_edit').val(work.start_date);
            $('#status_edit').val(work.status);
          }
        });
      },
      dateClick: function(date) {
        $('#modalCreate').modal('show');
        // Set data hours have two number
        let hours = currentDate.getHours();
        hourStartDate = (hours < 10 ? "0" : "") + hours;
        hourEndDate = (hours < 10 ? "0" : "") + (parseInt(hours) + 1);
        // Set data minute have two number
        let minute = currentDate.getMinutes();
        minute = (minute < 10 ? "0" : "") + minute;
        // Get date time date is checked
        let dateFormat = /^\d{4}-\d{2}-\d{2}$/;
        let dateTime = date.dateStr;
        if (dateFormat.test(dateTime)) {
          startDate = dateTime + 'T' + hourStartDate + ':' + minute;
          endDate = dateTime + 'T' + hourEndDate + ':' + minute;
        } else {
          startDate = endDate = dateTime.slice(0, 16);
        }
        // Set value to start date and end date
        $('#start_date').val(startDate);
        $('#end_date').val(endDate);
      }
    });
    calendar.render();

    //Validate insert_form
    $("#insert_form").validate({
      rules: {
        name: {
          required: true,
          maxlength: 255
        },
        start_date: {
          required: true,
          date: true,
        },
        end_date: {
          required: true,
          date: true,
        },
        status: {
          required: true,
          min: 0,
          max: 2
        }
      },
      messages: {
        name: {
          required: "Name is required",
          minlength: "Max length name is 255"
        },
        start_date: {
          required: "Start Date is required",
          date: "Start Date is invalid",
        },
        end_date: {
          required: "End date is required",
          date: "End date is invalid",
        },
        status: {
          required: "Status is required",
          min: "Invalid status",
          max: "Invalid status",
        }
      },
    });

    //Validate edit_form
    $("#edit_form").validate({
      rules: {
        name: {
          required: true,
          maxlength: 255
        },
        start_date: {
          required: true,
          date: true,
        },
        end_date: {
          required: true,
          date: true,
        },
        status: {
          required: true,
          min: 0,
          max: 2
        }
      },
      messages: {
        name: {
          required: "Name is required",
          minlength: "Max length name is 255"
        },
        start_date: {
          required: "Start Date is required",
          date: "Start Date is invalid",
        },
        end_date: {
          required: "End date is required",
          date: "End date is invalid",
        },
        status: {
          required: "Status is required",
          min: "Invalid status",
          max: "Invalid status",
        }
      },
    });
  });
</script>