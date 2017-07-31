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

        px_to_rem: {
            dist: {
                options: {
                    base: 16,
                    fallback: false,
                    fallback_existing_rem: false,
                    ignore: ['margin','padding','width','height','max-width','max-height','margin-top','margin-bottom','margin-left','margin-right','padding-top','padding-bottom','padding-left','padding-right','border','border-bottom','border-top','border-left','border-right','border-radius'],
                    map: false
                },
                files: {
                    'assets/css/muitoestilo.css': ['assets/css/muitoestilo.css']
                }
            }
        },

        postcss: {
            options: {
              map: true, // inline sourcemaps

              processors: [
                require('pixrem')(), // add fallbacks for rem units
                require('autoprefixer')({browsers: 'last 2 versions'})
              ]
            },
            dist: {
              src: 'assets/css/*.css'
            }
        },

        watch: {
          css: {
            files: ['assets/scss/*.scss'],
            tasks: ['sass','px_to_rem','postcss','cssmin']
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
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-px-to-rem');



    grunt.registerTask('default', ['sass','px_to_rem','postcss','cssmin','uglify','svgstore','watch']);

};