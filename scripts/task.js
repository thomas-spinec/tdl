// attente du chargement du DOM
window.addEventListener("load", function () {
  /* récupération des éléments */
  // formulaire
  const formTask = document.querySelector("#formTask");
  const btnFormTask = document.querySelector("#btnAdd");

  // liste des tâches à faire
  const toDo = document.querySelector("#toDo");

  // liste des tâches faites
  const done = document.querySelector("#done");

  // fonction d'ajout d'une tâche dans la bdd
  function addTask() {
    // récupération des données du formulaire
    let data = new FormData(formTask);
    data.append("send", "add");
    // envoi des données au serveur
    fetch("manageTask.php", {
      method: "POST",
      body: data,
    })
      .then((response) => response.text())
      .then((response) => {
        response = response.trim();
        if (response == "ok") {
          // on vide le formulaire
          formTask.reset();
          // on display a nouveau les tâches
          displayTasks();
        } else {
          formTask.nextElementSibling.innerHTML =
            "Une erreur est survenue, votre tâche n'a pas pu être ajoutée";
        }
      })
      .catch((error) => console.log(error));
  }

  // fonction d'affichage des tâches
  function displayTasks() {
    fetch("todo.php", {
      method: "GET",
    })
      .then((response) => response.json())
      .then((response) => {
        // on vide les listes
        toDo.innerHTML = "";
        done.innerHTML = "";
        // on parcourt les tâches
        response.forEach((task) => {
          // on crée les éléments
          let section = document.createElement("section");
          let p = document.createElement("p");
          let date = document.createElement("p");
          let btnDelete = document.createElement("button");
          let btnDone = document.createElement("button");
          // boutons check et delete
          let checkImg = document.createElement("i");
          checkImg.classList.add("fa-solid", "fa-check", "btn-success");
          let deleteImg = document.createElement("i");
          deleteImg.classList.add("fa-solid", "fa-xmark", "btn-delete");
          // on ajoute les classes
          section.classList.add("section_Task");
          p.classList.add("task");
          date.classList.add("date_task");
          btnDelete.classList.add("btn", "btn-delete");
          btnDone.classList.add("btn", "btn-success");
          // on ajoute les attributs
          btnDelete.setAttribute("data-id", task.id);
          btnDone.setAttribute("data-id", task.id);
          deleteImg.setAttribute("data-id", task.id);
          checkImg.setAttribute("data-id", task.id);
          // on ajoute les textes
          p.textContent = task.tache;
          btnDelete.appendChild(deleteImg);
          btnDone.appendChild(checkImg);
          // on ajoute les éléments présents dans chaque liste
          section.appendChild(p);
          section.appendChild(date);
          // on vérifie que la tâche est faites ou non
          if (task.state == 0) {
            date.textContent = task.dateCrea;
            // on ajoute les éléments propre à cette liste
            section.appendChild(btnDelete);
            section.appendChild(btnDone);
            // on ajoute la tâche dans la bonne liste
            toDo.appendChild(section);
          } else {
            date.textContent = task.dateCrea + " - " + task.dateRea;
            // on ajoute les éléments propre à cette liste
            section.appendChild(btnDelete);
            // on ajoute la tâche dans la bonne liste
            done.appendChild(section);
          }
        });
      })
      .catch((error) => console.log(error));
  }

  // fonction de suppression d'une tâche
  function deleteTask(id) {
    let data = new FormData();
    data.append("id", id);
    data.append("action", "delete");
    // envoi des données au serveur
    fetch("manageTask.php", {
      method: "POST",
      body: data,
    })
      .then((response) => response.text())
      .then((response) => {
        response = response.trim();
        if (response == "ok") {
          // on display a nouveau les tâches
          displayTasks();
        } else {
          formTask.nextElementSibling.innerHTML =
            "Une erreur est survenue, votre tâche n'a pas pu être supprimée";
        }
      })
      .catch((error) => console.log(error));
  }

  // fonction de changement de statut d'une tâche
  function changeStatus(id) {
    let data = new FormData();
    data.append("id", id);
    data.append("action", "done");
    // envoi des données au serveur
    fetch("manageTask.php", {
      method: "POST",
      body: data,
    })
      .then((response) => response.text())
      .then((response) => {
        response = response.trim();
        if (response == "ok") {
          // on display a nouveau les tâches
          displayTasks();
        } else {
          formTask.nextElementSibling.innerHTML =
            "Une erreur est survenue, le statut de votre tâche n'a pas pu être modifié";
        }
      })
      .catch((error) => console.log(error));
  }

  // on affiche les tâches
  displayTasks();

  // on ajoute un écouteur d'événement sur le bouton d'ajout de tâche
  btnFormTask.addEventListener("click", function (e) {
    e.preventDefault();
    addTask();
  });

  // on ajoute un écouteur d'événement sur la liste des tâches à faire
  toDo.addEventListener("click", function (e) {
    e.preventDefault();
    if (e.target.classList.contains("btn-delete")) {
      deleteTask(e.target.getAttribute("data-id"));
    } else if (e.target.classList.contains("btn-success")) {
      changeStatus(e.target.getAttribute("data-id"));
    }
  });

  // on ajoute un écouteur d'événement sur la liste des tâches faites
  done.addEventListener("click", function (e) {
    e.preventDefault();
    if (e.target.classList.contains("btn-delete")) {
      deleteTask(e.target.getAttribute("data-id"));
    }
  });
});
