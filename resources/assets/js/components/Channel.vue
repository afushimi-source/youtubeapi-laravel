<template>
  <div class="small">
    <button @click="fillData()">show</button>
    <bar-chart :chart-data="renderChart"></bar-chart>
    
  </div>
</template>

<script>
  import BarChart from '../chart/BarChart.js'
  const axios = require('axios');
  export default {
    components: {
      BarChart
    },
    data () {
      return {
        //datacollection: null,
        renderChart: null,
        channels: [],
        names: [],
        counts: []
      }
    },
    created() {
      axios.get('/youtube/channel/json').then(response =>{
        this.channels = response.data;
        this.names = this.channels.map(channel => channel.name);
        this.counts = this.channels.map(channel => channel.count_rankIn);
     })
    },
    
    
    methods: {
       fillData () {
         this.renderChart = {
           labels: this.names,
           datasets: [
             {
               label: 'Data One',
               backgroundColor: '#f87979',
               data: this.counts
             }
           ]
         }
       }
    }
  }
</script>

<style>
  .small {
    max-width: 600px;
    margin:  150px auto;
  }
</style>