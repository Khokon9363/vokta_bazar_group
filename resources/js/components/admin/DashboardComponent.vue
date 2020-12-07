<template>
    <main>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header text-center">
                            <h2><i class="far fa-clock"></i></h2>
                            <h2>সময়</h2>
                        </div>
                        <div class="card-body text-center" id="time"></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header text-center">
                            <h2><i class="fas fa-calendar-week"></i></h2>
                            <h2>তারিখ</h2>
                        </div>
                        <div class="card-body text-center" id="date"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
export default {
    name: "DashboardComponent",
    created(){
      setInterval(this.time,1000)
      setInterval(this.date,86400000)
    },
    methods:{
        time(){
            var x = new Date();
            document.getElementById('time').innerHTML = x.toLocaleTimeString()
        },
        date(){
            var y = new Date();
            var day = y.getDay();
            if(day === 0){
                var realDay = 'Sunday'
            }else if(day === 1){
                var realDay = 'Monday'
            }
            else if(day === 2){
                var realDay = 'Tuesday'
            }
            else if(day === 3){
                var realDay = 'Wednesday'
            }
            else if(day === 4){
                var realDay = 'Thursday'
            }
            else if(day === 5){
                var realDay = 'Friday'
            }
            else if(day === 6){
                var realDay = 'Saterday'
            }
            document.getElementById('date').innerHTML = y.toLocaleDateString()+' (' + realDay +') '
        }
    }
}
</script>

<style scoped>
   h2{
       font-weight: bolder;
       letter-spacing: 10px;
       margin: 0;
       padding: 0;
   }
   #time,#date{
       font-size: 25px;
   }
</style>
