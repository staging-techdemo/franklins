<section class="relative overflow-hidden bg-white padding-x padding-y">
   <div class="absolute inset-0 z-0">
      <img src="{{ asset('assets/services-bg.png') }}" alt="Services Background" class="w-full h-full object-cover">
   </div>
   <div class="w-full relative flex flex-col gap-10 z-10">
      <div class="w-full flex flex-col items-center justify-center gap-3">
         <div class="w-fit bg-[#F0BB4C] rounded-full px-5 py-2.5">
            <p class="smallParagraph text-black capitalize font-semibold leading-tight tracking-wide">
               Our Services
            </p>
         </div>
         <div>
            <h2 class="heading font-semibold leading-tight text-black dmserif text-center">
               Dedicated To Quality Elderly Care <br> With
               Compassion And
               <span class="relative inline-block">
                  Respect
                  <svg class="absolute -bottom-3 left-0 w-full" viewBox="0 0 120 20" fill="none">

                     <path d="M5 15C30 5 90 5 115 15" stroke="#E7B36A" stroke-width="2" stroke-linecap="round" />
                  </svg>
               </span>
               Always
            </h2>
         </div>
      </div>
      <div class="grid grid-cols-3 gap-20 items-center justify-center">
         <div class="space-y-6">
            <div
               class="relative bg-white rounded-md px-6 py-7 flex items-center gap-5 overflow-hidden hover:bg-[#7E80B0] transition-colors ease-linear duration-300 cursor-pointer">
               <div class="relative z-10 w-20 h-20 rounded-full bg-[#F0BB4C] flex items-center justify-center shrink-0">
                  <img src="{{ asset('assets/service1.png') }}" alt="" class="w-10 h-10 object-contain">
               </div>
               <h3 class="text-3xl font-semibold text-black dmserif">
                  Rehabilitation Services
               </h3>
            </div>
            <div
               class="relative bg-white rounded-md px-6 py-7 flex items-center gap-5 overflow-hidden hover:bg-[#7E80B0] transition-colors ease-linear duration-300 cursor-pointer">
               <div class="relative z-10 w-20 h-20 rounded-full bg-[#F0BB4C] flex items-center justify-center shrink-0">
                  <img src="{{ asset('assets/service2.png') }}" alt="" class="w-10 h-10 object-contain">
               </div>
               <h3 class="text-3xl font-semibold text-black dmserif">
                  Home Safety Assessments
               </h3>
            </div>
            <div
               class="relative bg-white rounded-md px-6 py-7 flex items-center gap-5 overflow-hidden hover:bg-[#7E80B0] transition-colors ease-linear duration-300 cursor-pointer">
               <div class="relative z-10 w-20 h-20 rounded-full bg-[#F0BB4C] flex items-center justify-center shrink-0">
                  <img src="{{ asset('assets/service3.png') }}" alt="" class="w-10 h-10 object-contain">
               </div>
               <h3 class="text-3xl font-semibold text-black dmserif">
                  Transportation Assistance
               </h3>
            </div>
         </div>
         <div class="flex justify-center">
            <div class="overflow-hidden rounded-[40px]">
               <img src="{{ asset('assets/service-img.jpg') }}" alt=""
                  class="w-full h-full object-cover rounded-3xl rounded-bl-[50%] min-h-[600px]">
            </div>
         </div>
         <div class="flex flex-col gap-5">
            <h3 class="text-4xl font-semibold leading-snug text-black dmserif">
               Our Personalized Approach Ensures
               That Seniors Receive The Care
            </h3>
            <p class="text-[#666666] leading-relaxed paragraph">
               These facilities are designed to support the social
               well-being of older adults through personalized care
               plans, professional medical support engaging
            </p>
            <div class="space-y-5">
               <div class="flex items-center gap-4">
                  <div class="w-7 h-7 rounded-full bg-[#F0BB4C] flex items-center justify-center shrink-0">
                     ✓
                  </div>
                  <p class="text-xl text-black">
                     Nutritious meal planning
                  </p>

               </div>
               <div class="flex items-center gap-4">
                  <div class="w-7 h-7 rounded-full bg-[#F0BB4C] flex items-center justify-center shrink-0">
                     ✓
                  </div>
                  <p class="text-xl text-black">
                     Companionship and social activities
                  </p>
               </div>
               <div class="flex items-center gap-4">
                  <div class="w-7 h-7 rounded-full bg-[#F0BB4C] flex items-center justify-center shrink-0">
                     ✓
                  </div>
                  <p class="text-xl text-black">
                     Transportation assistance
                  </p>
               </div>
            </div>
            <button
               class="w-fit bg-[#F0BB4C] text-black subparagraph flex items-center gap-2 font-medium px-5 py-4 rounded-md hover:bg-[#7E80B0] hover:text-white transition-all duration-300">
               Learn More
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
</section>