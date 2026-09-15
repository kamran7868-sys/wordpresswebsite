@extends('layouts.app')

@section('title', 'Thank You — Inquiry Received | Premium Global Expeditions')
@section('meta_description', 'Thank you for contacting Premium Global Expeditions. Our Canadian travel concierges have received your inquiry and will respond within 24 hours.')

@section('content')
  <!-- ==========================================================================
       HERO BANNER: INQUIRY RECEIVED
       ========================================================================== -->
  <section class="subpage-hero-section" id="contact-success-hero" style="min-height: 380px; position: relative; display: flex; align-items: center; justify-content: center;">
    <picture>
      <source srcset="{{ asset('assets/media/tropical-ocean-horizon-contact.webp') }}" type="image/webp">
      <img src="{{ asset('assets/media/tropical-ocean-horizon-contact.jpg') }}"
        alt="Premium Global Expeditions Travel Concierge" class="subpage-hero-bg" width="1920" height="800" fetchpriority="high" decoding="sync">
    </picture>
    <div class="hero-overlay" style="background: linear-gradient(180deg, rgba(18, 21, 37, 0.75) 0%, rgba(37, 46, 71, 0.88) 100%); position: absolute; inset: 0; z-index: 1;"></div>

    <div class="container hero-container" style="position: relative; z-index: 3; text-align: center; padding: 4rem 1.5rem 6rem;">
      <span class="hero-breadcrumb" style="display: inline-block; color: var(--color-gold); font-size: 0.85rem; font-weight: 600; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 0.75rem;">
        Inquiry Confirmation
      </span>
      <h1 class="hero-title" style="color: #FFFFFF; font-family: 'Cormorant Garamond', Georgia, serif; font-size: clamp(2.2rem, 5vw, 3.5rem); font-weight: 700; margin-bottom: 0.5rem; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">
        Inquiry Successfully Received
      </h1>
      <p class="hero-subtitle-script" style="font-family: 'Alex Brush', cursive; color: var(--color-gold); font-size: clamp(1.6rem, 3.5vw, 2.2rem); margin: 0;">
        Where Dreams Become A Reality
      </p>
    </div>
  </section>

  <!-- ==========================================================================
       MAIN CONFIRMATION CARD SECTION
       ========================================================================== -->
  <section class="contact-success-main" style="background-color: var(--color-ivory); padding: 0 1.5rem 5rem; position: relative;">
    <div class="container" style="max-width: 900px; margin: 0 auto;">

      <!-- FLOATING LUXURY CARD -->
      <div class="success-card" style="background: #FFFFFF; border-radius: 16px; margin-top: -3.5rem; position: relative; z-index: 10; box-shadow: 0 25px 60px rgba(18, 21, 37, 0.1); border: 1px solid rgba(182, 153, 100, 0.3); padding: clamp(2rem, 5vw, 3.5rem); text-align: center;">

        <!-- GOLD CHECKMARK BADGE -->
        <div style="width: 84px; height: 84px; margin: 0 auto 1.75rem; background: linear-gradient(135deg, #FAF7F0 0%, #F5EDDC 100%); border: 2px solid var(--color-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 25px rgba(182, 153, 100, 0.25);">
          <svg viewBox="0 0 24 24" style="width: 44px; height: 44px; fill: none; stroke: var(--color-gold); stroke-width: 2.2; stroke-linecap: round; stroke-linejoin: round;">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
          </svg>
        </div>

        @if(session('inquiry_id'))
          <div style="display: inline-block; background: rgba(182, 153, 100, 0.12); color: #8F723E; font-size: 0.8rem; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; padding: 0.35rem 1.1rem; border-radius: 20px; margin-bottom: 1.25rem; border: 1px solid rgba(182, 153, 100, 0.35);">
            Reference #PGE-{{ str_pad(session('inquiry_id'), 5, '0', STR_PAD_LEFT) }}
          </div>
        @endif

        <h2 style="font-family: 'Cormorant Garamond', Georgia, serif; font-size: clamp(1.8rem, 3.5vw, 2.5rem); color: var(--color-navy); margin-bottom: 1rem; font-weight: 700;">
          Thank You, {{ session('full_name') ?: 'Valued Traveler' }}!
        </h2>

        <p style="font-size: 1.05rem; line-height: 1.75; color: #475569; max-width: 680px; margin: 0 auto 2.5rem;">
          Your message regarding <strong style="color: var(--color-navy);">{{ session('subject') ?: 'Bespoke Travel Services' }}</strong> has been safely received by <strong style="color: var(--color-navy);">Premium Global Expeditions</strong>. Our Canadian travel concierges have already been notified and will be in touch within <strong style="color: var(--color-gold);">24 hours</strong> with tailored assistance.
        </p>

        <!-- 3-STEP TIMELINE -->
        <div style="text-align: left; background: #F8FAFC; border-radius: 12px; padding: 2rem 1.75rem; border: 1px solid #E2E8F0; margin-bottom: 2.5rem;">
          <h3 style="font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.25rem; color: var(--color-navy); margin-bottom: 1.5rem; text-align: center; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
            What Happens Next?
          </h3>

          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.5rem;">

            <!-- Step 1 -->
            <div style="display: flex; gap: 0.85rem; align-items: flex-start;">
              <div style="width: 32px; height: 32px; flex-shrink: 0; background: var(--color-navy); color: #FFFFFF; font-weight: 700; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.85rem;">
                1
              </div>
              <div>
                <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--color-navy); margin-bottom: 0.35rem;">Review &amp; Routing</h4>
                <p style="font-size: 0.84rem; color: #64748B; line-height: 1.5; margin: 0;">Our specialists assess your dates, preferences, and contracted airline or hotel rates.</p>
              </div>
            </div>

            <!-- Step 2 -->
            <div style="display: flex; gap: 0.85rem; align-items: flex-start;">
              <div style="width: 32px; height: 32px; flex-shrink: 0; background: var(--color-gold); color: #FFFFFF; font-weight: 700; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.85rem;">
                2
              </div>
              <div>
                <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--color-navy); margin-bottom: 0.35rem;">Bespoke Proposal</h4>
                <p style="font-size: 0.84rem; color: #64748B; line-height: 1.5; margin: 0;">We prepare tailored flight combinations, boutique stays, or expedition itineraries.</p>
              </div>
            </div>

            <!-- Step 3 -->
            <div style="display: flex; gap: 0.85rem; align-items: flex-start;">
              <div style="width: 32px; height: 32px; flex-shrink: 0; background: var(--color-navy); color: #FFFFFF; font-weight: 700; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.85rem;">
                3
              </div>
              <div>
                <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--color-navy); margin-bottom: 0.35rem;">Concierge Contact</h4>
                <p style="font-size: 0.84rem; color: #64748B; line-height: 1.5; margin: 0;">You receive personal direct contact via email or phone with your completed quote.</p>
              </div>
            </div>

          </div>
        </div>

        <!-- ACTION BUTTONS -->
        <div style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center; align-items: center; margin-bottom: 2rem;">
          <a href="{{ route('packages') }}" class="btn-primary" style="padding: 0.85rem 2rem; font-size: 0.92rem;">
            Explore Our Travel Packages
          </a>
          <a href="{{ route('home') }}" class="btn-primary" style="padding: 0.85rem 2rem; font-size: 0.92rem; background: transparent; color: var(--color-navy); border: 2px solid var(--color-navy); box-shadow: none;">
            Return to Home Page
          </a>
        </div>

        <!-- SUPPORT FOOTNOTE -->
        <div style="font-size: 0.85rem; color: #94A3B8; border-top: 1px solid #EEF2F6; padding-top: 1.5rem;">
          <span>Need immediate assistance? Reach our concierge desk directly at </span>
          <a href="mailto:hello@premiumglobalexp.com" style="color: var(--color-gold); font-weight: 600; text-decoration: underline;">
            hello@premiumglobalexp.com
          </a>
          <span> &bull; Toronto, ON, Canada</span>
        </div>

      </div>

    </div>
  </section>
@endsection
