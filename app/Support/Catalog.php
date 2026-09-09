<?php

namespace App\Support;

class Catalog
{
    public static function products(): array
    {
        return [
            'a5' => self::a5(),
            'm3' => self::m3(),
            'm1' => self::m1(),
            'm0' => self::m0(),
        ];
    }

    public static function product(string $slug): ?array
    {
        return self::products()[$slug] ?? null;
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
            ],
            [
                'slug' => 'nutrition',
                'number' => '02',
                'title' => 'Nutrition & Dietetics Clinics',
                'text' => 'Body composition measurements beyond weight and BMI to support more personalized nutrition planning.',
            ],
            [
                'slug' => 'sports',
                'number' => '03',
                'title' => 'Sports Clubs & Training Centers',
                'text' => 'Evidence-based training follow-up through detailed reports covering muscle mass, fat percentage, posture assessment, and balance.',
            ],
            [
                'slug' => 'pharmacies',
                'number' => '04',
                'title' => 'Pharmacies',
                'text' => 'Fast assessment services that add consultative value and support better customer guidance.',
            ],
            [
                'slug' => 'aesthetic',
                'number' => '05',
                'title' => 'Aesthetic & Body Contouring Clinics',
                'text' => 'More precise measurement and documentation of body shape and body composition changes, with comparable results.',
            ],
            [
                'slug' => 'education',
                'number' => '06',
                'title' => 'Educational Institutions & Student Health',
                'text' => 'Safe health assessment supporting school health programs, early screening, and healthier lifestyle awareness.',
            ],
            [
                'slug' => 'rehab',
                'number' => '07',
                'title' => 'Physical Therapy & Sports Rehabilitation',
                'text' => 'Track and document recovery progress through posture assessment, balance, and mobility improvement over time.',
            ],
            [
                'slug' => 'wellness',
                'number' => '08',
                'title' => 'Wellness Centers',
                'text' => 'A more professional wellness experience, with reports that support program personalization and progress tracking.',
            ],
            [
                'slug' => 'home',
                'number' => '09',
                'title' => 'Home Use & Family Health Monitoring',
                'text' => 'Practical and convenient at-home assessment to monitor key health indicators for every family member.',
            ],
            [
                'slug' => 'corporate',
                'number' => '10',
                'title' => 'Employee Health & Wellbeing Programs',
                'text' => 'Structured employee health assessments that support workplace wellness initiatives, preventive awareness, and a healthier, more productive work environment.',
            ],
        ];
    }

    public static function faqs(): array
    {
        return [
            [
                'q' => 'How does the Anovator system work?',
                'a' => 'Anovator uses direct multi-frequency 8-electrode BIA enhanced by AI to deliver comprehensive body composition assessment in one safe, fast experience.',
            ],
            [
                'q' => 'What sets Anovator apart from conventional body analyzers?',
                'a' => 'Anovator combines body analysis, posture evaluation, dimension measurement, and digital reporting in one comprehensive, easy-to-follow platform.',
            ],
            [
                'q' => 'Are the reports clear and easy to understand?',
                'a' => 'Yes. Anovator reports are structured and clear, helping professionals explain results, support follow-up, and make better-informed decisions.',
            ],
            [
                'q' => 'Is the app free for users?',
                'a' => 'Yes. The Anovator app is free for all users to access reports and track progress on mobile, tablet, and desktop.',
            ],
            [
                'q' => 'Does Anovator support Arabic?',
                'a' => 'Yes. Anovator supports Arabic across the user experience and reports, and the support team is fluent in both Arabic and English.',
            ],
            [
                'q' => 'How long do installation and training take?',
                'a' => 'Installation takes half a working day, with full team training completed the same day.',
            ],
            [
                'q' => 'What technical support is available?',
                'a' => 'Anovator GCC provides 24/7 technical support across Qatar, the UAE, Saudi Arabia, Bahrain, Kuwait, and Oman.',
            ],
            [
                'q' => 'Can reports be accessed from multiple devices?',
                'a' => 'Yes. Reports can be accessed from the system, mobile, tablet, or desktop for easier review and follow-up.',
            ],
            [
                'q' => 'Is the assessment safe and non-invasive?',
                'a' => 'Yes. The assessment is fast, safe, comfortable, and non-invasive, and is suitable for professional settings and users aged 3 to 99.',
            ],
            [
                'q' => 'Is a demo available before purchase?',
                'a' => 'Yes. You can request a tailored demo to experience the system and identify the most suitable model for your facility.',
            ],
            [
                'q' => 'What payment options are available?',
                'a' => 'Flexible payment arrangements can be discussed. Contact Anovator GCC to review the available options.',
            ],
            [
                'q' => 'Are Anovator systems supported by international certifications?',
                'a' => 'Yes. Anovator systems are supported by international certifications and compliance documentation related to quality, safety, accuracy, and performance, including Medical Device CTI Class II, ISO 13485, RoHS, FDA, and CE.',
            ],
        ];
    }

    public static function news(): array
    {
        return [
            'gcc-assessment-standard' => [
                'slug' => 'gcc-assessment-standard',
                'date' => 'August 2026',
                'title' => 'Anovator GCC expands regional support for professional body composition assessment',
                'excerpt' => 'Clinics, wellness centers, and sports facilities across the Gulf now have closer access to installation, training, and 24/7 technical support.',
                'image' => 'news-1.jpg',
                'body' => 'Anovator GCC continues to expand its regional framework for implementation and after-sales support. Facilities adopting 8-electrode BIA systems receive installation, same-day team training, and ongoing software updates covered by a lifetime software warranty. The goal is consistent measurement quality across healthcare, nutrition, sports, and wellness environments in Qatar, the UAE, Saudi Arabia, Bahrain, Kuwait, and Oman.',
            ],
            'a5-all-in-one' => [
                'slug' => 'a5-all-in-one',
                'date' => 'June 2026',
                'title' => 'Anovator A5: an all-in-one platform for advanced health assessment',
                'excerpt' => 'The flagship system combines body composition analysis, posture assessment, selected vital indicators, and digital reporting in one workflow.',
                'image' => 'news-2.jpg',
                'body' => 'Anovator A5 is designed for facilities that need more than a conventional body analyzer. The platform brings 8-electrode BIA, 3D visual scanning, posture and balance assessment, and selected health indicators into a single assessment journey. Results are delivered in about 30 seconds, with QR access through the free Anovator app for follow-up on mobile, tablet, and desktop.',
            ],
        ];
    }

    public static function article(string $slug): ?array
    {
        return self::news()[$slug] ?? null;
    }

    public static function journey(): array
    {
        return [
            ['n' => '01', 'title' => 'Start the Assessment', 'text' => 'The user stands in front of the system to begin a fast, structured session.'],
            ['n' => '02', 'title' => 'Comprehensive 3D Scan', 'text' => 'Millimeter-level visual body scanning for dimensions and circumferences.'],
            ['n' => '03', 'title' => 'Direct Analysis', 'text' => '8-electrode multi-frequency BIA for body composition in under 60 seconds.'],
            ['n' => '04', 'title' => 'Integrated Assessment', 'text' => 'Posture, balance, and selected health indicators in one workflow.'],
            ['n' => '05', 'title' => 'Report in 30 Seconds', 'text' => 'Clear, easy-to-read results designed for professional explanation.'],
            ['n' => '06', 'title' => 'Instant Access', 'text' => 'QR code access for report review and follow-up in the free app.'],
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
                    'url' => route('news.show', $article['slug']),
                ];
            }
        }

        foreach (self::industries() as $industry) {
            $haystack = mb_strtolower($industry['title'].' '.$industry['text']);
            if (str_contains($haystack, $query)) {
                $hits[] = [
                    'type' => 'Industry',
                    'title' => $industry['title'],
                    'text' => $industry['text'],
                    'url' => route('industries').'#'.$industry['slug'],
                ];
            }
        }

        $pages = [
            ['type' => 'Page', 'title' => 'Company', 'text' => 'About Anovator GCC, corporate values, and regional partnership', 'url' => route('company'), 'keys' => 'company about values partner'],
            ['type' => 'Page', 'title' => 'Support', 'text' => 'Technical service, training, and warranty across the GCC', 'url' => route('support'), 'keys' => 'support service training warranty help'],
            ['type' => 'Page', 'title' => 'FAQ', 'text' => 'Frequently asked questions about Anovator systems', 'url' => route('faq'), 'keys' => 'faq questions help'],
            ['type' => 'Page', 'title' => 'Product finder', 'text' => 'Find the right Anovator system for your facility', 'url' => route('finder'), 'keys' => 'finder product find compare'],
            ['type' => 'Page', 'title' => 'Contact', 'text' => 'Request a demo or speak with Anovator GCC', 'url' => route('contact'), 'keys' => 'contact demo email phone'],
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

    private static function a5(): array
    {
        return [
            'slug' => 'a5',
            'code' => 'A5',
            'name' => 'Anovator A5',
            'tag' => 'Intelligent & Visionary',
            'headline' => 'A leading all-in-one platform for advanced health assessment',
            'summary' => 'The flagship system for facilities that need comprehensive assessment: body composition, posture, selected vital indicators, and digital follow-up in one platform.',
            'ideal' => 'Full health analysis',
            'display' => '32" IPS HD (1920 × 1080)',
            'method' => '8-point BIA',
            'frequencies' => '20 / 100 kHz',
            'weight' => '67 kg',
            'range' => '0–200 kg',
            'extra' => 'Blood pressure, SpO₂, spirometry, ultrasonic height',
            'features' => [
                'Comprehensive Assessment',
                'Multi-Function System',
                'Advanced Technology',
                'Greater Flexibility',
            ],
            'specs' => [
                'Display' => '32" IPS HD touch (1920 × 1080)',
                'Measurement method' => '8-electrode multi-frequency BIA',
                'Frequencies' => '20 / 100 kHz',
                'Weight' => '67 kg',
                'Measuring range' => '0–200 kg',
                'Age range' => '3–99 years',
                'Additional measurements' => 'Blood pressure, SpO₂, spirometry, ultrasonic height',
                'Reporting' => 'On-screen, print, QR, free mobile app',
            ],
        ];
    }

    private static function m3(): array
    {
        return [
            'slug' => 'm3',
            'code' => 'M3',
            'name' => 'Anovator M3',
            'tag' => 'Professional & Connected',
            'headline' => 'Professional system for assessment, consultation, and follow-up',
            'summary' => 'A balanced solution for facilities that want to extend assessment beyond body composition analysis, with connectivity for consultation and regular follow-up.',
            'ideal' => 'Professional follow-up',
            'display' => '32" IPS HD (1920 × 1080)',
            'method' => '8-point BIA',
            'frequencies' => '20 / 100 kHz',
            'weight' => '50 kg',
            'range' => '0–200 kg',
            'extra' => 'Blood pressure + SpO₂',
            'features' => [
                'Beyond Body Composition',
                'Consultation Support',
                'Professional System',
                'Regular Follow-Up',
            ],
            'specs' => [
                'Display' => '32" IPS HD touch (1920 × 1080)',
                'Measurement method' => '8-electrode multi-frequency BIA',
                'Frequencies' => '20 / 100 kHz',
                'Weight' => '50 kg',
                'Measuring range' => '0–200 kg',
                'Age range' => '3–99 years',
                'Additional measurements' => 'Blood pressure + SpO₂',
                'Reporting' => 'Phone / paper print / web',
            ],
        ];
    }

    private static function m1(): array
    {
        return [
            'slug' => 'm1',
            'code' => 'M1',
            'name' => 'Anovator M1',
            'tag' => 'Compact & Practical',
            'headline' => 'Purpose-built assessment and progress tracking',
            'summary' => 'Combines body composition analysis, external measurements, and posture assessment, with visit-to-visit comparison for ongoing progress monitoring.',
            'ideal' => 'Fitness & wellness',
            'display' => '10.1" IPS (1920 × 1200)',
            'method' => '8-point BIA',
            'frequencies' => '50 / 250 kHz',
            'weight' => '8 kg',
            'range' => '5–300 kg',
            'extra' => 'Posture assessment',
            'features' => [
                'Body Composition Analysis',
                'External Measurements',
                'Posture Assessment',
                'Track Changes & Compare Progress',
            ],
            'specs' => [
                'Display' => '10.1" IPS (1920 × 1200)',
                'Measurement method' => '8-electrode multi-frequency BIA',
                'Frequencies' => '50 / 250 kHz',
                'Weight' => '8 kg',
                'Measuring range' => '5–300 kg',
                'Age range' => '3–99 years',
                'Additional measurements' => 'AI-supported posture assessment',
                'Reporting' => 'On-screen, printable, cloud history',
            ],
        ];
    }

    private static function m0(): array
    {
        return [
            'slug' => 'm0',
            'code' => 'M0',
            'name' => 'Anovator M0',
            'tag' => 'Smart & Compact',
            'headline' => 'Essential body composition analysis for everyday use',
            'summary' => 'A practical, space-saving system for facilities focused on essential body composition analysis in daily professional workflows.',
            'ideal' => 'Entry level',
            'display' => '10.1" IPS HD',
            'method' => '8-point BIA',
            'frequencies' => '20 / 100 kHz',
            'weight' => '45 kg',
            'range' => '0–200 kg',
            'extra' => '—',
            'features' => [
                'Essential Body Composition Analysis',
                'Compact Design',
                'Space-Saving System',
                'Everyday Use',
            ],
            'specs' => [
                'Display' => '10.1" IPS HD touch',
                'Measurement method' => '8-electrode multi-frequency BIA',
                'Frequencies' => '20 / 100 kHz',
                'Weight' => '45 kg',
                'Measuring range' => '0–200 kg',
                'Age range' => '3–99 years',
                'Additional measurements' => 'Core body composition metrics',
                'Reporting' => 'Phone / paper print / web',
            ],
        ];
    }
}
