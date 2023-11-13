let nav = 0;
let clicked = null;
let refeicoes = localStorage.getItem('refeicoes') ? JSON.parse(localStorage.getItem('refeicoes')) : [];

const calendar = document.getElementById('calendar-days');
const newRefeicaoModal = document.getElementById('newRefeicaoModal');
const board = document.querySelector(".board");
const backDrop = document.getElementById('modalBackDrop');
const alimentoInput = document.getElementById('search-bar');
const weekdays = ['domingo', 'quarta-feira', 'terça-feira', 'quarta-feira', 'quinta-feira', 'sexta-feira', 'sábado'];

function openModal(date) {
    clicked = date;

    const refeicoesDia = refeicoes.find(e => e.date === clicked);

    if (refeicoesDia) {
        document.getElementById('eventText').innerText = refeicoesDia.title;
    } else {
        newRefeicaoModal.style.display = 'block';
    }
    backDrop.style.display = 'block';
}

function load() {
    const dt = new Date();

    if (nav !== 0) {
        dt.setMonth(new Date().getMonth() + nav);
    }

    const day = dt.getDate();
    const month = dt.getMonth();
    const year = dt.getFullYear();

    const firstDayOfMonth = new Date(year, month, 1);
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    const dateString = firstDayOfMonth.toLocaleDateString('pt-br', {
        weekday: 'long',
        year: 'numeric',
        month: 'numeric',
        day: 'numeric',
    });

    const paddingDays = weekdays.indexOf(dateString.split(', ')[0]);

    document.getElementById('monthDisplay').innerText = 
        `${dt.toLocaleDateString('pt-br', { month: 'long' })} ${year}`;

    calendar.innerHTML = '';

    for(let i = 1; i <= paddingDays + daysInMonth; i++) {
        const daySquare = document.createElement('div');
        daySquare.classList.add('day');

        const dayString = `${month + 1}/${i - paddingDays}/${year}`;

        if (i > paddingDays) {
        daySquare.innerText = i - paddingDays;
        const refeicoesDia = refeicoes.find(e => e.date === dayString);

        if (i - paddingDays === day && nav === 0) {
            daySquare.id = 'currentDay';
        }

        if (refeicoesDia) {
            const refeicaoDiv = document.createElement('div');
            refeicaoDiv.classList.add('refeicao');
            refeicaoDiv.innerText = refeicoesDia.title;
            daySquare.appendChild(refeicaoDiv);
        }

        daySquare.addEventListener('click', () => openModal(dayString));
        } else {
        daySquare.classList.add('padding');
        }

        calendar.appendChild(daySquare);

        daySquare.addEventListener('mouseenter', function() {
            if(daySquare.classList.contains('padding')){
                return
            }else{
                const monthDiv = document.getElementById('month');
                const dateDiv = document.getElementById('dayDate');
                dateDiv.innerHTML = `${i - paddingDays}`
                monthDiv.innerHTML = `${dt.toLocaleDateString('pt-br', { month: 'long' })}`
            }
        });
    }
}

function closeModal() {
    alimentoInput.classList.remove('error');
    newRefeicaoModal.style.display = 'none';
    backDrop.style.display = 'none';
    alimentoInput.value = '';
    clicked = null;
    load();
}

function saveRefeicao() {
    if (alimentoInput.value) {
        alimentoInput.classList.remove('error');

        refeicoes.push({
        date: clicked,
        title: alimentoInput.value,
        });

        localStorage.setItem('refeicoes', JSON.stringify(refeicoes));
        closeModal();
    } else {
        alimentoInput.classList.add('error');
    }
}

function saveEvent() {
    if (eventTitleInput.value) {
        eventTitleInput.classList.remove('error');
    
        events.push({
            date: clicked,
            title: eventTitleInput.value,
        });
    
        localStorage.setItem('events', JSON.stringify(events));
        closeModal();
    } else {
        eventTitleInput.classList.add('error');
    }
}

function deleteEvent() {
    events = events.filter(e => e.date !== clicked);
    localStorage.setItem('events', JSON.stringify(events));
    closeModal();
}

function initButtons() {
    document.getElementById('nextButton').addEventListener('click', () => {
        nav++;
        load();
});

document.getElementById('backButton').addEventListener('click', () => {
    nav--;
    load();
});

}

initButtons();
load();

// -----------------------------SEARCH ENGINE-----------------------------
const options = document.querySelector('.options');
const filter = document.querySelector('.filter');
const searchInp = document.getElementById('search-bar');
const nomeAlimentos = [];

function getNomes(nomes_lst, array) {
    for (let [key, value] of Object.entries(array)) {
        nomes_lst.push(key);
    }
}

let blurTimeout;

// searchInp.addEventListener('blur', function () {
//     // Delay the removal of 'active' class
//     blurTimeout = setTimeout(function () {
//         filter.classList.remove('active');
//     }, 200); // Adjust the delay as needed
// });

function updateBar(item) {
    searchInp.value = item.innerText;
    filter.classList.remove('active');
}

// Clear the timeout if the input is focused again
searchInp.addEventListener('focus', function () {
    clearTimeout(blurTimeout);
});

// searchInp.addEventListener('keyup', () => {
//     let arr = [];
//     let searchVal = searchInp.value.toLowerCase();
//     arr = nomeAlimentos.filter(data => {
//         return data.toLowerCase().startsWith(searchVal);
//     }).map(data => `<li onclick="updateBar(this)">${data}</li>`).join("");
//     options.innerHTML = arr ? arr : `<p>Nenhum resultado encontrado.</p>`;
// })
// const searchInp = document.getElementById('searchInp');
// const board = document.getElementById('board');
// const nomeAlimentos = ['Apple', 'Banana', 'Orange', 'Pear', 'Pineapple', 'Grapes'];

searchInp.addEventListener('keyup', () => {
    let arr = [];
    let searchVal = searchInp.value.toLowerCase();
    console.log(searchVal);
    
    arr = nomeAlimentos
        .filter(data => data.toLowerCase().startsWith(searchVal))
        .map(data => {
            const item = document.createElement('div');
            item.className = 'item';
            item.draggable = true;
            item.textContent = data;
            return item;
        });

    // Clear the board
    board.innerHTML = '';

    // Append items to the board
    if (arr.length > 0) {
        arr.forEach(item => board.appendChild(item));
    } else {
        const noResultParagraph = document.createElement('p');
        noResultParagraph.textContent = 'Nenhum resultado encontrado.';
        board.appendChild(noResultParagraph);
    }
});

searchInp.addEventListener("click", () => {
    filter.classList.add("active");
})
getNomes(nomeAlimentos, alimentos_lst);

// -----------------------------DRAG & DROP-----------------------------

document.addEventListener("dragstart", (e) => {
    e.target.classList.add("dragging");
});

document.addEventListener("dragend", (e) => {
    e.target.classList.remove("dragging");
});

board.forEach((item) => {
    item.addEventListener("dragover", (e) => {
        const dragging = document.querySelector(".dragging");
        const applyAfter = getNewPosition(item, e.clientX);

        if (applyAfter) {
            applyAfter.insertAdjacentElement("afterend", dragging);
        } else {
            item.prepend(dragging);
        }
    });
});

function getNewPosition(column, posX) {
    const cards = column.querySelectorAll(".item:not(.dragging)");
    let result;

    for (let refer_card of cards) {
        const box = refer_card.getBoundingClientRect();
        const boxCenterX = box.x + box.width / 2;

        if (posX >= boxCenterX) result = refer_card;
    }

    return result;
}

function addAlimento() {
    
}