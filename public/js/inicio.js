const abrirModal = document.getElementById("abrirModalMesas");
const cerrarModal = document.getElementById("cerrarModal");
const modal = document.getElementById("modalMesas");
const listaMesas = document.getElementById("listaMesas");
const inputMesa = document.getElementById("mesaSeleccionada");

const mesas = [
  { numero: 1, estado: "disponible" },
  { numero: 2, estado: "ocupada" },
  { numero: 3, estado: "comandada" },
  { numero: 4, estado: "disponible" },
  { numero: 5, estado: "disponible" },
  { numero: 6, estado: "ocupada" },
  { numero: 7, estado: "disponible" },
  { numero: 8, estado: "comandada" },
  { numero: 9, estado: "disponible" },
  { numero: 10, estado: "disponible" },
  { numero: 11, estado: "disponible" }
];

abrirModal.addEventListener("click", () => {
  modal.style.display = "flex";
  cargarMesas();
});

cerrarModal.addEventListener("click", () => {
  modal.style.display = "none";
});

function cargarMesas() {
  listaMesas.innerHTML = "";
  mesas.forEach(mesa => {
    const btn = document.createElement("button");
    btn.textContent = `Mesa ${mesa.numero}`;
    btn.classList.add("mesa-btn", `mesa-${mesa.estado}`);

    // Asignamos los colores según el estado de la mesa
    if (mesa.estado === "disponible") {
      
      btn.classList.add("disponible");
      btn.addEventListener("click", () => {

        inputMesa.value = `Mesa ${mesa.numero}`;
        modal.style.display = "none";
      });
    } else if (mesa.estado === "ocupada") {

      btn.classList.add("ocupada");
      btn.disabled = true;

    } else if (mesa.estado === "comandada") {
      btn.classList.add("comandada");
    }

    listaMesas.appendChild(btn);
  });
}
