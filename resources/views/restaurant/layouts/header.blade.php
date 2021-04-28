<header class="bg-green-200 p-2">
    <div class="grid grid-cols-12">

        <div class="col-span-9">
            <form method="GET">
                <div class="relative text-gray-500 focus-within:text-gray-500">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </span>

                    <input type="text" name="q" class="py-2 pl-10 pr-2 w-full text-lg text-gray-500 bg-white rounded focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Cari makanan" autocomplete="off">
                </div>
            </form>
        </div>

        <div class="col-span-3">
            <div class="grid grid-cols-2">
                <button class="px-1 py-2 text-center text-gray-700" id="headerCart">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 m-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </button>

                <button class="px-1 py-2 text-center text-gray-700" id="headerScan">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 m-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>
