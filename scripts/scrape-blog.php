<?php

$articles = [
    [
        'slug' => 'how-to-read-body-composition-report',
        'url' => 'https://anovatorgcc.com/blog/how-to-read-body-composition-report?lang=en',
        'image_url' => 'https://anovatorgcc.com/assets/images/blog/blog_6a64ab5250d839.15614143.jpg',
        'image' => 'how-to-read-body-composition-report.jpg',
        'date' => '19 July 2026',
        'author' => 'Anovator Team',
        'excerpt' => 'Learn how to read a body composition report and make sense of weight, body fat, muscle mass, body water, protein and BMR, so explanation and follow-up inside professional facilities become clearer.',
    ],
    [
        'slug' => 'weight-bmi-to-advanced-body-analysis',
        'url' => 'https://anovatorgcc.com/blog/weight-bmi-to-advanced-body-analysis?lang=en',
        'image_url' => 'https://anovatorgcc.com/assets/images/blog/blog_6a64ac74af4ab0.08894725.jpg',
        'image' => 'weight-bmi-to-advanced-body-analysis.jpg',
        'date' => '14 July 2026',
        'author' => 'Anovator Team',
        'excerpt' => 'Learn how body measurement and analysis evolved from weight and BMI to advanced body composition analysis, moving from general classification to a clearer understanding of body structure.',
    ],
    [
        'slug' => 'body-analysis-reports-raise-service-value',
        'url' => 'https://anovatorgcc.com/blog/body-analysis-reports-raise-service-value?lang=en',
        'image_url' => 'https://anovatorgcc.com/assets/images/blog/blog_6a64ac51e122f7.08343445.jpg',
        'image' => 'body-analysis-reports-raise-service-value.jpg',
        'date' => '17 July 2026',
        'author' => 'Anovator Team',
        'excerpt' => 'Learn how digital, visual reports turn body measurement and analysis from a quick check into a follow-up experience that supports client trust and raises service quality.',
    ],
    [
        'slug' => 'internal-indicators-external-measurements-posture-assessment',
        'url' => 'https://anovatorgcc.com/blog/internal-indicators-external-measurements-posture-assessment?lang=en',
        'image_url' => 'https://anovatorgcc.com/assets/images/blog/blog_6a6feff77851c3.39351092.png',
        'image' => 'internal-indicators-external-measurements-posture-assessment.png',
        'date' => '16 July 2026',
        'author' => 'Anovator Team',
        'excerpt' => 'Discover how Anovator systems connect body composition analysis, external measurements, visual analysis and posture assessment to support a more integrated assessment inside professional facilities.',
    ],
    [
        'slug' => 'beyond-body-fat-percentage-fat-type-location',
        'url' => 'https://anovatorgcc.com/blog/beyond-body-fat-percentage-fat-type-location?lang=en',
        'image_url' => 'https://anovatorgcc.com/assets/images/blog/blog_6a64ac95eea749.97530757.jpg',
        'image' => 'beyond-body-fat-percentage-fat-type-location.jpg',
        'date' => '15 July 2026',
        'author' => 'Anovator Team',
        'excerpt' => 'Learn the difference between visceral fat and subcutaneous fat, and how body measurement and analysis helps explain fat type, fat distribution and health-focused follow-up.',
    ],
    [
        'slug' => 'assessment-to-health-awareness-anovator',
        'url' => 'https://anovatorgcc.com/blog/assessment-to-health-awareness-anovator?lang=en',
        'image_url' => 'https://anovatorgcc.com/assets/images/blog/blog_6a64abbc1a5099.72061792.jpg',
        'image' => 'assessment-to-health-awareness-anovator.jpg',
        'date' => '18 July 2026',
        'author' => 'Anovator Team',
        'excerpt' => 'Discover how the Anovator experience helps users see their bodies beyond the mirror and the scale, through internal indicators that support health awareness and regular follow-up.',
    ],
    [
        'slug' => 'reverse-aging-body-composition',
        'url' => 'https://anovatorgcc.com/blog/reverse-aging-body-composition?lang=en',
        'image_url' => 'https://anovatorgcc.com/assets/images/blog/blog_6a78908b3d84d2.00786755.jpg',
        'image' => 'reverse-aging-body-composition.jpg',
        'date' => '9 August 2026',
        'author' => 'Anovator GCC',
        'excerpt' => 'How can body composition analysis support Reverse Aging and Healthy Aging programs? Explore the value of tracking muscle mass, visceral fat, and changes in body composition over time for more informed assessment and follow-up.',
    ],
];

$outDir = __DIR__.'/public/images/blog';
$jsonOut = __DIR__.'/storage/app/blog-scrape/articles.json';

if (! is_dir($outDir)) {
    mkdir($outDir, 0777, true);
}
if (! is_dir(dirname($jsonOut))) {
    mkdir(dirname($jsonOut), 0777, true);
}

$results = [];

foreach ($articles as $meta) {
    echo "Fetching {$meta['slug']}...\n";

    $html = file_get_contents($meta['url']);
    if ($html === false) {
        throw new RuntimeException('Failed to fetch '.$meta['url']);
    }

    $title = null;
    if (preg_match('/<h1[^>]*>(.*?)<\/h1>/is', $html, $m)) {
        $title = trim(html_entity_decode(strip_tags($m[1]), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
    }

    $bodyHtml = '';
    // Prefer article content containers commonly used on the site
    if (preg_match('/<article[^>]*>(.*?)<\/article>/is', $html, $m)) {
        $bodyHtml = $m[1];
    } elseif (preg_match('/<div[^>]*class="[^"]*blog-content[^"]*"[^>]*>(.*?)<\/div>\s*(?:<div[^>]*class="[^"]*(?:related|cta|footer)|<\/main)/is', $html, $m)) {
        $bodyHtml = $m[1];
    } elseif (preg_match('/<div[^>]*class="[^"]*prose[^"]*"[^>]*>(.*?)<\/div>/is', $html, $m)) {
        $bodyHtml = $m[1];
    }

    // Clean shared chrome from body if present
    $bodyHtml = preg_replace('/<nav[\s\S]*?<\/nav>/i', '', $bodyHtml ?? '');
    $bodyHtml = preg_replace('/<header[\s\S]*?<\/header>/i', '', $bodyHtml);
    $bodyHtml = preg_replace('/<footer[\s\S]*?<\/footer>/i', '', $bodyHtml);
    $bodyHtml = preg_replace('/<script[\s\S]*?<\/script>/i', '', $bodyHtml);
    $bodyHtml = preg_replace('/<style[\s\S]*?<\/style>/i', '', $bodyHtml);
    $bodyHtml = preg_replace('/<h1[\s\S]*?<\/h1>/i', '', $bodyHtml, 1);

    // Keep useful tags only
    $allowed = '<p><h2><h3><h4><ul><ol><li><strong><em><br><blockquote><a><img>';
    $bodyHtml = strip_tags($bodyHtml, $allowed);
    $bodyHtml = preg_replace('/\s+class="[^"]*"/i', '', $bodyHtml);
    $bodyHtml = preg_replace('/\s+style="[^"]*"/i', '', $bodyHtml);
    $bodyHtml = preg_replace('/\s+id="[^"]*"/i', '', $bodyHtml);
    $bodyHtml = preg_replace('/\s+data-[a-z0-9_-]+="[^"]*"/i', '', $bodyHtml);
    $bodyHtml = trim(preg_replace("/\n{3,}/", "\n\n", $bodyHtml));

    // Download image if missing
    $imagePath = $outDir.'/'.$meta['image'];
    if (! file_exists($imagePath) || filesize($imagePath) < 1000) {
        $img = @file_get_contents($meta['image_url']);
        if ($img === false) {
            throw new RuntimeException('Failed image '.$meta['image_url']);
        }
        file_put_contents($imagePath, $img);
        echo "  saved image {$meta['image']}\n";
    } else {
        echo "  image exists {$meta['image']}\n";
    }

    // Fallback body from plain text paragraphs if scrape was too thin
    if (mb_strlen(strip_tags($bodyHtml)) < 400) {
        if (preg_match_all('/<(p|h2)[^>]*>(.*?)<\/\1>/is', $html, $matches, PREG_SET_ORDER)) {
            $chunks = [];
            foreach ($matches as $match) {
                $text = trim(html_entity_decode(strip_tags($match[2]), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
                if ($text === '' || mb_strlen($text) < 20) {
                    continue;
                }
                if (stripos($text, 'Exclusive Representative') !== false) {
                    break;
                }
                if ($match[1] === 'h2') {
                    $chunks[] = '<h2>'.e($text).'</h2>';
                } else {
                    $chunks[] = '<p>'.e($text).'</p>';
                }
            }
            // Drop duplicated title if first p equals title
            if ($chunks && $title && strip_tags($chunks[0]) === $title) {
                array_shift($chunks);
            }
            $bodyHtml = implode("\n", $chunks);
        }
    }

    $results[] = [
        'slug' => $meta['slug'],
        'title' => $title ?: $meta['slug'],
        'excerpt' => $meta['excerpt'],
        'date' => $meta['date'],
        'author' => $meta['author'],
        'image' => 'blog/'.$meta['image'],
        'body' => $bodyHtml,
        'published_at' => date('Y-m-d', strtotime(str_replace(['July', 'August'], ['Jul', 'Aug'], $meta['date']))),
    ];

    echo "  title: {$title}\n";
    echo '  body chars: '.mb_strlen(strip_tags($bodyHtml))."\n";
}

file_put_contents($jsonOut, json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
echo "Wrote {$jsonOut}\n";

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}
