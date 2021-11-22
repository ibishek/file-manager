<script>
    import { useForm, inertia } from "@inertiajs/inertia-svelte";
    let credentials = useForm({
        email: null,
        password: null,
    });
    const loginAttempt = () => {
        $credentials.post("/login");
    };
</script>

<svelte:head>
    <title>Login - File Manager</title>
</svelte:head>
<div
    class="container p-12 w-9/12 sm:w-2/4 lg:w-1/4  mt-48 mx-auto bg-blue-300 rounded-lg"
>
    <h1 class="text-green-900 font-bold text-2xl text-center">
        Enter your credentials here
    </h1>
    <form
        action="/login"
        method="post"
        autocomplete="off"
        class="mt-4"
        on:submit|preventDefault={loginAttempt}
    >
        <div class="gap-4">
            <label for="email" class="text-lg">Email:</label>
            <input
                type="email"
                name="email"
                class="form-input p-4 w-full rounded-lg border border-blue-600 ring-1"
                bind:value={$credentials.email}
                error={$credentials.email}
            />
            {#if $credentials.errors.email}
                <span class="text-red-500 font-normal"
                    >{$credentials.errors.email}</span
                >
            {/if}
        </div>
        <div class="mt-4">
            <label for="password" class="text-lg">Password:</label>
            <input
                type="password"
                name="password"
                class="form-input p-4 w-full rounded-lg border border-blue-600 ring-1"
                bind:value={$credentials.password}
            />
        </div>
        <input
            type="submit"
            class="p-4 bg-blue-400 hover:bg-blue-600 hover:text-white hover:shadow-md rounded-lg mt-4"
            value="Login"
        />
        <button
            type="button"
            class="p-4 bg-green-500 hover:bg-green-600 hover:text-white hover:shadow-md rounded-lg mt-4"
            use:inertia={{ href: "/login/dev", method: "post" }}
        >
            Dev Login
        </button>
    </form>
</div>
