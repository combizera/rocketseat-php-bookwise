<?php
    global $book;
    $sumRating = array_reduce($reviews, function($carry, $review) {
        return ($carry ?? 0) + $review->rating;
    }) ?? 0;

    $sumRating = round($sumRating / count($reviews));

    $finalRating = str_repeat('⭐', $sumRating);
?>
<div class="p-2 rounded border-stone-800 bg-stone-900 border-2 mt-8">
    <div class="flex">
        <div class="w-1/3">
            img
        </div>
        <div class="space-y-1">
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
                <?= $finalRating ?>(<?= count($reviews) ?>) Avaliações
            </div>
        </div>
    </div>
    <div class="text-sm mt-4">
        <?= $book->description ?>
    </div>
</div>

<?php if(auth()): ?>
<div>
    <h2>Reviews</h2>

    <div class="grid grid-cols-4 gap-4">
        <div class="col-span-3 gap-4 grid">
            <?php foreach($reviews as $item): ?>
                <div class="border border-stone-700 rounded p-2">
                    <h1 class="font-bold">
                        <?= $item->review; ?>
                    </h1>
                    <?php
                        $rating = str_repeat('⭐', $item->rating);
                    ?>
                    <?= $rating ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="border border-stone-700 rounded">
            <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">
                Review
            </h1>
            <form method="POST" class="px-4 space-y-4 mt-4" action="/add-review">
                <?php if($errors = flash()->get('errors_validations')) { ?>
                    <div class="bg-red-800 text-red-400 px-4 py-2 rounded-md text-sm font-bold">
                        <ul>
                            <li>Atention!</li>

                            <?php foreach($errors as $error) { ?>
                                <li><?= $error ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>


                <div class="flex flex-col">
                    <input type="hidden" name="book_id" value="<?= $book->id ?>">
                    <label class="text-stone-400 mb-2" for="review">Review</label>
                    <textarea
                        id="review"
                        name="review"
                        placeholder="Your review here..."
                        class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                    ></textarea>
                </div>

                <div class="flex flex-col">
                    <label class="text-stone-400 mb-2" for="rating">Rate</label>
                    <select
                        id="rating"
                        name="rating"
                        class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                    >
                        <option value="">Select a rate</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="flex flex-col">
                    <button
                        class="border-stone-800 bg-stone-900 text-stone 400 px-4 py-2 rounded-md border-2 hover:bg-stone-800 hover:text-stone-300 mb-4"
                        type="submit">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
