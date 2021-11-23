<script>
    import Success from "./../../Components/Shared/Success.svelte";
    import Breadcrumb from "./../../Components/Shared/Breadcrumb.svelte";
    import Sidebar from "./../../Layouts/Sidebar.svelte";
    import Navbar from "./../../Layouts/Navbar.svelte";
    import { page, inertia } from "@inertiajs/inertia-svelte";
    import { Inertia } from "@inertiajs/inertia";
    let showSidebarMenu = false;
    let searchParam = null;
    const showSidebar = (event) => {
        showSidebarMenu = event.detail;
    };
    export let fileOwners = null; // index table value
    function populateSearch() {
        let url = `/api/file-owners?name=${searchParam}`;
        if (searchParam === null || searchParam === "") {
            url = "/api/file-owners";
        }
        Inertia.visit(url, { only: ["fileOwners"] });
    }
</script>

<svelte:head>
    <title>File Owners - File Manager</title>
</svelte:head>
<Navbar on:showSidebar={showSidebar} />

<div class="flex flex-col sm:flex-row gap-2 bg-gray-200">
    <Sidebar showSidebar={showSidebarMenu} />
    <!-- Contents -->
    <main class="mt-4 md:mt-2 w-full xl:max-w-7xl">
        <Breadcrumb />
        <Success condition={$page.props.flash.success} />
        <div class="bg-white mt-4 py-6 px-8 rounded-lg shadow-md">
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
            <table class="table w-full">
                <thead class="text-left bg-gray-100 text-gray-800">
                    <tr>
                        <th class="px-2 py-4">S.N.</th>
                        <th>Fullname</th>
                        <th>Country</th>
                        <th />
                    </tr>
                </thead>
                <tbody class="px-2 py-4">
                    {#if fileOwners.data}
                        {#each fileOwners.data as fileOwner, i}
                            <tr>
                                <td class="px-2 py-4">{++i}</td>
                                <td>{fileOwner.full_name}</td>
                                <td>{fileOwner.country}</td>
                                <td>
                                    <div class="hidden lg:block">show/Edit</div>
                                    <div class="lg:hidden">...</div>
                                </td>
                            </tr>
                        {/each}
                    {:else}
                        <tr>
                            <td
                                colspan="3"
                                class="text-center text-gray-800 bg-gray-100 py-2"
                                >No record found</td
                            >
                        </tr>
                    {/if}
                </tbody>
            </table>
            <div class="mt-4 inline-block w-full">
                <div class="">
                    {#if fileOwners.prev_page_url}
                        <button
                            use:inertia={{
                                method: "get",
                                href: `${fileOwners.prev_page_url}`,
                            }}
                            class="p-2 text-sm bg-blue-500 rounded-lg
                        shadow-lg hover:text-blue-500 hover:bg-gray-200"
                            >Previous</button
                        >
                    {/if}
                    {#if fileOwners.next_page_url}
                        <button
                            use:inertia={{
                                method: "get",
                                href: `${fileOwners.next_page_url}`,
                            }}
                            class="p-2 text-sm bg-blue-500 rounded-lg shadow-lg hover:text-blue-500 hover:bg-gray-200"
                            >Next</button
                        >
                    {/if}
                </div>
            </div>
        </div>
    </main>
</div>
