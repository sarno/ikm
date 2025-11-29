<div
    x-menu:items
    x-anchor.bottom-end.offset.3="document.getElementById($id('alpine-menu-button'))"
    class="z-10 min-w-[10rem] divide-y divide-gray-100 rounded-md border border-gray-200 bg-white py-1 shadow-lg outline-none"
    x-cloak
>
    {{ $slot }}
</div>
