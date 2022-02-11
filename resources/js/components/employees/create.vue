<template>
    <div id="emplyCreate">
       <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

        </div>

        <div class="row">

            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-title clearfix">
                        <h3 class="float-left">Employee Create</h3>
                        <router-link :to="{  name:'compEmplyIndex' }" class="btn btn-success float-right">Back Employee List</router-link>
                    </div>
                    <div class="card-body">
                        <form method="POST">


                            <div class="row mb-3">
                                <label for="first_name" class="col-md-4 col-form-label text-md-end">first name</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control " name="first_name"   autocomplete="first_name" autofocus>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="middle_name" class="col-md-4 col-form-label text-md-end">Middle name</label>

                                <div class="col-md-6">
                                    <input id="middle_name" type="text" class="form-control " name="middle_name"   autocomplete="middle_name" autofocus>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-end">last name</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control " name="last_name"   autocomplete="last_name" autofocus>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" id="address" name="address" rows="3"></textarea>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="depertment_id " class="col-md-4 col-form-label text-md-end">Department</label>

                                <div class="col-md-6">
                                    <select  class="form-control" id="depertment_id" name="depertment_id">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="country_id  " class="col-md-4 col-form-label text-md-end">Country</label>

                                <div class="col-md-6">
                                    <select  class="form-control" id="country_id " name="country_id ">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="state_id" class="col-md-4 col-form-label text-md-end">State</label>

                                <div class="col-md-6">
                                    <select  class="form-control" id="state_id" name="state_id">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="city_id" class="col-md-4 col-form-label text-md-end">City</label>

                                <div class="col-md-6">
                                    <select  class="form-control" id="city_id" name="city_id">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="zip_code" class="col-md-4 col-form-label text-md-end">Zip Code</label>

                                <div class="col-md-6">

                                    <input id="zip_code" type="text" class="form-control " name="zip_code"   autocomplete="zip_code" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="birthdate" class="col-md-4 col-form-label text-md-end">Date of Birth</label>

                                <div class="col-md-6">
                                    <!-- <input id="birthdate" type="text" class="form-control " name="birthdate"   autocomplete="birthdate" autofocus> -->
                                    <datepicker v-model="state.date" name="birthdate" input-class="form-control" ></datepicker>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="date_hired" class="col-md-4 col-form-label text-md-end">Date of Hire</label>


                                <div class="col-md-6">
                                    <!-- <input id="birthdate" type="text" class="form-control " name="birthdate"   autocomplete="birthdate" autofocus> -->
                                    <datepicker v-model="state.date" name="date_hired" input-class="form-control" ></datepicker>
                                </div>
                            </div>



                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{ countries }}

            </div>
        </div>


    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker'
export default {
    data(){
        return {
            state : {
                date: new Date()
            },
            countries:[],
            states:[],
            departments:[],
            cities:[],
        }
    },
    mounted(){
        this.getCountries();
    },
    computed:{

    },
    methods:{
        getCountries(){
            axios
            .get('api/employees/countries')
            .then((response) => {
                this.countries = response.data;
            }).catch((error)=>{
                console.log(error);
            });
        }
    },
    components:{
        Datepicker
    }
}
</script>
