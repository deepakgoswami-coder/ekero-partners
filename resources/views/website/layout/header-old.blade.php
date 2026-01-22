 <div id="navbar" class=" fixed top-[14px] left-0 w-full z-50 bg-white shadow-md md:bg-none pb-1 px-3 md:px-0 md:pb-0">
     <div class="flex justify-between items-center md:hidden px-2">
         <a href="/" class="bg-white rounded-b-xl px-2 py-1 cursor-pointer">
             <img src="/images/logo1.png" class="w-18" alt="logo" />
         </a>

         <button id="menuToggle" class="p-2 bg-white rounded-xl text-2xl font-bold">
             ☰
         </button>
     </div>
     <div id="mobileMenu"
         class="hidden absolute top-[100px] md:top-0 left-0 w-full z-50 
              md:block">
         <div class="flex justify-between items-start md:ps-10 ">
             <a href="/" class="bg-white rounded-b-xl px-2 py-1 cursor-pointer hidden md:block" style="box-shadow: 0px 4px 14.4px 0px #00000040;">
                 <img src="/images/ekero-nn.png" class="w-16" alt="logo" />
             </a>
             <ul class="w-full md:w-fit py-4 px-4 md:rounded-bl-4xl mt-2 md:mt-0
           bg-white text-[#494849] md:text-[18px] 
           gap-2 md:gap-5 flex flex-col md:flex-row 
           items-start md:items-center"
                 style="box-shadow: 0px 4px 22.1px 0px #00000040;">

                 <li>
                     <a href="{{ route('website.home', ['lang' => app()->getLocale()]) }}" class="nav-link cursor-pointer text-2xl">{{__('home.home')}}</a>
                 </li>

                 <li>
                     <a href="{{ route('website.about', ['lang' => app()->getLocale()]) }}" class="nav-link cursor-pointer text-2xl">{{__('home.about_us')}}</a>
                 </li>

                 <li>
                     <a href="{{ route('website.entrepreneur', ['lang' => app()->getLocale()]) }}" class="nav-link cursor-pointer text-2xl">{{__('home.entrepreneur')}}</a>
                 </li>
                 <li>
                     <a href="{{ route('website.coach', ['lang' => app()->getLocale()]) }}" class="nav-link cursor-pointer text-2xl">Coach</a>
                 </li>

                 <li>
                     <a href="/login" id="login-trigger" class="nav-link cursor-pointer text-2xl bg-[#6F63DD] font-semibold text-white rounded-2xl px-2 py-1">
                         {{__('home.login')}}
                     </a>
                 </li>

                 <li>
                     <a href="{{ route('website.contact', ['lang' => app()->getLocale()]) }}" class="nav-link cursor-pointer text-2xl bg-[#39B44F] text-white font-semibold rounded-2xl px-2 py-1">
                         {{__('home.contact_us')}}
                     </a>
                 </li>

                <li class="relative group">
                    <button class="nav-link cursor-pointer text-2xl flex items-center gap-2">
                        🌐 
                        {{ 
                            [
                                'en' => 'English',
                                'ar' => 'العربية',
                                'fr' => 'Français',
                                'de' => 'Deutsch',
                                'it' => 'Italiano',
                                'ja' => '日本語',
                                'ko' => '한국어',
                                'es' => 'Español'

                            ][app()->getLocale()] 
                        }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <ul class="absolute hidden group-hover:block bg-white shadow-lg rounded-md mt-2 
                            w-32 py-2 text-sm text-[#494849] z-50">
                 
                            <!-- 1. english -->
                        <li>
                            <a href="/{{ 'en' }}" 
                            class="block px-4 py-2 hover:bg-gray-100">English</a>
                        </li>
                            <!-- 2. arabic -->
                        <li>
                            <a href="/{{ 'ar' }}" 
                            class="block px-4 py-2 hover:bg-gray-100">العربية</a>
                        </li>
                        <!-- 3. french -->
                        <li>
                            <a href="/{{ 'fr' }}"
                            class="block px-4 py-2 hover:bg-gray-100">Français</a>
                        </li>
                        <!-- 4. German -->
                        <li>
                            <a href="/{{ 'de' }}"
                            class="block px-4 py-2 hover:bg-gray-100">Deutsch</a>
                        </li>
                        <!-- 5. KOrena -->
                        <li>
                            <a href="/{{ 'ko' }}"
                            class="block px-4 py-2 hover:bg-gray-100">한국어</a>
                        </li>
                        <!-- 6. Japanese -->
                        <li>
                            <a href="/{{ 'ja' }}"
                            class="block px-4 py-2 hover:bg-gray-100">日本語</a>
                        </li>
                        <!-- 7. italian  -->
                        <li>
                            <a href="/{{ 'it' }}"
                            class="block px-4 py-2 hover:bg-gray-100">Italiano</a>
                        </li>
                        <!-- 8. spanish -->
                        <li>
                            <a href="/{{ 'es' }}"
                            class="block px-4 py-2 hover:bg-gray-100">Español</a>
                        </li>
                        

                    </ul>
                </li>




             </ul>

         </div>
     </div>

 </div>

<div id="role-modal" 
     class="hidden fixed inset-0 z-[9999] 
            bg-black/30 backdrop-blur-sm 
            flex items-center justify-center transition-all duration-300">

    <div class="bg-white p-6 rounded-xl shadow-2xl w-11/12 max-w-sm relative 
                transform transition-all duration-300 scale-100">
        
        <button class="close absolute top-2 right-4 text-gray-500 hover:text-gray-900 
                       text-3xl font-bold leading-none cursor-pointer">&times;</button>
        
        <h3 class="text-xl font-semibold mb-6 mt-2 text-gray-800">Select Your Role</h3>
        
        <a href="{{ route('user.login') }}" 
           class="role-button block py-3 mb-3 bg-gray-100 hover:bg-[#6F63DD] hover:text-white 
                  rounded-lg text-gray-700 font-medium transition-colors duration-200 text-center">
            User
        </a>

        <a href="{{ route('leader.login') }}" 
           class="role-button block py-3 mb-3 bg-gray-100 hover:bg-[#6F63DD] hover:text-white 
                  rounded-lg text-gray-700 font-medium transition-colors duration-200 text-center">
            Leader
        </a>

        <a href="{{ route('admin.login') }}" 
           class="role-button block py-3 mb-0 bg-gray-100 hover:bg-[#6F63DD] hover:text-white 
                  rounded-lg text-gray-700 font-medium transition-colors duration-200 text-center">
            Admin
        </a>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById("navbar");
        const toggleBtn = document.getElementById("menuToggle");
        const mobileMenu = document.getElementById("mobileMenu");
        
        // Modal Elements
        const loginTrigger = document.getElementById('login-trigger');
        const roleModal = document.getElementById('role-modal');
        const closeButton = roleModal.querySelector('.close');

        // --- MODAL LOGIC ---
        // 1. Open Modal when Login is clicked
        loginTrigger.addEventListener('click', (e) => {
            e.preventDefault(); // Prevents default link action
            roleModal.classList.remove('hidden'); // SHOW MODAL
        });

        // 2. Close Modal when 'x' button is clicked
        closeButton.addEventListener('click', () => {
            roleModal.classList.add('hidden'); // HIDE MODAL
        });

        // 3. Close Modal when clicking outside the modal content
        roleModal.addEventListener('click', (e) => {
            if (e.target === roleModal) {
                roleModal.classList.add('hidden'); // HIDE MODAL
            }
        });
        
        // --- NAVBAR LOGIC ---
        
        // Mobile menu toggle
        toggleBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
            // You might need to adjust the class toggles based on your CSS transitions for animation
        });

        // Scroll event to change top position
        window.addEventListener("scroll", () => {
            if (window.scrollY > 0) {
                navbar.classList.remove("top-[14px]");
                navbar.classList.add("top-0");
            } else {
                navbar.classList.remove("top-0");
                navbar.classList.add("top-[14px]");
            }
        });
    });
</script>