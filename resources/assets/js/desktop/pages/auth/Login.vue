<template>
    <el-row :gutter="20">
        <el-col :span="12" :offset="6">
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <span>Login</span>
                </div>
                <el-form ref="loginForm" :model="loginForm" :rules="loginRules" label-width="120px">
                    <el-form-item label="Email" prop="email">
                        <el-input v-model="loginForm.email"></el-input>
                    </el-form-item>
                    <el-form-item label="Password" prop="password">
                        <el-input type="password" v-model="loginForm.password"></el-input>
                    </el-form-item>
                    <el-form-item>
                        <el-button type="primary" @click="onSubmit('loginForm')">Login</el-button>
                    </el-form-item>
                </el-form>
            </el-card>
        </el-col>
    </el-row>
</template>
<script>
import {mapActions} from 'vuex'

export default {
    name: 'Login',
    data(){
        return {
            loginForm: {
                email: '',
                password: ''
            },
            loginRules:{
                email: [
                  { required: true, message: 'Email is required.', trigger: 'blur' }
                ],
                password: [
                   { required: true, message: 'Password is required.', trigger: 'blur' } 
                ]
            }
        }
    },
    mounted(){
        console.log(this.$store.state.auth.name);
    },
    methods:{
        ...mapActions(['login']),
        onSubmit(formName){
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    this.login(this.loginForm).then(response => {
                        // console.log('sent')
                        this.$router.push({ path: '/' })
                    }).catch(err => {
                        this.$message.error(err.data.error);
                        this.resetForm('loginForm')
                    })
                } else {
                    console.log('error submit!!');
                    return false;
                }
            });
        },
        resetForm(formName) {
            this.$refs[formName].resetFields();
        }
    }
}
</script>
<style scoped>
    .el-col{
        margin-top: 2.5em;
    }
</style>
