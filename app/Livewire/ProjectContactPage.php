<?php

namespace App\Livewire;

use App\Models\Inquiry;
use App\Models\Service;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ProjectContactPage extends Component
{
    public array $navItems = [
        ['label' => 'Главная', 'href' => '/'],
        ['label' => 'Услуги', 'href' => '/#services'],
        ['label' => 'Проекты', 'href' => '/#projects'],
        ['label' => 'Отзывы', 'href' => '/#reviews'],
    ];

    public array $faqItems = [
        [
            'icon' => 'coins',
            'question' => 'Сколько стоит сайт?',
            'answer' => 'Стоимость зависит от структуры, количества экранов, анимации и интеграций. После краткого брифа подскажем точный диапазон и этапы оплаты.',
        ],
        [
            'icon' => 'calendar',
            'question' => 'Сроки разработки?',
            'answer' => 'В среднем лендинг или корпоративный сайт запускается за 14-30 рабочих дней. Более крупные CRM и админ-панели считаем отдельно по roadmap.',
        ],
        [
            'icon' => 'shield',
            'question' => 'Работаете ли вы по договору?',
            'answer' => 'Да, перед стартом фиксируем задачу, этапы, сроки и формат сдачи. Это помогает держать проект в понятной и спокойной рамке.',
        ],
        [
            'icon' => 'card',
            'question' => 'Какие способы оплаты вы принимаете?',
            'answer' => 'Обычно работаем по этапам: старт, промежуточное подтверждение и финальная сдача. Формат оплаты подбираем под тип проекта и процесс согласования.',
        ],
        [
            'icon' => 'rocket',
            'question' => 'Что нужно от меня для старта?',
            'answer' => 'Для начала достаточно краткого описания задачи, пожеланий по стилю и списка нужных блоков. Если материалов пока нет, поможем собрать структуру.',
        ],
        [
            'icon' => 'search',
            'question' => 'Занимаетесь ли вы продвижением (SEO)?',
            'answer' => 'Базовая SEO-подготовка закладывается сразу. Для дальнейшего роста можем отдельно подключить техническую и контентную оптимизацию.',
        ],
        [
            'icon' => 'nfc',
            'question' => 'В чем польза NFC визитки?',
            'answer' => 'NFC визитка собирает контакты, ссылки и соцсети в одной точке и помогает сохранить ваш профиль в телефон одним касанием.',
        ],
        [
            'icon' => 'support',
            'question' => 'Есть ли техническая поддержка?',
            'answer' => 'Да, после запуска остается этап сопровождения. Мы помогаем с правками, контентом и контролируем, чтобы проект работал стабильно.',
        ],
    ];

    public array $contactMeta = [
        ['label' => 'Email', 'value' => 'hello@mirsaar.uz', 'href' => 'mailto:hello@mirsaar.uz'],
        ['label' => 'Связь', 'value' => 'Бриф и запуск проекта', 'href' => '#contact-form'],
        ['label' => 'Локация', 'value' => 'Ташкент, Uzbekistan', 'href' => '#contact-map'],
    ];

    public array $footerMenu = [
        ['label' => 'Главная', 'href' => '/'],
        ['label' => 'Услуги', 'href' => '/#services'],
        ['label' => 'Проекты', 'href' => '/#projects'],
        ['label' => 'Отзывы', 'href' => '/#reviews'],
    ];

    public array $serviceOptions = [];

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
            ['label' => 'Bosh sahifa', 'href' => '/'],
            ['label' => 'Xizmatlar', 'href' => '/#services'],
            ['label' => 'Keyslar', 'href' => '/#projects'],
            ['label' => 'Kontaktlar', 'href' => '/#contact'],
        ];

        $this->footerMenu = [
            ['label' => 'Bosh sahifa', 'href' => '/'],
            ['label' => 'Xizmatlar', 'href' => '/#services'],
            ['label' => 'Keyslar', 'href' => '/#projects'],
            ['label' => 'Brief', 'href' => '#contact-form'],
        ];

        $this->faqItems = [
            [
                'icon' => 'coins',
                'question' => 'SMM xizmat narxi qanday belgilanadi?',
                'answer' => 'Narx platforma, kontent hajmi, target reklama va audit chuqurligiga qarab belgilanadi. Briefdan keyin aniq taklif beriladi.',
            ],
            [
                'icon' => 'calendar',
                'question' => 'Kontent plan necha kunga tuziladi?',
                'answer' => 'Odatda 2 yoki 4 haftalik kontent plan tayyorlanadi. Post, stories, reels va offerlar biznes maqsadiga qarab joylanadi.',
            ],
            [
                'icon' => 'search',
                'question' => 'Auditda nimalar tekshiriladi?',
                'answer' => 'Profil bio, vizual, kontent rubrikalari, reach, engagement, reklama yo\'nalishi va raqobatchilar holati tekshiriladi.',
            ],
            [
                'icon' => 'rocket',
                'question' => 'Start uchun nimalar kerak?',
                'answer' => 'Biznes niche, hozirgi sahifa linklari, maqsad, byudjet va mavjud kontent materiallari kifoya.',
            ],
        ];

        $this->loadServices();
    }

    protected function loadServices(): void
    {
        if (! Schema::hasTable('services')) {
            $this->serviceOptions = [
                ['id' => '1', 'title' => 'SMM strategiya'],
                ['id' => '2', 'title' => 'Kontent plan'],
                ['id' => '3', 'title' => 'Instagram yuritish'],
                ['id' => '4', 'title' => 'Reels / TikTok content'],
                ['id' => '5', 'title' => 'Target reklama'],
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
            'email' => ($validated['email'] ?? null) ?: null,
            'company' => ($validated['company'] ?? null) ?: $validated['business_niche'],
            'preferred_contact' => $validated['preferred_contact'],
            'platform' => $validated['platform'],
            'goal' => $validated['goal'],
            'budget_range' => $validated['budget_range'],
            'project_summary' => $validated['project_summary'],
            'note' => ($validated['note'] ?? null) ?: null,
            'status' => 'new',
        ]);

        $this->reset([
            'service_id',
            'name',
            'phone',
            'business_niche',
            'email',
            'company',
            'budget_range',
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
        return view('livewire.project-contact-page');
    }
}
