<x-Layout>
    <x-HomeNavigationBar>
        <x-Section>
            <div class="mx-auto max-w-7xl flex items-center justify-center md:justify-start pt-10">
                <h1 class="text-base-content text-3xl">Frequently Ask Question</h1>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 grid-rows-1 gap-4 gap-5 mx-auto max-w-7xl py-10">
                <div>
                <div class="flex items-center gap-x-3">
                    <i class="ph ph-clipboard-text text-xl"></i>
                    <h1 class="text-gray-500 text-xl py-5">General Question</h1>
                </div>
                    <x-Faq title="1. What is the Complaint Management System?" content="It’s a platform for students or users to submit concerns or complaints regarding school services, staff, or facilities."/>
                    <x-Faq title="2. Who can file a complaint?" content="At this time, our system is exclusively available to currently enrolled students of STI College Caloocan. Support for other users may be considered in future updates."/>
                    <x-Faq title="3. What types of issues can I report?" content="You can report issues related to facilities, faculty, admissions, registrar, and cashier."/>
                </div>

                <div>
                    <div class="flex items-center gap-x-3">
                        <i class="ph ph-files text-xl"></i>
                        <h1 class="text-gray-500 text-xl py-5">Submission Question</h1>
                    </div>
                    <x-Faq title="4. How do I file a complaint?" content="Navigate to the “Home” page, click submit complaint, and fill out the form."/>
                    <x-Faq title="5. Can I submit anonymously?" content="Yes. You may choose to hide your name, email, and student ID. Your identity will not be shown to staff."/>
                    <x-Faq title="6. Do I need to attach an image?" content="No, attaching an image is optional but may help in processing your complaint faster."/>
                    <x-Faq title="7. Can I submit multiple complaints?" content="Yes, but there is a daily limit of 3 submissions to help prevent spam and ensure fair use of the system."/>
                </div>
            </div>
            @include('Components.AuthFooter')
        </x-Section>
    </x-HomeNavigationBar>
</x-Layout>
