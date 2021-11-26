<script>
    export let condition = null;
    let hide = "";
    if (condition) {
        setTimeout(() => {
            hide = "hidden";
        }, 3000);
    }
</script>

{#if condition}
    <div
        class="bg-green-500 text-white font-bold text-xl rounded-lg py-4 px-4 my-4 {hide}"
    >
        {condition}
    </div>
{/if}
