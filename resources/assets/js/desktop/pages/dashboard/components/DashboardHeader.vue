<template>
    <div>
        {{user.name}}
    </div>
</template>
<script>
import {mapState} from 'vuex'

export default {
    name: 'DashboardHeader',
    props: ['user'],
    data(){
        return {
            //
        }
    },
    methods:{
        ...mapState(['dashboard.user'])
    },
}
</script>
<style>
    .el-header, .el-footer {
      background-color: #B3C0D1;
      color: #333;
      text-align: center;
      /* line-height: 60px; */
    }
</style>
