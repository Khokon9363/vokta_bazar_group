<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>

                <form @submit.prevent="sendMail">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Name</label>
                            <input type="text" v-model="name" class="form-control" placeholder="Name" id="name" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" v-model="email" class="form-control" placeholder="Email Address" id="email" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Phone Number</label>
                            <input type="tel" v-model="phone_number" class="form-control" placeholder="Phone Number" id="phone" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Message</label>
                            <textarea v-model="message" rows="5" class="form-control" placeholder="Message" id="message" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ContactComponent",
    data(){
        return{
            name : '',
            email : '',
            phone_number : '',
            message : '',
        }
    },
    methods:{
        sendMail(){
            axios.post('send_mail',{
                name : this.name,
                email : this.email,
                phone_number : this.phone_number,
                message : this.message
            })
            .then(response =>{
                alert('Thank for contact. Stay with us.')
                this.name = ''
                this.email = ''
                this.phone_number = ''
                this.message = ''
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
