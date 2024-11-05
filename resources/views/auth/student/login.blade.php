<x-advance-layout :title="'Login'">
    <x-slot name="navbar">
        <nav class="bg-gradient-to-r from-[#ff6f61] to-[#ffb400]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="hidden md:flex items-center h-16">
                <div class="flex">
                    <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{asset('logo.jpeg')}}" width="50" alt="Logo" class="m-2 rounded-full">
                    <span class="text-white font-bold text-xl">BrightWords Academy</span>
                    </a>
                </div>
                </div>
                
                <div class="md:hidden">
                    <div class="flex">
                    <a href="/">
                        <span class="text-white font-bold text-xl">BrightWords Academy</span>
                    </a>
                    </div>
                </div>
            </div>
        </nav>
    </x-slot>
    
    <x-slot name="footer">
        <div class="bg-gray-800 text-white p-6 ">
            <div class="text-center">
                <h1 class="text-2xl font-bold">BrightWords Academy</h1>
                <p class="italic my-2">
                "Success is not the key to happiness. Happiness is the key to
                success. If you love what you are doing, you will be successful."
                </p>
                <p>Copyright &copy; 2024 | All Rights Reserved | WD103P</p>
            </div>
        </div>
    </x-slot>

    <div class="py-44" style="height: 100vh; background: url('{{ asset('students.jpg') }}') no-repeat center center/cover; z-index: -1;">
        <div class="flex flex-col w-full md:w-1/2 xl:w-2/5 2xl:w-2/5 3xl:w-1/3 mx-auto p-8 md:p-10 2xl:p-12 3xl:p-14 bg-[#ffffff] rounded-2xl shadow-xl">
            <div class="flex flex-row gap-3 pb-4">
                <div>
                    <img src="{{asset('logo.jpeg')}}" width="50" alt="Logo" class="rounded-full">
                </div>
                    <h1 class="text-3xl font-bold text-[#4B5563] text-[#4B5563] my-auto">BrightWords Academy</h1>
                </div>
            <div class="text-sm font-light text-[#6B7280] pb-8 ">Login to your account on BrightWords Academy.</div>
            <form class="flex flex-col" action="{{ route('student.login') }}" method="POST">
                @csrf
                <div class="pb-2">
                    <label for="email" class="block mb-2 text-sm font-medium text-[#111827]">Email</label>
                    <div class="relative text-gray-400"><span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg></span> 
                        <input type="email" name="email" id="email" class="pl-12 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 sm:text-sm rounded-lg ring ring-transparent focus:ring-1 focus:outline-none focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" placeholder="name@company.com" autocomplete="off" fdprocessedid="zl4qdh">
                    </div>
                </div>
                <div class="pb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-[#111827]">Password</label>
                    <div class="relative text-gray-400"><span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-asterisk"><rect width="18" height="18" x="3" y="3" rx="2"></rect><path d="M12 8v8"></path><path d="m8.5 14 7-4"></path><path d="m8.5 10 7 4"></path></svg></span> 
                        <input type="password" name="password" id="password" placeholder="••••••••••" class="pl-12 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 sm:text-sm rounded-lg ring ring-transparent focus:ring-1 focus:outline-none focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" autocomplete="new-password" fdprocessedid="fidgj">
                    </div>
                </div>
                <button type="submit" class="w-full text-[#FFFFFF] bg-[#4F46E5] focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-6" fdprocessedid="q9n0x2" value="Login">Login</button>
                <div class="text-sm font-light text-[#6B7280] ">Don't have an accout yet? <a href="{{ route('student.register')}} " class="font-medium text-[#4F46E5] hover:underline">Sign Up</a>
        
                </div>
            </form>
        </div>
    </div>
</x-advance-layout>
