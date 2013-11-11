module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    less: {
      app: {
        files: {
          'assets/app.min.css': 'assets/less/**.less'
        }
      }
    },

    cssmin: {
      css: {
        src: [
          'styles/ie.css', 'styles/reset.css', 'styles/responsive-gs-12col.css', 'styles/wp-essentials.css',
          'styles/totop.css', 'styles.responsive.css', 'styles/flexslider.css', 'themes/carrot.css', 'style.css',
          'assets/app.min.css'
        ],
        dest: 'assets/main.min.css'
      }
    },

    uglify: {
      libs: {
        files: {
          'assets/main.min.js': [
            'include/jquery.easing.js', 'include/jquery.flexslider.js', 'include/jquery.hoverintent.js',
            'include/jquery.supersubs.js', 'include/jquery.superfish.js', 'include/jquery.fitvids.js',
            'include/jquery.nicescroll.js', 'include/jquery.cookie.js', 'include/jquery.ui.totop.js',
            'include/jquery.themelovin.js', 'include/modernizr.custom.71362.js'
          ]
        }
      }
    },
    
    watch: {
      less: {
        files: ['assets/less/*.less'],
        tasks: ['less']
      },
      prepare:{
        options: { spawn: false },
        files: ['assets/app.min.css', 'assets/main.min.css', 'assets/main.min.js'],
        tasks: ['cssmin', 'uglify', 'version', 'notify:ready']
      }
    },

    notify: {
      ready: {
        options: {
          title: 'Benedict',
          message: 'Theme files updated.'  
        }
      }
    }


  });

  grunt.loadTasks('build/tasks');
  grunt.registerTask('default', ['less', 'cssmin', 'uglify', 'version']);
  grunt.loadNpmTasks('grunt-recess');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-notify');
  grunt.load
};