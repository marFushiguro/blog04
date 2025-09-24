<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Categoria</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= base_url('css/admin.css') ?>">
  <style>
    body { font-family: 'Inter', sans-serif; }
    .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .btn-premium { background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%); }
    .card-hover { transition: all 0.3s; }
    .card-hover:hover { transform: translateY(-5px); }
  </style>
</head>
<body class="bg-slate-50">

<nav class="gradient-bg text-white px-6 py-4 shadow-lg">
  <div class="max-w-7xl mx-auto flex items-center justify-between">
    <div class="flex items-center space-x-3">
      <i class="fa-solid fa-sparkles text-yellow-300"></i>
      <span class="font-medium">Panel Admin</span>
    </div>
    <div class="flex items-center gap-4">
        <span class="font-medium"><?= session()->get('username') ?></span>
        <a href="<?= base_url('/logout') ?>" class="text-white hover:text-slate-200">
          <i class="fa-solid fa-sign-out-alt"></i> Logout
        </a>
    </div>
  </div>
</nav>

<main class="max-w-4xl mx-auto px-6 py-16">
    <div class="bg-white rounded-2xl shadow-luxury p-8 card-hover">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-slate-900">Crear Categoria</h2>
            <a href="<?= base_url('admin/dashboard') ?>" 
               class="bg-white text-slate-900 px-4 py-2 rounded-full flex items-center gap-2 shadow hover:bg-gray-100 transition-colors">
                <i class="fa-solid fa-house"></i> Dashboard
            </a>
        </div>

        <?php if(session()->getFlashdata('errors')): ?>
            <ul class="mb-4 text-red-600 list-disc pl-5">
                <?php foreach(session()->getFlashdata('errors') as $e): ?>
                    <li><?= $e ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form method="post" action="<?= base_url('admin/categories/store') ?>" class="space-y-5">

            <div>
                <label class="block font-semibold text-slate-700">Nombre de categoria:</label>
                <input type="text" name="name" value="<?= old('name') ?>" required 
                       class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>

            
            <button type="submit" 
                    class="btn-premium text-black px-6 py-3 rounded-full flex items-center gap-2 hover:shadow-lg transition-all transform hover:scale-105">
                <i class="fa-solid fa-save"></i> Guardar Categoria
            </button>
        </form>
    </div>
</main>

<script>
    document.getElementById('createPostForm').addEventListener('submit', function(e) {
        if(!confirm('¿Deseas guardar este post?')) e.preventDefault();
    });
</script>
</body>
</html>