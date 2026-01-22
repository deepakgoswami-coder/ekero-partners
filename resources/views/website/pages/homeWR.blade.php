@extends('website.layout.main')

@section('title', 'Home - Ekero Partners')
{{--
    @section('page_heading', 'Welcome to MySite')
--}}

@section('content')

<!-- Hero Section -->
<section class="hero-bg relative bg-cover bg-center">
    <div class=" max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20 ">
        <div class="grid gap-10 items-center lg:grid-cols-2 mt-20">
            {{-- LEFT --}}
            <div class="space-y-6 lg:space-y-8">
                <p class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-[#23A148] leading-tight">
                    <span class="growtext inline-flex items-center gap-2">
                        {{ __('home.title') }}
                        <img src="{{ asset('images/grow.png') }}" class="h-7 sm:h-8 lg:h-10 w-auto" />
                    </span>
                    <span class="block text-black mt-2">{{ __('home.title_sub') }}</span>
                </p>

                <div class="flex flex-wrap gap-3 sm:gap-4">
                    
                    <a href="{{route('leader.register')}}"
                        class="inline-flex items-center justify-center rounded-full bg-[#39B44F] px-5 py-2.5 text-base lg:text-lg text-white shadow-md hover:bg-emerald-700 transition"> 
                        {{__('home.apply_entr')}}
                    </a>
                </div>
            </div>

            {{-- RIGHT --}}
            <div class=" mt-6 lg:mt-0 lg:block hidden">
                {{-- top card --}}
                <div class=" w-[270px] sm:w-[280px] rounded-tl-2xl rounded-bl-2xl px-4 py-3 sm:px-5 sm:py-4 h-fit
                 shadow-[0px_4px_44.7px_0px_#00000040] backdrop-blur-[50px] 
                  mx-auto lg:mx-0 bottom-[450px]
                 lg:absolute lg:right-0">
                    <p class="text-sm sm:text-base lg:text-lg text-gray-700">
                    {{__('home.hero_heading')}}
                    
                    </p>
                </div>

                {{-- bottom card --}}
                <div class="mt-4 max-w-sm w-full sm:w-[300px] rounded-2xl px-4 py-3 sm:px-5 sm:py-4
                 shadow-[0px_4px_44.7px_0px_#00000040] backdrop-blur-[50px]
                  mx-auto lg:mx-0
                  gap-3 lg:gap-4
                 lg:absolute lg:right-16 lg:bottom-68">
                    <div class="mt-1">
                        <div class="h-8 w-8 rounded-full  items-center justify-center">
                            <img src="{{ asset('images/support_agent.png') }}" class="h-8 w-8" />
                        </div>
                    </div>
                    <div>
                        <p class="text-sm sm:text-base lg:text-lg text-gray-700 leading-snug">
                            {{__('home.hero_sub')}}
                            <span class="font-semibold">{{__('home.hero_sub_1')}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- Bottom strip (avatar + rating) --}}
    <div class="mt-10 flex flex-wrap items-center gap-4 w-fit absolute bottom-10 left-6
         justify-start sm:justify-center lg:justify-start">
        <div class="flex -space-x-3">
            <img src="{{ asset('images/avatar.png') }}"
                class="h-9 w-9 sm:h-10 sm:w-10 rounded-full border-2 border-white object-cover" alt="">
            <img src="{{ asset('images/avatar.png') }}"
                class="h-9 w-9 sm:h-10 sm:w-10 rounded-full border-2 border-white object-cover" alt="">
            <img src="{{ asset('images/avatar.png') }}"
                class="h-9 w-9 sm:h-10 sm:w-10 rounded-full border-2 border-white object-cover" alt="">
            <img src="{{ asset('images/avatar.png') }}"
                class="h-9 w-9 sm:h-10 sm:w-10 rounded-full border-2 border-white object-cover" alt="">
        </div>
        <div>
            <div class="flex items-center gap-1 text-amber-400 text-xl sm:text-2xl">
                <span>★★★★★</span>
            </div>
            <p class="text-sm sm:text-base lg:text-lg font-medium text-gray-700">{{__('home.rating')}}</p>
        </div>
    </div>

    {{-- Bottom right text --}}
    <div class="mt-6 text-sm sm:text-base lg:text-lg text-right lg:absolute lg:bottom-10 lg:right-0">
        <p>
            {{__('home.base_heading')}}<br class="hidden sm:block" />
            {{__('home.base_hrading_1')}}
        </p>
    </div>
</section>
<!-- About Section -->
<section class="about-section">
    <div class="ps-30 sm:ps-6 ">
        <div class="grid grid-cols-5 grid-rows-5 gap-10 items-center">

            <!-- {{-- Left: About card --}} -->
            <div class="col-span-2 row-span-4 row-start-2 ms-auto">
                <div
                    class="relative w-[400px] rounded-3xl bg-gradient-to-br from-[#27AE60] to-[#0F8A3A] h-100 text-white p-6 shadow-[0_18px_60px_rgba(0,0,0,0.35)]">
                    <button
                        class="mb-6 inline-flex items-center rounded-full border border-white/70 bg-white/20 px-4 py-1 text-xs font-semibold tracking-[0.12em] uppercase backdrop-blur-sm">
                        {{__('home.about_title')}} ?
                    </button>

                    <p class="text-base sm:text-lg leading-relaxed">{{__('home.about_description')}}
                    </p>
                </div>
            </div>

            <!-- {{-- Right: Values card with soft outer shape --}} -->
            <div class="col-span-3 row-span-4 col-start-3 row-start-2">
                <div class="relative w-full ps-16 py-8">

                    <!-- Background trapezium layer -->
                    <div class="absolute right-50 inset-0 bg-gray-200 rounded-[13%] opacity-60 trapezium-bg">
                    </div>

                    <!-- Foreground trapezium card -->
                    <div class="relative bg-white rounded-3xl shadow-xl p-10 trapezium">
                        <h2 class="text-2xl font-bold mb-4">{{__('home.transparency_title')}}</h2>

                        <ul class="space-y-3 text-sm sm:text-base text-gray-700 list-disc pl-5">
                            <li>
                                <span class="font-semibold">{{__('home.transparency_title')}}:</span>
                                {{__('home.transparency_description')}}
                            </li>
                            <li>
                                <span class="font-semibold">{{__('home.empowerment_title')}}:</span>
                               {{__('home.empowerment_description')}}
                            </li>
                            <li>
                                <span class="font-semibold">{{__('home.commitment_title')}}:</span>
                               {{__('home.commitment_description')}}
                            </li>
                            <li>
                                <span class="font-semibold">{{__('home.shared_growth_title')}}</span>
                               {{__('home.shared_growth_description')}}
                            </li>
                            <li>
                                <span class="font-semibold">{{__('home.accountability_title')}}:</span>
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
        {{-- small label --}}
        <button class="mb-6 inline-flex items-center rounded-full border border-emerald-400
             bg-emerald-50 px-4 py-1 text-xs font-semibold tracking-[0.12em]
             uppercase text-emerald-600">
            {{__('home.title_hiw')}}
        </button>

        <div class="grid gap-10 lg:grid-cols-2 items-start">
            <div class="space-y-5">
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
                <div class="flex items-center gap-4 rounded-[26px] bg-[#6F5CF5]
                       px-5 py-5 sm:px-7 sm:py-6 shadow-[0_18px_45px_rgba(0,0,0,0.18)]">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl
                         bg-white/15 border border-white/30 text-white text-2xl">
                        <i class="bi {{ $step['icon'] }}"></i>
                    </div>

                    <p class="text-sm sm:text-base font-medium text-white leading-snug">
                        {{ $step['text'] }}
                    </p>
                </div>
                @endforeach
            </div>

            {{-- RIGHT: image --}}
            <div class="mt-4 lg:mt-0">
                <div class="overflow-hidden rounded-[15px]
                 shadow-[0_22px_70px_rgba(0,0,0,0.18)]">
                    <img src="{{ asset('images/how.png') }}" alt="Hands holding coins and plant"
                        class="h-full w-full object-cover" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CTA -->
<section class="bg-gradient-to-b from-[#F4FFF6] to-[#DDFBE6] bgimg">
    <div class=" px-4 sm:px-6 lg:px-8 py-10 sm:py-14 lg:py-16">
        <div class="flex flex-col items-start gap-6 lg:gap-10">

            {{-- Text --}}
           <div class="max-w-xl">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-semibold leading-snug">
                    <span class="text-[#09A54A]">{{ __('home.invest') }}</span>
                    <span class="text-gray-900">{{ __('home.in_people') }}</span><br />
                    <span class="text-[#09A54A]">{{ __('home.develop') }}</span>
                    <span class="text-gray-900">{{ __('home.potential') }}</span>
                </h2>

                <p class="mt-3 text-sm sm:text-base text-gray-700">
                    {{ __('home.cta_text') }}
                </p>
            </div>


            {{-- Image --}}
            <!-- <div class="w-full rounded-[32px] overflow-hidden shadow-[0_18px_60px_rgba(0,0,0,0.25)]">
        <img
          src="{{ asset('images/cta.png') }}"
          alt="Hand passing money"
          class="w-full h-auto object-cover"
        />
      </div> -->

            {{-- CTA buttons --}}
            <div
                class="mt-8 flex flex-wrap gap-4 justify-center lg:justify-end w-[-webkit-fill-available] justify-content-end">
                
                <a href="{{route('leader.register')}}" class="inline-flex items-center justify-center rounded-full
                  bg-[#23A148] px-6 sm:px-8 py-2.5 text-sm sm:text-base
                  font-semibold text-white shadow-md hover:bg-emerald-700 transition">
                    {{__('home.apply_entr')}}
                </a>
            </div>

        </div>
    </div>
</section>
<!-- FAQ -->
<div class=" mx-auto px-24 py-10">

    <span class="text-s font-semibold text-green-500 tracking-widest">
        {{__('home.title_faq')}}
    </span>

    <h2 class="text-3xl font-bold mt-2 mb-6">
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
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-semibold text-gray-900 leading-snug">
                {{ __('home.title_last_1') }}<br class="hidden sm:block" />
                {{ __('home.title_last_2') }}
            </h2>

            <p class="text-sm sm:text-base text-gray-700 leading-relaxed">
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