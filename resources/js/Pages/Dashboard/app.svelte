<script>
    import Sidebar from "./../Layouts/Sidebar.svelte";
    import Navbar from "./../Layouts/Navbar.svelte";
    let showSidebarMenu = false;
    const showSidebar = (event) => {
        showSidebarMenu = event.detail;
    };
</script>

<svelte:head>
    <title>Dashboard - File Manager</title>
</svelte:head>
<Navbar on:showSidebar={showSidebar} />

<div class="flex flex-col sm:flex-row gap-2">
    <Sidebar showSidebar={showSidebarMenu} />
    <!-- Contents -->
</div>
