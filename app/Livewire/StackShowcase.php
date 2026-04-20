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

    public array $portfolioRows = [
        [
            [
                'label' => 'crm platform',
                'title' => 'DevSuite CRM',
                'theme' => 'bronze',
                'layout' => 'phone-left',
                'image' => 'images/projects/devsuite-crm.svg',
            ],
            [
                'label' => 'ai workspace',
                'title' => 'CodePilot AI',
                'theme' => 'graphite',
                'layout' => 'centered',
                'image' => 'images/projects/codepilot-ai.svg',
            ],
            [
                'label' => 'devops command',
                'title' => 'DeployBoard',
                'theme' => 'obsidian',
                'layout' => 'wide',
                'image' => 'images/projects/deployboard.svg',
            ],
            [
                'label' => 'saas onboarding',
                'title' => 'Nimbus SaaS',
                'theme' => 'champagne',
                'layout' => 'phone-left',
                'image' => 'images/projects/nimbus-saas.svg',
            ],
            [
                'label' => 'software studio',
                'title' => 'StackForge',
                'theme' => 'blush',
                'layout' => 'centered',
                'image' => 'images/projects/stackforge.svg',
            ],
        ],
        [
            [
                'label' => 'fintech dashboard',
                'title' => 'Fintrack Pro',
                'theme' => 'amber',
                'layout' => 'wide',
                'image' => 'images/projects/fintrack-pro.svg',
            ],
            [
                'label' => 'admin ui system',
                'title' => 'Voxel Admin',
                'theme' => 'violet',
                'layout' => 'phone-left',
                'image' => 'images/projects/voxel-admin.svg',
            ],
            [
                'label' => 'cloud monitoring',
                'title' => 'CloudOps Hub',
                'theme' => 'graphite',
                'layout' => 'centered',
                'image' => 'images/projects/cloudops-hub.svg',
            ],
            [
                'label' => 'analytics suite',
                'title' => 'NeuroDash',
                'theme' => 'obsidian',
                'layout' => 'phone-left',
                'image' => 'images/projects/neurodash.svg',
            ],
            [
                'label' => 'enterprise workflow',
                'title' => 'TaskFlow ERP',
                'theme' => 'champagne',
                'layout' => 'wide',
                'image' => 'images/projects/taskflow-erp.svg',
            ],
        ],
    ];

    public array $footerMenu = [
        ['label' => 'Bosh sahifa', 'href' => '#home'],
        ['label' => 'NFC Vizitka', 'href' => '#nfc'],
        ['label' => 'Xizmatlar', 'href' => '#services'],
        ['label' => 'Loyihalar', 'href' => '#projects'],
    ];

    public array $footerContacts = [
        [
            'icon' => 'mail',
            'label' => 'Email',
            'value' => 'hello@mirsaar.uz',
            'href' => 'mailto:hello@mirsaar.uz',
        ],
        [
            'icon' => 'shield',
            'label' => 'Qo\'llab-quvvatlash',
            'value' => '24/7 premium support',
            'href' => '#support',
        ],
        [
            'icon' => 'spark',
            'label' => 'Portfolio',
            'value' => 'Premium preview va keyslar',
            'href' => '#projects',
        ],
    ];

    public function render()
    {
        return view('livewire.stack-showcase');
    }
}
