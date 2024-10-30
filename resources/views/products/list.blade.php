<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Products') }}
            </h2>
            <a href="{{ route('products.create') }}" class="bg-slate-700 text-sm rounded-md px-5 py-3 text-white">Create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-message />

            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium text-gray-500">#</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-500">Name</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-500">Quantity</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-500">Price</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-500">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if ($products->isNotEmpty())
                        @foreach ($products as $product)
                        <tr>
                            <td class="px-6 py-4">{{ $product->id }}</td>
                            <td class="px-6 py-4">{{ $product->name }}</td>
                            <td class="px-6 py-4">{{ $product->quantity }}</td>
                            <td class="px-6 py-4">{{ $product->price }}</td>

                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <!-- Edit Button -->

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No products found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <!-- Pagination links -->
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
