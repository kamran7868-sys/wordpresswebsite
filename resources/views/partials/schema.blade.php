@php
$orgSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'TravelAgency',
    '@id' => url('/') . '/#organization',
    'name' => 'Premium Global Expeditions',
    'legalName' => 'Premium Global Expeditions Inc.',
    'url' => url('/'),
    'logo' => [
        '@type' => 'ImageObject',
        'url' => asset('assets/pge-logo-full-light.svg'),
        'caption' => 'Premium Global Expeditions Inc.',
    ],
    'image' => asset('assets/pge-logo-full-light.svg'),
    'description' => 'Registered Canadian tour operator curating bespoke global holidays, luxury cruises, international flights, and 5-star hotel accommodations.',
    'email' => 'hello@premiumglobalexp.com',
    'address' => [
        '@type' => 'PostalAddress',
        'addressLocality' => 'Toronto',
        'addressRegion' => 'ON',
        'addressCountry' => 'CA',
    ],
    'sameAs' => [
        'https://www.facebook.com/PremiumGlobalExpeditions',
        'https://www.instagram.com/premiumglobalexpeditions',
        'https://www.linkedin.com/company/premium-global-expeditions',
    ],
    'priceRange' => '$$$$',
    'areaServed' => [
        '@type' => 'Country',
        'name' => 'Canada',
    ],
    'contactPoint' => [
        '@type' => 'ContactPoint',
        'contactType' => 'Travel Concierge & Customer Inquiries',
        'email' => 'hello@premiumglobalexp.com',
        'areaServed' => 'CA',
        'availableLanguage' => ['English', 'French'],
    ],
];

$websiteSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    '@id' => url('/') . '/#website',
    'url' => url('/'),
    'name' => 'Premium Global Expeditions',
    'description' => 'Luxury Canadian Travel Company — Where Dreams Become A Reality',
    'publisher' => [
        '@id' => url('/') . '/#organization',
    ],
    'potentialAction' => [
        '@type' => 'SearchAction',
        'target' => [
            '@type' => 'EntryPoint',
            'urlTemplate' => url('/packages') . '?region={search_term_string}',
        ],
        'query-input' => 'required name=search_term_string',
    ],
];
@endphp

<script type="application/ld+json">
{!! json_encode($orgSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
<script type="application/ld+json">
{!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
