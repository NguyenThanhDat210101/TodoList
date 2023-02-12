<?php
require_once('./app/models/Work.php');
require_once('./app/controllers/WorkController.php');

$model = new Work();
$workController = new WorkController($model);
?>
<div class="form-container space-top">
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
      
    });
    calendar.render();
  });
</script>