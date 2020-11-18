<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>
                    {{ about }}
                </p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "AboutComponent",
    data(){
        return{
            about : '',
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
    }
}
</script>

<style scoped>

</style>
