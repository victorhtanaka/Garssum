var currentTab = 0; // A guia atual é definida como a primeira guia (0)
showTab(currentTab); // Exibe a guia atual

function showTab(n) {
  // Esta função irá exibir a guia especificada do formulário...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... e ajustar os botões Anterior/Próximo:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Enviar";
  } else {
    document.getElementById("nextBtn").innerHTML = "Próximo";
  }
  // ... e executar uma função que exibe o indicador de etapa correto:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // Esta função determinará qual guia exibir
  var x = document.getElementsByClassName("tab");
  // Saia da função se algum campo na guia atual for inválido:
  if (n == 1 && !validateForm()) return false;
  // Ocultar a guia atual:
  x[currentTab].style.display = "none";
  // Aumentar ou diminuir a guia atual em 1:
  currentTab = currentTab + n;
  // Se você chegou ao final do formulário... :
  if (currentTab >= x.length) {
    //... o formulário será enviado:
    document.getElementById("regForm").submit();
    return false;
  }
  // Caso contrário, exibir a guia correta:
  showTab(currentTab);
}

function validateForm() {
  // Esta função lida com a validação dos campos do formulário
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // Um loop que verifica cada campo de entrada na guia atual:
  for (i = 0; i < y.length; i++) {
    // Se um campo estiver vazio...
    if (y[i].value == "") {
      // adicionar uma classe "inválido" ao campo:
      y[i].className += " invalid";
      // e definir o status de validade atual como falso:
      valid = false;
    }
  }
  // Se o status de validade for verdadeiro, marque a etapa como concluída e válida:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // retornar o status de validade
}

function fixStepIndicator(n) {
  // Esta função remove a classe "ativa" de todas as etapas...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... e adiciona a classe "ativa" à etapa atual:
  x[n].className += " active";
}
