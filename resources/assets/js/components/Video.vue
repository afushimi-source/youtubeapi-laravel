<template>
    <div class="container">
        <input type="text" v-model="date">
        <button v-on:click="doAsc">asc</button>
        <button v-on:click="doDesc">desc</button>

        <hr>
        <ul>
            <li v-for="(video,key) in videos">
                <p>{{video.id}}: {{video.title}} ({{video.rank}})</p>
                <span v-html="video.iframe"></span>
            </li>
        </ul>
        <p>{{date}}</p>
    </div>
</template>

<script>
    const axios = require('axios');
    export default {
         mounted() {
             axios.get('/youtube/video/json/asc').then(response =>{
                 this.videos = response.data;
                 this.msg = 'get data!';
             });
        
     },
    data:function(){
        return {
            msg:'wait...',
            date:'',
            videos:[],
        };
    },
    methods:{
        doDesc:function(){
                axios.get('/youtube/video/json/desc/' + this.date).then(response =>{
                this.videos = response.data;
                this.msg = 'get video data!';
            });
        },
        doAsc:function(){
                axios.get('/youtube/video/json/asc/' + this.date).then(response =>{
                this.videos = response.data;
                this.msg = 'get video data!';
            });
        }
    },
}
  
</script>