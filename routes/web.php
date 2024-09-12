<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return redirect(route('filament.admin.auth.login'));
})->name('login');

Route::get('/accept-member/{id_member}', function ($id_member) {

    $user = Auth::user();

    $member = \App\Models\Member::find($id_member);
    if($member) {
        $memberUserId = $member->user_id;
        $member->update([
            'is_active' => 1,
            'assessor' => $user->name
        ]);

        $memberUser = \App\Models\User::find($memberUserId);
        if($memberUser){
            if($memberUser->role_id == 1) {
                $memberUser->update([
                    'role_id' => 5
                ]);    
            }
        }
    }


    return redirect()->back();

})->name('member.accept');

Route::get('/switch-book-status/{id}/{action}', function ($id, $action) {

    $user = Auth::user();

    $book = \App\Models\Book::find($id);
    if($book){
        $book->status = $action;
        $book->save();
    }

    return redirect()->back();

})->name('book.switch');

Route::get('/run-factory', function () {

    \App\Models\User::factory(5)->create();
    \App\Models\Author::factory(20)->create();
    \App\Models\Book::factory(120)->create();

    return 'done';
})->name('factory.run');