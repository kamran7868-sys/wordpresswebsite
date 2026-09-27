@extends('layouts.app')

@section('title', 'Cruise Inquiry — Premium Global Expeditions')
@section('meta_description', 'Tell us about the voyage you have in mind, and one of our cruise specialists will curate options and pricing tailored to you.')

@push('styles')
<style>
  :root {
    --navy: var(--color-navy, #252E47);
    --navy-soft: var(--color-slate, #2C4058);
    --ink: var(--color-dark-navy, #121525);
    --ink-soft: rgba(37, 46, 71, 0.75);
    --paper: var(--color-ivory, #F7F4ED);
    --card: var(--color-white, #FFFFFF);
    --field: #FAFAF8;
    --line: var(--color-cloud-mist, #E9ECF2);
    --gold: var(--color-gold, #B69964);
    --gold-bright: var(--color-gold-light, #C5A880);
    --gold-soft: var(--color-travel-sand, #E6D9C2);
    --gold-wash: rgba(182, 153, 100, 0.1);
    --error: #b3452f;
    --radius: 10px;
  }

  /* ---- page background & main container ---- */
  .cruise-inquiry-page {
    background-color: var(--paper);
    color: var(--ink);
    font-family: var(--font-body);
    min-height: 80vh;
    padding-bottom: 80px;
  }

  /* ---- hero intro ---- */
  .hero {
    text-align: center;
    padding: 64px 24px 36px;
    background-color: var(--paper);
  }
  .hero .eyebrow {
    font-family: var(--font-script);
    font-style: normal;
    font-weight: 500;
    font-size: clamp(1.8rem, 3.5vw, 2.4rem);
    color: var(--gold);
    display: block;
    margin-bottom: 6px;
  }
  .hero h1 {
    font-family: var(--font-display);
    font-weight: 600;
    font-size: clamp(2.3rem, 5vw, 3.4rem);
    margin: 0 0 14px;
    color: var(--navy);
    letter-spacing: 1px;
  }
  .hero .rule {
    width: 70px;
    height: 2px;
    background: var(--gold);
    margin: 0 auto 20px;
  }
  .hero p {
    max-width: 580px;
    margin: 0 auto;
    color: var(--ink-soft);
    font-size: 1.05rem;
    line-height: 1.6;
    font-family: var(--font-body);
  }

  .voyage-banner {
    max-width: 820px;
    margin: 0 auto 16px;
    background: var(--gold-wash);
    border: 1px solid var(--gold-soft);
    border-radius: 10px;
    padding: 14px 20px;
    text-align: center;
    font-size: 0.98rem;
    color: var(--navy);
    display: none;
    font-weight: 500;
  }
  .voyage-banner strong {
    color: var(--gold);
    font-weight: 700;
  }

  .wrap {
    max-width: 860px;
    margin: 0 auto;
    padding: 12px 24px 40px;
  }
  .card {
    background: var(--card);
    border: 1px solid var(--line);
    border-radius: 16px;
    padding: 44px 44px 40px;
    box-shadow: 0 20px 50px -30px rgba(37, 46, 71, 0.2);
  }
  @media (max-width: 640px) {
    .card { padding: 30px 20px; }
    .hero { padding: 44px 18px 28px; }
    .hero h1 { font-size: 2.15rem; }
  }

  form {
    display: flex;
    flex-direction: column;
    gap: 26px;
  }
  .row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 26px;
  }
  .row.three {
    grid-template-columns: 1fr 1fr 1fr;
  }
  @media (max-width: 640px) {
    .row, .row.three { grid-template-columns: 1fr; gap: 20px; }
  }

  h2.section {
    font-family: var(--font-display);
    font-weight: 600;
    font-size: 1.6rem;
    color: var(--navy);
    margin: 6px 0 -6px;
    padding-top: 18px;
    border-top: 1px solid var(--line);
    letter-spacing: 0.5px;
  }
  h2.section:first-child {
    border-top: none;
    padding-top: 0;
    margin-top: 0;
  }

  label {
    display: block;
    font-size: 0.92rem;
    font-weight: 600;
    margin-bottom: 9px;
    color: var(--ink);
    font-family: var(--font-body);
  }
  label .opt {
    font-weight: 500;
    color: var(--ink-soft);
  }
  .req {
    color: var(--gold);
  }

  input[type=text], input[type=email], input[type=tel],
  input[type=date], input[type=month], input[type=number],
  select, textarea {
    width: 100%;
    font-family: var(--font-body);
    font-size: 0.98rem;
    padding: 13px 14px;
    background: var(--field);
    border: 1px solid var(--line);
    border-radius: var(--radius);
    color: var(--ink);
    outline: none;
    transition: border-color .15s ease, box-shadow .15s ease;
    appearance: none;
    -webkit-appearance: none;
  }
  textarea { resize: vertical; }
  input::placeholder, textarea::placeholder { color: #a7a49b; }
  input:focus, select:focus, textarea:focus {
    border-color: var(--gold);
    box-shadow: 0 0 0 3px var(--gold-wash);
  }
  select {
    background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='14' height='9' viewBox='0 0 14 9' fill='none'><path d='M1 1L7 7L13 1' stroke='%23b6893f' stroke-width='1.6' stroke-linecap='round' stroke-linejoin='round'/></svg>");
    background-repeat: no-repeat;
    background-position: right 16px center;
    padding-right: 40px;
    cursor: pointer;
  }
  select.active-select {
    border-color: var(--gold);
    box-shadow: 0 0 0 3px var(--gold-wash);
  }
  input[type=date]::-webkit-calendar-picker-indicator,
  input[type=month]::-webkit-calendar-picker-indicator {
    filter: invert(28%) sepia(9%) saturate(600%) hue-rotate(180deg);
    cursor: pointer;
  }

  /* traveller detail panel (reused pattern from the flight inquiry form) */
  .panel {
    border: 1px solid var(--gold-soft);
    background: var(--gold-wash);
    border-radius: 12px;
    padding: 22px 22px 8px;
    display: none;
    flex-direction: column;
    gap: 16px;
  }
  .panel-heading {
    display: flex;
    align-items: baseline;
    justify-content: space-between;
    margin-bottom: -2px;
  }
  .panel-heading .title {
    font-family: var(--font-display);
    font-size: 1.35rem;
    font-weight: 600;
    color: var(--ink);
  }
  .panel-heading .hint {
    font-size: 0.83rem;
    color: var(--ink-soft);
  }
  .counts-row {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 16px;
    padding-bottom: 8px;
  }
  @media (max-width: 640px) {
    .counts-row { grid-template-columns: 1fr; }
  }

  .checkbox-row {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 4px;
  }
  .checkbox-row input {
    width: 19px;
    height: 19px;
    accent-color: var(--gold);
    cursor: pointer;
  }
  .checkbox-row label {
    margin: 0;
    font-weight: 500;
    font-size: 0.95rem;
    color: var(--ink);
    cursor: pointer;
  }

  .submit {
    margin-top: 6px;
    align-self: flex-start;
    background: var(--navy);
    color: #fff;
    border: none;
    padding: 15px 36px;
    border-radius: var(--radius);
    font-size: 0.98rem;
    font-weight: 700;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    cursor: pointer;
    transition: background .15s ease, transform .15s ease;
  }
  .submit:hover {
    background: var(--navy-soft);
  }
</style>
@endpush

@section('content')
<div class="cruise-inquiry-page">

  <div class="hero">
    <span class="eyebrow">Ocean &amp; River Voyages</span>
    <h1>Cruise Inquiry</h1>
    <div class="rule"></div>
    <p>Tell us about the voyage you have in mind, and one of our cruise specialists will curate options and pricing tailored to you.</p>
  </div>

  <div class="wrap">
    <div id="voyageBanner" class="voyage-banner">
      You're inquiring about: <strong id="voyageName"></strong>
    </div>

    <div class="card">
      <form id="cruiseForm" action="{{ route('cruise-inquiry.submit') }}" method="POST">
        @csrf

        <h2 class="section">Your Details</h2>
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
            <label>Preferred Departure Port <span class="opt">(Optional)</span></label>
            <input type="text" name="departure_port" placeholder="e.g. Vancouver, Miami, Southampton" />
          </div>
        </div>

        <h2 class="section">Voyage Preferences</h2>
        <div class="row">
          <div>
            <label>Cruise Region / Destination <span class="req">*</span></label>
            <select id="cruiseRegion" name="cruise_region" required>
              <option value="" disabled selected>Select a region</option>
              <option>Alaska</option>
              <option>Caribbean &amp; Bahamas</option>
              <option>Bermuda</option>
              <option>Mediterranean &amp; Europe</option>
              <option>European Rivers (Rhine, Danube, Seine)</option>
              <option>Nile River (Egypt)</option>
              <option>Mexico &amp; Central America</option>
              <option>Panama Canal</option>
              <option>Transatlantic</option>
              <option>Hawaii</option>
              <option>South Pacific</option>
              <option>Asia &amp; Far East</option>
              <option>Africa &amp; Middle East</option>
              <option>Australia &amp; New Zealand</option>
              <option>South America</option>
              <option>Antarctica</option>
              <option>World Cruise</option>
              <option>Other / Not Sure Yet</option>
            </select>
          </div>
          <div>
            <label>Preferred Cruise Line <span class="opt">(Optional)</span></label>
            <select id="cruiseLine" name="cruise_line">
              <option value="" selected>Any Cruise Line</option>
              <optgroup label="Ocean Cruise Lines">
                <option>Royal Caribbean International</option>
                <option>Carnival Cruise Line</option>
                <option>Celebrity Cruises</option>
                <option>Norwegian Cruise Line (NCL)</option>
                <option>Princess Cruises</option>
                <option>Holland America Line</option>
                <option>MSC Cruises</option>
                <option>Costa Cruises</option>
                <option>Disney Cruise Line</option>
                <option>Virgin Voyages</option>
                <option>Cunard Line</option>
                <option>Oceania Cruises</option>
                <option>Regent Seven Seas Cruises</option>
                <option>Silversea Cruises</option>
                <option>Seabourn</option>
                <option>Windstar Cruises</option>
                <option>Azamara</option>
                <option>Explora Journeys</option>
              </optgroup>
              <optgroup label="River Cruise Lines">
                <option>Viking River Cruises</option>
                <option>AmaWaterways</option>
                <option>Uniworld Boutique River Cruises</option>
                <option>Avalon Waterways</option>
                <option>Scenic Luxury Cruises &amp; Tours</option>
                <option>Emerald Cruises</option>
                <option>Tauck River Cruising</option>
                <option>CroisiEurope</option>
              </optgroup>
              <option value="notsure">Not sure / open to recommendations</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div>
            <label>Specific Voyage / Itinerary <span class="opt">(Optional)</span></label>
            <input type="text" id="voyageInput" name="voyage_name" placeholder="e.g. Alaska Sampler - Crown Princess" />
          </div>
          <div>
            <label>Cruise Length</label>
            <select name="cruise_length">
              <option value="" selected>Not sure yet</option>
              <option>1-2 Nights (Weekend)</option>
              <option>3-5 Nights (Short Getaway)</option>
              <option>6-9 Nights</option>
              <option>10-14 Nights</option>
              <option>15+ Nights (Grand Voyage)</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div>
            <label>Preferred Sail Month <span class="req">*</span></label>
            <input type="month" name="sail_month" required />
          </div>
          <div>
            <label>Cabin Type <span class="req">*</span></label>
            <select name="cabin_type" required>
              <option value="" disabled selected>Select a cabin type</option>
              <option>Interior (Inside)</option>
              <option>Ocean View (Outside)</option>
              <option>Balcony</option>
              <option>Suite</option>
              <option>Not sure / need a recommendation</option>
            </select>
          </div>
        </div>

        <div class="checkbox-row">
          <input type="checkbox" id="flexDates" name="flexible_dates" value="1" checked />
          <label for="flexDates">My travel dates are flexible (+/- 1 week for best fares)</label>
        </div>

        <h2 class="section">Travellers</h2>
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
            <label>Special Occasion <span class="opt">(Optional)</span></label>
            <select name="special_occasion">
              <option value="" selected>None / Not Applicable</option>
              <option>Honeymoon</option>
              <option>Anniversary</option>
              <option>Birthday Celebration</option>
              <option>Family Reunion</option>
              <option>Solo Milestone Trip</option>
              <option>Other</option>
            </select>
          </div>
        </div>

        <div id="travellerCounts" class="panel">
          <div class="panel-heading">
            <span class="title">Traveller Details</span>
            <span class="hint">Adults 18+, Children 2–17, Infants under 2</span>
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

        <h2 class="section">Anything Else?</h2>
        <div>
          <label>Preferred Airline for Flights <span class="opt">(Optional — if you'd like flights bundled in)</span></label>
          <input type="text" name="preferred_airline" placeholder="e.g. Air Canada, Emirates, Qatar Airways" />
        </div>

        <div>
          <label>Special Requests / Preferences <span class="opt">(Optional)</span></label>
          <textarea name="special_requests" rows="3" placeholder="Dietary needs, accessibility requirements, dining time preference, adjoining cabins, etc."></textarea>
        </div>

        <button type="submit" class="submit" id="cruiseSubmitBtn">Submit Inquiry</button>
      </form>
    </div>
  </div>

</div>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Pre-fill from a "Request This Voyage" link, e.g.:
    // cruise-inquiry?voyage=Alaska%20Sampler%20%E2%80%93%20Crown%20Princess&line=Princess%20Cruises&region=Alaska
    const params = new URLSearchParams(window.location.search);
    const voyage = params.get('voyage');
    const line = params.get('line');
    const region = params.get('region');

    if (voyage) {
      const voyageInput = document.getElementById('voyageInput');
      const voyageName = document.getElementById('voyageName');
      const voyageBanner = document.getElementById('voyageBanner');
      if (voyageInput) voyageInput.value = voyage;
      if (voyageName) voyageName.textContent = voyage;
      if (voyageBanner) voyageBanner.style.display = 'block';
    }
    if (line) {
      const sel = document.getElementById('cruiseLine');
      if (sel) {
        for (const opt of sel.options) {
          if (opt.text.trim().toLowerCase() === line.trim().toLowerCase() || opt.value.trim().toLowerCase() === line.trim().toLowerCase()) {
            sel.value = opt.value;
            break;
          }
        }
      }
    }
    if (region) {
      const sel = document.getElementById('cruiseRegion');
      if (sel) {
        for (const opt of sel.options) {
          if (opt.text.trim().toLowerCase() === region.trim().toLowerCase() || opt.value.trim().toLowerCase() === region.trim().toLowerCase()) {
            sel.value = opt.value;
            break;
          }
        }
      }
    }

    // Traveller details toggle (same pattern as the flight inquiry form)
    const travellerType = document.getElementById('travellerType');
    const travellerCounts = document.getElementById('travellerCounts');
    function renderTravellers(){
      if (travellerType && travellerCounts) {
        travellerCounts.style.display = (travellerType.value === 'group') ? 'flex' : 'none';
      }
    }
    if (travellerType) {
      travellerType.addEventListener('change', renderTravellers);
      renderTravellers();
    }

    // Gold focus ring on selects that have a value chosen (matches "All Voyages" style)
    document.querySelectorAll('select').forEach(sel => {
      const sync = () => sel.classList.toggle('active-select', sel.value !== '');
      sel.addEventListener('change', sync);
      sync();
    });

    // Form submit listener with AJAX backend integration
    const cruiseForm = document.getElementById('cruiseForm');
    if (cruiseForm) {
      cruiseForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const btn = document.getElementById('cruiseSubmitBtn');
        if (btn) {
          btn.disabled = true;
          btn.textContent = 'Submitting...';
        }

        const formData = new FormData(cruiseForm);

        fetch(cruiseForm.action, {
          method: 'POST',
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
          },
          body: formData
        })
        .then(res => res.json())
        .then(data => {
          if (data.status === 'success') {
            alert(data.message || 'Thank you! Your cruise inquiry has been submitted successfully.');
            cruiseForm.reset();
            renderTravellers();
            document.querySelectorAll('select').forEach(sel => sel.dispatchEvent(new Event('change')));
          } else {
            alert(data.message || 'There was an issue submitting your inquiry. Please check all fields.');
          }
        })
        .catch(err => {
          console.error(err);
          alert('An error occurred while submitting your inquiry. Please try again.');
        })
        .finally(() => {
          if (btn) {
            btn.disabled = false;
            btn.textContent = 'Submit Inquiry';
          }
        });
      });
    }
  });
</script>
@endpush
