<script>
    import { inertia, page } from "@inertiajs/inertia-svelte";
    export let showSidebar;
</script>

<aside class="w-64 md:w-48 lg:w-64  h-screen bg-white hidden md:block">
    <div class="flex items-center justify-center mt-10">
        <img
            class="h-6"
            src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg"
            alt="top sidebar"
        />
    </div>

    <nav class="mt-10">
        <button
            class="flex items-center py-2 w-full px-8 border-r-4 border-white
            {$page.url.endsWith('/dashboard')
                ? 'bg-gray-200 border-blue-500 text-gray-700'
                : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500'}"
            use:inertia={{
                method: "get",
                href: "/api/dashboard",
            }}
        >
            <svg
                class="h-5 w-5"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>

            <span class="mx-4 font-medium tracking-widest">DASHBOARD</span>
        </button>

        <!-- class="flex items-center mt-5 py-2 w-full px-8 text-gray-600 border-r-4 border-white hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500" -->
        <p
            class="flex items-center mt-5 py-2 w-full px-8
            {$page.url.includes('/files')
                ? 'bg-gray-200 text-gray-700'
                : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700'}"
        >
            <svg
                class="h-5 w-5 stroke-current"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                fill="none"
            >
                <path
                    d="M7.93517 13.7796L15.1617 6.55304C16.0392 5.67631 17.4657 5.67631 18.3432 6.55304C19.2206 7.43052 19.2206 8.85774 18.3432 9.73522L8.40091 19.5477C6.9362 21.0124 4.56325 21.0124 3.09854 19.5477C1.63382 18.0837 1.63382 15.7093 3.09854 14.2453L12.9335 4.53784C14.984 2.48739 18.3094 2.48739 20.3569 4.53784C22.4088 6.58904 22.4088 9.91146 20.3584 11.9619L13.239 19.082"
                />
            </svg>
            <span class="mx-4 font-medium tracking-widest">FILES</span>
        </p>
        <ul class="text-right">
            <li
                class="py-2 pr-12  border-r-4 border-white 
                {$page.url.endsWith('/files')
                    ? 'bg-gray-200 text-gray-700 border-blue-500'
                    : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500'}"
            >
                <buttton
                    type="button"
                    class="cursor-pointer"
                    use:inertia={{
                        method: "get",
                        href: "/api/files",
                    }}
                >
                    View All</buttton
                >
            </li>
            <li
                class="py-2 pr-12  border-r-4 border-white 
                {$page.url.endsWith('/files/create')
                    ? 'bg-gray-200 text-gray-700 border-blue-500'
                    : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500'}"
            >
                <button
                    type="button"
                    use:inertia={{
                        method: "get",
                        href: "/api/files/create",
                    }}
                >
                    Add New</button
                >
            </li>
        </ul>

        <p
            class="flex items-center mt-5 py-2 px-8 w-full  
            {$page.url.includes('/file-owners')
                ? 'bg-gray-200 text-gray-700'
                : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700'}"
            href="/"
        >
            <svg
                class="h-5 w-5 stroke-current"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <circle cx="14" cy="6" r="1" />
                <path d="M12 18V14L9 12L12 9L14 11L16 12" />
                <circle cx="6" cy="17" r="3" /> <circle cx="18" cy="17" r="3" />
            </svg>

            <span class="mx-4 font-medium tracking-widest">FILE OWNERS</span>
        </p>
        <ul class="text-right">
            <li
                class="py-2 pr-12  border-r-4 border-white 
                {$page.url.endsWith('/file-owners')
                    ? 'bg-gray-200 text-gray-700 border-blue-500'
                    : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500'}"
            >
                <button
                    use:inertia={{
                        method: "get",
                        href: "/api/file-owners",
                    }}>View All</button
                >
            </li>
            <li
                class="py-2 pr-12  border-r-4 border-white 
                {$page.url.endsWith('/file-owners/create')
                    ? 'bg-gray-200 text-gray-700 border-blue-500'
                    : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500'}"
            >
                <button
                    type="button"
                    use:inertia={{
                        method: "get",
                        href: "/api/file-owners/create",
                    }}>Add New</button
                >
            </li>
        </ul>

        <p
            class="flex items-center mt-5 py-2 px-8 w-full
            {$page.url.includes('/staffs')
                ? 'bg-gray-200 text-gray-700'
                : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700'}"
            href="/"
        >
            <svg
                class="h-5 w-5 stroke-current"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                fill="none"
                ><path
                    stroke-linecap="round"
                    d="M5.5,19.5 C7.83333333,18.5 9.33333333,17.6666667 10,17 C11,16 8,16 8,11 C8,7.66666667 9.33333333,6 12,6 C14.6666667,6 16,7.66666667 16,11 C16,16 13,16 14,17 C14.6666667,17.6666667 16.1666667,18.5 18.5,19.5"
                /> <circle cx="12" cy="12" r="10" />
            </svg>

            <span class="mx-4 font-medium tracking-widest">STAFFS</span>
        </p>
        <ul class="text-right">
            <li
                class="py-2 pr-12  border-r-4 border-white 
                {$page.url.endsWith('/staffs')
                    ? 'bg-gray-200 text-gray-700 border-blue-500'
                    : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500'}"
            >
                <button
                    use:inertia={{
                        method: "get",
                        href: "/api/staffs",
                    }}>View All</button
                >
            </li>
            <li
                class="py-2 pr-12  border-r-4 border-white 
                {$page.url.endsWith('/staffs/create')
                    ? 'bg-gray-200 text-gray-700 border-blue-500'
                    : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500'}"
            >
                <button
                    type="button"
                    use:inertia={{
                        method: "get",
                        href: "/api/staffs/create",
                    }}
                >
                    Add New</button
                >
            </li>
        </ul>
    </nav>

    <div class="absolute bottom-0 my-10">
        <a
            class="flex items-center py-2 px-8 text-gray-500 hover:text-gray-600"
            href="https://github.com/ibishek/file-manager"
            target="_blank"
        >
            <svg
                class="h-5 w-5"
                viewBox="0 0 20 20"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M18 10C18 14.4183 14.4183 18 10 18C5.58172 18 2 14.4183 2 10C2 5.58172 5.58172 2 10 2C14.4183 2 18 5.58172 18 10ZM10 7C9.63113 7 9.3076 7.19922 9.13318 7.50073C8.85664 7.97879 8.24491 8.14215 7.76685 7.86561C7.28879 7.58906 7.12543 6.97733 7.40197 6.49927C7.91918 5.60518 8.88833 5 10 5C11.6569 5 13 6.34315 13 8C13 9.30622 12.1652 10.4175 11 10.8293V11C11 11.5523 10.5523 12 10 12C9.44773 12 9.00001 11.5523 9.00001 11V10C9.00001 9.44772 9.44773 9 10 9C10.5523 9 11 8.55228 11 8C11 7.44772 10.5523 7 10 7ZM10 15C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15Z"
                    fill="currentColor"
                />
            </svg>

            <span class="mx-4 font-medium">Github Repo</span>
        </a>
    </div>
</aside>

{#if showSidebar}
    <aside class="w-64 md:w-48 lg:w-64  h-screen bg-white md:hidden">
        <div class="flex items-center justify-center mt-10">
            <img
                class="h-6"
                src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg"
                alt="top sidebar"
            />
        </div>

        <nav class="mt-10">
            <button
                class="flex items-center py-2 w-full px-8 border-r-4 border-white
            {$page.url.endsWith('/dashboard')
                    ? 'bg-gray-200 border-blue-500 text-gray-700'
                    : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500'}"
                use:inertia={{
                    method: "get",
                    href: "/api/dashboard",
                }}
            >
                <svg
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>

                <span class="mx-4 font-medium tracking-widest">DASHBOARD</span>
            </button>

            <!-- class="flex items-center mt-5 py-2 w-full px-8 text-gray-600 border-r-4 border-white hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500" -->
            <p
                class="flex items-center mt-5 py-2 w-full px-8
            {$page.url.includes('/files')
                    ? 'bg-gray-200 text-gray-700'
                    : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700'}"
            >
                <svg
                    class="h-5 w-5 stroke-current"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    fill="none"
                >
                    <path
                        d="M7.93517 13.7796L15.1617 6.55304C16.0392 5.67631 17.4657 5.67631 18.3432 6.55304C19.2206 7.43052 19.2206 8.85774 18.3432 9.73522L8.40091 19.5477C6.9362 21.0124 4.56325 21.0124 3.09854 19.5477C1.63382 18.0837 1.63382 15.7093 3.09854 14.2453L12.9335 4.53784C14.984 2.48739 18.3094 2.48739 20.3569 4.53784C22.4088 6.58904 22.4088 9.91146 20.3584 11.9619L13.239 19.082"
                    />
                </svg>
                <span class="mx-4 font-medium tracking-widest">FILES</span>
            </p>
            <ul class="text-right">
                <li
                    class="py-2 pr-12  border-r-4 border-white 
                {$page.url.endsWith('/files')
                        ? 'bg-gray-200 text-gray-700 border-blue-500'
                        : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500'}"
                >
                    <buttton
                        type="button"
                        class="cursor-pointer"
                        use:inertia={{
                            method: "get",
                            href: "/api/files",
                        }}
                    >
                        View All</buttton
                    >
                </li>
                <li
                    class="py-2 pr-12  border-r-4 border-white 
                {$page.url.endsWith('/files/create')
                        ? 'bg-gray-200 text-gray-700 border-blue-500'
                        : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500'}"
                >
                    <button
                        type="button"
                        use:inertia={{
                            method: "get",
                            href: "/api/files/create",
                        }}
                    >
                        Add New</button
                    >
                </li>
            </ul>

            <p
                class="flex items-center mt-5 py-2 px-8 w-full  
            {$page.url.includes('/file-owners')
                    ? 'bg-gray-200 text-gray-700'
                    : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700'}"
                href="/"
            >
                <svg
                    class="h-5 w-5 stroke-current"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <circle cx="14" cy="6" r="1" />
                    <path d="M12 18V14L9 12L12 9L14 11L16 12" />
                    <circle cx="6" cy="17" r="3" />
                    <circle cx="18" cy="17" r="3" />
                </svg>

                <span class="mx-4 font-medium tracking-widest">FILE OWNERS</span
                >
            </p>
            <ul class="text-right">
                <li
                    class="py-2 pr-12  border-r-4 border-white 
                {$page.url.endsWith('/file-owners')
                        ? 'bg-gray-200 text-gray-700 border-blue-500'
                        : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500'}"
                >
                    <button
                        use:inertia={{
                            method: "get",
                            href: "/api/file-owners",
                        }}>View All</button
                    >
                </li>
                <li
                    class="py-2 pr-12  border-r-4 border-white 
                {$page.url.endsWith('/file-owners/create')
                        ? 'bg-gray-200 text-gray-700 border-blue-500'
                        : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500'}"
                >
                    <button
                        type="button"
                        use:inertia={{
                            method: "get",
                            href: "/api/file-owners/create",
                        }}>Add New</button
                    >
                </li>
            </ul>

            <p
                class="flex items-center mt-5 py-2 px-8 w-full
            {$page.url.includes('/staffs')
                    ? 'bg-gray-200 text-gray-700'
                    : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700'}"
                href="/"
            >
                <svg
                    class="h-5 w-5 stroke-current"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    fill="none"
                    ><path
                        stroke-linecap="round"
                        d="M5.5,19.5 C7.83333333,18.5 9.33333333,17.6666667 10,17 C11,16 8,16 8,11 C8,7.66666667 9.33333333,6 12,6 C14.6666667,6 16,7.66666667 16,11 C16,16 13,16 14,17 C14.6666667,17.6666667 16.1666667,18.5 18.5,19.5"
                    /> <circle cx="12" cy="12" r="10" />
                </svg>

                <span class="mx-4 font-medium tracking-widest">STAFFS</span>
            </p>
            <ul class="text-right">
                <li
                    class="py-2 pr-12  border-r-4 border-white 
                {$page.url.endsWith('/staffs')
                        ? 'bg-gray-200 text-gray-700 border-blue-500'
                        : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500'}"
                >
                    <button
                        use:inertia={{
                            method: "get",
                            href: "/api/staffs",
                        }}>View All</button
                    >
                </li>
                <li
                    class="py-2 pr-12  border-r-4 border-white 
                {$page.url.endsWith('/staffs/create')
                        ? 'bg-gray-200 text-gray-700 border-blue-500'
                        : 'text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500'}"
                >
                    <button
                        type="button"
                        use:inertia={{
                            method: "get",
                            href: "/api/staffs/create",
                        }}
                    >
                        Add New</button
                    >
                </li>
            </ul>
        </nav>
    </aside>
{/if}
