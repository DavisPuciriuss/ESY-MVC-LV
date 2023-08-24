<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Products List') }}
            </h2>
            @role('admin')
                <a href="{{ route('products.create') }}">
                    <button type="button" class="btn btn-primary">
                        @lang("Create")
                    </button>
                </a>
            @endrole
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="flex flex-col justify-center text-center">
                    @if(count($products))
                        <table class="table">
                            <thead class="text-lg font-bold">
                                <tr>
                                    <th>@lang("Actions")</th>
                                    <th>@lang("ID")</th>
                                    <th>@lang("Name")</th>
                                    <th>@lang("Count")</th>
                                    <th>@lang("Price")</th>
                                    <th>@lang("Price with Tax")</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>
                                        <div class="dropdown dropdown-hover">
                                            <label tabindex="0" class="btn m-1">@lang("Actions")</label>
                                            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                                <li><a href="{{ route('products.show', $product->id) }}">@lang("Show")</a></li>
                                                @role('admin')
                                                    <li><a href="{{ route('products.edit', $product->id) }}">@lang("Edit")</a></li>
                                                    <li><a href="{{ route('products.delete', $product->id) }}" class="text-error">@lang("Delete")</a></li>
                                                @endrole
                                            </ul>
                                        </div>
                                    </td>
                                    <td> {{ $product->id }} </td>
                                    <td> {{ $product->name }} </td>
                                    <td> {{ $product->count }} </td>
                                    <td> {{ $product->price }} </td>
                                    @isset($product->tax_price)
                                        <td> {{ $product->tax_price }} </td>
                                    @endisset
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>@lang("No products")</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
