<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-xl overflow-hidden rounded-2xl">
            <div>
                <x-authentication-card-logo class="w-20 h-20 text-indigo-600" />
            </div>

            <div class="mb-4 text-sm text-gray-700 leading-relaxed">
                {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                </div>
            @endif

            <div class="mt-6 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <x-button class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg transition">
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </form>

                <div class="text-right">
                    <a href="{{ route('profile.show') }}" class="text-sm text-indigo-600 hover:underline mr-4">
                        {{ __('Edit Profile') }}
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-red-600 hover:underline focus:outline-none">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
