<template>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 text-sm-center text-md-left">
                <div class="footer-logo"><img v-if="logo" :src="'assets/images/'+(logo)" :alt="company.name"/></div>
                <div class="footer-contact">
                    <p>Address: {{ company.address }}</p>
                    <p>Phone: {{ company.phone }}</p>
                    <p>Email: {{ company.email }}</p>
                </div>
                <div class="footer-social">
                    <a class="round-icon-btn" href="">
                        <i class="fab fa-facebook-f"> </i>
                    </a>
                    <a class="round-icon-btn" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="round-icon-btn" href="">
                        <i class="fab fa-invision"> </i>
                    </a>
                    <a class="round-icon-btn" href="">
                        <i class="fab fa-pinterest-p"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-12 col-sm-6 text-sm-center text-md-left">
                        <div class="footer-quicklink">
                            <h5>Infomation</h5>
                            <a href="#">About us</a>
                            <a href="#">Product Info</a>
                            <a href="#">Terms and Conditions</a>
                            <a href="#">Become a Distributor</a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 text-sm-center text-md-left">
                        <div class="footer-quicklink">
                            <h5>Join us</h5>
                            <a href="#">Depot</a>
                            <a href="#">Dealer</a>
                            <a href="#">Career</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="newletter">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 col-md-7">
                    <div class="newletter_text text-center text-md-left">
                        <h5>Become a distributor</h5>
                        <p>Enter your email here to distribute Ameen products all over Bangladesh. <br> <a href="#">Must read</a> before Submitting Contact</p>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="newletter_input">
                        <input class="round-input" type="text" placeholder="Enter your email">
                        <button>Subcribe</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-credit">
        <div class="container">
            <div class="footer-creadit_block d-flex flex-column flex-md-row justify-content-center align-items-center">
                <p class="author">Copyright © {{ since() }} {{company.name}} All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
</template>

<script>
export default {
    props: ['company'],
    data(){
        return{
            logo: (this.company ? this.company.logo : []), 
        }
    },
    methods: {
        since() {
            if (this.currentDate() == this.company.since) {
                return this.currentDate();
            } else {
                return this.company.since + ' - ' + this.currentDate();
            }
        },
        currentDate() {
            const current = new Date();
            // const date = `${current.getDate()}/${current.getMonth()+1}/${current.getFullYear()}`;
            const date = `${current.getFullYear()}`;
            return date;
        }
    }
}
</script>
