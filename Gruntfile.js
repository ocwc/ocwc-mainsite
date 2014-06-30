module.exports = function (grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    sass: {
      options: {
        includePaths: ['bower_components/foundation/scss']
      },
      dist: {
        options: {
          outputStyle: 'compressed'
        },
        files: {
          'build/css/app.css': 'assets/scss/app.scss'
        }
      }
    },

    watch: {
      grunt: { files: ['Gruntfile.js'] },

      sass: {
        files: ['assets/scss/*.scss', 'Gruntfile.js'],
        tasks: ['sass']
      }
    }

  });

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('build', ['sass']);
  grunt.registerTask('default', ['build','watch']);
};
