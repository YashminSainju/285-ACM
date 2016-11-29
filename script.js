var routerApp=angular.module('routerApp', ['ui.router']);
routerApp.config(function($stateProvider, $urlRouterProvider) {
	$urlRouterProvider.otherwise('/home');
	
	$stateProvider
	
		.state('home', {
			url: '/home',
			templateUrl:'pages/home.html'
		})
		//.state('about', {
		//	url: '/about',
		//	templateUrl:'https://www.acm.org'
		//})
		
		.state('calendar', {
			url: '/calendar',
			templateUrl:'pages/calendar.html'
		})
	
		.state('events', {
			url: '/events',
			templateUrl:'pages/events.html'
		})
		.state('gallery', {
			url: '/gallery',
			templateUrl:'pages/gallery.html'
		})
		.state('jobs', {
			url: '/jobs',
			templateUrl:'pages/jobs.php'
		})
		.state('admin', {
			url: '/admin',
			templateUrl:'admin.php'
		});
});