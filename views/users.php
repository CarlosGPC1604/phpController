<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<div class="container mx-auto my-10">
    <h1 class="text-3xl font-bold text-center text-gray-800">Lista de Usuarios</h1>

    <div class="mt-8">
        <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 py-3 px-4 text-left text-sm font-semibold">ID</th>
                    <th class="w-1/3 py-3 px-4 text-left text-sm font-semibold">Nombre</th>
                    <th class="w-1/3 py-3 px-4 text-left text-sm font-semibold">Correo</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-3 px-4"><?= htmlspecialchars($user['id']) ?></td>
                            <td class="py-3 px-4"><?= htmlspecialchars($user['nombre']) ?></td>
                            <td class="py-3 px-4"><?= htmlspecialchars($user['correo']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="py-4 px-4 text-center text-gray-500">No hay usuarios registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
