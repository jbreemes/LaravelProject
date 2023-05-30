<?php
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterEmployeeController;
use App\Http\Controllers\WorkLoginController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('welcome');
});




/*admin login routes*/
Route::get('/admin/login', 'App\Http\Controllers\AdminLoginController@showLoginForm')->name('admin-login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin-login-submit')->withoutMiddleware([AdminMiddleware::class]);


/*afspraak maken in admin*/
Route::post('/afspraak', 'App\Http\Controllers\AfspraakController@store')->name('afspraak.store');


/*route button from login to admin en admin afspraak*/
Route::get('/admin', [AppointmentController::class, 'index'])->name('admin');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

/*route from login to welcome screen*/
Route::get('/welcome', [CalendarController::class, 'index']);


/*calendar routes*/
Route::get('/', [CalendarController::class, 'index']);
Route::get('/afspraak/{idAfspraak}', [AfspraakController::class, 'show'])->name('afspraak.show');


/*login routes*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
/*login routes for workers*/
Route ::get('work', [WorkLoginController::class, 'showLoginForm'])->name('work');
Route::get('/employee-dashboard', [WorkLoginController::class, 'dashboard'])->name('employee-dashboard');
Route ::post('work',[WorkLoginController::class, 'login']);


/*logout*/
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


/*register routes*/
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


/*employee routes*/
Route::get('/employee',[EmployeeController::class, 'employeeCalendar']);


/*register employee routes*/
Route::get('/register-employee', [RegisterEmployeeController::class, 'showRegistrationForm'])->name('register-employee');
Route::post('/register-employee', [RegisterEmployeeController::class, 'register']);
Route::post('/register-employee', [RegisterEmployeeController::class, 'register'])->name('register-employee');


/*work login routes*/
Route::get('/worklogin', [WorkLoginController::class, 'showLoginForm'])->name('work-login');
Route::post('/worklogin', [WorkLoginController::class, 'login'])->name('work-login-submit');


/*appointment from the login page*/
Route::post('/appointments', 'App\Http\Controllers\AppointmentController@store')->middleware('auth')->name('appointments.store');


/*delete funtion in admin*/
Route::delete('/appointments/delete', [AppointmentController::class, 'delete'])->name('deleteAppointments');


/* account */
Route::get('/account', [UserController::class, 'showAccountForm'])->name('account');
Route::get('/account/form', [UserController::class, 'showAccountForm'])->name('account.form');
Route::post('/account/update', [UserController::class, 'updateAccount'])->name('account.update');
