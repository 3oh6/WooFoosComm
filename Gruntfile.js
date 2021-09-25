module.exports = function(grunt) {

	require('load-grunt-tasks')(grunt);

	grunt.initConfig({

		sass: {
			options: {
				sourceMap: false
			},
			dev: {
				options: {
					outputStyle: 'expanded'
				},
				files: {
					'.tmp/css/style.css': ['style.scss']
				}
			},
		},

		postcss: {
			options: {
				map: false,
				processors: [
					require('autoprefixer-core')({browsers: ['last 2 versions','ie 8','ie 9']})
				]
			},
			dev: {
				expand: 	true,
				flatten: 	true,
				src: 		['.tmp/css/*.css'],
				dest: 		'',
			},
		},

		watch: {
			options: {
				livereload: true
			},
			css: {
				files: ['*.scss','**/**/*.scss'],
				tasks: ['sass:dev','postcss:dev'],
			},
			php: {
				files: ['*.php','woocommerce/*/*.php'],
				options: {
					spawn: true
				},
			},
			livereload: {
				files: [
					'*.php',
					'*.css',
				]
			},
		},

	});

	grunt.registerTask('default',[
		'watch'
	]);

};