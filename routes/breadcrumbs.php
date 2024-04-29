<?php

use App\Models\Artikel;
use App\Models\Activity;
use App\Models\Category;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
     $trail->push('Home', route('home'));
});

Breadcrumbs::for('home.kepalasekolah', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Kepala Sekolah', route('home.kepalasekolah'));
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

Breadcrumbs::for('home.guru', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Guru', route('home.guru'));
});

Breadcrumbs::for('home.tatatertib', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Tata Tertib', route('home.tatatertib'));
});

Breadcrumbs::for('home.fasilitas', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Fasilitas', route('home.fasilitas'));
});

Breadcrumbs::for('home.gallery', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Gallery', route('home.gallery'));
});

Breadcrumbs::for('artikel.single', function (BreadcrumbTrail $trail, $artikel) {
    $trail->parent('home');
    $artikel = Artikel::findOrFail($artikel);
    $trail->push($artikel->title, route('artikel.single', $artikel));
});

Breadcrumbs::for('activity.single', function (BreadcrumbTrail $trail, $activity) {
    $trail->parent('home');
    $activity = Activity::findOrFail($activity);
    $trail->push($activity->title, route('activity.single', $activity));
});

Breadcrumbs::for('get.category.id', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('home');
    $category = Category::findOrFail($id);
    $trail->push($category->nama, route('get.category.id', $category));
});