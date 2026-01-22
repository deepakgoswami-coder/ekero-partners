@extends('website.layout.main')

@section('title', 'Home - Ekero Partners')
{{--
    @section('page_heading', 'Welcome to MySite')
--}} 

@section('content')

<!-- Hero Section -->
<section class="hero-bg relative bg-cover bg-center text-white sm:text-inherit">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">
        <div class="grid gap-12 items-center lg:grid-cols-2 mt-14 sm:mt-20">

            <!-- LEFT -->
            <div class="space-y-6 lg:space-y-8 text-center lg:text-left">

                <p class="font-bold leading-tight
                          text-3xl sm:text-4xl lg:text-7xl text-white">

                    <span class="growtext inline-flex items-center gap-2 justify-center lg:justify-start">
                        {{ __('home.title') }}
                        <img src="{{ asset('images/grow-white.png') }}"
                             class="h-7 sm:h-8 lg:h-16 w-auto" />
                    </span>

                    <span class="block mt-3 text-white sm:text-black">
                        {{ __('home.title_sub') }}
                    </span>
                </p>

                <!-- CTA -->
                <div class="flex justify-center lg:justify-start">
                    <a href="{{route('leader.register')}}"
                       class="inline-flex items-center justify-center
                              rounded-full bg-[#39B44F]
                              px-6 py-3 sm:px-7 sm:py-3.5
                              text-base sm:text-lg lg:text-xl text-white
                              shadow-md hover:bg-emerald-700 transition">
                        {{__('home.apply_entr')}}
                    </a>
                </div>
            </div>

            <!-- RIGHT (Cards hidden on mobile) -->
            <div class=" mt-6 lg:mt-0 lg:block hidden">
                {{-- top card --}}
                <div class=" w-[270px] sm:w-[280px] rounded-tl-2xl rounded-bl-2xl px-4 py-3 sm:px-5 sm:py-4 h-fit
                 shadow-[0px_4px_44.7px_0px_#00000040] backdrop-blur-[50px]  bg-white
                  mx-auto lg:mx-0 bottom-[450px]
                 lg:absolute lg:right-0">
                    <p class="text-sm sm:text-base lg:text-xl lg:font-normal font-bold text-black">
                    {{__('home.hero_heading')}}
                    
                    </p>
                </div>

                {{-- bottom card --}}
                <div class="mt-4 max-w-sm w-full sm:w-[300px] rounded-2xl px-4 py-3 sm:px-5 sm:py-4
                 shadow-[0px_4px_44.7px_0px_#00000040] backdrop-blur-[50px] bg-white
                  mx-auto lg:mx-0
                  gap-3 lg:gap-4
                 lg:absolute lg:right-16 lg:bottom-60">
                    <div class="mt-1">
                        <div class="h-8 w-8 rounded-full  items-center justify-center">
                            <img src="{{ asset('images/support_agent.png') }}" class="h-8 w-8" />
                        </div>
                    </div>
                    <div>
                        <p class="text-sm sm:text-base lg:text-lg  leading-snug text-black">
                            {{__('home.hero_sub')}}
                            <span class="font-semibold lg:text-xl sm:text-md">{{__('home.hero_sub_1')}}</span>
                        </p>
                    </div>
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
                     class="h-9 w-9 sm:h-10 sm:w-10
                            rounded-full border-2 border-white object-cover"
                     alt="">
            @endfor
        </div>

        <div class="text-white lg:text-gray-700">
            <div class="flex items-center gap-1 text-amber-400 text-lg sm:text-2xl">
                ★★★★★
            </div>
            <p class="text-sm sm:text-base lg:text-xl font-medium">
                {{__('home.rating')}}
            </p>
        </div>
    </div>

    <!-- Bottom Right Text -->
    <div class="mt-8 px-4 text-center sm:text-right
                text-white lg:text-[#6A6A6A]
                sm:absolute sm:bottom-6 sm:right-6
                lg:bottom-10 lg:right-10">
        <p class="text-sm sm:text-base lg:text-xl">
            {{__('home.base_heading')}}<br class="hidden sm:block" />
            {{__('home.base_hrading_1')}}
        </p>
    </div>

</section>

<!-- About Section -->
<section class="about-section pb-8 sm:pb-16">
    <div class="px-4 sm:px-6 lg:ps-30 lg:pe-8">
        <div class="grid grid-cols-1 lg:grid-cols-5 lg:grid-rows-5 gap-6 lg:gap-10 items-stretch lg:items-center">
            
            <!-- Left: About card - Full width on mobile, positioned on lg+ -->
            <div class="lg:col-span-2 lg:row-span-4 lg:row-start-2 lg:ms-auto order-2 lg:order-none">
                <div class="relative w-full max-w-sm mx-auto lg:w-[400px] lg:mx-0 rounded-3xl bg-gradient-to-br from-[#37AF4D] to-[#174920] h-[380px] sm:h-[420px] lg:h-auto text-white p-6 flex flex-col justify-between">
                    <button class="mb-6 inline-flex items-center rounded-full border border-white/70 bg-white/20 px-4 py-1.5 text-xs font-semibold tracking-[0.12em] uppercase backdrop-blur-sm self-start">
                        {{__('home.about_title')}} ?
                    </button>
                    <p class="text-sm sm:text-base lg:text-xl leading-relaxed flex-1 mt-auto">{{__('home.about_description')}}</p>
                </div>
                <a href="/" class="inline-flex mt-3 items-center justify-center rounded-full bg-[#39B44F] px-5 py-2.5 text-base lg:text-xl text-white shadow-md hover:bg-emerald-700 transition">
                    Know More
                </a>
            </div>

            <!-- Right: Values card with soft outer shape - Full width on mobile -->
            <div class="lg:col-span-3 lg:row-span-4 lg:col-start-3 lg:row-start-2 order-1 lg:order-none">
                <div class="relative w-full sm:ps-8 lg:ps-16 py-6 sm:py-8">
                    <!-- Background trapezium layer -->
                    <div class="absolute right-4 sm:right-8 lg:right-50 inset-0 bg-gray-200 rounded-[13%] opacity-60 trapezium-bg"></div>

                    <!-- Foreground trapezium card -->
                    <div class="relative bg-white rounded-3xl shadow-xl p-6 sm:p-8 lg:p-10 trapezium">
                        <h2 class="text-xl sm:text-3xl font-bold mb-4 sm:mb-6">{{__('home.transparency_title')}}</h2>

                        <ul class="space-y-3 text-sm sm:text-base text-gray-700 list-disc pl-4 sm:pl-5">
                            <li class="text-[18px]">
                                <span class="font-semibold lg:text-xl sm:text-md">{{__('home.transparency_title')}}:</span>
                                {{__('home.transparency_description')}}
                            </li>
                            <li class="text-[18px]">
                                <span class="font-semibold lg:text-xl sm:text-md">{{__('home.empowerment_title')}}:</span>
                                {{__('home.empowerment_description')}}
                            </li>
                            <li class="text-[18px]">
                                <span class="font-semibold lg:text-xl sm:text-md">{{__('home.commitment_title')}}:</span>
                                {{__('home.commitment_description')}}
                            </li>
                            <li class="text-[18px]">
                                <span class="font-semibold lg:text-xl sm:text-md">{{__('home.shared_growth_title')}}</span>
                                {{__('home.shared_growth_description')}}
                            </li>
                            <li class="text-[18px]">
                                <span class="font-semibold lg:text-xl sm:text-md">{{__('home.accountability_title')}}:</span>
                                {{__('home.accountability_description')}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How its Work -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Small label --}}
        <!-- <button class="mb-8 inline-flex items-center rounded-full border border-emerald-400 text-lg
             bg-emerald-50 px-4 py-1 text-xs font-semibold tracking-[0.12em]
             uppercase text-emerald-600">
            {{__('home.title_hiw')}}
        </button> -->

        {{-- H1 Title - Bold & Centered --}}
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-center mb-12 bg-gradient-to-r 
                    from-[#6F5CF5] to-[#39B44F] bg-clip-text text-transparent 
                    leading-tight max-w-4xl mx-auto">
            {{__('home.title_hiw')}}
        </h1>

        <div class="grid gap-10 lg:grid-cols-2 items-center">
            <div class="space-y-5 order-2 lg:order-1">
                @php
                $steps = [
                ['icon' => 'bi-people', 'text' => __('home.supporter_contribution')],
                ['icon' => 'bi-briefcase', 'text' =>__('home.entrepreneur_support')],
                ['icon' => 'bi-percent', 'text' =>__('home.interest_activation')],
                ['icon' => 'bi-file-earmark-text', 'text' =>__('home.quarterly_reports')],
                ['icon' => 'bi-arrow-repeat', 'text' => __('home.future_funding')],
                ];
                @endphp

                @foreach ($steps as $step)
                <div class="group flex items-center gap-4 rounded-[26px] bg-gradient-to-r 
                           from-[#6F5CF5] to-[#5A52C0] px-5 py-5 sm:px-7 sm:py-6 
                           shadow-[0_18px_45px_rgba(0,0,0,0.18)] hover:from-[#5A52C0] 
                           hover:to-[#4A3F9F] transition-all duration-300 hover:shadow-[0_25px_55px_rgba(111,92,245,0.4)] hover:scale-[1.02]">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl
                         bg-white/20 border border-white/40 text-white text-2xl 
                         group-hover:bg-white/30 group-hover:scale-110 transition-all duration-300">
                        <i class="bi {{ $step['icon'] }}"></i>
                    </div>
                    <p class="text-sm sm:text-lg font-medium text-white leading-snug 
                             group-hover:text-white/95 transition-colors duration-300">
                        {{ $step['text'] }}
                    </p>
                </div>
                @endforeach
            </div>

            {{-- RIGHT: Centered Card Image --}}
            <div class="mt-4 lg:mt-0 order-1 lg:order-2 flex justify-center">
                <div class="w-full max-w-md mx-auto h-[450px] overflow-hidden rounded-[20px]
                           shadow-[0_35px_90px_rgba(111,92,245,0.25)] border border-purple-100/50
                           hover:shadow-[0_45px_120px_rgba(111,92,245,0.35)] transition-all duration-500 hover:-rotate-1">
                    <img src="{{ asset('images/howitwork.png') }}" 
                         alt="Hands holding coins and plant"
                         class="h-full w-full object-cover rounded-[18px]" />
                </div>
            </div>
        </div>

        {{-- Call to Action Button --}}
        <div class="text-center mt-20">
            <a href="{{ route('website.entrepreneur', ['lang' => app()->getLocale()]) }}" 
               class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-[#6F5CF5] to-[#39B44F]
                      text-white text-lg font-bold rounded-3xl shadow-[0_20px_60px_rgba(111,92,245,0.4)]
                      hover:from-[#5A52C0] hover:to-[#2E9A3F] hover:shadow-[0_30px_80px_rgba(111,92,245,0.5)]
                      transition-all duration-300 hover:scale-105 hover:-translate-y-1">
                <i class="bi bi-arrow-right me-2"></i>
                Contact us
            </a>
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
<!-- 
                <p class="mt-6 text-lg sm:text-xl text-gray-700 leading-relaxed max-w-2xl mx-auto bg-white rounded-full">
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

<!-- FAQ -->
<div class=" mx-auto lg:px-24 md:px-10 py-10">

    <span class="text-lg font-semibold text-green-500 tracking-widest">
        {{__('home.title_faq')}}
    </span>

    <h2 class="text-5xl font-bold mt-2 mb-6">
        {{__('home.subtitle_faq')}}
    </h2>

   @php
        $faqs = [
            [
                'question' => __('home.q1_question'),
                'answer'   => __('home.q1_answer'),
            ],
            [
                'question' => __('home.q2_question'),
                'answer'   => __('home.q2_answer'),
            ],
            [
                'question' => __('home.q3_question'),
                'answer'   => __('home.q3_answer'),
            ],
            [
                'question' => __('home.q4_question'),
                'answer'   => __('home.q4_answer'),
            ],
            [
                'question' => __('home.q5_question'),
                'answer'   => __('home.q5_answer'),
            ],
            [
                'question' => __('home.q6_question'),
                'answer'   => __('home.q6_answer'),
            ],
            [
                'question' => __('home.q7_question'),
                'answer'   => __('home.q7_answer'),
            ],
            [
                'question' => __('home.q8_question'),
                'answer'   => __('home.q8_answer'),
            ],
            [
                'question' => __('home.q9_question'),
                'answer'   => __('home.q9_answer'),
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
                {{ __('home.title_last_1') }}<br class="hidden sm:block" />
                {{ __('home.title_last_2') }}
            </h2>

            <p class="text-sm sm:text-lg text-gray-700 leading-relaxed">
                {{ __('home.description_last') }}
            </p>

            <div>
                <a href="{{ route('website.contact', ['lang' => app()->getLocale()]) }}" 
                class="inline-flex items-center justify-center rounded-lg
                        bg-[#6F5CF5] px-6 py-2.5 text-sm sm:text-base
                        font-semibold text-white shadow-md hover:bg-indigo-600 transition">
                    {{ __('home.join_us_btn') }}
                </a>
            </div>
        </div>

        </div>
    </div>
</section>




{{-- <ul>
    <li><a href="{{ route('website.home')}}">Home</a></li>
    <li><a href="{{ route('website.about')}}">About Us</a></li>
</ul> --}}
{{-- push a small script only for this page --}}
@push('scripts')
<script>
console.log('about Us page script');
</script>
<script>
document.addEventListener('alpine:init', () => {
    Alpine.plugin(collapse);
});
</script>
<script>
function toggleFaq(id) {
    const content = document.getElementById(id + '-content');
    const icon = document.getElementById(id + '-icon');

    const isOpen = content.style.maxHeight && content.style.maxHeight !== '0px';

    if (isOpen) {
        content.style.maxHeight = '0';
        icon.style.transform = 'rotate(0deg)';
    } else {
        content.style.maxHeight = content.scrollHeight + 'px';
        icon.style.transform = 'rotate(180deg)';
    }
}
</script>
@endpush
@endsection