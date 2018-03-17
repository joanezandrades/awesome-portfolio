/**
 * Funções relacionadas a seção de contato
*/
/**
 * Capturando os elementos de input
 * Aqui o importante é listar os elementos, e pegar as informações em cada cenário específico
*/
let iptName     = $('#ipt-name');
let iptEmail    = $('#ipt-email');
let iptJob      = $('#ipt-job');
let iptDate     = $('#ipt-deadline');
let iptBudget   = $('#ipt-budget');
let iptMsg      = $('#ipt-description');

// Botão send
let btnSubmitForm = $('#submit-form');

/**
 * Patterns de validação dos campos
 * @func regExpName
 * @func regExpEmail
 * @func regExpTypeJob
 * @func regExpOrcamento
*/
function regExpName (nameUser){
    
    let patternName = /^\w{4,25}/;
    let patternTest = patternName.test(nameUser);

    // Se for true
    if( patternTest ){

        iptName
            .removeClass('border-errror')
            .addClass('border-success')
            .siblings('.error-message').removeClass('err-mess-show')
            .siblings('.name').removeClass('hide')
    }else{

        iptName
            .removeClass('border-success')
            .addClass('border-error')
            .siblings('.error-message').addClass('err-mess-show')
            .siblings('.name').addClass('hide')
    }
}

function regExpEmail (emailUser){

    let patternEmail = /^\w+@\w+\.\w+\.?\w+$/;
    let patternTest = patternEmail.test(emailUser);

    // Se for true
    if( patternTest ){

        iptEmail
            .removeClass('border-error')
            .addClass('border-success')
            .siblings('.error-message').removeClass('err-mess-show')
            .siblings('.name').removeClass('hide')
    }else{

        iptEmail
            .removeClass('border-success')
            .addClass('border-error')
            .siblings('.error-message').addClass('err-mess-show')
            .siblings('.name').addClass('hide')
    }
}

function regExpTypeJob (content) {

    let patternJob = /\w/;
    let patternTest = patternJob.test(content);

    // Se for true
    if( patternTest ){

        iptJob
            .removeClass('border-error')
            .addClass('border-success')
            .siblings('.error-message').removeClass('err-mess-show')
            .siblings('.name').removeClass('hide')
    } else{

        iptJob
            .removeClass('border-success')
            .addClass('border-error')
            .siblings('.error-message').addClass('err-mess-show')
            .siblings('.name').addClass('hide')
    }
}

function regExpDate (date) {
    /**
     * Função que recebe uma data para verificar se é uma string vazia, se não for vazia
     * adiciona borda verde no campo data. Se não, adiciona borda vermelha.
    */
    if(date != '') {

        iptDate.css({

            'border' : '1px solid green'
        });
    } else {

        iptDate.css({
            
            'border' : '1px solid red'
        })
    }
}

function regExpMsg (msg) {

    patternMsg = /\w+/;
    patternTest = patternMsg.test(msg);

    // Se for true
    if( patternTest ) {

        iptMsg
            .removeClass('border-error')
            .addClass('border-success')
            .siblings('.error-message').removeClass('err-mess-show');
    } else {

        iptMsg
            .removeClass('border-success')
            .addClass('border-error')
            .siblings('.error-message').addClass('err-mess-show');
    }
}

/**
 * Verificações quando o usuário sair do campo
 * 
*/
iptName.focusout( function() { 

    regExpName($(this).val());
});

iptEmail.focusout( function () {

    regExpEmail($(this).val());
});

iptJob.focusout( function () {

    regExpTypeJob($(this).val());
})

iptMsg.focusout( function () {

    regExpMsg($(this).val());
});

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
btnSubmitForm.on( 'click', function(event) {

    // Testando os campos obrigatórios
    if( regExpName( iptName.val() ) || regExpEmail( iptEmail.val() ) ){
        
        // Completa a mensagem de sucesso com os dados do usuário
        $('.append-name').append( iptName.val() );
        $('.append-email').append( iptEmail.val() );
        $('.append-deadline').append( iptDate.val() );
        $('.append-budget').append( iptBudget.val() );

        // Construção da url
        let urlData =   '&name=' + iptName.val() + 
                        '&email=' + iptEmail.val() +
                        '&job=' + iptJob.val() + 
                        '&date=' + iptDate.val() + 
                        '&budget=' + iptBudget.val() + 
                        '&message=' + iptMsg.val();
        
        // Ajax
        $.ajax({
            type: 'POST', 
            url: 'wp-content/themes/awesome-portfolio/libs/sendmail.php',
            async: true,
            data: urlData,

            success: function(data) {

                $('.form').css({ 'display' : 'none' });
                $('.box-success-message').css({ 'display' : 'block' });
                console.log(data)
            }
        })
        event.preventDefault();
    } else {
        return false;
    }
    // regExpName( iptName.val() );
    // regExpEmail( iptEmail.val() );
    // regExpTypeJob( iptJob.val() );
    // regExpMsg( iptMsg.val() );

    event.preventDefault();
    console.log( urlData );
});
 