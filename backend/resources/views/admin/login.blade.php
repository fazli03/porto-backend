<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin — Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=DM+Mono:wght@300;400;500&display=swap" rel="stylesheet" />
  <style>
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

    :root {
      --bg:        #0a0a0a;
      --surface:   #141414;
      --border:    #242424;
      --text:      #fffbf1;
      --muted:     #666;
      --accent:    #ffc94d;
      --error:     #e74c3c;
      --mono:      'DM Mono', monospace;
      --sans:      'Space Grotesk', sans-serif;
    }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: var(--sans);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px;
    }

    .login-wrap {
      width: 100%;
      max-width: 400px;
    }

    .login-brand {
      font-family: var(--mono);
      font-size: 10px;
      letter-spacing: 0.22em;
      color: var(--muted);
      text-transform: uppercase;
      margin-bottom: 48px;
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .login-brand::before {
      content: '';
      width: 20px;
      height: 1px;
      background: var(--accent);
    }

    .login-title {
      font-size: 32px;
      font-weight: 700;
      letter-spacing: -0.03em;
      text-transform: uppercase;
      line-height: 1;
      margin-bottom: 8px;
    }

    .login-sub {
      font-family: var(--mono);
      font-size: 11px;
      color: var(--muted);
      letter-spacing: 0.1em;
      margin-bottom: 48px;
    }

    .field {
      border-bottom: 1px solid var(--border);
      margin-bottom: 0;
      transition: border-color 0.2s;
    }
    .field:focus-within { border-color: var(--accent); }

    .field label {
      display: block;
      font-family: var(--mono);
      font-size: 9px;
      letter-spacing: 0.22em;
      color: var(--muted);
      text-transform: uppercase;
      padding: 20px 0 6px;
    }

    .field input {
      width: 100%;
      background: transparent;
      border: none;
      outline: none;
      color: var(--text);
      font-family: var(--sans);
      font-size: 15px;
      padding-bottom: 16px;
    }
    .field input::placeholder { color: var(--muted); opacity: 0.4; }

    .error-msg {
      font-family: var(--mono);
      font-size: 10px;
      color: var(--error);
      letter-spacing: 0.1em;
      margin-top: 16px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .error-msg::before { content: '—'; }

    .btn-login {
      margin-top: 40px;
      width: 100%;
      background: var(--accent);
      color: var(--bg);
      font-family: var(--mono);
      font-size: 11px;
      font-weight: 500;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      padding: 20px;
      border: none;
      cursor: pointer;
      transition: opacity 0.2s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
    }
    .btn-login:hover { opacity: 0.88; }
    .btn-login:active { opacity: 0.75; }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 28px;
      font-family: var(--mono);
      font-size: 10px;
      letter-spacing: 0.15em;
      color: var(--muted);
      text-decoration: none;
      text-transform: uppercase;
      transition: color 0.2s;
    }
    .back-link:hover { color: var(--text); }

    .corner-deco {
      position: fixed;
      bottom: 32px;
      right: 32px;
      font-family: var(--mono);
      font-size: 9px;
      letter-spacing: 0.2em;
      color: var(--border);
      text-transform: uppercase;
    }
  </style>
</head>
<body>

  <div class="login-wrap">
    <p class="login-brand">Portfolio Admin</p>
    <h1 class="login-title">Sign In</h1>
    <p class="login-sub">Masukkan password untuk mengakses panel.</p>

    <form method="POST" action="{{ route('admin.login.post') }}">
      @csrf
      <div class="field">
        <label for="password">Password</label>
        <input
          type="password"
          id="password"
          name="password"
          placeholder="••••••••••"
          autocomplete="current-password"
          autofocus
        />
      </div>

      @error('password')
        <p class="error-msg">{{ $message }}</p>
      @enderror

      <button type="submit" class="btn-login">
        Masuk
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none">
          <path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </button>
    </form>

    <a href="http://localhost:5173" class="back-link">← Kembali ke Portfolio</a>
  </div>

  <span class="corner-deco">Restricted Area</span>

</body>
</html>
