<div
    x-data="{
        show: false,
        close: function () {
            this.show = false
        },
        toggle: function () {
            this.show = ! this.show
        }
    }"
>
    {{ $slot }}
</div>
