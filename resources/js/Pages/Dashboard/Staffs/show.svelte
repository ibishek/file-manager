<script>
    import DeleteModel from "./../../Components/Inc/DeleteModel.svelte";
    import Breadcrumb from "./../../Components/Shared/Breadcrumb.svelte";
    import Sidebar from "./../../Layouts/Sidebar.svelte";
    import Navbar from "./../../Layouts/Navbar.svelte";
    import { inertia, page } from "@inertiajs/inertia-svelte";
    let showSidebarMenu = false;
    const showSidebar = (event) => {
        showSidebarMenu = event.detail;
    };
    export let staff = null;
    export let firstTimeActivate = "do-not";
    let showModel = false;
    // avatar
    let name = staff.name.split(" ");
    name = name.join("+");
    let src = `https://ui-avatars.com/api/?name=${name}&background=F472B6&color=ffffff`;
</script>

<svelte:head>
    <title>{staff.name} - File Manager</title>
</svelte:head>

<DeleteModel {showModel} />
<Navbar on:showSidebar={showSidebar} />

<div class="flex flex-col sm:flex-row gap-2 bg-gray-200">
    <Sidebar showSidebar={showSidebarMenu} />
    <!-- Contents -->
    <main class="mt-2 w-full xl:max-w-7xl p-4 md:p-0">
        <Breadcrumb name={staff.name} />
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="w-full sm:w-2/4 bg-white mt-4 rounded-lg shadow-md">
                <div class="relative">
                    <!-- <div class="w-full h-48 bg-green-500 rounded-t-lg" /> -->
                    <div class="bg-black">
                        <img
                            class="object-cover object-center w-full h-48 rounded-t-lg opacity-60"
                            src="/img/login.webp"
                            alt="main banner"
                        />
                    </div>
                    <img
                        {src}
                        class="absolute w-24 h-24 rounded-full inset-0 m-auto border-2 border-white"
                        alt="avatar"
                    />
                </div>
                <div class="p-4 w-full py-6 px-8 space-y-4">
                    <p class="text-xl text-gray-700 font-bold">{staff.name}</p>
                    <p class=" text-gray-500 font-bold capitalize">
                        {staff.roles[0].name}
                    </p>
                    <p class="text-gray-700 font-bold">{staff.email}</p>
                </div>
            </div>
            <div
                class="w-full sm:w-2/4 bg-white mt-4 rounded-lg shadow-md p-4 space-y-4"
            >
                {#if staff.is_active === "1"}
                    <p>
                        <span
                            class="py-2 px-6 bg-green-500 rounded-full text-white hover:shadow-lg"
                            >Staff is Active</span
                        >
                    </p>
                {:else}
                    <p>
                        <span
                            class="py-2 px-6 bg-red-500 rounded-full text-white hover:shadow-lg"
                            >Staff is Inactive</span
                        >
                    </p>
                {/if}
                <button
                    class="p-4 bg-blue-500 rounded-lg text-white hover:shadow-lg"
                    >Edit Staff Details</button
                >
                {#if firstTimeActivate === "activate"}
                    <button
                        class="p-4 bg-indigo-500 rounded-full text-white hover:shadow-lg"
                        >Activate User</button
                    >
                {:else if firstTimeActivate === "do-not"}
                    <p>Staff has not changed first time password</p>
                    <button
                        class="bg-indigo-500 rounded-lg p-4 text-white hover:shadow-lg"
                        >Resend Password Change Request</button
                    >
                {:else}
                    <p />
                {/if}
            </div>
        </div>
    </main>
    <!-- Contents end -->
</div>
