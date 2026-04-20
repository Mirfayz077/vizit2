<?php

namespace App\Livewire;

use Livewire\Component;

class StackShowcase extends Component
{
    public array $navItems = [
        ['label' => 'Bosh sahifa', 'href' => '#home'],
        ['label' => 'NFC Vizitka', 'href' => '#nfc'],
        ['label' => 'Xizmatlar', 'href' => '#services'],
        ['label' => 'Qo\'llab-quvvatlash', 'href' => '#support'],
        ['label' => 'Loyihalar', 'href' => '#projects'],
        ['label' => 'Sharhlar', 'href' => '#reviews'],
        ['label' => 'Kontakt', 'href' => '#contact'],
    ];

    public array $languages = [
        ['label' => 'UZ', 'active' => true],
        ['label' => 'EN', 'active' => false],
        ['label' => 'RU', 'active' => false],
    ];

    public array $heroTags = [
        'Luxury Header',
        'Icon Motion',
        'NFC Ready',
        'Full Screen',
    ];

    public array $stats = [
        ['value' => '24/7', 'label' => 'premium support'],
        ['value' => '3D', 'label' => 'hover va motion polish'],
        ['value' => '100%', 'label' => 'responsive first-screen'],
    ];

    public array $storyMetrics = [
        [
            'id' => 'nfc',
            'value' => 'NFC-визитка',
            'label' => 'Контакты и первое впечатление — в одно касание.',
        ],
        [
            'id' => 'care',
            'value' => 'Premium Support',
            'label' => 'Быстрое, спокойное и надёжное сопровождение на всех этапах.',
        ],
        [
            'id' => 'contact',
            'value' => 'hello@mirsaar.uz',
            'label' => 'Всё общение — в одной точке, без лишних форм и шума.',
        ],
    ];

    public function render()
    {
        return view('livewire.stack-showcase');
    }
}
