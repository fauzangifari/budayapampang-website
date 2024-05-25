<?php

namespace App\Service;

use App\Domain\Admin;
use App\Domain\Session;
use App\Repository\AdminRepository;
use App\Repository\SessionRepository;

class SessionService
{
    public static string $COOKIE_NAME = "APP-SESSION";
    private SessionRepository $sessionRepository;
    private AdminRepository $adminRepository;
    public function __construct(SessionRepository $sessionRepository, AdminRepository $adminRepository)
    {
        $this->sessionRepository = $sessionRepository;
        $this->adminRepository = $adminRepository;
    }

   public function createSession(string $username): Session
   {
        $session = new Session();
        $session->id_session = 'SSN_' . random_int(1000, 9999);
        $session->username = $username;

        $this->sessionRepository->saveSesion($session);

        setcookie(self::$COOKIE_NAME, $session->id_session, time() + (60 * 60 * 24 * 30), "/");
        return $session;
   }

   public function destroySession(): void
   {
        $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';
        $this->sessionRepository->deleteById($sessionId);
       setcookie(self::$COOKIE_NAME, '', 1, "/");
   }

   public function currentSessionAdmin(): ?Admin
   {
        $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';

        $session = $this->sessionRepository->findById($sessionId);
        if ($session == null) {
            return null;
        }

        return $this->adminRepository->findByUsername($session->username);
   }

}