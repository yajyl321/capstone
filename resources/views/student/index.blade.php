<x-advance-layout :title="'BrightWords Academy'">
    
  <x-slot name="navbar">
    <nav class="bg-gradient-to-r from-[#ff6f61] to-[#ffb400] shadow-md sticky top-0 z-50">
        <!-- Full Navbar -->
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="hidden md:flex justify-between h-16 relative">
                <div class="flex">
                    <a href="{{ route('student.index')}}" class="flex items-center">
                        <img src="{{ asset('logo.jpeg') }}" width="50" alt="Logo" class="m-2 rounded-full">
                        <span class="text-white font-bold text-xl">BrightWords Academy</span>
                    </a>
                </div>
                <div class="hidden md:flex space-x-20 p-4">
                    <a href="{{ route('student.schedule') }}" class="text-white hover:opacity-75">Schedule</a>
                   <div class="relative">
                        <button id="accountPictureDesktop" class="block h-8 w-8 rounded-full overflow-hidden border-2 border-gray-600 focus:outline-none focus:border-white">
                            <img class="h-full w-full object-cover" src="{{ asset('storage/' . $student->profile_picture) }}" alt="Profile">
                        </button>
                        <div id="accountDropDownDesktop" class="hidden absolute right-0 mt-2 py-2 w-48 bg-white rounded-lg shadow-xl z-10">
                            <a href="{{ route('student.profile') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Account Settings</a>
                            <form action="{{ route('student.logout') }}" method="POST" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">
                              @csrf
                              <button type="submit">Log out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Navbar -->
            <div class="md:hidden relative">
                <div class="flex space-x-20">
                    <a href="{{ route('student.index')}}" class="flex items-center">
                        <img src="{{ asset('logo.jpeg') }}" width="50" alt="Logo" class="m-2 rounded-full">
                        <span class="text-white font-bold text-xl">BrightWords Academy</span>
                    </a>
                    <div class="flex gap-4 items-center relative">
                        <a href="{{ route('student.schedule') }}" class="text-white hover:opacity-75">Schedule</a>
                       <div class="relative">
                            <button id="accountPictureMobile" class="block h-8 w-8 rounded-full overflow-hidden border-2 border-gray-600 focus:outline-none focus:border-white">
                                <img class="h-full w-full object-cover" src="{{ asset('storage/' . auth()->guard('student')->user()->profile_picture) }}" alt="Profile">
                            </button>
                            <div id="accountDropDownMobile" class="hidden absolute right-0 mt-2 py-2 w-48 bg-white rounded-lg shadow-xl z-10">
                                <a href="{{ route('student.profile') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Account Settings</a>
                                <form action="{{ route('student.logout') }}" method="POST" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">
                                  @csrf
                                  <button type="submit">Log out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
  </x-slot>

    <x-slot name="footer">
        <div class="bg-gray-800 text-white p-6">
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

</x-advance-layout>
