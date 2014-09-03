module.exports = function (grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    sass: {
      develop: {
        options: {
          style: 'nested',
          loadPath: ['bower_components/bootstrap-sass-official/assets/stylesheets/']
        },
        files: {
          '../css/style.css': 'scss/bootstrap.scss'
        }
      },
      build: {
        options: {
          style: 'compressed',
          loadPath: ['bower_components/bootstrap-sass-official/assets/stylesheets/']
        },
        files: {
          '../css/style.css': 'scss/bootstrap.scss'
        }
      },
      foundation: {
        style: 'compressed',
        loadPath: ['bower_components/foundation/scss/'],
        files: {
          'build/css/app.css': 'assets/scss/app.scss',
          'build/css/ie8.css': 'assets/scss/ie8.scss',
        }        
      }
    },

    uglify: {
      build: {
        files: {
          '../js/script.min.js': [
            'bower_components/fingerprint/fingerprint.js',
            'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js',
            'js/dropdowns-enhancement.js',
            'js/script.js'
          ]
        }
      }      
    },

    jshint: {
      'all': ['js/script.js']
    },

    pixrem: {
      options: {
        rootvalue: '14px'
      },
      dist: {
        src: 'build/css/app.css',
        dest: 'build/css/app.css'
      }
    },

    watch: {
      grunt: { files: ['scss/*.scss', 'Gruntfile.js', '../*.php', '../partials/*.php'],},

      options: {
        livereload: true,
      },

      sass: {
        files: ['scss/*.scss', 'Gruntfile.js', '../*.php'],
        tasks: ['sass:develop']
      },

      uglify: {
        files: ['js/*.js'],
        tasks: ['uglify', 'jshint']
      }      
    }

  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-pixrem');

  grunt.registerTask('build', ['sass:build', 'jshint', 'uglify']);
  grunt.registerTask('foundation', ['sass:foundation', 'pixrem']);
  grunt.registerTask('default', ['build','watch']);
  grunt.registerTask('develop', ['sass:develop', 'jshint', 'uglify', 'watch']);
};
