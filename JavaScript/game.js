const gallery = document.querySelector(".gallery");
const controls = document.querySelector(".control");
const ids = [];
const score = document.querySelector(".score")
const circle = document.querySelector('.vs-circle')
var c_score = 0

function getRandomColor() {
    const letters = "0123456789ABCDEF";
    let color = "#";
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function resetCircle() {
    img = circle.querySelector('img');
    circle.style.backgroundColor = "#fff"
    img.style.opacity = '0'
}

function popCheck(what) {
    let image = document.querySelector('#icon');
    image.style.opacity = '0';
    if (what === 'x'){
        image.src = '../assets/close.png';
    } else {
        image.src = '../assets/check-mark.png';
    }
    image.style.transform = 'scale(0.2)';
    image.style.opacity = '1';

    // Apply transition here
    image.style.transition = 'transform 0.5s, opacity 0.5s';

    // Set initial scale and opacity
    image.style.transform = 'scale(0.01)';
    image.style.opacity = '1';

    // Schedule next scale and opacity change
    setTimeout(function() {
        image.style.transform = 'scale(1)';
        image.style.opacity = '1'; // Ensure opacity is 1 here
    }, 100); // Set a short timeout for the transition to take effect

    // Schedule transition removal
    setTimeout(function() {
        image.style.transition = ''; // Remove the transition after the animation
    }, 500); // Set to the same duration as the transition

    // Schedule image disappearance
    setTimeout(function() {
        image.src = ''
        image.style.opacity = '0'; // Make the image disappear
    }, 3000); // Adjust the duration (in milliseconds) before the image disappears
};

function getRandomNumber(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function updateScore(currentScore) {
    score.innerHTML = `SCORE: ${currentScore}`;
}

function updateCounter(finalNumber, item) {
    let counterElement = item.querySelector("#counter");
    let currentNumber = parseFloat(counterElement.textContent);
    let newNumber = currentNumber + 4;
    if (newNumber >= finalNumber) {
        counterElement.textContent = finalNumber;
    } else {
        counterElement.textContent = newNumber.toFixed(0);
        requestAnimationFrame(function() {
            updateCounter(finalNumber, item);
        });
    }
}

function fill_circle(color) {
    let filling = document.getElementById("filling");
    if (!filling) {
        filling = document.createElement("div");
        filling.style.backgroundColor = color
        filling.id = "filling";
        circle.appendChild(filling);
        setTimeout(() => {
            filling.remove();
        }, 3000); // Adjust the duration of the animation (in milliseconds) if needed
    }
}

function createSlide() {
    const newDiv = document.createElement("div");
    newDiv.classList.add("item");
    gallery.appendChild(newDiv);
    let divColor = getRandomColor();
    newDiv.style.backgroundColor = divColor;
    let rand_num = getRandomNumber(0, js_alimentos.length -1);
    ids.push(rand_num);
    newDiv.innerHTML = `<h1>${js_alimentos[rand_num]['nome']} ${js_alimentos[rand_num]['qtde']}g</h1>
                        HAS
                        <h2 id="counter">0</h2>
                        <h3>CALORIAS</h3>`;
    return newDiv;
}

function animateCounter(value, callback) {
    const items = document.querySelectorAll('.item');
    items.forEach((item, index) => {
        if (index === 1) {
            setTimeout(() => {
                const h2Tag = item.querySelector('h2');
                updateCounter(value, item);
                h2Tag.style.transition = " transform 0.3s";
                h2Tag.style.transform = "translateY(-30%)";
                h2Tag.style.opacity = '1';

                setTimeout(callback, 500);
            }, 500);
        }
    });
}

function slide() {
    var items = document.querySelectorAll('.item');

    const newItem = createSlide(); 
    gallery.appendChild(newItem);


    items.forEach((item) => {
        item.style.transition = "transform 0.5s";
        item.style.transform = "translateX(-100%)";
    });
    
    if (items.length === 4) {
        items[0].remove();
        ids.shift();
    }

    setTimeout(() => {
        items.forEach((item) => {
            item.style.transition = "none";
            item.style.transform = "translateX(0%)";
        });

    }, 550);
}

document.addEventListener('DOMContentLoaded', function() {
    createSlide()
    let firstItem = document.querySelector('.item')
    firstItem.innerHTML = `<h1>${js_alimentos[ids[0]]['nome']} ${js_alimentos[ids[0]]['qtde']}g</h1>
                            HAS
                            <h2 id="counter">${js_alimentos[ids[0]]['calorias']}</h2>
                            <h3>CALORIAS</h3>`;
    for(let i = 0; i < 3; i++){
        createSlide();
    }
    console.log(js_alimentos)
});

document.addEventListener('click', function() {
    console.log('-------------------------');
    console.log(ids);
    console.log(js_alimentos[ids[0]]['calorias'], js_alimentos[ids[1]]['calorias'])
});


document.getElementById('higher-btn').addEventListener('click', function() {
    if (parseInt(js_alimentos[ids[0]]['calorias']) <= parseInt(js_alimentos[ids[1]]['calorias'])) {
        animateCounter(js_alimentos[ids[1]]['calorias'], function() {
            c_score++;
            updateScore(c_score);
        });
        fill_circle('green')
        popCheck('check')
        setTimeout(slide(), 1000);
    } else {
        animateCounter(parseInt(js_alimentos[ids[1]]['calorias']), function() {
        });
        fill_circle('red');
        popCheck('x')
        console.log('passou')
    }
});

document.getElementById('lower-btn').addEventListener('click', function() {
    if (parseInt(js_alimentos[ids[0]]['calorias']) >= parseInt(js_alimentos[ids[1]]['calorias'])) {
        animateCounter(parseInt(js_alimentos[ids[1]]['calorias']), function() {
            c_score++;
            updateScore(c_score);
            fill_circle('green');
            popCheck('check');
        });
        setTimeout(slide(), 1500);
    }else {
        animateCounter(parseInt(js_alimentos[ids[1]]['calorias']), function() {
            fill_circle('red');
            popCheck('x');
        });
    }
});