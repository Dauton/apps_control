$(document).ready(function () {

    // BIBLIOTECA DATATABLES
    $('table').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json'
        },

        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                text: 'Exportar <img src="/assets/img/logo-excel.png" alt="Excel" style="height:15px;" >',
                title: 'gerenciador_ferramentas',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ]
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

    $('#minimize-form').click(function() {
        $('.conteudo form').toggle();
    });
    $('#minimize-table').click(function() {
        $('.conteudo #DataTables_Table_0_wrapper').toggle();
    });

});