<script>
    import OptionPannel from "./../../Components/Inc/OptionPannel.svelte";
    import Search from "./../../Components/Shared/Search.svelte";
    import Success from "./../../Components/Shared/Success.svelte";
    import Breadcrumb from "./../../Components/Shared/Breadcrumb.svelte";
    import Sidebar from "./../../Layouts/Sidebar.svelte";
    import Navbar from "./../../Layouts/Navbar.svelte";
    import { page, inertia } from "@inertiajs/inertia-svelte";
    let showSidebarMenu = false;
    const showSidebar = (event) => {
        showSidebarMenu = event.detail;
    };
    export let staffs = null; // index table value
</script>

<svelte:head>
    <title>Staffs - File Manager</title>
</svelte:head>
<Navbar on:showSidebar={showSidebar} />

<div class="flex flex-col sm:flex-row gap-2 bg-gray-200">
    <Sidebar showSidebar={showSidebarMenu} />
    <!-- Contents -->
    <main class="mt-4 md:mt-2 w-full xl:max-w-7xl">
        <Breadcrumb />
        <Success condition={$page.props.flash.success} />
        <div class="bg-white mt-4 py-6 px-8 rounded-lg shadow-md">
            <Search />
            <table class="table w-full">
                <thead class="text-left bg-gray-100 text-gray-800">
                    <tr>
                        <th class="px-2 py-4">S.N.</th>
                        <th>Fullname</th>
                        <th />
                    </tr>
                </thead>
                <tbody class="px-2 py-4">
                    {#if staffs.data}
                        {#each staffs.data as staff, i}
                            <tr>
                                <td class="px-2 py-4">{++i}</td>
                                <td>{staff.name}</td>
                                <td>
                                    <OptionPannel id={staff.id} />
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
                    {#if staffs.prev_page_url}
                        <button
                            use:inertia={{
                                method: "get",
                                href: `${staffs.prev_page_url}`,
                            }}
                            class="p-2 text-sm bg-blue-500 text-white border rounded-lg
                        shadow-lg hover:text-blue-500 hover:bg-gray-200 hover:border-blue-500"
                            >Previous</button
                        >
                    {/if}
                    {#if staffs.next_page_url}
                        <button
                            use:inertia={{
                                method: "get",
                                href: `${staffs.next_page_url}`,
                            }}
                            class="p-2 text-sm bg-blue-500 text-white border rounded-lg shadow-lg hover:text-blue-500 hover:bg-gray-200 hover:border-blue-500"
                            >Next</button
                        >
                    {/if}
                </div>
            </div>
        </div>
    </main>
    <!-- Contents end -->
</div>
