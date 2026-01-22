@extends('website.layout.main')

@section('title', 'Contact - Ekero Partners')

@section('content')

<!-- Hero Section -->
<section class="Entrepreneur-bg relative bg-cover bg-center">
    <div class=" max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20 ">
        <div class="grid gap-10 items-center lg:grid-cols-2 mt-20">
            {{-- LEFT --}}
            <div class="space-y-6 lg:space-y-8">
                <p class="text-3xl sm:text-4xl lg:text-7xl font-semibold text-[#23A148] leading-tight">
                    <span class="text-white inline-flex items-center gap-2 growtext">
                        {{ __('entrepreneur.title') }}
                        <!-- <img src="{{ asset('images/grow.png') }}" class="h-7 sm:h-8 lg:h-10 w-auto" /> -->
                    </span>
                    <span class="block text-white mt-2 ">{{ __('entrepreneur.title_sub') }}</span>
                </p>

                <div class="flex flex-wrap gap-3 sm:gap-4">
                    
                    <a href="{{route('leader.register')}}"
                        class="inline-flex items-center justify-center rounded-full bg-[#39B44F] px-5 py-2.5 text-base lg:text-lg text-white shadow-md hover:bg-emerald-700 transition">
                        {{ __('home.apply_entr') }}
                    </a>
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
            <p class="text-sm sm:text-lg lg:text-xl font-medium text-gray-700">{{ __('home.rating') }}</p>
        </div>
    </div>

    {{-- Bottom right text --}}
    <div class="mt-6 text-sm sm:text-base lg:text-lg text-right lg:absolute lg:bottom-10 lg:right-0">
        <p>
            {{ __('entrepreneur.base_heading') }} <br class="hidden sm:block" />
            {{ __('entrepreneur.base_heading_1') }}
        </p>
    </div>
</section>
<!-- Enterprenur section -->
<section class="py-16 bg-white">
    <div class=" px-10 sm:px-6 lg:px-24">
        <div class="grid gap- lg:grid-cols-2 items-center">
            {{-- LEFT: image card --}}
            <div class="relative">
                <button class="absolute -top-4 left-6 inline-flex items-center rounded-full
                 border border-emerald-400 bg-white px-3 py-1
                 text-[11px] font-semibold uppercase tracking-[0.18em]
                 text-emerald-600 shadow-sm">
                    {{ __('entrepreneur.entrepreneur') }}
                </button>

                <div class="">
                    <img src="{{ asset('images/rightsidemen.png') }}" alt="Entrepreneur"
                        class="w-[472px] h-[664px] object-cover" />
                </div>
            </div>

            {{-- RIGHT: text --}}
           <div class="space-y-5">
                <h2 class="text-2xl sm:text-3xl lg:text-5xl font-semibold text-gray-900 leading-snug">
                    {{ __('entrepreneur.entrepreneur_apply_title_line1') }} <br class="hidden sm:block" />
                    {{ __('entrepreneur.entrepreneur_apply_title_line2') }} <br class="hidden sm:block" />
                    {{ __('entrepreneur.entrepreneur_apply_title_line3') }}
                </h2>

                <ul class="space-y-2 text-sm sm:text-lg text-gray-700 list-disc pl-5 marker:text-[#6F5CF5]">
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

</section>

<!-- Benefits -->
<section class="py-16 bg-white lg:px-24">
        {{-- small label --}}
        <button class="mb-3 inline-flex items-center rounded-full border border-emerald-300
             bg-emerald-50 px-4 py-1 text-[16px] font-semibold uppercase tracking-[0.18em]
             text-emerald-600">
            {{ __('entrepreneur.supporter_journey') }}
        </button>

        <p class="text-sm sm:text-lg text-gray-700 mb-6">
            {{ __('entrepreneur.supporter_journey_sub') }}     
        </p>
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
</section>


<!-- CTA -->
<section class="bg-gradient-to-b from-[#F4FFF6] to-[#DDFBE6] bgimg">
    <div class=" px-4 sm:px-6 lg:px-8 py-10 sm:py-14 lg:py-16">
        <div class="flex flex-col items-center text-center   gap-6 lg:gap-10">

            {{-- Text --}}
            <div class="max-w-xl">
    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-semibold leading-snug">
        <span class="text-[#09A54A]">{{ __('entrepreneur.cta_heading_invest') }}</span>
        <span class="text-gray-900"> {{ __('entrepreneur.cta_heading_in_people') }}</span><br />

        <span class="text-[#09A54A]">{{ __('entrepreneur.cta_heading_develop') }}</span>
        <span class="text-gray-900"> {{ __('entrepreneur.cta_heading_potential') }}</span>
    </h2>

    <p class="mt-3 text-sm sm:text-base text-gray-700">
        {{ __('entrepreneur.cta_subtext') }}
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
                     {{ __('home.apply_entr') }}
                </a>
            </div>

        </div>
    </div>
</section>
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