/* Recebe o grunt como parâmetro */
module.exports = function(grunt) {

    /* Configurações das tarefas */
    grunt.initConfig({

        /* Clean arquivos */
        clean: {
            css: ['libs/css/style-theme.css', 'libs/css/style-theme.min.css'],
            public: ['public/'] 
        },

        /* Compila .sass > .css */
        sass: {
            dist: {
                files: [{
                    expand: true,
                    cwd: 'libs/css',
                    src: ['style-theme.sass'],
                    dest: 'libs/css',
                    ext: '.css'
                }],
                check: true,
                style: 'compressed',
                update: true,
                lineNumbers: true,
                sourcemap: false                
            }
        },

        /* Minifica o css */
        cssmin: {
            target: {
                files: [{
                    expand: true,
                    cwd: 'libs/css',
                    src: ['*.css', '!*.min.css'],
                    dest: 'libs/css',
                    ext: '.min.css'
                }]
            }
        },

        /* Copy grunt */ 
        copy: {
            main: {
                files: [
                    {
                        expand: true,
                        dot: false,
                        compress: true,
                        cwd: './',
                        src: [

                            '**.php', '**.css', '**.png', '**.json', '**.js', //Arquivos
                            '!./vscode', '!./sass-cache', '!./node_modules', '!./libs/PHPMailer_5.2.1', // Não copiar
                            'inc/**/*.php', 'libs/sendmail.php','libs/css/**.css', 'libs/js/**.js', //Pastas
                        ], 
                        dest: 'public/awp-v1.0.0/',
                    }
                ]
            }
        }
    });

    /* Carregando os plugins */
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-copy');

    /* Registrar tarefas */
    grunt.registerTask( 'default', ['clean:css', 'sass', 'cssmin'] );
    grunt.registerTask( 'publicwork', ['clean:public', 'copy'] );

}