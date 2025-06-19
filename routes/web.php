<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedosController;
use App\Http\Controllers\RssFeedController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUIController;
use App\Http\Controllers\SejarahDesaController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardRuleController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\DashboardPotensiController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardPelayananController;
use App\Http\Controllers\DashboardRuleCategoryController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/rss', [RssFeedController::class, 'index']);

Route::get('/', [FrontendController::class, 'index']);

Route::get('/profil-desa', [FrontendController::class, 'profilDesa']);

Route::prefix('infografis')->controller(FrontendController::class)->group(function () {
    Route::get('penduduk', 'penduduk');
    Route::get('apbdes', 'apbdes');
    Route::get('bansos', 'bansos');
    Route::get('idm', 'idm');
    Route::get('sdgs', 'sdgs');
});


Route::prefix('potensi-desa')->controller(FrontendController::class)->group(function () {
    Route::get('categories', 'categories');
    Route::get('', 'potensiDesa');
    Route::get('{potensi:slug}', 'showPotensiDesa');
});


Route::prefix('berita')->controller(FrontendController::class)->group(function () {
    Route::get('', 'berita');
    Route::get('{posts:slug}', 'showPost');
});


Route::get('/pelayanan-desa', [FrontendController::class, 'indexPelayanan']);
Route::get('/pelayanan-desa/{slug}', [FrontendController::class, 'showPelayanan']);


Route::get('/peraturan', [FrontendController::class, 'rulesIndex']);
Route::get('/peraturan/{slug}', [FrontendController::class, 'showRule']);





// jika user telah login, maka user tidak bisa mengakses route ini
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

// Route untuk semua Role
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/dashboard/profile', [DashboardController::class, 'edit'])->name('profile.edit');
    Route::post('/dashboard/profile', [DashboardController::class, 'update'])->name('profile.update');


    Route::get('/dashboard/posts', [DashboardPostController::class, 'index']);
    Route::get('/dashboard/posts/create', [DashboardPostController::class, 'create']);
    Route::post('/dashboard/posts', [DashboardPostController::class, 'store']);
    Route::get('/dashboard/posts/{post:slug}/edit', [DashboardPostController::class, 'edit']);
    Route::put('/dashboard/posts/{post:slug}', [DashboardPostController::class, 'update']);
    Route::delete('/dashboard/posts/{post:slug}', [DashboardPostController::class, 'destroy']);
    Route::get('dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);

    Route::prefix('dashboard/potensi')->name('potensi.')->group(function () {
        Route::get('/', [DashboardPotensiController::class, 'index'])->name('index');
        Route::get('create', [DashboardPotensiController::class, 'create'])->name('create');
        Route::post('store', [DashboardPotensiController::class, 'store'])->name('store');
        Route::get('{slug}/edit', [DashboardPotensiController::class, 'edit'])->name('edit');
        Route::put('{slug}', [DashboardPotensiController::class, 'update'])->name('update');
        Route::delete('{slug}', [DashboardPotensiController::class, 'destroy'])->name('destroy');
    });


    Route::resource('/dashboard/potensi/categories', DashboardCategoryController::class)->parameters(['categories' => 'category:slug']);
});


// Route untuk Aparat Desa + admin
Route::middleware(['auth', 'role:Admin,Perangkat Desa'])->group(function () {


    Route::get('/dashboard/ui/pelayanan', [DashboardPelayananController::class, 'index']);
    Route::get('/dashboard/ui/pelayanan/{pelayanan:slug}/edit', [DashboardPelayananController::class, 'edit']);
    Route::put('/dashboard/ui/pelayanan/{pelayanan:slug}', [DashboardPelayananController::class, 'update']);
    Route::delete('/dashboard/ui/pelayanan/{pelayanan:slug}', [DashboardPelayananController::class, 'destroy']);


    Route::get('/dashboard/ui/peraturan', [DashboardRuleCategoryController::class, 'index']);
    Route::get('/dashboard/ui/peraturan/create', [DashboardRuleCategoryController::class, 'create']);
    Route::post('/dashboard/ui/peraturan', [DashboardRuleCategoryController::class, 'store']);
    Route::get('/dashboard/ui/peraturan/{slug}/edit', [DashboardRuleCategoryController::class, 'edit']);
    Route::put('/dashboard/ui/peraturan/{slug}', [DashboardRuleCategoryController::class, 'update']);
    Route::delete('/dashboard/ui/peraturan/{slug}', [DashboardRuleCategoryController::class, 'destroy']);



    Route::get('/dashboard/ui/peraturan/{categorySlug}', [DashboardRuleController::class, 'index']);
    Route::get('/dashboard/ui/peraturan/{categorySlug}/{ruleSlug}/edit', [DashboardRuleController::class, 'edit']);
    Route::put('/dashboard/ui/peraturan/{categorySlug}/{ruleSlug}', [DashboardRuleController::class, 'update']);
    Route::delete('/dashboard/ui/peraturan/{categorySlug}/{ruleSlug}', [DashboardRuleController::class, 'destroy']);



    Route::get('/dashboard/ui/icon', [DashboardUIController::class, 'icon']);
    Route::post('/dashboard/ui/icon', [DashboardUIController::class, 'updateIcon']);


    Route::prefix('dashboard/ui/carausel')->group(function () {
        Route::get('/', [DashboardUIController::class, 'indexCarausel']);
        Route::get('/create', [DashboardUIController::class, 'createCarausel']);
        Route::post('/', [DashboardUIController::class, 'storeCarausel']);
        Route::get('/{carausel}/edit', [DashboardUIController::class, 'editCarausel']);
        Route::put('/{carausel}', [DashboardUIController::class, 'updateCarausel']);
        Route::delete('/{carausel}', [DashboardUIController::class, 'deleteCarausel']);
    });

    Route::get('/dashboard/ui/sambutan', [DashboardUIController::class, 'sambutan'])->name('dashboard.ui.sambutan');
    Route::put('/dashboard/ui/sambutan', [DashboardUIController::class, 'updateSambutan'])->name('dashboard.ui.sambutan.update');


    Route::get('/dashboard/ui/administrasi-penduduk/penduduk', [DashboardUIController::class, 'editAdmPenduduk'])->name('adm.penduduk.edit');
    Route::put('/dashboard/ui/administrasi-penduduk/penduduk', [DashboardUIController::class, 'updateAdmPenduduk'])->name('adm.penduduk.update');

    Route::get('/dashboard/ui/administrasi-penduduk/pendidikan', [DashboardUIController::class, 'pendidikan'])->name('dashboard.ui.pendidikan');
    Route::post('/dashboard/ui/administrasi-penduduk/pendidikan', [DashboardUIController::class, 'updatePendidikan']);



    Route::get('/dashboard/ui/administrasi-penduduk/umur', [DashboardUIController::class, 'editUmur']);
    Route::post('/dashboard/ui/administrasi-penduduk/umur', [DashboardUIController::class, 'updateUmur']);

    Route::get('/dashboard/ui/administrasi-penduduk/pekerjaan', [DashboardUIController::class, 'editPekerjaan']);
    Route::post('/dashboard/ui/administrasi-penduduk/pekerjaan', [DashboardUIController::class, 'updatePekerjaan']);

    Route::get('/dashboard/ui/administrasi-penduduk/agama', [DashboardUIController::class, 'editAgama']);
    Route::post('/dashboard/ui/administrasi-penduduk/agama', [DashboardUIController::class, 'updateAgama']);

    Route::prefix('/dashboard/ui/bansos')->group(function () {
        Route::get('/', [DashboardUIController::class, 'indexBansos']);
                Route::get('/{id}/edit', [DashboardUIController::class, 'editBansos']);
        Route::put('/{id}', [DashboardUIController::class, 'updateBansos']);
        Route::delete('/{id}', [DashboardUIController::class, 'destroyBansos']);
    });

    Route::get('/dashboard/ui/idm', [DashboardUIController::class, 'editIdm'])->name('idm.edit');
    Route::post('/dashboard/ui/idm', [DashboardUIController::class, 'updateIdm'])->name('idm.update');


    Route::get('/dashboard/ui/sdgs', [DashboardUIController::class, 'sdgsIndex'])->name('sdgs.index');
    Route::post('/dashboard/ui/sdgs', [DashboardUIController::class, 'sdgsUpdate'])->name('sdgs.update');


    Route::get('/dashboard/ui/footer/kontak-desa', [DashboardUIController::class, 'kontakDesa']);
    Route::post('/dashboard/ui/footer/kontak-desa', [DashboardUIController::class, 'updateKontakDesa']);

    Route::prefix('dashboard/ui/footer')->name('media-sosial.')->group(function () {
        Route::get('media-sosial', [MedosController::class, 'index'])->name('index');
        Route::get('media-sosial/create', [MedosController::class, 'create'])->name('create');
        Route::post('media-sosial', [MedosController::class, 'store'])->name('store');
        Route::get('media-sosial/{id}/edit', [MedosController::class, 'edit'])->name('edit');
        Route::put('media-sosial/{id}', [MedosController::class, 'update'])->name('update');
        Route::delete('media-sosial/{id}', [MedosController::class, 'destroy'])->name('destroy');
    });


    Route::prefix('dashboard/ui/struktur-organisasi')->group(function () {
        Route::get('/', [DashboardUIController::class, 'indexStruktur'])->name('struktur.index');
        Route::get('/{slug}/edit', [DashboardUIController::class, 'editStruktur'])->name('struktur.edit');
        Route::put('/{slug}', [DashboardUIController::class, 'updateStruktur'])->name('struktur.update');
        Route::delete('/{slug}', [DashboardUIController::class, 'destroyStruktur'])->name('struktur.destroy');
    });



    Route::prefix('dashboard/ui/struktur-organisasi/{slug}')->group(function () {
        Route::get('/', [DashboardUIController::class, 'indexOrganisasi'])->name('organisasi.index');
        Route::get('/{id}/edit', [DashboardUIController::class, 'editOrganisasi'])->name('organisasi.edit');
        Route::put('/{id}', [DashboardUIController::class, 'updateOrganisasi'])->name('organisasi.update');
        Route::delete('/{id}', [DashboardUIController::class, 'destroyOrganisasi'])->name('organisasi.destroy');
    });


    Route::get('/dashboard/ui/visi-misi', [DashboardUIController::class, 'editVisiMisi']);
    Route::post('/dashboard/ui/visi-misi', [DashboardUIController::class, 'updateVisiMisi']);

    Route::resource('/dashboard/ui/sejarah-desa', SejarahDesaController::class)->parameters([
        'sejarah-desa' => 'slug'
    ]);


    Route::get('/dashboard/ui/administrasi-penduduk/apbdes', [DashboardUIController::class, 'editApbdes']);
    Route::post('/dashboard/ui/administrasi-penduduk/apbdes', [DashboardUIController::class, 'updateApbdes']);
});




// Route untuk  Admin
Route::middleware(['auth', 'role:Admin'])->group(function () {

    Route::get('/dashboard/ui/pelayanan/create', [DashboardPelayananController::class, 'create']);
    Route::post('/dashboard/ui/pelayanan', [DashboardPelayananController::class, 'store']);

    Route::get('/dashboard/ui/peraturan/create', [DashboardRuleCategoryController::class, 'create']);
    Route::post('/dashboard/ui/peraturan', [DashboardRuleCategoryController::class, 'store']);

    Route::get('/dashboard/ui/peraturan/{categorySlug}/create', [DashboardRuleController::class, 'create']);
    Route::post('/dashboard/ui/peraturan/{categorySlug}', [DashboardRuleController::class, 'store']);

    Route::prefix('dashboard/ui/struktur-organisasi')->group(function () {
        Route::get('/create', [DashboardUIController::class, 'createStruktur'])->name('struktur.create');
        Route::post('/', [DashboardUIController::class, 'storeStruktur'])->name('struktur.store');
    });

    Route::prefix('dashboard/ui/struktur-organisasi/{slug}')->group(function () {
        Route::get('/create', [DashboardUIController::class, 'createOrganisasi'])->name('organisasi.create');
        Route::post('/', [DashboardUIController::class, 'storeOrganisasi'])->name('organisasi.store');
    });

    Route::prefix('/dashboard/ui/bansos')->group(function () {
        Route::get('/create', [DashboardUIController::class, 'createBansos']);
        Route::post('/', [DashboardUIController::class, 'storeBansos']);
    });

    Route::get('/dashboard/admin/user-management', [UserManagementController::class, 'index']);
    Route::get('/dashboard/admin/user-management/create', [UserManagementController::class, 'create']);
    Route::post('/dashboard/admin/user-management', [UserManagementController::class, 'store']);
    Route::get('/dashboard/admin/user-management/{uid}/edit', [UserManagementController::class, 'edit']);
    Route::put('/dashboard/admin/user-management/{uid}', [UserManagementController::class, 'update']);
    Route::delete('/dashboard/admin/user-management/{uid}', [UserManagementController::class, 'destroy']);
});
