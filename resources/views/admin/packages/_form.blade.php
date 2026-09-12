@if($errors->any())
  <div class="toast toast-error" style="position: static; margin-bottom: 1.5rem; display: block;">
    <div style="font-weight: 700; margin-bottom: 0.25rem;">Please address the following validation errors:</div>
    <ul style="margin-left: 1.25rem; font-size: 0.8rem;">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<input type="hidden" id="package_id" value="{{ $package->id ?? '' }}">

<div class="admin-card">
  <!-- TAB NAVIGATION HEADER -->
  <div class="form-tabs-header">
    <button type="button" class="form-tab-btn active" data-tab="basic">
      <span>(A) Basic Info</span>
    </button>
    <button type="button" class="form-tab-btn" data-tab="images">
      <span>(B) Images & Media</span>
    </button>
    <button type="button" class="form-tab-btn" data-tab="features">
      <span>(C) Feature Icons</span>
    </button>
    <button type="button" class="form-tab-btn" data-tab="itinerary" id="tab_btn_itinerary">
      <span>(D) Itinerary Days</span>
    </button>
    <button type="button" class="form-tab-btn" data-tab="room_types" id="tab_btn_rooms">
      <span>(E) Room Types (Hotels)</span>
    </button>
    <button type="button" class="form-tab-btn" data-tab="highlights">
      <span>(F) Highlights & Includes</span>
    </button>
  </div>

  <!-- TAB A: BASIC INFO -->
  <div class="form-tab-panel active" id="tab-basic">
    <div class="form-grid">
      <!-- Category -->
      <div class="col-4 form-group">
        <label class="form-label" for="package_category">Category <span class="required">*</span></label>
        <select name="category" id="package_category" class="form-select" required>
          <option value="holiday" {{ old('category', $package->category) === 'holiday' ? 'selected' : '' }}>Holiday Package</option>
          <option value="cruise" {{ old('category', $package->category) === 'cruise' ? 'selected' : '' }}>Cruise / Voyage</option>
          <option value="hotel" {{ old('category', $package->category) === 'hotel' ? 'selected' : '' }}>Luxury Hotel</option>
        </select>
        <span class="form-hint">Selecting category switches between Itinerary and Room Types tabs</span>
      </div>

      <!-- Title -->
      <div class="col-8 form-group">
        <label class="form-label" for="package_title">Package Title <span class="required">*</span></label>
        <input type="text" name="title" id="package_title" value="{{ old('title', $package->title) }}" required 
               class="form-input" placeholder="e.g. Rocky Mountaineer Luxury Express">
      </div>

      <!-- Auto-Generated Editable Slug -->
      <div class="col-12 form-group">
        <label class="form-label" for="package_slug">URL Slug <span class="required">*</span></label>
        <div class="slug-input-group">
          <input type="text" name="slug" id="package_slug" value="{{ old('slug', $package->slug) }}" required 
                 class="form-input" placeholder="rocky-mountaineer-luxury-express">
          <span id="slug_status_indicator" class="slug-status-indicator"></span>
        </div>
        <span class="form-hint">Auto-generated from title. Unique public endpoint: /package/<strong>slug</strong></span>
      </div>

      <!-- Country -->
      <div class="col-6 form-group">
        <label class="form-label" for="country">Country</label>
        <input type="text" name="country" id="country" value="{{ old('country', $package->country) }}" 
               class="form-input" placeholder="e.g. Canada">
      </div>

      <!-- Region -->
      <div class="col-6 form-group">
        <label class="form-label" for="region">Region</label>
        <select name="region" id="region" class="form-select">
          <option value="">Global / Unspecified</option>
          <option value="north-america" {{ old('region', $package->region) === 'north-america' ? 'selected' : '' }}>North America</option>
          <option value="south-asia" {{ old('region', $package->region) === 'south-asia' ? 'selected' : '' }}>South Asia</option>
          <option value="middle-east" {{ old('region', $package->region) === 'middle-east' ? 'selected' : '' }}>Middle East</option>
          <option value="southeast-asia" {{ old('region', $package->region) === 'southeast-asia' ? 'selected' : '' }}>Southeast Asia</option>
          <option value="europe" {{ old('region', $package->region) === 'europe' ? 'selected' : '' }}>Europe</option>
        </select>
      </div>

      <!-- Duration Days & Nights -->
      <div class="col-3 form-group">
        <label class="form-label" for="duration_days">Duration (Days) <span class="required">*</span></label>
        <input type="number" name="duration_days" id="duration_days" min="1" max="365" 
               value="{{ old('duration_days', $package->duration_days ?: 8) }}" required class="form-input">
      </div>

      <div class="col-3 form-group">
        <label class="form-label" for="duration_nights">Duration (Nights)</label>
        <input type="number" name="duration_nights" id="duration_nights" min="0" max="365" 
               value="{{ old('duration_nights', $package->duration_nights ?: 7) }}" class="form-input">
      </div>

      <!-- Price & Currency -->
      <div class="col-4 form-group">
        <label class="form-label" for="price_from">Starting Price</label>
        <input type="number" step="0.01" min="0" name="price_from" id="price_from" 
               value="{{ old('price_from', $package->price_from) }}" class="form-input" placeholder="7850.00">
      </div>

      <div class="col-2 form-group">
        <label class="form-label" for="currency">Currency</label>
        <select name="currency" id="currency" class="form-select">
          <option value="USD" {{ old('currency', $package->currency) === 'USD' ? 'selected' : '' }}>USD ($)</option>
          <option value="CAD" {{ old('currency', $package->currency) === 'CAD' ? 'selected' : '' }}>CAD ($)</option>
          <option value="EUR" {{ old('currency', $package->currency) === 'EUR' ? 'selected' : '' }}>EUR (€)</option>
          <option value="GBP" {{ old('currency', $package->currency) === 'GBP' ? 'selected' : '' }}>GBP (£)</option>
        </select>
      </div>

      <!-- Tag Input (Repeatable Pills) -->
      <div class="col-12 form-group">
        <label class="form-label">Tags (Type & hit Enter or comma)</label>
        <div id="tags_input_container" class="tags-input-container">
          <input type="text" id="tags_raw_input" class="tags-raw-input" placeholder="Add tag (e.g. Luxury Rail, VIP, UNESCO)...">
        </div>
        <input type="hidden" name="tags" id="tags_hidden" value="{{ json_encode(old('tags', $package->tags ?: [])) }}">
      </div>

      <!-- Short Description -->
      <div class="col-12 form-group">
        <label class="form-label" for="short_description">Short Description <span class="required">*</span></label>
        <textarea name="short_description" id="short_description" rows="3" required class="form-textarea" 
                  placeholder="Bespoke summary describing the experience, route, and highlights...">{{ old('short_description', $package->short_description ?: $package->overview) }}</textarea>
      </div>

      <!-- Dates Optional -->
      <div class="col-4 form-group">
        <label class="form-label" for="start_date">Departure / Start Date</label>
        <input type="date" name="start_date" id="start_date" 
               value="{{ old('start_date', $package->start_date ? $package->start_date->format('Y-m-d') : '') }}" class="form-input">
      </div>

      <div class="col-4 form-group">
        <label class="form-label" for="end_date">Return / End Date</label>
        <input type="date" name="end_date" id="end_date" 
               value="{{ old('end_date', $package->end_date ? $package->end_date->format('Y-m-d') : '') }}" class="form-input">
      </div>

      <!-- Status -->
      <div class="col-4 form-group">
        <label class="form-label" for="status">Publication Status <span class="required">*</span></label>
        <select name="status" id="status" class="form-select" required>
          <option value="draft" {{ old('status', $package->status) === 'draft' ? 'selected' : '' }}>Draft</option>
          <option value="published" {{ old('status', $package->status) === 'published' ? 'selected' : '' }}>Published</option>
          <option value="archived" {{ old('status', $package->status) === 'archived' ? 'selected' : '' }}>Archived</option>
        </select>
      </div>
    </div>
  </div>

  <!-- TAB B: IMAGES -->
  <div class="form-tab-panel" id="tab-images">
    <div class="form-grid">
      <!-- Hero Image -->
      <div class="col-12 form-group">
        <label class="form-label">Hero / Featured Image <span class="required">*</span></label>
        <div class="hero-image-dropzone">
          <input type="file" name="featured_image_file" id="hero_image_file" accept="image/*" style="display: none;">
          <input type="hidden" name="featured_image_url" id="featured_image_url" value="{{ old('featured_image', $package->featured_image) }}">

          <div id="hero_preview_container" style="{{ $package->featured_image ? '' : 'display: none;' }}">
            <img id="hero_preview_img" src="{{ $package->featured_image }}" alt="Hero Preview" class="hero-preview-img" onerror="this.src='/assets/logo-square-inc.png'">
            <div style="margin-top: 0.85rem; display: flex; gap: 0.5rem; justify-content: center;">
              <button type="button" class="btn btn-outline btn-sm" onclick="document.getElementById('hero_image_file').click()">Replace Image</button>
              <button type="button" id="hero_remove_btn" class="btn btn-danger btn-sm">Remove Image</button>
            </div>
          </div>

          <div id="hero_upload_prompt" style="{{ $package->featured_image ? 'display: none;' : '' }}">
            <p style="color: #64748B; margin-bottom: 0.75rem;">Upload high-resolution landscape hero image (JPEG, PNG, WEBP, up to 5MB)</p>
            <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('hero_image_file').click()">
              Choose Image File
            </button>
          </div>
        </div>
      </div>

      <!-- Multi-Image Gallery -->
      <div class="col-12 form-group" style="margin-top: 1.5rem;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
          <label class="form-label">Photo Gallery (Drag to Reorder)</label>
          <button type="button" class="btn btn-outline btn-sm" onclick="document.getElementById('gallery_files').click()">
            + Add Gallery Photos
          </button>
        </div>
        <input type="file" name="gallery_files[]" id="gallery_files" multiple accept="image/*" style="display: none;">

        <div id="gallery_grid" class="gallery-grid">
          @if(!empty($package->gallery))
            @foreach($package->gallery as $imgUrl)
              <div class="gallery-item">
                <img src="{{ $imgUrl }}" alt="Gallery photo">
                <input type="hidden" name="existing_gallery[]" value="{{ $imgUrl }}">
                <button type="button" class="gallery-item-remove">&times;</button>
              </div>
            @endforeach
          @endif
        </div>
        <span class="form-hint" style="margin-top: 0.5rem;">Click and drag tiles horizontally to reorder gallery sequence. Click &times; on any tile to remove.</span>
      </div>
    </div>
  </div>

  <!-- TAB C: FEATURE ICONS -->
  <div class="form-tab-panel" id="tab-features">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
      <div>
        <h3 style="font-size: 0.95rem; font-weight: 700; color: var(--pge-navy);">Package Feature Highlights</h3>
        <span class="form-hint">Select an icon and specify custom label rows (e.g. Flight, Cruise, Concierge).</span>
      </div>
      <button type="button" id="add_feature_btn" class="btn btn-secondary btn-sm">+ Add Feature Row</button>
    </div>

    <div id="features_list" class="repeatable-list">
      @php
        $features = old('features', $package->features ?: []);
      @endphp
      @foreach($features as $feat)
        <div class="repeatable-card feature-card">
          <div style="display: flex; gap: 0.75rem; align-items: center;">
            <select class="form-select feature-icon-select" style="max-width: 160px;">
              <option value="plane" {{ ($feat['icon'] ?? '') === 'plane' ? 'selected' : '' }}>✈ Flight / Plane</option>
              <option value="ship" {{ ($feat['icon'] ?? '') === 'ship' ? 'selected' : '' }}>🚢 Cruise / Voyage</option>
              <option value="hotel" {{ ($feat['icon'] ?? '') === 'hotel' ? 'selected' : '' }}>🏨 Luxury Hotel</option>
              <option value="star" {{ ($feat['icon'] ?? '') === 'star' ? 'selected' : '' }}>★ 5-Star Service</option>
              <option value="compass" {{ ($feat['icon'] ?? '') === 'compass' ? 'selected' : '' }}>🧭 Expedition / Guide</option>
              <option value="map" {{ ($feat['icon'] ?? '') === 'map' ? 'selected' : '' }}>🗺 Curated Route</option>
              <option value="shield" {{ ($feat['icon'] ?? '') === 'shield' ? 'selected' : '' }}>🛡 Private Concierge</option>
              <option value="coffee" {{ ($feat['icon'] ?? '') === 'coffee' ? 'selected' : '' }}>☕ Fine Dining</option>
              <option value="wifi" {{ ($feat['icon'] ?? '') === 'wifi' ? 'selected' : '' }}>📶 High-speed Wifi</option>
              <option value="luggage" {{ ($feat['icon'] ?? '') === 'luggage' ? 'selected' : '' }}>🧳 Luggage Handling</option>
            </select>
            <input type="text" class="form-input feature-label-input" value="{{ $feat['label'] ?? '' }}" placeholder="Feature label e.g. Private GoldLeaf Carriage" style="flex-grow: 1;">
            <button type="button" class="btn btn-outline btn-sm remove-feature-btn" style="color: #DC2626;">&times; Remove</button>
          </div>
        </div>
      @endforeach
    </div>
    <input type="hidden" name="features" id="features_hidden" value="{{ json_encode($features) }}">
  </div>

  <!-- TAB D: ITINERARY (HOLIDAY & CRUISE) -->
  <div class="form-tab-panel" id="tab-itinerary">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
      <div>
        <h3 style="font-size: 0.95rem; font-weight: 700; color: var(--pge-navy);">Day-by-Day Itinerary</h3>
        <span class="form-hint">Shown for Holiday Packages and Cruises. For cruises, &quot;Overnight Location&quot; automatically relabels as &quot;Port / Sea Day&quot;.</span>
      </div>
      <button type="button" id="add_itinerary_day_btn" class="btn btn-secondary btn-sm">+ Add Itinerary Day</button>
    </div>

    <div id="itinerary_list" class="repeatable-list">
      @php
        $itinerary = old('itinerary', $package->itinerary ?: []);
      @endphp
      @foreach($itinerary as $day)
        <div class="repeatable-card itinerary-card">
          <div class="repeatable-card-header">
            <span class="repeatable-card-title">
              <span class="drag-handle">☰</span> Day <span class="js-day-number">{{ $day['day'] ?? $loop->iteration }}</span>
            </span>
            <button type="button" class="btn btn-outline btn-sm remove-day-btn" style="color: #DC2626;">Remove Day</button>
          </div>
          <div class="form-grid">
            <div class="col-8 form-group">
              <label class="form-label">Day Title</label>
              <input type="text" class="form-input itin-title" value="{{ $day['title'] ?? '' }}" placeholder="e.g. Vancouver Departure & Boarding">
            </div>
            <div class="col-4 form-group">
              <label class="form-label js-overnight-label">{{ $package->category === 'cruise' ? 'Port / Sea Day' : 'Overnight Location' }}</label>
              <input type="text" class="form-input itin-location" value="{{ $day['location'] ?? '' }}" placeholder="e.g. Kamloops, BC">
            </div>
            <div class="col-12 form-group">
              <label class="form-label">Day Description</label>
              <textarea class="form-textarea itin-desc" rows="2" placeholder="Describe the activities, scenery, and excursion details...">{{ $day['description'] ?? '' }}</textarea>
            </div>
            <div class="col-6 form-group">
              <label class="form-label">Included Meals</label>
              @php $meals = $day['meals'] ?? []; @endphp
              <div style="display: flex; gap: 1rem; align-items: center; margin-top: 0.35rem;">
                <label style="font-size: 0.8rem; display: flex; align-items: center; gap: 0.3rem;">
                  <input type="checkbox" class="itin-meal" value="B" {{ in_array('B', $meals) ? 'checked' : '' }}> Breakfast
                </label>
                <label style="font-size: 0.8rem; display: flex; align-items: center; gap: 0.3rem;">
                  <input type="checkbox" class="itin-meal" value="L" {{ in_array('L', $meals) ? 'checked' : '' }}> Lunch
                </label>
                <label style="font-size: 0.8rem; display: flex; align-items: center; gap: 0.3rem;">
                  <input type="checkbox" class="itin-meal" value="D" {{ in_array('D', $meals) ? 'checked' : '' }}> Dinner
                </label>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <input type="hidden" name="itinerary" id="itinerary_hidden" value="{{ json_encode($itinerary) }}">
  </div>

  <!-- TAB E: ROOM TYPES (HOTEL CATEGORY) -->
  <div class="form-tab-panel" id="tab-room_types">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
      <div>
        <h3 style="font-size: 0.95rem; font-weight: 700; color: var(--pge-navy);">Hotel Rooms & Suites</h3>
        <span class="form-hint">Shown for Hotel category only. Specify room tiers, amenities, and specs.</span>
      </div>
      <button type="button" id="add_room_type_btn" class="btn btn-secondary btn-sm">+ Add Room Type</button>
    </div>

    <div id="rooms_list" class="repeatable-list">
      @php
        $rooms = old('room_types', $package->room_types ?: []);
      @endphp
      @foreach($rooms as $room)
        <div class="repeatable-card room-card">
          <div class="repeatable-card-header">
            <span class="repeatable-card-title">Room Tier</span>
            <button type="button" class="btn btn-outline btn-sm remove-room-btn" style="color: #DC2626;">Remove</button>
          </div>
          <div class="form-grid">
            <div class="col-6 form-group">
              <label class="form-label">Room Name</label>
              <input type="text" class="form-input room-name" value="{{ $room['name'] ?? '' }}" placeholder="e.g. Deluxe Mountain View Suite">
            </div>
            <div class="col-6 form-group">
              <label class="form-label">Meta Line</label>
              <input type="text" class="form-input room-meta" value="{{ $room['meta'] ?? '' }}" placeholder="e.g. Sleeps 2 · King Bed · 35m²">
            </div>
            <div class="col-12 form-group">
              <label class="form-label">Room Description</label>
              <textarea class="form-textarea room-desc" rows="2" placeholder="Details about bathroom, terrace, concierge service...">{{ $room['description'] ?? '' }}</textarea>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <input type="hidden" name="room_types" id="room_types_hidden" value="{{ json_encode($rooms) }}">
  </div>

  <!-- TAB F: HIGHLIGHTS & INCLUDES -->
  <div class="form-tab-panel" id="tab-highlights">
    <div class="form-grid">
      <!-- Highlights List -->
      <div class="col-6 form-group">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
          <label class="form-label" style="margin: 0;">Package Highlights</label>
          <button type="button" id="add_highlight_btn" class="btn btn-outline btn-sm">+ Add Highlight</button>
        </div>
        <div id="highlights_list">
          @php
            $highlights = old('highlights', $package->highlights ?: []);
          @endphp
          @foreach($highlights as $hl)
            <div class="list-item-row" style="display: flex; gap: 0.5rem; margin-bottom: 0.5rem;">
              <input type="text" class="form-input list-item-input" value="{{ $hl }}" placeholder="Highlight point...">
              <button type="button" class="btn btn-outline btn-sm remove-item-btn" style="color: #DC2626;">&times;</button>
            </div>
          @endforeach
        </div>
        <input type="hidden" name="highlights" id="highlights_hidden" value="{{ json_encode($highlights) }}">
      </div>

      <!-- Inclusions List -->
      <div class="col-6 form-group">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
          <label class="form-label" style="margin: 0;">Included Features / Inclusions</label>
          <button type="button" id="add_inclusion_btn" class="btn btn-outline btn-sm">+ Add Inclusion</button>
        </div>
        <div id="inclusions_list">
          @php
            $inclusions = old('inclusions', $package->inclusions ?: []);
          @endphp
          @foreach($inclusions as $inc)
            <div class="list-item-row" style="display: flex; gap: 0.5rem; margin-bottom: 0.5rem;">
              <input type="text" class="form-input list-item-input" value="{{ $inc }}" placeholder="Inclusion item...">
              <button type="button" class="btn btn-outline btn-sm remove-item-btn" style="color: #DC2626;">&times;</button>
            </div>
          @endforeach
        </div>
        <input type="hidden" name="inclusions" id="inclusions_hidden" value="{{ json_encode($inclusions) }}">
      </div>
    </div>
  </div>

  <!-- FORM FOOTER ACTIONS -->
  <div style="padding: 1.5rem 2rem; background-color: #F8FAFC; border-top: 1px solid var(--pge-cloud-mist); display: flex; justify-content: space-between; align-items: center;">
    <a href="{{ route('admin.packages.index') }}" class="btn btn-outline">Cancel & Back</a>
    <div style="display: flex; gap: 0.75rem;">
      <button type="submit" class="btn btn-primary" style="padding: 0.65rem 2rem;">
        Save Package
      </button>
    </div>
  </div>
</div>
