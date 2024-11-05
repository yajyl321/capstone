<x-advance-layout :title="'Home Page'">
    
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
                          <a href="{{ route('student.classroom') }}" class="text-white hover:opacity-75">Classroom</a>
                          <div class="relative">
                              <button id="accountPictureMobile" class="block h-8 w-8 rounded-full overflow-hidden border-2 border-gray-600 focus:outline-none focus:border-white">
                                  <img class="h-full w-full object-cover" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2A7D3pZJJSVoO2hwyCFz1w--NMgFj74ho_w&s" alt="pikachu">
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

    {{-- this is for the booking a lesson --}}
    <div>
        @if(isset($teachers) && $teachers->isNotEmpty())
        <div class="container mx-auto p-4">
            <h2 class="text-lg font-bold mb-4">Book a Lesson</h2>
            @if(session('success'))
                <div class="text-green-500">{{ session('success') }}</div>
            @endif
            <form action="{{ route('student.book-lesson') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="teacher_id" class="block font-medium">Choose Teacher</label>
                    <select name="teacher_id" id="teacher_id" class="w-full border p-2">
                        <option value="">Select a teacher</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="date" class="block font-medium">Date</label>
                    <input type="date" name="date" id="date" class="w-full border p-2">
                </div>
                <div>
                    <label for="time" class="block font-medium">Time</label>
                    <input type="time" name="time" id="time" class="w-full border p-2">
                </div>
                <button type="submit" class="bg-blue-500 text-white p-2 rounded">Book Lesson</button>
            </form>
        </div>
        @else
            <p>No teachers available for booking.</p>
        @endif
    
    </div>


    {{-- This is to display the booked schedule --}}
    <div class="container mx-auto p-4 mt-3" style="height: 50vh">
      <h2 class="text-lg font-bold mb-4">Your Scheduled Lessons</h2>

      @if($studentLessons->isEmpty())
          <p>No lessons scheduled.</p>
      @else
          <ul>
              @foreach($studentLessons as $lesson)
                  <li>
                      Lesson with {{ $lesson->teacher->name }} on {{ $lesson->date }} at {{ $lesson->time }}
                      <form action="{{ route('student.cancel-lesson', $lesson->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="text-red-500">Cancel</button>
                      </form>
                  </li>
              @endforeach
          </ul>
      @endif
  </div>
    
</x-advance-layout>
