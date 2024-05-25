<?php

namespace App\Controller;

use App\App\View;
use App\Config\Database;
use App\Exception\ValidationException;
use App\Model\Login\UserLoginRequest;
use App\Repository\AdminRepository;
use App\Repository\SessionRepository;
use App\Service\AdminService;
use App\Service\SessionService;

class UserController
{
    private AdminService $adminService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $adminRepository = new AdminRepository($connection);
        $this->adminService = new AdminService($adminRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository,$adminRepository);
    }

    public function login()
    {
        View::render('Login/login',[
            'title' => 'Login'
        ]);
    }

    public function postLogin()
    {
        try {
            $request = new UserLoginRequest();
            $request->username = $_POST['username'];
            $request->password = $_POST['password'];
            $response = $this->adminService->login($request);
            $this->sessionService->createSession($response->admin->username);
            View::redirect('/dashboard-admin');
        } catch (ValidationException $e) {
            View::render('Login/login', [
                'title' => 'Login',
                'error' => $e->getMessage()
            ]);
        }
    }


    public function logout()
    {
        $this->sessionService->destroySession();
        View::redirect('/login');
    }

}