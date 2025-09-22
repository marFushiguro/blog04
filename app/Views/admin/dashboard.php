<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'sans-serif']
          }
        }
      }
    };
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" crossorigin="anonymous"></script>
  <style>
    body { font-family: 'Inter', sans-serif; }
    .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .btn-premium { background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%); }
    .card-hover { transition: all 0.3s; }
    .card-hover:hover { transform: translateY(-5px); }
  </style>
  <title>Dashboard</title>
</head>
<body class="bg-slate-50">

<!-- NAV -->
<nav class="gradient-bg text-white px-6 py-4 shadow-lg">
  <div class="max-w-7xl mx-auto flex items-center justify-between">
    <div class="flex items-center space-x-3">
      <i class="fa-solid fa-sparkles text-yellow-300"></i>
      <span class="font-medium">Panel Admin</span>
    </div>
    <a href="<?= base_url('/logout') ?>" class="text-white hover:text-slate-200">
      <i class="fa-solid fa-sign-out-alt"></i> Logout
    </a>
  </div>
</nav>
<header class="glass-effect border-b border-white/20 px-6 py-6 shadow-sm sticky top-0 z-50">
  <div class="max-w-7xl mx-auto flex justify-between items-center">
    <h1 class="text-2xl font-bold text-gradient">Bienvenido, <?= session()->get('username') ?></h1>
    <a href="<?= base_url('admin/posts/create') ?>" 
       class="btn-premium text-white px-6 py-2 rounded-full font-semibold shadow-md hover:shadow-xl transition-all">
       <i class="fa fa-plus"></i> Nuevo Post
    </a>
  </div>
</header>

<main class="max-w-7xl mx-auto px-6 py-12">
  <?php if(session()->getFlashdata('msg')): ?>
    <p class="mb-6 text-green-600 font-medium"><?= session()->getFlashdata('msg') ?></p>
  <?php endif; ?>

  <div class="overflow-x-auto bg-white shadow-lg rounded-2xl card-hover">
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-slate-100 text-slate-700">
          <th class="px-6 py-3">Título</th>
          <th class="px-6 py-3">Resumen</th>
          <th class="px-6 py-3">Categoría</th>
          <th class="px-6 py-3">Imagen</th>
          <th class="px-6 py-3">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($posts as $p): ?>
        <tr class="border-t hover:bg-slate-50">
          <td class="px-6 py-4 font-medium"><?= $p['title'] ?></td>
          <td class="px-6 py-4"><?= $p['summary'] ?></td>
          <td class="px-6 py-4"><?= $p['category'] ?></td>
          <td class="px-6 py-4">
            <img src="<?= base_url('uploads/'.$p['image']) ?>" class="w-20 h-16 object-cover rounded">
          </td>
          <td class="px-6 py-4 space-x-3">
            <a href="<?= base_url('admin/posts/edit/'.$p['id']) ?>" 
               class="text-blue-600 hover:underline">
               <i class="fa fa-edit"></i> Editar
            </a>
            <a href="<?= base_url('admin/posts/delete/'.$p['id']) ?>" 
               class="text-red-600 hover:underline"
               onclick="return confirm('¿Seguro que quieres eliminar este post?')">
               <i class="fa fa-trash"></i> Eliminar
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>

<footer class="bg-white border-t border-slate-200 py-6 mt-12">
  <div class="max-w-7xl mx-auto text-center text-sm text-slate-500">
    <p>© <?= date('Y') ?> BlogSpace Admin. Todos los derechos reservados.</p>
  </div>
</footer>

</body>
</html>