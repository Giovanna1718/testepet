// document.getElementById('flip-button').addEventListener('click', function(event) {
//     event.preventDefault();
//     document.querySelector('.login').classList.toggle('flipped');
//     // document.querySelector('.text-container').classList.toggle('flipped');
//     // document.querySelector('.text-inicio').classList.toggle('flipped');
//     let textContainer = document.getElementById('text-container');
//     let flipButton = document.getElementById('flip-button');

//     if (textContainer.innerText === "Faça login como Cliente") {
//         textContainer.innerText = "Faça login como Colaborador.";
//         flipButton.innerHTML = '<i class="fa-solid fa-repeat"></i> Colaboraores';
//     } else {
//         document.querySelector('.text-container').classList.toggle('flipped');
//         document.querySelector('.text-inicio').classList.toggle('flipped');
//         textContainer.innerText = "Faça login como Cliente";
//         flipButton.innerHTML = '<i class="fa-solid fa-repeat"></i> Clientes';
//     }
// });
// document.getElementById('flip-button-back').addEventListener('click', function(event) {
//     event.preventDefault();
//     document.querySelector('.login').classList.toggle('flipped');
// });

// script.js

document.addEventListener("DOMContentLoaded", () => {
  const card = document.querySelector(".card");
  const titulo = document.getElementsByClassName(".text-h1");
  const flipButton = document.getElementById("flip-button");
  const flipButtonBack = document.getElementById("flip-button-back");
  const textContainer = document.getElementById("text-container");
  const textContainerBack = document.getElementById("text-container-back");
  const form_cadastro = document.getElementById("cadastro");

  flipButton.addEventListener("click", function (event) {
    event.preventDefault();
    card.classList.toggle("flipped");

    if (textContainer.innerText === "Faça login como Cliente") {
      textContainer.innerText = "Login como Colaborador";
      titulo.innerText = "Login Colaborador";
      flipButton.innerHTML = '<i class="fa-solid fa-repeat"></i> Colaboradores';
    } //else {
    //     textContainer.innerText = "Faça login como Cliente";
    //     flipButton.innerHTML = '<i class="fa-solid fa-repeat"></i> Clientes';
    // }
  });

  flipButtonBack.addEventListener("click", function (event) {
    event.preventDefault();
    card.classList.toggle("flipped");

    if (textContainerBack.innerText === "Faça login como Colaborador") {
      textContainerBack.innerText = "Login como Cliente";
      titulo.innerText = "Login Cliente";
      flipButtonBack.innerHTML = '<i class="fa-solid fa-repeat"></i> Clientes';
    } //else {
    //     textContainerBack.innerText = "Faça login como Colaborador";
    //     flipButtonBack.innerHTML = '<i class="fa-solid fa-repeat"></i> Colaboradores';
    // }
  });
});

document.addEventListener("DOMContentLoaded", function (){
  const formCadastro = document.querySelector("#cadastro");
  const btnFechar = document.querySelector("#fechar");
  const btnAdicionar = document.querySelector(".adicionar");
  const btnCancelar = document.querySelector("#botao_cancelar");

  if (btnFechar) {
    btnFechar.addEventListener("click", function (){
      formCadastro.style.display = "none";
    });
  } else {
    console.error("O botão de fechar não foi encontrado.");
  }

  if (btnCancelar) {
    btnCancelar.addEventListener("click", function (){
      formCadastro.style.display = "none";
    });
  }

  if (btnAdicionar) {
    btnAdicionar.addEventListener("click", function () {
      formCadastro.style.display = "block";
    });
  } else {
    console.error("O botão de adicionar não foi encontrado.");
  }
});
