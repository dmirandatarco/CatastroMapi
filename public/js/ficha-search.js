(function () {
    'use strict';

    const selector = 'input[name="buscarFicha"], input[name="buscarLote"]';

    function completarNumero(input) {
        const numero = input.value.trim();
        const digitos = input.name === 'buscarLote' ? 3 : 7;
        if (/^[0-9]+$/.test(numero) && numero.length <= digitos) {
            input.value = numero.padStart(digitos, '0');
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll(selector).forEach(completarNumero);
    });

    document.addEventListener('focusout', function (event) {
        if (event.target.matches(selector)) {
            completarNumero(event.target);
        }
    });

    document.addEventListener('submit', function (event) {
        event.target.querySelectorAll(selector).forEach(completarNumero);
    }, true);
}());
