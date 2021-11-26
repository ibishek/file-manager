<script>
    export let message = "Link expired contact admin for support";
    export let code = 410;
</script>

<svelte:head>
    <title>Error: {code} {message}</title>
</svelte:head>
<div class="w-full h-screen bg-black">
    <img
        src="/img/link-expired.webp"
        alt="error"
        class="object-cover w-full h-full opacity-50 bg-no-repeat"
    />
    <div class="absolute top-4 left-4">
        <svg
            class="w-16 h-16"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            aria-labelledby="linkIconTitle"
            stroke="#ffffff"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            fill="none"
            color="#ffffff"
        >
            <title id="linkIconTitle">Link</title>
            <path
                d="M10.5,15.5 C10.5,14.1666667 10.5,13.5 10.5,13.5 C10.5,10.7385763 8.26142375,8.5 5.5,8.5 C2.73857625,8.5 0.5,10.7385763 0.5,13.5 C0.5,13.5 0.5,14.1666667 0.5,15.5"
                transform="rotate(-90 5.5 12)"
            /> <path d="M8,12 L16,12" />
            <path
                d="M23.5,15.5 C23.5,14.1666667 23.5,13.5 23.5,13.5 C23.5,10.7385763 21.2614237,8.5 18.5,8.5 C15.7385763,8.5 13.5,10.7385763 13.5,13.5 C13.5,13.5 13.5,14.1666667 13.5,15.5"
                transform="rotate(90 18.5 12)"
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
