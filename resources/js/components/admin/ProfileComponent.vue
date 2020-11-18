<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-header text-center">Manage your profile</div>
                    <div class="card-body">
                        <form @submit.prevent="updateProfile">
                            <label for="facebook">Name</label>
                            <input type="text" v-model="name" class="form-control" id="facebook">
                            <label for="twitter">Email</label>
                            <input type="text" v-model="email" class="form-control" id="twitter">
                            <label for="twitterx">Change password</label>
                            <input type="text" v-model="password" placeholder="Write here a new password if you want to change the current" class="form-control" id="twitterx">
                            <button class="btn btn-success btn-block mt-4">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProfileComponent",
    data(){
        return{
            name : '',
            email : '',
            password : ''
        }
    },
    created() {
        this.getProfile()
    },
    methods:{
        getProfile(){
            axios.get('/get_profile')
            .then(response =>{
                this.name = response.data[0]
                this.email = response.data[1]
            })
            .catch(error =>{
                console.log(error)
            })
        },
        updateProfile(){
            axios.post('update_profile',{
                name : this.name,
                email : this.email,
                password : this.password
            })
            .then(response =>{
                alert('Your profile informations updated successfully')
                this.getProfile()
                this.password = ''
            })
            .catch(error =>{
                console.log(error)
            })
        }
    }
}
</script>

<style scoped>

</style>
