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
                    start: '{{ $event->start_time }}',
                    end: '{{ $event->end_time }}',
                    url: "{{ route('afspraak.show', ['idAfspraak' => $event->idAfspraak, 'Klant_idKlant' => $event->Klant_idKlant, 'Admin_idAdmin' => $event->Admin_idAdmin]) }}"

                },
            @endforeach
        ],
    });
    calendar.render();
});
</script>


<head>
  <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 20px;
}

/* Header styles */
header {
  background-color: #8B0000;
  color: white;
  display: flex;
  justify-content: space-between;
  padding: 10px;
  position: fixed;
  top: 0;
  width: 100%;
  box-shadow: 0 4px 2px -2px gray;
  z-index: 6;
}

header ul {
  display: flex;
  list-style-type: none;
  margin: 0;
  padding: 0;
}

header ul li {
  margin-left: 20px;
}

header ul li:first-child {
  margin-left: 0;
}

header ul li a {
  color: white;
  text-decoration: none;
}

header ul li a:hover {
  text-decoration: underline;
}

/* Hotbar styles */
.hotbar {
  background-color: #CD5C5C;
  display: flex;
  justify-content: space-between;
  padding: 10px;
  box-shadow: 0 2px 2px -2px gray;
}

/* Title styles */
.bg-image {
  background-image: url("https://cdn.pixabay.com/photo/2016/11/19/21/42/moving-1840347_960_720.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 500px;
  position: relative;
  text-align: center;
}

.title1 {
  font-size: 6em;
  margin: 0;
  padding-top: 100px;
  text-shadow: 3px 3px 0 #CD5C5C, 5px 5px 0 #8B0000;
  color: #fffafa;
}

.title2 {
  font-size: 3em;
  margin: 0;
  text-shadow: 3px 3px 0 #CD5C5C, 5px 5px 0 #8B0000;
  color: #fffafa;
}

/* About us styles */
.aboutus {
  background-color: #FFE4C4;
  padding: 50px;
  text-align: center;
}

.aboutus h1 {
  font-size: 3em;
  margin-top: 0;
}

.aboutus h3 {
  font-size: 1.5em;
  margin-top: 0;
}

.aboutus .h31 {
  margin-bottom: 0;
}

.aboutus button {
  background-color: #CD5C5C;
  border: none;
  border-radius: 5px;
  color: white;
  font-size: 1.2em;
  margin-top: 20px;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  
}

.aboutus button:hover {
  background-color: #8B0000;
  cursor: pointer;
}

.pic1 {
  display: block;
  margin: 0 auto;
  margin-top: 50px;
  max-width: 100%;
  height: auto;
}

/* FullCalendar */


#calendar-container {
  display: flex;
  align-items: center;
  justify-content: center;
}



#calendar {
  margin-top: 150px;
  margin-bottom: 50px;
  height:800px;
  width:900px;
  max-width: 900px;
  margin-right: auto;
  margin-left: auto;
  margin-bottom:500px;
  border-radius: 5px;
  background-color: #fff;
  box-shadow: 0 2px 2px -2px gray;
  padding: 10px 20px;
  border: 2px solid black;
}

#calendar-button-container {
  display: flex;
  align-items: center;
  margin-right: auto;
}

#my-button {
  background-color: #fff;
  color: black;
  padding: 10px 20px;
  border: 2px solid black;
  border-radius: 30px; 
  font-size: 1rem;
  cursor: pointer;
  margin-left: 275px;
  

}


.moving-company {
  max-width: 800px;
  margin-left: auto;
  margin-right: auto;
  padding: 20px;
  border-radius: 5px;
  background-color: #CD5C5C;
  box-shadow: 0 2px 2px -2px gray;
  height: 500px;
  margin-top: -450px;
  
}


/* pop up */
      .modal {
        display: none; 
        position: fixed; 
        z-index: 1; 
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto; 
        background-color: rgba(0, 0, 0, 0.4); 
        z-index: 4;
      }

      .modal-content {
        background-color: #fff;
        margin: 10% auto; 
        padding: 20px;
        border: 1px solid #888;
        width: 80%; 
      }

      .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }

      .close:hover,
      .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
      }

.modal-content input[type="number"], 
.modal-content input[type="text"], 
.modal-content input[type="datetime-local"], 
.modal-content textarea {
  background-color: #fff;
  border: 2px solid #000;
  border-radius: 5px;
  box-shadow: none;
  color: #000;
  font-size: 1.2em;
  margin-top: 5px;
  padding: 10px;
  width: 99%;
}

.modal-content button[type="submit"] {
  background-color: #000;
  border: none;
  border-radius: 30px;
  color: #fff;
  cursor: pointer;
  font-size: 1.2em;
  margin-top: 20px;
  padding: 10px 20px;
  text-align: center;
  transition: background-color 0.2s ease-in-out;
}

.modal-content button[type="submit"]:hover {
  background-color: #f1c40f;
  color: #000;
}


      h1 {
       font-size: 2em;
       margin-bottom: 1em;
      }

      .info-space {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    }

    .info-panel {
     width: 30%;
     padding: 10px;
     border: 1px solid black;
     margin-right: 10px;
     height: 550px;
    }

    /* footer */
    footer {
  background-color: #2f2f2f;
  color: #fff;
  padding: 50px 0;
}

footer h3 {
  color: #fff;
  font-size: 24px;
  margin-top: 0;
  margin-bottom: 20px;
}

footer p {
  color: #fff;
  font-size: 16px;
  line-height: 26px;
}

footer ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

footer ul li {
  font-size: 16px;
  line-height: 26px;
  margin-bottom: 10px;
}

footer ul li a {
  color: #fff;
}

footer ul li a:hover {
  text-decoration: underline;
}

footer .container {
  max-width: 1000px;
  margin: 0 auto;
}

footer hr {
  border: none;
  background-color: #fff;
  height: 1px;
  margin: 30px 0;
}

footer .text-center {
  text-align: center;
}

.forum-maken {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
  }


  </style>

</head>

<body>

<header>
  <div class="hotbar">
    <nav>
      <ul>
        <li><a href="#">Contact</a></li>
        <li><a href="#">About us</a></li>
        @auth
        <li>Logged in as {{ Auth::user()->email }}</li>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit">Logout</button>
        </form>
        <li><a href="{{ route('account') }}" class="btn btn-primary">Account</a></li>
        @else
        <div class="auth-buttons">
          <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
          <a href="{{ route('register') }}" class="btn btn-primary">Register Now</a>
        </div>
        @endauth
      </ul>
    </nav>
  </div>
</header>



</header>
<div class=bg-image> 
   <h1 class="title1"> We move it </h1>
<h2 class="title2"> your move is our business </h2>
</div>
 <img class="pic1" src="storage/moving.jpg"> <br> </div>

<div class="aboutus"> 
<h1>About us</h1>
    <h3> 
    Welkom bij WemoveIt, het verhuisbedrijf dat zich richt op het leveren van hoogwaardige verhuisdiensten tegen een betaalbare prijs. 
    Ons team van ervaren verhuizers is toegewijd aan het bieden van een stressvrije verhuiservaring voor onze klanten. </h3>
<h3 class="h31"> 
Bij WemoveIt begrijpen we dat verhuizen een van de meest stressvolle gebeurtenissen in iemands leven kan zijn. 
Daarom hebben we ons bedrijf opgericht met het doel om het verhuisproces eenvoudiger en efficiënter te maken voor onze klanten. 
We zijn er trots op dat we ons kunnen aanpassen aan de unieke behoeften van elke klant en hun verhuiservaring op maat kunnen maken. <br>
<button> Maak een afspraak </button></h3>
</div>


<h1>Vestegingen</h1>
<div class="info-space">
  <div class="info-panel" id="panel1"> <h3>Amsterdam:</h3>   
MoveIt heeft zich gevestigd als een gerenommeerd verhuisbedrijf in Amsterdam en heeft door de jaren heen een solide reputatie opgebouwd als een professionele en betrouwbare verhuisservice.<br> 
Met een team van ervaren verhuizers die bekend zijn met de drukke straten en grachten van Amsterdam, kan MoveIt verhuizingen uitvoeren in de hele stad en daarbuiten.
Het verhuisbedrijf biedt een breed scala aan verhuisservices, waaronder het inpakken en uitpakken van spullen, demontage en montage van meubels en het veilig transporteren van delicate en zware voorwerpen.<br>
 Klanten kunnen ook opslagfaciliteiten krijgen als ze hun spullen tijdelijk moeten opslaan.
MoveIt is trots op hun persoonlijke benadering van klantenservice en werkt nauw samen met elke klant om hun specifieke behoeften en wensen te begrijpen. Dit resulteert in een naadloze en stressvrije verhuizing voor elke klant.</div>
  <div class="info-panel" id="panel2"><h3>Flevoland:</h3> 
In Flevoland is MoveIt ook een bekend verhuisbedrijf dat klanten een professionele en betrouwbare verhuisservice biedt. Het bedrijf heeft een team van ervaren verhuizers die de stad en de omliggende gebieden goed kennen en efficiënt kunnen werken om de verhuizing zo soepel mogelijk te laten verlopen.<br>
MoveIt biedt een breed scala aan verhuisservices, waaronder het inpakken van spullen, het demonteren en monteren van meubels, en het veilig transporteren van delicate en zware spullen. Klanten kunnen ook opslagfaciliteiten krijgen als ze hun spullen tijdelijk moeten opslaan.
Het bedrijf hecht veel waarde aan klanttevredenheid en werkt samen met elke klant om een persoonlijke aanpak te bieden die voldoet aan hun specifieke behoeften. MoveIt hanteert een transparante prijsstructuur en biedt klanten een gratis offerte vooraf, zodat ze precies weten wat ze kunnen verwachten.</div>
  <div class="info-panel" id="panel3"><h3>Utrecht:</h3>
MoveIt is ook gevestigd in Utrecht en biedt een betrouwbare en professionele verhuisservice aan klanten in de stad en de omliggende gebieden. Het bedrijf heeft een team van ervaren verhuizers die bekend zijn met de straten en verkeersomstandigheden van Utrecht, waardoor ze efficiënt en veilig kunnen werken.<br>
MoveIt biedt een breed scala aan verhuisservices, waaronder het inpakken van spullen, het demonteren en monteren van meubels, en het veilig transporteren van delicate en zware spullen. Klanten kunnen ook opslagfaciliteiten krijgen als ze hun spullen tijdelijk moeten opslaan.<br>
Het bedrijf heeft een persoonlijke aanpak van klantenservice en werkt samen met elke klant om hun specifieke behoeften en wensen te begrijpen. Dit resulteert in een naad</div>
</div>


<div id='calendar-container'>
<section class="moving-company">
  <h2>Onze verhuis prijzen</h2>
  
  <ul>
    <li>Maandag tot en met donderdag: <br> €65 per uur voor een verhuizer en een vrachtwagen, met een minimum van twee uur.</li><br>
    <li>Vrijdag tot en met zondag: <br>€75 per uur voor een verhuizer en een vrachtwagen, met een minimum van twee uur. </li> <br> 
    <li>Onze prijzen zijn transparant en betaalbaar, zonder verborgen kosten. <br>We bieden ook speciale deals en kortingen aan voor onze klanten, 
      zoals een korting voor studenten of een gratis verhuisdoos voor elke verhuizing. 
      Bovendien bieden we een gratis offerte voorafgaand aan elke verhuizing, zodat u een idee heeft van de kosten voordat u een beslissing maakt.</li>
      <br>
Wat u ziet is het schema dat we beschikbaar zijn en als u een account heeft dan kan u zelfs een afspraak anmaken en krijgt een mailtje van één van onze collega's,
over het afspraak.
  </ul>
      @guest
        <button onclick="alert('Je moet ingelogd zijn om een afspraak te maken.')"  id="my-button">Maak een afspraak</button>
    @else
        <button onclick="showAppointmentForm()" id="my-button">Maak een afspraak</button>
    @endguest
</section>

    <div id='calendar'></div>

    
</div>

<div id="appointment-modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="hideAppointmentForm()">&times;</span>
        <h2>Maak een afspraak</h2>
            <form action="{{ route('appointments.store') }}" method="POST" id="forum-maken">
            @csrf

            @auth
            <label for="idKlant">ID:</label>
            <input type="number" name="idKlant" id="idKlant" required value="{{ Auth::user()->idKlant }}"readonly>
            
            <label for="name" required>Naam:</label>
            <input type="text" name="name" id="name" value="{{ Auth::user()->name }} {{ Auth::user()->lastname }}"readonly>
            
            <label for="start_time">Start Tijd:</label>
            <input type="datetime-local" name="start_time" id="start_time">

            <label for="end_time">Eind Tijd:</label>
            <input type="datetime-local" name="end_time" id="end_time">

            <label for="notes">Adres & Opmerkingen </label>
            <textarea id="notes" name="notes"></textarea>

            <button type="submit">Afspraak maken</button>
            @endauth
        </form>
    </div>
</div>

<script>
    function showAppointmentForm() {
        var modal = document.getElementById("appointment-modal");
        modal.style.display = "block";
    }

    function hideAppointmentForm() {
        var modal = document.getElementById("appointment-modal");
        modal.style.display = "none";
    }
</script>

@if (session('status'))
    <script>
        alert('{{ session('status') }}');
    </script>
@endif





<footer>
  <div class="container">
    <div class="row">

   
      <div class="col-md-3">
        <h3>Contact ons</h3>
        <ul>
          <li>123 Straat.</li>
          <li>Stad, ZipCode</li>
          <li>(036) 456-7890</li>
          <li><a href="mailto:info@example.com">info@example.com</a></li>
        </ul>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <p class="text-center">Copyright &copy; 2023</p>
      </div>
    </div>
  </div>
</footer>







</body>


</html>
