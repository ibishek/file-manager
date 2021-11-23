<script>
    import { inertia, page } from "@inertiajs/inertia-svelte";
    const links = $page.url.split("/");
</script>

<div
    class="py-6 w-full px-8 flex items-center bg-white rounded-lg text-gray-800 shadow-md"
>
    <button
        use:inertia={{
            method: "get",
            href: "/api/dashboard",
        }}
    >
        <svg
            class="h-5 w-5 stroke-current"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            aria-labelledby="homeAltIconTitle"
            stroke-width="1.5"
            stroke-linecap="square"
            stroke-linejoin="miter"
            fill="none"
            ><path d="M3 10.182V22h18V10.182L12 2z" />
            <rect width="6" height="8" x="9" y="14" />
        </svg>
    </button>
    <span class="px-4">/</span>
    <span class="text-gray-800 capitalize">{links[2]}</span>
    <span class="px-4">/</span>
    {#if links.length === 3}
        <span class="text-gray-800 capitalize"> Index </span>
    {:else}
        <span class="text-gray-800 capitalize"> {links[3]} </span>
    {/if}
</div>
