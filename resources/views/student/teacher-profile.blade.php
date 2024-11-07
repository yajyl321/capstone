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
    
    <div class="container mx-auto py-40">
        <div class="text-center">
            <img src="{{ asset('storage/' . $teacher->profile_picture) }}" alt="Profile Picture" class="w-32 h-32 rounded-full mx-auto mb-4">
            <h1 class="text-3xl font-bold">{{ $teacher->name }}</h1>
            <p class="text-xl text-gray-600">{{ $teacher->personality}}</p>

        </div>

        <h2 class="text-2xl font-semibold text-center my-6">Available Schedule</h2>

        @if($schedules->isEmpty())
            <p class="text-center text-red-500">No available schedules for this teacher.</p>
        @else
            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
                        <th class="px-4 py-3 text-center">Time</th>
                        <th class="px-4 py-3 text-center">Monday</th>
                        <th class="px-4 py-3 text-center">Tuesday</th>
                        <th class="px-4 py-3 text-center">Wednesday</th>
                        <th class="px-4 py-3 text-center">Thursday</th>
                        <th class="px-4 py-3 text-center">Friday</th>
                        <th class="px-4 py-3 text-center">Saturday</th>
                        <th class="px-4 py-3 text-center">Sunday</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timeSlots as $timeSlot)
                        <tr class="border-b hover:bg-blue-50">
                            <td class="px-4 py-3 text-left font-semibold text-gray-800">{{ $timeSlot }}</td>
            
                            @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                <td class="px-4 py-3 text-center">
                                    @php
                                        // Find schedule for the current time slot and day
                                        $schedule = $schedules->firstWhere(function ($schedule) use ($timeSlot, $day) {
                                            return $schedule->time_slot === $timeSlot && $schedule->day_of_week === $day;
                                        });
                                    @endphp
            
                                    @if ($schedule)
                                        @if ($schedule->is_booked)
                                            <span class="inline-block bg-gray-500 text-white font-semibold px-6 py-2 rounded-lg shadow-md">BOOKED</span>
                                        @else
                                            <form action="{{ route('student.book.lesson', $schedule->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="inline-block bg-green-500 text-white font-semibold px-6 py-2 rounded-lg shadow-md hover:bg-green-600">AVAILABLE</button>
                                            </form>
                                        @endif
                                    @else
                                        <span class="inline-block bg-gray-200 text-gray-600 font-semibold px-6 py-2 rounded-lg shadow-md">No Slot</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
        @endif
    </div>
</x-advance-layout>
