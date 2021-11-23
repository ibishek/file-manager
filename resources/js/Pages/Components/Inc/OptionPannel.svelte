<script>
    import { inertia, page } from "@inertiajs/inertia-svelte";
    const baseUrl = $page.url.split("?")[0];
    export let id = null;
    let showMenu = false;
</script>

<div class="hidden lg:block">
    <button
        use:inertia={{
            method: "get",
            href: `${baseUrl}/${id}`,
        }}
        class="p-3 fill-current text-white bg-green-500 rounded-lg hover:bg-white hover:shadow-lg hover:text-green-500"
    >
        <svg
            class="stroke-current h-5 w-5"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
            aria-labelledby="eyeIconTitle"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
            fill="none"
        >
            <path
                d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z"
            /> <circle cx="12" cy="12" r="3" />
        </svg>
    </button>
    <button
        use:inertia={{
            method: "get",
            href: `${baseUrl}/${id}/edit`,
        }}
        class="p-3 text-gray-700 rounded-lg hover:bg-blue-500 hover:shadow-lg hover:fill-current hover:text-white"
    >
        <svg
            class="h-5 w-5 stroke-current"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            aria-labelledby="editIconTitle"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
            fill="none"
        >
            <path
                d="M18.4142136 4.41421356L19.5857864 5.58578644C20.366835 6.36683502 20.366835 7.63316498 19.5857864 8.41421356L8 20 4 20 4 16 15.5857864 4.41421356C16.366835 3.63316498 17.633165 3.63316498 18.4142136 4.41421356zM14 6L18 10"
            />
        </svg>
    </button>
</div>
<div class="lg:hidden relative">
    <button
        class="p-3 bg-gray-300 rounded-lg"
        on:click|preventDefault={() => (showMenu = !showMenu)}
    >
        <svg
            class="h-5 w-5 stroke-current"
            rxmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            aria-labelledby="ellypsisIconTitle"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
            fill="none"
        >
            <circle cx="12" cy="12" r="1" /> <circle cx="6" cy="12" r="1" />
            <circle cx="18" cy="12" r="1" />
        </svg>
    </button>
    {#if showMenu}
        <div class="bg-white z-10 rounded-lg absolute shadow-lg -left-18">
            <div class="p-4 rounded-lg hover:bg-gray-200">
                <button
                    use:inertia={{
                        method: "get",
                        href: `${baseUrl}/${id}`,
                    }}>Show</button
                >
            </div>
            <div class="p-4 rounded-lg hover:bg-gray-200">
                <button
                    use:inertia={{
                        method: "get",
                        href: `${baseUrl}/${id}/edit`,
                    }}>Edit</button
                >
            </div>
        </div>
    {/if}
</div>
