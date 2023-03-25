<x-layouts.app>
    <div class="relative flex justify-center min-h-screen py-4 items-top sm:items-center sm:pt-0">
        <div class="flex flex-col px-4 xl:w-1/3">
            <h2 class="text-white select-none text-center text-[90px] font-bold title leading-[6rem]">Project-Drawer</h2>

            <div class="bg-[#23243D] mt-6 px-6 py-8 shadow-xl rounded-lg">
                <form method="POST" action="{{ route('authenticate') }}" class="flex flex-col gap-y-6">
                    @csrf

                    <x-input type="email" name="email" backgroundColor="bg-primary-dark" inputClasses="font-bold text-gray-100 p-3 rounded-lg border-0 focus:border-transparent focus:ring-0" placeholder="Email Address" />

                    <x-input type="password" name="password" backgroundColor="bg-primary-dark" inputClasses="font-bold text-gray-100 p-3 rounded-lg border-0 focus:border-transparent focus:ring-0" placeholder="Password" />

                    @if ($errors->has('incorrect'))
                        <p class="font-bold text-red-500">{{ $errors->first('incorrect') }}</p>
                    @endif

                    <x-button type="submit" theme="primary" buttonColor="bg-white"  buttonTag="button" icon="pl-1 fa-arrow-right-to-bracket">
                        Log in
                    </x-button>
                </form>
            </div>

            <x-button theme="secondary" link="#">Login as a guest</x-button>
        </div>
    </div>
</x-layouts.app>
