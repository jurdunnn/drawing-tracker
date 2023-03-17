<div class="flex flex-col w-full p-1 p-8 text-gray-400 sm:py-32 sm:px-24 md:px-12 gap-y-8" x-show="fullscreen == 'false'" x-cloak>
    <div>
        <h1 class="text-4xl font-bold text-white">Hi {{ Auth::user()->name ?? ''  }}</h1>
        <h3>Welcome back to <span class="font-bold">project drawer</span>, we missed you!</h3>
    </div>

    <div class="flex text-white bg-primary-dark placeholder:text-gray-400 placeholder:text-sm rounded-2xl">
        <span class="px-5 py-4">
            <i class="fa-solid fa-search"></i>
        </span>

        <input 
            placeholder="Search Drawing or Project" 
            id="Search" 
            type="text" 
            class="w-full h-full py-4 pr-4 -ml-2 border-transparent outline-none bg-primary-dark rounded-r-2xl forcus:outline-none focus:border-transparent focus:ring-0" 
            />
    </div>

    <div class="mt-12 grid grid-cols-2 sm:grid-cols-3 gap-x-1 md:gap-x-0 gap-y-12">
        @foreach($projects as $project)
            <a wire:click="redirectToProject({{ $project->id }})" class="flex flex-col cursor-pointer max-w-content gap-y-2 hover:scale-105 slow-hover">
                <div class="relative flex items-center justify-center ml-auto mr-auto text-3xl font-bold text-white bg-{{ $project->color->name }}-500 w-28 h-28 rounded-2xl">
                    <p class="text-2xl uppercase">
                        {{ $project->abbreviated_name }}
                    </p>

                    @if ($project->isBeingViewed())
                        <div class="absolute top-0 right-0 w-5 h-5 -mt-1 -mr-1 rounded-full bg-primary-main"></div>
                        <div class="absolute top-0 right-0 w-3 h-3 bg-green-300 rounded-full animate-pulse"></div>
                    @endif
                </div>
                <h3 class="text-center">{{ $project->name }}</h3>
            </a>
        @endforeach

        <a href="{{ route('projects.create') }}" class="flex flex-col cursor-pointer max-w-content gap-y-2 slow-hover hover:scale-105">
            <div class="flex items-center justify-center ml-auto mr-auto text-2xl font-bold text-white bg-primary-dark w-28 h-28 rounded-2xl">
                <span class="">
                    <i class="fa-solid fa-plus fa-xl"></i>
                </span>
            </div>
        </a>
    </div>
</div>
