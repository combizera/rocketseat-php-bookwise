<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Wise</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-950 text-stone-300">
    <header class="bg-stone-900">
        <nav class="mx-auto max-w-screen-lg flex justify-between px-8 py-4">
            <a href="/index" class="font-bold text-xl tracking-wide">Book Wise</a>
            <ul class="flex space-x-4 font-bold">
                <li>
                    <a href="/" class="text-lime-500">Explorar</a>
                </li>
                <?php if(auth()): ?>
                    <li>
                        <a href="/my-books" class="hover:underline">My Books</a>
                    </li>
                <?php endif; ?>
            </ul>
            <ul class="flex space-x-4">
                <?php if(auth()): ?>
                    <li>
                        <a href="/logout" class="hover:underline">
                            Hello, <?= auth()->name ?>
                        </a>
                    </li>
                    <li>
                        <a href="/logout" class="hover:underline">
                           Logout
                        </a>
                    </li>

                <?php else: ?>
                    <li>
                        <a href="/login" class="hover:underline">
                            Fazer Login
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>


    <main class="mx-auto max-w-screen-lg space-y-6">

        <?php if($message = flash()->get('message')): ?>
            <div class="bg-green-800 text-green-400 px-4 py-2 rounded-md text-sm font-bold">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <?php require '../views/' . $view . '.view.php'; ?>

    </main>
</body>
</html>