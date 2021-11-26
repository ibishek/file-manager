<script>
    export let message = "User not found";
    export let code = 404;
</script>

<svelte:head>
    <title>Error: {code} {message}</title>
</svelte:head>
<div class="w-full h-screen bg-black">
    <img
        src="/img/user-not-found.webp"
        alt="user not found"
        class="object-cover w-full h-full opacity-50 bg-no-repeat"
    />
    <div class="absolute top-4 left-4">
        <svg
            class="w-16 h-16 fill-current text-white"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            aria-labelledby="personIconTitle"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            fill="none"
        >
            <title id="personIconTitle">Person</title>
            <path
                d="M4,20 C4,17 8,17 10,15 C11,14 8,14 8,9 C8,5.667 9.333,4 12,4 C14.667,4 16,5.667 16,9 C16,14 13,14 14,15 C16,17 20,17 20,20"
            />
        </svg>
    </div>
    <div class="absolute w-full md:w-3/5 lg:w-3/4 h-36 m-auto inset-0">
        <h1
            class="text-white text-6xl md:text-8xl lg:text-9xl font-black font-serif text-center"
        >
            {code}
        </h1>
        <p
            class="text-center text-white text-2xl md:text-3xl lg:text-4xl font-semibold"
        >
            {message}
        </p>
    </div>
</div>
