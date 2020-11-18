<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 m-auto">
                <div class="card">
                    <div class="card-header" v-if="authUserId === 1">Live chat with - {{selectedName}}</div>
                    <div class="card-header" v-else>Live chat with - ভোক্তা বাজার গ্রুপ</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4" v-show="authUserId === 1">
                                <div class="card card-borderless" style="max-height:450px;overflow:auto;">
                                    <ul>
                                        <li v-for="user in users" :key="user.id" @mouseenter="userSelected(user.id,user.name)" @click="userSelected(user.id,user.name)">{{user.name}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div v-bind:class="{ 'col-sm-8': isAdmin,'col-sm-10 m-auto': isUser }">
                                <div class="card" style="padding:10px;max-height:450px;overflow-x:hidden;">
                                    <div v-for="chat in chats" :key="chat.id">
                                    <div v-if="chat.sender_id === authUserId" class="col-sm-6 offset-sm-8" style="color:blue;">{{chat.chat}} <br><small class="time" style="color:black;">({{chat.created_at}})</small></div>
                                    <div v-else style="max-width:200px;color:red;">{{chat.chat}} <br><small class="time" style="color:black;">({{chat.created_at}})</small></div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group">
                                        <form @submit.prevent="send">
                                            <div class="row">
                                                <input type="text" v-model="chat" style="width:426px;margin-right:15px;" class="chat">
                                                <input type="hidden" v-model="receiver_id">
                                                <button type="submit" class="btn btn-success">Send</button>
                                            </div>
                                        </form>
                                    </div>
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
      data(){
          return{
              users : [],
              selectedName : null,
              chats : [],
              authUserId : Number(document.getElementById('authUserId').value),
              isAdmin : false,
              isUser : true,
              chat : '',
              receiver_id : 1,
          }
      },
      created(){
          setInterval(this.getUsers,1000)
          if (this.authUserId === 1) {
              this.isAdmin = true
              this.isUser = false
          }
          this.userSelected(1)
      },
      methods:{
          getUsers(){
              axios.get('all/users')
              .then(response =>{
                  this.users = response.data
              })
              .catch(error =>{
                  console.log(error);
              })
          },
          userSelected(userId,userName){
              this.selectedName = userName
              this.receiver_id = userId
              axios.get('all/chats/'+userId)
              .then(response =>{
                  if(response.data === 'None'){
                      this.chats = []
                  }else{
                      this.chats = response.data
                  }
              })
              .catch(error =>{
                  console.log(error);
              })

          },
          send(){
              axios.post('chat/send',{
                  chat : this.chat,
                  receiver_id : this.receiver_id
              })
              .then(response =>{
                  this.chat = ''
                  this.userSelected(this.receiver_id,this.selectedName)
              })
              .catch(error =>{
                  console.log(error);
              })
          }
      }
}
</script>
<style scoped>
    ul li{
       list-style-type :none;
       padding-top: 10px;
       padding-bottom: 10px;
       border :1px solid gainsboro;
       text-align: center;
   }
   .card-borderless{
       border: none;
   }
   ul li:active{
    background: gainsboro;
   }
   .chat:focus{
       border-radius: 6px;
       border: 1.5px solid red;
       outline: none;
       transition:0.5s;
   }
   .time{
       font-size: 64%;
   }
</style>