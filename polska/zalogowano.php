<?php
include('section.php');

if (!isset($_SESSION["login"])) {
    header("Location: polska.php");
    exit();
}

$zalogowany_user = $_SESSION["login"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wysuwana Lista</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            
            font-family: Bungee;
            font-size:1vw;
            margin: 0;
            padding: 0;
            background: rgb(215,209,209);
background: linear-gradient(90deg, rgba(215,209,209,1) 0%, rgba(195,195,195,1) 36%, rgba(213,213,213,1) 57%, rgba(144,144,144,1) 80%, rgba(171,171,171,1) 100%); 
        }

        #menu {
            width: 20%;
            height: 5vh;
            background-color: rgb(50, 50, 50);
            color: #fff;
            text-align: center;
            line-height: 50px;
            z-index: 1;
            opacity: 0;
            transition: opacity 5s;
        }

        container {
            display: flex;
            flex-direction: column;
            height: 85vh;
            width: 19%;
            background:none;
            border: 0px solid black;
            padding: 10px;
        }
        container1{
          position:absolute;
          right:0;
          top:0;
          display: flex;
            flex-direction: Row;
            height: 90vh;
            max-width:60%;
            background:rgba(0,0,0,0.3);

            border: 0px solid black;
            padding: 10px;
        }

        footer {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            height: 10vh;
            background: rgb(45, 45, 45);
        }

        a.menu-option {
            background: none;
        }

        #menu-toggle {
            cursor: pointer;
        }

        .invisible {
            opacity: 0;
        }

        /* General button style */
        .btn {
  border: none;
  font-family: 'Lato';
  font-size: inherit;
  color: inherit;
  background: none;
  cursor: pointer;
  padding: 25px 80px;
  display: inline-block;
  margin: 15px 30px;
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 700;
  outline: none;
  position: relative;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
}

.btn:after {
  content: '';
  position: absolute;
  z-index: -1;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
}

/* Pseudo elements for icons */
.btn:before {
  font-family: 'FontAwesome';
  speak: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  position: relative;
  -webkit-font-smoothing: antialiased;
}


/* Icon separator */
.btn-sep {
  padding: 25px 60px 25px 120px;
}

.btn-sep:before {
  background: rgba(0,0,0,0.15);
}

/* Button 1 */
.btn-1 {
    max-width:350px;
    margin-left:0;
  background: white;
  border:0.5 solid black;
  color: #000;
  border-radius:0 50px 50px 0px;
}

.btn-1:hover {
  background: #2980b9;
}

.btn-1:active {
  background: #2980b9;
  top: 2px;
}

.btn-1:before {
  position: absolute;
  height: 100%;
  left: 0;
  top: 0;
  line-height: 3;
  font-size: 180%;
  width: 60px;
}

/* Button 2 */


/* Button 3 */
.btn-4 {
    max-width:350px;
    margin-left:0;
    background: white;
  border:0.5 solid black;
  color: #000;
  border-radius:0 50px 50px 0px;
}

.btn-4:hover {
  background: #2c3e50;
}

.btn-4:active {
  background: #2c3e50;
  top: 2px;
}

.btn-4:before {
  position: absolute;
  height: 100%;
  left: 0;
  top: 0;
  line-height: 3;
  font-size: 180%;
  width: 60px;
}

/* Icons */

.icon-cart:before {
  content: "\f040";
}

.icon-heart:before {
  content: "\f003";
}

.icon-info:before {
  content: "\f05a";
}

.icon-send:before {
  content: "\f011";
}
body.normal{
    background:linear-gradient(rgb(200,200,200),rgb(240,240,240));
}
body.fighting{
    background:linear-gradient(rgb(255, 0, 0),rgrgb(100, 11, 11));
}
body.water{
    background:linear-gradient(rgb(34, 63, 226),rgb(0, 132, 255));
}
body.fire{
    background:linear-gradient(rgb(241, 145, 0),rgb(255, 72, 0))
}
body.flying{
    background:linear-gradient(rgb(98, 0, 255),rgb(132, 0, 255));

}
body.grass{
    background:linear-gradient(rgb(34, 226, 43),rgb(36, 128, 0));
}
body.poison{
    background:linear-gradient(rgb(48, 0, 77),rgb(71, 0, 138));
}
body.electric{
    background:linear-gradient(rgb(229, 255, 0),rgb(187, 255, 0));
}
body.ground{
    background:linear-gradient(rgb(255, 208, 0),rgb(243, 221, 21));
}
body.psychic{
    background:linear-gradient(rgb(255, 0, 234),rgb(174, 0, 255));
}
body.rock{
    background:linear-gradient(rgb(132, 134, 117),rgb(87, 94, 70));
 }
 body.ice{
    background:linear-gradient(rgb(162, 230, 241),rgb(74, 126, 129));
}
body.bug{
    background:linear-gradient(rgb(65, 158, 93),rgb(43, 131, 101));
}
body.dragon{
    background:linear-gradient(rgb(155, 107, 245),rgb(177, 48, 166));
}
body.ghost{
    background:linear-gradient(rgb(61, 61, 61),rgb(92, 92, 92));

}
body.dark{
    background:linear-gradient(rgb(44, 44, 44),rgb(0, 0, 0));

}
body.steel{
    background:linear-gradient(rgb(82, 85, 60),rgb(40, 41, 38));

}
body.fairy{
    background:linear-gradient(rgb(255, 0, 149),rgb(228, 102, 180));

}
body.stellar{
    background:linear-gradient(rgb(76, 111, 163),rgb(37, 122, 179));

}
#container {
    display:flex;
    align-items:center;
    gap:20px;
    justify-content:center;
    flex-direction:column;
  width:95dvw;
  height:100dvh;
  margin-top: 20px;
}

#card {
  display:flex;
  flex-direction:Column;
  align-items: center;
  justify-content:center;
  
  flex-wrap:wrap;
  width: 50%;
  height:40%;
  padding: 30px 20px;
  box-shadow: 0 20px 30px rgba(0, 0, 0, 0.3);
  border-radius: 10px;
  background:rgb(250, 250, 250);
}

#card img {
    display:flex;
  flex-direction:Column;
  align-items: center;
  justify-content:center;
  flex-wrap:wrap;
  display: block;
  
  width: 180px;
  max-height: 200px;
  position: relative;
  margin: 20px auto;
  
}

.poke-info {
  text-align: center;
  background:none;
  background:rgb(250, 250, 250);
}

.poke-name,
.ability,
.type {
  font-weight: 600;
  background:none;
}

.hp {
  width: 80px;
  background-color: #ffffff;
  text-align: center;
  padding: 8px 0;
  border-radius: 30px;
  margin-left: auto;
  font-weight: 400;
}

.types {
  display: flex;
  justify-content: space-around;
  margin: 20px 0 40px 0;
}

.hp span,
.types span {
  font-size: 12px;
  letter-spacing: 0.4px;
  font-weight: 600;
}

.types span {
  padding: 5px 20px;
  border-radius: 20px;
  color: #ffffff;
}

.stats {
  display: flex;
  align-items: center;
  justify-content: space-between;
  text-align: center;
}

.stats p {
  color: #404060;
}

#btn {
  display: block;
  padding: 15px 60px;
  font-size: 18px;
  background-color: #101010;
  color: #ffffff;
  position: relative;
  margin: 30px auto;
  border: none;
  border-radius: 5px;
}

/* Dodatkowe style dla nowych elementów */
.search {
            text-align: center;
            color: #464691;
            background: rgb(238, 227, 227);
            font-size: 25px;
            width: 300px;
            height: 60px;
            border: 0px;
            border-radius: 30px;
        }

        #submitBtn {
            background: rgb(255, 255, 255);
            border: 0px;
            border-radius: 20px;
            height: 35px;
            width: 200px;
            font-size: 25px;
            text-align: center;
        }

        #submitBtn:hover {
            background: rgb(245, 245, 245);
        }

        #recommendations {
            position:absolute;
            right:0;
            height:100%;
            width: 20%;
            background: #2e2e2e;
            color:white;
            border: 1px solid #000000;
            border-radius: 5px;
            max-height: 200px;
            overflow-y: auto;
            
        }

        #recommendations div {
            padding: 10px;
            cursor: pointer;
        }

        #recommendations div:hover {
            background: #f0f0f0;
        }
        #h{
            color:black;
        }
        #h:hover{
            color:black;
        }
        #baner_container{
            display:flex;
            flex-direction:row;
        }
        #baner{
            background:#2e2e2e;
            width:5dvw;
            height:100dvh;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:1%;
            flex-direction:column;
            border:1px solid black;

        }
    </style>
</head>
<body>

<div id="menu">
    <div id="menu-toggle" onclick="hideMenu()">&#9776; Witaj, <?php echo $zalogowany_user; ?>!</div>
</div>
<container>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <button class="btn btn-1 btn-sep icon-info">(Soon!)</button>
   
    <a href="pl.php"><button class="btn btn-4 btn-sep icon-send" >Log Out</button></a>
    STRONA ZOSTAŁA ZROBIONA W CELACH NAUKOWYCH, I JEST WCZESNĄ WERSJĄ WYSZUKIWARKI POKEMONÓW.<BR>
    MOŻESZ WPISAĆ JAKIEGOKOLWIEK POKEMONA SE ZAŻYCZYSZ I POKAZE CI JEGO STATYSTYKI.<br>
    ZOSTAŁO TO OPARTE O API: PokeAPI.com

   
    
</container>
<container1>
    <div id="container" class="container">
        <div id="card">
            <img id="pokemonImage" class="kus" src="" alt="Pokemon Image">
            <div class="poke-info">
                <p class="poke-name"></p>
                <p class="ability"></p>
                <p class="type"></p>
            </div>
        </div>
    

    <input class="search" placeholder="Enter Pokemon name">
    

    <a id="h" target="_blank" href="https://pokemondb.net/pokedex/national">All pokemons</a>
    <input type="submit" id="submitBtn" value="Submit">
</div>
<div id="recommendations"></div>
</container1>
<footer>
<svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M18.59 5.88997C17.36 5.31997 16.05 4.89997 14.67 4.65997C14.5 4.95997 14.3 5.36997 14.17 5.69997C12.71 5.47997 11.26 5.47997 9.83001 5.69997C9.69001 5.36997 9.49001 4.95997 9.32001 4.65997C7.94001 4.89997 6.63001 5.31997 5.40001 5.88997C2.92001 9.62997 2.25001 13.28 2.58001 16.87C4.23001 18.1 5.82001 18.84 7.39001 19.33C7.78001 18.8 8.12001 18.23 8.42001 17.64C7.85001 17.43 7.31001 17.16 6.80001 16.85C6.94001 16.75 7.07001 16.64 7.20001 16.54C10.33 18 13.72 18 16.81 16.54C16.94 16.65 17.07 16.75 17.21 16.85C16.7 17.16 16.15 17.42 15.59 17.64C15.89 18.23 16.23 18.8 16.62 19.33C18.19 18.84 19.79 18.1 21.43 16.87C21.82 12.7 20.76 9.08997 18.61 5.88997H18.59ZM8.84001 14.67C7.90001 14.67 7.13001 13.8 7.13001 12.73C7.13001 11.66 7.88001 10.79 8.84001 10.79C9.80001 10.79 10.56 11.66 10.55 12.73C10.55 13.79 9.80001 14.67 8.84001 14.67ZM15.15 14.67C14.21 14.67 13.44 13.8 13.44 12.73C13.44 11.66 14.19 10.79 15.15 10.79C16.11 10.79 16.87 11.66 16.86 12.73C16.86 13.79 16.11 14.67 15.15 14.67Z" fill="#000000"></path> </g></svg>
<svg width="64px" height="64px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5 5H9.5C7.29086 5 5.5 6.79086 5.5 9V15C5.5 17.2091 7.29086 19 9.5 19H15.5C17.7091 19 19.5 17.2091 19.5 15V9C19.5 6.79086 17.7091 5 15.5 5Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5 15C10.8431 15 9.5 13.6569 9.5 12C9.5 10.3431 10.8431 9 12.5 9C14.1569 9 15.5 10.3431 15.5 12C15.5 12.7956 15.1839 13.5587 14.6213 14.1213C14.0587 14.6839 13.2956 15 12.5 15Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <rect x="15.5" y="9" width="2" height="2" rx="1" transform="rotate(-90 15.5 9)" fill="#000000"></rect> <rect x="16" y="8.5" width="1" height="1" rx="0.5" transform="rotate(-90 16 8.5)" stroke="#000000" stroke-linecap="round"></rect> </g></svg>    
<svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M19.67 8.14002C19.5811 7.7973 19.4028 7.48433 19.1533 7.23309C18.9038 6.98185 18.5921 6.80134 18.25 6.71001C16.176 6.4654 14.0883 6.35517 12 6.38001C9.91174 6.35517 7.82405 6.4654 5.75001 6.71001C5.40793 6.80134 5.09622 6.98185 4.84674 7.23309C4.59725 7.48433 4.41894 7.7973 4.33001 8.14002C4.10282 9.41396 3.99236 10.706 4.00001 12C3.99198 13.3007 4.10244 14.5994 4.33001 15.88C4.42355 16.2172 4.60391 16.5239 4.85309 16.7696C5.10226 17.0153 5.41153 17.1913 5.75001 17.28C7.82405 17.5246 9.91174 17.6349 12 17.61C14.0883 17.6349 16.176 17.5246 18.25 17.28C18.5885 17.1913 18.8978 17.0153 19.1469 16.7696C19.3961 16.5239 19.5765 16.2172 19.67 15.88C19.8976 14.5994 20.008 13.3007 20 12C20.0077 10.706 19.8972 9.41396 19.67 8.14002ZM10.36 14.39V9.63001L14.55 12L10.36 14.38V14.39Z" fill="#000000"></path> </g></svg>
</footer>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    let submitBtn = document.getElementById("submitBtn");
    
    let card = document.getElementById("card");
    card.style.display = "none";

    submitBtn.addEventListener("click", async (event) => {
        document.getElementById("recommendations").style.display="none";
        card.style.display = "flex";
        event.preventDefault();
        await pokemons(); // Change here to make sure pokemons() is called after its definition
    });

    const searchInput = document.querySelector(".search");
    searchInput.addEventListener("input", displayRecommendations);

    async function displayRecommendations() {
        const searchValue = searchInput.value.toLowerCase();
        const allPokemon = await fetchAllPokemon();
        const filteredPokemon = filterPokemon(allPokemon, searchValue);
        showRecommendations(filteredPokemon);
    }

    async function fetchAllPokemon() {
        try {
            const response = await fetch("https://pokeapi.co/api/v2/pokemon?limit=2000");
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            const data = await response.json();
            return data.results.map(pokemon => pokemon.name);
        } catch (error) {
            console.error("Error fetching data:", error.message);
            return [];
        }
    }

    function filterPokemon(allPokemon, searchValue) {
        const filteredPokemon = [];
        for (const pokemon of allPokemon) {
            if (pokemon.includes(searchValue)) {
                filteredPokemon.push(pokemon);
            }
        }
        return filteredPokemon;
    }

    function showRecommendations(recommendations) {
        const recommendationsContainer = document.getElementById("recommendations");
        recommendationsContainer.innerHTML = "";
        for (const recommendation of recommendations) {
            const recommendationDiv = document.createElement("div");
            recommendationDiv.textContent = recommendation;
            recommendationDiv.addEventListener("click", () => {
                searchInput.value = recommendation;
                displayRecommendations();
            });
            recommendationsContainer.appendChild(recommendationDiv);
        }
        recommendationsContainer.style.display = recommendations.length ? "block" : "none";
    }

    async function pokemons() { // Define pokemons() function here
        let search_engine = document.querySelector(".search");
        let search = search_engine.value.toLowerCase();
        let base_url = "https://pokeapi.co/api/v2/";

        try {
            let response = await fetch(`https://pokeapi.co/api/v2/pokemon/${search}`);
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            let fetched = await response.json();
            let container = document.getElementById("container");
            const imageresponse = new Image(400, 400);
            imageresponse.src = `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${fetched.id}.png`;
            imageresponse.classList.add("kus");

            let card = document.getElementById("card");
            let pokemonImage = document.getElementById("pokemonImage");
            let pokeName = document.querySelector(".poke-name");
            let ability = document.querySelector(".ability");
            let type = document.querySelector(".type");

            // Ustawienie treści i obrazka
            container.classList.add("container1");
let typeColor = `${fetched.types[0].type.name}`;
document.body.className = typeColor;
pokeName.textContent = `Pokemon: ${fetched.name}`;
pokeName.style.background = "transparent"; // Zmiana na transparent
ability.textContent = `Ability: ${fetched.abilities[0].ability.name}`;
ability.style.background = "transparent"; // Zmiana na transparent
type.textContent = `Type: ${fetched.types[0].type.name}`;
type.style.background = "transparent"; // Zmiana na transparent
pokemonImage.src = imageresponse.src;

        } catch (error) {
            console.error("Error fetching data:", error.message);
        }
    }
});
function hideMenu() {
    var menuContainer = document.getElementById('menu');
    menuContainer.style.opacity = 0;
    setTimeout(function () {
        menuContainer.style.display = 'none';
    }, 5000);
}

function showNoteInput() {
    var noteInputContainer = document.getElementById('note-input-container');
    noteInputContainer.style.display = 'block';
}

function saveNote() {
    var noteInput = document.getElementById('note-input');
    var noteNameInput = document.getElementById('note-name'); // Zmieniono nazwę zmiennej
    var noteValue = noteInput.value.trim(); 
    var noteName = noteNameInput.value; // Zmieniono nazwę zmiennej
    if (noteValue !== '' && noteName !== '') {
        var existingNotes = localStorage.getItem('notes') || '[]';
        existingNotes = JSON.parse(existingNotes);

        // Dodano obiekt notatki z nazwą i wartością
        existingNotes.push({ name: noteName, value: noteValue });

        localStorage.setItem('notes', JSON.stringify(existingNotes));
        noteInput.value = '';
        displayNotes();
    }
}

function displayNotes() {
    var noteListContainer = document.getElementById('note-list');
    noteListContainer.innerHTML = '';

    var existingNotes = localStorage.getItem('notes') || '[]';
    existingNotes = JSON.parse(existingNotes);

    existingNotes.forEach(function (note) {
        var noteItem = document.createElement('div');
        noteItem.className = 'note-item';

        var noteContent = document.createElement('span');
        noteContent.textContent = note.name; // Zmieniono aby pokazać nazwę notatki
        noteContent.className = 'note-name'; // Dodano klasę, aby móc nią manipulować

        var noteText = document.createElement('span');
        noteText.textContent = note.value; // Zmieniono aby pokazać treść notatki
        noteText.className = 'note-text'; // Dodano klasę, aby móc nią manipulować

        // Dodano obsługę kliknięcia na nazwę notatki
        noteContent.onclick = function () {
            toggleNoteText(noteText);
        };

        noteItem.appendChild(noteContent);
        noteItem.appendChild(noteText);

        noteListContainer.appendChild(noteItem);
    });

    // Dodaj przyciski usuwania po utworzeniu notatek
    addDeleteButtons();
}

function addDeleteButtons() {
    var noteItems = document.getElementsByClassName('note-item');

    for (var i = 0; i < noteItems.length; i++) {
        var deleteButton = document.createElement('button');
        deleteButton.textContent = 'Delete';
        deleteButton.style.background = "none";
        deleteButton.style.width = '50px';
        deleteButton.style.height = '20px';
        deleteButton.style.marginLeft = '20px'; // Dodaj odstęp od lewej strony

        deleteButton.className = 'delete-button';
        deleteButton.onclick = function () {
            var noteContent = this.previousSibling.textContent;
            deleteNote(noteContent);
        };

        // Dodaj przycisk usuwania do każdego elementu notatki
        noteItems[i].appendChild(deleteButton);
    }
}

function toggleNoteText(element) {
    // Funkcja do przełączania widoczności treści notatki po kliknięciu na jej nazwę
    element.style.display = element.style.display === 'none' ? 'block' : 'none';
}

function deleteNote(note) {
    var existingNotes = localStorage.getItem('notes') || '[]';
    existingNotes = JSON.parse(existingNotes);
    var noteIndex = existingNotes.findIndex(n => n.name === note);

    if (noteIndex !== -1) {
        existingNotes.splice(noteIndex, 1);
        localStorage.setItem('notes', JSON.stringify(existingNotes));
        displayNotes();
    }
}

window.onload = function () {
    var menuContainer = document.getElementById('menu');
    menuContainer.style.opacity = 1;
    displayNotes();
};
</script>

</body>
</html>
