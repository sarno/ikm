@props([
    "payment",
])

<x-menu>
    <x-menu.button class="rounded p-1 hover:bg-gray-100">
        <x-icon.ellipsis-vertical />
    </x-menu.button>

    <x-menu.items>
        <x-menu.close>
            <x-menu.item
                wire:click="refund({{ $payment->id }})"
                wire:confirm="Are you sure you want to refund this order?"
            >
                Refund
            </x-menu.item>
        </x-menu.close>

        <x-menu.close>
            <x-menu.item
                wire:click="archive({{ $payment->id }})"
                wire:confirm="Are you sure you want to archive this order?"
            >
                Archive
            </x-menu.item>
        </x-menu.close>
    </x-menu.items>
</x-menu>
