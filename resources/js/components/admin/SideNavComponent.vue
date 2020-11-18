<template>
    <div class="nav">
        <div class="sb-sidenav-menu-heading">Interface</div>
        <router-link class="nav-link" to="home">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            ড্যাশবোর্ড
        </router-link>
        <router-link class="nav-link" to="live_chat">
            <div class="sb-nav-link-icon"><i class="far fa-comments"></i></div>
            সরাসরি কথোপকথন
        </router-link>
        <div v-show="checkRole">
        <div class="sb-sidenav-menu-heading">Blogs</div>
        <router-link class="nav-link" to="manage_blogs">
            <div class="sb-nav-link-icon"><i class="fas fa-blog"></i></div>
            ব্লগ পরিচালনা করুন
        </router-link>
        <div class="sb-sidenav-menu-heading">Website settings</div>
        <router-link class="nav-link" to="social_links">
            <div class="sb-nav-link-icon"><i class="fas fa-link"></i></div>
            সামাজিক বন্ধন
        </router-link>
        <router-link class="nav-link" to="emails">
            <div class="sb-nav-link-icon"><i class="fas fa-envelope-square"></i></div>
            ইমেলগুলি
        </router-link>
        <router-link class="nav-link" to="users">
            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
            ব্যবহারকারীরা
        </router-link>
        <router-link class="nav-link" to="about_us">
            <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></i></div>
            আমাদের সম্পর্কে
        </router-link>
        </div>
    </div>
</template>

<script>
export default {
name: "SideNavComponent",
    data(){
        return{
            checkRole : null
        }
    },
    created() {
        if (document.getElementById('roleCheck')){
            if (document.getElementById('roleCheck').value === '1'){
                this.checkRole = 'Admin'
            }
        }
    }
}
</script>

<style scoped>

</style>
