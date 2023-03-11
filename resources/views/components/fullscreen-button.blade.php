<a x-on:click="fullscreen = fullscreen == 'true' ? 'false' : 'true'" class="pt-1 cursor-pointer max-w-content hover:scale-110 slow-hover">
    <span class="">
        <i 
            class="fa-solid fa-xl"
            :class="fullscreen === 'true' ? 'fa-down-left-and-up-right-to-center' : 'fa-up-right-and-down-left-from-center'"
        ></i>
    </span>
</a>

<script type="text/javascript">
    function toggleFullscreen() {
        if (localStorage.fullscreen == 'false') {
            localStorage.fullscreen = 'true';
        } else {
            localStorage.fullscreen = 'false';
        }

        window.location.reload(true);
    }
</script>
