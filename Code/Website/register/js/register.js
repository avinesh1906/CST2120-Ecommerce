// class variables
let secondPage = document.getElementsByClassName("secondPage")[0];
let firstPage = document.getElementsByClassName("firstPage")[0];
let thirdPage = document.getElementsByClassName("thirdPage")[0];

// button varibales
let firstProceedBtn = document.getElementById("persoProceed");
let secondProceedBtn = document.getElementById("secondProceedBtn");

// call function on button click
firstProceedBtn.onclick = address;
secondProceedBtn.onclick = password;

// display and hide class
function address() {
    secondPage.style.display = "block";
    firstPage.style.display = "none";
    thirdPage.style.display = "none";
}

function password(){
    secondPage.style.display = "none";
    firstPage.style.display = "none";
    thirdPage.style.display = "block";
}