<h1 class="font-bold text-lg mt-6">
    My Books
</h1>

<div class="grid grid-cols-4 gap-4">
    <div class="col-span-3 gap-4 flex flex-col">
        <?php foreach($books as $book): ?>
            <div class="p-2 rounded border-stone-800 bg-stone-900 border-2">
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
                    </div>
                </div>
                <div class="text-sm mt-4">
                    <?= $book->description ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="border border-stone-700 rounded">
            <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">
                Add new Book
            </h1>
            <form method="POST" class="px-4 space-y-4 mt-4" action="/add-book">
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
                    <label class="text-stone-400 mb-2" for="title">Title</label>
                    <input
                        id="title"
                        name="title"
                        type="text"
                        placeholder="Title"
                        class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                    >
                </div>

                <div class="flex flex-col">
                    <label class="text-stone-400 mb-2" for="author">Author</label>
                    <input
                        id="author"
                        name="author"
                        type="text"
                        placeholder="Author name"
                        class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                    >
                </div>

                <div class="flex flex-col">
                    <label class="text-stone-400 mb-2" for="description">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                    ></textarea>
                </div>

                <div class="flex flex-col">
                    <label class="text-stone-400 mb-2" for="year">Year</label>
                    <select
                        id="year"
                        name="year"
                        class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                    >
                        <?php foreach (range(1800, date('Y')) as $year): ?>
                            <option value="<?= $year ?>"><?= $year ?></option>
                        <?php endforeach; ?>
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