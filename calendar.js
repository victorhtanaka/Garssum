let nav = 0;
let clicked = null;
let refeicoes = localStorage.getItem('refeicoes') ? JSON.parse(localStorage.getItem('refeicoes')) : [];

const alimentos = alimentos_info0
const alimentosNames = alimentos_lst0
const calendar = document.getElementById('calendar-days');
const newRefeicaoModal = document.getElementById('newRefeicaoModal');
const board = document.querySelector(".board");
const backDrop = document.getElementById('modalBackDrop');
const alimentoInput = document.getElementById('search-bar');
const weekdays = ['domingo', 'segunda-feira', 'terça-feira', 'quarta-feira', 'quinta-feira', 'sexta-feira', 'sábado'];

function openModal(date) {
    clicked = date;
    document.getElementById('Dia').value = date
    const refeicoesDia = refeicoes.find(e => e.date === clicked);
    console.log(date)
    if (refeicoesDia) {
        document.getElementById('eventText').innerText = refeicoesDia.title;
    } else {
        newRefeicaoModal.style.display = 'block';
    }
    backDrop.style.display = 'block';
}

function load() {
    const dt = new Date();
    const monthDiv = document.getElementById('month');
    const dateDiv = document.getElementById('dayDate');

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

    document.getElementById('monthDisplay').children[0].children[1].innerHTML = `${year}`;
    document.getElementById('monthDisplay').children[1].innerHTML = `${dt.toLocaleDateString('pt-br', { month: 'long' })}`;

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

        dateDiv.innerHTML = `${day}`
        monthDiv.innerHTML = `${dt.toLocaleDateString('pt-br', { month: 'long' })}`

        calendar.appendChild(daySquare);

        daySquare.addEventListener('mouseenter', function() {
            if(daySquare.classList.contains('padding')){
                return
            }else{
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
const searchInp = document.getElementById('search-bar');
const nomeAlimentos = [];

function getNomes(nomes_lst, array) {
    for (let [key, value] of Object.entries(array)) {
        nomes_lst.push(key);
    }
}

searchInp.addEventListener('keyup', () => {
    let arr = [];
    let searchVal = searchInp.value.toLowerCase();
    
    arr = nomeAlimentos
        .filter(data => data.toLowerCase().startsWith(searchVal))
        .map(data => {
            const item = document.createElement('div');
            item.className = 'item';
            item.draggable = true;
            item.innerHTML = `<p>${data}</p>\
                        <button onclick="addAlimento(this)">+</button>`;
            return item;
        });

    board.innerHTML = '';

    if (arr.length > 0) {
        arr.forEach(item => board.appendChild(item));
    } else {
        const noResultParagraph = document.createElement('p');
        noResultParagraph.textContent = 'Nenhum resultado encontrado.';
        board.appendChild(noResultParagraph);
    }
});

getNomes(nomeAlimentos, alimentosNames);

// -----------------------------DRAG & DROP-----------------------------

document.addEventListener("dragstart", (e) => {
    e.target.classList.add("dragging");
});

document.addEventListener("dragend", (e) => {
    e.target.classList.remove("dragging");
});

const boardArray = Array.from(board);

boardArray.forEach((item) => {
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

// -----------------------------TABELA REFEICAO-----------------------------
function addAlimento(button) {
    const tableBody = document.querySelector('#food-table tbody');
    const totalRow = document.getElementById('total-row');

    const newRow = document.createElement('tr');
    newRow.classList.add('rowFood');

    let thisItem = button.closest('.item');
    let clonedItem = thisItem.cloneNode(true);
    clonedItem.classList.add('selected');

    let clonedButton = clonedItem.querySelector('button');

    clonedButton.textContent = "-"
    clonedButton.onclick = function() {
        removeRow(this);
    };
    
    const alimentoCell = document.createElement('td');
    alimentoCell.classList.add('Alimento');

    alimentoCell.appendChild(clonedItem);

    newRow.appendChild(alimentoCell);

    const tdQuantidade = document.createElement('td');
    tdQuantidade.className = 'quantidade'
    tdQuantidade.innerHTML = `<input type="text" class="qntd-alimento" placeholder="Qtde:" value="100">`
    const tdCalorias = document.createElement('td');
    tdCalorias.className = 'kcal-count'
    const tdCarboidratos = document.createElement('td');
    tdCarboidratos.className = 'carbs-count'
    const tdProteinas = document.createElement('td');
    tdProteinas.className = 'prots-count'
    const tdGorduras = document.createElement('td');
    tdGorduras.className = 'gords-count'

    newRow.appendChild(tdQuantidade);
    newRow.appendChild(tdCalorias);
    newRow.appendChild(tdCarboidratos);
    newRow.appendChild(tdProteinas);
    newRow.appendChild(tdGorduras);

    tableBody.insertBefore(newRow, totalRow);
    const inputs = document.querySelectorAll('#food-table input');
    updateValues(newRow)
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            const inputValue = this.value;
            const isValid = /^\d*\d*$/.test(inputValue);
            
            if (!isValid) {
                this.value = inputValue.slice(0, -1);
            }
            let row = this.closest('tr');
            updateValues(row);
        });
    });
}

function removeRow(button) {
    let row = button.closest('tr');

    if (row) {
        row.remove();
        updateTotals()
    } else {
        console.error('Unable to find the row to remove.');
    }
}

function formatDate(inputDate) {
    // Split the input date into parts
    const parts = inputDate.split('/');

    // Create a Date object
    const originalDate = new Date(parts[2], parts[0] - 1, parts[1]);

    // Get day, month, and year
    const day = originalDate.getDate();
    const month = originalDate.getMonth() + 1; // Months are zero-based
    const year = originalDate.getFullYear();

    // Format the date with leading zeros if needed
    const formattedDate = `${(day < 10 ? '0' : '') + day}-${(month < 10 ? '0' : '') + month}-${year}`;

    return formattedDate;
}

console.log(alimentos)
console.log(alimentosNames)

function submitForm() {
    const form = document.getElementById('form');
    const table = document.getElementById('food-table');

    // Array to store the table data
    const tableData = [];

    // Loop through each row in the table body
    const tbodyRows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    for (let i = 0; i < tbodyRows.length; i++) {
        const row = tbodyRows[i];

        // Object to store the data of each row
        const rowData = {};

        // Loop through each cell in the row
        const cells = row.getElementsByTagName('td');
        for (let j = 0; j < cells.length; j++) {
            const cell = cells[j];
            if (cell.classList.contains('Alimento')) {
                let alimentoName = cell.closest('div').querySelector('p').textContent;
                const alimentoId = alimentosNames[alimentoName]
                rowData['fk_alimento_ID_alimento'] = alimentoId;
            }else if (cell.classList.contains('quantidade')){
                rowData['quantidade'] = cell.querySelector('.qntd-alimento').value
            }
            // // Get the header text for the corresponding cell
            // const headerText = table.getElementsByTagName('thead')[0].getElementsByTagName('th')[j].textContent;

            // // Add the data to the rowData object
            // rowData[headerText.toLowerCase()] = cell.textContent;
        }

        // Add the rowData object to the tableData array
        tableData.push(rowData);
    }

    // Convert the tableData array to a JSON string
    const tableDataJSON = JSON.stringify(tableData);

    // Update the value of the hidden input
    document.getElementById('tableData').value = tableDataJSON;
    document.getElementById('Dia').value = formatDate(document.getElementById('Dia').value);

    // Submit the form
    form.submit();
}

function updateValues(row) {
    const alimento = row.querySelector('.Alimento').closest('div').querySelector('p').textContent;
    console.log(alimento)
    const quantidade = parseFloat(row.querySelector('.qntd-alimento').value) || 0;

    if (quantidade > 0) {
        const foodData = alimentos[alimentosNames[alimento]];
        console.log(foodData)
        row.querySelector('.kcal-count').textContent = (parseFloat(foodData['calorias']) * quantidade).toFixed(2);
        row.querySelector('.carbs-count').textContent = (parseFloat(foodData['carboidratos']) * quantidade).toFixed(2);
        row.querySelector('.prots-count').textContent = (parseFloat(foodData['proteinas']) * quantidade).toFixed(2);
        row.querySelector('.gords-count').textContent = (parseFloat(foodData['gorduras']) * quantidade).toFixed(2);
    } else {
        row.querySelector('.kcal-count').textContent = '0';
        row.querySelector('.carbs-count').textContent = '0';
        row.querySelector('.prots-count').textContent = '0';
        row.querySelector('.gords-count').textContent = '0';
    }
    updateTotals()
}

function updateTotals() {
    let totalQntd = 0;
    let totalCals = 0;
    let totalCarbs = 0;
    let totalProteins = 0;
    let totalFats = 0;

    const rows = document.querySelectorAll('#food-table tbody tr:not(#total-row)');
    rows.forEach(row => {
        let qntd = parseFloat(row.querySelector('.qntd-alimento').value) || 0;
        let cals = parseFloat(row.querySelector('.kcal-count').textContent) || 0;
        let carbs = parseFloat(row.querySelector('.carbs-count').textContent) || 0;
        let proteins = parseFloat(row.querySelector('.prots-count').textContent) || 0;
        let fats = parseFloat(row.querySelector('.gords-count').textContent) || 0;

        totalQntd += qntd;
        totalCals += cals;
        totalCarbs += carbs;
        totalProteins += proteins;
        totalFats += fats;
    });

        document.getElementById('total-qntd').textContent = totalQntd.toFixed(2);
        document.getElementById('total-cals').textContent = totalCals.toFixed(2);
        document.getElementById('total-carbs').textContent = totalCarbs.toFixed(2);
        document.getElementById('total-proteins').textContent = totalProteins.toFixed(2);
        document.getElementById('total-fats').textContent = totalFats.toFixed(2);
    }

