<section class="relative overflow-hidden bg-[#f5f7fa] padding-x padding-y">
   <div class="w-full flex flex-col gap-12">

      <!-- Section Header -->
      <div class="w-full flex flex-col items-center justify-center gap-3">
         <div class="w-fit bg-[#F0BB4C] rounded-full px-5 py-2.5">
            <p class="smallParagraph text-black capitalize font-semibold leading-tight tracking-wide">Our Services</p>
         </div>
         <h2 class="heading font-semibold leading-tight text-black dmserif text-center max-w-3xl">
            Dedicated To Quality Elderly Care With
            <span class="relative inline-block">
               Compassion
               <svg class="absolute -bottom-3 left-0 w-full" viewBox="0 0 120 20" fill="none">
                  <path d="M5 15C30 5 90 5 115 15" stroke="#E7B36A" stroke-width="2" stroke-linecap="round" />
               </svg>
            </span>
            And Respect Always
         </h2>
         <p class="text-[#666] paragraph text-center max-w-2xl mt-2">
            We offer a wide range of professional home care services tailored to meet the unique needs of every senior.
         </p>
      </div>

      <!-- Services Grid -->
      @if($services->isNotEmpty())
         <div class="grid grid-cols-3 gap-6 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 xm:grid-cols-1">
            @foreach($services as $service)
               <a href="{{ route('service-detail', $service->slug) }}"
                  class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-400 border border-transparent hover:border-[#F0BB4C]/30">
                  <div class="relative overflow-hidden h-[220px]">
                     <img src="{{ $service->image ? asset($service->image) : asset('assets/service-detail.jpg') }}"
                        alt="{{ $service->title }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                     <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                  </div>
                  <div class="p-6">
                     <h3 class="text-[22px] font-semibold text-[#111] mb-3 group-hover:text-[#7E80B0] transition-colors duration-300 dmserif">
                        {{ $service->title }}
                     </h3>
                     @if($service->short_description)
                        <p class="text-gray-500 text-[15px] leading-6 mb-4">
                           {{ Str::limit($service->short_description, 100) }}
                        </p>
                     @endif
                     <div class="inline-flex items-center gap-2 text-[14px] font-semibold text-[#7E80B0] group-hover:gap-3 transition-all duration-300">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                     </div>
                  </div>
               </a>
            @endforeach
         </div>

         <!-- Pagination -->
         @if($services->hasPages())
            <div class="flex justify-center mt-4">
               {{ $services->links() }}
            </div>
         @endif

      @else
         <div class="text-center py-24 text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto mb-5 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <p class="text-xl font-semibold text-gray-300">No services available yet.</p>
            <p class="mt-2 text-sm">Check back soon or contact us for more information.</p>
         </div>
      @endif

   </div>
</section>