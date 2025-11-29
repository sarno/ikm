<div>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-4">
            {{ $isEditing ? "Edit Product" : "Create Product" }}
        </h2>

        @if (session()->has("message"))
            <div
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                role="alert"
            >
                <span class="block sm:inline">{{ session("message") }}</span>
            </div>
        @endif

        <form
            wire:submit.prevent="{{ $isEditing ? "updateProduct" : "createProduct" }}"
            class="mb-8"
        >
            <div class="mb-4">
                <label
                    for="name"
                    class="block text-gray-700 text-sm font-bold mb-2"
                >
                    Nama :
                </label>
                <input
                    type="text"
                    id="name"
                    wire:model="name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                />
                @error("name")
                    <span class="text-red-500 text-xs italic">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label
                    for="nameAr"
                    class="block text-gray-700 text-sm font-bold mb-2"
                >
                    Nama - Arabic
                </label>
                <input
                    type="text"
                    id="nameAr"
                    wire:model="nameAr"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                />
                @error("nameAr")
                    <span class="text-red-500 text-xs italic">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label
                    for="description"
                    class="block text-gray-700 text-sm font-bold mb-2"
                >
                    Alamat:
                </label>
                <textarea
                    id="address"
                    wire:model="address"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                ></textarea>
                @error("description")
                    <span class="text-red-500 text-xs italic">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label
                    for="addressAr"
                    class="block text-gray-700 text-sm font-bold mb-2"
                >
                    Alamat:
                </label>
                <textarea
                    id="addressAr"
                    wire:model="addressAr"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                ></textarea>
                @error("description")
                    <span class="text-red-500 text-xs italic">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                >
                    {{ $isEditing ? "Update Product" : "Save Product" }}
                </button>

                @if ($isEditing)
                    <button
                        type="button"
                        wire:click="cancelEdit"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Cancel
                    </button>
                @endif
            </div>
        </form>

        <h2 class="text-2xl font-semibold mb-4">Instansi List</h2>

        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Nama</th>
                    <th class="py-2 px-4 border-b">Nama Arabic</th>
                    <th class="py-2 px-4 border-b">Alamat</th>
                    <th class="py-2 px-4 border-b">Alamat Arabic</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($instansis as $product)
                    <tr>
                        <td class="py-2 px-4 border-b">
                            {{ $product->name }}
                        </td>
                        <td class="py-2 px-4 border-b">
                            {{ $product->address }}
                        </td>
                        <td class="py-2 px-4 border-b">
                            <button
                                wire:click="editProduct({{ $product->id }})"
                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded text-xs"
                            >
                                Edit
                            </button>
                            <button
                                wire:click="deleteProduct({{ $product->id }})"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-xs"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td
                            colspan="5"
                            class="py-4 px-4 text-center text-gray-500"
                        >
                            No products found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
