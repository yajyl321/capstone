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
                        <a href="{{ route('student.classroom') }}" class="text-white hover:opacity-75">Classroom</a>
                        <div class="relative">
                            <button id="accountPictureDesktop" class="block h-8 w-8 rounded-full overflow-hidden border-2 border-gray-600 focus:outline-none focus:border-white">
                                <img class="h-full w-full object-cover" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2A7D3pZJJSVoO2hwyCFz1w--NMgFj74ho_w&s" alt="pikachu">
                            </button>
                            <div id="accountDropDownDesktop" class="hidden absolute right-0 mt-2 py-2 w-48 bg-white rounded-lg shadow-xl z-10">
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
                            <a href="{{ route('student.classroom') }}" class="text-white hover:opacity-75">Classroom</a>
                            <div class="relative">
                                <button id="accountPictureMobile" class="block h-8 w-8 rounded-full overflow-hidden border-2 border-gray-600 focus:outline-none focus:border-white">
                                    <img class="h-full w-full object-cover" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2A7D3pZJJSVoO2hwyCFz1w--NMgFj74ho_w&s" alt="pikachu">
                                </button>
                                <div id="accountDropDownMobile" class="hidden absolute right-0 mt-2 py-2 w-48 bg-white rounded-lg shadow-xl z-10">
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
    

    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-lg w-full bg-white p-10 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-center mb-6">Profile</h2>
            
            <!-- Profile Picture Section -->
            <div class="flex flex-col items-center mb-6">
                <div class="relative">
                    <!-- Default Profile Picture or Uploaded Image -->
                    <img id="profile-pic" 
                         src="https://via.placeholder.com/150" 
                         alt="Profile Picture" 
                         class="w-32 h-32 rounded-full border-4 border-gray-300 object-cover">
                    <!-- Camera Icon for Upload -->
                    <label for="profile-picture-input" 
                           class="absolute bottom-0 right-0 w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-5 w-5" 
                             viewBox="0 0 20 20" 
                             fill="currentColor">
                            <path d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2H4zM3 9h2v2H3V9zm8 0h6v6h-6V9zM5 13h4v4H5v-4z" />
                        </svg>
                    </label>
                    <input id="profile-picture-input" 
                           type="file" 
                           accept="image/*" 
                           class="hidden" 
                           onchange="displayImage(event)">
                </div>
                <p class="mt-2 text-gray-500 text-sm">Click on the image to upload a new profile picture</p>
            </div>
    
            <form>
                <!-- Name Field -->
                <label class="block mb-2 text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" class="w-full p-3 border rounded-md mb-4" value="John Doe">
    
                <!-- Age Field -->
                <label class="block mb-2 text-sm font-medium text-gray-700">Age</label>
                <input type="number" class="w-full p-3 border rounded-md mb-4" value="25">
    
                <!-- Email Field -->
                <label class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                <input type="email" class="w-full p-3 border rounded-md mb-4" value="johndoe@example.com" readonly>
    
                <!-- Phone Number Field -->
                <label class="block mb-2 text-sm font-medium text-gray-700">Phone Number</label>
                <input type="tel" class="w-full p-3 border rounded-md mb-4" value="+1234567890">
    
                <!-- Address Field -->
                <label class="block mb-2 text-sm font-medium text-gray-700">Address</label>
                <input type="text" class="w-full p-3 border rounded-md mb-4" value="123 Main Street, City, Country">
    
                <!-- Gender Field -->
                <label class="block mb-2 text-sm font-medium text-gray-700">Gender</label>
                <select class="w-full p-3 border rounded-md mb-4">
                    <option value="male" selected>Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
    
                <!-- Account Type Field (Read-only) -->
                <label class="block mb-2 text-sm font-medium text-gray-700">Account Type</label>
                <input type="text" class="w-full p-3 border rounded-md mb-4" value="Teacher" readonly>
    
                <!-- Subject Specialty Field (Visible only for teachers) -->
                <div class="teacher-field">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Subject Specialty</label>
                    <input type="text" class="w-full p-3 border rounded-md mb-4" value="Grammar">
                </div>
    
                <!-- Update Profile Button -->
                <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-md hover:bg-blue-600">
                    Update Profile
                </button>
            </form>
        </div>
    </div>

</x-advance-layout>

