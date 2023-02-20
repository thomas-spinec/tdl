//attente du chargement du DOM
document.addEventListener("DOMContentLoaded", function () {
  let buttonBurger = document.querySelector("#openBtn");

  let nav = document.querySelector(".mobile");

  buttonBurger.addEventListener("click", function () {
    nav.classList.toggle("open");
  });
});
