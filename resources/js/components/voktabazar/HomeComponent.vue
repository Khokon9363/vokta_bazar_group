<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 mx-auto">
                <div class="post-preview">
                    <div class="row">

                        <div v-for="blog in blogsPages[currentPage -1]" :key="blog.id" class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-4">
                            <div class="card" style="border-radius: 21px;width: 20rem;margin-left: 5px">
                                <img :src="'/blogs/'+blog.image" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ blog.title }}</h5>
                                    <p class="card-text">{{ blog.short_desc }}</p>
                                    <button class="btn btn-primary" @click="long(blog.long_desc)">See more..</button>
                                </div>
                            </div>
                        </div>

                    </div>
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
                <hr>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "HomeComponent",
    data(){
        return{
            blogs : [],
            blogsPages: [],
            perPage: 12,
            pageCount: 1,
            currentPage: 1,
            message: 'No Data Found',
        }
    },
    created() {
        this.getBlogs()
    },
    methods:{
        getBlogs(){
            axios.get('/get_blogs_front')
            .then(response =>{
                this.blogs = response.data
                this.generatePages(this.blogs)
            })
            .catch(error =>{
                console.log(error)
            })
        },
        long(long){
            alert(long)
        },
        setCurrentPage (page) {
            this.currentPage = page
        },
        generatePages (blogs) {
            this.blogsPages = _.chunk(blogs, this.perPage)

            this.pageCount = 0
            this.pageCount = this.blogsPages.length
            if (this.pageCount === 0) {
                this.message = "Sorry! No blog Found"
            }
        },
    }
}
</script>

<style scoped>

</style>
