<?php

namespace App\Service;

use App\Domain\Galeri;
use App\Model\Galeri\GaleriRequest;
use App\Repository\GaleriRepository;

class GaleriService
{
    private GaleriRepository $galeriRepository;

    public function __construct(GaleriRepository $galeriRepository)
    {
        $this->galeriRepository = $galeriRepository;
    }

    public function createImage(GaleriRequest $request) : Galeri
    {
        $galeri = new Galeri();
        $galeri->id_galeri = $request->id_galeri;
        $galeri->title_galeri = $request->title_galeri;
        $galeri->subtitle_galeri = $request->subtitle_galeri;
        $galeri->image_galeri = $request->image_galeri;

        $this->galeriRepository->saveImage($galeri);

        return $galeri;
    }


    public function getAllImage(): array
    {
        return $this->galeriRepository->selectAllImage();
    }

    public function getImageById(string $id_galeri): ?Galeri
    {
        return $this->galeriRepository->selectImageById($id_galeri);
    }

    public function deleteImage(string $id_galeri): void
    {
        $this->galeriRepository->deleteImage($id_galeri);
    }
}