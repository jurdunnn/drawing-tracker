<x-app>
    <div class="relative flex justify-center min-h-screen py-4 items-top sm:items-center sm:pt-0">
        <div class="flex flex-col px-4 lg:w-1/3">
            <h2 class="text-white py-4 text-center text-[90px] font-bold title">Project-Drawer</h2>

            <div class="bg-[#23243D] px-6 py-8 shadow-xl rounded-2xl">
                <form class="flex flex-col gap-y-6">
                    <x-input type="text" placeholder="username" />
                    <x-input type="password" placeholder="password" />
                    <x-button link="#">Log in</x-button>
                </form>
            </div>

            <x-button theme="secondary" link="#">Login as a guest</x-button>
        </div>
    </div>
</x-app>
