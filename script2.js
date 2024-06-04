// Variáveis Cliente
var searchInput_cliente = document.querySelector("#searchInput #inputCliente");
var autocomplete_cliente = document.querySelector("#autocomplete #autocompleteCliente");
// Variáveis Animal
var searchInput_animal = document.querySelector("#searchInput #inputAnimal");
var autocomplete_animal = document.querySelector("#autocomplete #autocompleteAnimal");
// Variáveis Funcionário
var searchInput_funcionario = document.querySelector("#searchInput #inputFuncionario");
var autocomplete_funcionario = document.querySelector("#autocomplete #autocompleteFuncionario");

console.log("AAAAAAAAA");

// Funções para o autocomplete_cliente de cliente
searchInput_cliente.addEventListener("focusin", (event) => {
  autocomplete_cliente.style.display = "block";
  if (
    autocomplete_cliente.textContent.length == 0 ||
    event.target.value.length == 0
  ) {
    autocomplete_cliente.innerHTML = "Nada";
    console.log("Entrou no if conteúdo do input vazio");
  }
});

searchInput_cliente.addEventListener("focusout", (event) => {
  setTimeout(() => {
    console.log("Entrou na função focusout");
    autocomplete_cliente.style.display = "none";
  }, 200);
});

searchInput_cliente.addEventListener(
  "input",
  _.throttle(async (event) => {
    try {
      if (event.target.value.length === 0) {
        autocomplete_cliente.style.display = "block";
        autocomplete_cliente.innerHTML =
        '<div id="notfound">Não encontrado</div>';
        console.log("Entrou no if não encontrado");
        return;
      }
      
      if (event.target.value.length >= 3) {
        let response = await axios.get("/teste_cliente.php", {
          params: {
            cliente: event.target.value,
          },
        });
        console.log("Entrou no if string maior que 3");

        let data = response.data;

        // Verificação de debug
        console.log("Data received:", data);

        if (!Array.isArray(data) || data.length === 0) {
          autocomplete_cliente.style.display = "block";
          autocomplete_cliente.innerHTML =
            '<div id="notfound">Não encontrado</div>';
          return;
        }

        autocomplete_cliente.style.display = "block";
        var clientesEncontrados = "<ul>";
        clientesEncontrados += data
          .map((cliente) => {
            return `<li><a href="#" data-id="${cliente.idCliente}">${cliente.nome}</a></li>`;
          })
          .join("");

        clientesEncontrados += "</ul>";
        autocomplete_cliente.innerHTML = clientesEncontrados;
      }
    } catch (error) {
      console.log(error);
    }
  }, 500)
);

autocomplete_cliente.addEventListener("click", (event) => {
  if (event.target.tagName === "A") {
    event.preventDefault();
    searchInput_cliente.value = event.target.textContent;
    autocomplete_cliente.style.display = "none";
  }
});
