function sendMail () {

    // Coletando os dados
    var nameUser    = $('.ipt-name').val();
    var emailUser   = $('.ipt-email').val();
    var textUser    = $('.ipt-text').val();


    // Construindo a URL
    var urlData     = "&nome" + nameUser + "&email" + "&text" + textUser;

    // Ajax
    $.ajax({
        type:       "POST",
        url:        "wp-content/themes/awesomeportfolio/libs/sendmail.php",
        async:      true,
        data:       urlData,
        success:    function (data) {
            // O que acontece quando retorna sucess
            console.log(data)
        },
        error:      function (data) {
            // O que acontece quando retorna erro
            console.log(data)
        }

    })
    console.log(nameUser, emailUser, textUser, urlData)
}

$('#btn-send').on('click', function (event) {
    event.preventDefault()
    sendMail();
})