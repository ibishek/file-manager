<script>
    import { useForm, inertia, page } from "@inertiajs/inertia-svelte";
    let credentials = useForm({
        email: null,
        password: null,
    });
    const loginAttempt = () => {
        $credentials.post("/login");
    };
    $: if ($credentials.hasErrors) {
        setInterval(() => {
            $credentials.clearErrors();
        }, 3000);
    }
</script>

<svelte:head>
    <title>Login - File Manager</title>
</svelte:head>
<div class="w-full h-screen bg-black relative">
    <img
        src="/img/login.webp"
        alt="login"
        class="object-cover w-full h-full opacity-60 bg-no-repeat"
    />
    <div class="absolute top-4 left-4">
        <svg
            class="w-16 h-16"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            aria-labelledby="shieldIconTitle"
            stroke="#ffffff"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            fill="none"
            color="#ffffff"
            ><path
                d="M19,14.7368421 C19,17.122807 16.6666667,19.2105263 12,21 C7.33333333,19.2105263 5,17.122807 5,14.7368421 C5,12.3508772 5,9.36842105 5,5.78947368 C8.13611482,4.59649123 10.4694481,4 12,4 C13.5305519,4 15.8638852,4.59649123 19,5.78947368 C19,9.36842105 19,12.3508772 19,14.7368421 Z"
            />
        </svg>
    </div>
    <div
        class="absolute p-12 w-full sm:w-3/4 md:w-6/12 lg:w-96 h-2/4 m-auto inset-0 backdrop-filter backdrop-blur lg:backdrop-blur-0"
    >
        <h1 class="font-bold text-5xl text-center text-white">Welcome ):</h1>
        {#if $page.props.flash.success}
            <p class="text-white text-xl mt-4 text-center">
                {$page.props.flash.success}
            </p>
        {/if}
        <form
            action="/login"
            method="post"
            autocomplete="off"
            class="mt-8"
            on:submit|preventDefault={loginAttempt}
        >
            <div class="gap-4">
                <input
                    type="email"
                    name="email"
                    class="form-input p-4 w-full rounded-full bg-gray-50 outline-none opacity-50"
                    bind:value={$credentials.email}
                    error={$credentials.email}
                    placeholder="Email"
                />
                {#if $credentials.errors.email}
                    <span class="text-white font-normal px-4"
                        >{$credentials.errors.email}</span
                    >
                {/if}
            </div>
            <div class="mt-4">
                <input
                    type="password"
                    name="password"
                    class="form-input p-4 w-full rounded-full outline-none bg-gray-50 opacity-50"
                    bind:value={$credentials.password}
                    placeholder="Password"
                />
            </div>
            <input
                type="submit"
                class="p-4 mt-4 rounded-full w-full bg-red-400 text-white cursor-pointer tracking-widest hover:bg-red-500 hover:shadow-xl"
                value="LOGIN"
                disabled={$credentials.processing}
            />
            <button
                type="button"
                class="p-4 mt-4 rounded-full w-full bg-indigo-400 text-white tracking-widest hover:bg-indigo-500 hover:shadow-xl"
                use:inertia={{ href: "/login/dev", method: "post" }}
            >
                &lt; DEV LOGIN &#47;&gt;
            </button>
        </form>
    </div>
</div>
