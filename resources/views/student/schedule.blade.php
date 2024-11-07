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
                                <button type="submit" href="{{ route('student.logout') }}" >Log out</button>
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
                                  <img class="h-full w-full object-cover" src="{{ asset('storage/' . $student->profile_picture) }}" alt="Profile">
                              </button>
                              <div id="accountDropDownMobile" class="hidden absolute right-0 mt-2 py-2 w-48 bg-white rounded-lg shadow-xl z-10">
                                  <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Account Settings</a>
                                  <form action="{{ route('student.logout') }}" method="POST" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">
                                    @csrf
                                    <button type="submit" href="{{ route('student.logout') }}" >Log out</button>
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

    <div class="flex justify-center mt-5">
        <a href="{{ route('student.book-lesson') }}" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white font-semibold text-xl py-3 px-8 rounded-full shadow-lg transition duration-300 transform hover:bg-blue-600 hover:scale-105">
            Book Now
        </a>
    </div>
    

    {{-- This is to display the booked schedule --}}
    <div class="container mx-auto p-4 mt-3" style="height: 100vh">
      <h2 class="text-lg font-bold mb-4">Your Scheduled Lessons</h2>

      @if($studentLessons->isEmpty())
        <p>No lessons scheduled.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left border-b">#</th>
                            <th class="px-4 py-2 text-left border-b">Teacher</th>
                            <th class="px-4 py-2 text-left border-b">Day</th>
                            <th class="px-4 py-2 text-left border-b">Time</th>
                            <th class="px-4 py-2 text-left border-b">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($studentLessons as $lesson )
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border-b"><a href="{{ route('student.classroom') }}"><img class="h-24 w-24 object-cover rounded-full" src="{{ asset('storage/' . $lesson->teacher->profile_picture) }}" alt="Profile"></a></td>
                                <td class="px-4 py-2 border-b">{{ $lesson->teacher->name }}</td>
                                <td class="px-4 py-2 border-b">{{ $lesson->schedule->day_of_week }}</td>
                                
                                <td class="px-4 py-2 border-b">{{ $lesson->schedule->time_slot }}</td>
                                <td class="px-4 py-2 border-b">
                                    <form action="{{ route('student.cancel-lesson', $lesson->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">Cancel</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    @endif

  </div>
    
</x-advance-layout>
