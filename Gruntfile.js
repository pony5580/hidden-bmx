'use strict';

module.exports = function(grunt) {
  var pkg = grunt.file.readJSON('package.json');
  /*========================================
  =            grunt.initConfig            =
  ========================================*/
  grunt.initConfig({
    url : 'http://hidden-bmx.com//',
    projectPath : 'htdocs/',
    sourcePath : 'htdocs_src/',
    pkg : grunt.file.readJSON('package.json'),
    /*==============================
    =            SERVER            =
    ==============================*/
    connect : {
      server : {
        options : {
          port : 9001,
          hostname : 'localhost',
          base: '<%= projectPath %>',
          livereload : true
          // keepalive : true
          // middleware : function(connect, options) {
          //   return [lrSnippet, folderMount(connect, './')];
          // }
        }
      }
    },
    /*-----  End of SERVER  ------*/


    /*===========================
    =            CSS            =
    ===========================*/
    compass : {
      dist : {
        options : {
          config : 'config.rb',
          environment : 'development',
          sourcemap: true
        }
      }
    },
    // cssmin : {
    //   combine : {
    //     files: {
    //       '<%= projectPath %>shared/css/main.min.css' : ['<%= projectPath %>shared/css/main.css']
    //     }
    //   }
    // },
    /*-----  End of CSS  ------*/

    /*====================================
    =            Sprite Image            =
    ====================================*/
    sprite: {
      all: {
        src : 'shared/images/sprites/*.png',
        destImg : '<%= projectPath %>shared13/images/spritesheet.png',
        destCSS : 'shared/scss/_sprite_positions.scss',
        engine  : 'phantomjs',
        padding : 5,
        imgPath: '/shared/images/spritesheet.png',
        algorithm: 'binary-tree',
        cssTemplate: 'shared/images/spritesmith.mustache'
      }
    },
    
    /*-----  End of Sprite Image  ------*/

    /*=============================
    =            WATCH            =
    =============================*/
    watch : {
      css : {
        files : ['<%= sourcePath %>shared/scss/**/*.scss'],
        tasks : ['css'],
        options : {
          debounceDelay : 1000
        }
      },
      all : {
        files : [
          '<%= watch.css.files %>'
        ],
        tasks : ['css'],
        options : '<%= watch.css.options %>'
      }
    }
    /*-----  End of WATCH  ------*/
  });
  /*-----  End of grunt.initConfig  ------*/

  var taskName;
  for(taskName in pkg.devDependencies) {
    if(taskName.substring(0,6) === 'grunt-'){
      grunt.loadNpmTasks(taskName);
    }
  }

  grunt.registerTask('default', ['connect', 'watch:all']);
  grunt.registerTask('css', ['compass:dist']);

  grunt.registerTask('img', ['sprite']);

};
