<?php

namespace App\Livewire;

use App\Models\Inquiry;
use App\Models\Service;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;
use Livewire\Component;

class StackShowcase extends Component
{
    public array $navItems = [
        ['label' => 'Bosh sahifa', 'href' => '#home'],
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
        'Signature Header',
        'Code Motion',
        'Live Systems',
        'Full Screen',
    ];

    public array $stats = [
        ['value' => '24/7', 'label' => 'premium support'],
        ['value' => '3D', 'label' => 'hover va motion polish'],
        ['value' => '100%', 'label' => 'responsive first-screen'],
    ];

    public array $storyMetrics = [
        [
            'id' => 'platform',
            'value' => 'Web Platform',
            'label' => 'Premium sayt, CRM va admin oqimi bitta tizimga yig\'iladi.',
        ],
        [
            'id' => 'care',
            'value' => 'Premium Support',
            'label' => 'Jarayon davomida tez, sokin va ishonchli hamrohlik.',
        ],
        [
            'id' => 'contact',
            'value' => 'hello@mirsaar.uz',
            'label' => 'Aloqa bir nuqtada, ortiqcha shakl va shovqinsiz.',
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

    public array $contactCards = [
        [
            'initials' => 'SD',
            'role' => 'Sales Desk',
            'title' => 'Savdo bo\'limi',
            'value' => 'hello@mirsaar.uz',
            'meta' => 'Yangi loyiha bo\'yicha ilk javob 15 daqiqadan boshlab.',
            'href' => 'mailto:hello@mirsaar.uz',
        ],
        [
            'initials' => 'PM',
            'role' => 'Project Lead',
            'title' => 'Loyiha menejeri',
            'value' => 'Roadmap va topshiriqlarni aniq yig\'amiz.',
            'meta' => 'Brief, scope va ish boshlash tartibi bir joyda.',
            'href' => '#support',
        ],
        [
            'initials' => 'CX',
            'role' => 'Client Care',
            'title' => 'Qo\'llab-quvvatlash',
            'value' => '24/7 premium support',
            'meta' => 'Mavjud klientlar uchun tezkor yordam va kuzatuv.',
            'href' => '#support',
        ],
        [
            'initials' => 'PR',
            'role' => 'Portfolio Call',
            'title' => 'Presentation session',
            'value' => 'Preview va demo ko\'rsatamiz',
            'meta' => 'Karuseldagi keyslardan kelib chiqib mos yechim tavsiya qilamiz.',
            'href' => '#projects',
        ],
    ];

    public array $testimonials = [
        [
            'quote' => '"Barcha bosqichlar tartibli ketdi, yakunda brendimiz ancha premium ko\'rina boshladi."',
            'author' => 'Abdulaev Samandar',
            'company' => 'DevSuite CRM',
            'date' => '14.04.2026',
            'rating' => 5,
        ],
        [
            'quote' => '"Landing, admin panel va taqdimot uslubi bir xil ritmda ishlangani mijozlarimizga ham sezildi."',
            'author' => 'A A',
            'company' => 'Grand Rest',
            'date' => '14.04.2026',
            'rating' => 5,
        ],
        [
            'quote' => '"Jarayonda har mayda detal bilan ishlashdi. Dizayn chiroyli, topshirish esa aniq bo\'ldi."',
            'author' => 'BRB',
            'company' => 'Tash Majorka',
            'date' => '14.04.2026',
            'rating' => 5,
        ],
        [
            'quote' => '"Support qismi juda qulay: brief toza, aloqa tez, demo esa kutilganidan ham premium chiqdi."',
            'author' => 'Nodira Karimova',
            'company' => 'Luxury Flowers',
            'date' => '16.04.2026',
            'rating' => 5,
        ],
    ];

    public array $footerMenu = [
        ['label' => 'Bosh sahifa', 'href' => '#home'],
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

    public array $serviceOptions = [];

    public ?string $service_id = null;

    public string $name = '';

    public string $phone = '';

    public string $email = '';

    public string $company = '';

    public string $preferred_contact = 'phone';

    public string $budget_range = '1000-3000';

    public string $project_summary = '';

    public bool $inquirySent = false;

    public function mount(): void
    {
        $this->loadServices();
    }

    protected function loadServices(): void
    {
        if (! Schema::hasTable('services')) {
            $this->serviceOptions = [
                ['id' => '1', 'title' => 'Premium Landing Page'],
                ['id' => '2', 'title' => 'DevSuite CRM'],
                ['id' => '3', 'title' => 'Admin Dashboard'],
                ['id' => '4', 'title' => 'Corporate Website'],
                ['id' => '5', 'title' => 'Premium Support'],
            ];

            return;
        }

        $this->serviceOptions = Service::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get(['id', 'title'])
            ->map(fn (Service $service) => [
                'id' => (string) $service->id,
                'title' => $service->title,
            ])
            ->all();
    }

    protected function rules(): array
    {
        $serviceRules = ['required'];

        if (Schema::hasTable('services')) {
            $serviceRules[] = Rule::exists('services', 'id');
        }

        return [
            'service_id' => $serviceRules,
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:40'],
            'email' => ['nullable', 'email', 'max:120'],
            'company' => ['nullable', 'string', 'max:120'],
            'preferred_contact' => ['required', Rule::in(['phone', 'telegram', 'email'])],
            'budget_range' => ['required', Rule::in(['1000-3000', '3000-7000', '7000-15000', '15000+'])],
            'project_summary' => ['required', 'string', 'min:20', 'max:2000'],
        ];
    }

    protected function messages(): array
    {
        return [
            'service_id.required' => 'Qaysi xizmat kerakligini tanlang.',
            'service_id.exists' => 'Tanlangan xizmat topilmadi.',
            'name.required' => 'Ismingizni kiriting.',
            'phone.required' => 'Telefon raqamingizni kiriting.',
            'email.email' => 'Email formatini tekshiring.',
            'preferred_contact.required' => 'Qulay aloqa usulini tanlang.',
            'budget_range.required' => 'Taxminiy byudjetni tanlang.',
            'project_summary.required' => 'Proekt haqida qisqacha yozing.',
            'project_summary.min' => 'Kamida 20 ta belgi yozing.',
        ];
    }

    public function submitInquiry(): void
    {
        $this->inquirySent = false;

        $validated = $this->validate();

        if (! Schema::hasTable('inquiries')) {
            $this->addError('form', 'Murojaat jadvali hali tayyor emas. Migratsiyani ishga tushirib qayta urinib ko\'ring.');

            return;
        }

        Inquiry::create([
            'service_id' => isset($validated['service_id']) ? (int) $validated['service_id'] : null,
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?: null,
            'company' => $validated['company'] ?: null,
            'preferred_contact' => $validated['preferred_contact'],
            'budget_range' => $validated['budget_range'],
            'project_summary' => $validated['project_summary'],
            'status' => 'new',
        ]);

        $this->reset([
            'service_id',
            'name',
            'phone',
            'email',
            'company',
            'project_summary',
        ]);

        $this->preferred_contact = 'phone';
        $this->budget_range = '1000-3000';
        $this->inquirySent = true;
        $this->resetValidation();
        $this->loadServices();
    }

    public function render()
    {
        return view('livewire.stack-showcase');
    }
}
