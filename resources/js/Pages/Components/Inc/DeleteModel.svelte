<script>
    import { inertia, page } from "@inertiajs/inertia-svelte";
    export let showModel = false;
    let url = $page.url;
</script>

{#if showModel}
    <div
        class="transition-all duration-300 ease-linear absolute z-10 w-full h-full bg-black bg-opacity-30"
    >
        <div
            class="absolute bg-white p-12 text-center m-auto w-8/12 h-56 rounded-lg border border-gray-200 shadow-lg inset-0"
        >
            <p class="text-2xl text-gray-700">Are you sure about this?</p>
            <div class="w-full mt-8">
                <button
                    use:inertia={{
                        method: "delete",
                        href: url,
                    }}
                    class="p-4 bg-red-500 rounded-lg text-white hover:shadow-xl"
                    >Yes, I am sure</button
                >
                <button
                    on:click|preventDefault={() => {
                        showModel = !showModel;
                    }}
                    class="p-4 bg-purple-500 rounded-lg text-white hover:shadow-xl"
                    >Cancel</button
                >
            </div>
        </div>
    </div>
{/if}
