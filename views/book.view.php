<?php global $book; ?>
<div class="p-2 rounded border-stone-800 bg-stone-900 border-2">
    <div class="flex">
        <div class="w-1/3">
            img
        </div>
        <div class="space-y-1">
            <a
                href="/book?id=<?= $book['id'] ?>"
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