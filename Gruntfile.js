module.exports = function(grunt) {

    require('load-grunt-tasks')(grunt);

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


    grunt.registerTask('default', ['sass','cssmin','uglify','watch']);

};