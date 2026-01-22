<footer class="bg-white border-t border-gray-200">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col gap-8 lg:flex-row lg:items-start lg:justify-between">

            {{-- Left columns --}}
            <div class="grid gap-8 md:grid-cols-12 flex-1">
                {{-- Quick Links --}}
                <div class="md:col-span-2">
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">{{__('home.quick_link')}}</h4>
                    <ul class="space-y-2 text-lg text-gray-700">
                        <li><a href="{{ route('website.home', ['lang' => app()->getLocale()]) }}" class="hover:text-emerald-600">{{__('home.home')}}</a></li>
                        <li><a href="{{ route('website.about', ['lang' => app()->getLocale()]) }}" class="hover:text-emerald-600">{{__('home.about')}}</a></li>
                        <li><a href="{{ route('website.about', ['lang' => app()->getLocale()]) }}" class="hover:text-emerald-600">{{__('home.services')}}</a></li>
                        <li><a href="{{ route('website.contact', ['lang' => app()->getLocale()]) }}" class="hover:text-emerald-600">{{__('home.contact_us')}}</a></li>
                        <li><a href="{{ route('website.terms', ['lang' => app()->getLocale()]) }}" class="hover:text-emerald-600">{{__('home.terms')}}</a></li>
                        <li><a href="{{ route('website.privacy.policy', ['lang' => app()->getLocale()]) }}" class="hover:text-emerald-600">{{__('home.privacy')}}</a></li>

                    </ul>
                </div>

                <!-- {{-- Services --}}
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-3">Services</h4>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li>Lorem ipsum</li>
                        <li>quia dolor</li>
                        <li>sit porro</li>
                        <li>quisquam</li>
                        <li>est qui amet</li>
                    </ul>
                </div> -->

                {{-- Contact Us --}}
                <div class="md:col-span-4">
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">{{__('home.contact_us')}}</h4>
                    <ul class="space-y-2 text-lg text-gray-700">
                        <li class="flex items-center gap-2">
                            <i class="bi bi-telephone text-emerald-600"></i>
                            <a href="tel:3025564325">(302 556-4325)</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="bi bi-envelope text-emerald-600"></i>
                            <a href="mailto:invest@ekeropartners.com">invest@ekeropartnersempowerwealth.com</a>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="bi bi-geo-alt text-emerald-600 mt-0.5"></i>
                            <span>8 The Green STE B Dover, DE 19901</span>
                        </li>
                    </ul>
                </div>
                {{-- Logo --}}
            <div class="flex flex-col md:col-span-6 justify-end lg:justify-end">
                <img src="{{ asset('images/logo1.png') }}" alt="Ekero Partners" class="h-22 w-20  ms-auto" />
                <p class="text-right text-lg">
                    {{ __('home.description') }}
                </p>
            </div>
            </div>


           
        </div>
        {{-- Divider --}}
        <div
            class="mt-6 border-t border-gray-300 pt-4 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <p class="text-xs sm:text-sm text-gray-600">
                Copyright © {{ date('Y') }} Ekero Partners. All rights reserved
            </p>


            <div class="flex items-center gap-4 text-xl text-gray-600">
                <a href="https://www.facebook.com/ekeropartners/" class="hover:text-emerald-600"><i
                        class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/ekeropartners/" class="hover:text-emerald-600"><i
                        class="bi bi-instagram"></i></a>
                <a href="https://x.com/EkeroPartners" class="hover:text-emerald-600"><i class="bi bi-twitter-x"></i></a>
                <a href="https://www.tiktok.com/@ekero_partners" class="hover:text-emerald-600"><i
                        class="bi bi-tiktok"></i></a>
            </div>
        </div>
    </div>
</footer>