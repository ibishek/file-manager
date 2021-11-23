<script>
    import { Inertia } from "@inertiajs/inertia";
    import { page, inertia } from "@inertiajs/inertia-svelte";
    let searchParam = null;
    function populateSearch() {
        const baseUrl = $page.url.split("?")[0];
        let url = baseUrl + "?name=" + searchParam;
        if (searchParam === null || searchParam === "") {
            url = baseUrl;
        }
        Inertia.visit(url, { only: ["fileOwners"] });
    }
</script>

<div class="text-gray-600 mb-4">
    <input
        class="border-2 border-gray-300 bg-white h-10 pl-2 pr-8 rounded-lg text-sm focus:outline-none"
        type="search"
        name="search"
        placeholder="Enter fullname"
        bind:value={searchParam}
    />
    <button
        type="submit"
        class="absolute border-2 border-gray-100 p-2 rounded-lg bg-gray-100"
        on:click|preventDefault={populateSearch}
    >
        <svg
            class="h-5 w-5 stroke-current"
            xmlns="http://www.w3.org/2000/svg"
            version="1.1"
            viewBox="0 0 56.966 56.966"
            style="enable-background:new 0 0 56.966 56.966;"
            xml:space="preserve"
        >
            <path
                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"
            />
        </svg>
    </button>
</div>
