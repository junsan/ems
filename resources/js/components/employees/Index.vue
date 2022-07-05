<template>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Employees Table
            <router-link :to="{ name: 'EmployeesCreate' }" class="btn btn-primary mb-2" style="float: right;">Create Employee</router-link>
        </div>
        <div class="card-body">
        <table id="datatablesSimple">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Country</th>
                <th>State</th>
                <th>City</th>
                <th>Birtdate</th>
                <th>Hired Date</th>
                <th>Manage</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Country</th>
                <th>State</th>
                <th>City</th>
                <th>Deparment</th>
                <th>Birtdate</th>
                <th>Hired Date</th>
                <th>Manage</th>
            </tr>
        </tfoot>
        <tbody v-if="showEmployee">
            <tr         
                v-for="employee in employees" 
                :key="employee.id"
            >
                <td>{{employee.first_name + ' ' + employee.last_name}}</td>
                <td>{{ employee.country.name }}</td>
                <td>{{ employee.state.name }}</td>
                <td>{{ employee.city.name }}</td>
                <td>{{ employee.department.name }}</td>
                <td>{{ employee.birthdate }}</td>
                <td>{{ employee.date_hired }}</td>
                <td>
                    <router-link :to="{ name: 'EmployeesEdit', params: { id: employee.id } }" style="color: green; text-decoration:none;">Edit</router-link> 
                    <form style="float: right" @submit.prevent="deleteEmployee(employee.id)">
                        <button type="submit" style="color: red; background-color: transparent; border: none;">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table> 
        </div>
    </div>
</template>

<script>
export default {
    name: 'EmployeesIndex',
    data() {
        return {
            employees: [],
            showEmployee: false
        }
    },
    created() {
        this.getEmployees();
    },
    methods: {
        getEmployees() {
            axios.get('api/employee/employees')
            .then(res => {
                this.employees = res.data.data
                this.showEmployee = true
            }).catch(err => console.log(err))  
        },
        deleteEmployee(id) {
            axios.delete('api/employee/'+id)
            .then(res => {
                console.log(res.data)
                this.getEmployees();
            }).catch(err => console.log(err)) 
        }
    }
}
</script>

<style>

</style>