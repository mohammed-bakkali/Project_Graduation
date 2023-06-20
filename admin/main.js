let menu = document.querySelector("#menu-icon");
let sub_navbar = document.querySelector(".sub_navbar");

menu.onclick = () => {
    sub_navbar.classList.toggle("act");
    sub_navbar.classList.toggle('active');
}

// window.onscroll = () => {
//     menu.classList.remove("act");
//     sub_navbar.classList.remove('active');
// }