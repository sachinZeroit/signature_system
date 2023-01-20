    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\admin\AdminController;
    use App\Http\Controllers\admin\ManageController;
    use App\Http\Controllers\admin\UsersController;
    use App\Http\Controllers\admin\TermController;
    use App\Http\Controllers\admin\SignageController;
    use App\Http\Controllers\admin\PlaylistController;
    use App\Http\Controllers\admin\MailController;
    use App\Http\Controllers\UserController;
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




    Route::group(['prefix' => 'admin'],function(){

    Route::get('/login',[UserController::class,'login']);
    Route::post('/login',[UserController::class,'post_login'])->name('login');

    Route::get('/logout',[UserController::class,'logout'])->name('admin.logout');


    Route::middleware('auth')->group(function(){

    Route::get('/admin', function () {
    return view('admin.dashboard');
    });
    Route::get('/',[AdminController::class,'index'])->name('admin.home');
    Route::get('user/add',[AdminController::class,'add']);
    Route::post('user/store',[AdminController::class,'store'])->name('admin.user.store');
    Route::get('profile',[AdminController::class, 'profile'])->name('admin.profile');
    Route::post('profile_update/{id}',[AdminController::class,'update_profile'])->name('admin.update_profile');
    Route::get('user/{id}/active',[AdminController::class,'active'])->name('admin.user.active');
    Route::get('user/{id}/deactive',[AdminController::class,'deactive'])->name('admin.user.deactive');
    

    // Users Route
    Route::get('/user/list',[UsersController::class,'user_list'])->name('admin.user.list');
    Route::get('/user/{id}/delete',[UsersController::class,'user_delete'])->name('admin.user.delete');
    Route::get('/user/{id}/edit',[UsersController::class,'user_edit'])->name('admin.user.edit');
    Route::post('/user/{id}/update',[UsersController::class,'user_update'])->name('admin.user.update');


    Route::get('/signage',[SignageController::class,'index']);
    // Route::get('/signage/add',[SignageController::class,'add']);
    Route::post('signage/store',[SignageController::class,'store'])->name('admin.signage.store');
    Route::get('signage/{id}/active',[SignageController::class,'active'])->name('admin.signage.active');
    Route::get('signage/{id}/deactive',[SignageController::class,'deactive'])->name('admin.signage.deactive');
    Route::get('signage/{id}/live',[SignageController::class,'live'])->name('admin.signage.live');
    Route::get('signage/{id}/offline',[SignageController::class,'offline'])->name('admin.signage.offline');
    Route::get('signage/{id}',[SignageController::class,'edit']);
    Route::post('/signage',[SignageController::class,'update']);
    Route::get('/signage/{id}/delete',[SignageController::class,'delete'])->name('admin.signage.delete');
    Route::get('/signage/{id}/edit_schedule', [SignageController::class, 'edit_schedule'])->name('admin.signage.edit_schedule');
    Route::post('/signage/edit_update/{id}', [SignageController::class, 'edit_update'])->name('admin.signage.edit_update');
    Route::get('/signage/{id}/preview/',[SignageController::class,'signage_media'])->name('admin.signage.signage_preview');    
    Route::get('/signage/{id}/deleted',[SignageController::class,'media_delete'])->name('admin.signage.deleted');
    
    
    Route::get('playlist/add',[PlaylistController::class,'add']);
    Route::post('playlist/store',[PlaylistController::class,'store'])->name('admin.playlist.store');
    Route::get('playlist/',[PlaylistController::class,'index']);
    Route::get('playlist/{id}/active',[PlaylistController::class,'active'])->name('admin.playlist.active');
    Route::get('playlist/{id}/deactive',[PlaylistController::class,'deactive'])->name('admin.playlist.deactive');
    Route::get('/playlist/{id}/edit/',[PlaylistController::class,'edit'])->name('admin.playlist.edit');
    Route::post('/playlist/{id}/update',[PlaylistController::class,'update'])->name('admin.playlist.update');
    Route::get('/playlist/{id}/delete',[PlaylistController::class,'delete'])->name('admin.playlist.delete');
    Route::get('/media/{id}/delete',[PlaylistController::class,'media_delete'])->name('admin.media.delete');
    Route::get('/media/{id}/preview/',[PlaylistController::class,'media'])->name('admin.media.preview');    

    Route::get('/term',[TermController::class,'index']);
    Route::get('/term/add',[TermController::class,'add']);
    Route::post('/term/store',[TermController::class,'store'])->name('admin.term.store');
    Route::get('/term/{id}/edit/',[TermController::class,'edit'])->name('admin.term.edit');
    Route::post('/term/{id}/update',[TermController::class,'update'])->name('admin.term.update');
    Route::get('/term/{id}/delete',[TermController::class,'delete'])->name('admin.term.delete');

    Route::get('/mail',[MailController::class,'index']);
    Route::post('/mail',[MailController::class,'send_mail'])->name('admin.mail.mail');
});

    });


