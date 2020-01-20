<?php

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


Route::get('/', [
    'as' => 'homepage',
    'uses' => 'HomepageController@displayLandingPage'
]);

Route::get('account-login', [
    'as' => 'account-login',
    'uses' => 'Authentication\AuthController@displayLoginForm'
]);

Route::get('account-register', [
    'as' => 'account-register',
    'uses' => 'Authentication\AuthController@displayRegisterationForm'
]);

Route::post('login', [
    'as' => 'login',
    'uses' => 'Authentication\AuthController@Login'
]);

Route::post('user/ajax/login', [
    'as' => 'user.ajax.login',
    'uses' => 'Authentication\AuthController@ajaxLogin'
]);

Route::post('user/ajax/register', [
    'as' => 'user.ajax.register',
    'uses' => 'Authentication\AuthController@ajaxRegister'
]);

Route::post('user/ajax/remitPayment', [
    'as' => 'user.ajax.remitPayment',
    'uses' => 'Shop\ShopController@remitPayment'
]);

Route::post('user/ajax/createComment', [
    'as' => 'user.ajax.createComment',
    'uses' => 'Shop\ShopController@createComment'
]);

Route::post('user/ajax/remitServicePayment', [
    'as' => 'user.ajax.remitServicePayment',
    'uses' => 'Authentication\UserController@remitServicePayment'
]);

Route::post('registration', [
    'as' => 'registration',
    'uses' => 'Authentication\AuthController@Register'
]);

Route::get('user/verify-user/{token}',[
    'as' => 'user.verify',
    'uses' => 'Authentication\AuthController@verifyUser',
]);

Route::get('user/logout', [
    'as' => 'user.logout',
    'uses' => 'Authentication\AuthController@Logout',
]);

Route::get('forgot-password', [
    'as' => 'forgot-password',
    'uses' => 'Authentication\AuthController@forgotPassword',
]);

Route::post('user/forgot-password', [
    'as' => 'user.forgot-password',
    'uses' => 'Authentication\AuthController@userForgotPassword',
]);

Route::post('user/book-appointment', [
    'as' => 'user.book-appointment',
    'uses' => 'Appointment\AppointmentController@bookAppointment',
]);

Route::get('appointment/checkout/{id}', [
    'as' => 'appointment.checkout',
    'uses' => 'Appointment\AppointmentController@appointmentCheckOut',
])->middleware('CheckAuth');

Route::get('user/change-password/{token}', [
    'as' => 'user.change-password',
    'uses' => 'Authentication\AuthController@changePassword',
]);

Route::get('user/book-appointment', [
    'as' => 'user.book-appointment',
    'uses' => 'Appointment\AppointmentController@appointmentForm',
]);

Route::get('contact-us', [
    'as' => 'contact-us',
    'uses' => 'Actions\ActionController@Contact',
]);

Route::post('contact-form', [
    'as' => 'contact-form',
    'uses' => 'Actions\ActionController@submitContactForm',
]);

Route::get('about-us', [
    'as' => 'about-us',
    'uses' => 'Actions\ActionController@aboutUs',
]);

Route::get('shop', [
    'as' => 'shop',
    'uses' => 'Shop\ShopController@Shop',
]);

Route::get('shop/product-details/{name}', [
    'as' => 'shop.product-details',
    'uses' => 'Shop\ShopController@shopProduct',
]);

Route::get('user/dashboard', [
    'as' => 'user.dashboard',
    'uses' => 'Authentication\UserController@Dashboard',
])->middleware('CheckAuth');

Route::post('product/edit-shipping-address', [
    'as' => 'product.edit-shipping-address',
    'uses' => 'Authentication\UserController@editShippingAddress',
])->middleware('CheckAuth');

Route::get('admin/dashboard', [
    'as' => 'admin.dashboard',
    'uses' => 'Admin\AdminController@Dashboard',
])->middleware('CheckAdmin');

Route::post('user/dashboard/upload-profile-picture', [
    'as' => 'dashboard.upload-picture',
    'uses' => 'Authentication\AuthController@uploadProfilePicture',
])->middleware('CheckAuth');

Route::post('user/update-account-details', [
    'as' => 'user.update-account-details',
    'uses' => 'Authentication\AuthController@updateAccountDetails',
])->middleware('CheckAuth');

Route::post('user/update-password', [
    'as' => 'user.update-password',
    'uses' => 'Authentication\AuthController@updatePassword',
])->middleware('CheckAuth');

Route::get('admin/retrieve-all-users', [
    'as' => 'admin.retrieve-all-users',
    'uses' => 'Admin\AdminController@retrieveAllUser',
])->middleware('CheckAdmin');

Route::get('admin/retrieve-all-orders', [
    'as' => 'admin.retrieve-all-orders',
    'uses' => 'Admin\AdminController@retrieveAllOrder',
])->middleware('CheckAdmin');

Route::get('admin/retrieve-all-appointments', [
    'as' => 'admin.retrieve-all-appointments',
    'uses' => 'Admin\AdminController@retrieveAppointments',
])->middleware('CheckAdmin');

Route::get('admin/user/verify-user/{token}', [
    'as' => 'admin.user.verify-user',
    'uses' => 'Admin\AdminController@verifyUser',
])->middleware('CheckAdmin');

Route::get('admin/appointment/complete/{id}', [
    'as' => 'admin.appointment.complete',
    'uses' => 'Admin\AdminController@completeAppointment',
])->middleware('CheckAdmin');

Route::get('admin/appointment/delete/{id}', [
    'as' => 'admin.appointment.delete',
    'uses' => 'Admin\AdminController@deleteAppointment',
])->middleware('CheckAdmin');

Route::get('admin/orders/complete/{id}', [
    'as' => 'admin.orders.complete',
    'uses' => 'Admin\AdminController@completeOrder',
])->middleware('CheckAdmin');

Route::get('admin/orders/remove/{id}', [
    'as' => 'admin.orders.remove',
    'uses' => 'Admin\AdminController@deleteOrder',
])->middleware('CheckAdmin');

Route::get('admin/user/make-admin/{token}', [
    'as' => 'admin.user.make-admin',
    'uses' => 'Admin\AdminController@makeAdmin',
])->middleware('CheckAdmin');

Route::get('admin/user/remove-admin/{token}', [
    'as' => 'admin.user.remove-admin',
    'uses' => 'Admin\AdminController@removeAdmin',
])->middleware('CheckAdmin');

Route::get('admin/product-category', [
    'as' => 'admin.product-category',
    'uses' => 'Admin\AdminController@productCategory',
])->middleware('CheckAdmin');

Route::post('admin/dashboard/add-product-category', [
    'as' => 'admin.dashboard.add-product-category',
    'uses' => 'Admin\AdminController@addProductCategory',
])->middleware('CheckAdmin');

Route::post('admin/dashboard/add-accommodation', [
    'as' => 'admin.dashboard.add-accommodation',
    'uses' => 'Admin\AdminController@addNewAccommodation',
])->middleware('CheckAdmin');

Route::get('admin/remove-product-category/{id}', [
    'as' => 'admin.remove-product-category',
    'uses' => 'Admin\AdminController@removeProductCategory',
])->middleware('CheckAdmin');

Route::get('admin/remove-accommodation/{id}', [
    'as' => 'admin.remove-accommodation',
    'uses' => 'Admin\AdminController@removeAccommodation',
])->middleware('CheckAdmin');

Route::get('admin/add-product', [
    'as' => 'admin.add-product',
    'uses' => 'Admin\AdminController@addProduct',
])->middleware('CheckAdmin');

Route::get('admin/add-service', [
    'as' => 'admin.add-service',
    'uses' => 'Admin\AdminController@addService',
])->middleware('CheckAdmin');

Route::get('admin/send-mail', [
    'as' => 'admin.send-mail',
    'uses' => 'Admin\AdminController@sendMail',
])->middleware('CheckAdmin');

Route::post('admin/mail/send', [
    'as' => 'admin.mail.send',
    'uses' => 'Admin\AdminController@actionMail',
])->middleware('CheckAdmin');

Route::post('admin/add-product-details', [
    'as' => 'admin.add-product-details',
    'uses' => 'Admin\AdminController@addProductDetails',
])->middleware('CheckAdmin');

Route::post('admin/add-service-details', [
    'as' => 'admin.add-service-details',
    'uses' => 'Admin\AdminController@addServiceDetails',
])->middleware('CheckAdmin');

Route::post('admin/edit-service-details', [
    'as' => 'admin.edit-service-details',
    'uses' => 'Admin\AdminController@editServiceDetails',
])->middleware('CheckAdmin');

Route::post('admin/edit-accommodation-details', [
    'as' => 'admin.edit-accommodation-details',
    'uses' => 'Admin\AdminController@editAccommodationDetails',
])->middleware('CheckAdmin');

Route::post('admin/edit-product-details', [
    'as' => 'admin.edit-product-details',
    'uses' => 'Admin\AdminController@editProductDetails',
])->middleware('CheckAdmin');

Route::post('admin/edit-appointment-details', [
    'as' => 'admin.edit-appointment-details',
    'uses' => 'Admin\AdminController@editappointmentDetails',
])->middleware('CheckAdmin');

Route::post('admin/edit-review-details', [
    'as' => 'admin.edit-review-details',
    'uses' => 'Admin\AdminController@editreviewDetails',
])->middleware('CheckAdmin');

Route::get('admin/remove-service/{id}', [
    'as' => 'admin.remove-service',
    'uses' => 'Admin\AdminController@removeService',
])->middleware('CheckAdmin');

Route::get('admin/delete-mail/{id}', [
    'as' => 'admin.delete-mail',
    'uses' => 'Admin\AdminController@deleteMail',
])->middleware('CheckAdmin');

Route::get('admin/user/remove/{token}', [
    'as' => 'admin.user.remove',
    'uses' => 'Admin\AdminController@removeUser',
])->middleware('CheckAdmin');

Route::get('admin/remove-product/{id}', [
    'as' => 'admin.remove-product',
    'uses' => 'Admin\AdminController@removeProduct',
])->middleware('CheckAdmin');

Route::get('admin/remove-review/{id}', [
    'as' => 'admin.remove-review',
    'uses' => 'Admin\AdminController@removeReview',
])->middleware('CheckAdmin');

Route::get('admin/contact-us', [
    'as' => 'admin.contact-us',
    'uses' => 'Admin\AdminController@renderContactUs',
])->middleware('CheckAdmin');

Route::get('admin/birthday', [
    'as' => 'admin.birthday',
    'uses' => 'Admin\AdminController@getBirthday',
])->middleware('CheckAdmin');

Route::post('admin/dashboard/edit-contact-us', [
    'as' => 'admin.dashboard.edit-contact-us',
    'uses' => 'Admin\AdminController@contactUs',
])->middleware('CheckAdmin');

Route::post('admin/update-birthday-msg', [
    'as' => 'admin.update-birthday-msg',
    'uses' => 'Admin\AdminController@updateBirthdayMsg',
])->middleware('CheckAdmin');

Route::get('admin/about-us', [
    'as' => 'admin.about-us',
    'uses' => 'Admin\AdminController@renderAboutUs',
])->middleware('CheckAdmin');

Route::post('admin/dashboard/edit-about-us', [
    'as' => 'admin.dashboard.edit-about-us',
    'uses' => 'Admin\AdminController@aboutUs',
])->middleware('CheckAdmin');

Route::get('admin/quote', [
    'as' => 'admin.quote',
    'uses' => 'Admin\AdminController@renderQuote',
])->middleware('CheckAdmin');

Route::get('admin/add-hotel', [
    'as' => 'admin.add-hotel',
    'uses' => 'Admin\AdminController@renderHotelForm',
])->middleware('CheckAdmin');

Route::get('admin/send-birthday-mail', [
    'as' => 'admin.send-birthday-mail',
    'uses' => 'Admin\AdminController@sendBirthdayMail',
])->middleware('CheckAdmin');

Route::post('admin/dashboard/edit-quote', [
    'as' => 'admin.dashboard.edit-quote',
    'uses' => 'Admin\AdminController@Quote',
])->middleware('CheckAdmin');

Route::get('admin/add-review', [
    'as' => 'admin.add-review',
    'uses' => 'Admin\AdminController@Review',
])->middleware('CheckAdmin');

Route::post('admin/dashboard/add-review', [
    'as' => 'admin.dashboard.add-review',
    'uses' => 'Admin\AdminController@addReview',
])->middleware('CheckAdmin');

Route::get('service/{service}', [
    'as' => 'service',
    'uses' => 'HomepageController@viewService',
]);

Route::get('product/search', [
    'as' => 'product.search',
    'uses' => 'Shop\ShopController@productSearch',
]);

Route::get('product/search', [
    'as' => 'product.search',
    'uses' => 'Shop\ShopController@productSearch',
]);

Route::get('product/category/{category}', [
    'as' => 'product.category',
    'uses' => 'Shop\ShopController@productCategory',
]);

Route::get('appointment-invoice/download/{id}', [
    'as' => 'appointment-invoice.download',
    'uses' => 'Authentication\UserController@downloadPDF',
])->middleware("CheckAuth");


