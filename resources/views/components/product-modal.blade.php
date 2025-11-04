<div class="modal" style="display: none;" x-show="modalOpen" x-transition.opacity.duration.300ms @click.self="closeModal" x-cloak>
    <div class="modal__overlay" @click="closeModal"></div>

    <div 
        class="modal__content" 
        x-show="modalOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
    >
        <button class="modal__close" @click="closeModal" aria-label="Close modal">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        
        <div class="modal__scroll-wrapper">
            <template x-if="selectedProduct">
                <div>
                    <img 
                        :src="selectedProduct.image" 
                        :alt="selectedProduct.title" 
                        class="modal__image"
                        loading="lazy"
                    >
                    
                    <div class="modal__body">
                        <div class="modal__category" x-text="selectedProduct.category"></div>
                        <h2 class="modal__title" x-text="selectedProduct.title"></h2>
                        <div class="modal__price" x-text="'$' + parseFloat(selectedProduct.price).toFixed(2)"></div>
                        <p class="modal__description" x-text="selectedProduct.fullDescription"></p>
                        
                        <template x-if="selectedProduct.features && selectedProduct.features.length > 0">
                            <div class="modal__features">
                                <h3 class="modal__features-title">Key Features</h3>
                                <ul class="modal__features-list">
                                    <template x-for="feature in selectedProduct.features" :key="feature">
                                        <li class="modal__features-item" x-text="feature"></li>
                                    </template>
                                </ul>
                            </div>
                        </template>
                        
                        <div class="modal__actions">
                            <button class="modal__button modal__button--primary" @click="addToCart(selectedProduct.title)">
                                Add to Cart
                            </button>
                            <button class="modal__button modal__button--secondary" @click="closeModal">
                                Continue Shopping
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
