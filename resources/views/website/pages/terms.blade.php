@extends('website.layout.main')

@section('title', ' Terms - Ekero Partners')
{{--
    @section('page_heading', 'Welcome to MySite')
--}}

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
                        {{__('terms.head_1')}} <br class="md:hidden " /> {{__('terms.head_2')}}
                    </span>

                        <span class="block uppercase mt-2"> {{__('terms.sub_heading_1')}} <br />
                            {{__('terms.sub_heading_2')}} 
                        </span>
                </p>
<!-- 
                <div class="flex flex-wrap gap-3 sm:gap-4">
                    
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




<section class="px-2 md:px-16 py-10 rounded-3xl mt-12" style="background: radial-gradient(50% 286.21% at 50% 50%, #FDFDFF 0%, #E2DFFF 100%);">
    <div class="bg-white border border-[#D0D0D0] px-2 md:px-8 py-10 rounded-2xl">
        <h5 class="text-[#3C3C3C] font-bold text-center text-[40px]">
            {{__('terms.page_title')}} 
        </h5>
        <div>
            <p class="text-[24px] mt-6 mb-2 "> {{__('terms.section1_title')}} </p>

            <div class="text-[#6A6A6A] text-[16px]">

                <!-- Participation Requirements -->
                <p class="">
                    {{ __('terms.participation_requirements_title') }}
                </p>

                <ul class="list-disc pl-6">
                    <li>{{ __('terms.participation_req_1') }}</li>
                    <li>{{ __('terms.participation_req_2') }}</li>
                    <li>{{ __('terms.participation_req_3') }}</li>
                </ul>

                <!-- Entrepreneur Responsibilities -->
                <p class="mt-4">
                    {{ __('terms.entrepreneur_responsibilities_title') }}
                </p>

                <ul class="list-disc pl-6">
                    <li>{{ __('terms.entrepreneur_res_1') }}</li>
                    <li>{{ __('terms.entrepreneur_res_2') }}</li>
                    <li>{{ __('terms.entrepreneur_res_3') }}</li>
                    <li>{{ __('terms.entrepreneur_res_4') }}</li>
                    <li>{{ __('terms.entrepreneur_res_5') }}</li>
                </ul>

                <!-- Supporter Responsibilities -->
                <p class="mt-4">
                    {{ __('terms.supporter_responsibilities_title') }}
                </p>

                <ul class="list-disc pl-6">
                    <li>{{ __('terms.supporter_res_1') }}</li>
                    <li>{{ __('terms.supporter_res_2') }}</li>
                    <li>{{ __('terms.supporter_res_3') }}</li>
                </ul>

            </div>

        </div>

      <div>
    <p class="text-[24px] mt-6 mb-2">
        {{ __('terms.section2_title') }}
    </p>

    <div class="text-[#6A6A6A] text-[16px]">

        <!-- Non-Equity Structure -->
        <p class="font-semibold">
            {{ __('terms.non_equity_title') }}
        </p>

        <p>
            {{ __('terms.non_equity_text') }}
        </p>

        <!-- Interest Activation Policy -->
        <p class="font-semibold mt-4">
            {{ __('terms.interest_activation_title') }}
        </p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.interest_activation_1') }}</li>
            <li>{{ __('terms.interest_activation_2') }}</li>
            <li>{{ __('terms.interest_activation_3') }}</li>
        </ul>

        <!-- Risk Disclosure -->
        <p class="font-semibold mt-4">
            {{ __('terms.risk_disclosure_title') }}
        </p>

        <p>
            {{ __('terms.risk_disclosure_text') }}
        </p>

        <ul class="list-disc pl-6 mt-2">
            <li>{{ __('terms.risk_disclosure_1') }}</li>
            <li>{{ __('terms.risk_disclosure_2') }}</li>
            <li>{{ __('terms.risk_disclosure_3') }}</li>
        </ul>

    </div>
</div>


       <div>
    <p class="text-[24px] mt-6 mb-2">
        {{ __('terms.section3_title') }}
    </p>

    <div class="text-[#6A6A6A] text-[16px]">

        <!-- Compliance Monitoring -->
        <p class="font-semibold">
            {{ __('terms.compliance_monitoring_title') }} <br>
            {{ __('terms.compliance_monitoring_text') }}
        </p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.compliance_monitoring_1') }}</li>
            <li>{{ __('terms.compliance_monitoring_2') }}</li>
            <li>{{ __('terms.compliance_monitoring_3') }}</li>
            <li>{{ __('terms.compliance_monitoring_4') }}</li>
        </ul>

        <!-- Non-compliance -->
        <p class="font-semibold mt-4">
            {{ __('terms.non_compliance_title') }}
        </p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.non_compliance_1') }}</li>
            <li>{{ __('terms.non_compliance_2') }}</li>
            <li>{{ __('terms.non_compliance_3') }}</li>
        </ul>

        <!-- Supporter Protections -->
        <p class="font-semibold mt-4">
            {{ __('terms.supporter_protections_title') }}
        </p>

        <p>{{ __('terms.supporter_protections_text') }}</p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.supporter_protections_1') }}</li>
            <li>{{ __('terms.supporter_protections_2') }}</li>
            <li>{{ __('terms.supporter_protections_3') }}</li>
            <li>{{ __('terms.supporter_protections_4') }}</li>
            <li>{{ __('terms.supporter_protections_5') }}</li>
        </ul>

        <!-- Training & Guidance Requirements -->
        <p class="font-semibold mt-4">
            {{ __('terms.training_guidance_title') }}
        </p>

        <p>{{ __('terms.training_guidance_text') }}</p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.training_guidance_1') }}</li>
            <li>{{ __('terms.training_guidance_2') }}</li>
            <li>{{ __('terms.training_guidance_3') }}</li>
            <li>{{ __('terms.training_guidance_4') }}</li>
            <li>{{ __('terms.training_guidance_5') }}</li>
            <li>{{ __('terms.training_guidance_6') }}</li>
        </ul>

        <p class="mt-2">
            {{ __('terms.training_guidance_footer') }}
        </p>
    </div>
</div>


     <div>
    <p class="text-[24px] mt-6 mb-2">
        {{ __('terms.section4_title') }}
    </p>

    <div class="text-[#6A6A6A] text-[16px]">

        <!-- Quarterly Audits -->
        <p class="font-semibold">
            {{ __('terms.quarterly_audits_title') }}
        </p>

        <p>{{ __('terms.quarterly_audits_text') }}</p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.quarterly_audits_1') }}</li>
            <li>{{ __('terms.quarterly_audits_2') }}</li>
            <li>{{ __('terms.quarterly_audits_3') }}</li>
            <li>{{ __('terms.quarterly_audits_4') }}</li>
        </ul>

        <!-- Financial Tracking -->
        <p class="font-semibold mt-4">
            {{ __('terms.financial_tracking_title') }}
        </p>

        <p>{{ __('terms.financial_tracking_text') }}</p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.financial_tracking_1') }}</li>
            <li>{{ __('terms.financial_tracking_2') }}</li>
            <li>{{ __('terms.financial_tracking_3') }}</li>
            <li>{{ __('terms.financial_tracking_4') }}</li>
        </ul>

        <!-- Recordkeeping -->
        <p class="font-semibold mt-4">
            {{ __('terms.recordkeeping_title') }}
        </p>

        <p>{{ __('terms.recordkeeping_text') }}</p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.recordkeeping_1') }}</li>
            <li>{{ __('terms.recordkeeping_2') }}</li>
            <li>{{ __('terms.recordkeeping_3') }}</li>
            <li>{{ __('terms.recordkeeping_4') }}</li>
        </ul>

    </div>
</div>


      <div>
    <p class="text-[24px] mt-6 mb-2">
        {{ __('terms.section5_title') }}
    </p>

    <div class="text-[#6A6A6A] text-[16px]">

        <p>{{ __('terms.privacy_summary_1') }}</p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.privacy_list_1') }}</li>
            <li>{{ __('terms.privacy_list_2') }}</li>
            <li>{{ __('terms.privacy_list_3') }}</li>
        </ul>

        <p>{{ __('terms.privacy_summary_2') }}</p>

    </div>
</div>


     <div>
    <p class="text-[24px] mt-6 mb-2">
        {{ __('terms.section6_title') }}
    </p>

    <div class="text-[#6A6A6A] text-[16px]">

        <p>{{ __('terms.ethics_intro') }}</p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.ethics_1') }}</li>
            <li>{{ __('terms.ethics_2') }}</li>
            <li>{{ __('terms.ethics_3') }}</li>
            <li>{{ __('terms.ethics_4') }}</li>
            <li>{{ __('terms.ethics_5') }}</li>
        </ul>

        <p>{{ __('terms.ethics_end') }}</p>

    </div>
</div>


        <div>
    <p class="text-[24px] mt-6 mb-2">
        {{ __('terms.section7_title') }}
    </p>

    <div class="text-[#6A6A6A] text-[16px]">

        <p>{{ __('terms.anti_fraud_intro') }}</p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.anti_fraud_1') }}</li>
            <li>{{ __('terms.anti_fraud_2') }}</li>
            <li>{{ __('terms.anti_fraud_3') }}</li>
            <li>{{ __('terms.anti_fraud_4') }}</li>
        </ul>

    </div>
</div>


       <div>
    <p class="text-[24px] mt-6 mb-2">
        {{ __('terms.section8_title') }}
    </p>

    <div class="text-[#6A6A6A] text-[16px]">

        <p>{{ __('terms.dispute_intro') }}</p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.dispute_1') }}</li>
            <li>{{ __('terms.dispute_2') }}</li>
            <li>{{ __('terms.dispute_3') }}</li>
            <li>{{ __('terms.dispute_4') }}</li>
        </ul>

        <p class="mt-2">
            {{ __('terms.dispute_footer') }}
        </p>

    </div>
</div>


      <div>
    <p class="text-[24px] mt-6 mb-2">
        {{ __('terms.section9_title') }}
    </p>

    <div class="text-[#6A6A6A] text-[16px]">

        <p class="mt-4">
            {{ __('terms.professional_intro') }}
        </p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.professional_1') }}</li>
            <li>{{ __('terms.professional_2') }}</li>
            <li>{{ __('terms.professional_3') }}</li>
            <li>{{ __('terms.professional_4') }}</li>
        </ul>

        <p class="mt-2">
            {{ __('terms.professional_footer') }}
        </p>

    </div>
</div>


     <div>
    <p class="text-[24px] mt-6 mb-2">
        {{ __('terms.section10_title') }}
    </p>

    <div class="text-[#6A6A6A] text-[16px]">

        <p class="mt-4">
            {{ __('terms.conflict_intro') }}
        </p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.conflict_1') }}</li>
            <li>{{ __('terms.conflict_2') }}</li>
            <li>{{ __('terms.conflict_3') }}</li>
        </ul>

        <p class="mt-2">
            {{ __('terms.conflict_footer') }}
        </p>

    </div>
</div>


        <div>
    <p class="text-[24px] mt-6 mb-2">
        {{ __('terms.section11_title') }}
    </p>

    <div class="text-[#6A6A6A] text-[16px]">

        <p class="mt-4">
            {{ __('terms.refund_supporters_intro') }}
        </p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.refund_supporter_1') }}</li>
            <li>{{ __('terms.refund_supporter_2') }}</li>
        </ul>

        <p class="mt-2">
            {{ __('terms.refund_entrepreneurs_intro') }}
        </p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.refund_ent_1') }}</li>
            <li>{{ __('terms.refund_ent_2') }}</li>
        </ul>

    </div>
</div>


      <div>
    <p class="text-[24px] mt-6 mb-2">
        {{ __('terms.section12_title') }}
    </p>

    <div class="text-[#6A6A6A] text-[16px]">

        <p class="mt-4">
            {{ __('terms.data_intro') }}
        </p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.data_1') }}</li>
            <li>{{ __('terms.data_2') }}</li>
            <li>{{ __('terms.data_3') }}</li>
            <li>{{ __('terms.data_4') }}</li>
        </ul>

        <p class="mt-2">
            {{ __('terms.data_footer') }}
        </p>

    </div>
</div>


       <div>
    <p class="text-[24px] mt-6 mb-2">
        {{ __('terms.section13_title') }}
    </p>

    <div class="text-[#6A6A6A] text-[16px]">

        <p class="mt-4">
            {{ __('terms.non_solicit_intro') }}
        </p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.non_solicit_1') }}</li>
            <li>{{ __('terms.non_solicit_2') }}</li>
            <li>{{ __('terms.non_solicit_3') }}</li>
        </ul>

        <p class="mt-2">
            {{ __('terms.non_solicit_footer') }}
        </p>

    </div>
</div>


       <div>
    <p class="text-[24px] mt-6 mb-2">
        {{ __('terms.section14_title') }}
    </p>

    <div class="text-[#6A6A6A] text-[16px]">

        <p class="mt-4">
            {{ __('terms.continuity_intro') }}
        </p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.continuity_1') }}</li>
            <li>{{ __('terms.continuity_2') }}</li>
            <li>{{ __('terms.continuity_3') }}</li>
        </ul>

        <p class="mt-2">
            {{ __('terms.continuity_must_intro') }}
        </p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.continuity_must_1') }}</li>
            <li>{{ __('terms.continuity_must_2') }}</li>
            <li>{{ __('terms.continuity_must_3') }}</li>
        </ul>

        <p class="mt-2">
            {{ __('terms.continuity_footer') }}
        </p>

    </div>
</div>


      <div>
    <p class="text-[24px] mt-6 mb-2">
        {{ __('terms.section15_title') }}
    </p>

    <div class="text-[#6A6A6A] text-[16px]">

        <p class="mt-4">
            {{ __('terms.termination_intro') }}
        </p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.termination_1') }}</li>
            <li>{{ __('terms.termination_2') }}</li>
            <li>{{ __('terms.termination_3') }}</li>
            <li>{{ __('terms.termination_4') }}</li>
            <li>{{ __('terms.termination_5') }}</li>
        </ul>

        <p class="mt-2">
            {{ __('terms.termination_footer') }}
        </p>

    </div>
</div>


        <div>
    <p class="text-[24px] mt-6 mb-2">
        {{ __('terms.section16_title') }}
    </p>

    <div class="text-[#6A6A6A] text-[16px]">

        <p class="mt-4">
            {{ __('terms.amend_intro') }}
        </p>

        <ul class="list-disc pl-6">
            <li>{{ __('terms.amend_1') }}</li>
            <li>{{ __('terms.amend_2') }}</li>
            <li>{{ __('terms.amend_3') }}</li>
        </ul>

        <p class="mt-2">
            {{ __('terms.amend_footer') }}
        </p>

    </div>
</div>



    </div>
</section>





{{-- push a small script only for this page --}}
@push('scripts')


<script>

</script>


@endpush
@endsection