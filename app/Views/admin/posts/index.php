<!DOCTYPE html>
<html>
<head>
    <title>Lista de Posts</title>
    <link rel="stylesheet" href="<?= base_url('css/admin.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <header>
        <h1>Panel Admin</h1>
        <div class="logout">
            <a href="<?= base_url('/logout') ?>"><i class="fa fa-sign-out-alt"></i> Cerrar sesión</a>
        </div>
    </header>

    <main>
        <div class="form-container">
            <div class="form-header">
                <h2>Lista de Posts</h2>
                <form action="<?= base_url('admin/posts/create') ?>" method="get" style="margin-bottom: 15px;">
    <button type="submit" class="btn">
        <i class="fa fa-plus"></i> Nuevo Post
    </button>
</form>

            <?php if(session()->getFlashdata('msg')): ?>
                <p class="success"><?= session()->getFlashdata('msg') ?></p>
            <?php endif; ?>

            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($posts as $p): ?>
                        <tr>
                            <td><?= $p['title'] ?></td>
                            <td><?= $p['category'] ?></td>
                            <td><img src="<?= base_url('uploads/'.$p['image']) ?>" width="100"></td>
                            <td>
                                <a href="<?= base_url('admin/posts/edit/'.$p['id']) ?>" class="edit"><i class="fa fa-edit"></i> Editar</a> | 
                                <a href="<?= base_url('admin/posts/delete/'.$p['id']) ?>" class="delete"
                                   onclick="return confirm('¿Estás seguro de eliminar este post?');">
                                   <i class="fa fa-trash-alt"></i> Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>