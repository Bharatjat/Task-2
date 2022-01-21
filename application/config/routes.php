<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'Dashbord';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['loginValidation'] = 'loginSignupAndValidation/Home/validationUserLogin';      // redirect rto login validation controller
$route['login'] = 'loginSignupAndValidation/Home/login';         // redirect to login page view
$route['sign_up'] = 'loginSignupAndValidation/Home/signUp';     // redirect to sign up page view
$route['ForgetPass'] = 'loginSignupAndValidation/Home/ForgetPass';       // redirect to forget password page view
$route['SaveNewPassword'] = 'loginSignupAndValidation/Home/SaveNewPassword';
$route['signUpValidation'] = 'loginSignupAndValidation/Home/validationUserRegistration';         // redirect to sign up validation controller
$route['logout'] = 'loginSignupAndValidation/Home/logout';           // to validation controller
$route['ForgetPassword'] = 'loginSignupAndValidation/Home/ResetPasswordMail';   //redirect user forget password view to resetPassswordMail 
$route['Create_New_Password'] = 'loginSignupAndValidation/Home/CreateNewPassword';
$route['Activate_User'] = 'loginSignupAndValidation/Home/ActivateUser';

// for subject detail system 
    $route['subjectHomePage'] = 'subject/Subject/index';
    $route['searchSubject'] = 'subject/Subject/searchSubject';             // redirect to search controller in user class
    $route['allSubjectDetails'] = 'subject/Subject/viewAll';                      // redirect to view all controller in user class
    $route['deleteSubject'] = 'subject/Subject/delete';                    // redirect to delete controller in user class
    $route['addSubj'] = 'subject/Subject/addSubject';                      // redirect to add new subject controller
    $route['viewSelectedData'] = 'subject/Subject/viewSelectedData';       //redirect to view user selected data
    $route['updateSelectedData'] = 'subject/Subject/updateSelectedData';   // redirect to update selscted data in user controller

/* for download */
    $route['excelDownload'] = 'Download/Download/excelDownload';
    $route['pdfDownload'] = 'Download/Download/pdfDownload';

/* for Employee detail system */
    $route['employeeHomePage'] = 'employee/Employee/index';
    $route['allEmployeeDetails'] = 'employee/Employee/viewAll';
    $route['deleteSubject'] = 'employee/Employee/delete';
    $route['searchEmployee'] = 'employee/Employee/search';
    $route['fillEmployee'] = 'employee/Employee/fillDetail';
    $route['addEmployee'] = 'employee/Employee/addEmployee';
    $route['getSelectedEmployeeDetail'] = 'employee/Employee/selectedEmployeeDetails';

/* for User Detail Page */
    $route['UserDetailPage'] = 'user/User/index';
    $route['allUserDetails'] = 'user/User/viewAll';
    $route['addNewUserDetail'] = 'user/User/addNewUser';
    $route['searchUserDetail'] = 'user/User/searchUserDetail';

/* for chef */
    $route['getLevel'] = 'Chef/getLevel';
    $route['getCuisines'] = 'Chef/getCuisines';
    $route['maxNoPeopleServe'] = 'Chef/maxNoPeopleServe';
    $route['getqualifications'] = 'Chef/getqualifications';
    $route['saveChef'] = 'Chef/saveChef';
    $route['getAllChefData'] = 'Chef/getAllChefData';
    $route['viewData'] = 'Chef/viewData';
    $route['editChef'] = 'Chef/editChef';

/* for userchef */
    $route['loadChefForEvent'] = 'userChef/UserChef/loadChefForEvent';
    $route['saveChefEvent'] = 'userChef/UserChef/saveChefEvent';
    $route['getAllUserChefEvent'] = 'userChef/UserChef/getAllUserChefEvent';

/* for products in payment gateway paypal */
    $route['getAllProducts'] = 'paymentGateway/products/getAllProducts';