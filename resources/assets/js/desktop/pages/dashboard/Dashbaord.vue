<template>
    <el-container class="main-container">
        <DashboardAside />
        <el-container>
            <el-header>
                <DashboardHeader :user="user" />
            </el-header>
            <el-main>
                <el-row>
                    <el-button-group>
                        <el-button type="primary">Commercial</el-button>
                        <el-button type="primary">Promotion</el-button>
                        <el-button type="info" @click="showModal('agency')" >Agency</el-button>
                        <el-button type="info" @click="showModal('client')" :business="'client'">Client</el-button>
                    </el-button-group>
                </el-row>
                <BusinessModal :visible="modals.agency" :business="'agency'" @agency:modal:close="hideModal('agency')"/>
            </el-main>
        </el-container>
    </el-container>
</template>
<script>
import {mapActions, mapState} from 'vuex'
import DashboardAside from './components/DashboardAside'
import DashboardHeader from './components/DashboardHeader'
import BusinessModal from './components/modals/BusinessModal'

export default {
    name: 'Dashboard',
    components:{
        DashboardAside,
        DashboardHeader,
        BusinessModal
    },
    data(){
        return {
            modals:{
                agency:false,
                client:false
            }
        }
    },
    computed:{
        ...mapState({
            user: state => state.dashboard.user
        })
    },
    mounted(){
        this.getUser();
    },
    methods:{
        ...mapActions(['getUser']),
        showModal(modal){
            this.modals[modal] = !this.modals[modal]
        },
        hideModal(modal){
            this.modals[modal] = !this.modals[modal]
        }
    }
}
</script>
<style scoped>

    .main-container{
        height: 100vh;
    }

    .el-header, .el-footer {
      background-color: #B3C0D1;
      color: #333;
      text-align: center;
      /* line-height: 60px; */
    }

    .el-main {
      background-color: #E9EEF3;
      color: #333;
      margin-bottom: 0px;
      /* text-align: center; */
      /* line-height: 160px; */
      /* height: 100vh; */
    }
</style>
