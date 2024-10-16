<?php
class ThemeMocks
{
    public static function getThemeData()
    {
        return [
            'logo' => 'https://placehold.co/300x150.jpg?text=Logo',
            'endereco' => 'Rua XPTO, 00 - Brasil',
            'email' => 'example@mail.com',
            'whatsapp' => '(88) 8888-8888',
            'socials' => [
                [
                    'link' => '#',
                    'icon' => 'https://placehold.co/50.jpg'
                ]
            ]
        ];
    }
}
