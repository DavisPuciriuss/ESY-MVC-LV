<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row flex-nowrap">
            <div class="flex flex-row w-1/2 grow items-center">
                <a href="{{ route('products.index') }}">
                    <button class="btn btn-neutral" type="button">
                        @lang("Back")
                    </button>
                </a>
            </div>
            <div class="flex flex-row flex-nowrap shrink-0">
                <h2 class="font-semibold text-xl whitespace-nowrap text-center text-gray-800 leading-tight">
                    {{ $product->name }}
                </h2>
            </div>

            <div class="flex flex-row w-1/2 grow items-center justify-end">
            </div>
        </div>


    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto flex flex-col justify-center items-center sm:px-6 lg:px-8">
            <div class="card w-full bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">{{ $product->name }}</h2>
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col gap-2">
                            <p class="font-lg font-bold">@lang("Product Count: ")</p>
                            <p>{{ $product->count }}</p>
                        </div>
                        <div class="flex flex-col gap-2">
                            <p class="font-lg font-bold">@lang("Product Price: ")</p>
                            <p>{{ $product->price }}</p>
                        </div>
                    </div>
                    @role('admin')
                        <div class="card-actions justify-start gap-2 pt-2">
                            <a href="{{ route('products.edit', $product->id) }}">
                                <button class="btn btn-neutral">@lang("Edit")</button>
                            </a>
                            <a href="{{ route('products.delete', $product->id) }}">
                                <button class="btn btn-error">@lang("Delete")</button>
                            </a>
                        </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
