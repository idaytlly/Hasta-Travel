// User
Route::get('/login/user', [UserLoginController::class, 'showLoginForm'])->name('login.user');
Route::post('/login/user', [UserLoginController::class, 'login']);
Route::post('/logout/user', [UserLoginController::class, 'logout'])->name('logout.user');

// Staff
Route::get('/login/staff', [StaffLoginController::class, 'showLoginForm'])->name('login.staff');
Route::post('/login/staff', [StaffLoginController::class, 'login']);
Route::post('/logout/staff', [StaffLoginController::class, 'logout'])->name('logout.staff');

// Protected Dashboards
Route::middleware(['auth', 'user.type:user'])->group(function () {
    Route::get('/user/dashboard', fn() => view('user.dashboard'))->name('user.dashboard');
});

Route::middleware(['auth', 'user.type:staff'])->group(function () {
    Route::get('/staff/dashboard', fn() => view('staff.dashboard'))->name('staff.dashboard');
});
