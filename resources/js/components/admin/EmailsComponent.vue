<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12 m-auto">
                <div class="card">
                    <div class="card-header text-center">ব্যবহারকারী এবং দর্শকদের ইমেল
                        <div class="col-md-4">
                        <input type="text" name="search" v-model="search" class="form-control" placeholder="search by phone number">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone number</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody v-if="emailsPages.length > 0">
                                <tr v-for="(email,index) in emailsPages[currentPage -1]" :key="email.id">
                                    <td>{{ ++index }}</td>
                                    <td>{{ email.name }}</td>
                                    <td>{{ email.email }}</td>
                                    <td>{{ email.phone_number }}</td>
                                    <td>{{ email.message }}</td>
                                    <td><button class="btn btn-danger" @click="delEmail(email.id)">Delete</button></td>
                                </tr>
                                </tbody>
                                <tbody v-else>
                                    <tr>
                                        <td colspan="6" style="background-color: darkorange" role="alert"><span style="color: white; font-size: 18px;">{{ message }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <paginate style="padding:10px;border:1px solid;"
                                            v-if="pageCount > 1"
                                            :page-count="pageCount"
                                            v-model="currentPage"
                                            :prev-text="'Prev'"
                                            :next-text="'Next'"
                                            :container-class="'pagination justify-content-center'"
                                        >
                                        </paginate>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "EmailsComponent",
    data(){
        return{
            emails : [],
            emailsPages: [],
            perPage: 20,
            pageCount: 1,
            currentPage: 1,
            search: '',
            message: 'No Data Found',
        }
    },
    created() {
        this.getEmails()
    },
    watch: {
        search (value) {
            this.setCurrentPage(1)
            this.generatePages(this.emails)
            if (this.search != '') {
                let search = this.emails.filter(e => {
                    if (e.phone_number.indexOf(this.search) !== -1) {
                        return e
                    }
                })
                this.generatePages(search)
            }
        },
    },
    methods:{
        getEmails(){
            axios.get('/get_emails')
            .then(response =>{
                this.emails = response.data
                this.generatePages(this.emails)
            })
            .catch(error =>{
                console.log(error)
            })
        },
        delEmail(emailId){
            axios.get('/delete_email/'+emailId)
            .then(response =>{
                alert('Email deleted successfully')
                this.getEmails()
                this.generatePages(this.emails)
            })
            .catch(error =>{
                console.log(error)
            })
        },
        setCurrentPage (page) {
            this.currentPage = page
        },
        generatePages (emails) {
            this.emailsPages = _.chunk(emails, this.perPage)

            this.pageCount = 0
            this.pageCount = this.emailsPages.length
            if (this.pageCount == 0) {
                this.message = "Sorry! No email Found"
            }
        },
    }
}
</script>

<style scoped>

</style>
