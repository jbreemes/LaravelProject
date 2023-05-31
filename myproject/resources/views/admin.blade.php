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
            @foreach($afspraak as $event)
                {
                    title: '{{ $event->title }}',
                    start: '{{ $event->start_time }}',
                    end: '{{ $event->end_time }}',
                    

                },
            @endforeach
        ],
    });
    calendar.render();
});

</script>

<head>
<style>
        /* Add retro-style colors */
        body {
            background-color: #e7b7a3;
            color: #1a1a1a;
            font-family: 'Courier New', Courier, monospace;
            font-size: 16px;
            
            padding: 10px;
        }
        #calendar-container {
            background-color: #d9927e;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 40px;
            border: 5px solid black;
        }
        #calendar {
        margin-bottom: 20px;
    }

    h1 {
        font-size: 32px;
        margin-bottom: 20px;
        border-bottom: 3px solid black;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        border: 3px solid black;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid black;
    }

    th {
        background-color: #d9927e;
        border-right: 1px solid black;
    }

    /* Style the form for making appointments */
    #maak_afspraak {
        background-color: #d9927e;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 40px;
        border: 5px solid black;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"], input[type="datetime-local"], input[type="number"] {
        display: block;
        margin-bottom: 20px;
        padding: 10px;
        border-radius: 4px;
        border: none;
        background-color: #e7b7a3;
        color: #1a1a1a;
        width: 100%;
    }

    button[type="submit"] {
        background-color: #1a1a1a;
        color: #e7b7a3;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #d9927e;
        color: #1a1a1a;
    }

    /* Style the Register an Employee button */
    #register-employee-btn {
        background-color: #1a1a1a;
        color: #e7b7a3;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        margin-bottom: 20px;
    }

    #register-employee-btn:hover {
        background-color: #d9927e;
        color: #1a1a1a;
    }

    /* Style the success message */
    .alert-success {
        background-color: #7ab7a5;
        color: #1a1a1a;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 20px;
        border: 3px solid black;
    }



</style>

</head>



<button id="register-employee-btn" onclick="location.href='/register-employee';">Register an Employee</button>
<body>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div id='calendar-container'>
    <div id='calendar'></div>
</div>

<div id="maak_afspraak">
    <form method="POST" action="{{ route('afspraak.store') }}">
        @csrf
        <label for="title">Titel:</label>
        <input type="text" name="title" id="title">

        <label for="name">Werker:</label> 
        <input type="text" name="name" id="name" readonly>
        <select name="worker" id="worker-dropdown" multiple >
        @foreach($workers as $worker)
        <option value="{{ $worker->name }}">{{ $worker->name }}</option>
        @endforeach
        </select>
        <script>
        const dropdownElement = document.getElementById('worker-dropdown');
        const nameInputElement = document.getElementById('name');
        dropdownElement.addEventListener('change', function () {
        const selectedOptions = Array.from(dropdownElement.selectedOptions);
        const selectedNames = selectedOptions.map(option => option.value);
        nameInputElement.value = selectedNames.join(', ');
        });
        </script>

        <label for="start_time">Start Tijd:</label>
        <input type="datetime-local" name="start_time" id="start_time">

        <label for="end_time">Eind Tijd:</label>
        <input type="datetime-local" name="end_time" id="end_time">

        <label for="klant_id">Klant ID:</label>
        <input type="number" name="klant_id" id="klant_id">

        <button type="submit">Afspraak maken</button>
    </form>
</div>


 <div id ='Klant_afspraak'>
    <h1>Afspraken</h1>
    <form method="POST" action="{{ route('deleteAppointments') }}">
        @csrf
        @method('DELETE')
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Start tijd</th>
                    <th>Eind tijd</th>
                    <th>Adres met aanmerkingen</th>
                    <th>Klant ID</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->idappointments }}</td>
                        <td>{{ $appointment->name }}</td>
                        <td>{{ $appointment->start_time }}</td>
                        <td>{{ $appointment->end_time }}</td>
                        <td>{{ $appointment->notes }}</td>
                        <td>{{ $appointment->idKlant }}</td>
                        <td><input type="checkbox" name="appointments[]" value="{{ $appointment->idappointments }}"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit">Delete Selected</button>
    </form>
</div>


</body>


</html>
