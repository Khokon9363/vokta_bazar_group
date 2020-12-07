<template>
    <div>
        <div class="container">
            <div class="row mt-3">
                <div class="col-sm-10 m-auto">
                    <div class="card">
                        <div class="card-header text-center">একটি নতুন ব্লগ যুক্ত করুন</div>
                        <div class="card-body">
                            <form @submit.prevent="saveBlog">
                                <label for="facebook">Blog title</label>
                                <input type="text" v-model="title" class="form-control" id="facebook">
                                <label for="twitter">Short description</label>
                                <input type="text" v-model="short_desc" class="form-control" id="twitter">
                                <label for="google">Long description</label>
                                <textarea v-model="long_desc" id="google" class="form-control" cols="30" rows="10"></textarea>
                                <label for="image">Blog image</label>
                                <img src="" id="imgPreview" class="m-3">
                                <input type="file" class="form-control" id="image" @change="imageFile">
                                <button class="btn btn-success btn-block mt-4">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-3">
                <div class="col-sm-12 m-auto">
                    <div class="card">
                        <div class="card-header text-center">সমস্ত ব্লগ</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-center table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Blog title</th>
                                        <th>Image</th>
                                        <th>Short desc</th>
                                        <th style="width: 100px">Long desc</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(blog,index) in blogs" :key="blog.id">
                                        <td>{{ ++index }}</td>
                                        <td>{{ blog.title }}</td>
                                        <td><img :src="'/blogs/'+blog.image" style="height: 100px;width: 100px;"></td>
                                        <td style="width: 182px;">{{ blog.short_desc }}</td>
                                        <td @click="showLong(blog.long_desc)">Click me !</td>
                                        <td v-if="blog.status == 0">Deactive</td>
                                        <td v-else>Active</td>
                                        <td>
                                            <button v-if="blog.status == 0" @click="activeBlog(blog.id)" class="btn btn-success btn-sm">Active</button>
                                            <button v-else @click="deactiveBlog(blog.id)" class="btn btn-info btn-sm text-white">Deactive</button>
                                            <button @click="deleteBlog(blog.id)" class="btn btn-danger btn-sm">Delete</button>
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
    </div>
</template>

<script>
export default {
    name: "ManagaBlogsComponent",
    data(){
        return{
            blogs : [],
            title : '',
            short_desc : '',
            long_desc : '',
        }
    },
    created() {
        this.getBlogs()
    },
    methods:{
        getBlogs(){
            axios.get('/get_blogs')
            .then(response =>{
                this.blogs = response.data
            })
            .catch(error =>{
                console.log(error)
            })
        },
        imageFile(e) {
            if (e.target.files[0]) {
                let imageFile = e.target.files[0];
                let reader = new FileReader();
                reader.onload = function () {
                    let output = document.getElementById('imgPreview');
                    output.src = reader.result;
                    output.style.width = "25%"
                }
                reader.readAsDataURL(e.target.files[0])
            }
        },
        saveBlog() {
            let data = new FormData();
            let img = document.getElementById("image").files[0];
            data.append('image', img);
            data.append('title', this.title);
            data.append('short_desc', this.short_desc);
            data.append('long_desc', this.long_desc);
            axios.post('save_blog', data)
                .then(response => {
                    this.title = '';
                    this.short_desc = '';
                    this.long_desc = '';
                    $('#image').val('');
                    $('#imgPreview').src = '';
                    alert('Blog uploader successfully. Please active ths blog now')
                    this.getBlogs()
                }).catch(error => {
                console.log(error);
            })
        },
        showLong(longDesc){
            alert(longDesc)
        },
        deleteBlog(blogId){
            axios.get('/delete_blog/'+blogId)
            .then(response =>{
                alert('Blog deleted successfully')
                this.getBlogs()
            })
            .catch(error =>{
                console.log(error)
            })
        },
        activeBlog(blogId){
            axios.get('/active_blog/'+blogId)
                .then(response =>{
                    alert('Blog activated successfully')
                    this.getBlogs()
                })
                .catch(error =>{
                    console.log(error)
                })
        },
        deactiveBlog(blogId){
            axios.get('/deactive_blog/'+blogId)
                .then(response =>{
                    alert('Blog deactivated successfully')
                    this.getBlogs()
                })
                .catch(error =>{
                    console.log(error)
                })
        },

    }
}
</script>

<style scoped>
  img{
      height: 80px;
      width: auto;
  }
</style>
