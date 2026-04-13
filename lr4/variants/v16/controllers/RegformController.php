<?php

class RegformController extends PageController
{
    public function action_form(): void
    {
        $errors = [];
        $old = [];

        if ($this->request->isPost()) {
            $old = $this->request->allPost();
            $errors = $this->validate($old);

            if (empty($errors)) {
                $_SESSION['reg_success'] = true;
                $_SESSION['reg_data'] = [
                    'login' => trim($old['login'] ?? ''),
                ];
                $this->redirect('regform/done');
                return;
            }
        }

        $this->render('regform/form', compact('errors', 'old'), 'Реєстрація');
    }

    public function action_done(): void
    {
        if (empty($_SESSION['reg_success'])) {
            $this->redirect('regform/form');
            return;
        }

        $data = $_SESSION['reg_data'] ?? [];
        unset($_SESSION['reg_success'], $_SESSION['reg_data']);

        $this->render('regform/done', ['regData' => $data], 'Успішно');
    }

    private function validate(array $data): array
    {
        $errors = [];

        $login = trim($data['login'] ?? '');

        if ($login === '') {
            $errors['login'] = "Логін обов'язковий.";
        } elseif (preg_match('/\s/', $login)) {
            $errors['login'] = 'Без пробілів.';
        } elseif (strlen($login) < 5) {
            $errors['login'] = 'Мінімум 5 символів.';
        } elseif (preg_match('/\d/', $login)) {
            $errors['login'] = 'Без цифр.';
        }

        $password = $data['password'] ?? '';

        if ($password === '') {
            $errors['password'] = "Пароль обов'язковий.";
        } elseif (strlen($password) < 5) {
            $errors['password'] = 'Мінімум 5 символів.';
        } elseif (!preg_match('/\d/', $password)) {
            $errors['password'] = 'Потрібна цифра.';
        }

        if (($data['password_confirm'] ?? '') !== $password) {
            $errors['password_confirm'] = 'Паролі не співпадають.';
        }

        return $errors;
    }
}