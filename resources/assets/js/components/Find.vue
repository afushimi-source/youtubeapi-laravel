<template>
    <div>
        <input type="text" v-model="str">
        <button v-on:click="search">検索</button> 
        <h4 v-if="hit_exist">ヒットしませんでした</h4>
        <ul>
            <li v-for="(hit,key) in hits" class="">
                <h3>rank: {{hit.rank}}</h3>
                <p>チャンネル名：{{hit.channel}}</p>
                <a v-bind:href="'/youtube/channel/detail/' + hit.channel_id">>>{{hit.channel}}の詳細をみる</a>
                <div>
                    <img v-bind:src="hit.thumbnail" width="480" height="360">
                </div>
                <h4>{{hit.title}}</h4>
                <!--<span v-html="video.iframe"></span>-->
            </li>
        </ul>
    </div>
</template>

<script>
    const axios = require('axios');
    export default {
        data:function(){
            return {
                str: '',
                hits: [],
                hit_exist: false,
            };
        },
        methods:{
            search:function(){
                axios.get('/youtube/find/' + this.str).then(response =>{
                    this.hits = response.data;
                    //console.log(this.videos);
                    if(this.hits.length == 0){
                        this.hit_exist = true;
                    }else{
                        this.hit_exist = false;
                    }
                });
            }
        }
    }
</script>
