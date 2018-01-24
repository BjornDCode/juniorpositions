<script>
    export default {
        mounted() {
            if (window.innerWidth < 768) {
                window.addEventListener('scroll', e => this.handleScroll(e));
            }
        },

        data() {
            return {
                visible: true,
                scrollPosition: window.pageYOffset,
                sidebarOpen: false,
                body: document.querySelector('body')
            };
        },

        methods: {
            handleScroll(e) {
                if (window.pageYOffset > this.scrollPosition) {
                    this.hide();
                } else {
                    this.show();
                }

                this.scrollPosition = window.pageYOffset;
            },

            hide() {
                if (!this.visible) return;
                this.visible = false;
            },

            show() {
                if (this.visible) return;
                this.visible = true;
            },

            toggleSidebar(e) {
                this.sidebarOpen = !this.sidebarOpen;
                this.body.classList.toggle('no-scroll');
                var contentContainer = document.querySelector('.content');
                contentContainer.classList.toggle('shifted');
            }
        }
    }
</script>
