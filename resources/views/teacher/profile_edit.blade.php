<x-advance-layout :title="'BrightWords Academy'">
    
    <x-slot name="navbar">
        <nav class="bg-gradient-to-r from-[#ff6f61] to-[#ffb400] shadow-md sticky top-0 z-50">
            <!-- Full Navbar -->
            <div class="mx-auto px-4 sm:px-6 lg:px-8">
                <div class="hidden md:flex justify-between h-16 relative">
                    <div class="flex">
                        <a href="{{ route('teacher.index')}}" class="flex items-center">
                            <img src="{{ asset('logo.jpeg') }}" width="50" alt="Logo" class="m-2 rounded-full">
                            <span class="text-white font-bold text-xl">BrightWords Academy</span>
                        </a>
                    </div>
                    <div class="hidden md:flex space-x-20 p-4">
                        <a href="{{ route('teacher.schedule') }}" class="text-white hover:opacity-75">Schedule</a>
                        <a href="{{ route('teacher.classroom') }}" class="text-white hover:opacity-75">Classroom</a>
                        <div class="relative">
                            <button id="accountPictureDesktop" class="block h-8 w-8 rounded-full overflow-hidden border-2 border-gray-600 focus:outline-none focus:border-white">
                                <img class="h-full w-full object-cover" src="{{ asset('storage/' . $teacher->profile_picture) }}" alt="Profile">
                            </button>
                            <div id="accountDropDownDesktop" class="hidden absolute right-0 mt-2 py-2 w-48 bg-white rounded-lg shadow-xl z-10">
                                <form action="{{ route('teacher.logout') }}" method="POST" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">
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
                        <a href="{{ route('teacher.index')}}" class="flex items-center">
                            <img src="{{ asset('logo.jpeg') }}" width="50" alt="Logo" class="m-2 rounded-full">
                            <span class="text-white font-bold text-xl">BrightWords Academy</span>
                        </a>
                        <div class="flex gap-4 items-center relative">
                            <a href="{{ route('teacher.schedule') }}" class="text-white hover:opacity-75">Schedule</a>
                            <a href="{{ route('teacher.classroom') }}" class="text-white hover:opacity-75">Classroom</a>
                            <div class="relative">
                                <button id="accountPictureMobile" class="block h-8 w-8 rounded-full overflow-hidden border-2 border-gray-600 focus:outline-none focus:border-white">
                                    <img class="h-full w-full object-cover" src="{{ asset('storage/' . $teacher->profile_picture) }}" alt="Profile">
                                </button>
                                <div id="accountDropDownMobile" class="hidden absolute right-0 mt-2 py-2 w-48 bg-white rounded-lg shadow-xl z-10">
                                    <form action="{{ route('teacher.logout') }}" method="POST" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">
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

        <div class="min-h-screen flex items-center justify-center bg-gray-100">
            <div class="max-w-4xl w-full bg-white p-8 rounded-lg shadow-xl">
                <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Your Profile</h2>
        
    
                <form method="POST" action="{{ route('teacher.update') }}" enctype="multipart/form-data">
                    @csrf
                       
                    <div class="space-y-6 max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-lg">
                
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="w-full p-3 mt-2 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('name', $teacher->name) }}" required>
                        </div>
                
                        <!-- Age -->
                        <div>
                            <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                            <input type="number" name="age" id="age" class="w-full p-3 mt-2 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('age', $teacher->age) }}">
                        </div>
                
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="w-full p-3 mt-2 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('email', $teacher->email) }}">
                        </div>
                
                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password" id="password" class="w-full p-3 mt-2 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('password', $teacher->password) }}">
                        </div>
                
                        <!-- Phone Number -->
                        <div>
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" class="w-full p-3 mt-2 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('phone_number', $teacher->phone_number) }}">
                        </div>
                
                        <!-- Address -->
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <textarea name="address" id="address" class="w-full p-3 mt-2 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('address', $teacher->address) }}</textarea>
                        </div>
                
                        <!-- Gender -->
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                            <input type="text" name="gender" id="gender" class="w-full p-3 mt-2 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('gender', $teacher->gender) }}">
                        </div>
                
                        <!-- Personality -->
                        <div>
                            <label for="personality" class="block text-sm font-medium text-gray-700">Personality</label>
                            <input type="text" name="personality" id="personality" class="w-full p-3 mt-2 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('personality', $teacher->personality) }}">
                        </div>
                
                        <!-- Profile Picture -->
                        <div>
                            <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                            <input type="file" id="profile_picture" name="profile_picture" class="w-full p-3 mt-2 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                
                        <!-- Submit Button -->
                        <div class="mt-8 text-center">
                            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-200">Update Profile</button>
                        </div>
                    </div>
                </form>
                        
            </div>
        </div>

</x-advance-layout>