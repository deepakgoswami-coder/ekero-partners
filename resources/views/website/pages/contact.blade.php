@extends('website.layout.main')

@section('title', 'Contact - Ekero Partners')

@section('content')


    <!-- Hero Section -->
    <section class="contact-bg relative bg-cover bg-center">

        <div class=" max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20 ">
            <div class="grid gap-10 items-center lg:grid-cols-2 mt-20">
                {{-- LEFT --}}
                <div class="space-y-6 lg:space-y-8">
                    <p class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-[#23A148] leading-tight">
                        <span class="text-white inline-flex items-center gap-2">
                            {{ __('contactUs.title') }}
                            <!-- <img src="{{ asset('images/grow.png') }}" class="h-7 sm:h-8 lg:h-10 w-auto" /> -->
                        </span>
                        <span class="block text-white mt-2 growtext"> {{ __('contactUs.title_sub') }}</span>
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
                <p class="text-sm sm:text-base lg:text-lg font-medium text-gray-700"> {{ __('home.rating') }}</p>
            </div>
        </div>

        {{-- Bottom right text --}}
        <div class="mt-6 text-sm sm:text-base lg:text-lg text-right lg:absolute lg:bottom-10 lg:right-0">

            <p>
                {{ __('contactUs.heading') }} <br class="hidden sm:block" />
                {{ __('contactUs.sub_heading') }}
            </p>
        </div>
    </section>
    <!-- contact form -->
    <section class="py-16 bg-white">
        <div class="">
            <div class="grid gap-8 lg:grid-cols-2 items-stretch">
                    <div class="rounded-[40px] border border-gray-200 bg-white flex items-center justify-center">
                    <img src="{{ asset('images/contact1.jpg') }}" alt="Support person"
                        class="w-full h-full object-cover rounded-[30px]" />
                </div>
                <div class="rounded-tr-[125px] bg-gradient-to-b from-[#E5E5FF] via-[#ECF3FF] to-[#E0FFE9]
                   px-6 sm:px-8 lg:px-10 py-8 sm:py-10 shadow-[0_18px_60px_rgba(0,0,0,0.12)]">
                    <button class="mb-5 inline-flex items-center rounded-full border border-emerald-400
                     bg-white px-4 py-1 text-xs font-semibold uppercase tracking-[0.16em]
                     text-emerald-600">
                        {{ __('contactUs.contact_form_heading') }}
                    </button>

                    @if(session('success'))
                        <p id="success-message" class="text-green-600 text-sm font-medium">
                            {{ session('success') }}
                        </p>

                        <script>
                            setTimeout(() => {
                                const msg = document.getElementById('success-message');
                                if (msg) {
                                    msg.remove();
                                }
                            }, 5000); // 3 seconds
                        </script>
                    @endif

                    <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-6">
                        {{ __('contactUs.contact_form_sub_heading') }}
                    </h2>


                    <form action="{{route('website.contact.query')}}" method="  POST" class="space-y-4">
                        <div class="grid gap-4 sm:grid-cols-2">
                            <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" class="w-full rounded-md border border-gray-200 bg-white px-4 py-2.5
                         text-sm text-gray-900 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" />
                            @error('name')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror

                            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="w-full rounded-md border border-gray-200 bg-white px-4 py-2.5
                         text-sm text-gray-900 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" />
                        </div>
                        @error('email')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror

                        <div class="flex gap-2">
                            <div class="flex items-center gap-2">
                                <input type="hidden" name="full_phone" id="full_phone">

                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                    placeholder="Mobile Number" inputmode="numeric" pattern="[0-9]*"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                    class="flex-1 rounded-md border border-gray-200 bg-white px-4 py-2.5
                                        text-sm text-gray-900 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" />

                                @error('full_phone')
                                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <textarea name="message" rows="4" placeholder="Message"
                            class="w-full rounded-md border border-gray-200 bg-white px-4 py-3
                       text-sm text-gray-900 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"></textarea>

                        @error('message')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="mt-2 inline-flex items-center justify-center rounded-md cursor-pointer
                       bg-[#6F5CF5] px-8 py-2.5 text-sm font-semibold text-white
                       shadow-md hover:bg-indigo-600 transition">
                            Send
                        </button>
                    </form>
                </div>

            
            </div>
        </div>
    </section>
    <!-- Address  -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative grid gap-0 lg:grid-cols-[minmax(0,1.4fr)_minmax(0,1.4fr)] 
                 rounded-[25px] border border-gray-200 bg-white overflow-hidden
                 shadow-[0_18px_60px_rgba(0,0,0,0.08)]">
                {{-- LEFT: map --}}
                <div class="h-auto">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d59508271.05306078!2d-30.882246639659638!3d24.447432835877!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c764aa7c4428d1%3A0x7b6820145593d386!2s8%20The%20Green%20B%2C%20Dover%2C%20DE%2019901!5e0!3m2!1sen!2sus!4v1764832574868!5m2!1sen!2sus"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                {{-- RIGHT: info --}}
                <div class="relative flex flex-col justify-between px-6 sm:px-8 py-6 sm:py-8">
                    <div class="space-y-6 text-sm text-gray-700">
                        <div>
                            <h3 class="text-base font-semibold text-gray-900 mb-1"> {{ __('contactUs.location') }}</h3>
                            <p class="text-sm">8 The Green STE B Dover, DE 19901
                            </p>
                        </div>

                        <div>
                            <h3 class="text-base font-semibold text-gray-900 mb-1">{{ __('contactUs.qui_contact') }}</h3>
                            <a href="tel:3025564325">(302 556-4325)</a>
                            <a href="mailto:invest@ekeropartners.com">invest@ekeropartnersempowerwealth.com</a>
                        </div>

                        <div>
                            <h3 class="text-base font-semibold text-gray-900 mb-1"> {{ __('contactUs.open_hours') }}</h3>
                            <p>Monday - Friday</p>
                            <p>09:00 AM - 06:00 PM</p>
                        </div>
                    </div>

                    <!-- {{-- vertical social bar --}} -->
                    <div class="absolute inset-y-6 right-0 flex items-center">
                        <div
                            class="flex flex-col gap-3 rounded-tl-lg rounded-bl-lg border border-gray-200 bg-white px-3 py-4 shadow-[0_10px_30px_rgba(0,0,0,0.12)]">
                            <a href="https://www.facebook.com/ekeropartners/" class="hover:text-emerald-600"><i
                                    class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/ekeropartners/" class="hover:text-emerald-600"><i
                                    class="bi bi-instagram"></i></a>
                            <a href="https://x.com/EkeroPartners" class="hover:text-emerald-600"><i
                                    class="bi bi-twitter-x"></i></a>
                            <a href="https://www.tiktok.com/@ekero_partners" class="hover:text-emerald-600"><i
                                    class="bi bi-tiktok"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- LAst Section -->
    <section class="max-w-7xl mx-auto ">
        <div class="bgimages" style="background-size: cover; padding: 30px; margin-bottom: 30px; border-radius: 20px;">
            <div class="grid gap-8 lg:grid-cols-2 items-center">
                {{-- LEFT: text + button --}}
                <div class="space-y-4 max-w-md">
                    <h2 class="text-2xl sm:text-3xl lg:text-5xl font-semibold text-gray-900 leading-snug">
                        {{ __('contactUs.title_last_1') }} <br class="hidden sm:block" />
                        {{ __('contactUs.title_last_2') }}
                    </h2>

                    <p class="text-sm sm:text-lg text-gray-700 leading-relaxed">
                        {{ __('contactUs.description_last') }}
                    </p>

                    <div>
                        <a href="#" class="inline-flex items-center justify-center rounded-lg
                      bg-[#6F5CF5] px-6 py-2.5 text-sm sm:text-base
                      font-semibold text-white shadow-md hover:bg-indigo-600 transition">
                            {{ __('contactUs.join_us_btn') }}
                        </a>
                    </div>
                </div>
    </section>

    </div>
    </div>

    <script>
        const phoneInput = document.querySelector("#phone");

        const iti = window.intlTelInput(phoneInput, {
            initialCountry: "auto",
            separateDialCode: true,
            nationalMode: false,
            geoIpLookup: function (callback) {
                fetch("https://ipapi.co/json")
                    .then(res => res.json())
                    .then(data => callback(data.country_code))
                    .catch(() => callback("us"));
            }
        });

    </script>
    <script>
        const form = document.querySelector("form"); // replace with your form selector

        form.addEventListener("submit", function (e) {
            // Update hidden input with full international number before submitting
            document.getElementById("full_phone").value = iti.getNumber();
        });
    </script>



    @push('scripts')
    @endpush
@endsection