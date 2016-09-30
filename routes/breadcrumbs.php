<?php

// Beranda
Breadcrumbs::register('beranda', function($breadcrumbs)
{
    $breadcrumbs->push('Beranda', route('beranda.index'));
});

// Beranda > Berita
Breadcrumbs::register('berita', function($breadcrumbs)
{
    $breadcrumbs->parent('beranda');
    $breadcrumbs->push('Berita', route('berita.index'));
});

// Beranda > Galeri
Breadcrumbs::register('galeri', function($breadcrumbs)
{
    $breadcrumbs->parent('beranda');
    $breadcrumbs->push('Galeri', route('galeri.index'));
});

// Beranda > Program
Breadcrumbs::register('program', function($breadcrumbs)
{
    $breadcrumbs->parent('beranda');
    $breadcrumbs->push('Program', route('program.index'));
});

// Beranda > Pedoman
Breadcrumbs::register('pedoman', function($breadcrumbs)
{
    $breadcrumbs->parent('beranda');
    $breadcrumbs->push('Pedoman', route('pedoman.index'));
});

// Beranda > Media Promosi
Breadcrumbs::register('media-promosi', function($breadcrumbs)
{
    $breadcrumbs->parent('beranda');
    $breadcrumbs->push('Media Promosi', route('media-promosi.index'));
});

// Beranda > Forum Fasilitator
Breadcrumbs::register('forum-fasilitator', function($breadcrumbs)
{
    $breadcrumbs->parent('beranda');
    $breadcrumbs->push('Forum Fasilitator', route('thread.index'));
});

// Beranda > Forum Fasilitator > Profile
Breadcrumbs::register('profile', function($breadcrumbs)
{
    $breadcrumbs->parent('forum-fasilitator');
    $breadcrumbs->push('Profile', route('thread.profile'));
});

// Beranda > Forum Fasilitator > Buat Thread
Breadcrumbs::register('buat-thread', function($breadcrumbs)
{
    $breadcrumbs->parent('forum-fasilitator');
    $breadcrumbs->push('Buat Thread', route('thread.create'));
});

// Beranda > Forum Fasilitator > [Thread]
Breadcrumbs::register('thread', function($breadcrumbs, $thread) {
    $breadcrumbs->parent('forum-fasilitator');
    $breadcrumbs->push($thread->judulThread, App\Helpers\AppHelpers::urlThreadForum($thread->id, $thread->judulThread));
});

// Beranda > Forum Fasilitator > [Thread] > Tanggapi Thread
Breadcrumbs::register('tanggapi-thread', function($breadcrumbs, $thread) {
    $breadcrumbs->parent('thread', $thread);
    $breadcrumbs->push('Tanggapi Thread', route('thread.reply', base64_encode(config('app.salt').$thread->id)));
});

// Beranda > Pasar Aman
Breadcrumbs::register('pasar-aman', function($breadcrumbs)
{
    $breadcrumbs->parent('beranda');
    $breadcrumbs->push('Pasar Aman', route('pasar-aman.index'));
});