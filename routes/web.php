<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Setting\AuthenticationController as auth;
use App\Http\Controllers\Backend\Setting\UserController as user;
use App\Http\Controllers\Backend\Setting\DashboardController as dashboard;
use App\Http\Controllers\Backend\Setting\RoleController as role;
use App\Http\Controllers\Backend\Setting\PermissionController as permission;
use App\Http\Controllers\Backend\Students\StudentController as student;
use App\Http\Controllers\Backend\Instructors\InstructorController as instructor;
use App\Http\Controllers\Backend\Courses\CourseCategoryController as courseCategory;
use App\Http\Controllers\Backend\Courses\CourseController as course;
use App\Http\Controllers\Backend\Courses\MaterialController as material;
use App\Http\Controllers\Backend\Quizzes\QuizController as quiz;
use App\Http\Controllers\Backend\Quizzes\QuestionController as question;
use App\Http\Controllers\Backend\Quizzes\OptionController as option;
use App\Http\Controllers\Backend\Quizzes\AnswerController as answer;
use App\Http\Controllers\Backend\Reviews\ReviewController as review;
use App\Http\Controllers\Backend\Communication\DiscussionController as discussion;
use App\Http\Controllers\Backend\Communication\MessageController as message;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchCourseController;
use App\Http\Controllers\CheckoutController as checkout;
use App\Http\Controllers\CouponController as coupon;
use App\Http\Controllers\WatchCourseController as watchCourse;
use App\Http\Controllers\LessonController as lesson;
use App\Http\Controllers\EnrollmentController as enrollment;
use App\Http\Controllers\EventController as event;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Backend\Authentication\AdminForgotPasswordController;
use App\Http\Controllers\InstructorApplicationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Backend\Courses\CourseController as BackendCourseController;

/* students */
use App\Http\Controllers\Students\AuthController as sauth;
use App\Http\Controllers\Students\DashboardController as studashboard;
use App\Http\Controllers\Students\ProfileController as stu_profile;
use App\Http\Controllers\Students\sslController as sslcz;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admlogin', [auth::class, 'signInForm'])->name('login');
Route::post('/admlogin', [auth::class, 'signInCheck'])->name('login.check');
Route::get('/logout', [auth::class, 'signOut'])->name('logOut');

Route::prefix('admin')->group(function () {
    Route::get('password/request', [AdminForgotPasswordController::class, 'showRequestForm'])
        ->name('admin.password.request');

    Route::post('password/email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])
        ->name('admin.password.email');
});

Route::middleware(['checkauth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [dashboard::class, 'index'])->name('dashboard');
    Route::get('userProfile', [auth::class, 'show'])->name('userProfile');
});

Route::middleware(['checkrole'])->prefix('admin')->group(function () {
    Route::resource('user', user::class); 
    Route::resource('role', role::class);
    Route::resource('student', student::class);
    Route::resource('instructor', instructor::class);
    Route::resource('courseCategory', courseCategory::class);
    Route::resource('course', course::class);
    Route::get('/courseList', [course::class, 'indexForAdmin'])->name('courseList');
    Route::patch('/courseList/{update}', [course::class, 'updateforAdmin'])->name('course.updateforAdmin');
    Route::resource('material', material::class);
    Route::resource('lesson', lesson::class);
    Route::resource('event', event::class);
    Route::resource('quiz', quiz::class);
    Route::resource('question', question::class);
    Route::resource('option', option::class);
    Route::resource('answer', answer::class);
    Route::resource('review', review::class); 
    Route::resource('discussion', discussion::class);
    Route::resource('message', message::class);
    Route::resource('coupon', coupon::class);
    Route::resource('enrollment', enrollment::class);
    Route::get('permission/{role}', [permission::class, 'index'])->name('permission.list');
    Route::post('permission/{role}', [permission::class, 'save'])->name('permission.save');
});

// Страница "Забыли пароль?"
Route::get('admin/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])
    ->name('password.request');

// Отправка письма со ссылкой
Route::post('admin/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

// Форма сброса пароля по токену
Route::get('admin/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');

// Сброс пароля
Route::post('admin/reset-password', [ResetPasswordController::class, 'reset'])
    ->name('password.update');


Route::get('password/request', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showRequestForm'])
    ->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

Route::get('admin/password/request', [ForgotPasswordController::class, 'showRequestForm'])
    ->name('password.request');

Route::post('admin/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

Route::get('admin/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('admin/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');

Route::get('admin/password/request', [AdminForgotPasswordController::class, 'showRequestForm'])
    ->name('password.request');

Route::post('admin/password/email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

Route::prefix('admin')->group(function () {
    Route::get('password/request', [AdminForgotPasswordController::class, 'showRequestForm'])
        ->name('admin.password.request');

    Route::post('password/email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])
        ->name('admin.password.email');
});
/* students controllers */
Route::get('/student/register', [sauth::class, 'signUpForm'])->name('studentRegister');
Route::post('/student/register/{back_route}', [sauth::class, 'signUpStore'])->name('studentRegister.store');
Route::get('/student/login', [sauth::class, 'signInForm'])->name('studentLogin');
Route::post('/student/login/{back_route}', [sauth::class, 'signInCheck'])->name('studentLogin.check');
Route::get('/student/logout', [sauth::class, 'signOut'])->name('studentlogOut');

Route::middleware(['checkstudent'])->prefix('students')->group(function () {
    Route::get('/dashboard', [studashboard::class, 'index'])->name('studentdashboard');
    Route::get('/profile', [stu_profile::class, 'index'])->name('student_profile');
    Route::post('/profile/save', [stu_profile::class, 'save_profile'])->name('student_save_profile');
    Route::post('/profile/savePass', [stu_profile::class, 'change_password'])->name('change_password');
    Route::post('/change-image', [stu_profile::class, 'changeImage'])->name('change_image');


Route::get('admin/password/request', [AdminForgotPasswordController::class, 'showRequestForm'])->name('password.request');

    // ssl Routes
    Route::post('/payment/ssl/submit', [sslcz::class, 'store'])->name('payment.ssl.submit');
});

// frontend pages
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('searchCourse', [SearchCourseController::class, 'index'])->name('searchCourse'); 
Route::get('courseDetails/{id}', [course::class, 'frontShow'])->name('courseDetails');
Route::get('watchCourse/{id}', [watchCourse::class, 'watchCourse'])->name('watchCourse');
Route::get('instructorProfile/{id}', [instructor::class, 'frontShow'])->name('instructorProfile');
Route::get('checkout', [checkout::class, 'index'])->name('checkout');
Route::post('checkout', [checkout::class, 'store'])->name('checkout.store');
Route::get('/event-search', [EventController::class, 'search'])->name('event.search');

// Cart
Route::get('/cart_page', [CartController::class, 'index']);
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

// Coupon
Route::post('coupon_check', [CartController::class, 'coupon_check'])->name('coupon_check');

/* ssl payment */
Route::post('/payment/ssl/notify', [sslcz::class, 'notify'])->name('payment.ssl.notify');
Route::post('/payment/ssl/cancel', [sslcz::class, 'cancel'])->name('payment.ssl.cancel');

Route::get('/become-instructor', [InstructorApplicationController::class, 'create'])->name('become.instructor');
Route::post('/become-instructor', [InstructorApplicationController::class, 'store'])->name('become.instructor.store');

Route::get('searchCourse', [SearchCourseController::class, 'index'])->name('searchCourse');

Route::get('/course/{id}', [CourseController::class, 'show'])->name('course.details');

Route::get('/courses/search', [SearchCourseController::class, 'index'])->name('courses.search');

Route::get('/courseDetails/{id}', [CourseController::class, 'frontShow'])->name('course.details');

Route::get('/courseDetails/{id}', [BackendCourseController::class, 'frontShow'])->name('course.details');

Route::middleware(['student.session'])->group(function () {
    Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::post('/payment/submit', [PaymentController::class, 'processPayment'])->name('payment.ssl.submit');
});

Route::get('/course-details/{id}', [BackendCourseController::class, 'frontShow'])
    ->name('courseDetails'); // <- добавляем старое имя, которое ищут шаблоны

Route::prefix('student')->group(function() {
    Route::get('checkout', [\App\Http\Controllers\PaymentController::class, 'checkout'])->name('checkout');
    Route::post('checkout', [\App\Http\Controllers\PaymentController::class, 'processPayment'])->name('payment.ssl.submit');
    Route::get('payment-success', [\App\Http\Controllers\PaymentController::class, 'success'])->name('payment.success');
    Route::get('payment-fail', [\App\Http\Controllers\PaymentController::class, 'fail'])->name('payment.fail');

    // login & register
    Route::get('login', [\App\Http\Controllers\Students\AuthController::class, 'signInForm'])->name('studentLogin');
    Route::post('login', [\App\Http\Controllers\Students\AuthController::class, 'signInCheck']);
    Route::get('register', [\App\Http\Controllers\Students\AuthController::class, 'signUpForm'])->name('studentRegister');
    Route::post('register', [\App\Http\Controllers\Students\AuthController::class, 'signUpStore']);
});


Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::get('/privacy-policy', function () {
    return view('frontend.privacy-policy');
})->name('privacy-policy');

Route::get('/faq', function () {
    return view('frontend.faq');
})->name('faq');

Route::get('/help-support', function () {
    return view('frontend.help-support');
})->name('help-support');

Route::get('/career', function () {
    return view('frontend.career');
})->name('career');

Route::get('/partners', function () {
    return view('frontend.partners');
})->name('partners');

Route::get('/terms', function () {
    return view('frontend.terms');
})->name('terms');

Route::get('/business', function () {
    return view('frontend.business');
})->name('business');

Route::get('/test404', function () {
    abort(404);
});
