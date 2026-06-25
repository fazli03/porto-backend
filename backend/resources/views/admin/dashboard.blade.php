<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin — Projects</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=DM+Mono:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/style.css" />
  <style>
    body { cursor: auto; }
    #cursor, #cursor-ring { display: none; }

    .admin-nav {
      position: sticky; top: 0; z-index: 100;
      background: var(--text-main);
      padding: 20px 48px;
      display: flex; align-items: center; justify-content: space-between;
      border-bottom: 1px solid rgba(255,255,255,0.08);
    }
    .admin-nav-logo {
      font-family: var(--mono); font-size: 11px;
      letter-spacing: 0.18em; color: var(--bg); text-transform: uppercase;
    }
    .admin-nav-links { display: flex; gap: 24px; align-items: center; }
    .admin-nav-links a {
      font-family: var(--mono); font-size: 10px; letter-spacing: 0.15em;
      text-decoration: none; text-transform: uppercase; transition: color 0.2s;
    }
    .nav-link-portfolio { color: var(--text-muted); }
    .nav-link-portfolio:hover { color: var(--accent); }
    .nav-link-logout { color: #e74c3c; }
    .nav-link-logout:hover { opacity: 0.75; }

    .admin-main { max-width: 1100px; margin: 0 auto; padding: 64px 48px; }

    .admin-header {
      display: flex; align-items: flex-end; justify-content: space-between;
      margin-bottom: 64px; padding-bottom: 32px; border-bottom: 1px solid var(--border);
    }
    .admin-header-left p {
      font-family: var(--mono); font-size: 10px; letter-spacing: 0.2em;
      color: var(--text-muted); text-transform: uppercase; margin-bottom: 12px;
    }
    .admin-header-left h1 {
      font-size: clamp(32px, 5vw, 56px); font-weight: 700;
      letter-spacing: -0.03em; text-transform: uppercase; line-height: 0.95;
    }

    .btn-primary {
      display: inline-flex; align-items: center; gap: 12px;
      background: var(--text-main); color: var(--bg);
      font-family: var(--mono); font-size: 10px; font-weight: 500;
      letter-spacing: 0.18em; text-transform: uppercase;
      padding: 16px 32px; border: none; cursor: pointer;
      transition: background 0.2s, color 0.2s;
    }
    .btn-primary:hover { background: var(--accent); color: var(--text-main); }

    .btn-ghost {
      display: inline-flex; align-items: center; gap: 8px;
      background: transparent; color: var(--text-muted);
      font-family: var(--mono); font-size: 10px; letter-spacing: 0.15em;
      text-transform: uppercase; padding: 12px 20px;
      border: 1px solid var(--border); cursor: pointer;
      transition: border-color 0.2s, color 0.2s;
    }
    .btn-ghost:hover { border-color: var(--text-main); color: var(--text-main); }

    .btn-danger {
      background: transparent; color: #c0392b;
      font-family: var(--mono); font-size: 9px; letter-spacing: 0.15em;
      text-transform: uppercase; padding: 10px 16px;
      border: 1px solid #c0392b; cursor: pointer;
      transition: background 0.2s, color 0.2s;
    }
    .btn-danger:hover { background: #c0392b; color: #fff; }

    .btn-edit {
      background: transparent; color: var(--text-main);
      font-family: var(--mono); font-size: 9px; letter-spacing: 0.15em;
      text-transform: uppercase; padding: 10px 16px;
      border: 1px solid var(--border); cursor: pointer;
      transition: border-color 0.2s, background 0.2s;
    }
    .btn-edit:hover { border-color: var(--text-main); background: var(--surface-1); }

    .btn-sm-icon {
      width: 32px; height: 32px; display: flex; align-items: center;
      justify-content: center; border: 1px solid var(--border);
      background: transparent; cursor: pointer; color: var(--text-muted);
      font-size: 14px; transition: border-color 0.2s, color 0.2s, background 0.2s;
    }
    .btn-sm-icon:hover { border-color: #c0392b; color: #c0392b; background: rgba(192,57,43,0.06); }

    .project-list { display: flex; flex-direction: column; gap: 2px; }

    .project-row {
      display: grid; grid-template-columns: auto 1fr auto;
      align-items: center; gap: 24px; padding: 24px 0;
      border-bottom: 1px solid var(--border);
    }
    .project-row:first-child { border-top: 1px solid var(--border); }

    .project-row-num {
      font-family: var(--mono); font-size: 10px;
      letter-spacing: 0.15em; color: var(--text-muted); min-width: 32px;
    }
    .project-row-info h3 {
      font-size: 17px; font-weight: 600;
      letter-spacing: -0.01em; text-transform: uppercase; margin-bottom: 4px;
    }
    .project-row-meta { display: flex; gap: 16px; align-items: center; flex-wrap: wrap; }
    .project-row-meta span {
      font-family: var(--mono); font-size: 10px;
      color: var(--text-muted); letter-spacing: 0.1em;
    }
    .project-row-meta a {
      font-family: var(--mono); font-size: 10px; color: var(--accent);
      letter-spacing: 0.1em; text-decoration: none; text-transform: uppercase;
      transition: color 0.2s;
    }
    .project-row-meta a:hover { color: var(--text-main); }
    .project-row-actions { display: flex; gap: 8px; align-items: center; }

    .empty-state {
      padding: 80px 0; text-align: center; border: 1px dashed var(--border);
    }
    .empty-state p {
      font-family: var(--mono); font-size: 11px; color: var(--text-muted);
      letter-spacing: 0.15em; text-transform: uppercase; margin-bottom: 24px;
    }

    #modal-overlay {
      position: fixed; inset: 0; background: rgba(10,10,10,0.7);
      z-index: 500; display: none; align-items: flex-start;
      justify-content: center; padding: 60px 24px; overflow-y: auto;
    }
    #modal-overlay.open { display: flex; }

    .modal-box {
      background: var(--bg); width: 100%; max-width: 760px;
      position: relative; border: 1px solid var(--border); margin: auto;
    }
    .modal-header {
      padding: 32px 40px; border-bottom: 1px solid var(--border);
      display: flex; align-items: center; justify-content: space-between;
      position: sticky; top: 0; background: var(--bg); z-index: 10;
    }
    .modal-header h2 {
      font-size: 20px; font-weight: 700;
      letter-spacing: -0.02em; text-transform: uppercase;
    }
    .modal-close {
      width: 36px; height: 36px; border: 1px solid var(--border);
      background: transparent; cursor: pointer; font-size: 16px;
      color: var(--text-muted); display: flex; align-items: center;
      justify-content: center; transition: border-color 0.2s, color 0.2s;
    }
    .modal-close:hover { border-color: var(--text-main); color: var(--text-main); }

    .modal-form { padding: 40px; display: flex; flex-direction: column; gap: 0; }

    .form-section-title {
      font-family: var(--mono); font-size: 9px; letter-spacing: 0.22em;
      text-transform: uppercase; color: var(--accent);
      padding: 28px 0 16px; border-top: 1px solid var(--border); margin-top: 8px;
    }
    .form-section-title:first-child { border-top: none; padding-top: 0; margin-top: 0; }

    .form-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 0 32px; }

    .field {
      border-bottom: 1px solid var(--border);
      position: relative; transition: border-color 0.2s;
    }
    .field:focus-within { border-color: var(--accent); }
    .field label {
      font-family: var(--mono); font-size: 9px; letter-spacing: 0.2em;
      color: var(--text-muted); text-transform: uppercase;
      display: block; padding: 20px 0 6px;
    }
    .field input, .field textarea, .field select {
      width: 100%; background: transparent; border: none; outline: none;
      color: var(--text-main); font-family: var(--sans);
      font-size: 14px; padding-bottom: 16px; resize: none;
    }
    .field input::placeholder, .field textarea::placeholder { color: var(--text-muted); opacity: 0.5; }
    .field select { appearance: none; cursor: pointer; }
    .field select option { background: var(--bg); }
    .field textarea { min-height: 90px; line-height: 1.7; }

    .image-input-list { display: flex; flex-direction: column; gap: 8px; margin-top: 8px; margin-bottom: 16px; }
    .image-input-row { display: flex; gap: 8px; align-items: center; }
    .image-input-row input {
      flex: 1; background: var(--surface-1); border: 1px solid var(--border);
      outline: none; color: var(--text-main); font-family: var(--mono);
      font-size: 11px; padding: 10px 14px; transition: border-color 0.2s;
    }
    .image-input-row input:focus { border-color: var(--accent); }
    .image-preview-thumb {
      width: 40px; height: 40px; object-fit: cover;
      border: 1px solid var(--border); display: none; background: var(--surface-1);
    }
    .image-preview-thumb.visible { display: block; }
    .add-image-btn {
      display: inline-flex; align-items: center; gap: 8px;
      background: transparent; border: 1px dashed var(--border);
      color: var(--text-muted); font-family: var(--mono); font-size: 9px;
      letter-spacing: 0.18em; text-transform: uppercase;
      padding: 12px 20px; cursor: pointer;
      transition: border-color 0.2s, color 0.2s; width: 100%; justify-content: center;
    }
    .add-image-btn:hover { border-color: var(--text-main); color: var(--text-main); }

    .modal-footer {
      padding: 28px 40px; border-top: 1px solid var(--border);
      display: flex; align-items: center; justify-content: space-between;
      gap: 16px; background: var(--surface-1);
    }
    .modal-footer-left { font-family: var(--mono); font-size: 10px; color: var(--text-muted); letter-spacing: 0.1em; }

    #toast {
      position: fixed; bottom: 32px; right: 32px;
      background: var(--text-main); color: var(--bg);
      font-family: var(--mono); font-size: 10px; letter-spacing: 0.15em;
      text-transform: uppercase; padding: 16px 24px; z-index: 9999;
      transform: translateY(20px); opacity: 0;
      transition: transform 0.3s, opacity 0.3s; pointer-events: none;
    }
    #toast.show { transform: translateY(0); opacity: 1; }
    #toast.success { background: #27ae60; }
    #toast.error   { background: #c0392b; }

    #confirm-overlay {
      position: fixed; inset: 0; background: rgba(10,10,10,0.7);
      z-index: 600; display: none; align-items: center; justify-content: center;
    }
    #confirm-overlay.open { display: flex; }
    .confirm-box {
      background: var(--bg); border: 1px solid var(--border);
      padding: 48px 40px; max-width: 400px; width: 100%; text-align: center;
    }
    .confirm-box h3 { font-size: 22px; font-weight: 700; letter-spacing: -0.02em; text-transform: uppercase; margin-bottom: 12px; }
    .confirm-box p { font-family: var(--mono); font-size: 11px; color: var(--text-muted); line-height: 1.8; margin-bottom: 32px; }
    .confirm-btns { display: flex; gap: 12px; justify-content: center; }

    @media (max-width: 700px) {
      .admin-main { padding: 40px 24px; }
      .admin-nav  { padding: 16px 24px; }
      .admin-header { flex-direction: column; align-items: flex-start; gap: 24px; }
      .project-row  { grid-template-columns: auto 1fr; }
      .project-row-actions { grid-column: 2; }
      .form-grid-2  { grid-template-columns: 1fr; }
      .modal-form   { padding: 28px 24px; }
      .modal-header { padding: 24px; }
      .modal-footer { padding: 20px 24px; flex-direction: column; align-items: flex-start; }
    }
  </style>
</head>
<body>

  <nav class="admin-nav">
    <span class="admin-nav-logo">Portfolio — Admin</span>
    <div class="admin-nav-links">
      <a href="/home.html" class="nav-link-portfolio">&#8592; Portfolio</a>
      <a href="{{ route('admin.logout') }}" class="nav-link-logout">Logout</a>
    </div>
  </nav>

  <main class="admin-main">
    <div class="admin-header">
      <div class="admin-header-left">
        <p>Content Management</p>
        <h1>Projects</h1>
      </div>
      <button class="btn-primary" id="btn-add">
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none">
          <path d="M8 3v10M3 8h10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        Tambah Project
      </button>
    </div>

    <div class="project-list" id="project-list"></div>
  </main>

  <!-- MODAL TAMBAH / EDIT -->
  <div id="modal-overlay" role="dialog" aria-modal="true">
    <div class="modal-box">
      <div class="modal-header">
        <h2 id="modal-title">Tambah Project</h2>
        <button class="modal-close" id="modal-close">&#x2715;</button>
      </div>

      <form id="project-form" class="modal-form" novalidate>
        <input type="hidden" id="f-id" />

        <p class="form-section-title">Info Dasar</p>
        <div class="form-grid-2">
          <div class="field">
            <label for="f-name">Nama Project *</label>
            <input type="text" id="f-name" placeholder="cth. FitStudio App" required />
          </div>
          <div class="field">
            <label for="f-category">Kategori</label>
            <input type="text" id="f-category" placeholder="cth. UI / UX Design" />
          </div>
          <div class="field">
            <label for="f-year">Tahun</label>
            <input type="text" id="f-year" placeholder="cth. 2024" />
          </div>
          <div class="field">
            <label for="f-role">Role</label>
            <input type="text" id="f-role" placeholder="cth. UI/UX Designer" />
          </div>
        </div>
        <div class="field">
          <label for="f-timeline">Timeline</label>
          <input type="text" id="f-timeline" placeholder="cth. Januari 2024 – Maret 2024" />
        </div>
        <div class="field">
          <label for="f-tools">Tools &amp; Stack <span style="opacity:.5;font-size:8px">(pisahkan dengan koma)</span></label>
          <input type="text" id="f-tools" placeholder="cth. Figma, Next.js, Tailwind CSS" />
        </div>

        <p class="form-section-title">Konten</p>
        <div class="field">
          <label for="f-problem">Problem Statement</label>
          <textarea id="f-problem" rows="4" placeholder="Jelaskan masalah yang diselesaikan project ini..."></textarea>
        </div>
        <div class="field">
          <label for="f-solutions">Solusi</label>
          <textarea id="f-solutions" rows="4" placeholder="Jelaskan pendekatan dan hasil yang dicapai..."></textarea>
        </div>

        <p class="form-section-title">Link</p>
        <div class="form-grid-2">
          <div class="field">
            <label for="f-prototype">URL Prototype — UI/UX <span style="opacity:.5;font-size:8px">(Figma, Webflow, dll)</span></label>
            <input type="url" id="f-prototype" placeholder="https://www.figma.com/proto/..." />
          </div>
          <div class="field">
            <label for="f-code">URL Code — Dev <span style="opacity:.5;font-size:8px">(GitHub, live site, dll)</span></label>
            <input type="url" id="f-code" placeholder="https://github.com/..." />
          </div>
        </div>

        <p class="form-section-title">Gambar</p>
        <div class="field" style="padding-bottom:16px">
          <label for="f-hero">URL Hero Image</label>
          <input type="url" id="f-hero" placeholder="https://..." />
        </div>
        <div style="padding:16px 0">
          <p style="font-family:var(--mono);font-size:9px;letter-spacing:0.2em;color:var(--text-muted);text-transform:uppercase;margin-bottom:12px;">Screenshot Halaman (carousel)</p>
          <div class="image-input-list" id="page-images-list"></div>
          <button type="button" class="add-image-btn" id="btn-add-image">
            <svg width="12" height="12" viewBox="0 0 16 16" fill="none">
              <path d="M8 3v10M3 8h10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
            Tambah URL Gambar
          </button>
        </div>
      </form>

      <div class="modal-footer">
        <span class="modal-footer-left" id="modal-edit-hint"></span>
        <div style="display:flex;gap:12px">
          <button class="btn-ghost" id="btn-cancel">Batal</button>
          <button class="btn-primary" id="btn-save">Simpan</button>
        </div>
      </div>
    </div>
  </div>

  <!-- KONFIRMASI HAPUS -->
  <div id="confirm-overlay">
    <div class="confirm-box">
      <h3>Hapus Project?</h3>
      <p id="confirm-text">Tindakan ini tidak bisa dibatalkan.</p>
      <div class="confirm-btns">
        <button class="btn-ghost" id="confirm-cancel">Batal</button>
        <button class="btn-danger" id="confirm-ok">Hapus</button>
      </div>
    </div>
  </div>

  <div id="toast"></div>

  <script src="/projects-data.js"></script>
  <script>
    let editingId = null, pendingDeleteId = null;

    function escapeHtml(s) {
      return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
    }
    function showToast(msg, type='') {
      const t = document.getElementById('toast');
      t.textContent = msg; t.className = 'show ' + type;
      clearTimeout(t._t); t._t = setTimeout(() => t.className='', 3500);
    }
    function setLoading(btn, v) { btn.disabled = v; btn.style.opacity = v ? '0.6' : ''; }

    async function renderList() {
      const list = document.getElementById('project-list');
      list.innerHTML = '<p style="font-family:var(--mono);font-size:10px;color:var(--text-muted);padding:32px 0;letter-spacing:.15em">Memuat data...</p>';
      let projects;
      try { projects = await getProjects(); }
      catch {
        list.innerHTML = '<div class="empty-state"><p>Tidak dapat terhubung ke server API.</p><button class="btn-ghost" onclick="renderList()">Coba Lagi</button></div>';
        return;
      }
      if (!projects.length) {
        list.innerHTML = '<div class="empty-state"><p>Belum ada project</p><button class="btn-primary" onclick="openModal()"><svg width="12" height="12" viewBox="0 0 16 16" fill="none"><path d="M8 3v10M3 8h10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>Tambah Pertama</button></div>';
        return;
      }
      list.innerHTML = projects.map((p,i) => `
        <div class="project-row">
          <span class="project-row-num">P—${String(i+1).padStart(2,'0')}</span>
          <div class="project-row-info">
            <h3>${escapeHtml(p.name)}</h3>
            <div class="project-row-meta">
              <span>${escapeHtml(p.category||'—')}</span><span>·</span>
              <span>${escapeHtml(p.year||'—')}</span><span>·</span>
              <span>${(p.pageImages||[]).length} gambar</span><span>·</span>
              <a href="/project-detail.html?id=${encodeURIComponent(p.id)}" target="_blank">Lihat ↗</a>
            </div>
          </div>
          <div class="project-row-actions">
            <button class="btn-edit"   onclick="openModal('${escapeHtml(p.id)}')">Edit</button>
            <button class="btn-danger" onclick="confirmDelete('${escapeHtml(p.id)}','${escapeHtml(p.name)}')">Hapus</button>
          </div>
        </div>`).join('');
    }

    async function openModal(id) {
      editingId = id||null;
      const overlay=document.getElementById('modal-overlay'), title=document.getElementById('modal-title'),
            hint=document.getElementById('modal-edit-hint'), saveBtn=document.getElementById('btn-save');
      document.getElementById('project-form').reset();
      document.getElementById('page-images-list').innerHTML='';
      if (id) {
        title.textContent='Edit Project'; hint.textContent='Memuat...';
        overlay.classList.add('open'); document.body.style.overflow='hidden';
        setLoading(saveBtn,true);
        let p; try { p=await getProject(id); } catch { showToast('Gagal memuat.','error'); closeModal(); return; }
        if (!p) { closeModal(); return; }
        hint.textContent=`Slug: ${p.id}`;
        document.getElementById('f-id').value=p.id;
        document.getElementById('f-name').value=p.name||'';
        document.getElementById('f-category').value=p.category||'';
        document.getElementById('f-year').value=p.year||'';
        document.getElementById('f-role').value=p.role||'';
        document.getElementById('f-timeline').value=p.timeline||'';
        document.getElementById('f-tools').value=(p.tools||[]).join(', ');
        document.getElementById('f-problem').value=p.problemStatement||'';
        document.getElementById('f-solutions').value=p.solutions||'';
        document.getElementById('f-prototype').value=p.prototypeUrl||'';
        document.getElementById('f-code').value=p.codeUrl||'';
        document.getElementById('f-hero').value=p.heroImage||'';
        (p.pageImages||[]).forEach(url=>addImageRow(url));
        setLoading(saveBtn,false);
      } else {
        title.textContent='Tambah Project'; hint.textContent='Slug dibuat otomatis.';
        document.getElementById('f-id').value='';
        overlay.classList.add('open'); document.body.style.overflow='hidden';
      }
      document.getElementById('f-name').focus();
    }

    function closeModal() {
      document.getElementById('modal-overlay').classList.remove('open');
      document.body.style.overflow=''; editingId=null;
    }

    function addImageRow(url='') {
      const list=document.getElementById('page-images-list'), row=document.createElement('div');
      row.className='image-input-row';
      row.innerHTML=`<img class="image-preview-thumb${url?' visible':''}" src="${escapeHtml(url)}" alt=""/><input type="url" placeholder="https://..." value="${escapeHtml(url)}"/><button type="button" class="btn-sm-icon">&#x2715;</button>`;
      const input=row.querySelector('input'), thumb=row.querySelector('.image-preview-thumb');
      input.addEventListener('input',()=>{ const v=input.value.trim(); thumb.src=v||''; thumb.classList.toggle('visible',!!v); });
      row.querySelector('.btn-sm-icon').addEventListener('click',()=>row.remove());
      list.appendChild(row);
    }

    document.getElementById('btn-add-image').addEventListener('click',()=>addImageRow());

    document.getElementById('btn-save').addEventListener('click', async ()=>{
      const name=document.getElementById('f-name').value.trim();
      if (!name) { showToast('Nama project wajib diisi.','error'); document.getElementById('f-name').focus(); return; }
      const toolsRaw=document.getElementById('f-tools').value.trim();
      const payload={
        id:document.getElementById('f-id').value.trim()||null, name,
        category:document.getElementById('f-category').value.trim(),
        year:document.getElementById('f-year').value.trim(),
        role:document.getElementById('f-role').value.trim(),
        timeline:document.getElementById('f-timeline').value.trim(),
        tools:toolsRaw?toolsRaw.split(',').map(t=>t.trim()).filter(Boolean):[],
        problemStatement:document.getElementById('f-problem').value.trim(),
        solutions:document.getElementById('f-solutions').value.trim(),
        prototypeUrl:document.getElementById('f-prototype').value.trim()||null,
        codeUrl:document.getElementById('f-code').value.trim()||null,
        heroImage:document.getElementById('f-hero').value.trim(),
        pageImages:Array.from(document.querySelectorAll('#page-images-list input')).map(i=>i.value.trim()).filter(Boolean),
      };
      const saveBtn=document.getElementById('btn-save'); setLoading(saveBtn,true);
      try { await saveProject(payload); closeModal(); await renderList(); showToast(editingId?'Project diperbarui.':'Project ditambahkan.','success'); }
      catch(err) { showToast(err.message||'Gagal menyimpan.','error'); }
      finally { setLoading(saveBtn,false); }
    });

    function confirmDelete(id,name) {
      pendingDeleteId=id;
      document.getElementById('confirm-text').textContent=`"${name}" akan dihapus permanen.`;
      document.getElementById('confirm-overlay').classList.add('open'); document.body.style.overflow='hidden';
    }

    document.getElementById('confirm-ok').addEventListener('click', async ()=>{
      const id=pendingDeleteId; pendingDeleteId=null;
      document.getElementById('confirm-overlay').classList.remove('open'); document.body.style.overflow='';
      if (!id) return;
      try { await deleteProject(id); await renderList(); showToast('Project dihapus.','error'); }
      catch(err) { showToast(err.message||'Gagal menghapus.','error'); }
    });

    document.getElementById('confirm-cancel').addEventListener('click',()=>{
      pendingDeleteId=null;
      document.getElementById('confirm-overlay').classList.remove('open'); document.body.style.overflow='';
    });
    document.getElementById('btn-add').addEventListener('click',()=>openModal());
    document.getElementById('modal-close').addEventListener('click',closeModal);
    document.getElementById('btn-cancel').addEventListener('click',closeModal);
    document.getElementById('modal-overlay').addEventListener('click',e=>{ if(e.target===document.getElementById('modal-overlay')) closeModal(); });
    document.addEventListener('keydown',e=>{ if(e.key==='Escape'){ closeModal(); document.getElementById('confirm-overlay').classList.remove('open'); document.body.style.overflow=''; } });

    renderList();
  </script>
</body>
</html>
