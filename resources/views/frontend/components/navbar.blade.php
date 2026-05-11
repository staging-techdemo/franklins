<div id="navbar" class="w-full padding-x py-3 transition-all duration-300 border-b border-black/5">
   <div class="w-full flex items-center justify-between">
      <a href="#" class="block">
         <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="w-28 object-cover">
      </a>
      <nav class="flex items-center gap-8 lg:gap-10 uppercase">
         <a href="{{ route('home') }}"
            class="smallParagraph text-black font-medium leading-tight transition-colors duration-300 hover:text-[#C67C48]">Home</a>
         <a href="{{ route('about') }}"
            class="smallParagraph text-black font-medium leading-tight transition-colors duration-300 hover:text-[#C67C48]">About
            Us</a>
         <a href="{{ route('services') }}"
            class="smallParagraph text-black font-medium leading-tight transition-colors duration-300 hover:text-[#C67C48]">Services</a>
         <a href="{{ route('blogs') }}"
            class="smallParagraph text-black font-medium leading-tight transition-colors duration-300 hover:text-[#C67C48]">Blog</a>
         <a href="{{ route('contact') }}"
            class="smallParagraph text-black font-medium leading-tight transition-colors duration-300 hover:text-[#C67C48]">Contact
            Us</a>
      </nav>
      <div>
         <button
            class="bg-[#F0BB4C] text-black subparagraph flex items-center gap-2 font-medium px-5 py-4 rounded-md hover:bg-[#7E80B0] hover:text-white transition-all duration-300">
            Book Appointment
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-up-right">
               <path stroke="none" d="M0 0h24v24H0z" fill="none" />
               <path d="M17 7l-10 10" />
               <path d="M8 7l9 0l0 9" />
            </svg>
         </button>
      </div>
   </div>
</div>

<script>
   window.addEventListener("scroll", function () {
      const navbar = document.getElementById("navbar");

      if (window.scrollY > 80) {
         navbar.classList.add("bg-white", "shadow-sm", "fixed", "top-0", "z-50");
      } else {
         navbar.classList.remove("bg-white", "shadow-sm", "fixed", "top-0", "z-50");
      }
   });
</script>