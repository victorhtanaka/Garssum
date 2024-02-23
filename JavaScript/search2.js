const options = document.querySelector('.options');
const filter = document.querySelector('.filter');
const searchInp = document.getElementById('search-bar');
const nomeAlimentos = [];

function saveNomes(nomes_lst, array) {
    for (let [key, value] of Object.entries(array)) {
        nomes_lst.push(key);
    }
}

let blurTimeout;

searchInp.addEventListener('blur', function () {
    // Delay the removal of 'active' class
    blurTimeout = setTimeout(function () {
        filter.classList.remove('active');
    }, 100); // Adjust the delay as needed
});

function updateBar(item) {
    searchInp.value = item.innerText;
    filter.classList.remove('active');
}

// Clear the timeout if the input is focused again
searchInp.addEventListener('focus', function () {
    clearTimeout(blurTimeout);
});

searchInp.addEventListener('keyup', () => {
    let arr = [];
    let searchVal = searchInp.value.toLowerCase();
    arr = nomeAlimentos.filter(data => {
        return data.toLowerCase().startsWith(searchVal);
    }).map(data => `<li onclick="updateBar(this)">${data}</li>`).join("");
    options.innerHTML = arr ? arr : `<p>Nenhum resultado encontrado.</p>`;
})

searchInp.addEventListener("click", () => {
    filter.classList.add("active");
})
saveNomes(nomeAlimentos, alimentos_lst);



