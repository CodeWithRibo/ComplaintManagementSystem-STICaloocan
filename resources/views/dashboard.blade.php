<x-layout>
    <x-NavigationBar class="">
        <div class="carousel w-full relative h-[700px] overflow-hidden" x-data="{ slide: 1 }" x-init="setInterval(() => slide = slide === 3 ? 1 : slide + 1, 5000)">
            <div class="relative flex transition-transform duration-500 ease-in-out" :class="{
        '-translate-x-0': slide === 1,
        '-translate-x-full': slide === 2,
        '-translate-x-[200%]': slide === 3
    }">
                <div class="carousel-item w-full flex-shrink-0">
                    <img src="{{asset('banner_1.jpg')}}" class="w-full" alt="Testing" />
                </div>
                <div class="carousel-item w-full flex-shrink-0">
                    <img src="{{asset('banner_2.jpg')}}" class="w-full" />
                </div>
                <div class="carousel-item w-full flex-shrink-0">
                    <img src="{{asset('banner_3.jpg')}}" class="w-full" />
                </div>
            </div>
            <!-- Buttons -->
            <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                <button class="btn btn-circle" @click="slide = slide === 1 ? 3 : slide - 1">❮</button>
                <button class="btn btn-circle" @click="slide = slide === 3 ? 1 : slide + 1">❯</button>
            </div>
        </div>
        <section class="relative z-20 -mt-24 bg-white p-10">
            <h1 class="text-3xl font-bold text-center">Welcome to the Next Section!</h1>
        </section>

    </x-NavigationBar>
</x-layout>
