<?php

namespace App\Livewire;

use Livewire\Component;

class StackShowcase extends Component
{
    public int $count = 12;

    public array $packages = [
        ['name' => 'Laravel 12', 'type' => 'core'],
        ['name' => 'Vite', 'type' => 'bundler'],
        ['name' => 'Tailwind CSS', 'type' => 'styles'],
        ['name' => 'Sass', 'type' => 'styles'],
        ['name' => 'Livewire', 'type' => 'full-stack'],
        ['name' => 'Alpine.js', 'type' => 'interactivity'],
        ['name' => 'Flowbite', 'type' => 'components'],
        ['name' => 'daisyUI', 'type' => 'components'],
        ['name' => 'Swiper', 'type' => 'slider'],
    ];

    public array $slides = [
        [
            'title' => 'Lokal build tayyor',
            'copy' => 'Barcha frontend kutubxonalar npm orqali o`rnatildi va Vite build ichiga ulandi.',
        ],
        [
            'title' => 'Livewire + Alpine',
            'copy' => 'Server va brauzer holatini bitta sahifada birga ishlatish uchun tayyorlandi.',
        ],
        [
            'title' => 'Flowbite + daisyUI',
            'copy' => 'Tayyor komponentlar va theme tizimi lokal assetlar bilan ishlaydi.',
        ],
        [
            'title' => 'Swiper + Sass',
            'copy' => 'Slider va qo`shimcha uslublar alohida lokal fayllar orqali yig`iladi.',
        ],
    ];

    public function increment(): void
    {
        $this->count++;
    }

    public function decrement(): void
    {
        if ($this->count > 0) {
            $this->count--;
        }
    }

    public function resetCounter(): void
    {
        $this->count = 12;
    }

    public function render()
    {
        return view('livewire.stack-showcase');
    }
}
