const btn1 = document.getElementById("btn1");
const conta1 = document.getElementById("conta1");

const btn2 = document.getElementById("btn2");
const conta2 = document.getElementById("conta2");

const btn3 = document.getElementById("btn3");
const conta3 = document.getElementById("conta3");

const btn4 = document.getElementById("btn4");
const conta4 = document.getElementById("conta4");

const btn5 = document.getElementById("btn5");
const conta5 = document.getElementById("conta5");

let itcj = 0, tec = 0, urn = 0, uacj = 0, uach = 0;

btn1.addEventListener('click', function() {
    itcj++;
    conta1.textContent = itcj;
    btn1.disabled = true;
    btn1.value = "VOTADO" ;
    btn1.style.background = 'red';
    btn1.style.color = 'white';
});

btn2.addEventListener('click', function() {
    tec++;
    conta2.textContent = tec;
    btn2.disabled = true;
    btn2.value = 'VOTADO';
    btn2.style.background = 'red';
    btn2.style.color = 'white';
});

btn3.addEventListener('click', function() {
    urn++;
    conta3.textContent = urn;
    btn3.disabled = true;
    btn3.value = 'VOTADO';
    btn3.style.background = 'red';
    btn3.style.color = 'white';
});

btn4.addEventListener('click', function() {
    uacj++;
    conta4.textContent = uacj;
    btn4.disabled = true;
    btn4.value = 'VOTADO';
    btn4.style.background = 'red';
    btn4.style.color = 'white';
});

btn5.addEventListener('click', function() {
    uach++;
    conta5.textContent = uach;
    btn5.disabled = true;
    btn5.value = 'VOTADO';
    btn5.style.background = 'red';
    btn5.style.color = 'white';
});