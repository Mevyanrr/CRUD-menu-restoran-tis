<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — SiMeRa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Lora:wght@600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --bg:      #F2EFE9;
            --surface: #FDFCF9;
            --border:  #E2DDD5;
            --ink:     #1C1A17;
            --ink2:    #5A5650;
            --ink3:    #9A948C;
            --accent:  #C94F2C;
            --sidebar: #1C1A17;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg);
            color: var(--ink);
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background: var(--sidebar);
            min-height: 100vh;
            position: fixed;
            left: 0; top: 0; bottom: 0;
            display: flex;
            flex-direction: column;
            z-index: 10;
        }

        .sb-logo {
            padding: 28px 24px 22px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .sb-logo__title {
            font-family: 'Lora', serif;
            font-size: 19px;
            color: #fff;
            font-weight: 600;
        }
        .sb-logo__title span { color: #C94F2C; }
        .sb-logo__sub {
            font-size: 11px;
            color: rgba(255,255,255,0.28);
            margin-top: 3px;
        }

        .sb-nav { padding: 18px 12px; flex: 1; }

        .sb-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 500;
            color: rgba(255,255,255,0.42);
            text-decoration: none;
            margin-bottom: 2px;
            transition: all 0.15s;
        }
        .sb-item:hover { color: rgba(255,255,255,0.82); background: rgba(255,255,255,0.05); }
        .sb-item.active { background: #C94F2C; color: #fff; }
        .sb-item__icon { font-size: 15px; width: 18px; text-align: center; }

        .sb-footer {
            padding: 16px;
            border-top: 1px solid rgba(255,255,255,0.06);
        }
        .sb-user { display: flex; align-items: center; gap: 10px; }
        .sb-user__avatar {
            width: 34px; height: 34px;
            background: #C94F2C;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-family: 'Lora', serif;
            font-size: 14px; font-weight: 700; color: #fff;
            flex-shrink: 0;
        }
        .sb-user__name { font-size: 13px; font-weight: 600; color: rgba(255,255,255,0.82); }
        .sb-user__role { font-size: 11px; color: rgba(255,255,255,0.28); margin-top: 1px; }
        .sb-user__logout {
            margin-left: auto;
            background: none; border: none;
            color: rgba(255,255,255,0.22);
            font-size: 16px; cursor: pointer;
            transition: color 0.15s; padding: 4px;
            text-decoration: none;
        }
        .sb-user__logout:hover { color: #C94F2C; }

        /* MAIN */
        .main {
            margin-left: 220px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .topbar {
            height: 58px;
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 36px;
            position: sticky; top: 0; z-index: 5;
        }
        .topbar__title { font-size: 15px; font-weight: 600; }
        .topbar__count {
            font-size: 12px;
            color: var(--ink3);
            background: var(--bg);
            border: 1px solid var(--border);
            padding: 5px 13px;
            border-radius: 100px;
        }

        /* Dashboard Content */
        .dashboard { padding: 40px 36px; }

        /* Greeting */
        .greeting {
            background: var(--sidebar);
            border-radius: 18px;
            padding: 40px 44px;
            position: relative;
            overflow: hidden;
            margin-bottom: 32px;
        }
        .greeting::before {
            content: '';
            position: absolute;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(201,79,44,0.2) 0%, transparent 65%);
            top: -120px; right: -80px;
            pointer-events: none;
        }
        .greeting__deco {
            position: absolute;
            right: 44px; top: 50%;
            transform: translateY(-50%);
            font-size: 80px;
            opacity: 0.07;
            pointer-events: none;
            line-height: 1;
        }
        .greeting__eyebrow {
            font-size: 11.5px; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.12em;
            color: #C94F2C;
            margin-bottom: 10px;
            position: relative; z-index: 1;
        }
        .greeting__title {
            font-family: 'Lora', serif;
            font-size: 30px; font-weight: 600;
            color: #fff; line-height: 1.25;
            margin-bottom: 10px;
            position: relative; z-index: 1;
        }
        .greeting__title span { color: #C94F2C; }
        .greeting__desc {
            font-size: 13.5px;
            color: rgba(255,255,255,0.45);
            max-width: 460px; line-height: 1.65;
            position: relative; z-index: 1;
        }
        .greeting__desc strong { color: rgba(255,255,255,0.7); }

        /* Section */
        .section-title {
            font-family: 'Lora', serif;
            font-size: 19px; font-weight: 600;
            margin-bottom: 16px;
        }

        /* Menu */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(165px, 1fr));
            gap: 12px;
        }

        .menu-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 11px;
            overflow: hidden;
            transition: box-shadow 0.18s, transform 0.18s;
        }
        .menu-card:hover {
            box-shadow: 0 6px 18px rgba(28,26,23,0.10);
            transform: translateY(-2px);
        }
        .menu-card__img {
            width: 100%; aspect-ratio: 4/3;
            object-fit: cover; display: block;
        }
        .menu-card__placeholder {
            width: 100%; aspect-ratio: 4/3;
            background: linear-gradient(135deg, #EDE8E0 0%, #D9D2C7 100%);
            display: flex; align-items: center; justify-content: center;
            font-size: 36px;
        }
        .menu-card__body { padding: 11px 12px 13px; }
        .menu-card__name {
            font-size: 13px; font-weight: 700; color: var(--ink);
            margin-bottom: 3px;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .menu-card__price {
            font-family: 'Lora', serif;
            font-size: 13.5px; font-weight: 600; color: #C94F2C;
            margin-bottom: 4px;
        }
        .menu-card__desc {
            font-size: 11px; color: var(--ink3); line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
        }

        /* Empty */
        .empty {
            background: var(--surface);
            border: 1px dashed var(--border);
            border-radius: 13px;
            text-align: center;
            padding: 56px 24px;
        }
        .empty__icon { font-size: 36px; opacity: 0.35; margin-bottom: 12px; }
        .empty__text { font-size: 14px; font-weight: 500; color: var(--ink2); margin-bottom: 5px; }
        .empty__sub { font-size: 12.5px; color: var(--ink3); }
    </style>
</head>
<body>

<!-- Sidebar -->
<aside class="sidebar">
    <div class="sb-logo">
        <div class="sb-logo__title">Si<span>MeRa</span></div>
        <div class="sb-logo__sub">Sistem Manajemen Menu</div>
    </div>
    <nav class="sb-nav">
        <a href="{{ route('dashboard') }}" class="sb-item active">
            <span class="sb-item__icon">🏠</span> Dashboard
        </a>
        <a href="{{ route('menus.index') }}" class="sb-item">
            <span class="sb-item__icon">📋</span> Daftar Menu
        </a>
    </nav>
    <div class="sb-footer">
        <div class="sb-user">
            <div class="sb-user__avatar">A</div>
            <div>
                <div class="sb-user__name">Admin</div>
                <div class="sb-user__role">Pemilik Restoran</div>
            </div>
            <a href="{{ route('logout') }}" class="sb-user__logout"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                ⏻
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        </div>
    </div>
</aside>

<!-- Main -->
<div class="main">
    <div class="topbar">
        <div class="topbar__title">Dashboard</div>
        <div class="topbar__count">{{ $totalMenu }} menu</div>
    </div>

    <div class="dashboard">

        <!-- Greeting -->
        <div class="greeting">
            <div class="greeting__eyebrow">Selamat Datang</div>
            <div class="greeting__title">
                Halo, <span>Admin</span>!<br>
                Selamat datang di <span>SiMeRa</span>.
            </div>
            <div class="greeting__desc">
                Kelola seluruh menu restoran Anda dengan mudah dan cepat.
                Tambah, ubah, atau hapus menu kapan saja melalui halaman
                <strong>Daftar Menu</strong>.
            </div>
        </div>

        <!-- Menu list -->
        <div class="section-title">Menu Restoran</div>

        @if ($menus->isEmpty())
            <div class="empty">
                <div class="empty__icon">🍽️</div>
                <div class="empty__text">Belum ada menu</div>
                <div class="empty__sub">Tambah menu melalui halaman Daftar Menu</div>
            </div>
        @else
            <div class="menu-grid">
                @foreach ($menus as $menu)
                    <div class="menu-card">
                        @if ($menu->gambar)
                            <img class="menu-card__img"
                                 src="{{ asset('storage/' . $menu->gambar) }}"
                                 alt="{{ $menu->nama_menu }}">
                        @else
                            <div class="menu-card__placeholder">🍽️</div>
                        @endif
                        <div class="menu-card__body">
                            <div class="menu-card__name">{{ $menu->nama_menu }}</div>
                            <div class="menu-card__price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</div>
                            @if ($menu->deskripsi)
                                <div class="menu-card__desc">{{ $menu->deskripsi }}</div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>

</body>
</html>