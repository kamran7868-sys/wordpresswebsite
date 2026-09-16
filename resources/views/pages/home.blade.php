@extends('layouts.app')

@section('title', 'Luxury Canadian Travel Company | Premium Global Expeditions')
@section('meta_description', 'Bespoke journeys with Premium Global Expeditions, a luxury Canadian travel company curating custom holidays, cruises, flights, and 5-star stays.')

@section('content')
<!-- ==========================================================================
         SECTION 3: HERO SECTION (CINEMATIC CAROUSEL)
         Elementor Container: #hero-section | Dark Gradient Overlay
         ========================================================================== -->
    <section class="hero-section" id="hero-section">

      <!-- BACKGROUND SLIDER TRACK -->
      <div class="hero-slider-track">

        <!-- Slide 1: Tropical Island Luxury Retreat -->
        <div class="hero-slide active">
          <picture>
            <source srcset="{{ asset('assets/media/hero-tropical-island-expedition.jpg') }}" type="image/jpeg">
            <img src="{{ asset('assets/media/hero-tropical-island-expedition.jpg') }}"
              alt="Luxury infinity pool overlooking tropical island karst waters" class="hero-slide-bg" width="1920" height="1080" fetchpriority="high" decoding="sync">
          </picture>
        </div>

        <!-- Slide 2: Luxury Cruise Sunset Deck -->
        <div class="hero-slide">
          <picture>
            <source srcset="{{ asset('assets/media/hero-luxury-cruise-sunset.jpg') }}" type="image/jpeg">
            <img src="{{ asset('assets/media/hero-luxury-cruise-sunset.jpg') }}"
              alt="Luxury cruise ocean view deck at sunset" class="hero-slide-bg" width="1920" height="1080" loading="lazy" decoding="async">
          </picture>
        </div>

        <!-- Slide 3: Canadian Waterfront City Skyline Sunset -->
        <div class="hero-slide">
          <picture>
            <source srcset="{{ asset('assets/media/hero-toronto-skyline-sunset.jpg') }}" type="image/jpeg">
            <img src="{{ asset('assets/media/hero-toronto-skyline-sunset.jpg') }}"
              alt="Family enjoying sunset view of Canadian city skyline" class="hero-slide-bg" width="1920" height="1080" loading="lazy" decoding="async">
          </picture>
        </div>

        <!-- Slide 4: Sigiriya Mountain Panoramic View -->
        <div class="hero-slide">
          <picture>
            <source srcset="{{ asset('assets/media/hero-sigiriya-mountain-sunset.jpg') }}" type="image/jpeg">
            <img src="{{ asset('assets/media/hero-sigiriya-mountain-sunset.jpg') }}"
              alt="Panoramic Sigiriya mountain vista expedition view" class="hero-slide-bg" width="1920" height="1080" loading="lazy" decoding="async">
          </picture>
        </div>

      </div>

      <!-- PGE DARK NAVY OVERLAY GRADIENT -->
      <div class="hero-overlay"></div>

      <!-- HERO HERO CONTENT -->
      <div class="container hero-content-wrap">
        <h1 class="hero-main-title">PREMIUM GLOBAL EXPEDITIONS <span class="hero-subtext" style="display:block; font-size: 0.38em; font-family: var(--font-body); letter-spacing: 3px; margin-top: 0.75rem; text-transform: uppercase; color: var(--color-gold); font-weight: 500;">Luxury Canadian Travel Company</span></h1>
        <span class="hero-tagline-script">Where Dreams Become A Reality</span>
        <div class="hero-actions">
<a href="#cta-section" class="btn-primary">Plan Your Journey Today!</a>
        </div>
      </div>

      <!-- HERO CAROUSEL CONTROLS -->
      <div class="hero-controls">
        <button class="hero-nav-arrow" id="heroPrevBtn" aria-label="Previous Slide">
          <svg viewBox="0 0 24 24">
            <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z" />
          </svg>
        </button>

        <div class="hero-dots" id="heroDots">
          <button class="dot-btn active" aria-label="Go to slide 1"></button>
          <button class="dot-btn" aria-label="Go to slide 2"></button>
          <button class="dot-btn" aria-label="Go to slide 3"></button>
          <button class="dot-btn" aria-label="Go to slide 4"></button>
        </div>

        <button class="hero-nav-arrow" id="heroNextBtn" aria-label="Next Slide">
          <svg viewBox="0 0 24 24">
            <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z" />
          </svg>
        </button>
      </div>

    </section>

    <!-- ==========================================================================
         SECTION 4: INTRO SECTION
         Elementor Container: #intro-section | Background: Expedition Ivory (#F7F4ED)
         ========================================================================== -->
    <section class="intro-section" id="intro-section">
      <div class="container">
        <div class="intro-grid">

          <!-- LEFT COLUMN: BRAND STORY -->
          <div class="intro-content">
            <span class="section-tagline">Your Canadian Gateway to the World</span>
            <h2 class="section-title">Your Journey Begins Here</h2>
            <hr class="gold-rule">
            <p class="intro-paragraph">
              Premium Global Expeditions is a Canadian based global travel company creating exceptional journeys across
              the world. From bespoke holidays and international tours to flights, cruises and premium accommodations,
              we bring together global reach and trusted local expertise to make every journey seamless and memorable.
            </p>

            <div class="intro-pillars">
              <div class="pillar-card">
                <div class="pillar-icon">
                  <svg viewBox="0 0 24 24">
                    <path
                      d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" />
                  </svg>
                </div>
                <div class="pillar-content">
                  <h3 class="pillar-title">Premium</h3>
                  <p class="pillar-desc">Meticulously curated partners, accommodations and experiences, with nothing left to chance.</p>
                </div>
              </div>
              <div class="pillar-card">
                <div class="pillar-icon">
                  <svg viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <path
                      d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
                  </svg>
                </div>
                <div class="pillar-content">
                  <h3 class="pillar-title">Global</h3>
                  <p class="pillar-desc">Borderless reach through a trusted network of destination experts around the world.</p>
                </div>
              </div>
              <div class="pillar-card">
                <div class="pillar-icon">
                  <svg viewBox="0 0 24 24">
                    <polygon points="12 2 19 21 12 17 5 21 12 2" />
                  </svg>
                </div>
                <div class="pillar-content">
                  <h3 class="pillar-title">Expeditions</h3>
                  <p class="pillar-desc">Every journey planned as a real adventure, not just a checklist of stops.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- RIGHT COLUMN: SUPPORTING CINEMATIC IMAGE CARD -->
          <div class="intro-image-wrap">
            <picture>
            <source srcset="{{ asset('assets/media/cinematic-luxury-travel-founder.webp') }}" type="image/webp">
            <img src="{{ asset('assets/media/cinematic-luxury-travel-founder.jpg') }}"
              alt="Cinematic luxury travel founder and bespoke expedition planning" class="intro-main-img"
              width="1200" height="800" loading="lazy" decoding="async">
          </picture>
            <div class="intro-floating-card">
              <span class="floating-card-num">100%</span>
              <p class="floating-card-label">Tailored Canadian Expertise &amp; Worldwide Destination Management</p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- ==========================================================================
         SECTION 5: QUICK STATS STRIP
         Elementor Container: #stats-section | Background: Expedition Navy (#252E47)
         ========================================================================== -->
    <section class="stats-section" id="stats-section">
      <div class="container">
        <div class="stats-grid">

          <div class="stat-item">
            <div class="stat-number" data-target="150" data-count="150" data-suffix="+">0+</div>
            <div class="stat-label">DMC Partners</div>
          </div>

          <div class="stat-item">
            <div class="stat-number" data-target="85" data-count="85" data-suffix="+">0+</div>
            <div class="stat-label">Curated Destinations</div>
          </div>

          <div class="stat-item">
            <div class="stat-number" data-target="12500" data-count="12500" data-suffix="+" data-format="comma">0+</div>
            <div class="stat-label">Happy Travellers</div>
          </div>

        </div>
      </div>
    </section>

    <!-- ==========================================================================
         SECTION 6: TRAVEL CATEGORIES SECTION
         Elementor Container: #travel-categories | Background: Expedition Ivory (#F7F4ED)
         ========================================================================== -->
    <section class="categories-section" id="travel-categories">
      <div class="container">

        <div class="categories-header text-center" style="max-width: 750px; margin: 0 auto 3rem; text-align: center;">
          <span class="section-tagline">Curated Offerings</span>
          <h2 class="section-title">Explore Our Travel Categories</h2>
          <hr class="gold-rule center">
          <p class="section-lead" style="margin: 0 auto;">Select your preferred category to discover bespoke holiday
            packages, ocean &amp; river cruises, flight bookings, and luxury 5-star accommodations.</p>
        </div>

        <!-- MAIN CATEGORY TABS -->
        <div class="category-tabs-nav" role="tablist" style="justify-content: center;">
          <button class="tab-btn active" data-target="packages-panel" role="tab" type="button" aria-selected="true">All Inclusive Holiday Packages</button>
          <button class="tab-btn" data-target="cruises-panel" role="tab" type="button" aria-selected="false">Cruises</button>
          <button class="tab-btn" data-target="flights-panel" role="tab" type="button" aria-selected="false">Airline Ticketing</button>
          <button class="tab-btn" data-target="hotels-panel" role="tab" type="button" aria-selected="false">Hotels</button>
        </div>

        <!-- ================= PANEL A: HOLIDAY PACKAGES ================= -->
        <div class="category-panel active" id="packages-panel">

          <!-- Sub-group filter dropdown -->
          @php
            $holidayRegions = [
              'north-america' => 'North America — Canada',
              'south-asia' => 'South Asia — Sri Lanka, Nepal',
              'middle-east' => 'Middle East & North Africa — Egypt, Turkey',
              'southeast-asia' => 'Southeast Asia — Vietnam, Thailand',
              'europe' => 'Europe',
            ];
            foreach($holidayPackages as $p) {
              if (!empty($p->region)) {
                $rKey = strtolower($p->region);
                if (!isset($holidayRegions[$rKey])) {
                  $holidayRegions[$rKey] = ucwords(str_replace('-', ' ', $p->region));
                }
              }
            }
          @endphp
          <div class="subgroup-filter-nav" style="justify-content: center;">
            <label class="subgroup-filter-label" for="regionFilterSelect">Filter by Region:</label>
            <div class="select-dropdown-wrap">
              <select id="regionFilterSelect" class="subgroup-select-filter" aria-label="Filter packages by region">
                <option value="all">All Regions</option>
                @foreach($holidayRegions as $slug => $label)
                  <option value="{{ $slug }}">{{ $label }}</option>
                @endforeach
              </select>
              <svg class="select-arrow" viewBox="0 0 24 24">
                <path d="M7 10l5 5 5-5z" />
              </svg>
            </div>
          </div>

          <div class="cards-grid">
            @forelse($holidayPackages as $pkg)
              <article class="card-item" data-group="{{ strtolower($pkg->region ?: 'all') }}">
                <div class="card-img-wrap">
                  <img src="{{ $pkg->optimized_image }}"
                       alt="{{ $pkg->title }}" class="card-img" width="800" height="500" loading="lazy" decoding="async"
                       onerror="this.src='{{ asset('assets/media/ancient-egypt-pyramids-giza.jpg') }}'">
                  <span class="card-tag">{{ $pkg->country ?: 'Holiday' }}</span>
                </div>
                <div class="card-body">
                  <h3 class="card-title">{{ $pkg->title }}</h3>
                  <p class="card-text">{{ Str::limit($pkg->short_description ?: $pkg->overview, 130) }}</p>
                  <div class="card-footer">
                    <span class="card-footer-info">{{ $pkg->duration ?: ($pkg->duration_days . ' Days / ' . ($pkg->duration_nights ?? max(0, $pkg->duration_days - 1)) . ' Nights') }}</span>
                    <a href="{{ route('package.show', $pkg->slug) }}" class="card-btn-action" aria-label="Explore {{ $pkg->title }}">Explore Package</a>
                  </div>
                </div>
              </article>
            @empty
              <div style="grid-column: 1 / -1; text-align: center; padding: 3.5rem 1rem; background: #ffffff; border-radius: 8px; border: 1px dashed rgba(182, 153, 100, 0.4);">
                <h3 style="font-family: var(--font-display); font-size: 1.8rem; color: var(--color-navy); margin-bottom: 0.5rem;">No Holiday Packages Currently Listed</h3>
                <p style="color: #64748B; font-size: 0.95rem; margin-bottom: 1.5rem;">Our Canadian travel concierges are curating new bespoke holiday expeditions.</p>
                <a href="{{ route('contact') }}" class="btn-primary" style="display: inline-block;">Request Bespoke Itinerary</a>
              </div>
            @endforelse
          </div>
        </div>

        <!-- ================= PANEL B: CRUISES ================= -->
        <div class="category-panel" id="cruises-panel">

          <!-- Cruise filter dropdown -->
          @php
            $cruiseRegions = [
              'north-america' => 'North America — Alaskan Cruise',
              'middle-east' => 'Middle East — Nile River Cruise',
              'southeast-asia' => 'Southeast Asia — Singapore & Spice Route',
              'oceania' => 'Oceania — Australian Great Barrier Reef',
              'europe' => 'Europe',
            ];
            foreach($cruisePackages as $p) {
              if (!empty($p->region)) {
                $rKey = strtolower($p->region);
                if (!isset($cruiseRegions[$rKey])) {
                  $cruiseRegions[$rKey] = ucwords(str_replace('-', ' ', $p->region));
                }
              }
            }
          @endphp
          <div class="subgroup-filter-nav" style="justify-content: center;">
            <label class="subgroup-filter-label" for="cruiseFilterSelect">Cruise Region:</label>
            <div class="select-dropdown-wrap">
              <select id="cruiseFilterSelect" class="subgroup-select-filter" aria-label="Filter cruises by region">
                <option value="all">All Voyages</option>
                @foreach($cruiseRegions as $slug => $label)
                  <option value="{{ $slug }}">{{ $label }}</option>
                @endforeach
              </select>
              <svg class="select-arrow" viewBox="0 0 24 24">
                <path d="M7 10l5 5 5-5z" />
              </svg>
            </div>
          </div>

          <div class="cards-grid">
            @forelse($cruisePackages as $pkg)
              <article class="card-item" data-group="{{ strtolower(trim(($pkg->region ?: '') . ' ' . Str::slug($pkg->country ?: '') . ' ' . Str::slug($pkg->title ?: ''))) }}">
                <a href="{{ route('package.show', $pkg->slug) }}" class="card-img-wrap card-img-link" aria-label="View {{ $pkg->title }}">
                  <img src="{{ $pkg->optimized_image }}"
                       alt="{{ $pkg->title }}" class="card-img" width="800" height="500" loading="lazy" decoding="async"
                       onerror="this.src='{{ asset('assets/media/alaskan-cruise-liner-fjords.jpg') }}'">
                  <span class="card-tag">{{ $pkg->country ?: 'Cruise' }}</span>
                </a>
                <div class="card-body">
                  <h3 class="card-title"><a href="{{ route('package.show', $pkg->slug) }}">{{ $pkg->title }}</a></h3>
                  <p class="card-text">{{ Str::limit($pkg->short_description ?: $pkg->overview, 130) }}</p>
                  <div class="card-footer">
                    <span class="card-footer-info">{{ $pkg->duration ?: ($pkg->duration_days . ' Days Ocean Voyage') }}</span>
                    <a href="{{ route('package.show', $pkg->slug) }}" class="card-btn-action" aria-label="View {{ $pkg->title }} voyage">View Voyage</a>
                  </div>
                </div>
              </article>
            @empty
              <div style="grid-column: 1 / -1; text-align: center; padding: 3.5rem 1rem; background: #ffffff; border-radius: 8px; border: 1px dashed rgba(182, 153, 100, 0.4);">
                <h3 style="font-family: var(--font-display); font-size: 1.8rem; color: var(--color-navy); margin-bottom: 0.5rem;">No Ocean or River Cruises Currently Listed</h3>
                <p style="color: #64748B; font-size: 0.95rem; margin-bottom: 1.5rem;">Contact our luxury maritime specialists to arrange bespoke private charters or cruise departures.</p>
                <a href="{{ route('contact') }}" class="btn-primary" style="display: inline-block;">Request Cruise Inquiry</a>
              </div>
            @endforelse
          </div>
        </div>

        <!-- ================= PANEL C: AIRLINE TICKETING ================= -->
        <div class="category-panel" id="flights-panel">
          <div class="flight-inquiry-container">

            <div class="flight-info-side">
              <span class="section-tagline" style="color: var(--color-gold);">Tailored Flight Concierge</span>
              <h3
                style="font-family: var(--font-display); font-size: 2.2rem; font-weight: 600; margin-bottom: 1rem; color: var(--color-ivory);">
                Airline Ticketing &amp; Bespoke Routing</h3>
              <p style="font-size: 0.95rem; line-height: 1.7; color: rgba(247,244,237,0.85); margin-bottom: 2rem;">
                Our Canadian flight specialists secure preferred international rates, multi-city itineraries, business
                class upgrades, and seamless global connections across major world carriers.
              </p>
              <div
                style="font-size: 0.85rem; color: var(--color-gold); display: flex; flex-direction: column; gap: 0.75rem;">
                <div>✓ 24/7 Travel Support</div>
                <div>✓ Flexible Fare Rules &amp; Special Group Fares</div>
              </div>
            </div>

            <!-- AIRLINE TICKETING INQUIRY FORM -->
            <div class="flight-form-side">
              <h4
                style="font-family: var(--font-display); font-size: 1.6rem; color: var(--color-navy); margin-bottom: 1.5rem;">
                Airline Ticketing Inquiry</h4>

              <form id="inquiryForm" class="inquiry-form-wrap">
                @csrf

                <div class="row">
                  <div>
                    <label>Full Name <span class="req">*</span></label>
                    <input type="text" name="full_name" placeholder="e.g. Eleanor Vance" required />
                  </div>
                  <div>
                    <label>Email Address <span class="req">*</span></label>
                    <input type="email" name="email" placeholder="eleanor@example.com" required />
                  </div>
                </div>

                <div class="row">
                  <div>
                    <label>Phone / WhatsApp <span class="req">*</span></label>
                    <input type="tel" name="phone" placeholder="+1 (555) 000-0000" required />
                  </div>
                  <div>
                    <label>Trip Type <span class="req">*</span></label>
                    <select id="tripType" name="trip_type" required>
                      <option value="oneway">One-Way</option>
                      <option value="roundtrip" selected>Round Trip</option>
                      <option value="multicity">Multi-City / Bespoke Route</option>
                    </select>
                  </div>
                </div>

                <!-- Simple route fields: shown for One-Way / Round Trip -->
                <div id="simpleRoute" class="row">
                  <div class="airport-autocomplete-wrap">
                    <label>Departure City / Airport <span class="req">*</span></label>
                    <input type="text" class="airport-input" name="dep_city" placeholder="e.g. YVR - Vancouver or Toronto" autocomplete="off" />
                    <div class="airport-dropdown-results"></div>
                  </div>
                  <div class="airport-autocomplete-wrap">
                    <label>Destination City / Airport <span class="req">*</span></label>
                    <input type="text" class="airport-input" name="dest_city" placeholder="e.g. CMB - Colombo or Cairo" autocomplete="off" />
                    <div class="airport-dropdown-results"></div>
                  </div>
                </div>

                <div id="simpleDates" class="row">
                  <div>
                    <label>Departure Date <span class="req">*</span></label>
                    <input type="date" name="dep_date" />
                  </div>
                  <div id="returnDateWrap">
                    <label>Return Date</label>
                    <input type="date" name="return_date" />
                  </div>
                </div>

                <!-- Multi-city legs: shown for Multi-City / Bespoke Route -->
                <div id="legsBlock" class="legs" style="display:none;">
                  <div class="legs-heading">
                    <span class="title">Flights</span>
                    <span class="hint">Add every leg of the trip, in order</span>
                  </div>
                  <div id="legsList"></div>
                  <button type="button" class="add-leg" id="addLegBtn">
                    <svg viewBox="0 0 15 15" fill="none"><path d="M7.5 1V14M1 7.5H14" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                    Add another flight
                  </button>
                </div>

                <div class="row">
                  <div>
                    <label>Travellers <span class="req">*</span></label>
                    <select id="travellerType" name="traveller_type" required>
                      <option value="1adult">1 Adult</option>
                      <option value="2adults">2 Adults</option>
                      <option value="group">3 or more (specify below)</option>
                    </select>
                  </div>
                  <div>
                    <label>Cabin Class <span class="req">*</span></label>
                    <select name="cabin_class" required>
                      <option>Economy Class</option>
                      <option>Premium Economy</option>
                      <option>Business Class</option>
                      <option>First Class</option>
                    </select>
                  </div>
                </div>

                <div id="travellerCounts" class="legs" style="display:none;">
                  <div class="legs-heading">
                    <span class="title">Traveller Details</span>
                    <span class="hint">Adults 12+, Children 2–11, Infants under 2</span>
                  </div>
                  <div class="counts-row">
                    <div>
                      <label>Adults <span class="req">*</span></label>
                      <input type="number" id="countAdults" name="count_adults" min="1" value="3" />
                    </div>
                    <div>
                      <label>Children</label>
                      <input type="number" id="countChildren" name="count_children" min="0" value="0" />
                    </div>
                    <div>
                      <label>Infants</label>
                      <input type="number" id="countInfants" name="count_infants" min="0" value="0" />
                    </div>
                  </div>
                </div>

                <div>
                  <label>Preferred Airline <span class="opt">(Optional)</span></label>
                  <input type="text" name="preferred_airline" placeholder="e.g. Air Canada, Emirates, Qatar Airways" />
                </div>

                <div class="checkbox-row">
                  <input type="checkbox" id="flexDates" name="flex_dates" checked />
                  <label for="flexDates">My travel dates are flexible (+/- 3 days for best fares)</label>
                </div>

                <div>
                  <label>Special Requests / Preferences</label>
                  <textarea rows="3" name="special_requests" placeholder="Mention seat preferences, meal options, or stopover requests..."></textarea>
                </div>

                <button type="submit" class="submit">Submit Inquiry</button>
              </form>
            </div>

          </div>
        </div>

        <!-- ================= PANEL D: HOTELS ================= -->
        <div class="category-panel" id="hotels-panel">

          <!-- Hotel filter dropdown -->
          @php
            $hotelCountries = [
              'all' => 'All Luxury Properties',
              'canada' => 'Canada',
              'sri-lanka' => 'Sri Lanka',
              'egypt' => 'Egypt',
              'vietnam' => 'Vietnam',
              'nepal' => 'Nepal',
              'turkey' => 'Turkey',
              'thailand' => 'Thailand',
            ];
            foreach($hotelPackages as $p) {
              if (!empty($p->country)) {
                $cSlug = strtolower(Str::slug($p->country));
                if (!isset($hotelCountries[$cSlug])) {
                  $hotelCountries[$cSlug] = $p->country;
                }
              }
            }
          @endphp
          <div class="subgroup-filter-nav" style="justify-content: center;">
            <label class="subgroup-filter-label" for="hotelFilterSelect">Hotel Destinations:</label>
            <div class="select-dropdown-wrap">
              <select id="hotelFilterSelect" class="subgroup-select-filter" aria-label="Filter hotels by destination">
                @foreach($hotelCountries as $slug => $label)
                  <option value="{{ $slug }}">{{ $label }}</option>
                @endforeach
              </select>
              <svg class="select-arrow" viewBox="0 0 24 24">
                <path d="M7 10l5 5 5-5z" />
              </svg>
            </div>
          </div>

          <div class="cards-grid">
            @forelse($hotelPackages as $pkg)
              <article class="card-item" data-group="{{ strtolower(trim(Str::slug($pkg->country ?: '') . ' ' . ($pkg->region ?: '') . ' ' . Str::slug($pkg->title ?: '')) ?: 'all') }}">
                <a href="{{ route('stay-detail', $pkg->slug) }}" class="card-img-wrap card-img-link" aria-label="Reserve {{ $pkg->title }}">
                  <img src="{{ $pkg->optimized_image }}"
                       alt="{{ $pkg->title }}" class="card-img" width="800" height="500" loading="lazy" decoding="async"
                       onerror="this.src='{{ asset('assets/media/fairmont-banff-springs-hotel.jpg') }}'">
                  <span class="card-tag">{{ $pkg->country ?: 'Hotel' }}</span>
                </a>
                <div class="card-body">
                  <h3 class="card-title"><a href="{{ route('stay-detail', $pkg->slug) }}">{{ $pkg->title }}</a></h3>
                  <p class="card-text">{{ Str::limit($pkg->short_description ?: $pkg->overview, 130) }}</p>
                  <div class="card-footer">
                    <span class="card-footer-info">{{ $pkg->duration ?: '5-Star Luxury Resort' }}</span>
                    <a href="{{ route('stay-detail', $pkg->slug) }}" class="card-btn-action" aria-label="Reserve stay at {{ $pkg->title }}">Reserve Stay</a>
                  </div>
                </div>
              </article>
            @empty
              <div style="grid-column: 1 / -1; text-align: center; padding: 3.5rem 1rem; background: #ffffff; border-radius: 8px; border: 1px dashed rgba(182, 153, 100, 0.4);">
                <h3 style="font-family: var(--font-display); font-size: 1.8rem; color: var(--color-navy); margin-bottom: 0.5rem;">No Luxury Stays Currently Listed</h3>
                <p style="color: #64748B; font-size: 0.95rem; margin-bottom: 1.5rem;">Contact our private hospitality team to reserve exclusive luxury suites and estate villas.</p>
                <a href="{{ route('contact') }}" class="btn-primary" style="display: inline-block;">Request Hotel Reservation</a>
              </div>
            @endforelse
          </div>
        </div>

      </div>
    </section>

    <!-- ==========================================================================
         SECTION 7: CALL-TO-ACTION SECTION
         Elementor Container: #cta-section | Background: Expedition Navy (#252E47)
         ========================================================================== -->
    <section class="cta-section" id="cta-section">
      <div class="container">
        <div class="cta-box">
          <span class="section-tagline" style="color: var(--color-gold);">Start Planning Today</span>
          <h2 class="cta-title">Let's Plan Your Next Journey</h2>
          <hr class="gold-rule center">
          <p class="cta-desc">
            From flights and cruises to bespoke holidays and unforgettable experiences, our team is here to make your
            travel plans seamless. Get in touch with Premium Global Expeditions and let us bring your travel aspirations
            to life.
          </p>
          <a href="{{ route('contact') }}" class="btn-primary" id="getInTouchBtn">Get In Touch!</a>
        </div>
      </div>
    </section>
@endsection

@push('schema')
@php
$homeItemList = [];
$pos = 1;

$allFeatured = collect()
    ->merge($holidayPackages ?? [])
    ->merge($cruisePackages ?? [])
    ->merge($hotelPackages ?? [])
    ->take(10);

foreach ($allFeatured as $item) {
    if ($item->category === 'hotel') {
        $itemUrl = route('stay-detail', ['slug' => $item->slug]);
    } elseif ($item->category === 'cruise') {
        $itemUrl = route('voyage-detail', ['slug' => $item->slug]);
    } else {
        $itemUrl = route('explore-packages', ['slug' => $item->slug]);
    }

    $img = $item->featured_image ? (str_starts_with($item->featured_image, 'http') ? $item->featured_image : asset($item->featured_image)) : asset('assets/pge-logo-full-light.svg');

    $homeItemList[] = [
        '@type' => 'ListItem',
        'position' => $pos++,
        'item' => [
            '@type' => 'TouristTrip',
            'name' => $item->title,
            'description' => $item->overview ?: $item->tagline,
            'url' => $itemUrl,
            'image' => $img,
            'offers' => [
                '@type' => 'Offer',
                'price' => (float) $item->price_from,
                'priceCurrency' => $item->currency ?: 'CAD',
                'availability' => 'https://schema.org/InStock',
            ],
            'provider' => [
                '@id' => url('/') . '/#organization',
            ],
        ],
    ];
}

$itemListSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'ItemList',
    'name' => 'Featured Luxury Travel Packages & Expeditions',
    'itemListElement' => $homeItemList,
];

$faqSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        [
            '@type' => 'Question',
            'name' => 'What luxury travel services does Premium Global Expeditions offer?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Premium Global Expeditions is a registered Canadian tour operator offering bespoke international holiday packages, luxury ocean and river cruises, first/business class airline ticketing, curated 5-star hotel retreats, and customized private itineraries worldwide.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'How do I book or customize a luxury vacation package?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'You can browse our curated holiday, cruise, and stay collections on our website, or contact our Canadian travel concierges via our online inquiry form or email at hello@premiumglobalexp.com for tailored custom itineraries.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Can flights and luxury hotel accommodations be booked together?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Yes, our airline ticketing concierge works directly with international carriers to provide seamless flight bookings bundled with private transfers, luxury stays, and private tours.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'How can Destination Management Companies (DMCs) partner with PGE?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Licensed and reputable local destination management operators can apply through our DMC Registration portal on premiumglobalexp.com to partner with our Canadian global distribution network.',
            ],
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($itemListSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
<script type="application/ld+json">
{!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
@endpush
