module.exports = function(grunt) {

	require('load-grunt-tasks')(grunt);

	grunt.initConfig({

		// https://npm.io/package/grunt-dart-sass
		'dart-sass': {
			dev: {
				options: {
					outputStyle: 'expanded'
				},
				files: {
					'.tmp/css/style.css': ['style.scss']
				}
			}
		},

		'postcss': {
			options: {
				map: {
					inline: false,
					annotation: 'cssmaps/'
				},

				processors: [
					require('pixrem')(),
					require('autoprefixer')(),
					require('cssnano')({
						preset: ['default', {
							discardComments: {removeAll: false }
						}]
					})
				]
			},

			dev: {
				expand: 	true,
				flatten: 	true,
				src: 		['.tmp/css/*.css'],
				dest: 		''
			}
		},

		'watch': {
			options: {
				livereload: true
			},
			css: {
				files: ['*.scss','**/**/*.scss'],
				tasks: ['dart-sass:dev','postcss:dev'],
			},
			php: {
				files: ['*.php','woocommerce/*/*.php'],
				options: {
					spawn: true
				}
			},
			livereload: {
				options: {
					livereload: true
				},
				files: [
					'*.php',
					'*.css'
				]
			}
		}

	});

	grunt.registerTask('default',[
		'watch'
	]);

};