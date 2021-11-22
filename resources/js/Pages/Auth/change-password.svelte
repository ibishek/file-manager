<script></script>

<div
    class="container p-12 w-9/12 sm:w-2/4 md:w-1/4  mt-48 mx-auto bg-blue-300 rounded-lg"
>
    <h1 class="text-green-900 font-bold text-2xl text-center">
        Change Password
    </h1>
    <form action="/login" method="post" autocomplete="off" class="mt-4">
        <div class="gap-4">
            <label for="email" class="text-lg">Old Password:</label>
            <input
                type="password"
                name="old-password"
                class="form-input p-4 w-full rounded-lg border border-blue-600 ring-1"
            />
        </div>
        <div class="mt-4">
            <label for="password" class="text-lg">New Password:</label>
            <input
                type="password"
                name="password"
                class="form-input p-4 w-full rounded-lg border border-blue-600 ring-1"
            />
        </div>
        <div class="mt-4">
            <label for="password" class="text-lg">Re-enter Password:</label>
            <input
                type="password"
                name="password-confirm"
                class="form-input p-4 w-full rounded-lg border border-blue-600 ring-1"
            />
        </div>
        <input
            type="submit"
            class="p-4 bg-blue-400 hover:bg-blue-600 hover:text-white hover:shadow-md rounded-lg mt-4"
            value="Proceed"
        />
    </form>
</div>
