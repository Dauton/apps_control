$(document).ready(function () {

    // BIBLIOTECA DATATABLES
    $('table').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json'
        },

        dom: 'Blfrtip',
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


    // MENSAGEM DE ALERTA SOME APÓS 3 SEGUNDOS
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
            $(".options-user-area").slideDown(0);
            $(".fa-caret-down").css({"transform": "rotate(180deg)"});
        },
        function() {
            $(".options-user-area").slideUp(0);
            $(".active-user-area .fa-caret-down").css({"transform": "rotate(0deg)"});
        }
    );


    // MINIMIZAR FORMULÁRIO E TABELAS
    $('#minimize-form1').click(function() {
        $('.content .form1').toggle();
    });
    $('#minimize-form2').click(function() {
        $('.content .form2').toggle();
    });
    $('#minimize-table').click(function() {
        $('.content #DataTables_Table_0_wrapper').toggle();
    });


    // MENSAGEM DE CONFIRMAÇÃO DE EXCLUSÃO
    $('#btn-delete').click(function() {
        $('.back-confirmation-box').fadeToggle(100);
        $('.confirmation-box').fadeToggle(100).css({'display': 'flex'});
    });
    $('.confirmation-box #btn-cancel, .back-confirmation-box').click(function() {
        $('.back-confirmation-box').fadeToggle(100);
        $('.confirmation-box').fadeToggle(100).css({'display': 'none'});
    });


    // ESCONDER/EXIBIR MENU LATERAL
    let close = false;

    $('#active-menu').click(function() {
        if (!close) {
            $('.menu').css({
                'width': 0,
                'min-width': 0,
                'padding': '10px 0',
                'transition': '.1s ease-out'
            });
            $('#active-menu').css({
                'transform': 'rotate(180deg)',
                'transition': '.1s ease-out'
            });
        } else {
            $('.menu').css({
                'width': '170px',
                'min-width': '170px',
                'padding': '10px 10px',
                'transition': '.1s ease-out'
            });
            $('#active-menu').css({
                'transform': 'rotate(0deg)',
                'transition': '.1s ease-out'
            });
        }
        close = !close;
    });


    // EXIBIR MENU LATERAL MOBILE
    $('#active-menu-mobile').click(function() {
        $('.back-menu').fadeToggle(100);
        $('.menu').slideDown(200);
    })
    $('#deactivate-menu, .back-menu').click(function() {
        $('.back-menu').fadeToggle(200);
        $('.menu').slideUp(100);
    });


    // EXIBIR/ESCONDER SENHA
    $('#show-password').click(function() {
        $('#password').attr('type', 'text');
        $('#show-password, #hide-password').fadeToggle(0);
    });
    $('#hide-password').click(function() {
        $('#password').attr('type', 'password');
        $('#hide-password, #show-password').fadeToggle(0);
    });

});
