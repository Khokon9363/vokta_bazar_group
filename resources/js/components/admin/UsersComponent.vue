<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12 m-auto">
                <div class="card">
                    <div class="card-header text-center">আপনার ওয়েবসাইটের সমস্ত ব্যবহারকারী</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center table-bordered" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Key code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(user,index) in users" :key="user.id">
                                    <td>{{ ++index }}</td>
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>{{ user.key_code }}</td>
                                    <td v-if="user.status === 1"><span style="color:green;">Active</span></td>
                                    <td v-else><span style="color:red;">Deactive</span></td>
                                    <td>
                                        <button v-if="user.status === 0" class="btn btn-success btn-sm" @click="activeUser(user.id)">Active</button>
                                        <button v-else class="btn btn-info btn-sm text-white" @click="deactiveUser(user.id)">Deactive</button>
                                        <button class="btn btn-danger btn-sm" @click="delUser(user.id)">Delete</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "UsersComponent",
    data(){
        return{
            users : [],
        }
    },
    created() {
        this.getUsers()
    },
    methods:{
        getUsers(){
            axios.get('/get_users')
            .then(response =>{
                this.users = response.data
            })
            .catch(error =>{
                console.log(error)
            })
        },
        delUser(userId){
            axios.get('/delete_user/'+userId)
            .then(response =>{
                alert('User deleted successfully')
                this.getUsers()
            })
            .catch(error =>{
                console.log(error)
            })
        },
        deactiveUser(userId){
            axios.get('/deactive_user/'+userId)
            .then(response =>{
                alert('User deactivated successfully')
                this.getUsers()
            })
            .catch(error =>{
                console.log(error)
            })
        },
        activeUser(userId){
            axios.get('/active_user/'+userId)
            .then(response =>{
                alert('User activated successfully')
                this.getUsers()
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
