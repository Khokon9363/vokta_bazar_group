<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-10 m-auto">
                <div class="card">
                    <div class="card-header text-center">সামাজিক লিঙ্কগুলি যুক্ত বা আপডেট করুন</div>
                    <div class="card-body">
                        <form @submit.prevent="saveLinks">
                            <label for="facebook">Facebook</label>
                            <input type="text" v-model="facebook" class="form-control" id="facebook">
                            <label for="twitter">Twitter</label>
                            <input type="text" v-model="twitter" class="form-control" id="twitter">
                            <label for="google">Google+</label>
                            <input type="text" v-model="google" class="form-control" id="google">
                            <label for="github">Github</label>
                            <input type="text" v-model="github" class="form-control" id="github">
                            <label for="whatsapp">Whatsapp</label>
                            <input type="text" v-model="whatsapp" class="form-control" id="whatsapp">
                            <label for="skype">Skype</label>
                            <input type="text" v-model="skype" class="form-control" id="skype">
                            <button class="btn btn-success btn-block mt-4">{{ updateMode ? 'Update' : 'Save' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SocialLinksComponent",
    data(){
        return{
            facebook : '',
            twitter  : '',
            google   : '',
            github   : '',
            whatsapp : '',
            skype    : '',
            updateMode : false,
        }
    },
    created() {
        this.getLinks()
    },
    methods:{
        getLinks(){
            axios.get('/get_links')
                .then(response =>{
                    this.facebook = response.data.facebook
                    this.twitter = response.data.twitter
                    this.google = response.data.google
                    this.github = response.data.github
                    this.whatsapp = response.data.whatsapp
                    this.skype = response.data.skype
                    if (response.data !== ''){
                        this.updateMode = true
                    }
                })
                .catch(error =>{
                    console.log(error)
                })
        },
        saveLinks(){
            axios.post('save_links',{
                facebook : this.facebook,
                twitter : this.twitter,
                google : this.google,
                github : this.github,
                whatsapp : this.whatsapp,
                skype : this.skype,
            })
                .then(response =>{
                    if (this.updateMode == false){
                        alert('Links saved successfully')
                        this.getLinks()
                    }else {
                        alert('Links updated successfully')
                        this.getLinks()
                    }
                })
        }
    }
}
</script>

<style scoped>

</style>
