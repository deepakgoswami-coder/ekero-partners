<div class="space-y-4">
    @foreach ($items as $index => $item)
        <div
            x-data="{ open: {{ $index === 0 ? 'true' : 'false' }} }"
            class="border border-gray-200 rounded-2xl bg-white shadow-sm
                   transition hover:shadow-md"
        >

            <!-- Question -->
            <button
                @click="open = !open"
                class="flex w-full items-center justify-between px-6 py-5 text-left">

                <span class="font-semibold text-gray-900 text-base sm:text-xl">
                    {{ $item['question'] }}
                </span>

                <span
                    class="flex items-center justify-center w-8 h-8 rounded-full
                           border border-gray-300 text-green-600
                           transition-transform duration-300"
                    :class="open ? 'rotate-180 bg-green-50 border-green-500' : ''">
                    <i class="bi bi-chevron-down text-sm"></i>
                </span>
            </button>

            <!-- Answer -->
            <div
                x-show="open"
                x-collapse
                class="px-6 pb-6 text-gray-600 text-sm sm:text-lg leading-relaxed"
            >
                {{ $item['answer'] }}
            </div>

        </div>
    @endforeach
</div>
