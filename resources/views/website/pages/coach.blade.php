@extends('website.layout.main')

@section('title', 'Contact - Ekero Partners')

@section('content')

<style>
    html {
        scroll-behavior: smooth;
    }
     @keyframes scale-in {
    from {
        transform: scale(0.9);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

.animate-scale-in {
    animation: scale-in 0.3s ease-out;
}

</style>

<!-- Hero Section -->
<section class="Coach-bg relative bg-cover bg-center text-white sm:text-inherit">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">
        <div class="grid gap-12 items-center lg:grid-cols-2 mt-14 sm:mt-20">

            <!-- LEFT -->
            <div class="space-y-6 lg:space-y-8 text-center lg:text-left">

                <p class="font-semibold leading-tight
                          text-3xl sm:text-4xl lg:text-7xl
                          text-white lg:text-[#23A148]">

                    <span class="block text-white growtext">
                        {{ __('coach.title') }}
                    </span>

                    <span class="block mt-2 text-white">
                        {{ __('coach.title_sub') }}
                    </span>
                </p>

                <!-- CTA -->
                <div class="flex justify-center lg:justify-start">
                    <a href="#coachform"
                       class="inline-flex items-center justify-center
                              rounded-full bg-[#39B44F]
                              px-6 py-3 sm:px-7 sm:py-3.5
                              text-base sm:text-lg text-white
                              shadow-md hover:bg-emerald-700 transition">
                        {{ __('coach.apply_coach_btn') }}
                    </a>
                </div>
            </div>

            <!-- RIGHT (empty / future content safe) -->
            <div class="hidden lg:flex justify-end">
                <!-- Reserved for future content -->
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
                text-white lg:text-gray-700
                sm:absolute sm:bottom-6 sm:right-6
                lg:bottom-10 lg:right-10">
        <p class="text-sm sm:text-base lg:text-lg">
            {{ __('coach.base_heading') }}<br class="hidden sm:block" />
            {{ __('coach.base_heading_1') }}
        </p>
    </div>

</section>

<!-- Coach ABout -->
<section class="bg-[#faf6ef] py-10 sm:py-14 mt-10" style="background: linear-gradient(270deg, #FCFFFD 0%, #EDFFF0 100%);">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <!-- 1 col on mobile, 2 col on md, 3 col on lg -->
    <div class="grid items-center gap-10 md:grid-cols-2 lg:grid-cols-3">
      <!-- Left: Title -->
      <div class="text-center md:text-left">
        <h2
          class="font-serif text-3xl leading-tight text-[#111]
                 sm:text-4xl md:text-5xl lg:text-[4rem]"
        >
          {{__('coach.role_head_1')}} <br />
          {{__('coach.role_head_2')}}<br />
          {{__('coach.role_head_3')}}
        </h2>
      </div>

      <!-- Middle: Image -->
      <div class="flex justify-center lg:justify-center">
        <div class="w-full max-w-xs sm:max-w-sm md:max-w-md overflow-hidden">
          <img
            src="{{ asset('images/coachrole.jpg') }}"
            alt="Coach role"
            class="w-full h-64 sm:h-72 md:h-80 lg:h-[360px] object-contain"
          />
        </div>
      </div>

      <!-- Right: Content -->
      <div class="text-center md:text-left lg:col-auto md:col-span-2 lg:col-span-1">
        <p class="text-sm sm:text-base leading-6 text-neutral-700">
          {{__('coach.role_des_1')}} 
        </p>

        <p class="mt-4 text-sm sm:text-base leading-6 text-neutral-700">
          {{__('coach.role_des_2')}} 
        </p>

        <a
          href="https://ekeropartnersempowerwealth.com/en/contact"
          class="mt-6 inline-flex items-center justify-center rounded-full
                  bg-[#23A148] px-6 sm:px-8 py-2.5 text-sm sm:text-base
                  font-semibold text-white shadow-md hover:bg-emerald-700 transition"
        >
          {{__('coach.contact_btn')}}  <span aria-hidden="true ms-3">→</span>
        </a>
      </div>
    </div>
  </div>
</section>


<!-- Coach Apply form -->
 <section class="bg-white py-12" id="coachform">
  <div class="mx-auto px-4 sm:px-6 lg:px-24">
    <div class="grid items-start gap-10 lg:grid-cols-2">
      <!-- LEFT: text + image -->
      <div class="text-center lg:text-left">
        <h2 class="font-serif text-4xl sm:text-5xl text-[#111] leading-tight">
          {{__('coach.team_head')}} 
        </h2>
        <p class="mt-3 text-sm sm:text-base text-neutral-700 leading-6">
          {{__('coach.team_des')}} 
        </p>

        <div class="mt-6 overflow-hidden rounded-2xl bg-white shadow">
          <img
            src="{{ asset('images/jointeam.webp') }}"
            alt="Join our team"
            class="w-full h-64 sm:h-72 md:h-80 object-cover"
          />
        </div>
      </div>

      <!-- RIGHT: form -->
    <div class=" bg-white p-6 sm:p-8 ">
        <!--start --- here is the susscess mssg  -->
   @if(session('success'))
        <div id="successModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">

            <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6 text-center animate-scale-in">
                
                <div class="flex justify-center mb-4">
                    <div class="h-14 w-14 rounded-full bg-green-100 flex items-center justify-center">
                        <span class="text-2xl">✅</span>
                    </div>
                </div>

                <h2 class="text-xl font-semibold text-gray-800 mb-2">
                    Application Submitted
                </h2>

                <p class="text-gray-600 text-sm mb-6">
                    {{ session('success') }}
                </p>

                <button onclick="closeModal()"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md transition">
                    OK
                </button>
            </div>
        </div>

        <script>
            function closeModal() {
                const modal = document.getElementById('successModal');
                modal.classList.add('opacity-0');
                setTimeout(() => modal.remove(), 500);
            }

            // auto close after 5 sec
            setTimeout(closeModal, 5000);
        </script>
        @endif


        <!--end --- here is the susscess mssg  -->
        <h3 class="text-xl font-semibold text-neutral-900">{{__('coach.form_head')}} </h3>
        <p class="mt-1 text-sm text-neutral-600">{{__('coach.form_head_sub')}}</p>

        <form action="{{route('website.coach.application')}}" id="coachForm" method="POST" enctype="multipart/form-data" class="mt-6 space-y-5">
            @csrf
          <!-- Name -->
          <div>
            <label class="block text-sm font-medium text-neutral-800">{{__('coach.form_name')}}</label>
            <input
              type="text"
              name="name"
              required
              placeholder="Enter your name"
              class="mt-2 w-full rounded-lg border border-neutral-200 px-3 py-2 text-sm
                     outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200"
            />
          </div>

          <!-- Email + Mobile -->
        <div class="grid gap-4 sm:grid-cols-2">
            <div>
              <label class="block text-sm font-medium text-neutral-800">{{__('coach.form_email')}}</label>
              <input
                type="email"
                name="email"
                required
                placeholder="Enter your email"
                class="mt-2 w-full rounded-lg border border-neutral-200 px-3 py-2 text-sm
                       outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200"
              />
            </div>

            

            <div>
                <label class="mt-2 block text-sm font-medium text-neutral-800">
                    {{ __('coach.form_mobile') }}
                </label>

                <input
                    type="tel"
                    id="phone"
                    class="mt-2 w-full rounded-lg border border-neutral-200 px-3 py-2 text-sm
                        outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200"
                />

                <!-- Hidden input to submit full number -->
                <input type="hidden" name="mobile" id="full_phone">
            </div>

        </div>

          <!-- CV -->
          <div>
            <label class="block text-sm font-medium text-neutral-800">{{__('coach.form_cv')}}</label>
            <input
              type="file"
              name="cv"
              required
              accept=".pdf,.doc,.docx"
              class="mt-2 block w-full rounded-full
                  bg-[#23A148] px-6 sm:px-8 py-2.5 text-sm sm:text-base
                  font-semibold text-white shadow-md hover:bg-emerald-700 transition"
            />
          </div>

          <!-- Message -->
          <div>
            <label class="block text-sm font-medium text-neutral-800">{{__('coach.form_about')}}</label>
            <textarea
              name="message"
              rows="5"
              placeholder="Tell us about you to be fit for this role..."
              class="mt-2 w-full rounded-lg border border-neutral-200 px-3 py-2 text-sm
                     outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200"
            ></textarea>
          </div>

          <!-- Submit -->
          <button
            type="submit"
            class="inline-flex items-center justify-center rounded-full
                  bg-[#23A148] px-6 sm:px-8 py-2.5 text-sm sm:text-base
                  font-semibold text-white shadow-md hover:bg-emerald-700 transition me-3"
          >
           {{__('coach.form_submit')}} <span aria-hidden="true">→</span>
          </button>
        </form>
      </div>
    </div>
  </div>
</section>



<!-- Responsibilities & expectations -->
<section class=" py-12">
  <div class="mx-auto px-4 sm:px-6 lg:px-24">
    <div class="relative overflow-hidden rounded-3xl bg-white shadow">
      <!-- Decorative gradient blob -->
      <div
        class="pointer-events-none absolute -left-20 -top-20 h-64 w-64 rounded-full bg-[#9e96ee]/20 blur-3xl"
      ></div>
      <div
        class="pointer-events-none absolute -right-24 -bottom-24 h-72 w-72 rounded-full bg-[#9e96ee]/20 blur-3xl"
      ></div>

      <div class="relative grid gap-8 p-6 sm:p-10 lg:grid-cols-3 lg:items-start">
        <!-- Left intro -->
        <div class="lg:col-span-1">
          <span
              class="inline-flex items-center rounded-full border border-orange-200 bg-orange-50 px-3 py-1 text-xs font-semibold text-orange-700">
              {{ __('coach.role_badge') }}
          </span>

            <h3 class="mt-4 font-serif text-2xl sm:text-3xl text-neutral-900 leading-tight">
                {{ __('coach.responsibilities_title') }}
            </h3>

            <p class="mt-3 text-sm sm:text-base leading-6 text-neutral-600">
                {{ __('coach.responsibilities_description') }}
            </p>

            <div class="mt-6 hidden lg:block">
                <div class="rounded-2xl border border-neutral-200 bg-white/60 p-4">
                    <p class="text-xs font-semibold text-neutral-900">
                        {{ __('coach.success_title') }}
                    </p>
                    <p class="mt-2 text-sm text-neutral-600">
                        {{ __('coach.success_description') }}
                    </p>
                </div>
            </div>
        </div>


        <!-- Right list (cards) -->
        <div class="lg:col-span-2">
          <div class="grid gap-4 sm:grid-cols-2">

            <!-- Item 1 -->
            <div class="group rounded-2xl border border-neutral-200 bg-white p-5 transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-start gap-3">
                    <span class="grid h-10 w-16 place-items-center rounded-xl bg-[#39ad4d] text-white">
                        <!-- user icon -->
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21a8 8 0 0 0-16 0" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                    </span>
                    <div>
                        <p class="text-sm font-semibold text-neutral-900">
                            {{ __('coach.resp_1_title') }}
                        </p>
                        <p class="mt-1 text-sm leading-6 text-neutral-600">
                            {{ __('coach.resp_1_desc') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="group rounded-2xl border border-neutral-200 bg-white p-5 transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-start gap-3">
                    <span class="grid h-10 w-16 place-items-center rounded-xl bg-[#39ad4d] text-white">
                        <!-- calendar icon -->
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M8 2v3M16 2v3M3 9h18M5 5h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2z"/>
                        </svg>
                    </span>
                    <div>
                        <p class="text-sm font-semibold text-neutral-900">
                            {{ __('coach.resp_2_title') }}
                        </p>
                        <p class="mt-1 text-sm leading-6 text-neutral-600">
                            {{ __('coach.resp_2_desc') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="group rounded-2xl border border-neutral-200 bg-white p-5 transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-start gap-3">
                    <span class="grid h-10 w-16 place-items-center rounded-xl bg-[#39ad4d] text-white">
                        <!-- target icon -->
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="9" />
                            <circle cx="12" cy="12" r="5" />
                            <path d="M12 12l4-4" />
                        </svg>
                    </span>
                    <div>
                        <p class="text-sm font-semibold text-neutral-900">
                            {{ __('coach.resp_3_title') }}
                        </p>
                        <p class="mt-1 text-sm leading-6 text-neutral-600">
                            {{ __('coach.resp_3_desc') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="group rounded-2xl border border-neutral-200 bg-white p-5 transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-start gap-3">
                    <span class="grid h-10 w-16 place-items-center rounded-xl bg-[#39ad4d] text-white">
                        <!-- layers icon -->
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2l9 5-9 5-9-5 9-5z" />
                            <path d="M3 12l9 5 9-5" />
                            <path d="M3 17l9 5 9-5" />
                        </svg>
                    </span>
                    <div>
                        <p class="text-sm font-semibold text-neutral-900">
                            {{ __('coach.resp_4_title') }}
                        </p>
                        <p class="mt-1 text-sm leading-6 text-neutral-600">
                            {{ __('coach.resp_4_desc') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="group sm:col-span-2 rounded-2xl border border-neutral-200 bg-white p-5 transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-start gap-3">
                    <span class="grid h-10 w-16 place-items-center rounded-xl bg-[#39ad4d] text-white">
                        <!-- chat icon -->
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z" />
                        </svg>
                    </span>
                    <div>
                        <p class="text-sm font-semibold text-neutral-900">
                            {{ __('coach.resp_5_title') }}
                        </p>
                        <p class="mt-1 text-sm leading-6 text-neutral-600">
                            {{ __('coach.resp_5_desc') }}
                        </p>
                    </div>
                </div>
            </div>

        </div>


          <!-- Mobile success box -->
          <div class="mt-6 lg:hidden">
            <div class="rounded-2xl border border-neutral-200 bg-white/60 p-4">
              <p class="text-xs font-semibold text-neutral-900">{{ __('coach.success_title') }}</p>
              <p class="mt-2 text-sm text-neutral-600">
                {{ __('coach.success_description') }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Time commitment  -->
<section class="bg-[#faf6ef] py-12 my-10" style="background: linear-gradient(270deg, #FCFFFD 0%, #EDFFF0 100%);">
  <div class="mx-auto px-4 sm:px-6 lg:px-24">
    <!-- Top: Image header card -->
    <div class="relative overflow-hidden rounded-3xl bg-white shadow">

      <div class="grid gap-6 p-6 sm:p-10 lg:grid-cols-2 lg:items-center">

          <div>
              <span
                  class="inline-flex items-center rounded-full bg-orange-50 px-3 py-1 text-xs font-semibold text-orange-700 ring-1 ring-orange-200">
                  {{ __('coach.standards_badge') }}
              </span>

              <h3 class="mt-4 font-serif text-2xl sm:text-3xl text-neutral-900 leading-tight">
                  {{ __('coach.standards_title') }}
              </h3>

              <p class="mt-2 text-sm sm:text-base text-neutral-600 leading-6">
                  {{ __('coach.standards_description') }}
              </p>

              <div class="mt-5 flex flex-wrap gap-2">
                  <span class="rounded-full bg-neutral-100 px-3 py-1 text-xs font-medium text-neutral-700">
                      {{ __('coach.standard_tag_1') }}
                  </span>
                  <span class="rounded-full bg-neutral-100 px-3 py-1 text-xs font-medium text-neutral-700">
                      {{ __('coach.standard_tag_2') }}
                  </span>
                  <span class="rounded-full bg-neutral-100 px-3 py-1 text-xs font-medium text-neutral-700">
                      {{ __('coach.standard_tag_3') }}
                  </span>
                  <span class="rounded-full bg-neutral-100 px-3 py-1 text-xs font-medium text-neutral-700">
                      {{ __('coach.standard_tag_4') }}
                  </span>
                  <span class="rounded-full bg-neutral-100 px-3 py-1 text-xs font-medium text-neutral-700">
                      {{ __('coach.standard_tag_5') }}
                  </span>
              </div>
          </div>

          <div class="relative">
              <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-[#39ad4d]/20 blur-2xl"></div>

              <div>
                  <img
                      src="{{ asset('images/time.webp') }}"
                      alt="{{ __('coach.standards_image_alt') }}"
                      class="h-64 w-full object-cover sm:h-72"
                  />
              </div>
          </div>

      </div>


    </div>

    <!-- Bottom: Rule cards -->
   <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

        <!-- 1 -->
        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-neutral-200 hover:shadow transition">
            <div class="flex items-start gap-3">
                <div class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-[#39ad4d] text-white">
                    1
                </div>
                <div>
                    <p class="text-sm font-semibold text-neutral-900">
                        {{ __('coach.rule_1_title') }}
                    </p>
                    <p class="mt-1 text-sm leading-6 text-neutral-600">
                        {{ __('coach.rule_1_desc') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- 2 -->
        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-neutral-200 hover:shadow transition">
            <div class="flex items-start gap-3">
                <div class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-[#39ad4d] text-white">
                    2
                </div>
                <div>
                    <p class="text-sm font-semibold text-neutral-900">
                        {{ __('coach.rule_2_title') }}
                    </p>
                    <p class="mt-1 text-sm leading-6 text-neutral-600">
                        {{ __('coach.rule_2_desc') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- 3 -->
        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-neutral-200 hover:shadow transition">
            <div class="flex items-start gap-3">
                <div class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-[#39ad4d] text-white">
                    3
                </div>
                <div>
                    <p class="text-sm font-semibold text-neutral-900">
                        {{ __('coach.rule_3_title') }}
                    </p>
                    <p class="mt-1 text-sm leading-6 text-neutral-600">
                        {{ __('coach.rule_3_desc') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- 4 -->
        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-neutral-200 hover:shadow transition">
            <div class="flex items-start gap-3">
                <div class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-[#39ad4d] text-white">
                    4
                </div>
                <div>
                    <p class="text-sm font-semibold text-neutral-900">
                        {{ __('coach.rule_4_title') }}
                    </p>
                    <p class="mt-1 text-sm leading-6 text-neutral-600">
                        {{ __('coach.rule_4_desc') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- 5 -->
        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-neutral-200 hover:shadow transition sm:col-span-2 lg:col-span-2">
            <div class="flex items-start gap-3">
                <div class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-[#39ad4d] text-white">
                    5
                </div>
                <div>
                    <p class="text-sm font-semibold text-neutral-900">
                        {{ __('coach.rule_5_title') }}
                    </p>
                    <p class="mt-1 text-sm leading-6 text-neutral-600">
                        {{ __('coach.rule_5_desc') }}
                    </p>
                </div>
            </div>
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
                'question' => __('coach.faq_q1_question'),
                'answer'   => __('coach.faq_q1_answer'),
            ],
            [
                'question' => __('coach.faq_q2_question'),
                'answer'   => __('coach.faq_q2_answer'),
            ],
            [
                'question' => __('coach.faq_q3_question'),
                'answer'   => __('coach.faq_q3_answer'),
            ],
            [
                'question' => __('coach.faq_q4_question'),
                'answer'   => __('coach.faq_q4_answer'),
            ],
            [
                'question' => __('coach.faq_q5_question'),
                'answer'   => __('coach.faq_q5_answer'),
            ],
            [
                'question' => __('coach.faq_q6_question'),
                'answer'   => __('coach.faq_q6_answer'),
            ],
            [
                'question' => __('coach.faq_q7_question'),
                'answer'   => __('coach.faq_q7_answer'),
            ],
            
        ];
    @endphp

    <x-accordion :items="$faqs" />

</div>

<!-- change not required here for multi  -->
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

<script>
    const input = document.querySelector("#phone");
    const hiddenInput = document.querySelector("#full_phone");
    const form = document.querySelector("#coachForm");

    const iti = window.intlTelInput(input, {
        initialCountry: "auto",
        preferredCountries: [ "us","gb", "ae" , "in" ],
        separateDialCode: true,
        utilsScript:
          "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.2.1/js/utils.js",
        geoIpLookup: function (callback) {
            fetch("https://ipapi.co/json")
                .then(res => res.json())
                .then(data => callback(data.country_code.toLowerCase()))
                .catch(() => callback("in"));
        }
    });

    // ✅ ALWAYS set value before submit
    form.addEventListener("submit", function (e) {
        if (iti.isValidNumber()) {
            hiddenInput.value = iti.getNumber(); // +91XXXXXXXXXX
        } else {
            hiddenInput.value = "";
            alert("Please enter a valid mobile number");
            e.preventDefault(); // stop form submit
        }
    });
</script>


@endpush
@endsection