<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

uses(Tests\TestCase::class);

beforeEach(function () {
    config(['session.driver' => 'array']);
    Session::flush();
});

it('defaults to French without using the browser language', function () {
    config(['app.locale' => 'fr']);
    $request = Request::create('/', 'GET', server: ['HTTP_ACCEPT_LANGUAGE' => 'ar']);

    (new SetLocale())->handle($request, fn () => response('ok'));

    expect(app()->getLocale())->toBe('fr');
    expect(__('ui.home'))->toBe('Accueil');
    expect(view('layouts.index')->render())->toContain('<html lang="fr" dir="ltr">');
});

it('uses a supported locale cookie when no session preference exists', function () {
    $request = Request::create('/', 'GET', cookies: ['locale' => 'ar']);

    (new SetLocale())->handle($request, fn () => response('ok'));

    expect(app()->getLocale())->toBe('ar');
    expect(__('ui.home'))->toBe('الرئيسية');
    expect(view('layouts.index')->render())->toContain('<html lang="ar" dir="rtl">');
});

it('prefers the session locale and falls back to French for unsupported values', function () {
    Session::put('locale', 'ar');
    $request = Request::create('/', 'GET', cookies: ['locale' => 'fr']);
    (new SetLocale())->handle($request, fn () => response('ok'));
    expect(app()->getLocale())->toBe('ar');

    Session::put('locale', 'en');
    $request = Request::create('/', 'GET', cookies: ['locale' => 'en']);
    (new SetLocale())->handle($request, fn () => response('ok'));
    expect(app()->getLocale())->toBe('fr');
});
