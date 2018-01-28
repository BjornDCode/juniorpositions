<script>
    export default {

        data() {
            return {
                open: true
            }
        },

        created() {
            this.EventBus.$on('toggleSearch', this.toggle);
        },

        methods: {
            toggle() {
                this.open = !this.open;
            },

        }
    }
</script>
