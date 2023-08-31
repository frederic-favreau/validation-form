const submitButton = document.getElementsByClassName("submitButton");

submitButton[0].addEventListener("click", function (e) {
  e.preventDefault();
});

// vérifier la longeur de la valeur du champ username
const userInput = document.getElementById("username");
const inputBorder = document.querySelector("input");
const rowForm = document.querySelector(".row");


userInput.addEventListener("keyup", function (e) {
  if (e.target.value.length > 20) {
    const alertDiv = document.createElement("div");
    alertDiv.classList.add("box-alert");
    alertDiv.innerHTML =
      "Le nom d'utilisateur ne doit pas dépasser 20 caractères";
    rowForm.appendChild(alertDiv);
    inputBorder.style.backgroundColor = "red";
  } else {
    inputBorder.style.backgroundColor = "green";
  }
});
