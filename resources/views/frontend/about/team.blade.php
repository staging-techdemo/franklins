@php
   $visions = [
      [
         'image' => 'team1.jpg',
         'title' => 'Dianna Breslin',
         'desc' => 'Senior care physician.'
      ],
      [
         'image' => 'team2.jpg',
         'title' => 'Michele Brigham',
         'desc' => 'Clinical lead.'
      ],
      [
         'image' => 'team3.jpg',
         'title' => 'Patrick Herron',
         'desc' => 'Director of operations.'
      ],
      [
         'image' => 'team4.jpg',
         'title' => 'Michele Harmon',
         'desc' => 'Geriatrician.'
      ],
   ];
@endphp

<section class="w-full bg-white padding-x padding-y">
   <div class="w-full flex flex-col gap-5 items-center mb-14 relative z-20">
      <div class="bg-[#F0BB4C] rounded-full px-5 py-2.5">
         <p class="smallParagraph text-black capitalize font-semibold leading-tight tracking-wide">
            Our Team
         </p>
      </div>
      <div>
         <h2 class="heading font-semibold leading-tight text-black dmserif max-w-4xl text-center">
            Our Friendly Team Of Senior Care
            <span class="relative inline-block">
               Specialist
               <svg class="absolute -bottom-4 left-0 w-full" viewBox="0 0 120 20" fill="none">
                  <path d="M5 15C30 5 90 5 115 15" stroke="#E7B36A" stroke-width="2" stroke-linecap="round" />
               </svg>
            </span>
            And Advisors
         </h2>
      </div>
   </div>
   <div class="swiper teamSwiper">
      <div class="swiper-wrapper">
         @foreach ($visions as $vision)
            <div class="swiper-slide h-auto">
               <div class="bg-white rounded-xl h-full flex flex-col group">
                  <div class="overflow-hidden rounded-xl">
                     <img src="{{ asset('assets/' . $vision['image']) }}" alt="{{ $vision['title'] }}"
                        class="w-full object-cover group-hover:scale-105 transition duration-500">
                  </div>
                  <div class="flex flex-col gap-2 text-[#666666] text-sm pt-5">
                     <h3 class="text-3xl font-semibold leading-snug text-black">
                        {{ $vision['title'] }}
                     </h3>
                     <p class="text-[#666666] leading-relaxed text-lg">
                        {{ $vision['desc'] }}
                     </p>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
      <div class="swiper-pagination mt-14 !relative"></div>
   </div>
</section>

<script>
   document.addEventListener('DOMContentLoaded', function () {
      new Swiper(".teamSwiper", {
         slidesPerView: 1,
         spaceBetween: 20,
         loop: true,

         pagination: {
            el: ".teamSwiper .swiper-pagination",
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
               slidesPerView: 4,
            },
         },
      });
   });
</script>