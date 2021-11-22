<script>
    import { inertia } from "@inertiajs/inertia-svelte";
    export let cls = "rounded-lg";
    export let methods = {};
</script>

<button type="button" class="p-4 rounded-lg {cls}" use:inertia={methods}
    ><slot /></button
>
