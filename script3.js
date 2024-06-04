// document.addEventListener("DOMContentLoaded", () =>{

//   // Variáveis Cliente
//   var searchInput_cliente = document.querySelector("#searchInput #inputCliente");
//   var autocomplete_cliente = document.querySelector("#autocomplete #autocompleteCliente");
//   // Variáveis Animal
//   var searchInput_animal = document.querySelector("#searchInput #inputAnimal");
//   var autocomplete_animal = document.querySelector("#autocomplete #autocompleteAnimal");
//   // Variáveis Funcionário
//   var searchInput_funcionario = document.querySelector("#searchInput #inputFuncionario");
//   var autocomplete_funcionario = document.querySelector("#autocomplete #autocompleteFuncionario");
  
//   var searchInput_teste = document.querySelector("#searchInput");
  
//   // --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  
//   function initAutocomplete(searchInput, autocomplete, endpointUrl, id) {
//     const searchInputElement = searchInput;
//     const autocompleteElement = autocomplete;
  
//     searchInputElement.addEventListener("focusin", (event) => {
//       autocompleteElement.style.display = "block";
//       if (
//         autocompleteElement.textContent.length == 0 ||
//         event.target.value.length == 0
//       ) {
//         autocompleteElement.innerHTML = `Nenhum ${id} encontrado`;
//         console.log("Entrou no if conteúdo do input vazio");
//       }
//     });
  
//     searchInputElement.addEventListener("focusout", (event) => {
//       setTimeout(() => {
//         console.log("Entrou na função focusout");
//         autocompleteElement.style.display = "none";
//       }, 200);
//     });
  
//     searchInputElement.addEventListener(
//       "input",
//       _.throttle(async (event) => {
//         try {
//           if (event.target.value.length === 0) {
//             autocompleteElement.style.display = "block";
//             autocompleteElement.innerHTML =
//               `<div id="notfound">Nenhum ${id} encontrado</div>`;
//             console.log("Entrou no if não encontrado");
//             return;
//           }
  
//           if (event.target.value.length >= 3) {
//             let response = await axios.get(endpointUrl, {
//               params: {
//                 [id]: event.target.value,
//               },
//             });
//             console.log("Entrou no if string maior que 3");
  
//             let data = response.data;
  
//             // Verificação de debug
//             console.log("Data received:", data);
  
//             if (!Array.isArray(data) || data.length === 0) {
//               autocompleteElement.style.display = "block";
//               autocompleteElement.innerHTML =
//                 `<div id="notfound">Nenhum ${id} encontrado</div>`;
//               return;
//             }
  
//             autocompleteElement.style.display = "block";
//             var encontrados = "<ul>";
//             encontrados += data
//               .map((item) => {
//                 return `<li><a href="#" data-id="${item.id}">${item.nome}</a></li>`;
//               })
//               .join("");
  
//             encontrados += "</ul>";
//             autocompleteElement.innerHTML = encontrados;
//           }
//         } catch (error) {
//           console.log(error);
//         }
//       }, 500)
//     );
  
//     autocompleteElement.addEventListener("click", (event) => {
//       if (event.target.tagName === "A") {
//         event.preventDefault();
//         searchInputElement.value = event.target.textContent;
//         autocompleteElement.style.display = "none";
//       }
//     });
//   }
  
  
//   [searchInput_cliente, searchInput_animal, searchInput_funcionario].forEach((inputElement, index) => {
//     inputElement.addEventListener('focusin', () => {
//       if (index === 0) {
//         initAutocomplete(searchInput_cliente, autocomplete_cliente, "/teste_cliente.php", "cliente");
//       } else if (index === 1) {
//         initAutocomplete(searchInput_animal, autocomplete_animal, "/teste_animal.php", "animal");
//       } else if (index === 2) {
//         initAutocomplete(searchInput_funcionario, autocomplete_funcionario, "/teste_funcionario.php", "funcionario");
//       }
//     });
//   });
// });

document.addEventListener("DOMContentLoaded", () => {
  // Variáveis Cliente
  var searchInput_cliente = document.querySelector("#inputCliente");
  var autocomplete_cliente = document.querySelector("#autocompleteCliente");
  // Variáveis Animal
  var searchInput_animal = document.querySelector("#inputAnimal");
  var autocomplete_animal = document.querySelector("#autocompleteAnimal");
  // Variáveis Funcionário
  var searchInput_funcionario = document.querySelector("#inputFuncionario");
  var autocomplete_funcionario = document.querySelector("#autocompleteFuncionario");

  function initAutocomplete(searchInput, autocomplete, endpointUrl, id) {
    const searchInputElement = searchInput;
    const autocompleteElement = autocomplete;

    searchInputElement.addEventListener("focusin", (event) => {
      autocompleteElement.style.display = "block";
      if (
        autocompleteElement.textContent.length == 0 ||
        event.target.value.length == 0
      ) {
        autocompleteElement.innerHTML = `Nenhum ${id} encontrado`;
        console.log("Entrou no if conteúdo do input vazio");
      }
    });

    searchInputElement.addEventListener("focusout", (event) => {
      setTimeout(() => {
        console.log("Entrou na função focusout");
        autocompleteElement.style.display = "none";
      }, 200);
    });

    searchInputElement.addEventListener(
      "input",
      _.throttle(async (event) => {
        try {
          if (event.target.value.length === 0) {
            autocompleteElement.style.display = "block";
            autocompleteElement.innerHTML =
              `<div id="notfound">Nenhum ${id} encontrado</div>`;
            console.log("Entrou no if não encontrado");
            return;
          }

          if (event.target.value.length >= 3) {
            let response = await axios.get(endpointUrl, {
              params: {
                [id]: event.target.value,
              },
            });
            console.log("Entrou no if string maior que 3");

            let data = response.data;

            // Verificação de debug
            console.log("Data received:", data);

            if (!Array.isArray(data) || data.length === 0) {
              autocompleteElement.style.display = "block";
              autocompleteElement.innerHTML =
                `<div id="notfound">Nenhum ${id} encontrado</div>`;
              return;
            }

            autocompleteElement.style.display = "block";
            var encontrados = "<ul>";
            encontrados += data
              .map((item) => {
                return `<li><a href="#" data-id="${item.id}">${item.nome}</a></li>`;
              })
              .join("");

            encontrados += "</ul>";
            autocompleteElement.innerHTML = encontrados;
          }
        } catch (error) {
          console.log(error);
        }
      }, 500)
    );

    autocompleteElement.addEventListener("click", (event) => {
      if (event.target.tagName === "A") {
        event.preventDefault();
        searchInputElement.value = event.target.textContent;
        autocompleteElement.style.display = "none";
      }
    });
  }

  [searchInput_cliente, searchInput_animal, searchInput_funcionario].forEach((inputElement, index) => {
    if (inputElement) {
      inputElement.addEventListener('focusin', () => {
        if (index === 0) {
          initAutocomplete(searchInput_cliente, autocomplete_cliente, "/teste_cliente.php", "cliente");
        } else if (index === 1) {
          initAutocomplete(searchInput_animal, autocomplete_animal, "/teste_animal.php", "animal");
        } else if (index === 2) {
          initAutocomplete(searchInput_funcionario, autocomplete_funcionario, "/teste_responsavel.php", "responsavel");
        }
      });
    }
  });
});
