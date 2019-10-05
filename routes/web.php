<?php
Auth::routes(['register' => false]);
Route::redirect('/', 'partner');
Route::resource('partner', 'PartnerController');
Route::resource('newsletter', 'NewsletterController')->only([
    'create', 'store'
]);

Route::view('mail', 'newsletter.simple');