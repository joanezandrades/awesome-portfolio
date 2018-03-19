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
            main: {
                files: [
                    {
                        expand: true,
                        dot: false,
                        compress: true,
                        cwd: './',
                        src: ['**.php', '**.css', '**.png', '**.json', '**.js'],
                        dest: 'public/awp-v1.0.0/',
                    },
                    {
                        expand: true,
                        dot: false,
                        compress: true,
                        cwd: './inc',
                        src: '**/*.php',
                        dest: 'public/awp-v1.0.0/inc/',
                    },            
                    {
                        expand: true,
                        dot: false,
                        compress: true,
                        cwd: './libs',
                        src: '**.php',
                        dest: 'public/awp-v1.0.0/libs/',
                    },
                    {
                        expand: true,
                        dot: false,
                        compress: true,
                        cwd: './libs/css/',
                        src: '**.css',
                        dest: 'public/awp-v1.0.0/libs/css/',
                    },
                    {
                        expand: true,
                        dot: false,
                        compress: true,
                        cwd: './libs/js/',
                        src: '**',
                        dest: 'public/awp-v1.0.0/libs/js/',
                    },
                    {
                        expand: true,
                        dot: false,
                        compress: true,
                        cwd: './libs/PHPMailer_5.2.1',
                        src: '**/*.php',
                        dest: 'public/awp-v1.0.0/libs/PHPMailer_5.2.1/',
                    }
                ]
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