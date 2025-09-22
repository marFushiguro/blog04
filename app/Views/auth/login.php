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
          fontFamily: { sans: ['Inter', 'sans-serif'] }
        }
      }
    }
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" crossorigin="anonymous"></script>
  <style>
    body { font-family: 'Inter', sans-serif; }
    .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .btn-premium { background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%); }
    .text-gradient { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                     -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
  </style>
  <title>Login</title>
</head>
<body class="min-h-screen flex items-center justify-center gradient-bg">

  <div class="bg-white rounded-2xl shadow-xl p-10 w-full max-w-md">
    <h2 class="text-3xl font-bold text-center mb-6 text-gradient">Iniciar Sesión</h2>

    <?php if(session()->getFlashdata('error')): ?>
      <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4 text-center">
        <i class="fa-solid fa-circle-exclamation"></i> 
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('/login') ?>" class="space-y-5">
      <div>
        <label class="block font-medium text-slate-700 mb-1">Usuario</label>
        <input type="text" name="username" required
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
      </div>

      <div>
        <label class="block font-medium text-slate-700 mb-1">Contraseña</label>
        <input type="password" name="password" required
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
      </div>

      <button type="submit" 
              class="btn-premium text-white w-full py-3 rounded-lg font-semibold shadow-md hover:shadow-lg transition transform hover:scale-105">
        <i class="fa-solid fa-right-to-bracket"></i> Ingresar
      </button>
    </form>
  </div>

</body>
</html>