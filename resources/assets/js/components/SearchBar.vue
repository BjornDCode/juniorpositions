<script>
    export default {

        data() {
            return {
                open: false
            }
        },

        mounted() {
            if (window.innerWidth >= 768) this.toggle();
        },

        created() {
            this.EventBus.$on('toggleSearch', this.toggle);
        },

        methods: {
            toggle() {
                this.open = !this.open;
                var contentContainer = document.querySelector('.content');
                contentContainer.classList.toggle('pushed');
            }
        }
    }
</script>
