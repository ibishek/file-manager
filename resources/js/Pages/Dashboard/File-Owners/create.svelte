<script>
    import Breadcrumb from "./../../Components/Shared/Breadcrumb.svelte";
    import Sidebar from "./../../Layouts/Sidebar.svelte";
    import Navbar from "./../../Layouts/Navbar.svelte";
    import Label from "../../Components/Shared/Label.svelte";
    import { useForm } from "@inertiajs/inertia-svelte";
    let person = useForm({
        firstname: null,
        middlename: null,
        lastname: null,
        email: null,
        phone: null,
        street_address_one: null,
        street_address_two: null,
        state: null,
        country: null,
    });
    let showSidebarMenu = false;
    const showSidebar = (event) => {
        showSidebarMenu = event.detail;
    };
    function addPerson() {
        $person.post("/api/file-owners", {
            preserveScroll: true,
        });
    }
    $: if ($person.hasErrors) {
        setTimeout(() => {
            $person.clearErrors();
        }, 5000);
    }
</script>

<svelte:head>
    <title>File Owners - Add - File Manager</title>
</svelte:head>
<Navbar on:showSidebar={showSidebar} />

<div class="flex flex-col sm:flex-row gap-2 bg-gray-200">
    <Sidebar showSidebar={showSidebarMenu} />
    <main class="mt-4 md:mt-2 w-full xl:max-w-7xl">
        <Breadcrumb />
        <div class="bg-white mt-4 py-6 px-8 rounded-lg shadow-md">
            <p class="text-center text-2xl font-bold text-gray-800">
                Enter Details:
            </p>
            <form
                action="/"
                on:submit|preventDefault={addPerson}
                method="post"
                class="mt-4 space-y-4"
            >
                <div class="lg:grid lg:grid-cols-3 lg:space-x-2">
                    <div class="space-y-2">
                        <Label labelfor="firstname">Firstname:</Label>
                        <input
                            type="text"
                            class="p-2 bg-blue-50 rounded-lg border w-full border-blue-300 ring-1 placeholder-opacity-50 outline-none text-gray-600"
                            name="firstname"
                            placeholder="Enter first name"
                            bind:value={$person.firstname}
                        />
                        {#if $person.errors.firstname}
                            <span class="text-sm text-red-600">
                                {$person.errors.firstname}
                            </span>
                        {/if}
                    </div>
                    <div class="space-y-2 mt-4 lg:mt-0">
                        <Label labelfor="middlename">Middlename:</Label>
                        <input
                            type="text"
                            class="p-2 bg-blue-50 rounded-lg border w-full border-blue-300 ring-1 placeholder-opacity-50 outline-none text-gray-600"
                            name="middlename"
                            placeholder="Enter middle name"
                            bind:value={$person.middlename}
                        />
                        {#if $person.errors.middlename}
                            <span class="text-sm text-red-600">
                                {$person.errors.middlename}
                            </span>
                        {/if}
                    </div>
                    <div class="space-y-2 mt-4 lg:mt-0">
                        <Label labelfor="lastname">Familyname:</Label>
                        <input
                            type="text"
                            class="p-2 bg-blue-50 rounded-lg border w-full border-blue-300 ring-1 placeholder-opacity-50 outline-none text-gray-600"
                            name="lastname"
                            placeholder="Enter family name"
                            bind:value={$person.lastname}
                        />
                        {#if $person.errors.lastname}
                            <span class="text-sm text-red-600">
                                {$person.errors.lastname}
                            </span>
                        {/if}
                    </div>
                </div>
                <div class="lg:grid lg:grid-cols-2 lg:space-x-2">
                    <div class="space-y-2">
                        <Label labelfor="email">Email:</Label>
                        <input
                            type="email"
                            class="p-2 bg-blue-50 rounded-lg border w-full border-blue-300 ring-1 placeholder-opacity-50 outline-none text-gray-600"
                            name="email"
                            placeholder="Enter email address"
                            bind:value={$person.email}
                        />
                        {#if $person.errors.email}
                            <span class="text-sm text-red-600">
                                {$person.errors.email}
                            </span>
                        {/if}
                    </div>
                    <div class="space-y-2 mt-4 lg:mt-0">
                        <Label labelfor="phone">Phonenumber:</Label>
                        <input
                            type="text"
                            class="p-2 bg-blue-50 rounded-lg border w-full border-blue-300 ring-1 placeholder-opacity-50 outline-none text-gray-600"
                            name="phone"
                            placeholder="Enter phone number"
                            bind:value={$person.phone}
                        />
                        {#if $person.errors.phone}
                            <span class="text-sm text-red-600">
                                {$person.errors.phone}
                            </span>
                        {/if}
                    </div>
                </div>
                <div class="lg:grid lg:grid-cols-2 lg:space-x-2">
                    <div class="space-y-2">
                        <Label labelfor="street_address_one"
                            >Street Address 1:</Label
                        >
                        <input
                            type="text"
                            class="p-2 bg-blue-50 rounded-lg border w-full border-blue-300 ring-1 placeholder-opacity-50 outline-none text-gray-600"
                            name="street_address_one"
                            placeholder="Enter street address"
                            bind:value={$person.street_address_one}
                        />
                        {#if $person.errors.street_address_one}
                            <span class="text-sm text-red-600">
                                {$person.errors.street_address_one}
                            </span>
                        {/if}
                    </div>
                    <div class="space-y-2 mt-4 lg:mt-0">
                        <Label labelfor="street_address_two"
                            >Street Adddress 2:</Label
                        >
                        <input
                            type="text"
                            class="p-2 bg-blue-50 rounded-lg border w-full border-blue-300 ring-1 placeholder-opacity-50 outline-none text-gray-600"
                            name="street_address_two"
                            placeholder="Enter street address"
                            bind:value={$person.street_address_two}
                        />
                        {#if $person.errors.street_address_two}
                            <span class="text-sm text-red-600">
                                {$person.errors.street_address_two}
                            </span>
                        {/if}
                    </div>
                </div>
                <div class="lg:grid lg:grid-cols-2 lg:space-x-2">
                    <div class="space-y-2 mt-4 lg:mt-0">
                        <Label labelfor="state">State:</Label>
                        <input
                            type="text"
                            class="p-2 bg-blue-50 rounded-lg border w-full border-blue-300 ring-1 placeholder-opacity-50 outline-none text-gray-600"
                            name="state"
                            placeholder="Enter state"
                            bind:value={$person.state}
                        />
                        {#if $person.errors.state}
                            <span class="text-sm text-red-600">
                                {$person.errors.state}
                            </span>
                        {/if}
                    </div>
                    <div class="space-y-2 mt-4 lg:mt-0">
                        <Label labelfor="country">Country:</Label>
                        <input
                            type="text"
                            class="p-2 bg-blue-50 rounded-lg border w-full border-blue-300 ring-1 placeholder-opacity-50 outline-none text-gray-600"
                            name="country"
                            placeholder="Enter country"
                            bind:value={$person.country}
                        />
                        {#if $person.errors.country}
                            <span class="text-sm text-red-600">
                                {$person.errors.country}
                            </span>
                        {/if}
                    </div>
                </div>
                <div class="mt-4">
                    <button
                        type="submit"
                        class="p-4 bg-blue-600 text-white rounded-lg"
                        disabled={$person.processing}
                    >
                        Add
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
