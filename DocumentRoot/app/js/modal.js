// Obtén el botón y la ventana modal por su ID
var openModalBtn = document.getElementById("openModalBtn");
var modal = document.getElementById("myModal");
var closeModal = document.getElementById("closeModal");

// Cuando se hace clic en el botón, muestra la ventana modal
openModalBtn.addEventListener("click", function() {
  modal.style.display = "block";
});

// Cuando se hace clic en el botón de cierre, oculta la ventana modal
closeModal.addEventListener("click", function() {
  modal.style.display = "none";
});

// Cuando se hace clic fuera de la ventana modal, también la oculta
window.addEventListener("click", function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
});

// Evita que el clic en la ventana modal se propague al botón
modal.addEventListener("click", function(event) {
  event.stopPropagation();
});




