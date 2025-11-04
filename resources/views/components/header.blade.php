<header class="header" x-data="{ mobileMenuOpen: false }">
    <div class="container header__container">
        <a class="header__logo" href="/">
            <img class="header__logo-image" src="/assets/images/logo.png" alt="ProductHub Logo">
        </a>

        <div class="header__right">
            <nav class="header__nav" :class="{ 'active': mobileMenuOpen }">
                <div class="header__nav-logo">
                    <a href="/" class="header__nav-logo-link" @click="mobileMenuOpen = false">
                        <img src="/assets/images/logo.png" alt="ProductHub Logo" class="header__nav-logo-image">
                    </a>
                </div>
                <ul class="header__menu">
                    <li><a class="header__link" href="#home" @click="mobileMenuOpen = false">Home</a></li>
                    <li><a class="header__link" href="#products" @click="mobileMenuOpen = false">Products</a></li>
                    <li><a class="header__link" href="#contact" @click="mobileMenuOpen = false">Contact</a></li>
                </ul>
            </nav>

            <div class="header__actions">
                <div class="header__cart-container">
                    <button class="header__cart" aria-label="Shopping cart">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" stroke="currentColor" viewBox="0 0 24 24"><!-- Icon from Material Symbols Light by Google - https://github.com/google/material-design-icons/blob/master/LICENSE -->
                            <path fill="currentColor" d="M9.5 7.5v-1h5v1zM7.308 21.116q-.633 0-1.067-.434t-.433-1.066t.433-1.067q.434-.433 1.067-.433t1.066.433t.434 1.067t-.434 1.066t-1.066.434m9.384 0q-.632 0-1.066-.434t-.434-1.066t.434-1.067q.434-.433 1.066-.433t1.067.433q.433.434.433 1.067q0 .632-.433 1.066q-.434.434-1.067.434M2 3.5v-1h2.448l4.096 8.616h6.635q.173 0 .308-.087q.134-.087.23-.24L19.213 4.5h1.14l-3.784 6.835q-.217.365-.564.573t-.763.208H8.1l-1.215 2.23q-.154.231-.01.5t.433.27h10.884v1H7.308q-.875 0-1.309-.735t-.018-1.485l1.504-2.68L3.808 3.5z" />
                        </svg>
                        <span class="header__cart-count">2</span>
                    </button>
                </div>

                <div class="header__wishlist-container" data-wishlist-button></div>

                <button class="header__hamburger" aria-label="Toggle menu" :class="{ 'active': mobileMenuOpen }" @click="mobileMenuOpen = !mobileMenuOpen">
                    <span class="hamburger-bar"></span>
                    <span class="hamburger-bar"></span>
                    <span class="hamburger-bar"></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu overlay -->
    <div class="overlay" :class="{ 'active': mobileMenuOpen }" @click="mobileMenuOpen = false"></div>
</header>
