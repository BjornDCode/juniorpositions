<script>
    export default {

        data() {
            return {
                sidebarOpen: false,
                body: document.querySelector('body')
            };
        },

        methods: {

            toggleSidebar(e) {
                this.sidebarOpen = !this.sidebarOpen;
                this.body.classList.toggle('no-scroll');
                var contentContainer = document.querySelector('.content');
                contentContainer.classList.toggle('shifted');
            },

            toggleSearch() {
                if (this.sidebarOpen) return;
                this.EventBus.$emit('toggleSearch');
            }
        }
    }
</script>
