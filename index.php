<?php
    global $books;
    require 'data.php';
?>
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
            <a href="/index.php" class="font-bold text-xl tracking-wide">Book Wise</a>
            <ul class="flex space-x-4 font-bold">
                <li>
                    <a href="/" class="text-lime-500">Explorar</a>
                </li>
                <li>
                    <a href="/my-books.php" class="hover:underline">Meus livros</a>
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

        <section class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <!--LIVRO-->
            <?php foreach($books as $book): ?>
                <div class="p-2 rounded border-stone-800 bg-stone-900 border-2">
                    <div class="flex">
                        <div class="w-1/3">
                            img
                        </div>
                        <div class="space-y-1">
                            <a
                                href="/book.php?id=<?= $book['id'] ?>"
                                class="font-semibold hover:underline"
                            >
                                <?= $book['title'] ?>
                            </a>
                            <div class="font-xs italic">
                                <?= $book['author'] ?>
                            </div>
                            <div class="text-xs italic">
                                star (3 avaliações)
                            </div>
                        </div>
                    </div>
                    <div class="text-sm mt-4">
                        <?= $book['description'] ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
</body>
</html>