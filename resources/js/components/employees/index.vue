<template>
    <div id="employyIndex">
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

    </div>

    <div class="row">

        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-title clearfix">
                    <h3 class="float-left">City List</h3>

                    <form class="form-inline float-left" >

                        <div class="form-group mx-sm-3 mb-2">
                          <label for="search" class="sr-only">Search User</label>
                          <input type="text" class="form-control" id="search" name="search" placeholder="search">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                      </form>

                    <router-link :to="{ name:'compEmplyCreate' }" class="btn btn-success float-right">Create Employee</router-link>
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Department</th>
                          </tr>
                        </thead>
                        <tbody>

                                <tr>
                                    <th scope="row">

                                    </th>
                                    <td>

                                    </td>
                                    <td></td>
                                    <td>


                                    </td>
                                </tr>



                        </tbody>
                      </table>
                </div>
            </div>

        </div>
    </div>

    </div>
</template>

<script>
export default {

}
</script>
