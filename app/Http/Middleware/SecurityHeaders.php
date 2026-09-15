<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request and apply production-grade security headers.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Response $response */
        $response = $next($request);

        // Content-Security-Policy (CSP) - Tailored for PGE site resources, fonts, data URIs & inline Blade JS/CSS
        $csp = "default-src 'self'; " .
               "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://fonts.googleapis.com; " .
               "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; " .
               "font-src 'self' https://fonts.gstatic.com data:; " .
               "img-src 'self' data: blob: https:; " .
               "connect-src 'self' https://fonts.googleapis.com https://fonts.gstatic.com; " .
               "frame-ancestors 'self'; " .
               "base-uri 'self'; " .
               "form-action 'self';";

        $response->headers->set('Content-Security-Policy', $csp);

        // HTTP Strict Transport Security (HSTS) - Enforce HTTPS for 1 year with subdomains and preload
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');

        // Cross-Origin-Opener-Policy (COOP) - Isolate top-level document while supporting popups
        $response->headers->set('Cross-Origin-Opener-Policy', 'same-origin-allow-popups');

        // Additional Standard Security Hardening Headers
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Cache-Control Optimization for guest GET requests to minimize TTFB and boost FCP/LCP
        if ($request->isMethod('GET') && !$request->ajax() && !auth()->check()) {
            $response->headers->set('Cache-Control', 'public, max-age=3600, s-maxage=3600');
        }

        return $response;
    }
}
