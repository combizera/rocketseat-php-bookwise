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

    <?php global $books;
    foreach($books as $book): ?>
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
