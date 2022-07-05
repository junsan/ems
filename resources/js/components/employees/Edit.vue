<template>
    <div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Edit Employee
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
                        <select v-model="employee.country_id" class="form-control" @change="getStates()">
                            <option value="">Select Coutry</option>
                                <option v-for="country in countries" :key="country.id" :value="country.id" >{{ country.name }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0" style="padding-top: 0;">
                        <select v-model="employee.state_id" name="state_id" class="form-control" @change="getCities()">
                            <option value="">Select State</option>
                            
                                <option v-for="state in states" :key="state.id" :value="state.id" >{{ state.name }}</option>
                           
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0" style="padding-top: 0;">
                        <select v-model="employee.city_id" class="form-control">
                            <option value="">Select City</option>
                            
                                <option v-for="city in cities" :key="city.id"  :value="city.id" >{{ city.name}} </option>
                           
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0" style="padding-top: 0;">
                        <select v-model="employee.department_id" class="form-control">
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
                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Update Employee</button></div>
            </div>
        </form>
    </div>
</div>
</template>

<script>
export default {
    name: 'EmployeeEdit',
    data() {
        return {
            employee: [],
            countries: [],
            states: [],
            cities: [],
            departments: []
        }
    },
    created() {
        this.getEmployee()
        this.getCountries()
        this.getDepartments()
        
    },
    methods: { 
        getEmployee() {
            axios.get('api/employee/'+this.$route.params.id)
            .then(res => {
                this.employee = res.data
                this.getStates()
                this.getCities()
            }).catch(err => console.log(err))  
        },
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
            axios.get('api/employee/'+this.employee.country_id+'/states')
            .then(res => {
                this.states = res.data
            }).catch(err => console.log(err))
        },
        getCities() {
            axios.get('api/employee/'+this.employee.state_id+'/cities')
            .then(res => {
                this.cities = res.data
            }).catch(err => console.log(err))
        }
    } 
}
</script>

<style>

</style>