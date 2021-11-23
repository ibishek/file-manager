<script>
    import Success from "./../../Components/Shared/Success.svelte";
    import Breadcrumb from "./../../Components/Shared/Breadcrumb.svelte";
    import Sidebar from "./../../Layouts/Sidebar.svelte";
    import Navbar from "./../../Layouts/Navbar.svelte";
    import { page } from "@inertiajs/inertia-svelte";
    let showSidebarMenu = false;
    const showSidebar = (event) => {
        showSidebarMenu = event.detail;
    };
    export let fileOwners = null;
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
                    {#if fileOwners}
                        {#each fileOwners as fileOwner, i}
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
        </div>
    </main>
</div>
