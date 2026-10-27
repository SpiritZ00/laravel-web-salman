<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelola Proyek</title>
<link rel="stylesheet" href="{{ asset('portfolio/style.css') }}">
<link rel="stylesheet" href="{{ asset('portfolio/admin.css') }}">
</head>
<body class="admin">
<nav class="fixed-nav">
  <ul>
    <li><a href="{{ route('portfolio') }}">PORTFOLIO</a></li>
    <li><a href="{{ route('projects.index') }}">KELOLA PROYEK</a></li>
  </ul>
</nav>

<main>
  <h1>Kelola proyek</h1>

  @if (session('status'))<p class="alert" role="status">{{ session('status') }}</p>@endif

  <div class="bar">
    <span>{{ $projects->count() }} proyek</span>
    <a class="btn" href="{{ route('projects.create') }}">+ Tambah proyek</a>
  </div>

  <div class="tablebox">
    <table>
      <thead><tr><th>Gambar</th><th>Judul</th><th>Deskripsi</th><th>Aksi</th></tr></thead>
      <tbody>
        @forelse ($projects as $p)
          <tr>
            <td>@if ($p->image_url)<img src="{{ $p->image_url }}" alt="">@endif</td>
            <td><strong>{{ $p->title }}</strong></td>
            <td>{{ \Illuminate\Support\Str::limit($p->description, 80) }}</td>
            <td class="act">
              <a class="btn sm" href="{{ route('projects.edit', $p) }}">Ubah</a>
              <form method="POST" action="{{ route('projects.destroy', $p) }}" onsubmit="return confirm('Hapus proyek ini?')">
                @csrf @method('DELETE')
                <button class="btn sm red" type="submit">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="4">Belum ada proyek. Klik "Tambah proyek".</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</main>
</body>
</html>
