<?php

class SettingsController extends PageController
{
    private array $colors = [
        '#ffffff' => 'Білий',
        '#f3f4f6' => 'Світлий',
        '#e0f2fe' => 'Блакитний',
        '#fce7f3' => 'Рожевий',
    ];

    public function action_color(): void
    {
        $message = '';

        if ($this->request->isPost()) {
            $color = $this->request->postString('bg_color');

            if (isset($this->colors[$color])) {
                $_SESSION['bg_color'] = $color;
                $message = 'Збережено!';
            }
        }

        $this->render('settings/color', [
            'colors' => $this->colors,
            'currentColor' => $_SESSION['bg_color'] ?? '#ffffff',
            'message' => $message
        ], 'Колір');
    }

    public function action_greeting(): void
    {
        if ($this->request->isPost()) {
            setcookie('name', $this->request->postString('name'), time()+3600*24*30);
            setcookie('gender', $this->request->postString('gender'), time()+3600*24*30);
        }

        $this->render('settings/greeting', [], 'Привітання');
    }
}