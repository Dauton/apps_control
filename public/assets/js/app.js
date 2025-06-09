$(document).ready(function () {

    // BIBLIOTECA DATATABLES
    $('table').DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
        }
    });
    
    
    // BIBLIOTECA SELECT2
    $('select').select2({
        language: "pt-BR",
        language: {
            noResults: function() {
                return "Nenhum resultado encontrado."
            }

        }
    });


    // MENSAGEM DE ALERTA SOME APÓS 5 SEGUNDOS
    setTimeout(() => {
        let p = document.getElementById("show-alert");
        p.style.opacity = "0";

        setTimeout(() => {
            p.style.display = "none";
        }, 3000);
    }, 5000);


    // DROP DOWN DA ÁREA DO USUÁRIO NO CABEÇALHO
    $(".container-user-area").hover(
        function() {
            $(".options-user-area").slideDown(100);
            $(".fa-caret-down").css({"transform": "rotate(180deg)"});
        },
        function() {
            $(".options-user-area").slideUp(100);
            $(".active-user-area .fa-caret-down").css({"transform": "rotate(0deg)"});
        }
    );

});