<?php

namespace App\Controller;

use App\App\View;
use App\Config\Database;
use App\Repository\GaleriRepository;
use App\Service\GaleriService;

class HomeController
{

    public function __construct()
    {
        $connection = Database::getConnection();
        $galeriRepository = new GaleriRepository($connection);

        $this->galeriService = new GaleriService($galeriRepository);
    }

    public function index()
    {
        View::render('Homepage/beranda',[
            'title' => 'Homepage',
            'galeri_list' => $this->galeriService->getAllImage()
        ]);
    }

    public function sejarah()
    {
        View::render('Homepage/sejarah',[
            'title' => 'Sejarah Budaya Pampang',
        ]);
    }

    public function galeri()
    {
        View::render('Homepage/galeri',[
            'title' => 'Galeri Budaya Pampang',
            'galeri_list' => $this->galeriService->getAllImage()
        ]);
    }

    public function lokasi()
    {
        View::render('Homepage/lokasi',[
            'title' => 'Lokasi Budaya Pampang',
        ]);
    }

    public function acara()
    {
        View::render('Homepage/acara',[
            'title' => 'Acara Budaya Pampang',
        ]);
    }

    public function acara1()
    {
        View::render('Homepage/Acara/kerajinanTangan',[
            'title' => 'Acara - Kerajinan Tangan',
        ]);
    }

    public function acara2()
    {
        View::render('Homepage/Acara/musikTradisional',[
            'title' => 'Acara - Musik Tradisional',
        ]);
    }

    public function acara3()
    {
        View::render('Homepage/Acara/tariTradisional',[
            'title' => 'Acara - Tari Khas Pampang',
        ]);
    }
}