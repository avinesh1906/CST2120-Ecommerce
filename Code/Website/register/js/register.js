let secondPage = document.getElementsByClassName("secondPage")[0];
let firstPage = document.getElementsByClassName("firstPage")[0];
let thirdPage = document.getElementsByClassName("thirdPage")[0];

let firstProceedBtn = document.getElementById("persoProceed");
let secondProceedBtn = document.getElementById("secondProceedBtn");

firstProceedBtn.onclick = address;
secondProceedBtn.onclick = password;

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