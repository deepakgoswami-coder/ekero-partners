@extends('website.layout.main')

@section('title', 'About Us - Ekero Partners')
{{--
@section('page_heading', 'Welcome to MySite')
--}}

@section('content')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="{{ asset('css/custom1.css') }}">

  <!-- Hero Section -->
  <section class="about-bg relative bg-cover bg-center">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-24">
      <div class="grid gap-12 items-center lg:grid-cols-2 mt-16 sm:mt-20">

        <!-- LEFT: Hero Text -->
        <div class="space-y-5 sm:space-y-6 order-2 lg:order-1 text-center lg:text-left">
          <p class="font-black text-white leading-tight tracking-tight drop-shadow-2xl">
            <span class="block banner-heading1 bg-gradient-to-r from-white to-gray-200 bg-clip-text text-transparent
                                 text-3xl sm:text-4xl md:text-5xl lg:text-7xl">
              {{__('aboutUs.title')}}
            </span>

            <span class="block mt-3 sm:mt-4 font-light
                                 text-xl sm:text-2xl md:text-3xl lg:text-5xl">
              {{__('aboutUs.sub_title')}}
            </span>
          </p>
        </div>

        <!-- RIGHT: CTA + Text -->
        <div class="order-1 lg:order-2 flex flex-col items-center lg:items-end gap-8 min-h-[300px]">

          <!-- Base Heading Text -->
          <div class="max-w-md lg:max-w-lg text-center lg:text-right text-white/90 font-medium drop-shadow-md">
            <p class="leading-relaxed text-sm sm:text-base lg:text-lg">
              {{__('aboutUs.base_heading_1')}}<br />
              {{__('aboutUs.base_heading_2')}}<br />
              {{__('aboutUs.base_heading_3')}}
            </p>
          </div>

          <!-- CTA Button -->
          <a href="{{route('leader.register')}}" class="group inline-flex items-center justify-center rounded-full
                            bg-gradient-to-r from-[#39B44F] to-[#23A148]
                            px-7 py-3 sm:px-8 sm:py-4 lg:px-10 lg:py-5
                            text-base sm:text-lg lg:text-xl font-bold text-white
                            shadow-2xl hover:shadow-3xl transform hover:scale-105 hover:-translate-y-1
                            transition-all duration-300 ring-2 ring-white/30 hover:ring-white/50">

            <span class="flex items-center gap-3">
              <i class="bi bi-lightning-charge"></i>
              {{__('home.apply_entr')}}
              <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </span>
          </a>
        </div>
      </div>
    </div>

    <!-- Bottom Avatars + Rating (Tablet & Desktop only) -->
    <div class="hidden md:flex absolute bottom-6 left-6 lg:bottom-10 lg:left-12
                  items-center gap-4 z-20 drop-shadow-2xl">

      <div class="flex -space-x-3">
        @for ($i = 0; $i < 4; $i++)
          <img src="{{ asset('images/avatar.png') }}" class="h-9 w-9 sm:h-11 sm:w-11 lg:h-14 lg:w-14
                                rounded-full border-2 border-white shadow-lg
                                object-cover hover:scale-110 transition" loading="lazy" />
        @endfor
      </div>

      <div class="bg-white/95 backdrop-blur-sm px-4 py-2 rounded-xl shadow-xl">
        <div class="text-amber-400 text-lg lg:text-xl font-bold">★★★★★</div>
        <p class="text-xs sm:text-sm font-semibold text-[#23A148]">
          {{__('home.rating')}}
        </p>
      </div>
    </div>
  </section>
  <!-- About Section -->
  <section class="pt-16 pb-40">
    <div class="grid md:grid-cols-3 gap-8 ">
      <div class="relative py-10 ps-3">
        <div class="absolute left-0 inset-0 bg-gray-200 rounded-[13%] md:w-[20vw] opacity-60 trapezium-bg">
        </div>
        <div class="trapezium bg-white py-16 rounded-lg px-10" style="box-shadow: 24px 30px 51px 0px #0000001A;">
          <i class="bi bi-eye text-3xl"></i>
          <h2 class="text-[34px] font-bold">
            {{__('aboutUs.vision_title')}}
          </h2>
          <p class="text-[#6A6A6A] text-[28px]">
            {{__('aboutUs.vision_description')}}
          </p>
        </div>
      </div>

      <div class="flex flex-col items-center">
        <!-- Original Center Div -->
        <div class="relative rounded-3xl text-white px-6 pb-8 w-full max-w-md mx-auto"
          style="background: linear-gradient(180deg, #37AF4D 0%, #174920 100%);">
          <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white/5 rounded-full w-24 h-28">
          </div>
          <div class="absolute top-0 left-0 bg-white/5 rounded-xl w-28 h-32"></div>
          <a href="/" class="cursor-pointer block text-center mb-6 pt-4">
            <img src="/images/logo1.png"
              class="w-16 bg-white w-fit rounded-b-xl px-3 py-2 mx-auto shadow-lg border border-white/20" alt="logo" />
          </a>
          <p class="text-base sm:text-xl leading-relaxed text-white/95 px-2">
            {{__('aboutUs.ekero_description')}}
          </p>
        </div>

        <!-- ✅ NEW: CTA Button After Center Div -->
        <div class="mt-6 w-full max-w-md mx-auto flex justify-center">
          <a href="https://ekeropartnersempowerwealth.com/en/contact" class="group relative inline-flex items-center justify-center rounded-full 
                      bg-gradient-to-r from-[#39B44F] to-[#23A148] px-10 py-4 
                      text-lg font-bold text-white shadow-xl hover:shadow-2xl 
                      hover:from-[#2E9A3F] hover:to-[#1E8B3F] hover:scale-105 
                      hover:-translate-y-1 transition-all duration-400 ring-2 
                      ring-emerald-200/50 hover:ring-emerald-400/70 focus:outline-none">

            <span class="flex items-center gap-2 z-10">
              <i class="bi bi-lightning-charge text-lg group-hover:rotate-12 transition-transform duration-300"></i>
              {{__('coach.contact_btn')}} <span aria-hidden="true ms-3">→</span>
            </span>

            <div class="absolute inset-0 bg-white/20 rounded-full blur opacity-0 
                           group-hover:opacity-100 transition-opacity duration-400 -z-10"></div>

          </a>
        </div>
      </div>


      <div class="relative py-10 pe-3">
        <div class="absolute right-0 inset-0 bg-gray-200 rounded-[13%] md:w-[20vw] opacity-60 trapezium-bg ms-auto">
        </div>
        <div class="trapezium2 bg-white rounded-lg py-16  px-10" style="box-shadow: 24px 30px 51px 0px #0000001A;">
          <i class="bi bi-flag text-3xl"></i>
          <h2 class="text-[34px] font-bold">
            {{__('aboutUs.mission_title')}}
          </h2>
          <p class="text-[#6A6A6A] text-[28px]">
            {{__('aboutUs.mission_des')}}
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="lg:pt-40 relative lg:mt-54 px-4 lg:px-0"
    style="background: linear-gradient(270deg, #FDFDFF 0%, #E2DFFF 100%);">
    <section class="py-16 lg:absolute -top-[432px] w-full">
      <div
        class="about-section3 max-w-7xl mx-auto py-8 lg:py-12 px-4 md:px-10 border border-[#D0D0D0] bg-white h-full lg:h-[100vh]">

        <h3 class="text-[40px] font-bold">
          {{ __('aboutUs.values_title') }}
        </h3>

        <!-- 1. Transparency -->
        <div class="border-[1px] border-[#E6E4FF] md:flex items-center gap-2 rounded-3xl 
                          lg:w-2/5 px-3 py-2 lg:ms-auto my-5 bg-white" style="box-shadow: 0px 4px 11.4px 0px #C3C3C340;">
          <p class="text-[23px]"> {{ __('aboutUs.transparency_title') }} </p>
          <p class="text-[#6A6A6A] text-[17px]"> {{ __('aboutUs.transparency_text') }} </p>
        </div>

        <!-- 2. Empowerment -->
        <div class="border-[1px] border-[#E6E4FF] md:flex items-center gap-2 rounded-3xl 
                          lg:w-2/5 px-3 py-2 my-5 bg-white" style="box-shadow: 0px 4px 11.4px 0px #C3C3C340;">
          <p class="text-[23px]"> {{ __('aboutUs.empowerment_title') }} </p>
          <p class="text-[#6A6A6A] text-[17px]"> {{ __('aboutUs.empowerment_text') }} </p>
        </div>

        <!-- 3. Commitment -->
        <div class="border-[1px] border-[#E6E4FF] md:flex items-center gap-2 rounded-3xl 
                          lg:w-2/5 px-3 py-2 lg:ms-auto my-5" style="box-shadow: 0px 4px 11.4px 0px #C3C3C340;">
          <p class="text-[23px]"> {{ __('aboutUs.commitment_title') }} </p>
          <p class="text-[#6A6A6A] text-[17px]"> {{ __('aboutUs.commitment_text') }} </p>
        </div>

        <!-- 4. Shared Growth -->
        <div class="border-[1px] border-[#E6E4FF] md:flex items-center gap-2 rounded-3xl 
                          lg:w-2/5 px-3 py-2 my-5 bg-white" style="box-shadow: 0px 4px 11.4px 0px #C3C3C340;">
          <p class="text-[23px]" style="white-space: nowrap;">
            {{ __('aboutUs.shared_growth_title') }} :
          </p>
          <p class="text-[#6A6A6A] text-[17px]"> {{ __('aboutUs.shared_growth_text') }} </p>
        </div>

        <!-- 5. Accountability -->
        <div class="border-[1px] border-[#E6E4FF] md:flex items-center gap-2 rounded-3xl 
                          lg:w-2/5 px-3 py-2 lg:ms-auto mt-5 mb-10" style="box-shadow: 0px 4px 11.4px 0px #C3C3C340;">
          <p class="text-[23px]"> {{ __('aboutUs.accountability_title') }} </p>
          <p class="text-[#6A6A6A] text-[17px]"> {{ __('aboutUs.accountability_text') }} </p>
        </div>

      </div>


    </section>
    <div class="max-w-7xl mx-auto py-10 px-4 md:px-4 lg:mt-48">
      <div class="grid md:grid-cols-12 ">
        <div class="md:col-span-7 space-y-5">
          <div class="bg-white text-[#39B34E] font-semibold px-3 py-2 w-fit shadow-md lg:text-xl">
            {{ __('aboutUs.quarterly_reports_title') }}
          </div>
          <p class="text-[43px] font-bold">
            {{ __('aboutUs.quarterly_reports_subtitle') }}
          </p>
          <p class="text-[25px]">
            {{ __('aboutUs.quarterly_reports_description') }}
          </p>
        </div>
        <div class="md:col-span-5">
          <img src="/images/about4.png" class="ms-auto" />
        </div>
      </div>
    </div>
  </section>


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
              <!-- {{ __('aboutUs.story1_outcome') }}  -->
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



  <section class="lg:mb-20">
    <div class="text-center">
      <p class="text-[40px] font-bold">
        {{ __('aboutUs.supporter_protection_title') }}
      </p>

      <p class="text-base text-[#6A6A6A] py-5">
        {{ __('aboutUs.supporter_protection_text_1') }} <br class="hidden lg:block" />
        {{ __('aboutUs.supporter_protection_text_2') }} <br class="hidden lg:block" />
        {{ __('aboutUs.supporter_protection_text_3') }}
      </p>
    </div>

    <div class="grid lg:grid-cols-2 relative lg:max-w-[76rem] mx-auto">
      <div class="space-y-3 lg:space-y-0">

        <!-- Point 1 -->
        <div class="arroworight lg:h-44 px-3 md:px-8 py-4 shadow-md lg:shadow-none rounded-2xl lg:rounded-none">
          <div class="max-w-xl md:pe-3">
            <h5 class="text-[23px]">1. {{ __('aboutUs.supporter_point1_title') }}</h5>
            <p class="text-[#6A6A6A] text-[14px]">
              {{ __('aboutUs.supporter_point1_text') }}
            </p>
          </div>
        </div>

        <!-- Point 2 (mobile version) -->
        <div class="lg:arrowoleft lg:h-44 px-2 md:px-8 py-4 lg:hidden shadow-md lg:shadow-none rounded-2xl">
          <div class="max-w-xl md:pe-3">
            <h5 class="text-[23px]">2. {{ __('aboutUs.supporter_point2_title') }}</h5>
            <p class="text-[#6A6A6A] text-[14px]">
              {{ __('aboutUs.supporter_point2_text') }}
            </p>
          </div>
        </div>

        <!-- Point 3 -->
        <div class="arroworight lg:h-44 px-2 md:px-8 py-4 shadow-md lg:shadow-none rounded-2xl">
          <div class="max-w-xl md:pe-3">
            <h5 class="text-[23px]">3. {{ __('aboutUs.supporter_point3_title') }}</h5>
            <p class="text-[#6A6A6A] text-[14px]">
              {{ __('aboutUs.supporter_point3_text') }}
            </p>
          </div>
        </div>

        <!-- Point 4 (mobile version) -->
        <div class="lg:arrowoleft lg:h-44 px-2 md:px-8 py-4 lg:hidden shadow-md lg:shadow-none rounded-2xl">
          <div class="max-w-xl md:pe-3">
            <h5 class="text-[23px]">4. {{ __('aboutUs.supporter_point4_title') }}</h5>
            <p class="text-[#6A6A6A] text-[14px]">
              {{ __('aboutUs.supporter_point4_text') }}
            </p>
          </div>
        </div>

        <!-- Point 5 -->
        <div class="arroworight lg:h-44 px-2 md:px-8 py-4 shadow-md lg:shadow-none rounded-2xl">
          <div class="max-w-xl md:pe-3">
            <h5 class="text-[23px]">5. {{ __('aboutUs.supporter_point5_title') }}</h5>
            <p class="text-[#6A6A6A] text-[14px]">
              {{ __('aboutUs.supporter_point5_text') }}
            </p>
          </div>
        </div>

        <!-- Point 6 (mobile version) -->
        <div class="lg:arrowoleft lg:h-44 px-2 md:px-8 py-4 lg:hidden shadow-md lg:shadow-none rounded-2xl">
          <div class="max-w-xl md:pe-3">
            <h5 class="text-[23px]">6. {{ __('aboutUs.supporter_point6_title') }}</h5>
            <p class="text-[#6A6A6A] text-[14px]">
              {{ __('aboutUs.supporter_point6_text') }}
            </p>
          </div>
        </div>

        <!-- Point 7 -->
        <div class="arroworight lg:h-44 px-2 md:px-8 py-4 shadow-md lg:shadow-none rounded-2xl">
          <div class="max-w-xl md:pe-3">
            <h5 class="text-[23px]">7. {{ __('aboutUs.supporter_point7_title') }}</h5>
            <p class="text-[#6A6A6A] text-[14px]">
              {{ __('aboutUs.supporter_point7_text') }}
            </p>
          </div>
        </div>

        <!-- Point 8 (mobile version) -->
        <div class="lg:arrowoleft lg:h-44 px-2 md:px-8 py-4 lg:hidden shadow-md lg:shadow-none rounded-2xl">
          <div class="max-w-xl md:pe-3">
            <h5 class="text-[23px]">8. {{ __('aboutUs.supporter_point8_title') }}</h5>
            <p class="text-[#6A6A6A] text-[14px]">
              {{ __('aboutUs.supporter_point8_text') }}
            </p>
          </div>
        </div>

      </div>

      <!-- RIGHT COLUMN (desktop only) -->
      <div class="hidden lg:block absolute right-0 top-0 mt-22">

        <!-- Point 2 -->
        <div class="arrowoleft lg:h-44 px-2 md:px-8 py-4 ms-auto">
          <div class="max-w-xl ps-16">
            <h5 class="text-[23px]">2. {{ __('aboutUs.supporter_point2_title') }}</h5>
            <p class="text-[#6A6A6A] text-[14px]">
              {{ __('aboutUs.supporter_point2_text') }}
            </p>
          </div>
        </div>

        <!-- Point 4 -->
        <div class="arrowoleft lg:h-44 px-2 md:px-8 py-4 ms-auto">
          <div class="max-w-xl ps-16">
            <h5 class="text-[23px]">4. {{ __('aboutUs.supporter_point4_title') }}</h5>
            <p class="text-[#6A6A6A] text-[14px]">
              {{ __('aboutUs.supporter_point4_text') }}
            </p>
          </div>
        </div>

        <!-- Point 6 -->
        <div class="arrowoleft lg:h-44 px-2 md:px-8 py-4 ms-auto">
          <div class="max-w-xl ps-16">
            <h5 class="text-[23px]">6. {{ __('aboutUs.supporter_point6_title') }}</h5>
            <p class="text-[#6A6A6A] text-[14px]">
              {{ __('aboutUs.supporter_point6_text') }}
            </p>
          </div>
        </div>

        <!-- Point 8 -->
        <div class="arrowoleft lg:h-44 px-2 md:px-8 py-4 ms-auto">
          <div class="max-w-xl ps-16">
            <h5 class="text-[23px]">8. {{ __('aboutUs.supporter_point8_title') }}</h5>
            <p class="text-[#6A6A6A] text-[14px]">
              {{ __('aboutUs.supporter_point8_text') }}
            </p>
          </div>
        </div>

      </div>
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
          <a href="{{ route('leader.register') }}" class="group relative inline-flex items-center justify-center rounded-full
                              bg-gradient-to-r from-[#23A148] to-[#09A54A] px-10 py-4 text-lg
                              font-bold text-white shadow-xl hover:shadow-2xl hover:from-[#1E8B3F] 
                              hover:to-[#078543] transform hover:scale-105 hover:-translate-y-1 
                              transition-all duration-300 focus:outline-none focus:ring-4 
                              focus:ring-emerald-400/50 mx-auto">
            <span class="relative z-10 flex items-center gap-2">
              {{ __('home.apply_entr') }}
              <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform duration-300"></i>
            </span>
            <div
              class="absolute inset-0 bg-white/20 rounded-full blur opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            </div>
          </a>
        </div>

      </div>
    </div>
  </section>
  <!-- FAQ -->
  <div class=" mx-auto lg:px-24 py-10">

    <span class="text-lg font-semibold text-green-500 tracking-widest">
      {{ __('aboutUs.title_faq') }}
    </span>

    <h2 class="text-5xl font-bold mt-2 mb-6">
      {{ __('aboutUs.subtitle_faq') }}
    </h2>

    @php
      $faqs = [
        [
          'question' => __('aboutUs.q1_question'),
          'answer' => __('aboutUs.q1_answer')
        ],
        [
          'question' => __('aboutUs.q2_question'),
          'answer' => __('aboutUs.q2_answer')
        ],
        [
          'question' => __('aboutUs.q3_question'),
          'answer' => __('aboutUs.q3_answer')
        ],
        [
          'question' => __('aboutUs.q4_question'),
          'answer' => __('aboutUs.q4_answer')
        ],
        [
          'question' => __('aboutUs.q5_question'),
          'answer' => __('aboutUs.q5_answer')
        ],
        [
          'question' => __('aboutUs.q6_question'),
          'answer' => __('aboutUs.q6_answer')
        ],
        [
          'question' => __('aboutUs.q7_question'),
          'answer' => __('aboutUs.q7_answer')
        ],
        [
          'question' => __('aboutUs.q8_question'),
          'answer' => __('aboutUs.q8_answer')
        ],
        [
          'question' => __('aboutUs.q9_question'),
          'answer' => __('aboutUs.q9_answer')
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
            {{ __('aboutUs.title_last_1') }} <br class="hidden sm:block" />
            {{ __('aboutUs.title_last_2') }}
          </h2>

          <p class="text-sm sm:text-lg text-gray-700 leading-relaxed">
            {{ __('aboutUs.description_last') }}
          </p>

          <div>
            <a href="{{ route('website.contact', ['lang' => app()->getLocale()]) }}" class="inline-flex items-center justify-center rounded-lg
                                    bg-[#6F5CF5] px-6 py-2.5 text-sm sm:text-base
                                    font-semibold text-white shadow-md hover:bg-indigo-600 transition">
              {{ __('aboutUs.join_us_btn') }}
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>


  {{-- push a small script only for this page --}}
  @push('scripts')


    <script>
      const slider = document.getElementById("slider");
      const nextBtn = document.getElementById("nextBtn");
      const prevBtn = document.getElementById("prevBtn");

      const slideWidth = () => slider.children[0].offsetWidth + 24; // card width + gap

      nextBtn.onclick = () => {
        slider.scrollLeft += slideWidth();
      };

      prevBtn.onclick = () => {
        slider.scrollLeft -= slideWidth();
      };



      // Add animation on scroll
      document.addEventListener('DOMContentLoaded', function () {
        const cards = document.querySelectorAll('.card-hover');

        // Add subtle animation to cards on load
        cards.forEach((card, index) => {
          card.style.opacity = '0';
          card.style.transform = 'translateY(20px)';

          setTimeout(() => {
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
          }, index * 100);
        });

        // Add hover effect enhancement
        cards.forEach(card => {
          card.addEventListener('mouseenter', function () {
            this.style.boxShadow = '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)';
          });

          card.addEventListener('mouseleave', function () {
            this.style.boxShadow = '';
          });
        });
      });
    </script>


  @endpush
@endsection