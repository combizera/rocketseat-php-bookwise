<div class="mt-6 grid grid-cols-2 gap-2">
    <!-- LOGIN -->
    <div class="border border-stone-700 rounded">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Login</h1>
        <form method="POST" class="px-4 space-y-4 mt-4">
            <div class="flex flex-col">
                <label class="text-stone-400 mb-2" for="email" id="email">Email</label>
                <input
                    name="email"
                    type="email"
                    placeholder="your@email.com"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                >
            </div>

            <div class="flex flex-col">
                <label class="text-stone-400 mb-2" for="password">Password</label>
                <input
                    name="password"
                    type="password"
                    placeholder="********"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                >
            </div>

            <div class="flex flex-col">
                <button
                    class="border-stone-800 bg-stone-900 text-stone 400 px-4 py-2 rounded-md border-2 hover:bg-stone-800 hover:text-stone-300 mb-4"
                    type="submit">
                    Logar
                </button>
            </div>
        </form>
    </div>

    <!-- REGISTER -->
    <div class="border border-stone-700 rounded">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Register</h1>
        <form
            action="/register"
            method="POST"
            class="px-4 space-y-4 mt-4"
        >
            <?php if(isset($message) && strlen($message)) { ?>
                <div class="bg-green-800 text-green-400 px-4 py-2 rounded-md text-sm font-bold">
                    <?= $message ?>
                </div>
            <?php } ?>

            <?php //dd($_SESSION['validation']) ?>
            <?php if(isset($_SESSION['validation']) && sizeof($_SESSION['validation'])) { ?>
                <div class="bg-red-800 text-red-400 px-4 py-2 rounded-md text-sm font-bold">
                    <ul>
                        <li>Atention!</li>

                        <?php foreach($_SESSION['validation'] as $error) { ?>
                            <li><?= $error ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-2" for="name" id="name">Nome</label>
                <input
                    name="name"
                    type="text"
                    placeholder="Your Name"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                >
            </div>

            <div class="flex flex-col">
                <label class="text-stone-400 mb-2" for="email" id="email">Email</label>
                <input
                    name="email"
                    type="text"
                    placeholder="your@email.com"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                >
            </div>

            <div class="flex flex-col">
                <label class="text-stone-400 mb-2" for="email_confirm" id="email_confirm">Confirm your Email</label>
                <input
                    name="email_confirm"
                    type="text"
                    placeholder="your@email.com"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                >
            </div>

            <div class="flex flex-col">
                <label class="text-stone-400 mb-2" for="password">Password</label>
                <input
                    name="password"
                    type="password"
                    placeholder="********"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"
                >
            </div>

            <div class="flex gap-2 w-full">
                <button
                    class="w-full border-stone-800 bg-stone-950 text-stone 400 px-4 py-2 rounded-md border-2 hover:bg-stone-800 hover:text-stone-300 mb-4"
                    type="reset">
                    Cancel
                </button>

                <button
                    class="w-full border-stone-800 bg-stone-900 text-stone 400 px-4 py-2 rounded-md border-2 hover:bg-stone-800 hover:text-stone-300 mb-4"
                    type="submit">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>