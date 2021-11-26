<script>
    import Error from "./../../Components/Shared/Error.svelte";
    import { useForm, page } from "@inertiajs/inertia-svelte";
    import Label from "./../../Components/Shared/Label.svelte";
    import Breadcrumb from "./../../Components/Shared/Breadcrumb.svelte";
    import Sidebar from "./../../Layouts/Sidebar.svelte";
    import Navbar from "./../../Layouts/Navbar.svelte";
    let showSidebarMenu = false;
    let staff = useForm({
        name: null,
        email: null,
    });
    const showSidebar = (event) => {
        showSidebarMenu = event.detail;
    };
    function createStaff() {
        $staff.post("/api/staffs", {
            preserveScroll: true,
        });
    }
    $: if ($staff.hasErrors) {
        setTimeout(() => {
            $staff.clearErrors();
        }, 5000);
    }
</script>

<svelte:head>
    <title>Staff - Add - File Manager</title>
</svelte:head>
<Navbar on:showSidebar={showSidebar} />

<div class="flex flex-col sm:flex-row gap-2 bg-gray-200">
    <Sidebar showSidebar={showSidebarMenu} />
    <main class="mt-4 md:mt-2 w-full xl:max-w-7xl">
        <Breadcrumb />
        <Error condition={$page.props.flash.error} />
        <div class="bg-white mt-4 py-6 px-8 rounded-lg shadow-md">
            <p class="text-center text-2xl font-bold text-gray-800">
                Enter Details:
            </p>
            <form
                action="/create-staff"
                method="post"
                class="mt-4 space-y-4"
                on:submit|preventDefault={createStaff}
            >
                <div class="lg:grid lg:grid-cols-3 lg:space-x-2">
                    <div class="space-y-2">
                        <Label labelfor="name">Fullname:</Label>
                        <input
                            type="text"
                            class="p-2 bg-blue-50 rounded-lg border w-full border-blue-300 ring-1 placeholder-opacity-50 outline-none text-gray-600"
                            name="name"
                            placeholder="Enter full name"
                            bind:value={$staff.name}
                        />
                        {#if $staff.errors.name}
                            <span class="text-sm text-red-600">
                                {$staff.errors.name}
                            </span>
                        {/if}
                    </div>
                    <div class="space-y-2 mt-4 lg:mt-0">
                        <Label labelfor="name">Email:</Label>
                        <input
                            type="email"
                            class="p-2 bg-blue-50 rounded-lg border w-full border-blue-300 ring-1 placeholder-opacity-50 outline-none text-gray-600"
                            name="email"
                            placeholder="Enter email address"
                            bind:value={$staff.email}
                        />
                        {#if $staff.errors.email}
                            <span class="text-sm text-red-600">
                                {$staff.errors.email}
                            </span>
                        {/if}
                    </div>
                    <div class="mt-4">
                        <button
                            type="submit"
                            class="p-4 bg-blue-600 text-white rounded-lg"
                            disabled={$staff.processing}
                        >
                            Add
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <!-- Contents -->
</div>
