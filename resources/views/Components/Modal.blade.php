<!-- Modal -->
<div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen"
     x-on:keydown.esc.window="modalIsOpen = false" x-on:click.self="modalIsOpen = false"
     class="fixed inset-0 z-50 flex items-center justify-center bg-black/20 p-4 backdrop-blur-md" role="dialog"
     aria-modal="true" aria-labelledby="complaintModalTitle">

    <!-- Modal Content -->
    <div x-show="modalIsOpen"
         x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
         x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
         class="w-full max-w-6xl fixed z-50 h-full max-h-[95vh] overflow-y-auto rounded-xl bg-white shadow-lg dark:bg-gray-800">

        <!-- Header -->
        <div
            class="sticky top-0 z-10 flex items-center justify-between border-b px-6 py-4 bg-white dark:bg-gray-800 dark:border-gray-700">
            <h3 id="complaintModalTitle" class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                Complaint Details
            </h3>
            <button x-on:click="modalIsOpen = false" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     stroke-width="1.5" class="w-5 h-5 text-gray-500 hover:text-gray-700 dark:text-gray-300">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        {{$slot}}
        <!-- Footer -->
        <div class="sticky bottom-0 flex justify-end border-t px-6 py-4 bg-white dark:bg-gray-800 dark:border-gray-700">
            <button x-on:click="modalIsOpen = false" type="button"
                    class="rounded-md bg-gray-200 px-4 py-2 text-sm font-medium text-gray-800 hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                Close
            </button>
        </div>
    </div>
</div>
