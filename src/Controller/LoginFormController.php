<?php

namespace ProjetoBlog\Controller;

class LoginFormController implements Controller
{
    public function processRequest(): void
    {
        if(array_key_exists('logado', $_SESSION) && $_SESSION['logado'] === true) {
            header('Location: /');
            return;
        }
        $email = $_SESSION['usuario'] ?? null;

        require_once __DIR__ . '/../../views/form-login.php';
    }
}