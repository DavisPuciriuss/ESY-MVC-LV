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
                    {{ $product?->id ? $product->name : __('Create Product') }}
                </h2>
            </div>

            <div class="flex flex-row w-1/2 grow items-center justify-end">
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if($errors->any())
                    <div class="alert alert-error">
                        <div class="flex-1">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                @endif
                <form class="flex flex-col justify-center text-center w-full p-4 gap-4"
                    action="{{ $product?->id ? route('products.update', $product->id) : route('products.store') }}">
                    @csrf
                    @method('post')
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">@lang("Product Name")</span>
                        </label>
                        <input  type="text"
                                name="name"
                                placeholder="@lang('Product name')"
                                class="input input-bordered w-full"
                                value="{{ old('name', $product?->name) }}" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">@lang("Product Count")</span>
                        </label>
                        <input  type="number"
                                name="count"
                                placeholder="@lang('Enter the number of products')"
                                class="input input-bordered w-full"
                                value="{{ old('count', $product?->count) }}" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">@lang("Product Price")</span>
                        </label>
                        <input  type="number"
                                name="price"
                                min="0"
                                step=".01"
                                placeholder="@lang('Enter a price')"
                                class="input input-bordered w-full"
                                value="{{ old('price', $product?->price) }}" />
                    </div>
                    <div class="flex flex-row gap-2">
                        <button class="btn btn-primary" type="submit">
                            {{ $product?->id ? __('Update') : __('Create') }}
                        </button>
                        <a href="{{ route('products.index') }}">
                            <button class="btn btn-neutral" type="button">@lang("Cancel")</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
