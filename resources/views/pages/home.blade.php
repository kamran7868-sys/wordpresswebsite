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

        <!-- Slide 1: Canadian Rockies -->
        <div class="hero-slide active">
          <picture>
            <source srcset="{{ asset('assets/media/canadian-rockies-banff-lake-hero.webp') }}" type="image/webp">
            <img src="{{ asset('assets/media/canadian-rockies-banff-lake-hero.jpg') }}"
              alt="Majestic Canadian Rockies and Banff Emerald Lake panoramic view" class="hero-slide-bg" width="1920" height="1080" fetchpriority="high" decoding="sync">
          </picture>
        </div>

        <!-- Slide 2: Nile River Cruise, Egypt -->
        <div class="hero-slide">
          <picture>
            <source srcset="{{ asset('assets/media/ancient-egypt-nile-sunset-hero.webp') }}" type="image/webp">
            <img src="{{ asset('assets/media/ancient-egypt-nile-sunset-hero.jpg') }}"
              alt="Ancient Egyptian Nile luxury expedition sunset view" class="hero-slide-bg" width="1920" height="1080" loading="lazy" decoding="async">
          </picture>
        </div>

        <!-- Slide 3: Sri Lanka & Southeast Asia Coastal Retreat -->
        <div class="hero-slide">
          <picture>
            <source srcset="{{ asset('assets/media/tropical-coastal-sanctuary-hero.webp') }}" type="image/webp">
            <img src="{{ asset('assets/media/tropical-coastal-sanctuary-hero.jpg') }}"
              alt="Pristine tropical coastal sanctuary with turquoise waters" class="hero-slide-bg" width="1920" height="1080" loading="lazy" decoding="async">
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
          <div class="subgroup-filter-nav" style="justify-content: center;">
            <label class="subgroup-filter-label" for="regionFilterSelect">Filter by Region:</label>
            <div class="select-dropdown-wrap">
              <select id="regionFilterSelect" class="subgroup-select-filter" aria-label="Filter packages by region">
                <option value="all">All Regions</option>
                <option value="north-america">North America — Canada</option>
                <option value="south-asia">South Asia — Sri Lanka, Nepal</option>
                <option value="middle-east">Middle East &amp; North Africa — Egypt, Turkey</option>
                <option value="southeast-asia">Southeast Asia — Vietnam, Thailand</option>
              </select>
              <svg class="select-arrow" viewBox="0 0 24 24">
                <path d="M7 10l5 5 5-5z" />
              </svg>
            </div>
          </div>

          <div class="cards-grid">

            <!-- Canada -->
            <article class="card-item" data-group="north-america">
              <div class="card-img-wrap">
                <picture><source srcset="{{ asset('assets/media/rocky-mountaineer-luxury-express.webp') }}" type="image/webp"><img src="{{ asset('assets/media/rocky-mountaineer-luxury-express.jpg') }}" alt="Rocky Mountaineer GoldLeaf luxury train traversing Canadian Rockies" class="card-img" width="800" height="600" loading="lazy" decoding="async"></picture>
                <span class="card-tag">Canada</span>
              </div>
              <div class="card-body">
                <h3 class="card-title">Rocky Mountaineer Luxury Express</h3>
                <p class="card-text">Experience the majestic Canadian Rockies in glass-domed luxury carriages from
                  Vancouver to Banff.</p>
                <div class="card-footer">
                  <span class="card-footer-info">8 Days / 7 Nights</span>
                  <a href="{{ route('explore-packages') }}" class="card-btn-action">Explore Package</a>
                </div>
              </div>
            </article>

            <!-- Egypt -->
            <article class="card-item" data-group="middle-east">
              <div class="card-img-wrap">
                <picture><source srcset="{{ asset('assets/media/ancient-egypt-pyramids-giza.webp') }}" type="image/webp"><img src="{{ asset('assets/media/ancient-egypt-pyramids-giza.jpg') }}" alt="Ancient Giza Pyramids and Sphinx guided expedition in Egypt" class="card-img" width="800" height="600" loading="lazy" decoding="async"></picture>
                <span class="card-tag">Egypt</span>
              </div>
              <div class="card-body">
                <h3 class="card-title">Pharaohs &amp; Pyramids Odyssey</h3>
                <p class="card-text">Private guided exploration of Cairo Pyramids, Luxor temples, and Red Sea luxury
                  beach sanctuary.</p>
                <div class="card-footer">
                  <span class="card-footer-info">10 Days / 9 Nights</span>
                  <a href="{{ route('explore-packages') }}" class="card-btn-action">Explore Package</a>
                </div>
              </div>
            </article>

            <!-- Thailand -->
            <article class="card-item" data-group="southeast-asia">
              <div class="card-img-wrap">
                <picture><source srcset="{{ asset('assets/media/thailand-islands-phuket-retreat.webp') }}" type="image/webp"><img src="{{ asset('assets/media/thailand-islands-phuket-retreat.jpg') }}" alt="Tropical island hopping and private luxury pool villas in Thailand" class="card-img" width="800" height="600" loading="lazy" decoding="async"></picture>
                <span class="card-tag">Thailand</span>
              </div>
              <div class="card-body">
                <h3 class="card-title">Island Hopping &amp; Villa Escape</h3>
                <p class="card-text">Bespoke private luxury retreat across Phuket, Koh Samui, and Chiang Mai elephant
                  sanctuaries.</p>
                <div class="card-footer">
                  <span class="card-footer-info">12 Days / 11 Nights</span>
                  <a href="{{ route('explore-packages') }}" class="card-btn-action">Explore Package</a>
                </div>
              </div>
            </article>

            <!-- Sri Lanka -->
            <article class="card-item" data-group="south-asia">
              <div class="card-img-wrap">
                <picture><source srcset="{{ asset('assets/media/sri-lanka-sigiriya-heritage.webp') }}" type="image/webp"><img src="{{ asset('assets/media/sri-lanka-sigiriya-heritage.jpg') }}" alt="Sigiriya UNESCO Rock Fortress and Ceylon tea estates in Sri Lanka" class="card-img" width="800" height="600" loading="lazy" decoding="async"></picture>
                <span class="card-tag">Sri Lanka</span>
              </div>
              <div class="card-body">
                <h3 class="card-title">Pearl of the Indian Ocean</h3>
                <p class="card-text">Cultural triangle of Sigiriya, tea plantation estates in Nuwara Eliya, and southern
                  coastal safaris.</p>
                <div class="card-footer">
                  <span class="card-footer-info">9 Days / 8 Nights</span>
                  <a href="{{ route('explore-packages') }}" class="card-btn-action">Explore Package</a>
                </div>
              </div>
            </article>

            <!-- Turkey -->
            <article class="card-item" data-group="middle-east">
              <div class="card-img-wrap">
                <picture><source srcset="{{ asset('assets/media/cappadocia-hot-air-balloon-turkey.webp') }}" type="image/webp"><img src="{{ asset('assets/media/cappadocia-hot-air-balloon-turkey.jpg') }}" alt="Hot air balloons flying over Cappadocia fairy chimneys in Turkey" class="card-img" width="800" height="600" loading="lazy" decoding="async"></picture>
                <span class="card-tag">Turkey</span>
              </div>
              <div class="card-body">
                <h3 class="card-title">Grand Ottoman &amp; Cappadocia Ballooning</h3>
                <p class="card-text">Istanbul Bosphorus cruises, ancient Ephesus ruins, and magical hot air balloon
                  rides over cave suites.</p>
                <div class="card-footer">
                  <span class="card-footer-info">11 Days / 10 Nights</span>
                  <a href="{{ route('explore-packages') }}" class="card-btn-action">Explore Package</a>
                </div>
              </div>
            </article>

            <!-- Vietnam -->
            <article class="card-item" data-group="southeast-asia">
              <div class="card-img-wrap">
                <picture><source srcset="{{ asset('assets/media/ha-long-bay-karsts-vietnam.webp') }}" type="image/webp"><img src="{{ asset('assets/media/ha-long-bay-karsts-vietnam.jpg') }}" alt="Private luxury junk boat cruising through Ha Long Bay emerald pillars" class="card-img" width="800" height="600" loading="lazy" decoding="async"></picture>
                <span class="card-tag">Vietnam</span>
              </div>
              <div class="card-body">
                <h3 class="card-title">Ha Long Bay &amp; Imperial Heritage</h3>
                <p class="card-text">Private junk boat cruising through emerald limestone pillars, Hoi An lantern town,
                  and Hanoi culture.</p>
                <div class="card-footer">
                  <span class="card-footer-info">10 Days / 9 Nights</span>
                  <a href="{{ route('explore-packages') }}" class="card-btn-action">Explore Package</a>
                </div>
              </div>
            </article>

          </div>
        </div>

        <!-- ================= PANEL B: CRUISES ================= -->
        <div class="category-panel" id="cruises-panel">

          <!-- Cruise filter dropdown -->
          <div class="subgroup-filter-nav" style="justify-content: center;">
            <label class="subgroup-filter-label" for="cruiseFilterSelect">Cruise Region:</label>
            <div class="select-dropdown-wrap">
              <select id="cruiseFilterSelect" class="subgroup-select-filter" aria-label="Filter cruises by region">
                <option value="all">All Voyages</option>
                <option value="alaska">Alaskan Cruise</option>
                <option value="singapore">Singaporean Cruise</option>
                <option value="nile">Nile Cruise</option>
                <option value="australia">Australian Cruise</option>
              </select>
              <svg class="select-arrow" viewBox="0 0 24 24">
                <path d="M7 10l5 5 5-5z" />
              </svg>
            </div>
          </div>

          <div class="cards-grid">

            <!-- Alaskan Cruise -->
            <article class="card-item" data-group="alaska">
              <a href="{{ route('voyage-detail') }}" class="card-img-wrap card-img-link" aria-label="View Inside Passage Glacier Voyage">
                <picture><source srcset="{{ asset('assets/media/alaskan-cruise-liner-fjords.webp') }}" type="image/webp"><img src="{{ asset('assets/media/alaskan-cruise-liner-fjords.jpg') }}" alt="Luxury ocean cruise liner navigating pristine Alaskan glacier fjords" class="card-img" width="1000" height="650" loading="lazy" decoding="async"></picture>
                <span class="card-tag">Alaskan Cruise</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('voyage-detail') }}">Inside Passage Glacier Voyage</a></h3>
                <p class="card-text">Sail through pristine fjords, calving glaciers, and whale sanctuaries aboard 5-star
                  luxury liners.</p>
                <div class="card-footer">
                  <span class="card-footer-info">7 Nights Ocean Voyage</span>
                  <a href="{{ route('voyage-detail') }}" class="card-btn-action">View Voyage</a>
                </div>
              </div>
            </article>

            <!-- Singaporean Cruise -->
            <article class="card-item" data-group="singapore">
              <a href="{{ route('voyage-detail') }}" class="card-img-wrap card-img-link" aria-label="View Southeast Asian Spice Route Expedition">
                <picture><source srcset="{{ asset('assets/media/singapore-spice-route-cruise.webp') }}" type="image/webp"><img src="{{ asset('assets/media/singapore-spice-route-cruise.jpg') }}" alt="Southeast Asian spice route luxury cruise departing Singapore" class="card-img" width="1000" height="650" loading="lazy" decoding="async"></picture>
                <span class="card-tag">Singaporean Cruise</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('voyage-detail') }}">Southeast Asian Spice Route Expedition</a></h3>
                <p class="card-text">Embark from Singapore to Phuket, Penang, and Langkawi with Michelin-starred dining
                  on board.</p>
                <div class="card-footer">
                  <span class="card-footer-info">6 Nights Spice Route</span>
                  <a href="{{ route('voyage-detail') }}" class="card-btn-action">View Voyage</a>
                </div>
              </div>
            </article>

            <!-- Nile Cruise -->
            <article class="card-item" data-group="nile">
              <a href="{{ route('voyage-detail') }}" class="card-img-wrap card-img-link" aria-label="View Pharaohs River Expedition on the Nile">
                <picture><source srcset="{{ asset('assets/media/nile-river-sunset-cruise.webp') }}" type="image/webp"><img src="{{ asset('assets/media/nile-river-sunset-cruise.jpg') }}" alt="Nile river sunset expedition cruise with traditional sails in Egypt" class="card-img" width="1000" height="650" loading="lazy" decoding="async"></picture>
                <span class="card-tag">Nile Cruise</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('voyage-detail') }}">Pharaohs River Expedition on the Nile</a></h3>
                <p class="card-text">Glide from Luxor to Aswan stopping at Kom Ombo and Edfu temples with Egyptologist
                  guides.</p>
                <div class="card-footer">
                  <span class="card-footer-info">5 Nights River Cruise</span>
                  <a href="{{ route('voyage-detail') }}" class="card-btn-action">View Voyage</a>
                </div>
              </div>
            </article>

            <!-- Australian Cruise -->
            <article class="card-item" data-group="australia">
              <a href="{{ route('voyage-detail') }}" class="card-img-wrap card-img-link" aria-label="View Great Barrier Reef & Southern Ocean Voyage">
                <picture><source srcset="{{ asset('assets/media/australian-barrier-reef-cruise.webp') }}" type="image/webp"><img src="{{ asset('assets/media/australian-barrier-reef-cruise.jpg') }}" alt="Australian Great Barrier Reef ocean expedition cruise ship" class="card-img" width="1000" height="650" loading="lazy" decoding="async"></picture>
                <span class="card-tag">Australian Cruise</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('voyage-detail') }}">Great Barrier Reef &amp; Southern Ocean Voyage</a></h3>
                <p class="card-text">Sydney Harbour departures visiting Whitsunday Islands, Tasmania fjords, and coral
                  reefs.</p>
                <div class="card-footer">
                  <span class="card-footer-info">10 Nights Barrier Reef</span>
                  <a href="{{ route('voyage-detail') }}" class="card-btn-action">View Voyage</a>
                </div>
              </div>
            </article>

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
                <div>✓ Direct IATA &amp; Global Airline Contracting</div>
                <div>✓ 24/7 Canadian Travel Support &amp; Flight Re-routing</div>
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
                      <option value="roundtrip">Round Trip</option>
                      <option value="multicity" selected>Multi-City / Bespoke Route</option>
                    </select>
                  </div>
                </div>

                <!-- Simple route fields: shown for One-Way / Round Trip -->
                <div id="simpleRoute" class="row" style="display:none;">
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

                <div id="simpleDates" class="row" style="display:none;">
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
                <div id="legsBlock" class="legs">
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
          <div class="subgroup-filter-nav" style="justify-content: center;">
            <label class="subgroup-filter-label" for="hotelFilterSelect">Hotel Destinations:</label>
            <div class="select-dropdown-wrap">
              <select id="hotelFilterSelect" class="subgroup-select-filter" aria-label="Filter hotels by destination">
                <option value="all">All Luxury Properties</option>
                <option value="canada">Canada</option>
                <option value="sri-lanka">Sri Lanka</option>
                <option value="egypt">Egypt</option>
                <option value="vietnam">Vietnam</option>
                <option value="nepal">Nepal</option>
                <option value="turkey">Turkey</option>
                <option value="thailand">Thailand</option>
              </select>
              <svg class="select-arrow" viewBox="0 0 24 24">
                <path d="M7 10l5 5 5-5z" />
              </svg>
            </div>
          </div>

          <div class="cards-grid">

            <!-- Canada -->
            <article class="card-item" data-group="canada">
              <a href="{{ route('stay-detail') }}" class="card-img-wrap card-img-link" aria-label="Reserve Fairmont Banff Springs & Chateau Lake Louise">
                <picture><source srcset="{{ asset('assets/media/fairmont-banff-springs-hotel.webp') }}" type="image/webp"><img src="{{ asset('assets/media/fairmont-banff-springs-hotel.jpg') }}" alt="Historic Fairmont Banff Springs luxury castle resort in Canadian Rockies" class="card-img" width="800" height="600" loading="lazy" decoding="async"></picture>
                <span class="card-tag">Canada</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('stay-detail') }}">Fairmont Banff Springs &amp; Chateau Lake Louise</a></h3>
                <p class="card-text">Historic castle sanctuary offering world-class spa, fine dining, and panoramic
                  alpine views.</p>
                <div class="card-footer">
                  <span class="card-footer-info">5-Star Luxury Resort</span>
                  <a href="{{ route('stay-detail') }}" class="card-btn-action">Reserve Stay</a>
                </div>
              </div>
            </article>

            <!-- Sri Lanka -->
            <article class="card-item" data-group="sri-lanka">
              <a href="{{ route('stay-detail') }}" class="card-img-wrap card-img-link" aria-label="Reserve Amangalla Historic Fortress Estate">
                <picture><source srcset="{{ asset('assets/media/amangalla-fortress-resort-sri-lanka.webp') }}" type="image/webp"><img src="{{ asset('assets/media/amangalla-fortress-resort-sri-lanka.jpg') }}" alt="Amangalla historic Dutch fortress luxury heritage estate in Galle Sri Lanka" class="card-img" width="800" height="600" loading="lazy" decoding="async"></picture>
                <span class="card-tag">Sri Lanka</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('stay-detail') }}">Amangalla Historic Fortress Estate</a></h3>
                <p class="card-text">Restored 17th-century Dutch colonial sanctuary within UNESCO Galle Fort with private butler service.</p>
                <div class="card-footer">
                  <span class="card-footer-info">Boutique Heritage Estate</span>
                  <a href="{{ route('stay-detail') }}" class="card-btn-action">Reserve Stay</a>
                </div>
              </div>
            </article>

            <!-- Egypt -->
            <article class="card-item" data-group="egypt">
              <a href="{{ route('stay-detail') }}" class="card-img-wrap card-img-link" aria-label="Reserve Four Seasons Cairo at First Residence">
                <picture><source srcset="{{ asset('assets/media/four-seasons-cairo-nile-hotel.webp') }}" type="image/webp"><img src="{{ asset('assets/media/four-seasons-cairo-nile-hotel.jpg') }}" alt="Four Seasons Cairo at First Residence 5-star Nile view luxury hotel" class="card-img" width="800" height="600" loading="lazy" decoding="async"></picture>
                <span class="card-tag">Egypt</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('stay-detail') }}">Four Seasons Cairo at First Residence</a></h3>
                <p class="card-text">Bespoke Nile-front hotel featuring private balcony views of the Pyramids and
                  ancient Cairo skyline.</p>
                <div class="card-footer">
                  <span class="card-footer-info">5-Star Premier Suite</span>
                  <a href="{{ route('stay-detail') }}" class="card-btn-action">Reserve Stay</a>
                </div>
              </div>
            </article>

            <!-- Vietnam -->
            <article class="card-item" data-group="vietnam">
              <a href="{{ route('stay-detail') }}" class="card-img-wrap card-img-link" aria-label="Reserve InterContinental Danang Sun Peninsula Resort">
                <picture><source srcset="{{ asset('assets/media/intercontinental-danang-resort.webp') }}" type="image/webp"><img src="{{ asset('assets/media/intercontinental-danang-resort.jpg') }}" alt="InterContinental Danang Sun Peninsula hillside luxury oceanfront resort" class="card-img" width="800" height="600" loading="lazy" decoding="async"></picture>
                <span class="card-tag">Vietnam</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('stay-detail') }}">InterContinental Danang Sun Peninsula Resort</a></h3>
                <p class="card-text">Bill Bensley-designed luxury cliffside sanctuary perched on Son Tra Peninsula's
                  private bay.</p>
                <div class="card-footer">
                  <span class="card-footer-info">5-Star Oceanfront Resort</span>
                  <a href="{{ route('stay-detail') }}" class="card-btn-action">Reserve Stay</a>
                </div>
              </div>
            </article>

            <!-- Nepal -->
            <article class="card-item" data-group="nepal">
              <a href="{{ route('stay-detail') }}" class="card-img-wrap card-img-link" aria-label="Reserve Dwarika's Heritage Hotel Kathmandu">
                <picture>
                  <source srcset="{{ asset('assets/media/dwarikas-heritage-hotel-nepal.webp') }}" type="image/webp">
                  <img src="{{ asset('assets/media/dwarikas-heritage-hotel-nepal.jpg') }}"
                    alt="Dwarikas heritage hotel traditional Newari architecture in Kathmandu Nepal" class="card-img" width="800" height="600" loading="lazy" decoding="async">
                </picture>
                <span class="card-tag">Nepal</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('stay-detail') }}">Dwarika's Heritage Hotel Kathmandu</a></h3>
                <p class="card-text">A living museum of Nepalese wood carving, ancient courtyard suites, and royal Himalayan hospitality.</p>
                <div class="card-footer">
                  <span class="card-footer-info">UNESCO Cultural Heritage</span>
                  <a href="{{ route('stay-detail') }}" class="card-btn-action">Reserve Stay</a>
                </div>
              </div>
            </article>

            <!-- Turkey -->
            <article class="card-item" data-group="turkey">
              <a href="{{ route('stay-detail') }}" class="card-img-wrap card-img-link" aria-label="Reserve Museum Hotel & Cave Suites Cappadocia">
                <picture><source srcset="{{ asset('assets/media/museum-hotel-cappadocia-cave.webp') }}" type="image/webp"><img src="{{ asset('assets/media/museum-hotel-cappadocia-cave.jpg') }}" alt="Museum Hotel luxury cave suites with terrace pool in Cappadocia Turkey" class="card-img" width="800" height="600" loading="lazy" decoding="async"></picture>
                <span class="card-tag">Turkey</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('stay-detail') }}">Museum Hotel &amp; Cave Suites Cappadocia</a></h3>
                <p class="card-text">Authentic restored cave hotel with heated outdoor terrace pools overlooking fairy
                  chimneys.</p>
                <div class="card-footer">
                  <span class="card-footer-info">Bespoke Heritage Suite</span>
                  <a href="{{ route('stay-detail') }}" class="card-btn-action">Reserve Stay</a>
                </div>
              </div>
            </article>

            <!-- Thailand -->
            <article class="card-item" data-group="thailand">
              <a href="{{ route('stay-detail') }}" class="card-img-wrap card-img-link" aria-label="Reserve Amanpuri & Banyan Tree Villa Suites">
                <picture><source srcset="{{ asset('assets/media/amanpuri-banyan-tree-phuket.webp') }}" type="image/webp"><img src="{{ asset('assets/media/amanpuri-banyan-tree-phuket.jpg') }}" alt="Amanpuri private infinity pool beachfront villa in Phuket Thailand" class="card-img" width="800" height="600" loading="lazy" decoding="async"></picture>
                <span class="card-tag">Thailand</span>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('stay-detail') }}">Amanpuri &amp; Banyan Tree Villa Suites</a></h3>
                <p class="card-text">Private infinity pool beachfront villas overlooking the turquoise Andaman Ocean in
                  Phuket.</p>
                <div class="card-footer">
                  <span class="card-footer-info">5-Star Pool Villas</span>
                  <a href="{{ route('stay-detail') }}" class="card-btn-action">Reserve Stay</a>
                </div>
              </div>
            </article>

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
