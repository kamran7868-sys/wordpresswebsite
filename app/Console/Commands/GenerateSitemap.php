<?php

namespace App\Console\Commands;

use App\Models\Package;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate {--domain= : Base URL for sitemap (e.g. https://premiumglobalexp.com)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a submission-ready sitemap.xml file for Premium Global Expeditions';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Generating sitemap.xml...');

        $baseDomain = rtrim($this->option('domain') ?: config('app.url', 'https://premiumglobalexp.com'), '/');
        if (str_contains($baseDomain, 'localhost')) {
            $baseDomain = 'https://premiumglobalexp.com';
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        $today = date('Y-m-d');

        // Static Public Pages
        $staticPages = [
            [
                'loc' => route('home'),
                'lastmod' => $today,
                'changefreq' => 'weekly',
                'priority' => '1.0',
            ],
            [
                'loc' => route('packages'),
                'lastmod' => $today,
                'changefreq' => 'weekly',
                'priority' => '0.9',
            ],
            [
                'loc' => route('about'),
                'lastmod' => $today,
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ],
            [
                'loc' => route('contact'),
                'lastmod' => $today,
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ],
            [
                'loc' => route('register-dmc'),
                'lastmod' => $today,
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ],
        ];

        foreach ($staticPages as $page) {
            $formattedLoc = $this->formatLoc($page['loc'], $baseDomain);
            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($formattedLoc, ENT_XML1) . "</loc>\n";
            $xml .= "    <lastmod>" . $page['lastmod'] . "</lastmod>\n";
            $xml .= "    <changefreq>" . $page['changefreq'] . "</changefreq>\n";
            $xml .= "    <priority>" . $page['priority'] . "</priority>\n";
            $xml .= "  </url>\n";
        }

        // Dynamic Published Packages
        try {
            $packages = Package::published()->orderBy('updated_at', 'desc')->get();

            foreach ($packages as $pkg) {
                if ($pkg->category === 'hotel') {
                    $loc = route('stay-detail', ['slug' => $pkg->slug]);
                } elseif ($pkg->category === 'cruise') {
                    $loc = route('voyage-detail', ['slug' => $pkg->slug]);
                } else {
                    $loc = route('explore-packages', ['slug' => $pkg->slug]);
                }

                $formattedLoc = $this->formatLoc($loc, $baseDomain);
                $lastmod = $pkg->updated_at ? $pkg->updated_at->format('Y-m-d') : $today;

                $xml .= "  <url>\n";
                $xml .= "    <loc>" . htmlspecialchars($formattedLoc, ENT_XML1) . "</loc>\n";
                $xml .= "    <lastmod>" . $lastmod . "</lastmod>\n";
                $xml .= "    <changefreq>weekly</changefreq>\n";
                $xml .= "    <priority>0.7</priority>\n";
                $xml .= "  </url>\n";
            }
        } catch (\Throwable $e) {
            $this->warn('Could not query packages from database: ' . $e->getMessage());
        }

        $xml .= '</urlset>' . "\n";

        $destPath = public_path('sitemap.xml');
        file_put_contents($destPath, $xml);

        $this->info("Sitemap successfully generated at: {$destPath}");
        return Command::SUCCESS;
    }

    /**
     * Format URL with production domain.
     */
    protected function formatLoc(string $url, string $baseDomain): string
    {
        $path = parse_url($url, PHP_URL_PATH) ?: '/';
        return rtrim($baseDomain, '/') . $path;
    }
}

