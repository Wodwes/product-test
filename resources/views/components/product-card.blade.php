@props(['product'])

<div class="product-card" >
    <div class="product-card__image-container">
        <img class="product-card__image" src="{{ $product['image'] }}" alt="{{ $product['title'] }}" loading="lazy">
        <div class="product-card__category-badge">{{ $product['category'] }}</div>
        
        <div class="product-card__favorite-wrapper" data-favorite-button data-product-id="{{ $product['id'] }}"></div>

        <div class="product-card__overlay">
            <div class="product-card__actions">
                <button class="product-card__action" @click.stop="addToCart('{{ $product['title'] }}')">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="m1 1 4 4 2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                </button>
                <button class="product-card__action" @click.stop="openModal({{ json_encode($product) }})">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="product-card__content">
        <div class="product-card__info">
            <h3 class="product-card__title">{{ $product['title'] }}</h3>
            <p class="product-card__description">{{ $product['shortDescription'] }}</p>
        </div>

        <div class="product-card__bottom">
            <span class="product-card__price">${{ number_format($product['price'], 2) }}</span>
        </div>
    </div>
</div>
