<x-advance-layout :title="'Registration'">
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
                    <a href="{{ route('home') }}">
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

        <div >

        </div>

    <div class="py-44" style="height: 100vh; background: url('{{ asset('students.jpg') }}') no-repeat center center/cover; z-index: -1;">
        <div class="flex flex-col w-full md:w-1/2 xl:w-2/5 2xl:w-2/5 3xl:w-1/3 mx-auto p-8 md:p-10 2xl:p-12 3xl:p-14 bg-[#ffffff] rounded-2xl shadow-xl">
            <div class="flex flex-row gap-3 pb-4">
                <div>
                    <img src="{{asset('logo.jpeg')}}" width="50" alt="Logo" class="rounded-full">
                </div>
                    <h1 class="text-3xl font-bold text-[#4B5563] text-[#4B5563] my-auto">BrightWords Academy</h1>
        
            </div>
            <div class="text-sm font-light text-[#6B7280] pb-8 ">Sign up for an account on BrightWords Academy.</div>
            <form action="{{ route('student.register') }}" method="POST" class="bg-white p-6 rounded shadow-md">  {{--for action: {{ route('student.register') }}--}}
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium">Name</label>
                    <input type="text" name="name" required class="mt-1 p-2 border rounded w-full" />
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" required class="mt-1 p-2 border rounded w-full" />
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <input type="password" name="password" required class="mt-1 p-2 border rounded w-full" />
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium">Confirm Password</label>
                    <input type="password" name="password_confirmation" required class="mt-1 p-2 border rounded w-full" />
                </div>
                <button type="submit" class="bg-blue-500 text-white p-2 rounded">Register</button>
            </form>
            <p class="mt-4">Already have an account? <a href="{{ route('student.login') }}" class="text-blue-500">Login here</a>.</p> 
        </div>
    </div>
    
</x-advance-layout>
