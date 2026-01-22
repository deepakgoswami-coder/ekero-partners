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

        <h1 class="text-[40px] font-bold mb-6">Privacy Policy</h1>

        <p>
            We at Ekero Partners Empower Wealth,  (“we,” “our,” or “us”) are committed to protecting your privacy. This Privacy Policy explains how we collect, use, and safeguard your information when you visit
            <a href="https://www.ekeropartnersempowerwealth.com" style="color: blue;">
                https://www.ekeropartnersempowerwealth.com
            </a>,
            submit forms, or communicate with us through phone calls, emails, or SMS/text messaging.
        </p>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">1. Information We Collect</h2>
        <p>We may collect personal information including but not limited to:</p>
        <ul class="list-disc pl-6">
            <li>Name</li>
            <li>Phone number</li>
            <li>Email address</li>
            <li>Business or property-related details</li>
            <li>Any information you voluntarily submit through our website, forms, or communications</li>
        </ul>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">2. How We Use Your Information</h2>
        <p>We use the collected information to:</p>
        <ul class="list-disc pl-6">
            <li>Provide and manage our services</li>
            <li>Respond to inquiries and service requests</li>
            <li>Communicate with you regarding updates, support, or reminders</li>
            <li>Send SMS messages only to users who have provided consent</li>
            <li>Improve our services and customer experience</li>
            <li>Comply with applicable laws and regulations</li>
        </ul>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">3. SMS/Text Messaging & A2P Compliance</h2>
        <p>
            By providing your phone number and opting in, you consent to receive SMS/text messages from Kleernest Solutions.
            Messages may include service-related notifications, updates, and customer support communications.
        </p>

        <p class="font-semibold mt-2">SMS Disclosure:</p>
        <ul class="list-disc pl-6">
            <li>Message frequency may vary</li>
            <li>Message and data rates may apply</li>
            <li>Reply STOP at any time to opt out</li>
            <li>Reply HELP for assistance</li>
            <li>Consent to receive SMS messages is not a condition of purchase.</li>
        </ul>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">4. Opt-In & Opt-Out Policy</h2>
        <ul class="list-disc pl-6">
            <li>We send SMS communications only to individuals who have explicitly opted in</li>
            <li>You may opt out at any time by replying STOP</li>
            <li>Opt-out requests are processed immediately and permanently</li>
        </ul>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">5. Data Sharing & Use Limitations</h2>
        <ul class="list-disc pl-6">
            <li>We do not sell, rent, or trade personal information</li>
            <li>Mobile phone numbers and messaging consent will not be shared with third parties or affiliates for marketing or promotional purposes</li>
            <li>Information may be shared only with trusted service providers strictly for operational, legal, or compliance-related purposes</li>
        </ul>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">6. Data Security</h2>
        <p>
            We maintain reasonable administrative, technical, and physical safeguards to protect your information from unauthorized access, misuse, or disclosure.
        </p>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">7. Cookies & Website Analytics</h2>
        <p>
            We may use cookies or analytics tools to enhance website performance and user experience. These tools do not collect personally identifiable information unless voluntarily provided.
        </p>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">8. Third-Party Websites</h2>
        <p>
            Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of those sites.
        </p>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">9. Your Rights</h2>
        <ul class="list-disc pl-6">
            <li>Request access to your personal information</li>
            <li>Request corrections or deletion of your data</li>
            <li>Withdraw communication consent at any time</li>
        </ul>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">10. Changes to This Policy</h2>
        <p>
            We may update this Privacy Policy periodically. Any changes will be posted on this page with an updated revision date.
        </p>

        <h2 class="text-[24px] font-semibold mt-6 mb-2">For Form</h2>
        <p>
            By submitting this form, you agree to be contacted by Kleernest Solutions via phone call, email, or SMS/text message regarding our services.
            Message frequency may vary. You can opt out of SMS communications at any time by replying STOP.
            For help, reply HELP. Your information will be used in accordance with our Privacy Policy and will not be shared or sold to third parties for marketing purposes.
        </p>

    </div>
</div>
</section>


@push('scripts')
<script>

</script>
@endpush
@endsection