@extends('admin.layout')

@section('title', 'Executive Management Dashboard')
@section('page_title', 'Dashboard')

@section('extra_css')
<style>
  /* ==========================================================================
     PGE ADMIN EXECUTIVE DASHBOARD STYLES (2026 BRAND COMPLIANT)
     ========================================================================== */

  /* 1. EXECUTIVE WELCOME & COMMAND BANNER */
  .dash-hero {
    background: linear-gradient(135deg, #121624 0%, #1e2538 45%, #252e47 100%);
    border-radius: 12px;
    padding: 2rem 2.25rem;
    margin-bottom: 2rem;
    color: var(--pge-white);
    position: relative;
    overflow: hidden;
    box-shadow: 0 8px 24px -6px rgba(18, 22, 36, 0.25);
    border: 1px solid rgba(182, 153, 100, 0.25);
  }

  .dash-hero::before {
    content: '';
    position: absolute;
    top: -50px;
    right: -50px;
    width: 260px;
    height: 260px;
    background: radial-gradient(circle, rgba(182, 153, 100, 0.18) 0%, rgba(182, 153, 100, 0) 70%);
    border-radius: 50%;
    pointer-events: none;
  }

  .dash-hero-inner {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1.5rem;
    flex-wrap: wrap;
    position: relative;
    z-index: 2;
  }

  .dash-hero-left {
    max-width: 650px;
  }

  .dash-badge-row {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 0.75rem;
    flex-wrap: wrap;
  }

  .dash-tag {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    padding: 0.25rem 0.7rem;
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.08);
    color: var(--pge-gold-light);
    border: 1px solid rgba(182, 153, 100, 0.3);
  }

  .dash-tag-pulse {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background-color: #4ADE80;
    box-shadow: 0 0 0 2px rgba(74, 222, 128, 0.35);
    animation: pulseGlow 2s infinite;
  }

  @keyframes pulseGlow {
    0% { transform: scale(0.95); opacity: 0.8; }
    50% { transform: scale(1.15); opacity: 1; }
    100% { transform: scale(0.95); opacity: 0.8; }
  }

  .dash-hero-title {
    font-family: var(--font-title);
    font-size: 2.15rem;
    font-weight: 700;
    color: var(--pge-white);
    letter-spacing: 0.02em;
    line-height: 1.2;
    margin-bottom: 0.45rem;
  }

  .dash-hero-title span {
    color: var(--pge-gold);
    font-style: italic;
  }

  .dash-hero-sub {
    font-size: 0.88rem;
    color: #CBD5E1;
    line-height: 1.5;
  }

  .dash-hero-actions {
    display: flex;
    align-items: center;
    gap: 0.85rem;
    flex-wrap: wrap;
  }

  .btn-hero-primary {
    background: linear-gradient(135deg, #B69964 0%, #9E8250 100%);
    color: #121525;
    font-weight: 700;
    font-size: 0.82rem;
    letter-spacing: 0.04em;
    padding: 0.7rem 1.35rem;
    border-radius: 6px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: 0 4px 12px rgba(182, 153, 100, 0.3);
    transition: all 0.2s ease;
    border: none;
  }

  .btn-hero-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(182, 153, 100, 0.4);
    color: #000;
  }

  .btn-hero-secondary {
    background: rgba(255, 255, 255, 0.08);
    color: var(--pge-white);
    font-weight: 600;
    font-size: 0.82rem;
    padding: 0.7rem 1.2rem;
    border-radius: 6px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    border: 1px solid rgba(255, 255, 255, 0.15);
    transition: all 0.2s ease;
  }

  .btn-hero-secondary:hover {
    background: rgba(255, 255, 255, 0.16);
    border-color: rgba(255, 255, 255, 0.3);
    color: var(--pge-white);
    transform: translateY(-2px);
  }

  /* 2. QUICK ACTIONS HUB */
  .quick-hub {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 2rem;
    overflow-x: auto;
    padding-bottom: 0.5rem;
  }

  .quick-hub-label {
    font-size: 0.74rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #64748B;
    white-space: nowrap;
    margin-right: 0.25rem;
  }

  .quick-chip {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
    padding: 0.55rem 1rem;
    background: var(--pge-white);
    border: 1px solid var(--pge-cloud-mist);
    border-radius: 20px;
    color: var(--pge-navy);
    text-decoration: none;
    font-size: 0.78rem;
    font-weight: 600;
    white-space: nowrap;
    transition: all 0.18s ease;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
  }

  .quick-chip:hover {
    background: var(--pge-cloud-mist);
    border-color: var(--pge-gold);
    color: var(--pge-navy);
    transform: translateY(-1px);
    box-shadow: 0 3px 8px rgba(37, 46, 71, 0.08);
  }

  .quick-chip svg {
    width: 14px;
    height: 14px;
    fill: var(--pge-gold);
  }

  /* 3. ELEVATED METRIC CARDS */
  .dash-stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2.25rem;
  }

  .dash-stat-card {
    background: var(--pge-white);
    border: 1px solid var(--pge-cloud-mist);
    border-radius: 10px;
    padding: 1.65rem;
    display: flex;
    flex-direction: column;
    position: relative;
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.03);
    transition: all 0.22s ease-in-out;
  }

  .dash-stat-card::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3.5px;
    background: var(--pge-cloud-mist);
    transition: background 0.2s ease;
  }

  .dash-stat-card.card-gold::after { background: var(--pge-gold); }
  .dash-stat-card.card-navy::after { background: var(--pge-navy); }
  .dash-stat-card.card-slate::after { background: var(--pge-slate); }
  .dash-stat-card.card-midnight::after { background: #3B82F6; }

  .dash-stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 24px -4px rgba(37, 46, 71, 0.12);
    border-color: rgba(182, 153, 100, 0.5);
  }

  .dash-stat-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1.15rem;
  }

  .dash-stat-icon-wrap {
    width: 44px;
    height: 44px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .dash-stat-icon-wrap.icon-gold {
    background: rgba(182, 153, 100, 0.15);
    color: #8C7038;
  }

  .dash-stat-icon-wrap.icon-navy {
    background: rgba(37, 46, 71, 0.1);
    color: var(--pge-navy);
  }

  .dash-stat-icon-wrap.icon-slate {
    background: rgba(44, 64, 88, 0.1);
    color: var(--pge-slate);
  }

  .dash-stat-icon-wrap.icon-blue {
    background: rgba(37, 99, 235, 0.1);
    color: #1E40AF;
  }

  .dash-stat-icon-wrap svg {
    width: 22px;
    height: 22px;
    fill: currentColor;
  }

  .dash-stat-badge {
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    padding: 0.25rem 0.65rem;
    border-radius: 20px;
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
  }

  .dash-stat-label {
    font-size: 0.76rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #64748B;
    margin-bottom: 0.35rem;
  }

  .dash-stat-num {
    font-family: var(--font-title);
    font-size: 2.65rem;
    font-weight: 700;
    color: var(--pge-navy);
    line-height: 1;
    margin-bottom: 0.75rem;
  }

  .dash-stat-bar {
    width: 100%;
    height: 5px;
    background: #E2E8F0;
    border-radius: 3px;
    overflow: hidden;
    margin-bottom: 0.95rem;
  }

  .dash-stat-progress {
    height: 100%;
    background: var(--pge-gold);
    border-radius: 3px;
    transition: width 0.6s ease;
  }

  .dash-stat-footer {
    margin-top: auto;
    padding-top: 0.85rem;
    border-top: 1px solid var(--pge-cloud-mist);
    font-size: 0.78rem;
    color: #475569;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .dash-stat-footer-link {
    font-weight: 600;
    color: var(--pge-navy);
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    transition: gap 0.18s ease, color 0.18s ease;
  }

  .dash-stat-card:hover .dash-stat-footer-link {
    color: var(--pge-gold);
    gap: 0.6rem;
  }

  /* 4. ACTIVITY SECTIONS & HEADERS */
  .section-card {
    background: var(--pge-white);
    border: 1px solid var(--pge-cloud-mist);
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
    margin-bottom: 2rem;
    overflow: hidden;
  }

  .section-toolbar {
    padding: 1.25rem 1.6rem;
    border-bottom: 1px solid var(--pge-cloud-mist);
    background: var(--pge-white);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .section-title-wrap {
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .section-icon-badge {
    width: 34px;
    height: 34px;
    border-radius: 8px;
    background: rgba(37, 46, 71, 0.07);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--pge-navy);
  }

  .section-icon-badge svg {
    width: 17px;
    height: 17px;
    fill: currentColor;
  }

  .section-title {
    font-family: var(--font-title);
    font-size: 1.35rem;
    font-weight: 700;
    color: var(--pge-navy);
    line-height: 1.2;
  }

  .section-subtitle {
    font-size: 0.76rem;
    color: #64748B;
    margin-top: 0.15rem;
  }

  /* 5. CUSTOMER AVATARS & FLIGHT ROUTE VISUALIZER */
  .user-cell {
    display: flex;
    align-items: center;
    gap: 0.85rem;
  }

  .user-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--pge-navy) 0%, #171E31 100%);
    color: var(--pge-gold);
    font-family: var(--font-title);
    font-weight: 700;
    font-size: 0.88rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border: 1.5px solid rgba(182, 153, 100, 0.35);
  }

  .user-avatar.avatar-emerald {
    background: linear-gradient(135deg, #134E4A 0%, #042F2E 100%);
    color: #5EEAD4;
    border-color: rgba(94, 234, 212, 0.35);
  }

  .user-name {
    font-weight: 700;
    color: var(--pge-navy);
    font-size: 0.85rem;
  }

  .user-meta {
    font-size: 0.74rem;
    color: #64748B;
  }

  .route-visualizer {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
  }

  .route-badge {
    display: inline-block;
    padding: 0.2rem 0.55rem;
    background: #F1F5F9;
    border: 1px solid #CBD5E1;
    border-radius: 4px;
    font-size: 0.76rem;
    font-weight: 700;
    color: var(--pge-navy);
  }

  .route-plane {
    width: 14px;
    height: 14px;
    fill: var(--pge-gold);
    transform: rotate(90deg);
  }

  .cabin-pill {
    display: inline-block;
    padding: 0.22rem 0.65rem;
    border-radius: 4px;
    font-size: 0.74rem;
    font-weight: 600;
    text-transform: capitalize;
    background: #F8FAFC;
    color: var(--pge-slate);
    border: 1px solid #E2E8F0;
  }

  /* 6. SPLIT GRID & TABLES */
  .dash-split-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(460px, 1fr));
    gap: 1.75rem;
    align-items: start;
    margin-bottom: 2rem;
  }

  .dash-split-grid .section-card {
    margin-bottom: 0;
  }

  .table-compact th {
    padding: 0.85rem 1.25rem;
    background: #F8FAFC;
    color: #475569;
    font-size: 0.74rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    border-bottom: 1px solid var(--pge-cloud-mist);
  }

  .table-compact td {
    padding: 0.95rem 1.25rem;
    border-bottom: 1px solid #F1F5F9;
    font-size: 0.82rem;
    vertical-align: middle;
  }

  .table-compact tr:last-child td {
    border-bottom: none;
  }

  .table-compact tr:hover td {
    background-color: #F8FAFC;
  }

  /* 7. EMPTY STATES */
  .dash-empty-state {
    padding: 3rem 1.5rem;
    text-align: center;
  }

  .dash-empty-icon {
    width: 48px;
    height: 48px;
    margin: 0 auto 0.85rem;
    border-radius: 50%;
    background: #F1F5F9;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #94A3B8;
  }

  .dash-empty-icon svg {
    width: 24px;
    height: 24px;
    fill: currentColor;
  }

  .dash-empty-title {
    font-weight: 700;
    color: var(--pge-navy);
    font-size: 0.95rem;
    margin-bottom: 0.25rem;
  }

  .dash-empty-desc {
    color: #64748B;
    font-size: 0.8rem;
    max-width: 320px;
    margin: 0 auto;
  }

  /* 8. OPERATIONS SYSTEM FOOTER */
  .dash-ops-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
    padding: 1.25rem 1.6rem;
    background: var(--pge-white);
    border: 1px solid var(--pge-cloud-mist);
    border-radius: 8px;
    font-size: 0.78rem;
    color: #64748B;
  }

  .dash-ops-status {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: var(--pge-navy);
  }

  .ops-dot-online {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #22C55E;
    box-shadow: 0 0 0 2px rgba(34, 197, 94, 0.25);
  }

  .dash-ops-links {
    display: flex;
    align-items: center;
    gap: 1.25rem;
  }

  .dash-ops-links a {
    color: var(--pge-slate);
    text-decoration: none;
    font-weight: 600;
    transition: color 0.15s;
  }

  .dash-ops-links a:hover {
    color: var(--pge-gold);
  }

  @media (max-width: 768px) {
    .dash-hero {
      padding: 1.5rem;
    }
    .dash-hero-title {
      font-size: 1.7rem;
    }
    .dash-split-grid {
      grid-template-columns: 1fr;
    }
    .dash-ops-footer {
      flex-direction: column;
      align-items: flex-start;
    }
  }
</style>
@endsection

@section('content')

@php
  // Dynamic Greeting according to server hour
  $currentHour = (int) now()->format('H');
  if ($currentHour < 12) {
      $greeting = 'Good morning';
  } elseif ($currentHour < 17) {
      $greeting = 'Good afternoon';
  } else {
      $greeting = 'Good evening';
  }

  // Publication percentage for package health
  $totalPkgs = $packageStats['total'] ?? 0;
  $pubPkgs = $packageStats['published'] ?? 0;
  $pubPct = $totalPkgs > 0 ? round(($pubPkgs / $totalPkgs) * 100) : 100;
@endphp

<!-- 1. EXECUTIVE WELCOME & COMMAND BANNER -->
<section class="dash-hero">
  <div class="dash-hero-inner">
    <div class="dash-hero-left">
      <h1 class="dash-hero-title">
        {{ $greeting }}, <span>{{ auth()->user()->name ?? 'Expedition Staff' }}</span>
      </h1>
      <p class="dash-hero-sub">
        Welcome to the Premium Global Expeditions Operations Hub. Monitor real-time flight bookings, guest correspondence, package cataloging, and DMC partner credentials.
      </p>
    </div>

    <div class="dash-hero-actions">
      <a href="{{ route('admin.packages.create') }}" class="btn-hero-primary">
        <svg style="width: 16px; height: 16px; fill: currentColor;" viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
        Create Package
      </a>
      <a href="{{ route('home') }}" target="_blank" class="btn-hero-secondary">
        <svg style="width: 15px; height: 15px; fill: currentColor;" viewBox="0 0 24 24"><path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/></svg>
        View Live Site
      </a>
    </div>
  </div>
</section>

<!-- 2. QUICK ACTIONS HUB -->
<div class="quick-hub">
  <span class="quick-hub-label">Quick Actions:</span>

  <a href="{{ route('admin.packages.create') }}" class="quick-chip">
    <svg viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
    New Package
  </a>

  <a href="{{ route('admin.inquiries.index', ['status' => 'pending']) }}" class="quick-chip">
    <svg viewBox="0 0 24 24"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/></svg>
    Pending Flights ({{ $pendingFlightsCount }})
  </a>

  <a href="{{ route('admin.contacts.index', ['status' => 'unread']) }}" class="quick-chip">
    <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
    Unread Messages ({{ $unreadContactsCount }})
  </a>

  <a href="{{ route('admin.dmc.index', ['status' => 'pending_review']) }}" class="quick-chip">
    <svg viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
    DMC Applications ({{ $pendingDmcCount }})
  </a>
</div>

<!-- 3. ELEVATED METRIC STAT CARDS (4 CARDS) -->
<div class="dash-stats-grid">
  <!-- Card 1: Total Expeditions & Packages -->
  <div class="dash-stat-card card-gold">
    <div class="dash-stat-top">
      <div class="dash-stat-icon-wrap icon-gold">
        <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
      </div>
      <a href="{{ route('admin.packages.index') }}" class="btn btn-outline btn-sm">
        View All &rarr;
      </a>
    </div>
    <div class="dash-stat-label">Expedition Packages</div>
    <div class="dash-stat-num">{{ $packageStats['total'] }}</div>
    
    <div class="dash-stat-bar" title="{{ $pubPct }}% Published">
      <div class="dash-stat-progress" style="width: {{ $pubPct }}%;"></div>
    </div>

    <div class="dash-stat-footer" style="flex-wrap: wrap; gap: 0.4rem; padding-top: 0.65rem;">
      <a href="{{ route('admin.packages.index', ['status' => 'published']) }}" class="status-badge status-published" style="text-decoration: none; padding: 0.25rem 0.65rem; min-height: 24px; font-size: 0.72rem;">
        {{ $packageStats['published'] }} Published
      </a>
      <a href="{{ route('admin.packages.index', ['status' => 'draft']) }}" class="status-badge status-draft" style="text-decoration: none; padding: 0.25rem 0.65rem; min-height: 24px; font-size: 0.72rem;">
        {{ $packageStats['draft'] }} Draft
      </a>
      <a href="{{ route('admin.packages.index', ['status' => 'archived']) }}" class="status-badge status-archived" style="text-decoration: none; padding: 0.25rem 0.65rem; min-height: 24px; font-size: 0.72rem;">
        {{ $packageStats['archived'] }} Archived
      </a>
    </div>
  </div>

  <!-- Card 2: Flight Inquiries (Pending) -->
  <a href="{{ route('admin.inquiries.index', ['status' => 'pending']) }}" class="dash-stat-card card-navy">
    <div class="dash-stat-top">
      <div class="dash-stat-icon-wrap icon-navy">
        <svg viewBox="0 0 24 24"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/></svg>
      </div>
      <span class="status-badge status-pending">
        @if($pendingFlightsCount > 0)
          <span class="dash-tag-pulse" style="background-color: #F59E0B; box-shadow: 0 0 0 2px rgba(245, 158, 11, 0.3);"></span>
        @endif
        Pending Review
      </span>
    </div>
    <div class="dash-stat-label">New Flight Inquiries</div>
    <div class="dash-stat-num">{{ $pendingFlightsCount }}</div>
    <div class="dash-stat-footer">
      <span>Requires ticketing concierge quote</span>
      <span class="dash-stat-footer-link">Review &rarr;</span>
    </div>
  </a>

  <!-- Card 3: Unread Contact Messages -->
  <a href="{{ route('admin.contacts.index', ['status' => 'unread']) }}" class="dash-stat-card card-slate">
    <div class="dash-stat-top">
      <div class="dash-stat-icon-wrap icon-slate">
        <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
      </div>
      <span class="status-badge status-unread">
        @if($unreadContactsCount > 0)
          <span class="dash-tag-pulse" style="background-color: #EF4444; box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.3);"></span>
        @endif
        Unread
      </span>
    </div>
    <div class="dash-stat-label">Unread Messages</div>
    <div class="dash-stat-num">{{ $unreadContactsCount }}</div>
    <div class="dash-stat-footer">
      <span>Requires staff response</span>
      <span class="dash-stat-footer-link">Open Inbox &rarr;</span>
    </div>
  </a>

  <!-- Card 4: Pending DMC Applications -->
  <a href="{{ route('admin.dmc.index', ['status' => 'pending_review']) }}" class="dash-stat-card card-midnight">
    <div class="dash-stat-top">
      <div class="dash-stat-icon-wrap icon-blue">
        <svg viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
      </div>
      <span class="status-badge status-pending_review">Awaiting Review</span>
    </div>
    <div class="dash-stat-label">Pending DMC Apps</div>
    <div class="dash-stat-num">{{ $pendingDmcCount }}</div>
    <div class="dash-stat-footer">
      <span>Awaiting credential verification</span>
      <span class="dash-stat-footer-link">Verify &rarr;</span>
    </div>
  </a>
</div>

<!-- 4. RECENT FLIGHT INQUIRIES SECTION -->
<div class="section-card">
  <div class="section-toolbar">
    <div class="section-title-wrap">
      <div class="section-icon-badge">
        <svg viewBox="0 0 24 24"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/></svg>
      </div>
      <div>
        <h2 class="section-title">Recent Flight Concierge Inquiries</h2>
        <p class="section-subtitle">Real-time flight ticketing requests requiring quotation and itinerary preparation</p>
      </div>
    </div>
    <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline btn-sm">
      View All Flight Requests &rarr;
    </a>
  </div>

  <div class="table-responsive">
    <table class="admin-table table-compact">
      <thead>
        <tr>
          <th style="width: 130px;">Received</th>
          <th>Customer</th>
          <th>Flight Route</th>
          <th>Class</th>
          <th>Status</th>
          <th style="text-align: right; width: 140px;">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse($recentFlights as $inquiry)
          @php
            $initials = strtoupper(substr(trim($inquiry->full_name ?: 'Guest'), 0, 2));
          @endphp
          <tr>
            <td style="white-space: nowrap; color: #475569; font-weight: 500;">
              {{ $inquiry->created_at->format('M d, Y') }}<br>
              <span style="font-size: 0.72rem; color: #94A3B8;">{{ $inquiry->created_at->format('h:i A') }}</span>
            </td>
            <td>
              <div class="user-cell">
                <div class="user-avatar" title="{{ $inquiry->full_name }}">
                  {{ $initials }}
                </div>
                <div>
                  <div class="user-name">{{ $inquiry->full_name }}</div>
                  <div class="user-meta">{{ $inquiry->email }}</div>
                </div>
              </div>
            </td>
            <td>
              @if($inquiry->trip_type === 'multicity')
                <span class="status-badge status-quoted" style="font-size: 0.72rem; padding: 0.2rem 0.65rem;">Multi-City Journey</span>
              @else
                <div class="route-visualizer">
                  <span class="route-badge">{{ $inquiry->dep_city ?: 'N/A' }}</span>
                  <svg class="route-plane" viewBox="0 0 24 24"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/></svg>
                  <span class="route-badge">{{ $inquiry->dest_city ?: 'N/A' }}</span>
                </div>
              @endif
            </td>
            <td>
              <span class="cabin-pill">{{ $inquiry->cabin_class ?: 'Economy' }}</span>
            </td>
            <td>
              <span class="status-badge status-{{ $inquiry->status }}">
                {{ str_replace('_', ' ', $inquiry->status) }}
              </span>
            </td>
            <td style="text-align: right; white-space: nowrap;">
              <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="btn btn-outline btn-sm">
                Review &rarr;
              </a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6">
              <div class="dash-empty-state">
                <div class="dash-empty-icon">
                  <svg viewBox="0 0 24 24"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/></svg>
                </div>
                <div class="dash-empty-title">No Flight Inquiries Recorded</div>
                <div class="dash-empty-desc">New passenger ticketing inquiries submitted from the website will appear here in real time.</div>
              </div>
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<!-- 5. SPLIT GRID: RECENT CONTACTS & RECENT DMC APPLICATIONS -->
<div class="dash-split-grid">
  <!-- Left Column: Recent Contact Messages -->
  <div class="section-card">
    <div class="section-toolbar">
      <div class="section-title-wrap">
        <div class="section-icon-badge">
          <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
        </div>
        <div>
          <h2 class="section-title" style="font-size: 1.2rem;">Guest Inquiries & Messages</h2>
          <p class="section-subtitle">Direct inquiries received from contact portal</p>
        </div>
      </div>
      <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline btn-sm">
        View All &rarr;
      </a>
    </div>

    <div class="table-responsive">
      <table class="admin-table table-compact">
        <thead>
          <tr>
            <th style="width: 80px;">Date</th>
            <th>Guest</th>
            <th>Subject</th>
            <th>Status</th>
            <th style="text-align: right; width: 80px;">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($recentContacts as $c)
            @php
              $contactInitials = strtoupper(substr(trim($c->full_name ?: 'Guest'), 0, 2));
            @endphp
            <tr class="{{ $c->status === 'unread' ? 'unread-row' : '' }}">
              <td style="white-space: nowrap; color: #64748B; font-weight: 500;">
                {{ $c->created_at->format('M d') }}
              </td>
              <td>
                <div class="user-cell">
                  <div class="user-avatar" style="width: 30px; height: 30px; font-size: 0.76rem;">
                    {{ $contactInitials }}
                  </div>
                  <div>
                    <div class="user-name" style="font-size: 0.82rem;">
                      @if($c->status === 'unread')
                        <span class="unread-indicator" title="Unread inquiry"></span>
                      @endif
                      {{ $c->full_name }}
                    </div>
                  </div>
                </div>
              </td>
              <td style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $c->subject }}">
                {{ $c->subject }}
              </td>
              <td>
                <span class="status-badge status-{{ $c->status }}" style="font-size: 0.7rem; padding: 0.2rem 0.6rem; min-height: 22px;">
                  {{ str_replace('_', ' ', $c->status) }}
                </span>
              </td>
              <td style="text-align: right; white-space: nowrap;">
                <a href="{{ route('admin.contacts.show', $c->id) }}" class="btn btn-outline btn-sm" style="padding: 0 0.75rem; height: 28px; min-height: 28px;">
                  View
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5">
                <div class="dash-empty-state" style="padding: 2rem 1rem;">
                  <div class="dash-empty-icon" style="width: 40px; height: 40px;">
                    <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                  </div>
                  <div class="dash-empty-title" style="font-size: 0.9rem;">No Guest Inquiries</div>
                  <div class="dash-empty-desc">All messages have been addressed.</div>
                </div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Right Column: Recent DMC Registrations -->
  <div class="section-card">
    <div class="section-toolbar">
      <div class="section-title-wrap">
        <div class="section-icon-badge">
          <svg viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
        </div>
        <div>
          <h2 class="section-title" style="font-size: 1.2rem;">Recent DMC Applications</h2>
          <p class="section-subtitle">Destination Management Company partnership requests</p>
        </div>
      </div>
      <a href="{{ route('admin.dmc.index') }}" class="btn btn-outline btn-sm">
        View All &rarr;
      </a>
    </div>

    <div class="table-responsive">
      <table class="admin-table table-compact">
        <thead>
          <tr>
            <th>Company</th>
            <th>Country</th>
            <th>Status</th>
            <th style="text-align: right; width: 80px;">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($recentDmcs as $dmc)
            @php
              $dmcInitials = strtoupper(substr(trim($dmc->company_name ?: 'DMC'), 0, 2));
            @endphp
            <tr>
              <td>
                <div class="user-cell">
                  <div class="user-avatar avatar-emerald" style="width: 30px; height: 30px; font-size: 0.76rem;">
                    {{ $dmcInitials }}
                  </div>
                  <div>
                    <div class="user-name" style="font-size: 0.82rem;">{{ $dmc->company_name }}</div>
                    <div class="user-meta">{{ $dmc->contact_person }}</div>
                  </div>
                </div>
              </td>
              <td>
                <span style="font-weight: 500; color: #334155;">{{ $dmc->country }}</span>
              </td>
              <td>
                <span class="status-badge status-{{ $dmc->status }}" style="font-size: 0.7rem; padding: 0.2rem 0.6rem; min-height: 22px;">
                  {{ str_replace('_', ' ', $dmc->status) }}
                </span>
              </td>
              <td style="text-align: right; white-space: nowrap;">
                <a href="{{ route('admin.dmc.show', $dmc->id) }}" class="btn btn-outline btn-sm" style="padding: 0 0.75rem; height: 28px; min-height: 28px;">
                  View
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4">
                <div class="dash-empty-state" style="padding: 2rem 1rem;">
                  <div class="dash-empty-icon" style="width: 40px; height: 40px;">
                    <svg viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                  </div>
                  <div class="dash-empty-title" style="font-size: 0.9rem;">No DMC Applications</div>
                  <div class="dash-empty-desc">New global partner submissions will appear here.</div>
                </div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
