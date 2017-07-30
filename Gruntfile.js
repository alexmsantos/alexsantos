module.exports = function(grunt) {

    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        sass: {
            dist: {
                files: {
                    'assets/css/muitoestilo.css': 'assets/scss/muitoestilo.scss'
                }
            }
        },

        cssmin: {
          target: {
            files: {
              'build/muitoestilo.min.css': ['assets/css/muitoestilo.css']
            }
          }
        },

        uglify: {
            dist: {
                files: {
                    'build/alexsantos.min.js': [
                        'js/*.js'
                    ]
                }
            }
        },

        svgstore: {
            options: {
                prefix : 'icon-', // This will prefix each <g> ID
                cleanup: ['fill', 'style'],
                svg: {
                    style: 'display: none'
                }
            },
            default : {
                files: {
                    'build/svg-sprite.svg': ['assets/svg/*.svg'],
                }
            }
        },

        watch: {
          css: {
            files: ['assets/scss/*.scss'],
            tasks: ['sass','cssmin']
          }, 
          scripts: {
            files: 'js/*.js',
            tasks: ['uglify']
          }
        }
        
    });

    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-svgstore');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');


    grunt.registerTask('default', ['sass','cssmin','uglify','svgstore','watch']);

};