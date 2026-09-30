(function () {
    'use strict';

    const selector = 'input[name="buscarFicha"]';

    function completarNumero(input) {
        const numero = input.value.trim();
        if (/^[0-9]{1,7}$/.test(numero)) {
            input.value = numero.padStart(7, '0');
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
