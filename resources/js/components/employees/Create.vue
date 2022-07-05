<template>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Create Employee
    </div>
    <div class="card-body">
    <form method="POST" @submit.prevent="storeEmployee"  >
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input v-model="employee.first_name" class="form-control" name="name" id="inputName" type="text" placeholder="Enter country name" />
                        <label for="inputName">First Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input v-model="employee.middle_name" class="form-control" name="name" id="inputName" type="text" placeholder="Enter country name" />
                        <label for="inputName">Middle Name</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input v-model="employee.last_name" class="form-control" name="name" id="inputName" type="text" placeholder="Enter country name" />
                        <label for="inputName">Last Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input v-model="employee.address" class="form-control" name="name" id="inputName" type="text" placeholder="Enter country name" />
                        <label for="inputName">Address Name</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0" style="padding-top: 0;">
                        <select v-model="employee.country" class="form-control" @change="getStates()">
                            <option value="">Select Coutry</option>
                                <option v-for="country in countries" :key="country.id" :value="country.id" >{{ country.name }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0" style="padding-top: 0;">
                        <select v-model="employee.state" name="state_id" class="form-control" @change="getCities()">
                            <option value="">Select State</option>
                            
                                <option v-for="state in states" :key="state.id" :value="state.id" >{{ state.name }}</option>
                           
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0" style="padding-top: 0;">
                        <select v-model="employee.city" class="form-control">
                            <option value="">Select City</option>
                            
                                <option v-for="city in cities" :key="city.id"  :value="city.id" >{{ city.name}} </option>
                           
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0" style="padding-top: 0;">
                        <select v-model="employee.department" class="form-control">
                            <option value="">Select Department</option>
                            <option v-for="department in departments" :key="department.id" :value="department.id">{{ department.name }}</option>                         
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <Datepicker class="form-control" id="inputName" v-model="employee.birthdate"></Datepicker>
                        <label for="inputName">Birth Date</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                         <Datepicker class="form-control" id="inputName" v-model="employee.date_hired"></Datepicker>
                        <label for="inputName">Date Hired</label>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input v-model="employee.zip_code" class="form-control" name="name" id="inputName" type="text" placeholder="Enter country name" />
                        <label for="inputName">Zipcode</label>
                    </div>
                </div>
            </div>
            
            <div class="mt-4 mb-0">
                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Add Employee</button></div>
            </div>
        </form>
    </div>
</div>
</template>

<script>
import axios from 'axios';
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import moment from "moment";

export default {
    name: 'EmployeeCreate',
    data() {
        return {
            employee: {
                first_name: '',
                middle_name: '',
                last_name: '',
                address: '',
                country: '',
                state: '',
                city: '',
                department: '',
                birthdate: null,
                date_hired: null,
                zipcode: ''
            },
            countries: [],
            states: [],
            cities: [],
            departments: []
        }
    },
    components: { Datepicker },
    created() {
        this.getCountries()
        this.getDepartments()   
    },
    methods: {
        getCountries() {          
            axios.get('api/employee/countries')
            .then(res => {
                this.countries = res.data
            }).catch(err => console.log(err))
        },
        getDepartments() {
            axios.get('api/employee/departments')
            .then(res => {
                this.departments = res.data
            }).catch(err => console.log(err))
        },
        getStates() {
            axios.get('api/employee/'+this.employee.country+'/states')
            .then(res => {
                this.states = res.data
            }).catch(err => console.log(err))
        },
        getCities() {
            axios.get('api/employee/'+this.employee.state+'/cities')
            .then(res => {
                this.cities = res.data
            }).catch(err => console.log(err))
        },
        storeEmployee() {
            axios.post('api/employee', {
                first_name: this.employee.first_name,
                middle_name: this.employee.middle_name,
                last_name: this.employee.last_name,
                address: this.employee.address,
                country_id: this.employee.country,
                state_id: this.employee.state,
                city_id: this.employee.city,
                department_id: this.employee.department,
                zip_code: this.employee.zip_code,
                birthdate: this.format_date(this.employee.birthdate),
                date_hired: this.format_date(this.employee.date_hired)
            })
            .then(res => {
                console.log(data)
                this.$router.go('/');
            }).catch(err => console.log(err))
        },
        format_date(value) {
            if (value) {
                return moment(String(value)).format("YYYYMMDD");
            }
        }
    }
}
</script>

<style> 

</style> 