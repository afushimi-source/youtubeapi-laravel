<template>
    <div class="container">
        <button v-on:click="prevDate">前の日</button>
        <input type="text" v-model="date">
        <button v-on:click="nextDate">次の日</button>
        <p><button v-on:click="doAction">この条件で探す</button></p>
          <p v-if="err_exist" class="err">{{error}}</p>
        <hr>
        <h2>{{viewDate}}で急上昇になった動画</h2>
        <hr>
        <ul>
            <li v-for="(video,key) in videos" class="part-video">
                <h3>rank: {{video.rank}}</h3>
                <p>チャンネル名：{{video.channel}}</p>
                <a v-bind:href="'/youtube/channel/detail/' + video.channel_id">>>{{video.channel}}の詳細をみる</a>
                <div>
                    <img v-bind:src="video.thumbnail" width="480" height="360">
                </div>
                <h4>{{video.title}}</h4>
                <!--<span v-html="video.iframe"></span>-->
            </li>
        </ul>
        <h3 v-if="video_exist">Sorry...この日付の動画は存在しません</h3>
    </div>
</template>

<script>
    const axios = require('axios');
    var yesterday = new Date();
    yesterday.setDate(yesterday.getDate() - 1);
    var date = yesterday.getFullYear() + "-" + (yesterday.getMonth() + 1) + "-" + yesterday.getDate();;
    export default {
         mounted() {
             axios.get('/youtube/video/json/asc/' + this.date).then(response =>{
                console.log(this.date);
                if(this.videos.length == 0){
                    this.video_exist = true;
                }else{
                    this.video_exist = false;
                }
                 this.videos = response.data;
                 this.msg = 'get data!';
             });
        
     },
    data:function(){
        return {
            msg:'wait...',
            yesterday: yesterday,
            date: date,
            viewDate: date,
            videos: '',
            month : '',
            day: '',
            error: '',
            video_exist: false,
            msg: '',
            err_exist: false,
        };
    },
    methods:{
        doAction:function(e){
                this.err_exist = false;
                //this.msg = /^\d{4}-\d{1,2}-\d{1,2}$/.test(this.date);
                //console.log(this.date);
                //console.log(this.msg);
                if(/^\d{4}-\d{1,2}-\d{1,2}$/.test(this.date)){
                    axios.get('/youtube/video/json/asc/' + this.date).then(response =>{
                    this.videos = response.data;
                    //console.log(this.videos);
                    if(this.videos.length == 0){
                        this.video_exist = true;
                    }else{
                        this.video_exist = false;
                    }
                    this.viewDate = this.date;
                    this.msg = 'get video data!';
                });
            }else{
                this.err_exist = true;
                this.error = '半角数字でyyyy-mm-ddの形式で入力してください'
                e.preventDefault();
            }        
        },
        prevDate:function(){
            this.yesterday.setDate(this.yesterday.getDate() - 1);
            this.date = this.yesterday.getFullYear() + "-" + (this.yesterday.getMonth() + 1) + "-" + this.yesterday.getDate();

        },
        nextDate:function(){
            this.yesterday.setDate(this.yesterday.getDate() + 1);
            this.date = this.yesterday.getFullYear() + "-" + (this.yesterday.getMonth() + 1) + "-" + this.yesterday.getDate();
        },
        
    },
}
  
</script>

<style>
    ul {
      list-style: none;
    }
    .part-video{
        margin-bottom: 65px;
    }
    .err{
        color: red;
        font-size: 24px;
    }
</style>