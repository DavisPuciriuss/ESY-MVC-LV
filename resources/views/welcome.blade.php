<x-guest-layout>
    <div class="flex flex-col items-center justify-center gap-2">
        @auth
            <a href="{{ route('products.index') }}">
                <button class="btn btn-primary">
                    {{ __('View Products') }}
                </button>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="btn btn-error" type="submit">
                    {{ __('Log out') }}
                </button>
            </form>
        @else
            <h1 class="text-center font-bold">@lang("Log-in or register to view product page.")</h1>
            <a href="{{ route('login') }}">
                <button class="btn btn-primary">
                    {{ __('Log-in') }}
                </button>
            </a>
            <a href="{{ route('register') }}">
                <button class="btn btn-neutral">
                    {{ __('Register') }}
                </button>
            </a>
        @endauth
    </div>
</x-guest-layout>
