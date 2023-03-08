<x-layouts.app>
    <div class="relative flex justify-center min-h-screen py-4 items-top sm:items-center sm:pt-0">
        <div class="flex flex-col px-4 xl:1/3">
            <h2 class="text-white py-4 text-center text-[90px] font-bold title">Project-Drawer</h2>

            <div class="bg-[#23243D] px-6 py-8 shadow-xl rounded-2xl">
                <form method="POST" action="{{ route('authenticate') }}" class="flex flex-col gap-y-6">
                    @csrf

                    <input 
                        type="email" 
                        name="email" 
                        placeholder="Email" 
                        class="bg-[#434458] font-bold uppercase text-gray-100 p-4 rounded-xl @if($errors->has('email')) ring-2 ring-red-500 @endif"
                    >

                    @if ($errors->has('email'))
                        <p class="font-bold text-red-500">{{ $errors->first('password') }}</p>
                    @endif

                    <input 
                        type="password" 
                        name="password" 
                        placeholder="Password" 
                        class="bg-[#434458] font-bold uppercase text-gray-100 p-4 rounded-xl @if($errors->has('password')) ring-2 ring-red-500 @endif"
                    >

                    @if ($errors->has('password'))
                        <p class="font-bold text-red-500">{{ $errors->first('password') }}</p>
                    @endif


                    @if ($errors->has('incorrect'))
                        <p class="font-bold text-red-500">{{ $errors->first('incorrect') }}</p>
                    @endif

                    <x-button type="submit" buttonTag="button" icon="pl-1 fa-arrow-right-to-bracket">Log in</x-button>
                </form>
            </div>

            <x-button theme="secondary" link="#">Login as a guest</x-button>
        </div>
    </div>
</x-layouts.app>
