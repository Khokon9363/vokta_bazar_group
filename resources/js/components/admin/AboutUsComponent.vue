<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-header text-center">আপনার ওয়েবসাইট সম্পর্কে এখানে লিখুন</div>
                    <div class="card-body">
                        <div class="form-group">
                            <form @submit.prevent="saveAbout()">
                                <textarea rows="20" v-model="about" class="form-control"></textarea>
                                <button class="btn btn-success btn-block mt-3">{{ updateMode ? 'Update' : 'Save' }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AboutUsComponent",
    data(){
        return{
            about : '',
            updateMode : false
        }
    },
    created() {
        this.getAbout()
    },
    methods:{
        getAbout(){
            axios.get('/get_about')
            .then(response =>{
                this.about = response.data
                if (response.data !== ''){
                    this.updateMode = true
                }
            })
            .catch(error =>{
                console.log(error)
            })
        },
        saveAbout(){
            axios.post('save_about',{
                about : this.about
            })
            .then(response =>{
                if (this.updateMode === false){
                    alert('About saved successfully')
                    this.getAbout()
                }else {
                    alert('About updated successfully')
                    this.getAbout()
                }
            })
        }
    }

}
</script>

<style scoped>

</style>
