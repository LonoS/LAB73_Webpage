"use strict";

const addButton = $("#addBTN");
const dissmissAlertButton = $("#alertAbbrechen");


const initAdd = () => {
    addButton.addEventListener("click", addButtonPressed);
    dissmissAlertButton.addEventListener("click", dissmissAlert);
};


const addButtonPressed = () => {
    console.log("addButton pressed.");
    $(".baseOverlay").style.display = "block";

};

const dissmissAlert = () => {
    console.log("dissmiss alert button pressed.");
    $(".baseOverlay").style.display = "none";


    // cleanup
    const inputFields = Array.from($$("input"));

    inputFields.forEach((item) => item.value = "");

    $("textarea").value = "";
};


initAdd();