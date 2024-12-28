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

        <?php require 'partials/_book.php' ?>

    <?php endforeach; ?>
</section>
