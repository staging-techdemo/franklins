<section class="w-full padding-x padding-y bg-white overflow-hidden">
   <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-3 gap-10 lg:gap-8 md:grid-cols-1 sm:grid-cols-1 xm:grid-cols-1">
         <!-- SIDEBAR -->
         <div class="space-y-6">
            <!-- SERVICES -->
            <div class="bg-white rounded-[18px] p-6">
               <h3
                  class="text-[28px] lg:text-[24px] md:text-[24px] sm:text-[22px] xm:text-[20px] font-semibold mb-6 text-[#111]">
                  Our Services
               </h3>
               <div class="space-y-3">
                  @foreach ($allServices as $s)
                     <a href="{{ route('service-detail', $s->slug) }}"
                        class="w-full h-[54px] bg-[#f5f5f5] rounded-lg px-5 flex items-center justify-between text-[15px] hover:bg-[#F0BB4C] hover:text-white transition duration-300 {{ $service->id == $s->id ? 'bg-[#F0BB4C] text-white' : '' }}">
                        <span>{{ $s->title }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                           stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                     </a>
                  @endforeach
               </div>
            </div>

            <!-- WORKING HOURS -->
            <div class="bg-white rounded-[18px] p-6">
               <h3
                  class="text-[28px] lg:text-[24px] md:text-[24px] sm:text-[22px] xm:text-[20px] font-semibold mb-6 text-[#111]">
                  Working Hours
               </h3>
               <div class="space-y-4">
                  <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                     <span class="text-gray-600 text-sm">Monday - Thursday:</span>
                     <span class="font-medium text-sm">09:00am - 08:00pm</span>
                  </div>
                  <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                     <span class="text-gray-600 text-sm">Friday - Saturday:</span>
                     <span class="font-medium text-sm">10:00am - 05:00pm</span>
                  </div>
                  <div class="flex items-center justify-between">
                     <span class="text-gray-600 text-sm">Sunday:</span>
                     <span class="font-medium text-sm text-red-500">Closes</span>
                  </div>
               </div>
            </div>

            <!-- CONTACT FORM (Placeholder) -->
            <div class="bg-white rounded-[18px] p-6">
               <h3
                  class="text-[28px] lg:text-[24px] md:text-[24px] sm:text-[22px] xm:text-[20px] font-semibold mb-6 text-[#111]">
                  Get In Touch
               </h3>
               <form class="space-y-4">
                  <input type="text" placeholder="Name"
                     class="w-full h-[54px] bg-[#f5f5f5] rounded-lg px-5 outline-none border border-transparent focus:border-[#F0BB4C] text-sm">
                  <input type="email" placeholder="Email"
                     class="w-full h-[54px] bg-[#f5f5f5] rounded-lg px-5 outline-none border border-transparent focus:border-[#F0BB4C] text-sm">
                  <textarea placeholder="Your message"
                     class="w-full h-[140px] bg-[#f5f5f5] rounded-lg p-5 outline-none border border-transparent focus:border-[#F0BB4C] text-sm resize-none"></textarea>
                  <button
                     class="w-full h-[54px] bg-[#0C8F7D] hover:bg-[#F0BB4C] text-white rounded-lg text-sm font-medium transition duration-300 inline-flex items-center justify-center gap-2">
                     Contact Now
                     <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M14 5l7 7m0 0l-7 7m7-7H3" />
                     </svg>
                  </button>
               </form>
            </div>
         </div>

         <!-- CONTENT -->
         <div class="col-span-2 md:col-span-1 sm:col-span-1 xm:col-span-1">
            <div class="overflow-hidden rounded-[20px] mb-8">
               <img src="{{ $service->image ? asset($service->image) : asset('assets/service-detail.jpg') }}"
                  alt="{{ $service->title }}"
                  class="w-full h-[450px] lg:h-[400px] md:h-[380px] sm:h-[320px] xm:h-[250px] object-cover">
            </div>

            <h2
               class="text-[48px] lg:text-[42px] md:text-[38px] sm:text-[32px] xm:text-[28px] leading-tight font-semibold text-[#111] mb-6">
               {{ $service->title }}
            </h2>

            <div class="prose max-w-none text-gray-600 text-[16px] leading-8 mb-10">
               {!! $service->description !!}
            </div>

            @if($service->includes)
               <h3
                  class="text-[40px] lg:text-[34px] md:text-[32px] sm:text-[28px] xm:text-[24px] leading-tight font-semibold text-[#111] mb-5">
                  Services Include
               </h3>
               <div class="grid grid-cols-2 gap-x-10 gap-y-5 sm:grid-cols-1 xm:grid-cols-1 mb-10">
                  @foreach ($service->includes as $item)
                     <div class="flex items-start gap-3">
                        <div class="w-5 h-5 rounded-full bg-[#F0BB4C]/20 flex items-center justify-center mt-1 flex-shrink-0">
                           <div class="w-2 h-2 rounded-full bg-[#F0BB4C]"></div>
                        </div>
                        <span class="text-gray-700 text-[15px] leading-7">{{ $item }}</span>
                     </div>
                  @endforeach
               </div>
            @endif
         </div>
      </div>
   </div>
</section>