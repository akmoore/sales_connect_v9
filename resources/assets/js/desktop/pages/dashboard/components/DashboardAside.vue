<template>
    <el-aside width="64px">
        <el-menu 
            default-active="2" 
            class="el-menu-vertical"
            :collapse="isCollapse">
            <el-submenu index="1">
                <template slot="title">
                    <i class="el-icon-location"></i>
                    <span slot="title">Navigator One</span>
                </template>
                <el-menu-item-group>
                    <span slot="title">Group One</span>
                    <el-menu-item index="1-1">item one</el-menu-item>
                    <el-menu-item index="1-2">item two</el-menu-item>
                </el-menu-item-group>
                <el-menu-item-group title="Group Two">
                    <el-menu-item index="1-3">item three</el-menu-item>
                </el-menu-item-group>
                <el-submenu index="1-4">
                    <span slot="title">item four</span>
                    <el-menu-item index="1-4-1">item one</el-menu-item>
                </el-submenu>
            </el-submenu>
            <el-menu-item index="2">
                <i class="el-icon-menu"></i>
                <span slot="title">Navigator Two</span>
            </el-menu-item>
            <el-menu-item index="3" disabled>
                <i class="el-icon-document"></i>
                <span slot="title">Navigator Three</span>
            </el-menu-item>
            <el-menu-item index="4">
                <i class="el-icon-setting"></i>
                <span slot="title">Navigator Four</span>
            </el-menu-item>
        </el-menu>
    </el-aside>
</template>
<script>
export default {
    name: 'DashboardAside',
    data(){
        return {
            isCollapse: true
        }
    }
}
</script>
<style scoped>
    .el-aside {
      background-color: #D3DCE6;
      color: #333;
      text-align: center;
      /* line-height: 200px; */
      background-color: #fff;
    }

    .el-menu-vertical{
        border-right: 0;
    }
</style>
