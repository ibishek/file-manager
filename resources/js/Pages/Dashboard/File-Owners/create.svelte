<script>
    import Input from "./../../Components/Shared/Input.svelte";
    import Sidebar from "./../../Layouts/Sidebar.svelte";
    import Navbar from "./../../Layouts/Navbar.svelte";
    import Label from "../../Components/Shared/Label.svelte";
    let showSidebarMenu = false;
    const showSidebar = (event) => {
        showSidebarMenu = event.detail;
    };
</script>

<svelte:head>
    <title>File Owners - Add - File Manager</title>
</svelte:head>
<Navbar on:showSidebar={showSidebar} />

<div class="flex flex-col sm:flex-row gap-2 bg-gray-200">
    <Sidebar showSidebar={showSidebarMenu} />
    <main class="mt-8 bg-white rounded-lg p-8">
        <p class="text-center text-2xl font-bold text-gray-800">
            Enter Details:
        </p>
        <form action="/" method="post" class="mt-4">
            <div class="md:grid md:grid-cols-3">
                <div class="space-y-2">
                    <Label labelfor="firstname">Firstname:</Label>
                    <Input name="firstname" />
                </div>
                <div />
                <div />
            </div>
        </form>
    </main>
</div>
