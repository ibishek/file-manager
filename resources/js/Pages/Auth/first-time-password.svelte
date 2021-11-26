<script>
    import { useForm, inertia, page } from "@inertiajs/inertia-svelte";
    export let user = null;
    let passwords = useForm({
        id: user.id,
        password: null,
        confirm: null,
    });
    let type = "password";
    const passwordChange = () => {
        $passwords.put("/staff/password-reset");
    };
    $: if ($passwords.hasErrors) {
        setInterval(() => {
            $passwords.clearErrors();
        }, 3000);
    }
</script>

<svelte:head>
    <title>{user.name} - Password Change</title>
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
        <p class="text-white font-extrabold text-xl pl-4">
            Dear, {user.name}
        </p>
        {#if $page.props.flash.error}
            <p class="text-white text-xl mt-4 text-center">
                {$page.props.flash.error}
            </p>
        {/if}
        <form
            action="/login"
            method="post"
            autocomplete="off"
            class="mt-8"
            on:submit|preventDefault={passwordChange}
        >
            <div class="gap-4">
                <input
                    type="password"
                    name="password"
                    class="form-input p-4 w-full rounded-full bg-gray-50 outline-none opacity-50"
                    bind:value={$passwords.password}
                    placeholder="Enter new password"
                />
                {#if $passwords.errors.password}
                    <span class="text-white font-normal px-4"
                        >{$passwords.errors.password}</span
                    >
                {/if}
            </div>
            <div class="mt-4">
                <input
                    type="password"
                    name="confirm"
                    class="form-input p-4 w-full rounded-full bg-gray-50 outline-none opacity-50"
                    bind:value={$passwords.confirm}
                    placeholder="Confirm password"
                />
            </div>
            <input
                type="submit"
                class="p-4 mt-4 rounded-full w-full bg-red-400 text-white cursor-pointer tracking-widest hover:bg-red-500 hover:shadow-xl"
                value="CHANGE PASSWORD"
                disabled={$passwords.precessing}
            />
        </form>
    </div>
</div>
