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
					'.tmp/css/style.css': ['src/sass/style.scss'],
					'.tmp/css/custom-editor-style.css': ['src/sass/custom-editor-style.scss']
				}
			}
		},

		'postcss': {
			options: {
				map: {
					inline: false,
					annotation: 'css/cssmaps/'
				},

				processors: [
					require('pixrem')(),
					require('autoprefixer')(),
					/*require('postcss-understrap-palette-generator')({
						defaults: {

						},

						colors: [
							"--Primary",
							"--Primary-Dark",
							"--Primary-Light",
							"--Secondary",
							"--Secondary-Dark",
							"--Secondary-Light"
						]
					}),*/
					require('cssnano')({
						preset: ['default', {
							discardComments: { removeAll: false }
						}]
					})
				]
			},

			dev: {
				expand: 	true,
				flatten: 	true,
				files: {
					'style.css': ['.tmp/css/style.css'],
					'css/custom-editor-style.css': ['.tmp/css/custom-editor-style.css']
				}
			}
		},

		'watch': {
			options: {
				livereload: true
			},
			php: {
				files: ['*.php','**/*.php','**/**/*.php'],
			},
			sass: {
				options: {
					livereload: false
				},
				files: ['*.scss','**/**/*.scss'],
				tasks: ['dart-sass:dev','postcss:dev'],
			},
			css: {
				files: ['style.css'],
				tasks: []
			}
		}

	});

	grunt.registerTask('default',[
		'watch'
	]);

};