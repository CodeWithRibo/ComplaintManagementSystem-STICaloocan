<x-layout>
    <x-NavigationBar class="">
        <div class="carousel w-full relative h-[700px] overflow-hidden" x-data="{ slide: 1 }" x-init="setInterval(() => slide = slide === 3 ? 1 : slide + 1, 5000)">
            <div class="relative flex transition-transform duration-500 ease-in-out" :class="{
        '-translate-x-0': slide === 1,
        '-translate-x-full': slide === 2,
        '-translate-x-[200%]': slide === 3
    }">
                <div class="carousel-item w-full flex-shrink-0 bg-cover">
                    <img src="{{asset('image/banner_1.jpg')}}" class="w-full" alt="STI PROPERTY" />
                </div>
                <div class="carousel-item w-full flex-shrink-0">
                    <img src="{{asset('image/banner_2.jpg')}}" class="w-full" alt="STI PROPERTY"/>
                </div>
                <div class="carousel-item w-full flex-shrink-0">
                    <img src="{{asset('image/banner_3.jpg')}}" class="w-full" alt="STI PROPERTY" />
                </div>
            </div>
            <!-- Buttons -->
            <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                <button class="btn btn-circle" @click="slide = slide === 1 ? 3 : slide - 1">❮</button>
                <button class="btn btn-circle" @click="slide = slide === 3 ? 1 : slide + 1">❯</button>
            </div>
        </div>
        <section class="relative z-20 mt-24 bg-white p-0 xl:p-10 ">
            <div class="grid lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 grid-rows-1 justify-center items-center  gap-y-5  sm:gap-5 ">
                <div class="lg:pl-28 xl:p-0">
                    <x-card attribute="{{asset('image/submit_complaint.png')}}" title="Easily file your concern">
                       Student can submit their complaints anytime with just a few clicks-quick, simple, and secure.
                    </x-card>
                </div>
                <div class="lg:pl-10 xl:p-0">
                    <x-card attribute="{{asset('image/view_complaint.png')}}" title="Track your complaint">
                        Check the progress of your complaint to see if it's been received, reviewed, or resolved
                    </x-card>
                </div>
                <div class="lg:pl-28 xl:p-0">
                    <x-card attribute="{{asset('image/student_support.png')}}" title="Get the help you need">
                        Our support team is ready to assist you and ensure your voice is heard and addressed properly
                    </x-card>
                </div>
                <div class="xl:col-start-2 2xl:col-start-auto lg:pl-10 xl:p-0">
                    <x-card attribute="{{asset('image/report_feedback.png')}}" title="See improvements made ">
                        View summarized reports and how your feedback is helping make the school better
                    </x-card>
                </div>
            </div>
        </section>
{{--About--}}
        <section class="bg-[#0C3057] relative z-50">
            <div class="mx-auto max-w-7xl flex justify-center items-center flex-row gap-10">
                <div class="flex-1 p-5 ">
                    <img src="{{asset('image/testing.png')}}" class="w-full rounded-xl" alt="STI PROPERTY">
                </div>
                <div class="flex-none w-1/2 ">
                    <p class="text-[19px] text-white">
                        For more than 4 years, STI's blended learning approach using eLearning Management System (eLMS) makes education effective and accessible anytime, anywhere.
                    </p>
                    <button class="btn border bg-transparent hover:text-gray-300 hover:border-gray-300 transition-all duration-300 border-white rounded-full text-white mt-14 ">Learn more</button>
                </div>
            </div>
        </section>
    </x-NavigationBar>
</x-layout>

