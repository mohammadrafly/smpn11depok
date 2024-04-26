<?php

use App\Models\Artikel;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
     $trail->push('Home', route('home'));
});

Breadcrumbs::for('home.profile', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Profile', route('home.profile'));
});

Breadcrumbs::for('home.pengumuman', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Pengumuman', route('home.pengumuman'));
});

Breadcrumbs::for('home.tentangkami', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Tentang Kami', route('home.tentangkami'));
});

Breadcrumbs::for('home.hubungikami', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Hubungi Kami', route('home.hubungikami'));
});

Breadcrumbs::for('artikel.single', function (BreadcrumbTrail $trail, $artikel) {
    $trail->parent('home');
    $artikel = Artikel::findOrFail($artikel);
    $trail->push($artikel->title, route('artikel.single', $artikel));
});