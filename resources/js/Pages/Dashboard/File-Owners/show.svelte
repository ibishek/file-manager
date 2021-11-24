<script>
    import Success from "./../../Components/Shared/Success.svelte";
    import DeleteModel from "./../../Components/Inc/DeleteModel.svelte";
    import Breadcrumb from "./../../Components/Shared/Breadcrumb.svelte";
    import Sidebar from "./../../Layouts/Sidebar.svelte";
    import Navbar from "./../../Layouts/Navbar.svelte";
    import { inertia, page } from "@inertiajs/inertia-svelte";
    let showSidebarMenu = false;
    const showSidebar = (event) => {
        showSidebarMenu = event.detail;
    };
    export let fileOwner = null;
    let showModel = false;
</script>

<svelte:head>
    <title>File Owners - File Manager</title>
</svelte:head>

<DeleteModel {showModel} />
<Navbar on:showSidebar={showSidebar} />

<div class="flex flex-col sm:flex-row gap-2 bg-gray-200">
    <Sidebar showSidebar={showSidebarMenu} />
    <!-- Contents -->
    <main class="mt-4 md:mt-2 w-full xl:max-w-7xl">
        <Breadcrumb name={fileOwner.full_name} />
        <Success condition={$page.props.flash.success} />
        <div class="bg-white mt-4 py-6 px-8 rounded-lg shadow-md">
            <div class="text-left text-gray-700 space-y-4">
                <p>Name: {fileOwner.full_name}</p>
                <p>Email: {fileOwner.email}</p>
                <p>Phone: {fileOwner.phone}</p>
                <p>Country: {fileOwner.country}</p>
                <p>State: {fileOwner.state}</p>
                <p>{fileOwner.street_address_one}</p>
                <p>{fileOwner.street_address_two}</p>
            </div>
            <div class="mt-4 p-4 bg-white">
                <button
                    use:inertia={{
                        method: "get",
                        href: "/api/file-owners/" + fileOwner.id + "/edit",
                    }}
                    class="p-4 bg-blue-500 text-white rounded-lg border hover:shadow-lg hover:border-blue-500 hover:text-blue-500 hover:bg-white"
                    >Edit</button
                >
                <button
                    on:click|preventDefault={() => {
                        showModel = !showModel;
                    }}
                    class="p-4 bg-red-500 text-white rounded-lg border hover:shadow-lg hover:border-red-500 hover:text-red-500 hover:bg-white"
                    >Delete</button
                >
                <button
                    class="p-4 bg-indigo-500 text-white rounded-lg border hover:shadow-lg hover:border-indigo-500 hover:text-indigo-500 hover:bg-white"
                    use:inertia={{
                        method: "get",
                        href: "/api/file-owners",
                    }}>Back to Index</button
                >
            </div>
        </div>
    </main>
    <!-- Contents end -->
</div>
