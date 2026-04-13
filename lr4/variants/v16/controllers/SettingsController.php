<?php

class SettingsController extends PageController
{
    private array $availableColors = [
        '#0f172a' => 'Темна ніч',
        '#1e293b' => 'Графіт',
        '#f8fafc' => 'Світлий зал',
        '#e2e8f0' => 'Мармур',
        '#fef3c7' => 'Золоте світло',
        '#ede9fe' => 'Лавандовий простір',
        '#cffafe' => 'Холодний блакитний',
    ];

    public function action_color(): void
    {
        $message = '';
        $messageType = 'success';

        if ($this->request->isPost()) {
            $color = $this->request->postString('bg_color', '#f8fafc');

            if (array_key_exists($color, $this->availableColors)) {
                $_SESSION['bg_color'] = $color;
                $message = 'Фон галереї змінено!';
            } else {
                $message = 'Невідомий колір.';
                $messageType = 'error';
            }
        }

        $this->render('settings/color', [
            'colors' => $this->availableColors,
            'currentColor' => $_SESSION['bg_color'] ?? '#f8fafc',
            'message' => $message,
            'messageType' => $messageType,
        ], 'Оформлення галереї');
    }

    public function action_greeting(): void
    {
        $message = '';
        $messageType = 'success';

        if ($this->request->isPost()) {
            $name = trim($this->request->postString('greeting_name'));
            $gender = $this->request->postString('greeting_gender');

            if ($name === '') {
                $message = "Ім'я не може бути порожнім.";
                $messageType = 'error';
            } elseif (!in_array($gender, ['male', 'female'], true)) {
                $message = 'Оберіть стать.';
                $messageType = 'error';
            } else {
                setcookie('greeting_name', $name, time() + 30 * 24 * 3600, '/');
                setcookie('greeting_gender', $gender, time() + 30 * 24 * 3600, '/');

                $_COOKIE['greeting_name'] = $name;
                $_COOKIE['greeting_gender'] = $gender;

                $message = 'Привітання збережено!';
            }
        }

        $this->render('settings/greeting', [
            'message' => $message,
            'messageType' => $messageType,
            'currentName' => $_COOKIE['greeting_name'] ?? '',
            'currentGender' => $_COOKIE['greeting_gender'] ?? '',
        ], 'Привітання');
    }
}