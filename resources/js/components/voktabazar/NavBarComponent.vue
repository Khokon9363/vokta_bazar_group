<template>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <router-link class="navbar-brand" to="/">{{ siteName }}</router-link>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <router-link class="nav-link" to="/" style="font-size:18px;">হোম</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/about" style="font-size:18px;">আমাদের সম্পর্কে</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/contact" style="font-size:18px;">যোগাযোগ</router-link>
                    </li>
                    <li v-show="logedIn == null" class="nav-item">
                        <a class="nav-link" href="login" style="font-size:18px;">লগ-ইন</a>
                    </li>
                    <li v-show="logedIn == null" class="nav-item">
                        <a class="nav-link" href="register" style="font-size:18px;">রেজিষ্ট্রেশন</a>
                    </li>
                    <li v-show="logedIn === 'Yes'" class="nav-item">
                        <a class="nav-link" href="home" style="font-size:18px;color:white;">ড্যাশবোর্ড</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "NavBarComponent",
    data(){
        return{
            siteName : 'ভোক্তা বাজার গ্রুপ',
            logedIn  : null,
        }
    },
    created() {
        if (document.getElementById('logedIn')){
            this.logedIn = 'Yes';
        }
    }
}
</script>

<style scoped>

</style>
