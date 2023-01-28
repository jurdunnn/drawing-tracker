<x-app>
    <div class="w-full min-h-screen p-4 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="flex flex-col w-full p-1 text-lg text-gray-400 md:p-32 gap-y-8">
            <div>
                <h1 class="text-5xl font-bold text-white">Hi {{ Auth::user()->name ?? ''  }}</h1>
                <h2>Welcome back to the workspace, we missed you!</h2>
            </div>

            <div class="flex bg-[#434458] text-white placeholder:text-gray-400 text-sm placeholder:text-sm rounded-2xl">
                <span class="px-5 py-4">
                    <i class="fa-solid fa-search"></i>
                </span>

                <input 
                    placeholder="Search Drawing or Project" 
                    id="Search" 
                    type="text" 
                    class="bg-[#434458] w-full h-full py-4 pr-4 -ml-2 rounded-r-2xl border-transparent outline-none forcus:outline-none focus:border-transparent focus:ring-0" 
                />
            </div>

            <div class="mt-12 grid grid-cols-3 gap-x-1 md:gap-x-0 gap-y-12">
                <div class="flex flex-col cursor-pointer max-w-content gap-y-2 hover:scale-105">
                    <div class="relative flex items-center justify-center ml-auto mr-auto text-3xl font-bold text-white bg-blue-500 w-28 h-28 rounded-2xl">
                        <p class="animate-pulse">
                            SP
                        </p>

                        <!-- IS ACTIVE -->
                        <div class="absolute top-0 right-0 -mr-1 -mt-1 w-5 h-5 bg-[#0F102B] rounded-full"></div>
                        <div class="absolute top-0 right-0 w-3 h-3 bg-green-300 rounded-full animate-pulse"></div>
                        <!-- END IS ACTIVE -->
                    </div>
                    <p class="text-sm text-center animate-pulse">Some Project Name</p>
                </div>

                <div class="flex flex-col cursor-pointer max-w-content gap-y-2 hover:scale-105">
                    <div class="flex items-center justify-center ml-auto mr-auto text-3xl font-bold text-white bg-red-500 w-28 h-28 rounded-2xl">BH</div>
                    <p class="text-sm text-center">Book House</p>
                </div>

                <div class="flex flex-col cursor-pointer max-w-content gap-y-2 hover:scale-105">
                    <div class="flex items-center justify-center ml-auto mr-auto text-3xl font-bold text-white bg-green-500 w-28 h-28 rounded-2xl">TC</div>
                    <p class="text-sm text-center">Ten Cats</p>
                </div>

                <div class="flex flex-col cursor-pointer max-w-content gap-y-2 hover:scale-105">
                    <div class="flex items-center justify-center ml-auto mr-auto text-3xl font-bold text-white bg-yellow-500 w-28 h-28 rounded-2xl">CK</div>
                    <p class="text-sm text-center">Really Really Really long name</p>
                </div>

                <div class="flex flex-col cursor-pointer max-w-content gap-y-2 hover:scale-105">
                    <div class="bg-[#434458] ml-auto mr-auto w-28 h-28 flex justify-center text-3xl items-center rounded-2xl font-bold text-white">
                        <span class="">
                            <i class="fa-solid fa-plus fa-xl"></i>
                        </span>
                    </div>
                </div>

            </div>
        </div>
        <div class="bg-gray-100 shadow-2xl rounded-3xl">
            <livewire:drawings />
        </div>
    </div>
</x-app>
