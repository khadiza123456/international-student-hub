document.addEventListener("DOMContentLoaded", (event) => {


  const menuBars = document.querySelector("#open-close--menu");
  const navigation = document.querySelector(".header .navigation");
  const closeMenuBars = document.querySelector("#close-menu--bars");



    menuBars.addEventListener('click', (e) => {
        e.preventDefault();
        navigation.classList.toggle('open');
    });

    closeMenuBars.addEventListener("click", (e) => {
        e.preventDefault();
        navigation.classList.toggle('open');
    });
    

});