module.exports = function (grunt) {

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');
    //grunt.loadNpmTasks('grunt-includes');
    //grunt.loadNpmTasks('grunt-inline');

    grunt.initConfig({
        concat: {
            html: {
                options: {
                    process: function (src, filepath) {
                        return '<script type="text/ng-template" id="' + filepath.replace(/\//ig, '.').replace("application.", '/') + '">' + src + '</script>';
                    }
                },
                src: 'application/modules/**/*.html',
                dest: 'views/templates.html'
            }
        },

        watch: {
            concat: {
                files: ['application/modules/**/*.html'],
                tasks: ['concat:html']
            }
        }
    });

    grunt.registerTask('default', ['concat:html']);
};