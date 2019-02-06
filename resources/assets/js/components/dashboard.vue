<template>
    <div>
        <div class="col-md-6 pull-left">
            <h2 class="text-center">Month Sales</h2>
            <bar-chart :rows="rows" :height="200"></bar-chart>
            <div class="text-center">
                <router-link to="/playfair/orders">View all orders</router-link>
            </div>
        </div>
        <div class="col-md-6 pull-right">
            <h2 class="text-center">Last Users</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr v-for="user in users">
                        <td>{{ user.id }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                    </tr> -->
                </tbody>
            </table>
            <div class="text-center">
                <router-link to="/playfair/customers">View all customers</router-link>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="col-md-6 pull-left">
            <h2 class="text-center">Sales by City</h2>
            <pie-chart :rows="cities" :height="200"></pie-chart>
        </div>

        <div class="col-md-6 pull-right">
            <h2 class="text-center">Sales by Option</h2>
            <pie-chart :rows="options" :height="200"></pie-chart>
        </div>
        <div class="clearfix"></div>
    </div>
</template>
<script>
    export default {
        created(){
            this.$store.dispatch('getMonthSales');
            this.$store.dispatch('getCitiesSales');
            this.$store.dispatch('getOptionsSales');
            this.getCustomers();
        },
        methods: {
            getCustomers(){
                let params = {page:1, target: ''}
                this.$store.dispatch('getCustomers',params)
            }
        },
        computed: {
            rows(){
                return this.$store.state.Dashboard.sales
            },
            cities(){
                return this.$store.state.Dashboard.cities
            },
            options(){
                return this.$store.state.Dashboard.options
            },
            users(){
                return this.$store.state.Customer.customers
            }
        }
    }
</script>
