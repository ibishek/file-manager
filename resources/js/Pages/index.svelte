<script>
    import Button from "./Components/Shared/Button.svelte";
    const loginMethods = {
        method: "get",
        href: "login",
    };
</script>

<svelte:head>
    <title>File Manger</title>
</svelte:head>
<h1>This is landing index page</h1>
<div class="container mx-auto mt-24 text-center">
    <Button
        cls="bg-green-500 hover:bg-green-600 hover:text-white hover:shadow-lg"
        methods={loginMethods}>Login</Button
    >
</div>
