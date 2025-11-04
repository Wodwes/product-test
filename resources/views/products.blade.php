<x-layout title="Product Showcase">
    @include('components.hero-banner')

    <main class="main" x-data="productShowcase()">
        <!-- Products Section -->
        <section class="products" id="products">
            <div class="container">
                <div class="products__header">
                    <h2>Featured Products</h2>
                    <p>Explore our handpicked selection of quality products</p>
                </div>

                <div class="products__grid">
                    @foreach ($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact container" id="contact">
            <div class="contact__container">
                <div class="contact__image">
                    <img src="/assets/images/contact.jpg" alt="Contact Us" loading="lazy">
                </div>
                <div class="contact__content">
                    <h2 class="contact__title">Get In Touch</h2>
                    <p class="contact__description">
                        Have questions about our products? We'd love to hear from you.
                    </p>
                    <a class="contact__button" href="mailto:hello@producthub.com">CONTACT US</a>
                </div>
            </div>
        </section>

        <!-- Product Modal -->
        <x-product-modal />
    </main>

    <script>
        function productShowcase() {
            return {
                modalOpen: false,
                selectedProduct: null,

                openModal(product) {
                    this.selectedProduct = product;
                    this.modalOpen = true;
                    document.body.style.overflow = 'hidden';
                    
                    // Scroll modal to top when opened
                    this.$nextTick(() => {
                        const modalScrollWrapper = document.querySelector('.modal__scroll-wrapper');
                        if (modalScrollWrapper) {
                            modalScrollWrapper.scrollTop = 0;
                        }
                    });
                },

                closeModal() {
                    this.modalOpen = false;
                    document.body.style.overflow = '';
                    setTimeout(() => {
                        this.selectedProduct = null;
                    }, 300);
                },

                addToCart(productTitle) {
                    // Show toast notification
                    window.dispatchEvent(new CustomEvent('showToast', {
                        detail: { 
                            message: `"${productTitle}" added to cart! 🛒`, 
                            type: 'cart', 
                            duration: 2500 
                        }
                    }));
                }
            }
        }
    </script>
</x-layout>
