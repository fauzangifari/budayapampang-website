<?php

namespace App\Controller;

use App\App\View;
use App\Config\Database;
use App\Exception\ValidationException;
use App\Model\Galeri\GaleriRequest;
use App\Repository\AdminRepository;
use App\Repository\GaleriRepository;
use App\Repository\SessionRepository;
use App\Service\GaleriService;
use App\Service\SessionService;

class DashboardController
{
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $sessionRepository = new SessionRepository($connection);
        $adminRepository = new AdminRepository($connection);
        $galeriRepository = new GaleriRepository($connection);

        $this->galeriService = new GaleriService($galeriRepository);
        $this->sessionService = new SessionService($sessionRepository, $adminRepository);
    }

    public function dashboardAdmin()
    {
        $admin = $this->sessionService->currentSessionAdmin();
        if ($admin == null) {
            View::redirect('/login');
        } else {
            $this->crud_galeri();
            View::render('Dashboard/dashboardAdmin', [
                'title' => 'Dashboard Admin',
                'admin' => [
                    "name" => $admin->nama_admin,
                    "galeri_list" => $this->galeriService->getAllImage()
                ]
            ]);
        }
    }

    public function crud_galeri()
    {
        $admin = $this->sessionService->currentSessionAdmin();
        if ($admin == null) {
            View::redirect('/login');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
            $action = $_POST['action'];

            try {
                switch ($action) {
                    case 'delete':
                        $this->handleDelete();
                        break;
                    case 'create':
                        $this->handleCreate();
                        break;
                    case 'update':
                        $this->handleUpdate();
                        break;
                    default:
                        throw new ValidationException('Action not found');
                }

                View::redirect('/dashboard-admin');
            } catch (ValidationException $e) {
                echo $e->getMessage();
            }
        }
    }

    private function handleDelete()
    {
        if (!isset($_POST['id_galeri'])) {
            throw new ValidationException('ID galeri is required for deletion');
        }

        $id_galeri = $_POST['id_galeri'];

        $galeri = $this->galeriService->getImageById($id_galeri);
        $imagePath = $galeri->image_galeri;
        $uploadsDirectory = 'uploads/galeri/';

        if (str_contains($imagePath, $uploadsDirectory) && file_exists($imagePath)) {
            unlink($imagePath);
        }

        $this->galeriService->deleteImage($id_galeri);
    }

    private function handleCreate()
    {
        if (!isset($_POST['title_galeri'], $_POST['subtitle_galeri']) || !isset($_FILES['image_galeri'])) {
            throw new ValidationException('All fields are required for creating a new galeri');
        }

        // Mengunggah file gambar
        $targetDir = "uploads/galeri/";

        // Pastikan direktori ada, jika tidak buat direktori
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $imageFileName = basename($_FILES["image_galeri"]["name"]);
        $targetFile = $targetDir . $imageFileName;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Cek apakah file adalah gambar
        $check = getimagesize($_FILES["image_galeri"]["tmp_name"]);
        if ($check === false) {
            throw new ValidationException('File is not an image.');
        }

        // Cek apakah file sudah ada
        if (file_exists($targetFile)) {
            throw new ValidationException('File already exists.');
        }

        // Cek ukuran file
        if ($_FILES["image_galeri"]["size"] > 5000000) {
            throw new ValidationException('Sorry, your file is too large.');
        }

        // Hanya izinkan format gambar tertentu
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            throw new ValidationException('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
        }

        if (!move_uploaded_file($_FILES["image_galeri"]["tmp_name"], $targetFile)) {
            throw new ValidationException('Sorry, there was an error uploading your file.');
        }

        // Simpan nama file gambar ke dalam objek GaleriRequest
        $request = new GaleriRequest();
        $request->id_galeri = 'GLR' . random_int(1000, 9999);
        $request->title_galeri = $_POST['title_galeri'];
        $request->subtitle_galeri = $_POST['subtitle_galeri'];
        $request->image_galeri = $imageFileName;

        $this->galeriService->createImage($request);
    }


    private function handleUpdate()
    {
        if (!isset($_POST['id_galeri'], $_POST['title_galeri'], $_POST['subtitle_galeri'], $_POST['image_galeri'])) {
            throw new ValidationException('All fields are required for updating a galeri');
        }

        $request = new GaleriRequest();
        $request->id_galeri = $_POST['id_galeri'];
        $request->title_galeri = $_POST['title_galeri'];
        $request->subtitle_galeri = $_POST['subtitle_galeri'];
        $request->image_galeri = $_POST['image_galeri'];

        $this->galeriService->updateImage($request);
    }

}