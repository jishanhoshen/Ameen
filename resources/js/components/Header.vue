<template>
<header>
    <div class="header-block d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="header-left d-flex flex-column flex-md-row align-items-center">
                        <p class="d-flex align-items-center">
                            <i class="fas fa-envelope"></i>
                            <span>info.deercreative@gmail.com</span>
                        </p>
                        <p class="d-flex align-items-center">
                            <i class="fas fa-phone"></i>
                            <span>+65 11.188.888</span>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="header-right d-flex flex-column flex-md-row justify-content-md-end justify-content-center align-items-center">
                        <div class="social-link d-flex">
                            <a href="https://www.facebook.com/allahardanfoodbeverage">
                                <i class="fab fa-facebook-f"> </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <a class="logo" href="/"><img src="assets/images/logo.png" alt="" /></a>
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
                                <a class="menu-item active" href="/">Join Us</a>
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
                <div class="col-6">
                    <div class="mobile-menu_logo text-center d-flex justify-content-center align-items-center">
                        <a href=""><img src="assets/images/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-3">
                    <button class="no-round-btn">Join Us</button>
                </div>
            </div>
        </div>
    </div>
    <div class="navigation-filter">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-4 col-xl-3 order-2 order-md-1">
                    <div class="department-menu_block">
                        <div class="department-menu d-flex justify-content-between align-items-center">
                            <i class="fas fa-bars"></i>Categories<span><i class="arrow_carrot-down"></i></span>
                        </div>
                        <div class="department-dropdown-menu">
                            <ul>
                                <li>
                                    <a href="shop_grid+list_3col.html">
                                        <i class="icon-1"></i>Fresh Meat</a>
                                </li>
                                <li>
                                    <a href="shop_grid+list_3col.html">
                                        <i class="icon-2"></i>Vegetables</a>
                                </li>
                                <li>
                                    <a href="shop_grid+list_3col.html">
                                        <i class="icon-3"></i>Fruit & Nut
                                        Gifts</a>
                                </li>
                                <li>
                                    <a href="shop_grid+list_3col.html">
                                        <i class="icon-4"></i>Fresh
                                        Berries</a>
                                </li>
                                <li>
                                    <a href="shop_grid+list_3col.html">
                                        <i class="icon-5"></i>Ocean Foods</a>
                                </li>
                                <li>
                                    <a href="shop_grid+list_3col.html"><i class="icon-6"></i>Butter &
                                        Eggs</a>
                                </li>
                                <li>
                                    <a href="shop_grid+list_3col.html"><i class="icon-7"></i>Fastfood</a>
                                </li>
                                <li>
                                    <a href="shop_grid+list_3col.html">
                                        <i class="icon-8"></i>Fresh Onion</a>
                                </li>
                                <li>
                                    <a href="shop_grid+list_3col.html">
                                        <i class="icon-9"></i>Papayaya &
                                        Crisps</a>
                                </li>
                                <li>
                                    <a href="shop_grid+list_3col.html"><i class="icon-10"></i>Oatmeal</a>
                                </li>
                                <li>
                                    <a href="shop_grid+list_3col.html">
                                        <i class="icon-11"></i>Fresh
                                        Bananas</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8 col-lg-8 col-xl-9 order-1 order-md-2">
                    <div class="website-search">
                        <div class="row no-gutters">
                            <div class="col-0 col-md-0 col-lg-4 col-xl-3">
                                <div class="filter-search">
                                    <div class="categories-select d-flex align-items-center justify-content-around">
                                        <span>All Categories</span><i class="arrow_carrot-down"></i>
                                    </div>
                                    <div class="categories-select_box">
                                        <ul>
                                            <li>Fruit & Nut Gifts</li>
                                            <li>Fresh Berries</li>
                                            <li>Ocean Foods</li>
                                            <li>Butter & Eggs</li>
                                            <li>Ocean Foods</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 col-md-8 col-lg-5 col-xl-7">
                                <div class="search-input">
                                    <input class="no-round-input no-border" type="text" placeholder="What do you need" />
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-lg-3 col-xl-2">
                                <button class="no-round-btn">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
</template>

<script>
export default {};
</script>
