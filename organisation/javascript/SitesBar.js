"use strict";


const uls = Array.from($$("il"));

const sections = $$(".dontDisplay");

const hiddenSectionField = $("#sectionField");
const titel = $("#titelRow");
const author = $("#authorRow");

let currentSelected = 0;

const init = () => {
    uls[0].addEventListener("click", showReports);
    uls[1].addEventListener("click", showTodo);
    uls[2].addEventListener("click", showBugs);
    console.log(sections);
    console.log(uls);


    console.log(hiddenSectionField);
    showReports();
};


// handlers
const showReports = () => {
    makeInvisible();
    sections[0].classList.remove("dontDisplay");
    console.log("showing reports");
    hiddenSectionField.value = "reports";
    titel.classList.remove("dontDisplay");
    author.classList.remove("dontDisplay");
    select(0);
};

const showTodo = () => {
    makeInvisible();
    sections[1].classList.remove("dontDisplay");
    console.log("showing reports");
    hiddenSectionField.value = "todo";
    select(1);
};

const showBugs = () => {
    makeInvisible()
    sections[2].classList.remove("dontDisplay");
    console.log("showing bugs");
    hiddenSectionField.value = "bugs";
    select(2);
};


const makeInvisible = () => {

    titel.classList.add("dontDisplay");
    author.classList.add("dontDisplay");
    console.log(sections);
    sections[0].classList.add("dontDisplay");
    sections[1].classList.add("dontDisplay");
    sections[2].classList.add("dontDisplay");
};

const select = (myNumber) => {
    uls[currentSelected].classList.remove("selected");
    currentSelected = myNumber;
    uls[currentSelected].classList.add("selected");
};



init();