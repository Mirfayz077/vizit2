<?php

namespace App\Livewire;

use App\Models\Inquiry;
use App\Models\HeroSection;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;
use Livewire\Component;

class StackShowcase extends Component
{
    public array $navItems = [
        ['label' => 'Главная', 'href' => '#home'],
        ['label' => 'Услуги', 'href' => '#services'],
        ['label' => 'Поддержка', 'href' => '#support'],
        ['label' => 'Проекты', 'href' => '#projects'],
        ['label' => 'Отзывы', 'href' => '#reviews'],
        ['label' => 'Контакты', 'href' => '#contact'],
    ];

    public array $languages = [
        ['label' => 'UZ', 'active' => true],
        ['label' => 'EN', 'active' => false],
        ['label' => 'RU', 'active' => false],
    ];

    public array $hero = [];

    public array $siteSettings = [];

    public array $heroTags = [
        'Instagram',
        'TikTok',
        'Kontent plan',
        'Target',
    ];

    public array $stats = [
        ['value' => '25+', 'label' => 'loyiha'],
        ['value' => '3 yil', 'label' => 'tajriba'],
        ['value' => '10M+', 'label' => 'reach'],
    ];

    public array $storyMetrics = [
        [

            'id' => 'nfc',
            'value' => 'NFC-визитка',
            'label' => 'Контакты и первое впечатление — в одно касание.',

            'id' => 'platform',
            'value' => 'Web Platform',
            'label' => 'Премиальный сайт, CRM и админ-панель объединяются в единую систему.',

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

    public array $contactCards = [
        [
            'initials' => 'SD',
            'role' => 'Sales Desk',
            'title' => 'Отдел продаж',
            'value' => 'hello@mirsaar.uz',
            'meta' => 'Первый ответ по новому проекту — от 15 минут.',
            'href' => 'mailto:hello@mirsaar.uz',
        ],
        [
            'initials' => 'PM',
            'role' => 'Project Lead',
            'title' => 'Менеджер проекта',
            'value' => 'Чётко формируем roadmap и задачи.',
            'meta' => 'Бриф, scope и процесс запуска — в одном месте.',
            'href' => '#support',
        ],
        [
            'initials' => 'CX',
            'role' => 'Client Care',
            'title' => 'Поддержка',
            'value' => 'Премиальная поддержка 24/7',
            'meta' => 'Оперативная помощь и сопровождение для действующих клиентов.',
            'href' => '#support',
        ],
        [
            'initials' => 'PR',
            'role' => 'Portfolio Call',
            'title' => 'Презентационная сессия',
            'value' => 'Показываем превью и демо',
            'meta' => 'На основе кейсов из карусели предлагаем подходящее решение.',
            'href' => '#projects',
        ],
    ];

    public array $contactHubCards = [
        [
            'icon' => 'mail',
            'eyebrow' => 'Email',
            'title' => 'hello@mirsaar.uz',
            'meta' => 'Yangi loyiha bo\'yicha ilk javob odatda 15 daqiqadan boshlanadi.',
            'href' => 'mailto:hello@mirsaar.uz',
        ],
        [
            'icon' => 'brief',
            'eyebrow' => 'Brief Session',
            'title' => 'Online yoki offline uchrashuv',
            'meta' => 'Scope, deadline va kerakli bo\'limlarni bir joyda yig\'amiz.',
            'href' => '#contact-form',
        ],
        [
            'icon' => 'support',
            'eyebrow' => 'Client Care',
            'title' => '24/7 premium support',
            'meta' => 'Mavjud klientlar uchun support va yangi lead uchun tezkor kuzatuv.',
            'href' => '#contact-form',
        ],
    ];

    public array $contactFaqs = [
        [
            'question' => 'Sayt yoki CRM narxi qanday shakllanadi?',
            'answer' => 'Narx loyiha scope, kerakli bo\'limlar, animatsiya, admin panel va integratsiyalarga qarab belgilanadi. Briefdan keyin aniq smeta va bosqichma-bosqich taklif yuboramiz.',
        ],
        [
            'question' => 'Ishlash muddati odatda qancha bo\'ladi?',
            'answer' => 'Ko\'p holatda landing va korporativ saytlar 14-30 ish kuni oralig\'ida yakunlanadi. Kattaroq CRM yoki admin panel bo\'lsa, timeline alohida roadmap bilan beriladi.',
        ],
        [
            'question' => 'Shartnoma va kafolat bilan ishlaysizlarmi?',
            'answer' => 'Ha, loyiha boshlanishidan oldin ish hajmi, topshirish bosqichlari va support qamrovi aniq ko\'rsatilgan tartibda ishlaymiz.',
        ],
        [
            'question' => 'To\'lov qanday qabul qilinadi?',
            'answer' => 'To\'lov odatda bosqichma-bosqich olinadi: start, oraliq tasdiq va final topshirish. Format loyiha turiga qarab oldindan kelishiladi.',
        ],
        [
            'question' => 'Start uchun sizga mendan nimalar kerak bo\'ladi?',
            'answer' => 'Qisqacha brief, brend bo\'yicha materiallar, kerakli bo\'limlar ro\'yxati va deadline. Agar material tayyor bo\'lmasa, uni yig\'ish bo\'yicha ham yo\'nalish beramiz.',
        ],
        [
            'question' => 'SEO va keyingi support ham bo\'ladimi?',
            'answer' => 'Bazaviy optimizatsiya va topshirishdan keyingi kuzatuv oqimi mavjud. Keyingi support yoki kontent boshqaruvi uchun alohida xizmat oqimi ham ulab beriladi.',
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
        ['label' => 'Главная', 'href' => '#home'],
        ['label' => 'Услуги', 'href' => '#services'],
        ['label' => 'Проекты', 'href' => '#projects'],
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

    public array $services = [];

    public ?string $service_id = null;

    public string $name = '';

    public string $phone = '';

    public string $business_niche = '';

    public string $email = '';

    public string $company = '';

    public string $preferred_contact = 'phone';

    public string $platform = 'instagram';

    public string $goal = 'sales';

    public string $budget_range = '';

    public string $project_summary = '';

    public string $note = '';

    public bool $inquirySent = false;

    public function mount(): void
    {
        $this->navItems = [
            ['label' => 'Bosh sahifa', 'href' => '#home'],
            ['label' => 'Xizmatlar', 'href' => '#services'],
            ['label' => 'Brief', 'href' => '#support'],
            ['label' => 'Keyslar', 'href' => '#projects'],
            ['label' => 'Sharhlar', 'href' => '#reviews'],
            ['label' => 'Kontaktlar', 'href' => '#contact'],
        ];

        $this->footerMenu = [
            ['label' => 'Bosh sahifa', 'href' => '#home'],
            ['label' => 'Xizmatlar', 'href' => '#services'],
            ['label' => 'Keyslar', 'href' => '#projects'],
            ['label' => 'Brief', 'href' => '#support'],
        ];

        $this->loadHero();
        $this->loadSiteSettings();
        $this->loadServices();
        $this->loadProjects();
    }

    protected function loadHero(): void
    {
        $this->hero = $this->defaultHero();

        if (! Schema::hasTable('hero_sections')) {
            $this->stats = $this->hero['achievements'];

            return;
        }

        $hero = HeroSection::singleton()->toHeroArray();
        $hero['hero_image_url'] = $this->publicAssetUrl($hero['hero_image']);

        $this->hero = $hero;
        $this->stats = $hero['achievements'];
    }

    protected function defaultHero(): array
    {
        $hero = (new HeroSection(HeroSection::defaults()))->toHeroArray();
        $hero['hero_image_url'] = $this->publicAssetUrl($hero['hero_image']);

        return $hero;
    }

    protected function publicAssetUrl(?string $path): ?string
    {
        if (! filled($path)) {
            return null;
        }

        if (preg_match('/^(https?:)?\/\//', $path) === 1) {
            return $path;
        }

        return asset(ltrim($path, '/'));
    }

    protected function loadSiteSettings(): void
    {
        $settings = SiteSetting::defaults();

        if (Schema::hasTable('site_settings')) {
            $settings = SiteSetting::singleton()->only([
                'phone',
                'telegram',
                'instagram',
                'whatsapp',
                'email',
                'location',
                'consultation_link',
            ]);
        }

        $this->siteSettings = $settings;

        $this->contactCards = [
            [
                'initials' => 'TG',
                'role' => 'Telegram',
                'title' => 'Tezkor aloqa',
                'value' => $settings['phone'],
                'meta' => 'SMM strategiya yoki konsultatsiya bo\'yicha yozing.',
                'href' => $settings['telegram'],
            ],
            [
                'initials' => 'IG',
                'role' => 'Instagram',
                'title' => 'Portfolio va kontent',
                'value' => 'Instagram profil',
                'meta' => 'Keyslar, reels va vizual yo\'nalishni ko\'rish uchun.',
                'href' => $settings['instagram'],
            ],
            [
                'initials' => 'WA',
                'role' => 'WhatsApp',
                'title' => 'Konsultatsiya',
                'value' => 'WhatsApp orqali bog\'lanish',
                'meta' => 'Brief, byudjet va platforma bo\'yicha tez kelishamiz.',
                'href' => $settings['whatsapp'],
            ],
            [
                'initials' => 'LO',
                'role' => 'Location',
                'title' => $settings['location'],
                'value' => $settings['email'],
                'meta' => 'Online konsultatsiya va loyiha muhokamasi.',
                'href' => 'mailto:'.$settings['email'],
            ],
        ];

        $this->footerContacts = [
            [
                'icon' => 'mail',
                'label' => 'Email',
                'value' => $settings['email'],
                'href' => 'mailto:'.$settings['email'],
            ],
            [
                'icon' => 'shield',
                'label' => 'Telegram',
                'value' => $settings['phone'],
                'href' => $settings['telegram'],
            ],
            [
                'icon' => 'spark',
                'label' => 'Konsultatsiya',
                'value' => $settings['location'],
                'href' => $settings['consultation_link'],
            ],
        ];
    }

    protected function loadServices(): void
    {
        if (! Schema::hasTable('services')) {
            $this->services = [
                ['id' => '1', 'title' => 'SMM strategiya', 'description' => 'Kontent va growth yo\'l xaritasi.', 'price' => '300$ dan', 'icon' => 'strategy', 'benefit' => 'SMM yo\'nalish aniq bo\'ladi.'],
                ['id' => '2', 'title' => 'Kontent plan', 'description' => 'Post, reels va stories kalendar.', 'price' => '200$ dan', 'icon' => 'calendar', 'benefit' => 'Kontent tartibli chiqadi.'],
            ];
            $this->serviceOptions = collect($this->services)->map(fn (array $service) => [
                'id' => $service['id'],
                'title' => $service['title'],
            ])->all();

            return;
        }

        $this->services = Service::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get(['id', 'title', 'description', 'price', 'icon', 'benefit'])
            ->map(fn (Service $service) => [
                'id' => (string) $service->id,
                'title' => $service->title,
                'description' => $service->description,
                'price' => $service->price,
                'icon' => $service->icon ?: 'spark',
                'benefit' => $service->benefit,
            ])
            ->all();

        $this->serviceOptions = collect($this->services)->map(fn (array $service) => [
            'id' => $service['id'],
            'title' => $service['title'],
        ])->all();
    }

    protected function loadProjects(): void
    {
        if (! Schema::hasTable('projects')) {
            return;
        }

        $projects = Project::query()
            ->where('is_active', true)
            ->orderBy('row')
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        if ($projects->isEmpty()) {
            return;
        }

        $this->portfolioRows = $projects
            ->groupBy('row')
            ->sortKeys()
            ->map(fn ($row) => $row
                ->map(fn (Project $project) => [
                    'label' => $project->label ?: $project->slug,
                    'title' => $project->title,
                    'client_niche' => $project->client_niche,
                    'theme' => $project->theme ?: 'bronze',
                    'layout' => $project->layout ?: 'centered',
                    'image' => $project->image ?: 'images/projects/devsuite-crm.svg',
                    'description' => $project->description,
                    'before_state' => $project->before_state,
                    'work_done' => $project->work_done,
                    'result' => $project->result,
                    'platform' => $project->platform,
                    'is_featured' => $project->is_featured,
                ])
                ->values()
                ->all())
            ->values()
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
            'business_niche' => ['required', 'string', 'max:120'],
            'email' => ['nullable', 'email', 'max:120'],
            'company' => ['nullable', 'string', 'max:120'],
            'preferred_contact' => ['required', Rule::in(['phone', 'telegram', 'email'])],
            'platform' => ['required', Rule::in(['instagram', 'tiktok', 'telegram'])],
            'goal' => ['required', Rule::in(['followers', 'sales', 'leads', 'brand_awareness'])],
            'budget_range' => ['required', 'string', 'max:40'],
            'project_summary' => ['required', 'string', 'min:10', 'max:2000'],
            'note' => ['nullable', 'string', 'max:2000'],
        ];
    }

    protected function messages(): array
    {
        return [
            'service_id.required' => 'Qaysi xizmat kerakligini tanlang.',
            'service_id.exists' => 'Tanlangan xizmat topilmadi.',
            'name.required' => 'Ismingizni kiriting.',
            'phone.required' => 'Telefon raqamingizni kiriting.',
            'business_niche.required' => 'Biznes yoki niche kiriting.',
            'email.email' => 'Email formatini tekshiring.',
            'preferred_contact.required' => 'Qulay aloqa usulini tanlang.',
            'platform.required' => 'Qaysi platforma kerakligini tanlang.',
            'goal.required' => 'Asosiy maqsadni tanlang.',
            'budget_range.required' => 'Taxminiy byudjetni kiriting.',
            'project_summary.required' => 'Izoh yoki qisqa brief yozing.',
            'project_summary.min' => 'Kamida 10 ta belgi yozing.',
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
            'business_niche' => $validated['business_niche'],
            'email' => $validated['email'] ?: null,
            'company' => $validated['company'] ?: $validated['business_niche'],
            'preferred_contact' => $validated['preferred_contact'],
            'platform' => $validated['platform'],
            'goal' => $validated['goal'],
            'budget_range' => $validated['budget_range'],
            'project_summary' => $validated['project_summary'],
            'note' => $validated['note'] ?: null,
            'status' => 'new',
        ]);

        $this->reset([
            'service_id',
            'name',
            'phone',
            'business_niche',
            'email',
            'company',
            'project_summary',
            'note',
        ]);

        $this->preferred_contact = 'phone';
        $this->platform = 'instagram';
        $this->goal = 'sales';
        $this->budget_range = '';
        $this->inquirySent = true;
        $this->resetValidation();
        $this->loadServices();
    }

    public function render()
    {
        return view('livewire.stack-showcase');
    }
}
