<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Default Title' }}</title>

    {{-- Tailwind style --}}
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>

    {{-- style for carousel --}}
    <style>
        /* styling for carousel*/
        .carousel-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 0.5rem;
            border-radius: 50%;
        }
        .carousel-button-left {
            left: 0.5rem;
        }
        .carousel-button-right {
            right: 0.5rem;
        }

        /* for modal */
        @keyframes fadeIn {
            from {
            opacity: 0;
            transform: translateY(-10%);
            }
            to {
            opacity: 1;
            transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out forwards;
        }
    </style>

    


</head>
<body>
  
        {{ $navbar ?? '' }}

        <header>
        {{ $header ?? '' }}
        </header>

    <main>
        {{ $about ?? '' }}
        {{ $carousel ?? '' }}
        {{ $slot }}
    </main>

    <footer>
        {{ $footer ?? '' }}
    </footer>

  
    <script>
        //   for animation on carousel
        let currentIndex = 0;
        const carouselItems = document.getElementById("carouselItems");
        const totalItems = carouselItems.children.length;

        function updateCarousel() {
            const offset = -currentIndex * 100;
            carouselItems.style.transform = `translateX(${offset}%)`;
        }

        function autoPlayCarousel() {
            setInterval(() => {
                currentIndex = (currentIndex + 1) % totalItems;
                updateCarousel();
            }, 5000); 
        }

        document.getElementById("prevButton").addEventListener("click", () => {
            currentIndex = (currentIndex - 1 + totalItems) % totalItems;
            updateCarousel();
        });

        document.getElementById("nextButton").addEventListener("click", () => {
            currentIndex = (currentIndex + 1) % totalItems;
            updateCarousel();
        });
        autoPlayCarousel();

        // for modal
        function showModal(type) {
        if (type === 'login') {
            document.getElementById('loginModal').classList.remove('hidden');
        } else if (type === 'register') {
            document.getElementById('registerModal').classList.remove('hidden');
        }
        }
    
        function closeModal() {
        document.getElementById('loginModal').classList.add('hidden');
        document.getElementById('registerModal').classList.add('hidden');
        }
    </script>

    <script>
        // Desktop dropdown toggle
        document.getElementById("accountPictureDesktop").addEventListener("click", () => {
            const dropdownDesktop = document.getElementById("accountDropDownDesktop");
            console.log("Desktop dropdown toggled");
            dropdownDesktop.classList.toggle("hidden");
        });

        // Mobile dropdown toggle
        document.getElementById("accountPictureMobile").addEventListener("click", () => {
            const dropdownMobile = document.getElementById("accountDropDownMobile");
            console.log("Mobile dropdown toggled");
            dropdownMobile.classList.toggle("hidden");
        });
    </script>

    
    <script>
        //for profile picture
        function displayImage(event) {
            const profilePic = document.getElementById('profile-pic');
            const file = event.target.files[0];
            if (file) {
                profilePic.src = URL.createObjectURL(file);
            }
        }
    </script>
  
</body>
</html>
