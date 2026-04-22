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

    public string $email = '';

    public string $company = '';

    public string $preferred_contact = 'phone';

    public string $budget_range = '';

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
            'budget_range' => ['required', 'string', 'max:40', 'regex:/^\$?\s*[0-9][0-9\s,.]*$/'],
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
            'budget_range.required' => 'Taxminiy byudjetni kiriting.',
            'budget_range.regex' => 'Taxminiy byudjetni raqam ko\'rinishida kiriting.',
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
            'email' => ($validated['email'] ?? null) ?: null,
            'company' => ($validated['company'] ?? null) ?: null,
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
            'budget_range',
            'project_summary',
        ]);

        $this->preferred_contact = 'phone';
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
