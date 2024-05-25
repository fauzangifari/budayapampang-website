<?php

namespace App\Middleware;

use App\App\View;
use App\Config\Database;
use App\Repository\AdminRepository;
use App\Repository\KaryawanRepository;
use App\Repository\ManajerRepository;
use App\Repository\SessionRepository;
use App\Service\SessionService;

class MustNotLoginMiddleware
{
    private SessionService $sessionService;

    public function __construct()
    {
        $sessionRepository = new SessionRepository(Database::getConnection());
        $adminRepository = new AdminRepository(Database::getConnection());
        $this->sessionService = new SessionService( $sessionRepository, $adminRepository);
    }

    public function admin(): void
    {
        $admin = $this->sessionService->currentSessionAdmin();
        if ($admin != null) {
            View::redirect('/dashboard-admin');
        }
    }

    function before(): void
    {
        if (isset($_GET['role'])) {
            if ($_GET['role'] == 'admin') {
                $this->admin();
            } else {
                View::redirect('/login');
            }
        }
    }
}