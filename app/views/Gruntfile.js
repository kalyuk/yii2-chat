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
                src: 'application/views/**/*.html',
                dest: 'layouts/templates.php'
            }
        },

        watch: {
            concat: {
                files: ['application/views/**/*.html'],
                tasks: ['concat:html']
            }
        }
    });

    grunt.registerTask('default', ['concat:html']);
};