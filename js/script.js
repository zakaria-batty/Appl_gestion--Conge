let section = document.querySelector(".section");
let demande = document.getElementById("demande");
let envoyés = document.getElementById("envoyés");

demande.addEventListener("click", (e) => {
    section.classList.remove("affiche");
    e.preventDefault();
});

// demande.addEventListener("ondblclick", (e) => {
//   section.classList.add("affiche");
//   e.preventDefault();
// });
