@if (session('success'))
    <div
        id="alert-additional-content-3"
        class="dark:bg-gray-800 dark:text-green-400 dark:border-green-800 absolute right-2 top-2 z-[99] mb-4 w-60 rounded-lg border border-green-300 bg-green-50 p-4 text-green-800 md:w-80"
        role="alert"
    >
        <div class="flex items-center">
            <svg
                class="me-2 h-4 w-4 flex-shrink-0"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 20 20"
            >
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
                />
            </svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium">Notification</h3>
        </div>
        <div class="mb-4 mt-2 text-sm">{{ session('success') }}</div>
        <div class="flex">
            <button
                type="button"
                class="dark:hover:bg-green-600 dark:border-green-600 dark:text-green-400 dark:hover:text-white dark:focus:ring-green-800 rounded-lg border border-green-800 bg-transparent px-3 py-1.5 text-center text-xs font-medium text-green-800 hover:bg-green-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-green-300"
                data-dismiss-target="#alert-additional-content-3"
                aria-label="Close"
            >
                Dismiss
            </button>
        </div>
    </div>
@endif
@if (session('failed'))
    <div
        id="alert-additional-content-2"
        class="dark:bg-gray-800 dark:text-red-400 dark:border-red-800 absolute right-2 top-2 z-[99] mb-4 w-60 rounded-lg border border-red-300 bg-red-50 p-4 text-red-800 md:w-80"
        role="alert"
    >
        <div class="flex items-center">
            <svg
                class="me-2 h-4 w-4 flex-shrink-0"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 20 20"
            >
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
                />
            </svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium">Notification</h3>
        </div>
        <div class="mb-4 mt-2 text-sm">{{ session('failed') }}</div>
        <div class="flex">
            <button
                type="button"
                class="dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800 rounded-lg border border-red-800 bg-transparent px-3 py-1.5 text-center text-xs font-medium text-red-800 hover:bg-red-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300"
                data-dismiss-target="#alert-additional-content-2"
                aria-label="Close"
            >
                Dismiss
            </button>
        </div>
    </div>
@endif
@if (session('alerts'))
    <div
        id="alert-additional-content-4"
        class="dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800 absolute right-2 top-2 z-[99] mb-4 w-60 rounded-lg border border-yellow-300 bg-yellow-50 p-4 text-yellow-800 md:w-80"
        role="alert"
    >
        <div class="flex items-center">
            <svg
                class="me-2 h-4 w-4 flex-shrink-0"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 20 20"
            >
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
                />
            </svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium">Notification</h3>
        </div>
        <div class="mb-4 mt-2 text-sm">{{ session('alerts') }}</div>
        <div class="flex">
            <button
                type="button"
                class="dark:hover:bg-yellow-300 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-gray-800 dark:focus:ring-yellow-800 rounded-lg border border-yellow-800 bg-transparent px-3 py-1.5 text-center text-xs font-medium text-yellow-800 hover:bg-yellow-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-yellow-300"
                data-dismiss-target="#alert-additional-content-4"
                aria-label="Close"
            >
                Dismiss
            </button>
        </div>
    </div>
@endif
