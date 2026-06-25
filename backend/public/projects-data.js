/**
 * Pakai path relatif karena frontend & API berada di origin yang sama (port 8000)
 */
const API_BASE = '/api';

const _headers = {
  'Content-Type': 'application/json',
  'Accept':       'application/json',
};

async function getProjects() {
  const res = await fetch(`${API_BASE}/projects`, { headers: _headers });
  if (!res.ok) throw new Error('Gagal memuat daftar project.');
  const json = await res.json();
  return json.data ?? json;
}

async function getProject(id) {
  const res = await fetch(`${API_BASE}/projects/${encodeURIComponent(id)}`, { headers: _headers });
  if (res.status === 404) return null;
  if (!res.ok) throw new Error('Gagal memuat project.');
  const json = await res.json();
  return json.data ?? json;
}

async function saveProject(project) {
  const isNew  = !project.id;
  const url    = isNew ? `${API_BASE}/projects` : `${API_BASE}/projects/${encodeURIComponent(project.id)}`;
  const method = isNew ? 'POST' : 'PUT';

  const res = await fetch(url, {
    method,
    headers: _headers,
    body: JSON.stringify(project),
  });

  if (!res.ok) {
    const err = await res.json().catch(() => ({}));
    throw new Error(err.message || 'Gagal menyimpan project.');
  }

  const json = await res.json();
  return json.data ?? json;
}

async function deleteProject(id) {
  const res = await fetch(`${API_BASE}/projects/${encodeURIComponent(id)}`, {
    method:  'DELETE',
    headers: _headers,
  });
  if (!res.ok) throw new Error('Gagal menghapus project.');
}
