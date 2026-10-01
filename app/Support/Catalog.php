<?php

namespace App\Support;

use App\Models\Article;
use App\Models\Product;

class Catalog
{
    public static function products(): array
    {
        return Product::query()
            ->orderBy('sort_order')
            ->get()
            ->mapWithKeys(fn (Product $product) => [$product->slug => $product->toCatalogArray()])
            ->all();
    }

    public static function product(string $slug): ?array
    {
        $product = Product::query()->where('slug', $slug)->first();

        return $product?->toCatalogArray();
    }

    public static function countries(): array
    {
        return [
            'Qatar',
            'United Arab Emirates',
            'Saudi Arabia',
            'Bahrain',
            'Kuwait',
            'Oman',
        ];
    }

    public static function stats(): array
    {
        return [
            ['value' => '13+', 'label' => 'Years of Experience'],
            ['value' => '50+', 'label' => 'Countries'],
            ['value' => '11.84M+', 'label' => 'Assessments'],
            ['value' => '8.42M+', 'label' => 'Users'],
            ['value' => '200M+', 'label' => 'Data Records'],
            ['value' => '20,598+', 'label' => 'Service & Support Points'],
        ];
    }

    public static function industries(): array
    {
        return [
            [
                'slug' => 'healthcare',
                'number' => '01',
                'title' => 'Healthcare Facilities',
                'text' => 'Faster initial assessments with digital reports that support patient communication and structured follow-up.',
                'icon' => 'home/sector-logos/healthcare.png',
            ],
            [
                'slug' => 'nutrition',
                'number' => '02',
                'title' => 'Nutrition & Dietetics Clinics',
                'text' => 'Body composition measurements beyond weight and BMI to support more personalized nutrition planning.',
                'icon' => 'home/sector-logos/nutrition.png',
            ],
            [
                'slug' => 'sports',
                'number' => '03',
                'title' => 'Sports Clubs & Training Centers',
                'text' => 'Evidence-based training follow-up through detailed reports covering muscle mass, fat percentage, posture assessment, and balance.',
                'icon' => 'home/sector-logos/sports.png',
            ],
            [
                'slug' => 'pharmacies',
                'number' => '04',
                'title' => 'Pharmacies',
                'text' => 'Fast assessment services that add consultative value and support better customer guidance.',
                'icon' => 'home/sector-logos/pharmacies.png',
            ],
            [
                'slug' => 'aesthetic',
                'number' => '05',
                'title' => 'Aesthetic & Body Contouring Clinics',
                'text' => 'More precise measurement and documentation of body shape and body composition changes, with comparable results.',
                'icon' => 'home/sector-logos/aesthetic.png',
            ],
            [
                'slug' => 'education',
                'number' => '06',
                'title' => 'Educational Institutions & Student Health',
                'text' => 'Safe health assessment supporting school health programs, early screening, and healthier lifestyle awareness.',
                'icon' => 'home/sector-logos/schools.png',
            ],
            [
                'slug' => 'rehab',
                'number' => '07',
                'title' => 'Physical Therapy & Sports Rehabilitation',
                'text' => 'Track and document recovery progress through posture assessment, balance, and mobility improvement over time.',
                'icon' => 'home/sector-logos/rehabilitation.png',
            ],
            [
                'slug' => 'wellness',
                'number' => '08',
                'title' => 'Wellness Centers',
                'text' => 'A more professional wellness experience, with reports that support program personalization and progress tracking.',
                'icon' => 'home/sector-logos/wellness.png',
            ],
            [
                'slug' => 'home',
                'number' => '09',
                'title' => 'Home Use & Family Health Monitoring',
                'text' => 'Practical and convenient at-home assessment to monitor key health indicators for every family member.',
                'icon' => 'home/sector-logos/home.png',
            ],
            [
                'slug' => 'corporate',
                'number' => '10',
                'title' => 'Employee Health & Wellbeing Programs',
                'text' => 'Structured employee health assessments that support workplace wellness initiatives, preventive awareness, and a healthier, more productive work environment.',
                'icon' => 'home/sector-logos/employee-health.png',
            ],
        ];
    }

    public static function faqs(): array
    {
        return [
            [
                'number' => '01',
                'title' => 'System & User Experience',
                'image' => 'faq/faq-technology.jpg',
                'items' => [
                    [
                        'n' => '01',
                        'q' => 'How does Anovator work?',
                        'a' => 'Anovator uses multi-frequency 8-electrode BIA, supported by AI-powered assessment technology, to deliver fast and advanced body composition analysis.',
                    ],
                    [
                        'n' => '02',
                        'q' => 'What makes Anovator different from conventional body analysis systems?',
                        'a' => 'Anovator combines body composition analysis and measurement, posture assessment, body dimensions and circumferences, vision screening, selected basic health indicators, and digital reporting in one platform.',
                    ],
                    [
                        'n' => '03',
                        'q' => 'Are the reports easy to understand?',
                        'a' => 'Yes. Anovator reports are designed to be visual, clear, and easy to read.',
                    ],
                    [
                        'n' => '04',
                        'q' => 'Is the app free for users?',
                        'a' => 'Yes. Anovator provides a free app that allows users to access and review their reports via mobile, tablet, or desktop.',
                    ],
                    [
                        'n' => '05',
                        'q' => 'Does Anovator support the Arabic language?',
                        'a' => 'Yes. Anovator supports the Arabic language across the user interface and reports, with bilingual support available in Arabic and English.',
                    ],
                    [
                        'n' => '06',
                        'q' => 'How long does installation and training take?',
                        'a' => 'Installation and staff training are typically completed within half a working day, supporting a quick transition into daily operation.',
                    ],
                ],
            ],
            [
                'number' => '02',
                'title' => 'Support, Connectivity & System Selection',
                'image' => 'faq/faq-support.jpg',
                'items' => [
                    [
                        'n' => '07',
                        'q' => 'What technical support is available?',
                        'a' => 'Anovator GCC provides 24/7 technical support across the GCC.',
                    ],
                    [
                        'n' => '08',
                        'q' => 'Can reports be accessed from multiple devices?',
                        'a' => 'Yes. Reports can be accessed from the system, mobile, tablet, or desktop for easier review and follow-up.',
                    ],
                    [
                        'n' => '09',
                        'q' => 'Does Anovator support connectivity and digital workflow?',
                        'a' => 'Yes. Anovator supports an organized digital environment with connectivity options that help facilities manage assessments, reports, and result follow-up more efficiently.',
                    ],
                    [
                        'n' => '10',
                        'q' => 'Is a demo available before purchase?',
                        'a' => 'Yes. You can request a tailored demo to experience the system and identify the most suitable model for your facility.',
                    ],
                    [
                        'n' => '11',
                        'q' => 'Can Anovator GCC help identify the right model?',
                        'a' => 'Yes. Our team helps identify the most suitable model based on your facility type, service model, and operational needs.',
                    ],
                ],
            ],
            [
                'number' => '03',
                'title' => 'Purchase, Safety & Follow-Up',
                'image' => 'faq/faq-safety.jpg',
                'items' => [
                    [
                        'n' => '12',
                        'q' => 'What payment options are available?',
                        'a' => 'Flexible payment arrangements can be discussed. Contact Anovator GCC to review the available options.',
                    ],
                    [
                        'n' => '13',
                        'q' => 'Are Anovator systems supported by international certifications and compliance documentation?',
                        'a' => 'Yes. Anovator systems are supported by international certifications and compliance documentation related to quality, safety, accuracy, and performance.',
                    ],
                    [
                        'n' => '14',
                        'q' => 'Is the assessment safe and non-invasive?',
                        'a' => 'Yes. The assessment is fast, safe, comfortable, and non-invasive, making it suitable for professional settings and users aged 3 and above.',
                    ],
                    [
                        'n' => '15',
                        'q' => 'Can Anovator be used across multiple sectors?',
                        'a' => 'Yes. Anovator serves multiple sectors, including healthcare, nutrition, wellness, sports, rehabilitation, aesthetics, pharmacies, education, employee health and wellbeing programs, and home health monitoring.',
                    ],
                    [
                        'n' => '16',
                        'q' => 'Do Anovator reports support long-term follow-up?',
                        'a' => 'Yes. Stored digital reports allow results to be compared over time, helping users and professionals track progress and support ongoing follow-up.',
                    ],
                ],
            ],
        ];
    }

    public static function news(): array
    {
        return Article::query()
            ->orderBy('sort_order')
            ->orderByDesc('published_at')
            ->get()
            ->mapWithKeys(fn (Article $article) => [$article->slug => $article->toCatalogArray()])
            ->all();
    }

    public static function article(string $slug): ?array
    {
        $article = Article::query()->where('slug', $slug)->first();

        return $article?->toCatalogArray();
    }

    public static function journey(): array
    {
        return [
            ['n' => '01', 'title' => 'Start the Assessment', 'text' => 'The user stands in front of the system to begin a fast, structured assessment.'],
            ['n' => '02', 'title' => 'Comprehensive 3D Scan', 'text' => '3D visual body scanning.'],
            ['n' => '03', 'title' => 'Direct Analysis', 'text' => '8-electrode BIA body composition analysis.'],
            ['n' => '04', 'title' => 'Comprehensive assessment', 'text' => 'Advanced measurement of vital indicators, posture, balance, and body composition.'],
            ['n' => '05', 'title' => 'Report in 30 Seconds', 'text' => 'Clear, easy-to-read results.'],
            ['n' => '06', 'title' => 'Instant Access', 'text' => 'QR code access for report review and follow-up.'],
        ];
    }

    public static function facilityTypes(): array
    {
        return [
            'Private Clinic',
            'Medical Center / Hospital',
            'Nutrition Clinic',
            'Diet & Weight Management Center',
            'Aesthetic & Body Contouring Clinic',
            'Fitness / Training Center',
            'Pharmacy',
            'Educational Institution',
            'Wellness Center',
            'Physiotherapy / Rehabilitation Center',
            'Private Company',
            'Home Use',
            'Other',
        ];
    }

    public static function search(string $query): array
    {
        $query = trim(mb_strtolower($query));
        $hits = [];

        if ($query === '') {
            return $hits;
        }

        foreach (self::products() as $product) {
            $haystack = mb_strtolower($product['name'].' '.$product['headline'].' '.$product['summary']);
            if (str_contains($haystack, $query)) {
                $hits[] = [
                    'type' => 'Product',
                    'title' => $product['name'],
                    'text' => $product['headline'],
                    'url' => route('products.show', $product['slug']),
                ];
            }
        }

        foreach (self::news() as $article) {
            $haystack = mb_strtolower($article['title'].' '.$article['excerpt']);
            if (str_contains($haystack, $query)) {
                $hits[] = [
                    'type' => 'News',
                    'title' => $article['title'],
                    'text' => $article['excerpt'],
                    'url' => route('blog.show', $article['slug']),
                ];
            }
        }

        foreach (self::industries() as $industry) {
            $haystack = mb_strtolower($industry['title'].' '.$industry['text']);
            if (str_contains($haystack, $query)) {
                $hits[] = [
                    'type' => 'Sector',
                    'title' => $industry['title'],
                    'text' => $industry['text'],
                    'url' => route('solutions').'#'.$industry['slug'],
                ];
            }
        }

        $pages = [
            ['type' => 'Page', 'title' => 'About Us', 'text' => 'About Anovator GCC, corporate values, and regional partnership', 'url' => route('about'), 'keys' => 'company about values partner'],
            ['type' => 'Page', 'title' => 'Sectors We Serve', 'text' => 'Industries and sectors served by Anovator across the GCC', 'url' => route('solutions'), 'keys' => 'sectors industries healthcare sports'],
            ['type' => 'Page', 'title' => 'Business Solutions', 'text' => 'Tailored B2B solutions for businesses, institutions, and government', 'url' => route('business'), 'keys' => 'business b2b roi procurement'],
            ['type' => 'Page', 'title' => 'Support', 'text' => 'Technical service, training, and warranty across the GCC', 'url' => route('support'), 'keys' => 'support service training warranty help'],
            ['type' => 'Page', 'title' => 'FAQ', 'text' => 'Frequently asked questions about Anovator systems', 'url' => route('faq'), 'keys' => 'faq questions help'],
            ['type' => 'Page', 'title' => 'Blog', 'text' => 'Articles and insights on body composition analysis', 'url' => route('blog.index'), 'keys' => 'blog news articles'],
            ['type' => 'Page', 'title' => 'Product finder', 'text' => 'Find the right Anovator system for your facility', 'url' => route('finder'), 'keys' => 'finder product find compare'],
            ['type' => 'Page', 'title' => 'Contact Us', 'text' => 'Request a demo or speak with Anovator GCC', 'url' => route('contact'), 'keys' => 'contact demo email phone'],
        ];

        foreach ($pages as $page) {
            $haystack = mb_strtolower($page['title'].' '.$page['text'].' '.$page['keys']);
            if (str_contains($haystack, $query)) {
                $hits[] = [
                    'type' => $page['type'],
                    'title' => $page['title'],
                    'text' => $page['text'],
                    'url' => $page['url'],
                ];
            }
        }

        return $hits;
    }
}
