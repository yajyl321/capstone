<x-advance-layout :title="'BrightWords Academy'">

    <x-slot name="navbar">
        <nav class="bg-gradient-to-r from-[#ff6f61] to-[#ffb400] shadow-md sticky top-0 z-50">
            {{-- Full --}}
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="hidden md:flex justify-between h-16">
                <div class="flex">
                  <a href="{{ route('home')}}" class="flex items-center">
                    <img src="{{asset('logo.jpeg')}}" width="50" alt="Logo" class="m-2 rounded-full">
                    <span class="text-white font-bold text-xl">BrightWords Academy</span>
                  </a>
                </div>
                <div class="hidden md:flex space-x-8 p-4">
                  <a href="{{ route('home')}}" class="text-white hover:opacity-75">Home</a>
                  <a href="#about-us" class="text-white hover:opacity-75">About us</a>
                  <a href="#instruction-card" class="text-white hover:opacity-75">How it works</a>
                  <a href="#enroll-now" class="text-white hover:opacity-75">Enroll now</a>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                  <button onclick="showModal('login')" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow-lg transition duration-300 hover:bg-blue-600">Login</button>
                  <button onclick="showModal('register')" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-lg shadow-lg transition duration-300 hover:bg-green-600">Register</button>
                </div>
              </div>
          
              {{-- Mobile --}}
              <div class="md:hidden">
                <div class="flex p-4 justify-between">
                  <a href="{{ route('home')}}" class="flex items-center">
                    <img src="{{asset('logo.jpeg')}}" width="50" alt="Logo" class="m-2 rounded-full">
                    <span class="text-white font-bold text-xl">BrightWords Academy</span>
                  </a>
                  <div class="flex gap-4">
                    <button onclick="showModal('login')" class="bg-blue-500 text-white font-semibold block px-4 py-2 rounded-lg shadow-lg transition duration-300 hover:bg-blue-600 mx-auto">Login</button>
                    <button onclick="showModal('register')" class="bg-green-500 text-white font-semibold block px-4 py-2 rounded-lg shadow-lg transition duration-300 hover:bg-green-600">Register</button>
                  </div>
                </div>
              </div>
            </div>
          
              <!-- Login Modal -->
            <div id="loginModal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-70 z-50">
                <div class="bg-white p-8 rounded-2xl shadow-xl max-w-lg w-full transform transition-all duration-300 scale-95 opacity-0 animate-fadeIn">
                    <h2 class="text-3xl font-bold mb-8 text-gray-700">Are you a Student or a Teacher?</h2>
                    <div class="flex justify-center space-x-6">
                        <a href="{{ route('student.login')}}" class="px-8 py-3 bg-blue-600 text-white rounded-full shadow-md hover:bg-blue-700 transition duration-200 transform hover:scale-105">Student</a>
                        <a href="{{ route('teacher.login')}}" class="px-8 py-3 bg-green-600 text-white rounded-full shadow-md hover:bg-green-700 transition duration-200 transform hover:scale-105">Teacher</a>
                    </div>
                    <div class="flex justify-center mt-8">
                        <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 border border-gray-300 rounded-full py-2 px-4 shadow-sm hover:shadow-md transition duration-150 transform hover:scale-105">Close</button>
                    </div>
                </div>
            </div>
            
            <!-- Register Modal -->
            <div id="registerModal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-70 z-50">
                <div class="bg-white p-8 rounded-2xl shadow-xl max-w-lg w-full transform transition-all duration-300 scale-95 opacity-0 animate-fadeIn">
                    <h2 class="text-3xl font-bold mb-8 text-gray-700">Are you a Student or a Teacher?</h2>
                    <div class="flex justify-center space-x-6">
                        <a href="{{ route('student.register')}}" class="px-8 py-3 bg-blue-600 text-white rounded-full shadow-md hover:bg-blue-700 transition duration-200 transform hover:scale-105">Student</a>
                        <a href="{{ route('teacher.register')}}" class="px-8 py-3 bg-green-600 text-white rounded-full shadow-md hover:bg-green-700 transition duration-200 transform hover:scale-105">Teacher</a>
                    </div>
                    <div class="flex justify-center mt-8">
                        <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 border border-gray-300 rounded-full py-2 px-4 shadow-sm hover:shadow-md transition duration-150 transform hover:scale-105">Close</button>
                    </div>
                </div>
            </div>
          </nav>
    </x-slot>

    <x-slot name="header">
        <section id="home"> 
            <div class="container mx-auto py-14">
              <img
                src="{{asset('BrightWords_Hero_Section.jpeg')}}"
                class="img-fluid text-center rounded-lg"
                alt="Herosection"
                style="height: 30vh; width: 100%; object-fit: cover;"
              />
            </div>
        </section>
    </x-slot>

    <x-slot name="about">
        <section id="about-us" > 
            <div class="container mx-auto py-20">
              <h3 class="text-3xl text-red-600 font-bold border-b-2 pb-2">About Us</h3>
              <p class="text-lg text-gray-800 pb-2">
                Welcome to BrightWords, where learning English is an exciting adventure for Japanese kids! Our mission is to empower young learners with the skills and confidence to communicate in English, opening up a world of opportunities for them.
              </p>
              <h3 class="text-3xl text-red-600 font-bold border-b-2 pb-2">Our Mission</h3>
              <p class="text-lg text-gray-800 pb-2">
                At BrightWords, our mission is to inspire and equip children with the English language skills they need to thrive in a global society. We aim to create a fun, engaging, and supportive learning environment that fosters curiosity, creativity, and a love for language.
              </p>
              <h3 class="text-3xl text-red-600 font-bold border-b-2 pb-2">Our Vision</h3>
              <p class="text-lg text-gray-800 pb-2">
                We envision a future where every child has the ability to communicate confidently in English, enabling them to connect with the world around them. Through our innovative teaching methods and dedication to excellence, we aspire to be a leading provider of English language education for children in Japan, helping them unlock their potential and pursue their dreams.
              </p>
              <p>Thank you for considering BrightWords as your partner in language learning. We can’t wait to welcome your child to our family!</p>
            </div>
        </section>
    </x-slot>

    <x-slot name="carousel">
        <div class="text-gray-800">
            <section class="container mx-auto p-4 relative">
                <div class="relative overflow-hidden rounded-lg w-full h-72">
                    <div id="carouselItems" class="flex transition-transform duration-700 ease-in-out">
                        <!-- Carousel Item 1 -->
                        <div class="min-w-full">
                            <img src="{{asset('Carousel_1.jpg')}}" class="w-full h-72 object-cover rounded-lg" alt="Interactive Feature 1">
                        </div>
                        <!-- Carousel Item 2 -->
                        <div class="min-w-full">
                            <img src="{{asset('Carousel_2.jpg')}}" class="w-full h-72 object-cover rounded-lg" alt="Interactive Feature 2">
                        </div>
                        <!-- Carousel Item 3 -->
                        <div class="min-w-full">
                            <img src="{{asset('Carousel_3.jpg')}}" class="w-full h-72 object-cover rounded-lg" alt="Interactive Feature 3">
                        </div>
                        <div class="min-w-full">
                          <img src="{{asset('Carousel_4.jpg')}}" class="w-full h-72 object-cover rounded-lg" alt="Interactive Feature 3">
                        </div>
                    </div>
                    <!-- Navigation Buttons -->
                    <button id="prevButton" class="carousel-button carousel-button-left" aria-label="Previous">
                        <span>&lt;</span>
                    </button>
                    <button id="nextButton" class="carousel-button carousel-button-right" aria-label="Next">
                        <span>&gt;</span>
                    </button>
                </div>
            </section>
        </div>
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

    <!-- How to Section -->
    <section id="instruction-card" class="py-44">
        <div class="container mx-auto my-5">
          <h1 class="text-center text-4xl mb-4">How It Works</h1>
    
          <div class="space-y-4">
            <div class="bg-white shadow-md rounded-lg p-4">
              <h5 class="font-semibold">1. Sign Up for an Account</h5>
              <p>Begin by creating a personal account on our ESL website. Fill in your details, such as name, email, and password, to get started. If you're already a member, simply log in.</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4">
              <h5 class="font-semibold">2. Book a Class</h5>
              <p>Choose between live classes or pre-recorded lessons. For live classes, select a time that suits your schedule and secure your spot. For pre-recorded lessons, simply click and start learning at your own pace.</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4">
              <h5 class="font-semibold">3. Engage in Interactive Learning</h5>
              <p>Participate actively in your lessons! For live sessions, join discussions, ask questions, and collaborate with your instructor and classmates. For pre-recorded lessons, complete the exercises and quizzes provided.</p>
            </div>
          </div>
        </div>
      </section>
    
      <!-- Enroll Now Section -->
      <section id="enroll-now" class="bg-gray-200 py-10 border-rounded item-center p-14">
        <div class="container mx-auto p-4 text-center">
          <h1 class="text-4xl font-bold mb-4">Ready to Start Your Journey?</h1>
          <p class="text-lg mb-4">Enroll now and take the first step toward mastering English!</p>
          <a href="{{ route('student.register')}}" class="bg-blue-500 text-white font-semibold text-xl py-2 px-4 rounded-lg shadow-lg transition duration-300 hover:bg-blue-600" >
            Enroll Now
          </a>
        </div>
      </section>
    
      <!-- Contact Us Section -->
      <section class="bg-gray-100 pt-16 p-6 my-4 rounded-lg shadow-md">
        <h2 class="text-xl font-bold text-center mb-4">Contact Us</h2>
        <form class="space-y-4">
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
          </div>
          <div>
            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
            <textarea id="message" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" required></textarea>
          </div>
          <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded-lg shadow-lg transition duration-300 hover:bg-blue-600">
            Send Message
          </button>
        </form>
      </section>
    

</x-advance-layout>
