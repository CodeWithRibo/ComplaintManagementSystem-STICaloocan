<x-Layout>
    <x-AuthNavigationBar>
        <div class="min-h-screen flex items-center justify-center px-4 relative z-0 sm:z-20">
            <div class="bg-white rounded-2xl shadow-lg max-w-md w-full p-10 text-center">

                <div class="mb-6">
                    <img src="{{ asset('image/STI_LOGO_for_eLMS.png') }}" alt="Reset Password" class="mx-auto w-52 h-24 object-contain">
                </div>

                <h2 class="text-2xl font-bold text-button mb-2">Forgot Your Password?</h2>
                <p class="text-gray-600 mb-6 text-sm">Enter your registered email to receive a password reset link.</p>

                <form action="{{ route('send-reset-link-email') }}" method="POST" class="space-y-6 text-left">
                    @csrf
                    <x-FormLayout name="email" placeholder="Enter email" label="Email"/>
                    <button type="submit" class="btn btn-primary w-full text-white py-2 rounded transition">
                        Submit
                    </button>
                </form>

            </div>
        </div>
    </x-AuthNavigationBar>
</x-Layout>
