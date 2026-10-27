<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $project ? 'Ubah proyek' : 'Tambah proyek' }}</title>
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
  <h1>{{ $project ? 'Ubah proyek' : 'Tambah proyek' }}</h1>

  @if ($errors->any())
    <div class="alert error"><ul>@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
  @endif

  <form class="formbox" method="POST"
        action="{{ $project ? route('projects.update', $project) : route('projects.store') }}">
    @csrf
    @if ($project) @method('PUT') @endif

    <div class="form-group">
      <label for="title">JUDUL</label>
      <input id="title" name="title" required maxlength="80" value="{{ old('title', $project->title ?? '') }}">
    </div>
    <div class="form-group">
      <label for="description">DESKRIPSI</label>
      <textarea id="description" name="description" rows="4" required maxlength="300">{{ old('description', $project->description ?? '') }}</textarea>
    </div>
    <div class="form-group">
      <label for="image_url">URL GAMBAR</label>
      <input id="image_url" name="image_url" type="url" placeholder="https://..." value="{{ old('image_url', $project->image_url ?? '') }}">
      <p class="hint">Opsional. Tempel alamat gambar dari internet.</p>
    </div>
    <div class="form-group">
      <label for="project_url">URL PROYEK</label>
      <input id="project_url" name="project_url" type="url" placeholder="https://..." value="{{ old('project_url', $project->project_url ?? '') }}">
      <p class="hint">Opsional. Tombol "View project" muncul jika diisi.</p>
    </div>

    <button class="btn red" type="submit">{{ $project ? 'Simpan perubahan' : 'Tambah proyek' }}</button>
    <p style="margin-top:1rem"><a href="{{ route('projects.index') }}">Batal</a></p>
  </form>
</main>
</body>
</html>
