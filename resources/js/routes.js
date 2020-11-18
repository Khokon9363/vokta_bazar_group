import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeComponent from "./components/voktabazar/HomeComponent";
import AboutComponent from "./components/voktabazar/AboutComponent";
import ContactComponent from "./components/voktabazar/ContactComponent";
import AboutUsComponent from "./components/admin/AboutUsComponent";
import DashboardComponent from "./components/admin/DashboardComponent";
import EmailsComponent from "./components/admin/EmailsComponent";
import ManagaBlogsComponent from "./components/admin/ManagaBlogsComponent";
import SocialLinksComponent from "./components/admin/SocialLinksComponent";
import UsersComponent from "./components/admin/UsersComponent";
import ProfileComponent from "./components/admin/ProfileComponent";
import LiveChatComponent from "./components/admin/LiveChatComponent";

Vue.use(VueRouter)


const router  = new VueRouter({
    mode : 'history',
    routes : [
        {
            path      : '/',
            component : HomeComponent
        },
        {
            path      : '/about',
            component : AboutComponent
        },
        {
            path      : '/contact',
            component : ContactComponent
        },
        {
            path      : '/about_us',
            component : AboutUsComponent
        },
        {
            path      : '/home',
            component : DashboardComponent
        },
        {
            path      : '/emails',
            component : EmailsComponent
        },
        {
            path      : '/manage_blogs',
            component : ManagaBlogsComponent
        },
        {
            path      : '/social_links',
            component : SocialLinksComponent
        },
        {
            path      : '/users',
            component : UsersComponent
        },
        {
            path      : '/profile',
            component : ProfileComponent
        },
        {
            path      : '/live_chat',
            component : LiveChatComponent
        },

    ]
})

export default router
