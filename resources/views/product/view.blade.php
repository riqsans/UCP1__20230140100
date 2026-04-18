<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Header --}}
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('product.index') }}"
                                class="p-1.5 rounded-md text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                            </a>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 tracking-tight">Product</h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">Viewing product
                                    #{{ $product->id }}</p>
                            </div>
                        </div>

                        {{-- Action Buttons (Menggunakan Component) --}}
                        <div class="flex items-center gap-2">
                            <x-edit-button :url="route('product.edit', $product->id)" />
                            <x-delete-button :url="route('product.delete', $product->id)" />
                        </div>
                    </div>

                    {{-- Detail Card (Table Format) --}}
                    <div class="overflow-hidden rounded-lg border border-gray-200 dark:border-gray-700">
                        <table class="w-full text-left border-collapse">
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                {{-- Name --}}
                                <tr class="bg-white dark:bg-gray-800">
                                    <th class="w-48 px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 bg-gray-50/50 dark:bg-gray-700/30">
                                        Product Name
                                    </th>
                                    <td class="px-6 py-4 text-sm font-bold text-gray-900 dark:text-gray-100">
                                        {{ $product->name }}
                                    </td>
                                </tr>

                                {{-- Quantity --}}
                                <tr class="bg-white dark:bg-gray-800">
                                    <th class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 bg-gray-50/50 dark:bg-gray-700/30">
                                        Quantity
                                    </th>
                                    <td class="px-6 py-4 text-sm">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                            {{ $product->quantity < 10 
                                                ? 'bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-300' 
                                                : 'bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-300' }}">
                                            {{ $product->quantity }} {{ $product->quantity < 10 ? 'Low Stock' : 'In Stock' }}
                                        </span>
                                    </td>
                                </tr>

                                {{-- Price --}}
                                <tr class="bg-white dark:bg-gray-800">
                                    <th class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 bg-gray-50/50 dark:bg-gray-700/30">
                                        Price
                                    </th>
                                    <td class="px-6 py-4 text-sm font-mono font-bold text-gray-900 dark:text-gray-100">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </td>
                                </tr>

                                {{-- Owner --}}
                                <tr class="bg-white dark:bg-gray-800">
                                    <th class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 bg-gray-50/50 dark:bg-gray-700/30">
                                        Owner
                                    </th>
                                    <td class="px-6 py-4 text-sm">
                                        <div class="flex items-center gap-2">
                                            <div class="h-6 w-6 rounded-full bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center text-indigo-600 dark:text-indigo-300 text-[10px] font-bold uppercase">
                                                {{ substr($product->user->name ?? '?', 0, 1) }}
                                            </div>
                                            <span class="text-gray-800 dark:text-gray-100">{{ $product->user->name ?? '-' }}</span>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Created At --}}
                                <tr class="bg-white dark:bg-gray-800">
                                    <th class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 bg-gray-50/50 dark:bg-gray-700/30">
                                        Created At
                                    </th>
                                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300 font-mono">
                                        {{ $product->created_at->format('d M Y, H:i') }}
                                    </td>
                                </tr>

                                {{-- Updated At --}}
                                <tr class="bg-white dark:bg-gray-800">
                                    <th class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 bg-gray-50/50 dark:bg-gray-700/30">
                                        Updated At
                                    </th>
                                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300 font-mono">
                                        {{ $product->updated_at->format('d M Y, H:i') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>