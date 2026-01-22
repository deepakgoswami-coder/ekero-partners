@extends('website.layout.main')

@section('title', ' Privacy Policy - Ekero Partners')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/custom1.css') }}">
<!-- Hero Section -->
<section class="about-bg relative bg-cover bg-center">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-2 md:px-8 py-12 lg:py-20 ">
        <div class="grid gap-10 items-center lg:grid-cols-2 mt-20">
            {{-- LEFT --}}
            <div class="space-y-6 lg:space-y-8">
            <p class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-white leading-tight">
                    <span class="term-heading1 !text-6xl !md:text-8xl lg:text-[86px]  gap-2">
                        Privacy policy 
                        <!-- <br class="md:hidden " /> {{__('terms.head_2')}} -->
                    </span>

                        <span class="block uppercase mt-2"> {{__('terms.sub_heading_1')}} <br />
                            {{__('terms.sub_heading_2')}} 
                        </span>
                </p>

                <!-- <div class="flex flex-wrap gap-3 sm:gap-4">
                    
                    <a href="{{route('leader.register')}}"
                        class="inline-flex items-center justify-center rounded-full bg-[#39B44F] px-5 py-2.5 text-base lg:text-lg text-white font-semibold shadow-md hover:bg-emerald-700 transition">
                        {{__('home.apply_entr')}}
                    </a>
                </div> -->
            </div>

        </div>

    </div>
    {{-- Bottom strip (avatar + rating) --}}
    <div class="mt-10 flex flex-wrap items-center gap-4 w-fit absolute bottom-10 left-6
         justify-start sm:justify-center lg:justify-start">
        <div class="flex -space-x-3">
            <img src="{{ asset('images/avatar.png') }}"
                class="h-9 w-9 sm:h-12 sm:w-12 rounded-full border-2 border-white object-cover" alt="">
            <img src="{{ asset('images/avatar.png') }}"
                class="h-9 w-9 sm:h-12 sm:w-12  rounded-full border-2 border-white object-cover" alt="">
            <img src="{{ asset('images/avatar.png') }}"
                class="h-9 w-9 sm:h-12 sm:w-12  rounded-full border-2 border-white object-cover" alt="">
            <img src="{{ asset('images/avatar.png') }}"
                class="h-9 w-9 sm:h-12 sm:w-12  rounded-full border-2 border-white object-cover" alt="">
        </div>
        <div>
            <div class="flex items-center gap-1 text-amber-400 text-xl sm:text-2xl">
                <span>★★★★★
            </div>
            <p class="text-sm sm:text-base lg:text-lg font-medium text-[#23A148]">{{__('home.rating')}}</p>
        </div>
    </div>

    {{-- Bottom right text --}}
    <div class="mt-6 text-sm sm:text-base lg:text-lg text-right lg:absolute lg:bottom-10 lg:right-0 text-[#494849]">
        <p class="text-[#6A6A6A] text-[14px]">

             {{__('terms.pera-1')}} <br class="hidden sm:block" />
            {{__('terms.pera_2')}} <br class="hidden sm:block" />
           {{__('terms.pera_3')}} 
        </p>
    </div>
</section>



<section class="px-2 md:px-10 py-10 rounded-3xl mt-12" style="background: radial-gradient(50% 286.21% at 50% 50%, #FDFDFF 0%, #E2DFFF 100%);">

<div class=" rounded-3xl">
    <div class="bg-white border border-[#D0D0D0] px-4 md:px-8 py-10 rounded-2xl">

        <h1 class="text-[40px] font-bold mb-6">{{__('privacy.title')}}</h1>

        <p>
            {{__('privacy.intro')}}
            <a href="https://www.ekeropartnersempowerwealth.com" style="color: blue;">
                https://www.ekeropartnersempowerwealth.com
            </a>,
            {{__('privacy.intro_sub')}}
        </p>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">1. {{__('privacy.section_1_title')}}</h2>
        <p>{{__('privacy.section_1_desc')}}</p>
        <ul class="list-disc pl-6">
            <li>{{__('privacy.info_list.name')}}</li>
            <li>{{__('privacy.info_list.phone')}}</li>
            <li>{{__('privacy.info_list.email')}}</li>
            <li>{{__('privacy.info_list.business')}}</li>
            <li>{{__('privacy.info_list.voluntary')}}</li>
        </ul>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">2.{{__('privacy.section_2_title')}}</h2>
        <p>{{__('privacy.section_2_desc')}}</p>
        <ul class="list-disc pl-6">
            <li>{{__('privacy.use_list.services')}}</li>
            <li>{{__('privacy.use_list.inquiries')}}</li>
            <li>{{__('privacy.use_list.communication')}}</li>
            <li>{{__('privacy.use_list.sms_consent')}}</li>
            <li>{{__('privacy.use_list.improvement')}}</li>
            <li>{{__('privacy.use_list.legal')}}</li>
           
        </ul>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">3. {{__('privacy.section_3_title')}}</h2>
        <p>
            {{__('privacy.section_3_desc')}}
        </p>

        <p class="font-semibold mt-2">{{__('privacy.sms_disclosure_title')}}</p>
        <ul class="list-disc pl-6">
            <li>{{__('privacy.sms_disclosure.frequency')}}</li>
            <li>{{__('privacy.sms_disclosure.rates')}}</li>
            <li>{{__('privacy.sms_disclosure.stop')}}</li>
            <li>{{__('privacy.sms_disclosure.help')}}</li>
            <li>{{__('privacy.sms_disclosure.condition')}}</li>
        </ul>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">4.{{__('privacy.section_4_title')}}</h2>
        <ul class="list-disc pl-6">
            <li>{{__('privacy.opt_policy.opt_in')}}</li>
            <li>{{__('privacy.opt_policy.opt_out')}}</li>
            <li>{{__('privacy.opt_policy.processing')}}</li>

        </ul>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">5.{{__('privacy.section_5_title')}}</h2>
        <ul class="list-disc pl-6">
            <li>{{__('privacy.data_sharing.no_sell')}}</li>
            <li>{{__('privacy.data_sharing.no_marketing')}}</li>
            <li>{{__('privacy.data_sharing.trusted')}}</li>
        </ul>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">6. {{__('privacy.section_6_title')}}</h2>
        <p>
            {{__('privacy.section_6_desc')}}
        </p>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">7. {{__('privacy.section_7_title')}}</h2>
        <p>
            {{__('privacy.section_7_desc')}}
        </p>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">8. {{__('privacy.section_8_title')}}</h2>
        <p>
            {{__('privacy.section_8_desc')}}
        </p>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">9. {{__('privacy.section_9_title')}}</h2>
        <ul class="list-disc pl-6">
            <li>{{__('privacy.rights.access')}}</li>
            <li>{{__('privacy.rights.correction')}}</li>
            <li>{{__('privacy.rights.withdraw')}}</li>
        </ul>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">10. {{__('privacy.section_10_title')}}</h2>
        <p>
            {{__('privacy.section_10_desc')}}
        </p>

        <h2 class="text-[24px] font-semibold mt-6 mb-2"> {{__('privacy.form_title')}}</h2>
        <p>
            {{__('privacy.form_desc')}}
        </p>

    </div>
</div>

</section>


@push('scripts')
<script>

</script>
@endpush
@endsection