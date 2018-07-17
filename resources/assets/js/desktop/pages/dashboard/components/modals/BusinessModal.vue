<template>
    <el-dialog
      :title="modalTitle"
      :visible.sync="isVisible"
      width="70%"
      :before-close="closeModal">
        <div>
            <el-form ref="businessForm" :model="businessForm" :rules="businessRules" label-width="200px">
                <el-form-item label="Name" prop="name">
                    <el-input v-model="businessForm.name"></el-input>
                </el-form-item>
                <el-form-item label="Url" prop="url">
                    <el-input v-model="businessForm.url"></el-input>
                </el-form-item>
                <el-form-item label="Select AE" prop="ae">
                    <el-input v-model="businessForm.ae"></el-input>
                </el-form-item>
                <el-form-item label="Add Location">
                    <el-switch v-model="addLocation"></el-switch>
                </el-form-item>
                <div v-if="addLocation">
                    <el-form-item label="Street" prop="location.street">
                        <el-input v-model="businessForm.location.street"></el-input>
                    </el-form-item>
                    <el-form-item label="City" prop="location.city">
                        <el-input v-model="businessForm.location.city"></el-input>
                    </el-form-item>
                    <el-form-item label="State" prop="location.state">
                        <el-input v-model="businessForm.location.state"></el-input>
                    </el-form-item>
                    <el-form-item label="Postal" prop="location.postal">
                        <el-input v-model="businessForm.location.postal"></el-input>
                    </el-form-item>
                </div>
                <el-form-item label="Add Primary Contact">
                    <el-switch v-model="addPrimaryContact"></el-switch>
                </el-form-item>
                <div v-if="addPrimaryContact">
                    <el-form-item label="First Name" prop="primary_contact.first_name">
                        <el-input v-model="businessForm.primary_contact.first_name"></el-input>
                    </el-form-item>
                    <el-form-item label="Last Name" prop="primary_contact.last_name">
                        <el-input v-model="businessForm.primary_contact.last_name"></el-input>
                    </el-form-item>
                    <el-form-item label="Email" prop="primary_contact.email">
                        <el-input v-model="businessForm.primary_contact.email"></el-input>
                    </el-form-item>
                    <el-form-item label="Work Phone" prop="primary_contact.work_phone">
                        <el-input v-model="businessForm.primary_contact.work_phone"></el-input>
                    </el-form-item>
                    <el-form-item label="Cell Phone" prop="primary_contact.cell_phone">
                        <el-input v-model="businessForm.primary_contact.cell_phone"></el-input>
                    </el-form-item>
                </div>
            </el-form>
        </div>
        <div slot="footer" class="dialog-footer">
            <el-button @click="closeModal">Cancel</el-button>
            <el-button type="primary" @click="onSubmit('businessForm')">Confirm</el-button>
        </div>
    </el-dialog>
</template>
<script>
import {mapActions} from 'vuex'

export default {
    name: 'BusinessModal',
    props:['visible', 'business'],
    data(){
        return {
            addLocation: false,
            addPrimaryContact: false,
            businessForm:{
                name: '',
                url: '',
                ae:'',
                location: {
                    street: '',
                    city: '',
                    state: '',
                    postal: ''
                },
                primary_contact:{
                    first_name: '',
                    last_name: '',
                    email: '',
                    work_phone: '',
                    cell_phone: '',
                    primary: ''
                }
            },
            businessRules:{
                name: [
                  { required: true, message: 'Name is required.', trigger: 'blur' },
                  {min: 3, message: 'Name must be at least three characters in length.', trigger: 'blur'}
                ],
                'location.street': [
                  { required: true, message: 'Street is required.', trigger: 'blur' },
                  {min: 3, message: 'Street must be at least three characters in length.', trigger: 'blur'}
                ],
                'location.city': [
                  { required: true, message: 'City is required.', trigger: 'blur' },
                  {min: 3, message: 'City must be at least three characters in length.', trigger: 'blur'}
                ],                
                'location.state': [
                  { required: true, message: 'State is required.', trigger: 'blur' },
                  {min: 3, message: 'State must be at least three characters in length.', trigger: 'blur'}
                ],                
                'location.postal': [
                  { required: true, message: 'Postal is required.', trigger: 'blur' },
                //   {type: 'number', message: 'Postal accepts numbers only.', trigger: 'blur'}
                ],                
                'primary_contact.first_name': [
                  { required: true, message: 'First Name is required.', trigger: 'blur' },
                ],                
                'primary_contact.last_name': [
                  { required: true, message: 'Last Name is required.', trigger: 'blur' },
                ],                
                'primary_contact.email': [
                  { required: true, message: 'Email is required.', trigger: 'blur' },
                ],                
                'primary_contact.work_phone': [
                  { required: true, message: 'Work Phone is required.', trigger: 'blur' },
                ],                

            }
        }
    },
    created(){
        //
    },
    computed:{
        isVisible(){
            return this.visible
        },
        modalTitle(){
            return `New ${this.business}`
        }
    },
    methods:{
        ...mapActions(['createBusiness']),
        closeModal(){
            this.$emit(`${this.business}:modal:close`)
            this.resetForm('businessForm')
        },
        onSubmit(formName){
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    let bf = {
                        ...this.businessForm, 
                        add_location: this.addLocation, 
                        add_primary_contact: this.addPrimaryContact,
                        type: this.business
                    }
                    this.createBusiness(bf).then(business => {
                        console.log(business)
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

</style>
