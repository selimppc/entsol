<div class="row">
    <div class="col-sm-12">
        @if(isset($data))
            <a href="{{ route('edit-user-profile', $data->id) }}" class="btn btn-primary btn-xs" data-placement="top" data-toggle="modal" data-target="#entsolModal" style="margin-left: 91%">Edit Profile</a>
        @else
            <a class="btn btn-primary btn-xs" data-toggle="modal" href="#addProfile" data-placement="left" data-content="click 'add user' button to add new user"  style="margin-left: 90%">
                <strong>Add Profile</strong>
            </a>
        @endif
        <div class="panel">
            <div class="panel-body">
                <div class="table-primary">
                    @if(isset($data))
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name </th>
                            <th>Data Of Birth</th>
                            <th>Gender</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Zip Code</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($data))
                                <tr class="gradeX">
                                    <td>{{$data->first_name}}</td>
                                    <td>{{$data->middle_name}}</td>
                                    <td>{{$data->last_name}}</td>
                                    <td>{{$data->date_of_birth}}</td>
                                    <td>{{$data->gender}}</td>
                                    <td>{{$data->city}}</td>
                                    <td>{{$data->state}}</td>
                                    <td>{{isset($data->relCountry->title)?$data->relCountry->title:''}}</td>
                                    <td>{{$data->zip_code}}</td>
                                </tr>
                            @else
                            @endif
                        </tbody>
                    </table>
                    @else
                        {{'No data Found'}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal  -->

<div class="modal fade" id="entsolModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="z-index: 1050">
        <div class="modal-content">


        </div>
    </div>
</div>
<!-- modal -->

