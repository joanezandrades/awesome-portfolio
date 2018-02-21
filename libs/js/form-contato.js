/**
 * Funções relacionadas a seção de contato
*/

/**
 * Patterns de validação dos campos
 * @func regExpName
 * @func regExpEmail
 * @func regExpOrcamento
*/
function regExpName (nameUser){
    
    let patternName = /[a-z]{4,25}/;
    let patternTest = patternName.test(nameUser);

    if( patternTest ) {

        $('#ipt-name').css({
            'border' : '1px solid green'
        })
        console.log(`O Padrão é: ${patternTest}`)
    } else {

        $('#ipt-name').css({
            'border' : '1px solid red'
        })
        console.log(`O Padrão é: ${patternTest}`)
    }
}

function regExpEmail (emailUser){

    let patternEmail = /\w(@)/;
    let patternTest = patternEmail.test(emailUser);

    if( patternTest ){

        $('#ipt-email').css({

            'border' : '1px solid green'
        });
        console.log(`O Padrão é: ${patternTest}`);
    } else {

        $('#ipt-email').css({
            'border' : '1px solid red'
        })
        console.log(`O Padrão é: ${patternTest}`);
    }
}

function regExpOrcamento (orcamento){

}

/**
 * Funções formulário mobile
 * @func openForm
 * @func closeForm
 * @func countSteps
 * @func nextPhase
 * 
*/
(function openForm (){
    
    /**
     * Quando a função é chamada ela adiciona a classe "active-app-form"
    */
    $('#open-app-contato').on( 'click', function() {

        $('#box-contact-mobile').addClass('active-app-form');

        // Também trava a rolagem do site
        $('html').css({
            'overflow' : 'hidden'
        })
    })
}) ();

(function closeForm (){

    /**
     * Quando a função é chamada retira a classe "active-app-form"
    */
    $('#close-app-form').on( 'click', function() {

        $('#box-contact-mobile').removeClass('active-app-form');

        // Também destrava o HTML
        $('html').css({
            'overflow' : 'auto'
        });
    } )
}) ();

function showBtnSendMobile (){

    $('.bnt-send').addClass('show-btn-send');
}

(function nextPhase (){

    /**
     * Quando clicado chama a fase 2
    */
    $('#to-phase-two').on( 'click', function(){

        // Valores dos campos
        let nameUser    = $('#ipt-name').val();
        let emailUser   = $('#ipt-email').val();

        let nameIsValid = regExpName(nameUser);

        // Verifica os campos
        // if( nameIsValid ){

        // Chama a próxima fase
        $('.phase-one').removeClass('active-phase');
        $('.phase-two').addClass('active-phase');

        // Muda o contador
        $('#count-phase-one').removeClass('active-count');
        $('#count-phase-two').addClass('active-count');

        console.log(regExpName(nameUser));
        // }
    });

    /**
     * Quando clicado chama a fase 3
    */
    $('#to-phase-three').on( 'click', function(){

        $('.phase-two').removeClass('active-phase');
        $('.phase-three').addClass('active-phase');

        // Muda o contador
        $('#count-phase-two').removeClass('active-count');
        $('#count-phase-three').addClass('active-count');

        // Mostra o botão send
        showBtnSendMobile();
    })
}) ();


/**
 * Envio e-mail com AJAX + PHP
*/
$('#submit-form').on( 'click', function(event) {

    // Coletar dados dos inputs
    let nameUser    = $('#ipt-name').val();
    let emailUser   = $('#ipt-email').val();
    let jobUser     = $('#ipt-job').val();
    let dateUser    = $('#ipt-deadline').val();
    let budgetUser  = $('#ipt-budget').val();
    let messageUser = $('#ipt-description').val();

    // // Validando os campos
    // if( nameUser.length <= 3 ) {
    //     alert('Nome Inválido');
    //     return false;
    // }
    // if( emailUser.length <= 5 ) {
    //     alert('E-mail inválido');
    //     return false;
    // }
    // if( messageUser.length <= 7 ) {
    //     alert('Mensagem inválida')
    //     return false;
    // }

    // Completa a mensagem de sucesso com os dados do usuário
    $('.append-name').append( nameUser );
    $('.append-email').append( emailUser );
    $('.append-deadline').append( dateUser );
    $('.append-budget').append( budgetUser );

    // Construção da url
    let urlData =   '&name=' + nameUser + 
                    '&email=' + emailUser +
                    '&job=' + jobUser + 
                    '&date=' + dateUser + 
                    '&budget=' + budgetUser + 
                    '&message=' + messageUser;
    
    // Ajax
    $.ajax({
        type: 'POST', 
        url: 'wp-content/themes/awp v2.2/libs/send_email.php',
        async: true,
        data: urlData,

        success: function(data) {

            $('.form').css({ 'display' : 'none' });
            $('.box-success-message').css({ 'display' : 'block' });
            console.log(data)
        }
    })
    console.log( urlData );

    event.preventDefault();
});
 