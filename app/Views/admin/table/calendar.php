<head>
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.3.0/dist/fullcalendar.min.css" rel="stylesheet" />

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.3.0/dist/fullcalendar.min.js"></script>
</head>

<body>
    <div id="calendar"></div>

    <script>
        $(document).ready(function () {
            $('#calendar').fullCalendar({
                events: '/admin/reservation/getCalendarEvents', // Récupère les événements via une API
                editable: true,
                droppable: true,
            });
        });
    </script>
</body>