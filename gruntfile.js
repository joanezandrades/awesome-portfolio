/* Recebe o grunt como parâmetro */
module.exports = function(grunt) {

    /* Configurações das tarefas */
    grunt.initConfig({

        /* Limpa os arquivos */
        clean: {
            css: ['libs/css/style-theme.css', 'libs/css/style-theme.min.css']
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
            
            public: {

                expand: true,
                cwd: '**',
                src: '**',
                dest: 'awp-2.1'
            }
        }
        
    });

    /* Carregando os plugins */
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-copy');

    /* Registrar tarefas */
    grunt.registerTask('default', ['clean', 'sass', 'cssmin']);
}