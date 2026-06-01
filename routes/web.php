<?php

use Illuminate\Support\Facades\Route;


Route::domain('admin.kielceuniversity.pl')->group(function () {
    require base_path('routes/admin.php');
});


Route::domain('teacher.kielceuniversity.pl')->group(function () {
    require base_path('routes/teacher.php');
});


Route::domain('student.kielceuniversity.pl')->group(function () {
    require base_path('routes/student.php');
});


Route::domain('verify.kielceuniversity.pl')->group(function () {
    require base_path(path: 'routes/verify.php');
});