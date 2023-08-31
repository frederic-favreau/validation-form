// Événement de soumission du formulaire
document.querySelector("form").addEventListener("click", function (e) {
  e.preventDefault();
});

// Fonctions communes
function createAlertDiv(row) {
  const alertDiv = document.createElement("div");
  alertDiv.classList.add("box-alert");
  row.append(alertDiv);
  return alertDiv;
}

function removeAlertDiv(row) {
  const alertDiv = row.querySelector(".box-alert");
  if (alertDiv) {
    row.removeChild(alertDiv);
  }
}

function validateInput(input, condition, message, row) {
  removeAlertDiv(row);
  if (condition(input.value)) {
    const alertDiv = createAlertDiv(row);
    alertDiv.innerHTML = message;
    input.classList.add("invalid");
  } else {
    input.classList.remove("invalid");
    input.classList.add("valid");
  }
}

// Écouteurs d'événement et validations spécifiques
document.getElementById("username").addEventListener("keyup", function (e) {
  const row = e.target.closest(".row");
  validateInput(
    e.target,
    (value) => value.length < 3 || value.length > 20,
    "Le nom d'utilisateur doit contenir entre 3 et 20 caractères",
    row
  );
});

document.getElementById("mail").addEventListener("keyup", function (e) {
  const regexMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  const row = e.target.closest(".row");
  validateInput(
    e.target,
    (value) => !regexMail.test(value),
    "Veuillez entrer un mail valide",
    row
  );
});

document.getElementById("password").addEventListener("keyup", function (e) {
  const row = e.target.closest(".row");
  // le mot de passe doit : faire au moins 8 caractères, avoir au moins 1 majuscule, avoir au moins 1 caractère spécial
  validateInput(
    e.target,
    (value) =>
      value.length < 8 || !/[A-Z]/.test(value) || !/[!@#$%^&*]/.test(value),
    "Le mot de passe doit contenir au moins 8 caractères, une majuscule et un caractère spécial",
    row
  );
});

document.getElementById("password2").addEventListener("keyup", function (e) {
  const row = e.target.closest(".row");
  validateInput(
    e.target,
    (value) => value !== document.getElementById("password").value,
    "Les mots de passe ne correspondent pas",
    row
  );
});
