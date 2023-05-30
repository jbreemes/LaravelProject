<!DOCTYPE html>
<meta charset='utf-8' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'timeGridWeek,timeGridDay'
        },
        events: [
            @foreach($events as $event)
                {
                    title: '{{ $event->title }}',
                    name: '{{ $event->name }}',
                    start: '{{ $event->start_time }}',
                    end: '{{ $event->end_time }}',
                    url: "{{ route('afspraak.show', ['idAfspraak' => $event->idAfspraak, 'Klant_idKlant' => $event->Klant_idKlant, 'Admin_idAdmin' => $event->Admin_idAdmin, 'employee_id' => $event->employee_id]) }}",
                    extendedProps: { name: '{{ $event->name }}' }
                },
            @endforeach
        ],        
        eventContent: function(info) {
            return {
                html: '<b>' + info.event.title + '</b><br><small>' + info.event.extendedProps.name + '</small>'
            };
        }
    });
    calendar.render();
});
</script>
<head>
<style>
        body {
            background-color: #C5E0DC;
            font-family: 'Courier New', Courier, monospace;
            font-size: 16px;
            line-height: 1.5;
        }
        
        #calendar-container {
            margin: 20px;
        }
        
        #calendar {
            background-color: #F8ECD4;
            border: 1px solid #555;
        }
        
        .fc-header-toolbar {
            background-color: #F8ECD4;
            border: 1px solid #555;
            border-radius: 5px;
        }
        
        .fc-header-toolbar button {
            background-color: #F8ECD4;
            border: 1px solid #555;
            border-radius: 5px;
            color: #555;
            font-size: 14px;
        }
        
        .fc-header-toolbar button:hover {
            background-color: #555;
            color: #F8ECD4;
        }
        
        .fc-daygrid-event {
            background-color: #A7D8B3;
            border: 1px solid #555;
            border-radius: 5px;
            color: #555;
        }
        
        .fc-daygrid-event:hover {
            background-color: #555;
            color: #A7D8B3;
        }
        
        .fc-daygrid-event .fc-event-title {
            font-weight: bold;
        }
    </style>
</head>

<body>

<div id='calendar-container'>
    <div id='calendar'></div>
</div>

</body>


</html>