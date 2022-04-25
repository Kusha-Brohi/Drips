<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}


//===================== Admin Routes =====================//

Route::group(['middleware' => ['auth', 'roles'],'roles' => 'admin','prefix'=>'admin'], function () {


    Route::get('/','Admin\AdminController@dashboard');

    Route::get('/dashboard','Admin\AdminController@dashboard');
    
    Route::get('account/settings','Admin\UsersController@getSettings');
    Route::post('account/settings','Admin\UsersController@saveSettings');

    Route::get('project', function () {
        return view('dashboard.index-project');
    });

    Route::get('analytics', function () {
        return view('admin.dashboard.index-analytics');
    });


    Route::get('logo/edit','Admin\AdminController@logoEdit');
    Route::post('logo/upload','Admin\AdminController@logoUpload')->name('logo_upload');
    
    Route::get('favicon/edit','Admin\AdminController@faviconEdit');
    
    Route::post('favicon/upload','Admin\AdminController@faviconUpload')->name('favicon_upload');

    Route::get('config/setting', function () {
        return view('admin.dashboard.index-config');
    });

    Route::get('contact/inquiries','Admin\AdminController@contactSubmissions');
    Route::get('contact/inquiries/{id}','Admin\AdminController@inquiryshow');
    Route::get('newsletter/inquiries','Admin\AdminController@newsletterInquiries');
    
    Route::any('contact/submissions/delete/{id}','Admin\AdminController@contactSubmissionsDelete');
    Route::any('users/delete/{id}','Admin\AdminController@contactSubmissionsDelete');
    Route::any('newsletter/inquiries/delete/{id}','Admin\AdminController@newsletterInquiriesDelete'); 
    
    /* Config Setting Form Submit Route */
    Route::post('config/setting','Admin\AdminController@configSettingUpdate')->name('config_settings_update');




//==============================================================//

//==================== Error pages Routes ====================//
    Route::get('403',function (){
        return view('pages.403');
    });

    Route::get('404',function (){
        return view('pages.404');
    });

    Route::get('405',function (){
        return view('pages.405');
    });

    Route::get('500',function (){
        return view('pages.500');
    });
//============================================================//

    #Permission management
    Route::get('permission-management','PermissionController@getIndex');
    Route::get('permission/create','PermissionController@create');
    Route::post('permission/create','PermissionController@save');
    Route::get('permission/delete/{id}','PermissionController@delete');
    Route::get('permission/edit/{id}','PermissionController@edit');
    Route::post('permission/edit/{id}','PermissionController@update');

    #Role management
    Route::get('role-management','RoleController@getIndex');
    Route::get('role/create','RoleController@create');
    Route::post('role/create','RoleController@save');
    Route::get('role/delete/{id}','RoleController@delete');
    Route::get('role/edit/{id}','RoleController@edit');
    Route::post('role/edit/{id}','RoleController@update');

    #CRUD Generator
    Route::get('/crud-generator', ['uses' => 'ProcessController@getGenerator']);
    Route::post('/crud-generator', ['uses' => 'ProcessController@postGenerator']);

    # Activity log
    Route::get('activity-log','LogViewerController@getActivityLog');
    Route::get('activity-log/data', 'LogViewerController@activityLogData')->name('activity-log.data');

    #User Management routes
    Route::get('users','Admin\\UsersController@Index');
    Route::get('users/create','Admin\\UsersController@create');
    Route::post('users/create','Admin\\UsersController@save');
    Route::get('users/edit/{id}','Admin\\UsersController@edit');
    Route::post('users/edit/{id}','Admin\\UsersController@update');
    Route::get('users/delete/{id}','Admin\\UsersController@destroy');
    Route::get('users/deleted/','Admin\\UsersController@getDeletedUsers');
    Route::get('users/restore/{id}','Admin\\UsersController@restoreUser');
    

    Route::resource('product', 'Admin\\ProductController');
    Route::get('product/{id}/delete', ['as' => 'product.delete', 'uses' => 'Admin\\ProductController@destroy']);
    Route::get('order/list', ['as' => 'order.list', 'uses' => 'Admin\\ProductController@orderList']);
    Route::get('order/detail/{id}', ['as' => 'order.list.detail', 'uses' => 'Admin\\ProductController@orderListDetail']);
	//approval
    Route::get('status/completed/{id}/{con}','Admin\\UsersController@updatestatuscompleted')->name('status.completed');
	////approval end////
    Route::get('block/user/{id}','Admin\\PatientController@BlockUser')->name('blockUser');
    Route::get('Unblock/user/{id}','Admin\\PatientController@UnblockUser')->name('UnblockUser');
    Route::get('patient/user/{id}','Admin\\PatientController@MakeAppointment')->name('makeAppointment');
    Route::POST('AppointmentBooking','Admin\\PatientController@AppointmentBooking')->name('AppointmentBooking');
    Route::POST('SubmitAppointmentcard','Admin\\PatientController@SubmitAppointmentcard')->name('SubmitAppointmentcard');
    Route::POST('searchDoctor','Admin\\PatientController@searchDoctor')->name('searchDoctor');
    Route::get('patient/{id}/edit','Admin\\PatientController@editPatient')->name('editPatient');
    Route::POST('admin/patient','Admin\\PatientController@updatePatient')->name('updatePatient');
	Route::get('add_patient','Admin\\PatientController@AddPatient')->name('add_patient');
    Route::Post('registerPatient','Admin\\PatientController@RegisterPatient')->name('registerPatient');	

     //Order Status Change Routes//
    //Route::get('status/completed/{id}','Admin\\ProductController@updatestatuscompleted')->name('status.completed');
   // Route::get('status/pending/{id}','Admin\\ProductController@updatestatusPending')->name('status.pending');


});

//==============================================================//

//Log Viewer
Route::get('log-viewers', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index')->name('log-viewers');
Route::get('log-viewers/logs', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs')->name('log-viewers.logs');
Route::delete('log-viewers/logs/delete', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete')->name('log-viewers.logs.delete');
Route::get('log-viewers/logs/{date}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show')->name('log-viewers.logs.show');
Route::get('log-viewers/logs/{date}/download', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download')->name('log-viewers.logs.download');
Route::get('log-viewers/logs/{date}/{level}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel')->name('log-viewers.logs.filter');
Route::get('log-viewers/logs/{date}/{level}/search', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@search')->name('log-viewers.logs.search');
Route::get('log-viewers/logcheck', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@logCheck')->name('log-viewers.logcheck');


Route::get('auth/{provider}/','Auth\SocialLoginController@redirectToProvider');
Route::get('{provider}/callback','Auth\SocialLoginController@handleProviderCallback');
Route::get('logout','Auth\LoginController@logout');

Route::POST('physician-login','Auth\LoginController@PhysicianLoginAction');
Auth::routes();


//===================== Account Area Routes =====================//


Route::get('signin','GuestController@signin')->name('signin');
Route::get('signup','GuestController@signup')->name('signup');
Route::get('account','LoggedInController@account')->name('account');
Route::get('orders','LoggedInController@orders')->name('orders');
Route::Post('submitPatientProfile','LoggedInController@submitPatientProfile')->name('submitPatientProfile');
Route::get('account-detail','LoggedInController@accountDetail')->name('accountDetail');
Route::POST('/physician-dashboard/submit-Profile','LoggedInController@submitProfile')->name('submitProfile');
Route::POST('/patient-dashboard/consultation-Request','LoggedInController@ConsultationRequest')->name('ConsultationRequest');
Route::Any('/patient-dashboard/selectDoctor','LoggedInController@selectDoctor')->name('selectDoctor');
Route::get('physician-dashboard/requested/{id}/{con}','LoggedInController@RequestStatus')->name('request.Status');
Route::POST('/patient-dashboard/parent-directory','LoggedInController@PatientDirectory')->name('PatientDirectory');
Route::POST('/patient-dashboard/changepassword','LoggedInController@PasswordChange')->name('passwordchange');
Route::post('/physician-dashboard/end_consultation','PhysicianController@end_consultation')->name('end_consultation');

Route::post('update/account','LoggedInController@updateAccount')->name('update.account');
Route::get('signout', function() {
    if(auth()->user()->customer_status == '4'){
           Auth::logout();
        
        Session::flash('message', 'You have logged out successfully'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/patient-dashboard/patientLogin');
    }
	
	 if (!Auth::user())
          {
        Session::flash('flash_message', 'Please Login to your account'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/patient-dashboard/patientLogin');
       }

    if(auth()->user()->customer_status == '3'){
            if(auth()->user()->Is_online == '1'){
             $insertArr['Is_online'] = 0;
              DB::table('profiles')
             ->where('user_id', auth()->user()->id)
                 ->update($insertArr);
             }
        Auth::logout();
        
        Session::flash('message', 'You have logged out  Successfully'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/physician-dashboard/PhysicianLogin');
    }

     

});

Route::get('logout','Auth\LoginController@logout');
Auth::routes();

Route::get('account/friends','LoggedInController@friends')->name('friends');
Route::get('account/upload','LoggedInController@upload')->name('upload');
Route::get('account/password','LoggedInController@password')->name('password');

/*Route::get('/success','OrderController@success')->name('success');*/

Route::post('update/profile','LoggedInController@update_profile')->name('update_profile');
Route::post('update/uploadPicture','LoggedInController@uploadPicture')->name('uploadPicture');


//===================== Front Routes =====================//


Route::get('/','HomeController@index')->name('home');
Route::get('/home','HomeController@index')->name('home');
Route::get('test_mail','HomeController@TestMail')->name('TestMail');
Route::get('test_ECC','HomeController@TesteCC')->name('TestECC');
Route::get('gtpayMerchant','HomeController@GtpayMerchant')->name('gtpayMerchant');
Route::any('notification','HomeController@Notification')->name('notification');
Route::post('billing','HomeController@billing')->name('billing');
Route::post('mailSend','HomeController@MailSend')->name('MailSend');
Route::get('Unpaid','HomeController@Unpaid')->name('Unpaid');
Route::post('contact-us-submit','HomeController@contactUsSubmit')->name('contactUsSubmit');
Route::post('newsletter-submit','HomeController@newsletterSubmit')->name('newsletterSubmit');

Route::post('ajax-call_ecc_popup','HomeController@ajax_call_ecc_popup')->name('ajax_call_ecc_popup');
Route::post('patient_call_ecc_popup','HomeController@patient_call_ecc_popup')->name('patient_call_ecc_popup');
Route::post('patient_medical_history_delete','HomeController@patient_medical_history_delete')->name('patient_medical_history_delete');
///surgical delete
Route::post('patient_surgical_history_delete','HomeController@patient_surgical_history_delete')->name('patient_surgical_history_delete');
////family history  delete
Route::post('patient_family_history_delete','HomeController@patient_family_history_delete')->name('patient_family_history_delete');

Route::post('patient_allergies_delete','HomeController@patient_allergies_delete')->name('patient_allergies_delete');

Route::post('patient_current_medication_delete','HomeController@patient_current_medication_delete')->name('patient_current_medication_delete');
  //PDF///

 Route::get('pdfview/',array('as'=>'pdfview','uses'=>'PatientController@pdfview'));
 Route::get('orderpdfview/',array('as'=>'orderpdfview','uses'=>'PatientController@orderpdfview'));
        //END PDF////

 Route::get('ECC_card/{id}','HomeController@ECC_card')->name('ECC_card');

 Route::get('success','HomeController@Success')->name('success');
 Route::get('fail','HomeController@Fail')->name('fail');
 
 
 Route::get('/patient-dashboard/betamailcheck','HomeController@Betamailcheck')->name('Betamailcheck');
//=================================================================//

//===========================Patient Dashboard=====================//
Route::get('/patient-dashboard/','PatientController@index')->name('patienthome');
Route::get('/patient-dashboard/register','PatientController@Register')->name('patientRegister');
Route::get('/patient-dashboard/patientLogin','PatientController@login')->name('patientLogin');
Route::get('/patient-dashboard/steps/{id}','PatientController@steps')->name('steps');
Route::get('/patient-dashboard/sheduled-consultation','PatientController@SheduledConsultation')->name('SheduledConsultation');
Route::get('/patient-dashboard/consultation','PatientController@RequestConsultation')->name('RequestConsultation');
Route::get('/patient-dashboard/parent-directory','PatientController@ParentDirectory')->name('ParentDirectory');
Route::get('/patient-dashboard/change_password','PatientController@changepassword')->name('changepassWord');
Route::get('/patient-dashboard/myprescription','PatientController@MyPrescription')->name('MyPrescription');
        //END PDF////
Route::get('/patient-dashboard/my-order','PatientController@MyOrder')->name('MyOrder');
Route::get('/patient-dashboard/my-test','PatientController@MyTest')->name('MyTest');
Route::get('/patient-dashboard/billing-information','PatientController@BillingInformation')->name('billing');
Route::get('/patient-dashboard/past_consultation','PatientController@PastConsultation')->name('pastconsultation');
Route::get('/patient-dashboard/complaint','PatientController@Complaint')->name('complaint');

Route::post('/patient-dashboard/Submitcard','PatientController@Submitcard')->name('Submitcard');
Route::post('/patient-dashboard/patientprescription','PatientController@patientprescription')->name('patientprescription');
Route::post('/patient-dashboard/testResult','PatientController@TestResult')->name('testResult');
Route::get('/patient-dashboard/patient_medical_history','PatientController@patient_medical_history')->name('patient_medical_history');
Route::post('/patient-dashboard/patient_medical_history_edit','PatientController@patient_medical_history_edit')->name('patient_medical_history_edit');
Route::get('/patient-dashboard/profile-consultation','PatientController@Consultation')->name('patient_profile_consultation');

//===============================================================//

//============================Physician Dashboard=====================//
Route::get('/physician-dashboard/','PhysicianController@index')->name('PhysicianHome');
Route::get('/physician-dashboard/PhysicianLogin','PhysicianController@PhysicianLogin')->name('PhysicianLogin');
Route::get('/physician-dashboard/PhysicianSignup','PhysicianController@PhysicianSignup')->name('PhysicianSignup');
Route::get('/physician-dashboard/Physician','PhysicianController@Physician')->name('Physician');
Route::get('/physician-dashboard/account','PhysicianController@Account')->name('account');

Route::get('/physician-dashboard/profile-consultation','PhysicianController@Consultation')->name('profileconsultation');
Route::get('/physician-dashboard/profile-medical-history','PhysicianController@MedicalHistory')->name('profileMedicalHistory');
Route::get('/physician-dashboard/profile','PhysicianController@Profile')->name('profile');
Route::get('/physician-dashboard/requested','PhysicianController@Requested')->name('requested');
Route::get('/physician-dashboard/scheduled','PhysicianController@Scheduled')->name('scheduled');
Route::get('/physician-dashboard/pendingConsultations','PhysicianController@pendingConsultations')->name('pendingConsultations');
Route::get('/physician-dashboard/changepassword','PhysicianController@changepassword')->name('changepass');
Route::post('/physician-dashboard/Prescription','PhysicianController@Prescription')->name('Prescription');
Route::post('/physician-dashboard/order','PhysicianController@Order')->name('Order');
Route::post('/physician-dashboard/notes','PhysicianController@Note')->name('Note');
Route::post('/physician-dashboard/notesedit','PhysicianController@edit')->name('notesedit');
Route::post('/physician-dashboard/subjectives_save','PhysicianController@subjectives_save')->name('subjectives_save');
Route::get('/physician-dashboard/delete_prescription/{prescription_id}','PhysicianController@delete_prescription')->name('delete_prescription');
Route::get('/physician-dashboard/delete_testresult/{testresult_id}','PhysicianController@delete_testresult')->name('delete_testresult');

// zoom
Route::post('/physician-dashboard/zoomSubmit','PhysicianController@zoomSubmit')->name('zoomSubmit');

Route::get('image/{id}/delete', ['as' => 'image.delete', 'uses' => 'LoggedInController@destroyImage']);
//===================================================================//

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

/*
Route::get('/test', function() {
    App::setlocale('arab');
    dd(App::getlocale());
    if(App::setlocale('arab')) {
        
    }
});
*/
/* Form Validation */


//===================== Shop Routes Below ========================//

Route::get('shop','ProductController@shop')->name('shop');
Route::get('shop-detail/{id}','ProductController@shopDetail')->name('shopDetail');
Route::get('category-detail/{id}','ProductController@categoryDetail')->name('categoryDetail');

Route::post('/cartAdd', 'ProductController@saveCart')->name('save_cart');
Route::any('/remove-cart/{id}', 'ProductController@removeCart')->name('remove_cart'); 
Route::post('/updateCart', 'ProductController@updateCart')->name('update_cart');
Route::get('/cart', 'ProductController@cart')->name('cart');
Route::get('/payment', 'OrderController@payment')->name('payment');
Route::get('invoice/{id}','LoggedInController@invoice')->name('invoice');
Route::get('/payment', 'OrderController@payment')->name('payment');
Route::get('/checkout', 'OrderController@checkout')->name('checkout');
Route::post('/place-order', 'OrderController@placeOrder')->name('order.place');
Route::post('/new-order', 'OrderController@newOrder')->name('new.place');
Route::post('shipping', 'ProductController@shipping')->name('shipping');

/*wishlist*/
Route::get('/wishlist', 'WishlistController@index')->name('customer.wishlist.list');
Route::any('/wishlist/add/{id?}', 'WishlistController@addwishlist')->name('wishlist.add');
Route::any('/wishlist/add/{id?}', 'WishlistController@addwishlist')->name('wishlist.add');
/*wishlist end*/

Route::post('/language-form', 'ProductController@language')->name('language');

//==============================================================//

Route::get('user-ip', 'HomeController@getusersysteminfo');

//===================== New Crud-Generators Routes Will Auto Display Below ========================//


Route::resource('admin/blog', 'Admin\\BlogController');
Route::resource('admin/category', 'Admin\\CategoryController');

Route::resource('admin/banner', 'Admin\\BannerController');
Route::get('admin/banner/{id}/delete', ['as' => 'banner.delete', 'uses' => 'Admin\\BannerController@destroy']);
Route::resource('admin/category', 'Admin\\CategoryController');
Route::resource('admin/testimonial', 'Admin\\TestimonialController');
Route::resource('admin/page', 'Admin\\PageController');
Route::resource('admin/request', 'Admin\\RequestController');
Route::resource('admin/note', 'Admin\\NoteController');
Route::resource('admin/doctor', 'Admin\\DoctorController');
Route::resource('admin/speciality', 'Admin\\SpecialityController');
Route::resource('admin/symtom', 'Admin\\SymtomController');

Route::resource('admin/ecc', 'Admin\\EccController');
Route::resource('admin/language', 'Admin\\LanguageController');
Route::resource('admin/patient', 'Admin\\PatientController');
