const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

/* Open the sidenav */
function openNav(x) {
    document.getElementById("mySidenav").style.width = "100%";

}

/* Close/hide the sidenav */
function closeNav(x) {
    document.getElementById("mySidenav").style.width = "0";

}

var isOpen = false;
function doNavAction(x) {
    if(isOpen == true){
        isOpen = false;
        closeNav(x);
        x.classList.remove("change");


    }else{
        isOpen = true;
        openNav(x);
        x.classList.toggle("change");

    }


}


