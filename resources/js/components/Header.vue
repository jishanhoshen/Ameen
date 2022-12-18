<template>
<header>
    <div class="header-block d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="header-left d-flex flex-column flex-md-row align-items-center">
                        <p class="d-flex align-items-center">
                            <i class="fas fa-envelope"></i>
                            <span>{{ company.email }}</span>
                        </p>
                        <p class="d-flex align-items-center">
                            <i class="fas fa-phone"></i>
                            <span>{{ company.phone }}</span>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="header-right d-flex flex-column flex-md-row justify-content-md-end justify-content-center align-items-center">
                        <div class="social-link d-flex">
                            <a :href="company.facebook">
                                <i class="fab fa-facebook-f"> </i>
                            </a>
                        </div>
                        <div class="social-link d-flex">
                            <a :href="company.facebook">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                        <div class="social-link d-flex">
                            <a :href="company.facebook">
                                <i class="fab fa-invision"> </i>
                            </a>
                        </div>
                        <div class="social-link d-flex">
                            <a :href="company.facebook">
                                <i class="fab fa-pinterest-p"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2">
                    <a class="logo" href="/"><img :src="(company != '' ? 'assets/images/'+company.logo : 'transparent.png')" :alt="company.name"/></a>
                </div> 
                <div class="col-8">
                    <div class="navgition-menu d-flex align-items-center justify-content-center">
                        <ul class="mb-0">
                            <li class="toggleable">
                                <a class="menu-item active" href="/">Home</a>
                            </li>
                            <li class="toggleable">
                                <a class="menu-item" href="{{}}">Products</a>
                            </li>
                            <li class="toggleable">
                                <a class="menu-item" href="{{}}">About us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-2">
                    <div class="navgition-menu d-flex align-items-center justify-content-center">
                        <ul class="mb-0">
                            <li class="toggleable">
                                <a class="menu-item active" href="/">Become a Distributor</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div id="mobile-menu">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="mobile-menu_block d-flex align-items-center">
                        <a class="mobile-menu--control" href="#"><i class="fas fa-bars"></i></a>
                        <div id="ogami-mobile-menu">
                            <button class="no-round-btn" id="mobile-menu--closebtn">
                                Close menu
                            </button>
                            <div class="mobile-menu_items">
                                <ul class="mb-0 d-flex flex-column">
                                    <li class="toggleable">
                                        <a class="menu-item active" href="/">Home</a>
                                    </li>
                                    <li class="toggleable">
                                        <a class="menu-item" href="{{}}">Products</a>
                                    </li>
                                    <li class="toggleable">
                                        <a class="menu-item" href="{{}}">About us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ogamin-mobile-menu_bg"></div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="mobile-menu_logo text-center d-flex justify-content-center align-items-center">
                        <a href=""><img :src="(company != '' ? 'assets/images/'+company.logo : 'transparent.png')" :alt="company.name"/></a>
                    </div>
                </div>
                <div class="col-4">
                    <button class="no-round-btn py-2 px-3">Join Us</button>
                </div>
            </div>
        </div>
    </div>
</header>
</template>

<script>
export default {
    props: ['company']
};
</script>
