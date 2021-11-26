<script>
    export let message = "Page not found";
    export let code = 404;
</script>

<svelte:head>
    <title>Error: {code} {message}</title>
</svelte:head>
<div class="w-full h-screen bg-black">
    <img
        src="/img/error.webp"
        alt="error"
        class="object-cover w-full h-full opacity-60 bg-no-repeat"
    />
    <div class="absolute top-4 left-4">
        <svg
            class="w-16 h-16"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            aria-labelledby="dangerIconTitle"
            stroke="#ffffff"
            stroke-width="2"
            stroke-linecap="square"
            stroke-linejoin="miter"
            fill="none"
            color="#ffffff"
        >
            <title id="dangerIconTitle">Danger</title> <path d="M12 10L12 13" />
            <line x1="12" y1="16" x2="12" y2="16" />
            <path
                d="M12.8619342,4.46528817 L21.1135176,18.4929799 C21.3935371,18.969013 21.2346366,19.5819147 20.7586035,19.8619342 C20.6049268,19.9523322 20.4298761,20 20.2515834,20 L3.74841664,20 C3.19613189,20 2.74841664,19.5522847 2.74841664,19 C2.74841664,18.8217072 2.7960844,18.6466565 2.88648243,18.4929799 L11.1380658,4.46528817 C11.4180853,3.98925504 12.030987,3.83035459 12.5070201,4.11037408 C12.6535738,4.19658212 12.7757262,4.3187345 12.8619342,4.46528817 Z"
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
