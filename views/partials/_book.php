<div class="p-2 rounded border-stone-800 bg-stone-900 border-2 mt-8">
    <div class="flex gap-2">
        <div class="w-1/3">
            <img class="w-60 rounded" src="<?= $book->image ?>" alt="<?= $book->title ?>">
        </div>
        <div class="flex flex-col gap-2">
            <a
                href="/book?id=<?= $book->id ?>"
                class="font-semibold hover:underline"
            >
                <?= $book->title ?>
            </a>
            <div class="font-xs italic">
                <?= $book->author ?>
            </div>
            <div class="text-xs italic">
                <?= str_repeat('⭐', $book->rating) ?>(<?= $book->reviews ?>) Avaliações
            </div>
        </div>
    </div>
    <div class="text-sm mt-4">
        <?= $book->description ?>
    </div>
</div>