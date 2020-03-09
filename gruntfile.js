module.exports = function(grunt){
	grunt.initConfig({

		pkg: grunt.file.readJSON( 'package.json' ),

		watch: {
			sass: {
				files: ['**/*.scss'],
				tasks: ['sass', 'postcss', 'cssmin']
			}
		},

		sass: {
			options: {
	            sourceMap: true
	        },
			dist: {
				files: [
					{
						'style.css': 'style.scss'
					}
				]
			}
		},

		cssmin: {
			my_target: {
				files: [{
					expand: true,
					cwd: '.',
					src: [ '*.css', '!*.min.css' ],
					dest: '.',
					ext: '.min.css'
				}]
			}
		},

		postcss: {
            options: {
                map: true,
                processors: [
                    require('autoprefixer')({
                        browsers: ['last 20 versions']
                    })
                ]
            },
            dist: {
                src: '*.css'
            }
        },

	});

	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-sass' );
	grunt.loadNpmTasks( 'grunt-contrib-cssmin' );
	grunt.loadNpmTasks( 'grunt-postcss' );
	grunt.registerTask( 'build', [ 'sass', 'postcss', 'cssmin' ] );
	grunt.registerTask( 'default', [ 'build', 'watch' ] );
};
