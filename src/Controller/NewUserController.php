<?php

namespace ProjetoBlog\Controller;

use ProjetoBlog\Entity\User;
use ProjetoBlog\Repository\UserRepository;

class NewUserController implements Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * @return void
     * @throws \InvalidArgumentException | \DomainException
     */
    public function processRequest(): void
    {
        try {
            $sanitizedEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $email = filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL);

            if (empty($email)) {
                throw new \InvalidArgumentException('Email fornecido inválido.');
            }

            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if (empty($password)) {
                throw new \InvalidArgumentException('Senha fornecida inválida');
            }

            $user = new User($email, password_hash($password, PASSWORD_ARGON2ID));
            $this->userRepository->add($user);

            $_SESSION['mensagem'] = 'Usuário criado com sucesso';
            header('Location: /login');
        } catch (\InvalidArgumentException|\DomainException $exception) {
            $_SESSION['mensagem'] = $exception->getMessage();
            header('Location: /novo-usuario');
        }
    }
}