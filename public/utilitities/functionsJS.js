function formatarNumeroAutomaticoDecimal(input) {
    // Obtém o valor do input
    var valor = input.value.replace(/\D/g, '');

    // Converte o valor para um número
    var numero = parseFloat(valor) / 100; // Divide por 100 para obter o valor decimal

    // Formata o número usando toLocaleString()
    var numeroFormatado = numero.toLocaleString('pt-BR', { minimumFractionDigits: 2 });

    // Atualiza o valor do input
    input.value = numeroFormatado;
}
