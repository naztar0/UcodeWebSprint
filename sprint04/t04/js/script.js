let films = ["John Wick", "Avengers: Endgame", "Inception"];
let films_info = [{"title": "John Wick", "date": "October 24, 2014", "image": "assets/images/1.jpg",
                   "actors": ["Keanu Reeves", "Michael Nyqvist", "Alfie Allen"],
                   "description": "An ex-hit-man comes out of retirement to track down the gangsters that killed his dog and took everything from him."},
                  {"title": "Avengers: Endgame", "date": "April 22, 2019", "image": "assets/images/2.jpg",
                  "actors": ["Robert Downey Jr.", "Chris Evans", "Ian McShane", "Chris Hemswoth", "Scarlett Johansson"],
                  "description": "After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos' actions and restore balance to the universe."},
                  {"title": "Inception", "date": "July 16, 2010", "image": "assets/images/3.jpg",
                   "actors": ["Leonardo DiCaprio", "Joseph Gordon-Levitt", "Elliot Page"],
                   "description": "A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O."}];

let list_block = document.getElementById("list-block");
let info_block = document.getElementById("info-block");

for (let i = 0; i < films.length; i++) {
    let list_item = document.createElement('div');
    list_item.className = "list-item";
    let list_item_wrapper = document.createElement('div');
    list_item_wrapper.className = "list-item-wrapper";
    let list_film_title = document.createElement('span');
    list_film_title.className = "list-film-title";
    list_film_title.innerHTML = films[i];
    let list_flag = document.createElement('div');
    list_flag.className = "list-flag";
    list_flag.style.visibility = "hidden";
    list_item_wrapper.appendChild(list_flag);
    list_item_wrapper.appendChild(list_film_title);
    list_item.appendChild(list_item_wrapper);
    list_block.appendChild(list_item);

    list_item.onclick = () => {
        let allFlags = document.getElementsByClassName("list-flag");
        for (let j = 0; j < allFlags.length; j++)
            allFlags[j].style.visibility = "hidden";
        list_flag.style.visibility = "visible";
        displayFilm(i);
    }
}

function displayFilm(num) {
    let currFilm = films_info[num];
    info_block.innerHTML = '';
    let leftWrapper = document.createElement('div');
    leftWrapper.className = "left-wrapper";
    let title = document.createElement('h2');
    title.className = "title";
    let date = document.createElement('span');
    date.className = "date";
    let img = document.createElement('img');
    let description = document.createElement('p');
    description.className = "description";
    let actors = document.createElement('div');
    actors.className = "actors";

    for (let i = 0; i < currFilm.actors.length; i++) {
        let actor = document.createElement('p');
        actor.className = "actor";
        actor.innerHTML = currFilm.actors[i];
        actors.appendChild(actor);
    }
    title.innerHTML = currFilm.title;
    date.innerHTML = currFilm.date;
    img.src = currFilm.image;
    description.innerHTML = currFilm.description;

    leftWrapper.appendChild(title);
    leftWrapper.appendChild(date);
    leftWrapper.appendChild(actors);
    leftWrapper.appendChild(description);
    info_block.appendChild(leftWrapper);
    info_block.appendChild(img);
}


