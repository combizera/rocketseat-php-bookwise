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
            <div class="font-bold text-xl tracking-wide">Book Wise</div>
            <ul class="flex space-x-4 font-bold">
                <li>
                    <a href="/" class="text-lime-500">Explorar</a>
                </li>
                <li>
                    <a href="/meus-livros.php" class="hover:underline">Meus livros</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="/" class="hover:underline">Fazer Login</a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="mx-auto max-w-screen-lg space-y-6">
        <form class="w-full flex space-x-2 mt-6">
            <input
                type="text"
                class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                placeholder="Pesquisar..."
                name="search"
            >
            <button type="submit">🔍</button>
        </form>

        <div>
            Lista Final
        </div>
    </main>
</body>
</html>