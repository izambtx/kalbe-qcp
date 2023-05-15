<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/user', 'Home::index');
$routes->get('/Home', 'Users::index');
$routes->post('/Home', 'Users::index');
$routes->get('/view_profile', 'Users::view_profile');
$routes->get('/change-password', 'Users::changePassword');
$routes->post('/update-password', 'Users::updatePassword');

$routes->get('/opl/export', 'Users::export');

// PEMBUAT.
$routes->get('/QCP/Building', 'BuildingCreator::index');
$routes->post('/QCP/Building', 'BuildingCreator::index');
$routes->get('/QCP/Building/FormCreate', 'BuildingCreator::create');
$routes->post('/QCP/Building/SaveProject', 'BuildingCreator::save');
$routes->get('/QCP/Building/Details/(:any)', 'BuildingCreator::detail/$1');

$routes->get('/QCP/Updated/Building', 'BuildingCreator::updated');
$routes->post('/QCP/Updated/Building', 'BuildingCreator::updated');
$routes->get('/QCP/Building/FormEdit/(:any)', 'BuildingCreator::edit/$1');
$routes->post('/QCP/Building/UpdateProject/(:any)', 'BuildingCreator::update/$1');

$routes->get('/QCP/Updated/Building', 'BuildingCreator::updated');
$routes->post('/QCP/Updated/Building', 'BuildingCreator::updated');
$routes->get('/QCP/Building/FormEdit/(:any)', 'BuildingCreator::edit/$1');
$routes->post('/QCP/Building/UpdateProject/(:any)', 'BuildingCreator::update/$1');

$routes->get('/QCP/Facility', 'FacilityCreator::index');
$routes->post('/QCP/Facility', 'FacilityCreator::index');
$routes->get('/QCP/Facility/FormCreate', 'FacilityCreator::create');
$routes->post('/QCP/Facility/SaveProject', 'FacilityCreator::save');
$routes->get('/QCP/Facility/Details/(:any)', 'FacilityCreator::detail/$1');

$routes->get('/QCP/Updated/Facility', 'FacilityCreator::updated');
$routes->post('/QCP/Updated/Facility', 'FacilityCreator::updated');
$routes->get('/QCP/Facility/FormEdit/(:any)', 'FacilityCreator::edit/$1');
$routes->post('/QCP/Facility/UpdateProject/(:any)', 'FacilityCreator::update/$1');

$routes->get('/QCP/Updated/Facility', 'FacilityCreator::updated');
$routes->post('/QCP/Updated/Facility', 'FacilityCreator::updated');
$routes->get('/QCP/Facility/FormEdit/(:any)', 'FacilityCreator::edit/$1');
$routes->post('/QCP/Facility/UpdateProject/(:any)', 'FacilityCreator::update/$1');

$routes->get('/QCP/Utility', 'UtilityCreator::index');
$routes->post('/QCP/Utility', 'UtilityCreator::index');
$routes->get('/QCP/Utility/FormCreate', 'UtilityCreator::create');
$routes->post('/QCP/Utility/SaveProject', 'UtilityCreator::save');
$routes->get('/QCP/Utility/Details/(:any)', 'UtilityCreator::detail/$1');

$routes->get('/QCP/Updated/Utility', 'UtilityCreator::updated');
$routes->post('/QCP/Updated/Utility', 'UtilityCreator::updated');
$routes->get('/QCP/Utility/FormEdit/(:any)', 'UtilityCreator::edit/$1');
$routes->post('/QCP/Utility/UpdateProject/(:any)', 'UtilityCreator::update/$1');

$routes->get('/QCP/Updated/Utility', 'UtilityCreator::updated');
$routes->post('/QCP/Updated/Utility', 'UtilityCreator::updated');
$routes->get('/QCP/Utility/FormEdit/(:any)', 'UtilityCreator::edit/$1');
$routes->post('/QCP/Utility/UpdateProject/(:any)', 'UtilityCreator::update/$1');

$routes->get('/QCP/Lainlain', 'LainlainCreator::index');
$routes->post('/QCP/Lainlain', 'LainlainCreator::index');
$routes->get('/QCP/Lainlain/FormCreate', 'LainlainCreator::create');
$routes->post('/QCP/Lainlain/SaveProject', 'LainlainCreator::save');
$routes->get('/QCP/Lainlain/Details/(:any)', 'LainlainCreator::detail/$1');

$routes->get('/QCP/Updated/Lainlain', 'LainlainCreator::updated');
$routes->post('/QCP/Updated/Lainlain', 'LainlainCreator::updated');
$routes->get('/QCP/Lainlain/FormEdit/(:any)', 'LainlainCreator::edit/$1');
$routes->post('/QCP/Lainlain/UpdateProject/(:any)', 'LainlainCreator::update/$1');

$routes->get('/QCP/Updated/Lainlain', 'LainlainCreator::updated');
$routes->post('/QCP/Updated/Lainlain', 'LainlainCreator::updated');
$routes->get('/QCP/Lainlain/FormEdit/(:any)', 'LainlainCreator::edit/$1');
$routes->post('/QCP/Lainlain/UpdateProject/(:any)', 'LainlainCreator::update/$1');

// PENYETUJU.
$routes->get('/QCP/Approver/Building', 'BuildingApprover::indexApprover');
$routes->post('/QCP/Approver/Building', 'BuildingApprover::indexApprover');
$routes->get('/QCP/Approver/Building/FormCreate', 'BuildingApprover::createApprover');
$routes->post('/QCP/Approver/Building/SaveProject/(:any)', 'BuildingApprover::approve/$1');
$routes->post('/QCP/Approver/Building/ReturnProject/(:any)', 'BuildingApprover::return/$1');
$routes->post('/QCP/Approver/Building/RejectProject/(:any)', 'BuildingApprover::reject/$1');
$routes->get('/QCP/Approver/Building/Details/(:any)', 'BuildingApprover::detailApprover/$1');

$routes->get('/QCP/HistoryApprover/Building', 'BuildingApprover::historyBuilding');
$routes->post('/QCP/HistoryApprover/Building', 'BuildingApprover::historyBuilding');
$routes->get('/QCP/HistoryApprover/Building/FormCreate', 'BuildingApprover::createApprover');
$routes->post('/QCP/HistoryApprover/Building/SaveProject/(:any)', 'BuildingApprover::saveApprover/$1');
$routes->get('/QCP/HistoryApprover/Building/Details/(:any)', 'BuildingApprover::detailApprover/$1');

$routes->get('/QCP/Approver/Facility', 'FacilityApprover::indexApprover');
$routes->post('/QCP/Approver/Facility', 'FacilityApprover::indexApprover');
$routes->get('/QCP/Approver/Facility/FormCreate', 'FacilityApprover::createApprover');
$routes->post('/QCP/Approver/Facility/SaveProject/(:any)', 'FacilityApprover::approve/$1');
$routes->post('/QCP/Approver/Facility/ReturnProject/(:any)', 'FacilityApprover::return/$1');
$routes->post('/QCP/Approver/Facility/RejectProject/(:any)', 'FacilityApprover::reject/$1');
$routes->get('/QCP/Approver/Facility/Details/(:any)', 'FacilityApprover::detailApprover/$1');

$routes->get('/QCP/HistoryApprover/Facility', 'FacilityApprover::historyFacility');
$routes->post('/QCP/HistoryApprover/Facility', 'FacilityApprover::historyFacility');
$routes->get('/QCP/HistoryApprover/Facility/FormCreate', 'FacilityApprover::createApprover');
$routes->post('/QCP/HistoryApprover/Facility/SaveProject/(:any)', 'FacilityApprover::saveApprover/$1');
$routes->get('/QCP/HistoryApprover/Facility/Details/(:any)', 'FacilityApprover::detailApprover/$1');

$routes->get('/QCP/Approver/Utility', 'UtilityApprover::indexApprover');
$routes->post('/QCP/Approver/Utility', 'UtilityApprover::indexApprover');
$routes->get('/QCP/Approver/Utility/FormCreate', 'UtilityApprover::createApprover');
$routes->post('/QCP/Approver/Utility/SaveProject/(:any)', 'UtilityApprover::approve/$1');
$routes->post('/QCP/Approver/Utility/ReturnProject/(:any)', 'UtilityApprover::return/$1');
$routes->post('/QCP/Approver/Utility/RejectProject/(:any)', 'UtilityApprover::reject/$1');
$routes->get('/QCP/Approver/Utility/Details/(:any)', 'UtilityApprover::detailApprover/$1');

$routes->get('/QCP/HistoryApprover/Utility', 'UtilityApprover::historyUtility');
$routes->post('/QCP/HistoryApprover/Utility', 'UtilityApprover::historyUtility');
$routes->get('/QCP/HistoryApprover/Utility/FormCreate', 'UtilityApprover::createApprover');
$routes->post('/QCP/HistoryApprover/Utility/SaveProject/(:any)', 'UtilityApprover::saveApprover/$1');
$routes->get('/QCP/HistoryApprover/Utility/Details/(:any)', 'UtilityApprover::detailApprover/$1');

$routes->get('/QCP/Approver/Lainlain', 'LainlainApprover::indexApprover');
$routes->post('/QCP/Approver/Lainlain', 'LainlainApprover::indexApprover');
$routes->get('/QCP/Approver/Lainlain/FormCreate', 'LainlainApprover::createApprover');
$routes->post('/QCP/Approver/Lainlain/SaveProject/(:any)', 'LainlainApprover::approve/$1');
$routes->post('/QCP/Approver/Lainlain/ReturnProject/(:any)', 'LainlainApprover::return/$1');
$routes->post('/QCP/Approver/Lainlain/RejectProject/(:any)', 'LainlainApprover::reject/$1');
$routes->get('/QCP/Approver/Lainlain/Details/(:any)', 'LainlainApprover::detailApprover/$1');

$routes->get('/QCP/HistoryApprover/Lainlain', 'LainlainApprover::historyLainlain');
$routes->post('/QCP/HistoryApprover/Lainlain', 'LainlainApprover::historyLainlain');
$routes->get('/QCP/HistoryApprover/Lainlain/FormCreate', 'LainlainApprover::createApprover');
$routes->post('/QCP/HistoryApprover/Lainlain/SaveProject/(:any)', 'LainlainApprover::saveApprover/$1');
$routes->get('/QCP/HistoryApprover/Lainlain/Details/(:any)', 'LainlainApprover::detailApprover/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
