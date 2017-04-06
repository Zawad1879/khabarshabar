<?php $this->extend('/Layouts/default'); ?>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.3.1/fullcalendar.css" />
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script>
<script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script>
</head>

<script>
$(document).ready(function() {
    // page is now ready, initialize the calendar...
    $('#calendar').fullCalendar({
        // put your options and callbacks here
    header:  {
      left:   'today prev,next',
      center: 'title',
      right:  'month,agendaWeek,agendaDay'
    },

    events: [
        {
            title: 'Event1',
            start: '2017-04-08',
            end: '2017-04-09',
            color: 'rgb(255,0,0)'
        },
        {
            title: 'Event2',
            start: '2011-05-05'
        }
        // etc...
    ],
    selectable: true,
    editable: true

    })
});
</script>
<div class="panel panel-success" style="margin-top:20px;">
  <div class="panel-heading" style="margin-bottom:15px;">
    <h3>Schedule a diet plan</h3>
  </div>
<div id='calendar'></div>
</div>
