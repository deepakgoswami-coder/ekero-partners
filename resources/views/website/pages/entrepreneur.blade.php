@extends('website.layout.main')

@section('title', 'Enterpreneur - Ekero Partners')

@section('content')
<!-- Hero Section -->
<section class="Entrepreneur-bg relative bg-cover bg-center text-white sm:text-inherit">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20 bannersection">
        
        <div class="grid gap-10 items-center lg:grid-cols-2 mt-14 sm:mt-20">
            
            <!-- LEFT -->
            <div class="space-y-6 lg:space-y-8 text-center lg:text-left">
                <p class="font-semibold leading-tight
                          text-3xl sm:text-4xl lg:text-7xl
                          text-white lg:text-[#23A148]">

                    <span class="block text-white growtext">
                        {{ __('entrepreneur.title') }}
                    </span>

                    <span class="block mt-2 text-white">
                        {{ __('entrepreneur.title_sub') }}
                    </span>
                </p>

                <!-- CTA -->
                <div class="flex justify-center lg:justify-start">
                    <a href="{{route('leader.register')}}"
                        class="inline-flex items-center justify-center
                               rounded-full bg-[#39B44F]
                               px-6 py-3 sm:px-7 sm:py-3.5
                               text-base sm:text-lg text-white
                               shadow-md hover:bg-emerald-700
                               transition">
                        {{ __('home.apply_entr') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom strip (Avatar + Rating) -->
    <div class="hidden sm:flex absolute bottom-6 left-6 lg:bottom-10 lg:left-10
                items-center gap-4 z-20">

        <div class="flex -space-x-3">
            @for ($i = 0; $i < 4; $i++)
                <img src="{{ asset('images/avatar.png') }}"
                    class="h-9 w-9 sm:h-10 sm:w-10 rounded-full
                           border-2 border-white object-cover"
                    alt="">
            @endfor
        </div>

        <div class="text-white lg:text-gray-700">
            <div class="flex items-center gap-1 text-amber-400 text-lg sm:text-2xl">
                ★★★★★
            </div>
            <p class="text-sm sm:text-base lg:text-lg font-medium">
                {{ __('home.rating') }}
            </p>
        </div>
    </div>

    <!-- Bottom Right Text -->
    <div class="mt-8 px-4 text-center sm:text-right
                text-white lg:text-gray-700 font-bold lg:font-normal lg:block hidden
                sm:absolute sm:bottom-6 sm:right-6 lg:bottom-10 lg:right-10">
        <p class="text-sm sm:text-base lg:text-lg">
            {{ __('entrepreneur.base_heading') }}<br class="hidden sm:block" />
            {{ __('entrepreneur.base_heading_1') }}
        </p>
    </div>
</section>

<!-- Enterprenur section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-10 sm:px-6 lg:px-24">
        <div class="grid gap-12 lg:grid-cols-2 items-center">
            
            {{-- LEFT: Image Card - Perfectly Middle Aligned --}}
            <div class="relative flex flex-col items-center lg:items-start">
                <button class="absolute -top-4 left-1/2 lg:left-6 -translate-x-1/2 lg:translate-x-0 inline-flex items-center rounded-full
                               border border-emerald-400 bg-white px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em]
                               text-emerald-600 shadow-sm z-10">
                    {{ __('entrepreneur.entrepreneur') }}
                </button>

                <div class="relative mt-12 lg:mt-0 w-full max-w-md lg:max-w-lg mx-auto lg:mx-0">
                    <img src="{{ asset('images/rightsidemen.png') }}" 
                         alt="Entrepreneur"
                         class="w-full h-[500px] lg:h-[664px] object-fill " />
                </div>
            </div>

            {{-- RIGHT: Text + CTA --}}
            <div class="space-y-8 lg:pl-8">
                <div class="space-y-5">
                    <h2 class="text-3xl sm:text-4xl lg:text-3xl font-black text-gray-900 leading-tight tracking-tight">
                        {{ __('entrepreneur.entrepreneur_apply_title_line1') }} 
                        {{ __('entrepreneur.entrepreneur_apply_title_line2') }} 
                        {{ __('entrepreneur.entrepreneur_apply_title_line3') }}
                    </h2>

                    <ul class="space-y-3 text-base sm:text-lg text-gray-700 list-disc pl-6 marker:text-[#6F5CF5] marker:text-xl">
                        <li>{{ __('entrepreneur.entrepreneur_req1') }}</li>
                        <li>{{ __('entrepreneur.entrepreneur_req2') }}</li>
                        <li>{{ __('entrepreneur.entrepreneur_req3') }}</li>
                        <li>{{ __('entrepreneur.entrepreneur_req4') }}</li>
                        <li>{{ __('entrepreneur.entrepreneur_req5') }}</li>
                        <li>{{ __('entrepreneur.entrepreneur_req6') }}</li>
                        <li>{{ __('entrepreneur.entrepreneur_req7') }}</li>
                        <li>{{ __('entrepreneur.entrepreneur_req8') }}</li>
                        <li>{{ __('entrepreneur.entrepreneur_req9') }}</li>
                        <li>{{ __('entrepreneur.entrepreneur_req10') }}</li>
                        <li>{{ __('entrepreneur.entrepreneur_req11') }}</li>
                    </ul>
                </div>

                {{-- ✅ NEW: Prominent CTA Button --}}
                <div class="mt-6 w-full max-w-md mx-auto flex justify-left lg:justify-start">
        <a href="https://ekeropartnersempowerwealth.com/en/contact"
           class="group relative inline-flex items-center justify-center rounded-full 
                  bg-gradient-to-r from-[#39B44F] to-[#23A148] px-10 py-4 
                  text-lg font-bold text-white shadow-xl hover:shadow-2xl 
                  hover:from-[#2E9A3F] hover:to-[#1E8B3F] hover:scale-105 
                  hover:-translate-y-1 transition-all duration-400 ring-2 
                  ring-emerald-200/50 hover:ring-emerald-400/70 focus:outline-none">
            
            <span class="flex items-center gap-2 z-10">
                <i class="bi bi-lightning-charge text-lg group-hover:rotate-12 transition-transform duration-300"></i>
                 {{__('coach.contact_btn')}}  <span aria-hidden="true ms-3">→</span>
            </span>
            
            <div class="absolute inset-0 bg-white/20 rounded-full blur opacity-0 
                       group-hover:opacity-100 transition-opacity duration-400 -z-10"></div>
             
        </a>
    </div>
            </div>
        </div>
    </div>
</section>


<!-- Entrepreneur Journey -->
<section class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-4">

        {{-- Mobile / tablet: simple vertical list --}}
        <div class="space-y-4 lg:hidden">
            @foreach ([
                ['num' => 1, 'label' => __('entrepreneur.application')],
                ['num' => 2, 'label' => __('entrepreneur.qualification')],
                ['num' => 3, 'label' => __('entrepreneur.final_meeting')],
                ['num' => 4, 'label' => __('entrepreneur.lunch')], 
                ['num' => 5, 'label' => __('entrepreneur.quarterly_reports')],
            ] as $step)
            <div class="flex items-center gap-3 rounded-full bg-white px-4 py-2 shadow border border-indigo-100">
                <span
                    class="flex h-8 w-8 items-center justify-center rounded-full bg-[#6F5CF5] text-white text-sm font-semibold">
                    {{ $step['num'] }}
                </span>
                <span class="text-lg font-medium text-gray-900">{{ $step['label'] }}</span>
            </div>
            @endforeach
        </div>

        {{-- Desktop tree (>= lg) --}}
        <div class="relative hidden lg:block h-[320px]">

            {{-- vertical gradient line --}}
            <div class="absolute left-1/2 -translate-x-1/2 top-0 bottom-1/2 w-[2px]" style="border: 1px solid transparent;
               border-image: linear-gradient(180deg,#6F62DC 0%,#D0D0D0 100%) 1;">
            </div>

            {{-- center circle --}}
            <div class="absolute left-1/2 -translate-x-1/2 bottom-0 z-[2]">
                <div class="relative z-10 flex flex-col items-center justify-center
                 w-[200px] h-[200px] rounded-full bg-white
                 shadow-[0_20px_60px_rgba(111,92,245,0.35)] border border-indigo-100">
                    <p class="text-xl font-semibold text-indigo-600 text-center leading-snug">
                         {{ __('entrepreneur.entrepreneur') }}<br /> {{ __('entrepreneur.journey') }}
                    </p>
                </div>
            </div>

            {{-- STEP 3 top center --}}
            <div class="absolute left-1/2 -translate-x-1/2 -top-4 z-20
               flex items-center gap-3 rounded-full bg-white
               px-6 py-2 shadow-[0_15px_40px_rgba(0,0,0,0.10)] border border-indigo-100">
                <span
                    class="flex h-8 w-8 items-center justify-center rounded-full bg-[#6F5CF5] text-white text-sm font-semibold">
                    3
                </span>
                <span class="text-sm font-medium text-gray-900" >{{ __('entrepreneur.final_meeting') }}</span>
            </div>

            {{-- STEP 1 bottom left --}}
            <div class="step1">
                <div class="absolute left-0 bottom-20 z-20
                 flex items-center gap-3 rounded-full bg-white
                 px-6 py-2 shadow-[0_15px_40px_rgba(0,0,0,0.10)] border border-indigo-100">
                    <span
                        class="flex h-8 w-8 items-center justify-center rounded-full bg-[#6F5CF5] text-white text-sm font-semibold">
                        1
                    </span>
                    <span class="text-sm font-medium text-gray-900"> {{ __('entrepreneur.application') }}</span>
                </div>
            </div>

            {{-- STEP 2 mid left --}}
            <div class="step2">
                <div class="absolute left-28 top-10 z-20
                 flex items-center gap-3 rounded-full bg-white
                 px-6 py-2 shadow-[0_15px_40px_rgba(0,0,0,0.10)] border border-indigo-100">
                    <span
                        class="flex h-8 w-8 items-center justify-center rounded-full bg-[#6F5CF5] text-white text-sm font-semibold">
                        2
                    </span>
                    <span class="text-sm font-medium text-gray-900"> {{ __('entrepreneur.qualification') }}</span>
                </div>
            </div>

            {{-- STEP 4 mid right --}}
            <div class="step4">
                <div class="absolute right-36 top-10 z-20
                 flex items-center gap-3 rounded-full bg-white
                 px-6 py-2 shadow-[0_15px_40px_rgba(0,0,0,0.10)] border border-indigo-100">
                    <span
                        class="flex h-8 w-8 items-center justify-center rounded-full bg-[#6F5CF5] text-white text-sm font-semibold">
                        4
                    </span>
                    <span class="text-sm font-medium text-gray-900"> {{ __('entrepreneur.lunch') }}</span>
                </div>
            </div>

            {{-- STEP 5 bottom right --}}
            <div class="step5">
                <div class="absolute right-0 bottom-20 z-20
                 flex items-center gap-3 rounded-full bg-white
                 px-6 py-2 shadow-[0_15px_40px_rgba(0,0,0,0.10)] border border-indigo-100">
                    <span
                        class="flex h-8 w-8 items-center justify-center rounded-full bg-[#6F5CF5] text-white text-sm font-semibold">
                        5
                    </span>
                    <span class="text-sm font-medium text-gray-900"> {{ __('entrepreneur.quarterly_reports') }}</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Entrepreneur Content -->
<section class="bg-[linear-gradient(270deg,_#FCFFFD_0%,_#EDFFF0_100%)] p-7 rounded-lg space-y-8 mb-5">
    
    <p class="text-[20px] text-[#6A6A6A]">
        {{ __('entrepreneur.entrepreneur_journey_p_1') }}
    </p>

    <p class="text-[20px] text-[#6A6A6A]">
        {{ __('entrepreneur.entrepreneur_journey_p_2') }}
    </p>

    <p class="text-[20px] text-[#6A6A6A]">
        {{ __('entrepreneur.entrepreneur_journey_p_3') }}
    </p>
    <div class="mt-6 w-full max-w-md mx-auto flex justify-center">
        <a href="https://ekeropartnersempowerwealth.com/en/contact"
           class="group relative inline-flex items-center justify-center rounded-full 
                  bg-gradient-to-r from-[#39B44F] to-[#23A148] px-10 py-4 
                  text-lg font-bold text-white shadow-xl hover:shadow-2xl 
                  hover:from-[#2E9A3F] hover:to-[#1E8B3F] hover:scale-105 
                  hover:-translate-y-1 transition-all duration-400 ring-2 
                  ring-emerald-200/50 hover:ring-emerald-400/70 focus:outline-none">
            
            <span class="flex items-center gap-2 z-10">
                <i class="bi bi-lightning-charge text-lg group-hover:rotate-12 transition-transform duration-300"></i>
                 {{__('coach.contact_btn')}}  <span aria-hidden="true ms-3">→</span>
            </span>
            
            <div class="absolute inset-0 bg-white/20 rounded-full blur opacity-0 
                       group-hover:opacity-100 transition-opacity duration-400 -z-10"></div>
             
        </a>
    </div>

</section>

<!-- Benefits -->
<section class="py-16 bg-white lg:px-24">
        {{-- small label --}}
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

            <button class="mb-3 inline-flex items-center rounded-full border border-emerald-300
                 bg-emerald-50 px-4 py-1 text-[16px] font-semibold uppercase tracking-[0.18em]
                 text-emerald-600">
                {{ __('entrepreneur.supporter_journey') }}
            </button>
    
            <p class="text-sm sm:text-lg text-gray-700 mb-6">
                {{ __('entrepreneur.supporter_journey_sub') }}     
            </p>
        </div>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-left">
       

        <h2 class="text-2xl sm:text-[40px] text-center font-semibold text-gray-900 mb-10">
            {{ __('entrepreneur.benefits') }}
        </h2>

        {{-- steps row --}}
        <div class="flex flex-col items-center gap-6 md:flex-row md:justify-center">
            {{-- step 1 --}}
            <div class="rounded-[22px] border border-dashed border-[#C8B9FF]
               p-3 shadow-[0_12px_35px_rgba(0,0,0,0.06)] bg-white text-center">
                <div class="flex h-28 w-58 items-center justify-center rounded-[18px]
                 bg-white shadow-[0_10px_30px_rgba(0,0,0,0.05)]">
                    <p class="text-lg font-semibold text-[#6F5CF5] leading-snug">
                        Early interest<br />activation
                    </p>
                </div>
            </div>

            {{-- arrow --}}
            <div class="hidden md:flex items-center justify-center text-[#6F5CF5] text-3xl">
                <i class="bi bi-arrow-right"></i>
            </div>

            {{-- step 2 --}}
            <div class="rounded-[22px] border border-dashed border-[#C8B9FF]
               p-3 shadow-[0_12px_35px_rgba(0,0,0,0.06)] bg-white">
                <div class="flex h-28 w-58 items-center justify-center rounded-[18px]
                 bg-white shadow-[0_10px_30px_rgba(0,0,0,0.05)]">
                    <p class="text-lg font-semibold text-[#6F5CF5] leading-snug">
                        Quarterly<br />reports
                    </p>
                </div>
            </div>

            {{-- arrow --}}
            <div class="hidden md:flex items-center justify-center text-[#6F5CF5] text-3xl">
                <i class="bi bi-arrow-right"></i>
            </div>

            {{-- step 3 --}}
            <div class="rounded-[22px] border border-dashed border-[#C8B9FF]
               p-3 shadow-[0_12px_35px_rgba(0,0,0,0.06)] bg-white">
                <div class="flex h-28 w-58 items-center justify-center rounded-[18px]
                 bg-white shadow-[0_10px_30px_rgba(0,0,0,0.05)]">
                    <p class="text-lg font-semibold text-[#6F5CF5] leading-snug">
                        Eligibility to<br />become a future funded<br />entrepreneur
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Entrepreneur Content -->
<section class="bg-[linear-gradient(270deg,_#FDFDFF_0%,_#E2DFFF_100%)] p-7 rounded-lg space-y-8 mb-5">
    <p class="text-[20px] text-[#6A6A6A]">
        {{ __('entrepreneur.entrepreneur_journey_p_1') }}
    </p>

    <p class="text-[20px] text-[#6A6A6A]">
        {{ __('entrepreneur.entrepreneur_journey_p_2') }}
    </p>

    <p class="text-[20px] text-[#6A6A6A]">
        {{ __('entrepreneur.entrepreneur_journey_p_3') }}
    </p>
      <div class="mt-6 w-full max-w-md mx-auto flex justify-center">
        <a href="https://ekeropartnersempowerwealth.com/en/contact"
           class="group relative inline-flex items-center justify-center rounded-full 
                  bg-gradient-to-r from-[#39B44F] to-[#23A148] px-10 py-4 
                  text-lg font-bold text-white shadow-xl hover:shadow-2xl 
                  hover:from-[#2E9A3F] hover:to-[#1E8B3F] hover:scale-105 
                  hover:-translate-y-1 transition-all duration-400 ring-2 
                  ring-emerald-200/50 hover:ring-emerald-400/70 focus:outline-none">
            
            <span class="flex items-center gap-2 z-10">
                <i class="bi bi-lightning-charge text-lg group-hover:rotate-12 transition-transform duration-300"></i>
                 {{__('coach.contact_btn')}}  <span aria-hidden="true ms-3">→</span>
            </span>
            
            <div class="absolute inset-0 bg-white/20 rounded-full blur opacity-0 
                       group-hover:opacity-100 transition-opacity duration-400 -z-10"></div>
             
        </a>
    </div>
</section>


<!-- CTA -->
<section class="bg-gradient-to-b from-[#F4FFF6] to-[#DDFBE6] bgimg">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <div class="flex flex-col items-center text-center gap-8 lg:gap-12">
            
            {{-- Enhanced Text - More Visible --}}
            <div class="max-w-3xl">
                <h2 class="text-4xl sm:text-6xl lg:text-7xl font-black leading-tight tracking-tight">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#09A54A] to-[#23A148] drop-shadow-lg">
                        {{ __('home.invest') }}
                    </span>
                    <span class="text-gray-900 drop-shadow-lg">{{ __('home.in_people') }}</span><br class="sm:hidden lg:block" />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#09A54A] to-[#23A148] drop-shadow-lg">
                        {{ __('home.develop') }}
                    </span>
                    <span class="text-gray-900 drop-shadow-lg">{{ __('home.potential') }}</span>
                </h2>

                <!-- <p class="mt-6 text-lg sm:text-xl text-gray-700 leading-relaxed max-w-2xl mx-auto bg-white rounded-full">
                    {{ __('home.cta_text') }}
                </p> -->
            </div>

            {{-- Uncommented & Enhanced Image --}}
            <!-- <div class="w-full max-w-2xl mx-auto rounded-[32px] overflow-hidden shadow-2xl drop-shadow-2xl">
                <img src="{{ asset('images/cta.png') }}"
                     alt="Hand passing money"
                     class="w-full h-auto object-cover"
                     loading="lazy" />
            </div> -->

            {{-- Perfectly Centered CTA Button --}}
            <div class="w-full flex justify-center">
                <a href="{{ route('leader.register') }}" 
                   class="group relative inline-flex items-center justify-center rounded-full
                          bg-gradient-to-r from-[#23A148] to-[#09A54A] px-10 py-4 text-lg
                          font-bold text-white shadow-xl hover:shadow-2xl hover:from-[#1E8B3F] 
                          hover:to-[#078543] transform hover:scale-105 hover:-translate-y-1 
                          transition-all duration-300 focus:outline-none focus:ring-4 
                          focus:ring-emerald-400/50 mx-auto">
                    <span class="relative z-10 flex items-center gap-2">
                        {{ __('home.apply_entr') }}
                        <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform duration-300"></i>
                    </span>
                    <div class="absolute inset-0 bg-white/20 rounded-full blur opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
            </div>

        </div>
    </div>
</section>
<!-- Company success Story -->
<section class="py-16 lg:ps-20 mx-auto px-4 lg:px-0 ">
    <div>
      <p class="text-[45px] text-[#3C3C3C] font-bold p-0">
        {{ __('aboutUs.success_stories_title') }}
      </p>
      <p class="text-[25px] text-[#6A6A6A]">
        {{ __('aboutUs.success_stories_subtitle') }}
      </p>
    </div>

    <div class="relative pt-3">
      <div id="slider" class="flex overflow-x-auto scroll-smooth snap-x snap-mandatory gap-5 md:gap-10
                    [&::-webkit-scrollbar]:hidden -mx-4 px-4 lg:mx-0 lg:px-0 lg:max-h-[80vh]">

        <!-- Slide 1 -->
        <div
          class="min-w-[100%] md:min-w-[85%] lg:min-w-[68%] snap-start bg-white rounded-4xl flex flex-col lg:flex-row border border-[#D0D0D0]">
          <div class="relative w-full lg:w-1/2">
            <span
              class="absolute top-0 left-0 bg-[#6F62DC] text-[20px] font-semibold text-white px-4 py-2 rounded-4xl text-sm">
              {{ __('aboutUs.story1_title') }}
            </span>
            <img class="w-full rounded-tl-4xl lg:rounded-l-4xl object-cover md:h-96 lg:h-full" src="/images/s1.png" />
          </div>

          <div class="lg:w-1/2 mt-6 lg:mt-0 lg:pl-6 py-5 px-2 lg:px-6">
            <p class="text-[#3B3B3B] text-[25px] mb-4">
              {{ __('aboutUs.story1_quote_author') }} <br>
              {{ __('aboutUs.story1_quote') }}
            </p>
            <p class="text-[#6A6A6A] leading-relaxed text-lg">
              {{ __('aboutUs.story1_description') }}
              <!-- {{ __('aboutUs.story1_outcome') }} -->
            </p>
          </div>
        </div>

        <!-- Slide 2 -->
        <div
          class="min-w-[85%] lg:min-w-[68%] snap-start bg-white rounded-4xl flex flex-col lg:flex-row border border-[#D0D0D0]">
          <div class="relative w-full lg:w-1/2">
            <span
              class="absolute top-0 left-0 bg-[#6F62DC] text-[20px] font-semibold text-white px-4 py-2 rounded-4xl text-sm">
              {{ __('aboutUs.story2_title') }}
            </span>
            <img class="w-full rounded-tl-4xl lg:rounded-l-4xl object-cover md:h-96 lg:h-full" src="/images/s2.png" />
          </div>

          <div class="lg:w-1/2 mt-6 lg:mt-0 lg:pl-6 py-5 px-2 lg:px-6">
            <p class="text-[#3B3B3B] text-[20px] mb-4">
              {{ __('aboutUs.story2_quote_author') }} <br>
              {{ __('aboutUs.story2_quote') }}
            </p>
            <p class="text-[#6A6A6A] leading-relaxed text-base">
              {{ __('aboutUs.story2_description') }}<br><br>
              {{ __('aboutUs.story2_outcome') }}
            </p>
          </div>
        </div>

        <!-- Slide 3 -->
        <div
          class="min-w-[85%] lg:min-w-[68%] snap-start bg-white rounded-4xl flex flex-col lg:flex-row border border-[#D0D0D0]">
          <div class="relative w-full lg:w-1/2">
            <span
              class="absolute top-0 left-0 bg-[#6F62DC] text-[20px] font-semibold text-white px-4 py-2 rounded-4xl text-sm">
              {{ __('aboutUs.story3_title') }}
            </span>
            <img class="w-full rounded-tl-4xl lg:rounded-l-4xl object-cover md:h-96 lg:h-full" src="/images/4.jpg" />
          </div>

          <div class="lg:w-1/2 mt-6 lg:mt-0 lg:pl-6 py-5 px-2 lg:px-6">
            <p class="text-[#3B3B3B] text-[20px] mb-4">
              {{ __('aboutUs.story3_quote_author') }} <br>
              {{ __('aboutUs.story3_quote') }}
            </p>
            <p class="text-[#6A6A6A] leading-relaxed text-base">
              {{ __('aboutUs.story3_description') }}<br><br>
              {{ __('aboutUs.story3_outcome') }}
            </p>
          </div>
        </div>

        <!-- Slide 4 -->
        <div
          class="min-w-[85%] lg:min-w-[68%] snap-start bg-white rounded-4xl flex flex-col lg:flex-row border border-[#D0D0D0]">
          <div class="relative w-full lg:w-1/2">
            <span
              class="absolute top-0 left-0 bg-[#6F62DC] text-[20px] font-semibold text-white px-4 py-2 rounded-4xl text-sm">
              {{ __('aboutUs.story4_title') }}
            </span>
            <img class="w-full rounded-tl-4xl lg:rounded-l-4xl object-cover md:h-96 lg:h-full" src="/images/5.jpg" />
          </div>

          <div class="lg:w-1/2 mt-6 lg:mt-0 lg:pl-6 py-5 px-2 lg:px-6">
            <p class="text-[#3B3B3B] text-[20px] mb-4">
              {{ __('aboutUs.story4_quote_author') }} <br>
              {{ __('aboutUs.story4_quote') }}
            </p>
            <p class="text-[#6A6A6A] leading-relaxed text-base">
              {{ __('aboutUs.story4_description') }}<br><br>
              {{ __('aboutUs.story4_outcome') }}
            </p>
          </div>
        </div>

        <!-- Slide 5 -->
        <div
          class="min-w-[85%] lg:min-w-[68%] snap-start bg-white rounded-4xl flex flex-col lg:flex-row border border-[#D0D0D0]">
          <div class="relative w-full lg:w-1/2">
            <span
              class="absolute top-0 left-0 bg-[#6F62DC] text-[20px] font-semibold text-white px-4 py-2 rounded-4xl text-sm">
              {{ __('aboutUs.story5_title') }}
            </span>
            <img class="w-full rounded-tl-4xl lg:rounded-l-4xl object-cover md:h-96 lg:h-full" src="/images/6.jpg" />
          </div>

          <div class="lg:w-1/2 mt-6 lg:mt-0 lg:pl-6 py-5 px-2 lg:px-6">
            <p class="text-[#3B3B3B] text-[20px] mb-4">
              {{ __('aboutUs.story5_quote_author') }} <br>
              {{ __('aboutUs.story5_quote') }}
            </p>
            <p class="text-[#6A6A6A] leading-relaxed text-base">
              {{ __('aboutUs.story5_description') }}<br><br>
              {{ __('aboutUs.story5_outcome') }}
            </p>
          </div>
        </div>

      </div>
    </div>

    <div class="flex justify-end gap-4 mt-6">
      <button id="prevBtn" class="px-2 py-1 bg-[#6F62DC] text-white rounded-full shadow">
        <i class="bi bi-arrow-left-short"></i>
      </button>
      <button id="nextBtn" class="px-2 py-1 bg-[#6F62DC] text-white rounded-full shadow">
        <i class="bi bi-arrow-right-short"></i>
      </button>
    </div>

  </section>
<!-- Company success Story -->
<!-- FAQ -->
<div class="mx-auto lg:px-24 py-10">
    <span class="text-lg font-semibold text-green-500 tracking-widest">
        {{ __('entrepreneur.faq_badge') }}
    </span>

    <h2 class="text-5xl font-bold mt-2 mb-6">
        {{ __('entrepreneur.faq_heading') }}
    </h2>

    @php
        $faqs = [
            [
                'question' => __('entrepreneur.faq_q1_question'),
                'answer'   => __('entrepreneur.faq_q1_answer'),
            ],
            [
                'question' => __('entrepreneur.faq_q2_question'),
                'answer'   => __('entrepreneur.faq_q2_answer'),
            ],
            [
                'question' => __('entrepreneur.faq_q3_question'),
                'answer'   => __('entrepreneur.faq_q3_answer'),
            ],
            [
                'question' => __('entrepreneur.faq_q4_question'),
                'answer'   => __('entrepreneur.faq_q4_answer'),
            ],
            [
                'question' => __('entrepreneur.faq_q5_question'),
                'answer'   => __('entrepreneur.faq_q5_answer'),
            ],
            [
                'question' => __('entrepreneur.faq_q6_question'),
                'answer'   => __('entrepreneur.faq_q6_answer'),
            ],
            [
                'question' => __('entrepreneur.faq_q7_question'),
                'answer'   => __('entrepreneur.faq_q7_answer'),
            ],
            [
                'question' => __('entrepreneur.faq_q8_question'),
                'answer'   => __('entrepreneur.faq_q8_answer'),
            ],
            [
                'question' => __('entrepreneur.faq_q9_question'),
                'answer'   => __('entrepreneur.faq_q9_answer'),
            ],
            [
                'question' => __('entrepreneur.faq_q10_question'),
                'answer'   => __('entrepreneur.faq_q10_answer'),
            ],
        ];
    @endphp

    <x-accordion :items="$faqs" />

</div>

<!-- LAst Section -->
<section class="max-w-7xl mx-auto ">
    <div class="bgimages" style="background-size: cover; padding: 30px; margin-bottom: 30px; border-radius: 20px;">

        <div class="grid gap-8 lg:grid-cols-2 items-center">
            {{-- LEFT: text + button --}}
           <div class="space-y-4 max-w-md">
                <h2 class="text-2xl sm:text-3xl lg:text-5xl font-semibold text-gray-900 leading-snug">
                    {{ __('entrepreneur.title_last_1') }} <br class="hidden sm:block" />
                    {{ __('entrepreneur.title_last_2') }}
                </h2>

                <p class="text-lg sm:text-base text-gray-700 leading-relaxed">
                    {{ __('entrepreneur.description_last') }}
                </p>

                <div>
                    <a href="{{ route('website.contact', ['lang' => app()->getLocale()]) }}"
                    class="inline-flex items-center justify-center rounded-lg
                            bg-[#6F5CF5] px-6 py-2.5 text-sm sm:text-base
                            font-semibold text-white shadow-md hover:bg-indigo-600 transition">
                        {{ __('entrepreneur.join_us_btn') }}
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

@push('scripts')
@endpush
@endsection