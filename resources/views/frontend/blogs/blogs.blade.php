@php
   $blogs = [
      [
         'image' => 'blog01.jpg',
         'date' => 'Aug 24, 2025',
         'comments' => '03 Comment',
         'title' => 'Choosing The Right Elderly Home: What Families Should Know',
         'desc' => 'We believe in nurturing a sense of community, encouraging independence, and ensuring that they feel safe and valued.'
      ],
      [
         'image' => 'blog02.jpg',
         'date' => 'Aug 25, 2025',
         'comments' => 'No Comment',
         'title' => 'Understanding Different Levels Of Senior Care: Assisted Living',
         'desc' => 'Understanding assisted living and choosing the right support for seniors and their families.'
      ],
      [
         'image' => 'blog03.jpg',
         'date' => 'Aug 26, 2025',
         'comments' => '01 Comment',
         'title' => 'Top 5 Health Tips For Seniors Living In Care Homes',
         'desc' => 'Essential health and wellness tips for seniors to stay healthy and active every day.'
      ],
      [
         'image' => 'blog04.jpg',
         'date' => 'Aug 27, 2025',
         'comments' => 'No Comment',
         'title' => 'The Role Of Family In Senior Care: Staying Connected',
         'desc' => 'How emotional support and family involvement improve senior well-being.'
      ],
   ];
@endphp
<section class="bg-white padding-x padding-y overflow-hidden">
   <div class="w-full flex flex-col gap-5 items-center mb-14">
      <div class="bg-[#F0BB4C] rounded-full px-5 py-2.5">
         <p class="smallParagraph text-black capitalize font-semibold leading-tight tracking-wide">
            Latest News
         </p>
      </div>
      <div>
         <h2 class="heading font-semibold leading-tight text-black dmserif max-w-4xl text-center">
            Check Out Everything Interesting And Useful
            From The Latest
            <span class="relative inline-block">
               News
               <svg class="absolute -bottom-3 left-0 w-full" viewBox="0 0 120 20" fill="none">

                  <path d="M5 15C30 5 90 5 115 15" stroke="#E7B36A" stroke-width="2" stroke-linecap="round" />
               </svg>
            </span>
         </h2>
      </div>
   </div>
   <div class="swiper blogSwiper">
      <div class="swiper-wrapper">
         @foreach ($blogs as $blog)
            <div class="swiper-slide h-auto">
               <div class="bg-[#FAFAFA] rounded-md p-5 h-full flex flex-col">
                  <div class="overflow-hidden rounded-md">
                     <img src="{{ asset('assets/' . $blog['image']) }}" alt="{{ $blog['title'] }}"
                        class="w-full h-[320px] object-cover hover:scale-105 transition duration-500">
                  </div>
                  <div class="flex items-center gap-4 text-gray-500 text-sm mt-6">
                     <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                           stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ $blog['date'] }}
                     </div>
                     <span>/</span>
                     <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                           stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4-.8L3 20l1.2-3.2A7.963 7.963 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        {{ $blog['comments'] }}
                     </div>
                  </div>
                  <h3 class="text-3xl font-semibold leading-snug mt-5 mb-4 text-black">
                     {{ $blog['title'] }}
                  </h3>
                  <p class="text-gray-600 leading-relaxed text-lg">
                     {{ $blog['desc'] }}
                  </p>
               </div>
            </div>
         @endforeach
      </div>
      <div class="swiper-pagination mt-14 !relative"></div>
   </div>
</section>

<script>
   document.addEventListener('DOMContentLoaded', function () {
      new Swiper(".blogSwiper", {
         slidesPerView: 1,
         spaceBetween: 30,
         loop: true,

         pagination: {
            el: ".blogSwiper .swiper-pagination",
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
   });
</script>