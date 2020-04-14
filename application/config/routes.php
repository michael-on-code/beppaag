<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//TODO use :any instead of (.+). View DOc URI Routing
$route['default_controller'] = 'home';
$route['404_override'] = 'p_404';
$route['articles'] = 'blog';
$route['a-propos'] = 'about';
$route['evenements'] = 'events';
$route['evaluations/thematic/(.+)'] = 'evaluations/thematic/$1';
$route['evaluations/thematique/(.+)'] = 'evaluations/thematic/$1';
$route['evaluations/temporality/(.+)'] = 'evaluations/temporality/$1';
$route['evaluations/temporalite/(.+)'] = 'evaluations/temporality/$1';
$route['evaluations/year/(.+)'] = 'evaluations/year/$1';
$route['evaluations/annee/(.+)'] = 'evaluations/year/$1';
$route['evaluations/sector/(.+)'] = 'evaluations/sector/$1';
$route['evaluations/secteur/(.+)'] = 'evaluations/sector/$1';
$route['evaluations/(.+)'] = 'evaluations/index/$1';
$route['events/tag/(.+)'] = 'events/tag/$1';
$route['evenements/etiquette/(.+)'] = 'events/tag/$1';
$route['events/category/(.+)'] = 'events/category/$1';
$route['evenements/categorie/(.+)'] = 'events/category/$1';
$route['events/(.+)'] = 'events/index/$1';
$route['evenements/(.+)'] = 'events/index/$1';

$route['blog/tag/(.+)'] = 'blog/tag/$1';
$route['articles/etiquette/(.+)'] = 'blog/tag/$1';
$route['blog/category/(.+)'] = 'blog/category/$1';
$route['articles/categorie/(.+)'] = 'blog/category/$1';
$route['blog/(.+)'] = 'blog/index/$1';
$route['articles/(.+)'] = 'blog/index/$1';
$route['admin'] = 'admin-login';
$route['admin/(.+)'] = 'admin-'.'$1';
$route['translate_uri_dashes'] = TRUE;
