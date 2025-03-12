
function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, ''); // Remover caracteres não numéricos
    if (cpf.length !== 11 || /^\d{11}$/.test(cpf) === false) {
        return false;
    }

    let sum = 0;
    for (let i = 0; i < 9; i++) {
        sum += parseInt(cpf.charAt(i)) * (10 - i);
    }

    let rest = sum % 11;
    let digitoVerificador1 = rest < 2 ? 0 : 11 - rest;

    if (parseInt(cpf.charAt(9)) !== digitoVerificador1) {
        return false;
    }

    sum = 0;
    for (let i = 0; i < 10; i++) {
        sum += parseInt(cpf.charAt(i)) * (11 - i);
    }

    rest = sum % 11;
    let digitoVerificador2 = rest < 2 ? 0 : 11 - rest;

    return parseInt(cpf.charAt(10)) === digitoVerificador2;
}

$(document).ready(function() {
    $('form').submit(function(event) {
        const cpfInput = $('#cpf').val();
        if (!validarCPF(cpfInput)) {
            event.preventDefault(); // Impede o envio do formulário caso o CPF seja inválido
            $('#cpf-error').css('display', 'block'); // Exibe a mensagem de erro na tela
        } else {
            $('#cpf-error').css('display', 'none'); // Oculta a mensagem de erro caso o CPF seja válido
        }
    });
});
