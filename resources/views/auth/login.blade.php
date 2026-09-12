<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Login — Premium Global Expeditions Inc.</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <style>
    body.login-page {
      min-height: 100vh;
      background: radial-gradient(circle at top, #2C4058 0%, #121525 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
      font-family: var(--font-ui);
    }
    .login-card {
      width: 100%;
      max-width: 440px;
      background-color: var(--pge-navy);
      border: 1px solid rgba(182, 153, 100, 0.35);
      border-radius: 12px;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
      overflow: hidden;
      color: var(--pge-white);
    }
    .login-header {
      padding: 2.25rem 2rem 1.5rem;
      text-align: center;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      background-color: rgba(18, 21, 37, 0.4);
    }
    .login-logo-title {
      font-family: var(--font-title);
      font-size: 1.65rem;
      font-weight: 700;
      color: var(--pge-gold);
      letter-spacing: 0.08em;
      text-transform: uppercase;
      margin-bottom: 0.35rem;
    }
    .login-logo-sub {
      font-size: 0.72rem;
      text-transform: uppercase;
      letter-spacing: 0.16em;
      color: var(--pge-cloud-mist);
      opacity: 0.85;
    }
    .login-body {
      padding: 2rem;
    }
    .login-form-group {
      margin-bottom: 1.35rem;
    }
    .login-label {
      display: block;
      font-size: 0.76rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      color: var(--pge-gold-light);
      margin-bottom: 0.45rem;
    }
    .login-input {
      width: 100%;
      padding: 0.65rem 0.95rem;
      font-size: 0.88rem;
      background-color: rgba(18, 21, 37, 0.6);
      border: 1px solid rgba(182, 153, 100, 0.3);
      border-radius: 4px;
      color: var(--pge-white);
      outline: none;
      font-family: var(--font-ui);
      transition: all 0.2s;
    }
    .login-input:focus {
      border-color: var(--pge-gold);
      box-shadow: 0 0 0 3px rgba(182, 153, 100, 0.25);
      background-color: rgba(18, 21, 37, 0.9);
    }
    .login-btn {
      width: 100%;
      padding: 0.75rem;
      font-size: 0.88rem;
      font-weight: 700;
      background-color: var(--pge-gold);
      color: #121525;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      transition: all 0.2s;
    }
    .login-btn:hover {
      background-color: var(--pge-gold-hover);
      color: #FFF;
    }
    .login-alert {
      background-color: rgba(220, 38, 38, 0.15);
      border: 1px solid rgba(220, 38, 38, 0.4);
      color: #FCA5A5;
      padding: 0.75rem 1rem;
      border-radius: 4px;
      margin-bottom: 1.25rem;
      font-size: 0.8rem;
    }
  </style>
</head>
<body class="login-page">

  <div class="login-card">
    <div class="login-header">
      <div class="login-logo-title">Premium Global</div>
      <div class="login-logo-sub">Concierge & Staff Management Hub</div>
    </div>

    <div class="login-body">
      @if($errors->any())
        <div class="login-alert">
          @foreach($errors->all() as $error)
            <div>&bull; {{ $error }}</div>
          @endforeach
        </div>
      @endif

      <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <div class="login-form-group">
          <label class="login-label" for="email">Staff Email Address</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus class="login-input" placeholder="admin@pge.com">
        </div>

        <div class="login-form-group">
          <label class="login-label" for="password">Password</label>
          <input type="password" id="password" name="password" required class="login-input" placeholder="••••••••••••">
        </div>

        <div class="login-form-group" style="display: flex; align-items: center; justify-content: space-between;">
          <label style="display: flex; align-items: center; gap: 0.45rem; font-size: 0.78rem; color: #CBD5E1; cursor: pointer;">
            <input type="checkbox" name="remember" value="1"> Remember this workstation
          </label>
        </div>

        <button type="submit" class="login-btn">
          Authenticate & Access Hub &rarr;
        </button>
      </form>
    </div>
  </div>

</body>
</html>
