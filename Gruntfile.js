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
    copy: {
        img: {
            expand: true,
            cwd: 'assets/img',
            src: '**',
            dest: 'build/img'
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
        tasks: ['sass','cssmin','copy']
      }, 
      scripts: {
        files: 'js/*.js',
        tasks: ['copy','uglify']
      }
    }
    
    });


    grunt.registerTask('default', ['sass','cssmin','copy','uglify','watch']);

};