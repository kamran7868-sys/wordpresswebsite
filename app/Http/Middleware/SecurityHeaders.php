<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request and apply production-grade security headers.
     * Configured for global access: Canada, USA, UK, Australia & worldwide.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Response $response */
        $response = $next($request);

        // -----------------------------------------------------------------------
        // Content-Security-Policy (CSP)
        // Global-compatible: Google Maps, Fonts, Analytics & all PGE resources
        // Works across Canada, USA, UK, Australia and all regions worldwide
        // -----------------------------------------------------------------------
        $csp = implode(' ', [
            "default-src 'self';",

            // Scripts: self + Google Fonts, Maps, Analytics (global CDNs)
            "script-src 'self' 'unsafe-inline' 'unsafe-eval'" .
                " https://fonts.googleapis.com" .
                " https://*.googleapis.com" .
                " https://*.gstatic.com" .
                " https://*.google.com;",

            // Styles: self + Google Fonts + Maps styles
            "style-src 'self' 'unsafe-inline'" .
                " https://fonts.googleapis.com" .
                " https://*.googleapis.com" .
                " https://*.gstatic.com;",

            // Fonts: self + Google Fonts global CDN
            "font-src 'self' data:" .
                " https://fonts.gstatic.com" .
                " https://*.gstatic.com;",

            // Images: allow all HTTPS sources (needed for Google Maps tiles, travel imagery)
            "img-src 'self' data: blob: https:" .
                " https://*.googleapis.com" .
                " https://*.gstatic.com" .
                " https://*.google.com" .
                " https://*.ggpht.com;",

            // Frames: Google Maps embed — works for ALL Google regional domains globally
            "frame-src 'self'" .
                " https://www.google.com" .
                " https://maps.google.com" .
                " https://*.google.com" .
                " https://*.googleapis.com;",

            // Connections: Google APIs for Maps, Fonts, and future integrations
            "connect-src 'self'" .
                " https://*.googleapis.com" .
                " https://*.gstatic.com" .
                " https://*.google.com;",

            // Media: allow HTTPS video/audio sources (future travel video embeds)
            "media-src 'self' https: blob:;",

            // Workers: allow blob workers (Google Maps uses these)
            "worker-src 'self' blob:;",

            // Security restrictions
            "frame-ancestors 'self';",
            "base-uri 'self';",
            "form-action 'self';",
        ]);

        $response->headers->set('Content-Security-Policy', $csp);

        // HTTP Strict Transport Security (HSTS) - Enforce HTTPS for 1 year
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');

        // Cross-Origin-Opener-Policy — allow popups (needed for booking/external links globally)
        $response->headers->set('Cross-Origin-Opener-Policy', 'same-origin-allow-popups');

        // Standard Security Hardening Headers
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Cache-Control: optimise for global CDN edge caching (Canada, USA, UK, etc.)
        if ($request->isMethod('GET') && !$request->ajax() && !auth()->check()) {
            $response->headers->set('Cache-Control', 'public, max-age=3600, s-maxage=3600');
        }

        return $response;
    }
}
