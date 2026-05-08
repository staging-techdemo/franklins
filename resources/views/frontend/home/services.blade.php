@php
   $services = [
      [
         'icon' => 'service-icon1.png',
         'category' => 'Family & Couples',
         'title' => 'Relationship Counseling',
         'desc' => 'Guidance and support to strengthen relationships and improve communication.'
      ],
      [
         'icon' => 'service-icon2.png',
         'category' => 'Mood Disorders',
         'title' => 'Depression Treatment',
         'desc' => 'Compassionate care and evidence-based strategies to overcome depression.'
      ],
      [
         'icon' => 'service-icon3.png',
         'category' => 'Mental Health',
         'title' => 'Anxiety Counseling',
         'desc' => 'Professional guidance to reduce anxiety and improve emotional well-being.'
      ],
      [
         'icon' => 'service-icon4.png',
         'category' => 'Therapy',
         'title' => 'Personal Growth Therapy',
         'desc' => 'Helping individuals discover their strengths and achieve emotional balance.'
      ],
   ];
@endphp

<section class="bg-[#f7f7f7] py-20 overflow-hidden">
   <div class="max-w-7xl mx-auto px-4">

      <!-- Swiper -->
      <div class="swiper therapySwiper">

         <div class="swiper-wrapper">

            <!-- Card -->
            <div class="swiper-slide">
               <div class="bg-white rounded-[28px] p-5 relative h-full">

                  <!-- Image -->
                  <div class="relative overflow-hidden rounded-[24px]">
                     <img src="{{ asset('assets/work1.png') }}" alt="" class="w-full h-[400px] object-cover">

                     <!-- Floating Icon -->
                     <div
                        class="absolute bottom-[-18px] right-8 w-16 h-16 rounded-2xl bg-[#C98312] shadow-xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none"
                           viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M17 20h5V4H2v16h5m10 0v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4m10 0H7" />
                        </svg>
                     </div>
                  </div>

                  <!-- Content -->
                  <div class="pt-12">

                     <span
                        class="inline-block px-4 py-2 rounded-full bg-[#F2F4F7] text-xs font-medium uppercase text-gray-700">
                        Family & Couples
                     </span>

                     <h3 class="text-4xl font-semibold text-[#0B1B2B] mt-5 mb-4">
                        Relationship Counseling
                     </h3>

                     <p class="text-gray-600 text-lg leading-relaxed">
                        Guidance and support to strengthen relationships and improve communication.
                     </p>

                  </div>

               </div>
            </div>

            <!-- Card -->
            <div class="swiper-slide">
               <div class="bg-white rounded-[28px] p-5 relative h-full">

                  <div class="relative overflow-hidden rounded-[24px]">
                     <img src="{{ asset('assets/service2.jpg') }}" alt="" class="w-full h-[400px] object-cover">

                     <div
                        class="absolute bottom-[-18px] right-8 w-16 h-16 rounded-2xl bg-[#C98312] shadow-xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none"
                           viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M9 12h6m-3-3v6m8-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                     </div>
                  </div>

                  <div class="pt-12">

                     <span
                        class="inline-block px-4 py-2 rounded-full bg-[#F2F4F7] text-xs font-medium uppercase text-gray-700">
                        Mood Disorders
                     </span>

                     <h3 class="text-4xl font-semibold text-[#0B1B2B] mt-5 mb-4">
                        Depression Treatment
                     </h3>

                     <p class="text-gray-600 text-lg leading-relaxed">
                        Compassionate care and evidence-based strategies to overcome depression.
                     </p>

                  </div>

               </div>
            </div>

            <!-- Card -->
            <div class="swiper-slide">
               <div class="bg-white rounded-[28px] p-5 relative h-full">

                  <div class="relative overflow-hidden rounded-[24px]">
                     <img src="{{ asset('assets/service3.jpg') }}" alt="" class="w-full h-[400px] object-cover">

                     <div
                        class="absolute bottom-[-18px] right-8 w-16 h-16 rounded-2xl bg-[#C98312] shadow-xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none"
                           viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                     </div>
                  </div>

                  <div class="pt-12">

                     <span
                        class="inline-block px-4 py-2 rounded-full bg-[#F2F4F7] text-xs font-medium uppercase text-gray-700">
                        Mental Health
                     </span>

                     <h3 class="text-4xl font-semibold text-[#0B1B2B] mt-5 mb-4">
                        Anxiety Counseling
                     </h3>

                     <p class="text-gray-600 text-lg leading-relaxed">
                        Professional guidance to reduce anxiety and improve emotional well-being.
                     </p>

                  </div>

               </div>
            </div>

            <!-- Card -->
            <div class="swiper-slide">
               <div class="bg-white rounded-[28px] p-5 relative h-full">

                  <div class="relative overflow-hidden rounded-[24px]">
                     <img src="{{ asset('assets/service4.jpg') }}" alt="" class="w-full h-[400px] object-cover">

                     <div
                        class="absolute bottom-[-18px] right-8 w-16 h-16 rounded-2xl bg-[#C98312] shadow-xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none"
                           viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M8 10h8m-8 4h5m-9 7h14a2 2 0 002-2V5a2 2 0 00-2-2H6a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                     </div>
                  </div>

                  <div class="pt-12">

                     <span
                        class="inline-block px-4 py-2 rounded-full bg-[#F2F4F7] text-xs font-medium uppercase text-gray-700">
                        Therapy
                     </span>

                     <h3 class="text-4xl font-semibold text-[#0B1B2B] mt-5 mb-4">
                        Personal Growth Therapy
                     </h3>

                     <p class="text-gray-600 text-lg leading-relaxed">
                        Helping individuals discover their strengths and achieve emotional balance.
                     </p>

                  </div>

               </div>
            </div>

         </div>

         <!-- Pagination -->
         <div class="swiper-pagination mt-14 !relative"></div>

      </div>
   </div>
</section>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
   const swiper = new Swiper(".therapySwiper", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,

      pagination: {
         el: ".swiper-pagination",
         clickable: true,
      },

      breakpoints: {
         640: {
            slidesPerView: 1,
         },
         768: {
            slidesPerView: 2,
         },
         1024: {
            slidesPerView: 3,
         },
      },
   });
</script>

<style>
   .swiper-pagination-bullet {
      width: 10px;
      height: 10px;
      background: #d1d5db;
      opacity: 1;
   }

   .swiper-pagination-bullet-active {
      width: 30px;
      border-radius: 999px;
      background: #C98312;
   }
</style>