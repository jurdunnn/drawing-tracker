<div class="relative flex flex-col h-full p-8 text-gray-500">
    <div class="flex justify-end gap-x-4">
        <span class="text-blue-500 cursor-pointer hover:scale-110 hover:text-blue-600">
            <i class="fa-solid fa-palette fa-2xl"></i>
        </span>
        <span class="text-blue-500 cursor-pointer hover:scale-110 hover:text-blue-600">
            <i class="fa-solid fa-pencil fa-2xl"></i>
        </span>
    </div>
    
    <div class="flex flex-col px-12 mt-4 gap-y-24">
        <div class="flex flex-col gap-y-3">
            <h3 class="text-4xl font-bold text-gray-800">Some Project Name</h3>
            <p class="max-w-lg">Lorem ipsum dolar sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidunt</p>
        </div>

        <div class="flex flex-col gap-y-4">
            <div class="flex justify-between pb-6 border-b-2">
                <h3 class="text-2xl font-bold text-gray-700">Current</h3>
                <span class="pt-2 text-gray-600">
                    <i class="fa-solid fa-ellipsis fa-2xl"></i>
                </span>
            </div>

            <ul class="flex flex-col gap-y-8">
                <li class="flex justify-between">
                    <div class="flex gap-x-4">
                        <!-- Check box -->
                        <div class="flex w-8 h-8 text-3xl font-bold bg-teal-500 rounded-full shadow-2xl cursor-pointer hover:scale-110 hover:bg-teal-600">
                            <span class="pl-[8px] -pt-[1px] text-[1rem] text-white">
                                <i class="fa-solid fa-check"></i>
                            </span>
                        </div>

                        <!-- Drawing Description -->
                        <p class="leading-[2rem]">
                            Some drawing of a product in this project
                        </p>
                    </div>

                    <div class="flex items-center font-bold text-center text-white bg-green-500 opacity-[0.6] rounded-full cursor-pointer hover:scale-105">
                        <p class="w-32">Approved</p>
                    </div>
                </li>

                <li class="flex justify-between">
                    <div class="flex gap-x-4">
                        <!-- Check box -->
                        <div class="flex w-8 h-8 text-3xl font-bold bg-teal-500 rounded-full shadow-2xl cursor-pointer hover:scale-110 hover:bg-teal-600">
                            <span class="pl-[8px] -pt-[1px] text-[1rem] text-white">
                                <i class="fa-solid fa-check"></i>
                            </span>
                        </div>

                        <!-- Drawing Description -->
                        <p class="leading-[2rem]">
                            This is a drawing of a product in this project
                        </p>
                    </div>

                    <div class="flex items-center font-bold text-center text-white bg-amber-500 opacity-[0.6] rounded-full cursor-pointer hover:scale-105">
                        <p class="w-32">In Review</p>
                    </div>
                </li>

                <li class="flex justify-between">
                    <div class="flex gap-x-4">
                        <!-- Check box -->
                        <div class="flex w-8 h-8 text-3xl font-bold bg-gray-100 border-4 rounded-full shadow-2xl cursor-pointer hover:scale-110">
                        </div>

                        <!-- Drawing Description -->
                        <p class="leading-[2rem]">
                            Another drawing of a product in this project
                        </p>
                    </div>

                    <div class="flex items-center font-bold text-center text-white bg-blue-500 opacity-[0.6] rounded-full cursor-pointer hover:scale-105">
                        <p class="w-32">In Progress</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="absolute flex flex-col cursor-pointer bottom-4 right-4 max-w-content gap-y-2 hover:scale-105">
        <div class="flex items-center justify-center w-16 h-16 ml-auto mr-auto text-3xl font-bold text-white bg-blue-500 shadow-2xl rounded-2xl">
            <span class="pt-2">
                <i class="fa-solid fa-plus"></i>
            </span>
        </div>
    </div>
</div>
