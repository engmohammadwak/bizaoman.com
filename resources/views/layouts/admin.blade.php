<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') · BIZA</title>
    <style>
        :root { --brand: #4f8e89; --brand-dark: #376f6b; --ink: #253b3b; --muted: #718080; --surface: #f4f8f7; --line: #dce9e7; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; color: var(--ink); background: var(--surface); font-family: Arial, sans-serif; }
        a { color: inherit; text-decoration: none; }
        .admin-shell { display: flex; min-height: 100vh; }
        .admin-sidebar { width: 250px; padding: 28px 20px; color: #fff; background: var(--brand-dark); }
        .admin-brand { display: flex; align-items: center; gap: 12px; margin-bottom: 42px; font-size: 22px; font-weight: 700; }
        .admin-brand img { width: 46px; height: 46px; object-fit: contain; border-radius: 10px; background: #fff; }
        .admin-nav { display: grid; gap: 8px; }
        .admin-nav a { padding: 12px 14px; border-radius: 10px; color: rgba(255,255,255,.82); }
        .admin-nav a:hover, .admin-nav a.active { color: #fff; background: rgba(255,255,255,.14); }
        .admin-main { flex: 1; padding: 34px clamp(22px, 4vw, 58px); }
        .admin-topbar { display: flex; align-items: center; justify-content: space-between; gap: 20px; margin-bottom: 34px; }
        .admin-eyebrow { margin: 0 0 6px; color: var(--brand); font-size: 13px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; }
        h1 { margin: 0; font-size: clamp(28px, 4vw, 42px); }
        .admin-date { color: var(--muted); font-size: 14px; }
        .admin-stats { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 16px; margin-bottom: 26px; }
        .stat-card, .admin-panel { border: 1px solid var(--line); border-radius: 16px; background: #fff; box-shadow: 0 8px 24px rgba(55,111,107,.06); }
        .stat-card { padding: 22px; }
        .stat-label { color: var(--muted); font-size: 14px; }
        .stat-value { margin: 12px 0 8px; font-size: 32px; font-weight: 700; }
        .stat-change { color: var(--brand); font-size: 13px; font-weight: 700; }
        .admin-grid { display: grid; grid-template-columns: 1.35fr 1fr; gap: 20px; }
        .admin-panel { padding: 24px; }
        .admin-panel h2 { margin: 0 0 20px; font-size: 19px; }
        .activity { display: grid; gap: 16px; }
        .activity-item { display: flex; justify-content: space-between; gap: 15px; padding-bottom: 16px; border-bottom: 1px solid var(--line); }
        .activity-item:last-child { padding-bottom: 0; border-bottom: 0; }
        .activity-title { margin: 0 0 5px; font-weight: 700; }
        .activity-meta { margin: 0; color: var(--muted); font-size: 13px; }
        .badge { height: fit-content; padding: 6px 9px; border-radius: 999px; color: var(--brand-dark); background: #e6f2f0; font-size: 12px; font-weight: 700; }
        @media (max-width: 900px) { .admin-stats { grid-template-columns: repeat(2, 1fr); } .admin-grid { grid-template-columns: 1fr; } }
        @media (max-width: 640px) { .admin-shell { display: block; } .admin-sidebar { width: auto; padding: 18px; } .admin-brand { margin-bottom: 18px; } .admin-nav { display: flex; flex-wrap: wrap; } .admin-nav a { padding: 9px 11px; font-size: 14px; } .admin-main { padding: 26px 18px; } .admin-topbar { display: block; } .admin-date { margin-top: 10px; } .admin-stats { grid-template-columns: 1fr; } }
    </style>
    @stack('head')
</head>
<body>
    <div class="admin-shell">
        @include('components.admin.sidebar')
        <main class="admin-main">@yield('content')</main>
    </div>
    @stack('scripts')
</body>
</html>
