<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu — SiMeRa</title>
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
            font-size: 19px; color: #fff; font-weight: 600;
        }
        .sb-logo__title span { color: #C94F2C; }
        .sb-logo__sub { font-size: 11px; color: rgba(255,255,255,0.28); margin-top: 3px; }

        .sb-nav { padding: 18px 12px; flex: 1; }
        .sb-item {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 12px; border-radius: 8px;
            font-size: 13.5px; font-weight: 500;
            color: rgba(255,255,255,0.42);
            text-decoration: none; margin-bottom: 2px;
            transition: all 0.15s;
        }
        .sb-item:hover { color: rgba(255,255,255,0.82); background: rgba(255,255,255,0.05); }
        .sb-item.active { background: #C94F2C; color: #fff; }
        .sb-item__icon { font-size: 15px; width: 18px; text-align: center; }

        .sb-footer { padding: 16px; border-top: 1px solid rgba(255,255,255,0.06); }
        .sb-user { display: flex; align-items: center; gap: 10px; }
        .sb-user__avatar {
            width: 34px; height: 34px; background: #C94F2C;
            border-radius: 8px; display: flex; align-items: center; justify-content: center;
            font-family: 'Lora', serif; font-size: 14px; font-weight: 700; color: #fff; flex-shrink: 0;
        }
        .sb-user__name { font-size: 13px; font-weight: 600; color: rgba(255,255,255,0.82); }
        .sb-user__role { font-size: 11px; color: rgba(255,255,255,0.28); margin-top: 1px; }
        .sb-user__logout {
            margin-left: auto; background: none; border: none;
            color: rgba(255,255,255,0.22); font-size: 16px;
            cursor: pointer; transition: color 0.15s; padding: 4px; text-decoration: none;
        }
        .sb-user__logout:hover { color: #C94F2C; }

        /* Main */
        .main { margin-left: 220px; flex: 1; display: flex; flex-direction: column; min-height: 100vh; }

        .topbar {
            height: 58px; background: var(--surface);
            border-bottom: 1px solid var(--border);
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 36px; position: sticky; top: 0; z-index: 5;
        }
        .topbar__title { font-size: 15px; font-weight: 600; }
        .topbar__count {
            font-size: 12px; color: var(--ink3);
            background: var(--bg); border: 1px solid var(--border);
            padding: 5px 13px; border-radius: 100px;
        }

        /* Content */
        .content { padding: 36px; }

        .page-header {
            display: flex; align-items: flex-start;
            justify-content: space-between; margin-bottom: 28px;
        }
        .page-header__eyebrow {
            font-size: 11px; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.1em;
            color: var(--accent); margin-bottom: 5px;
        }
        .page-header__title {
            font-family: 'Lora', serif; font-size: 26px; font-weight: 600;
        }
        .page-header__sub { font-size: 13px; color: var(--ink3); margin-top: 4px; }

        .btn-add {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 11px 22px; background: var(--ink); color: #fff;
            border: none; border-radius: 9px;
            font-family: 'Poppins', sans-serif; font-size: 13.5px; font-weight: 600;
            cursor: pointer; transition: all 0.18s; flex-shrink: 0; text-decoration: none;
        }
        .btn-add:hover { background: var(--accent); transform: translateY(-1px); }

        /* Alert */
        .alert {
            padding: 12px 16px; border-radius: 10px;
            font-size: 13px; font-weight: 500; margin-bottom: 24px;
        }
        .alert--success { background: #DCFCE7; border: 1px solid #86EFAC; color: #166534; }
        .alert--error   { background: #FEE2E2; border: 1px solid #FCA5A5; color: #991B1B; }

        /* Grid */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(175px, 1fr));
            gap: 12px;
        }

        .menu-card {
            background: var(--surface); border: 1px solid var(--border);
            border-radius: 11px; overflow: hidden;
            transition: box-shadow 0.18s, transform 0.18s;
        }
        .menu-card:hover { box-shadow: 0 6px 20px rgba(28,26,23,0.10); transform: translateY(-2px); border-color: #ccc; }

        .menu-card__img { width: 100%; aspect-ratio: 4/3; object-fit: cover; display: block; }
        .menu-card__placeholder {
            width: 100%; aspect-ratio: 4/3;
            background: linear-gradient(135deg, #EDE8E0 0%, #D9D2C7 100%);
            display: flex; align-items: center; justify-content: center; font-size: 36px;
        }
        .menu-card__body { padding: 11px 12px 12px; }
        .menu-card__name {
            font-size: 13px; font-weight: 700; color: var(--ink);
            margin-bottom: 3px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .menu-card__price {
            font-family: 'Lora', serif; font-size: 13.5px;
            font-weight: 600; color: var(--accent); margin-bottom: 4px;
        }
        .menu-card__desc {
            font-size: 11px; color: var(--ink3); line-height: 1.5;
            display: -webkit-box; -webkit-line-clamp: 2;
            -webkit-box-orient: vertical; overflow: hidden;
        }
        .menu-card__footer {
            display: flex; gap: 5px;
            padding: 8px 10px; border-top: 1px solid var(--border);
            background: #FAFAF7;
        }
        .btn-card {
            flex: 1; padding: 6px; border-radius: 6px;
            border: 1px solid var(--border); background: transparent;
            font-family: 'Poppins', sans-serif; font-size: 11.5px; font-weight: 500;
            cursor: pointer; transition: all 0.15s; color: var(--ink2);
            text-decoration: none; text-align: center; display: block;
        }
        .btn-card:hover { background: var(--bg); border-color: #bbb; }
        .btn-card--del:hover { background: #FEE2E2; border-color: #FCA5A5; color: #DC2626; }

        /* Empty */
        .empty {
            text-align: center; padding: 80px 20px; color: var(--ink3);
        }
        .empty__icon { font-size: 48px; opacity: 0.35; margin-bottom: 14px; }
        .empty__text { font-size: 15px; color: var(--ink2); font-weight: 500; margin-bottom: 5px; }
        .empty__sub { font-size: 13px; margin-bottom: 24px; }
        .empty__cta {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 11px 24px; background: var(--accent); color: #fff;
            border: none; border-radius: 9px;
            font-family: 'Poppins', sans-serif; font-size: 13.5px; font-weight: 600;
            cursor: pointer; transition: all 0.18s; text-decoration: none;
        }
        .empty__cta:hover { background: #B8421F; transform: translateY(-1px); }

        /* Modal */
        .overlay {
            position: fixed; inset: 0;
            background: rgba(28,26,23,0.55);
            backdrop-filter: blur(3px);
            z-index: 100;
            display: none; align-items: center; justify-content: center;
        }
        .overlay.open { display: flex; }

        .modal {
            background: var(--surface); border-radius: 16px;
            width: 460px; max-width: 95vw; overflow: hidden;
            box-shadow: 0 32px 80px rgba(28,26,23,0.25);
            animation: slideUp 0.22s ease;
        }
        @keyframes slideUp {
            from { opacity:0; transform: translateY(16px); }
            to   { opacity:1; transform: translateY(0); }
        }
        .modal__head {
            padding: 22px 24px 0;
            display: flex; align-items: center; justify-content: space-between;
        }
        .modal__head h2 { font-family: 'Lora', serif; font-size: 20px; font-weight: 600; }
        .modal__close {
            width: 30px; height: 30px; border-radius: 8px;
            border: 1px solid var(--border); background: transparent;
            cursor: pointer; font-size: 14px;
            display: flex; align-items: center; justify-content: center;
            color: var(--ink3); transition: all 0.15s;
        }
        .modal__close:hover { background: var(--bg); color: var(--ink); }

        .modal__body { padding: 20px 24px 24px; }

        .f-label {
            display: block; font-size: 11px; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.08em;
            color: var(--ink2); margin-bottom: 6px;
        }
        .f-input {
            width: 100%; padding: 11px 13px;
            border: 1.5px solid var(--border); border-radius: 8px;
            font-family: 'Poppins', sans-serif; font-size: 13.5px; color: var(--ink);
            background: var(--bg); outline: none;
            transition: border-color 0.2s; margin-bottom: 15px;
        }
        .f-input:focus { border-color: var(--accent); background: #fff; }
        textarea.f-input { resize: vertical; min-height: 76px; }

        .img-upload {
            border: 2px dashed var(--border); border-radius: 10px;
            text-align: center; cursor: pointer;
            transition: all 0.2s; margin-bottom: 16px;
            background: var(--bg); position: relative; overflow: hidden;
        }
        .img-upload:hover { border-color: var(--accent); background: #F7EAE5; }
        .img-upload input[type=file] {
            position: absolute; inset: 0; opacity: 0;
            cursor: pointer; width: 100%; height: 100%; z-index: 2;
        }
        .img-upload__placeholder { padding: 22px; font-size: 12.5px; color: var(--ink3); }
        .img-upload__placeholder strong { color: var(--accent); }
        .img-upload__preview { width: 100%; max-height: 160px; object-fit: cover; display: none; }
        .img-upload__preview.show { display: block; }

        .modal__foot {
            display: flex; gap: 10px; justify-content: flex-end;
            padding: 14px 24px; background: var(--bg); border-top: 1px solid var(--border);
        }
        .btn { padding: 10px 20px; border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 13.5px; font-weight: 600; cursor: pointer; border: none; transition: all 0.18s; }
        .btn--ghost { background: transparent; border: 1.5px solid var(--border); color: var(--ink2); }
        .btn--ghost:hover { border-color: #aaa; color: var(--ink); }
        .btn--accent { background: var(--accent); color: #fff; }
        .btn--accent:hover { background: #B8421F; transform: translateY(-1px); }

        /* Hapus Modal */
        .del-modal { width: 340px; }
        .del-modal__body { padding: 30px 24px 18px; text-align: center; }
        .del-modal__icon { font-size: 38px; margin-bottom: 12px; }
        .del-modal__title { font-family: 'Lora', serif; font-size: 19px; font-weight: 600; margin-bottom: 8px; }
        .del-modal__sub { font-size: 13px; color: var(--ink3); line-height: 1.6; }
        .btn--danger { background: #DC2626; color: #fff; }
        .btn--danger:hover { background: #B91C1C; }
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
        <a href="{{ route('dashboard') }}" class="sb-item">
            <span class="sb-item__icon">🏠</span> Dashboard
        </a>
        <a href="{{ route('menus.index') }}" class="sb-item active">
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
            <a href="#" class="sb-user__logout"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">⏻</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        </div>
    </div>
</aside>

<!-- Main -->
<div class="main">
    <div class="topbar">
        <div class="topbar__title">Daftar Menu</div>
        <div class="topbar__count">{{ $menus->count() }} menu</div>
    </div>

    <div class="content">

        <div class="page-header">
            <div>
                <div class="page-header__eyebrow">Manajemen</div>
                <div class="page-header__title">Daftar Menu</div>
                <div class="page-header__sub">Tambah, edit, atau hapus menu restoran.</div>
            </div>
            <button class="btn-add" onclick="openAdd()">＋ Tambah Menu</button>
        </div>

        @if (session('success'))
            <div class="alert alert--success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert--error">{{ session('error') }}</div>
        @endif

        @if ($menus->isEmpty())
            <div class="empty">
                <div class="empty__icon">📋</div>
                <div class="empty__text">Belum ada menu</div>
                <div class="empty__sub">Mulai dengan menambahkan menu pertama</div>
                <button class="empty__cta" onclick="openAdd()">＋ Tambah Menu Pertama</button>
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
                        <div class="menu-card__footer">
                            <a href="#" class="btn-card"
                               onclick="openEdit({{ $menu->id }}, '{{ addslashes($menu->nama_menu) }}', '{{ $menu->harga }}', '{{ addslashes($menu->deskripsi) }}', '{{ $menu->gambar }}')">
                                ✏️ Edit
                            </a>
                            <a href="#" class="btn-card btn-card--del"
                               onclick="openDel({{ $menu->id }}, '{{ addslashes($menu->nama_menu) }}')">
                                🗑 Hapus
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>

<!-- Modal Tambah/Edit -->
<div class="overlay" id="formOverlay">
    <div class="modal">
        <div class="modal__head">
            <h2 id="modalTitle">Tambah Menu</h2>
            <button class="modal__close" onclick="closeForm()">✕</button>
        </div>
        <div class="modal__body">

            <label class="f-label">Gambar Menu</label>
            <div class="img-upload" id="uploadZone">
                <input type="file" accept="image/*" id="imgInput" onchange="previewImg(this)">
                <img class="img-upload__preview" id="imgPreview" src="" alt="">
                <div class="img-upload__placeholder" id="imgPlaceholder">
                    <div style="font-size:22px;margin-bottom:6px">🖼️</div>
                    <strong>Klik untuk upload gambar</strong><br>JPG, PNG
                </div>
            </div>

            {{-- Form tambah --}}
            <form id="formAdd" action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="f-label">Nama Menu *</label>
                <input class="f-input" type="text" name="nama_menu" id="addNama" placeholder="Contoh: Nasi Goreng Spesial" required>
                <label class="f-label">Harga (Rp) *</label>
                <input class="f-input" type="text" inputmode="numeric" name="harga" id="addHarga" placeholder="15000" required>
                <label class="f-label">Deskripsi</label>
                <textarea class="f-input" name="deskripsi" id="addDesc" placeholder="Deskripsi singkat menu ini..."></textarea>
                <input type="file" name="gambar" id="addGambar" style="display:none">
            </form>

            {{-- Form edit --}}
            <form id="formEdit" method="POST" enctype="multipart/form-data" style="display:none;">
                @csrf
                @method('PUT')
                <label class="f-label">Nama Menu *</label>
                <input class="f-input" type="text" name="nama_menu" id="editNama" placeholder="Contoh: Nasi Goreng Spesial" required>
                <label class="f-label">Harga (Rp) *</label>
                <input class="f-input" type="text" inputmode="numeric" name="harga" id="editHarga" placeholder="15000" required>
                <label class="f-label">Deskripsi</label>
                <textarea class="f-input" name="deskripsi" id="editDesc" placeholder="Deskripsi singkat menu ini..."></textarea>
                <input type="file" name="gambar" id="editGambar" style="display:none">
            </form>

        </div>
        <div class="modal__foot">
            <button class="btn btn--ghost" onclick="closeForm()">Batal</button>
            <button class="btn btn--accent" onclick="submitForm()">Simpan</button>
        </div>
    </div>
</div>

<!-- Modal Hapus -->
<div class="overlay" id="delOverlay">
    <div class="modal del-modal">
        <div class="del-modal__body">
            <div class="del-modal__icon">🗑️</div>
            <div class="del-modal__title">Hapus Menu?</div>
            <div class="del-modal__sub" id="delText">Menu ini akan dihapus permanen.</div>
        </div>
        <div class="modal__foot">
            <button class="btn btn--ghost" onclick="closeDel()">Batal</button>
            <button class="btn btn--danger" onclick="submitDel()">Ya, Hapus</button>
        </div>
    </div>
    <form id="formDel" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>
</div>

<script>
    let mode = 'add';

    // Tambah
    function openAdd() {
        mode = 'add';
        document.getElementById('modalTitle').textContent = 'Tambah Menu';
        document.getElementById('formAdd').style.display = 'block';
        document.getElementById('formEdit').style.display = 'none';
        resetImg();
        document.getElementById('formOverlay').classList.add('open');
    }

    // Edit
    function openEdit(id, nama, harga, desc, gambar) {
        mode = 'edit';
        document.getElementById('modalTitle').textContent = 'Edit Menu';
        document.getElementById('formAdd').style.display = 'none';
        document.getElementById('formEdit').style.display = 'block';

        const base = "{{ url('menus') }}";
        document.getElementById('formEdit').action = base + '/' + id;

        document.getElementById('editNama').value  = nama;
        document.getElementById('editHarga').value = harga;
        document.getElementById('editDesc').value  = desc;

        if (gambar) {
            const prev = document.getElementById('imgPreview');
            prev.src = "{{ asset('storage') }}/" + gambar;
            prev.classList.add('show');
            document.getElementById('imgPlaceholder').style.display = 'none';
        } else {
            resetImg();
        }

        document.getElementById('formOverlay').classList.add('open');
    }

    function closeForm() {
        document.getElementById('formOverlay').classList.remove('open');
        resetImg();
    }

    function submitForm() {
        if (mode === 'add') {
            const file = document.getElementById('imgInput').files[0];
            if (file) {
                const dt = new DataTransfer();
                dt.items.add(file);
                document.getElementById('addGambar').files = dt.files;
            }
            document.getElementById('formAdd').submit();
        } else {
            const file = document.getElementById('imgInput').files[0];
            if (file) {
                const dt = new DataTransfer();
                dt.items.add(file);
                document.getElementById('editGambar').files = dt.files;
            }
            document.getElementById('formEdit').submit();
        }
    }

    // Hapus
    function openDel(id, nama) {
        document.getElementById('delText').textContent = '"' + nama + '" akan dihapus permanen.';
        const base = "{{ url('menus') }}";
        document.getElementById('formDel').action = base + '/' + id;
        document.getElementById('delOverlay').classList.add('open');
    }
    function closeDel() {
        document.getElementById('delOverlay').classList.remove('open');
    }
    function submitDel() {
        document.getElementById('formDel').submit();
    }

    // Gambar
    function previewImg(input) {
        const file = input.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            const prev = document.getElementById('imgPreview');
            prev.src = e.target.result;
            prev.classList.add('show');
            document.getElementById('imgPlaceholder').style.display = 'none';
        };
        reader.readAsDataURL(file);
    }
    function resetImg() {
        const prev = document.getElementById('imgPreview');
        prev.src = ''; prev.classList.remove('show');
        document.getElementById('imgPlaceholder').style.display = 'block';
        document.getElementById('imgInput').value = '';
    }

    document.getElementById('formOverlay').addEventListener('click', function(e) { if (e.target === this) closeForm(); });
    document.getElementById('delOverlay').addEventListener('click', function(e) { if (e.target === this) closeDel(); });
</script>

</body>
</html>