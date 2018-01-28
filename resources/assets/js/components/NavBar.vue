<script>
    export default {

        data() {
            return {
                sidebarOpen: false,
                openedCategory: 0,
                body: document.querySelector('body')
            };
        },

        methods: {

            toggleSidebar(e) {
                this.sidebarOpen = !this.sidebarOpen;
                this.openedCategory = 0;
                this.body.classList.toggle('no-scroll');
                var contentContainer = document.querySelector('.content');
                contentContainer.classList.toggle('shifted');
            },

            toggleSearch() {
                if (this.sidebarOpen) return;
                this.EventBus.$emit('toggleSearch');
            },

            toggleSubCategoriesTouch(e) {
                e.preventDefault();
                let categoryId = e.currentTarget.dataset.categoryId;
                this.openedCategory = (this.openedCategory == categoryId) ? 0 : categoryId;
            },   

            openSubCategoriesDesktop(e) {
                let categoryId = e.currentTarget.dataset.categoryId;
                this.openedCategory = categoryId;
            },

            closeSubCategoriesDesktop(e) {
                this.openedCategory = 0;
            },
        }
    }
</script>
