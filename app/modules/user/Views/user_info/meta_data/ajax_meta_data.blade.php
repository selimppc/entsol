<div class="row">
    <div class="col-sm-12">
        @if(isset($data))
            <a href="{{ route('edit-meta-data', $data->id) }}" class="btn btn-primary btn-xs" data-placement="top" data-toggle="modal" data-target="#metaModal" style="margin-left: 84%">Edit Biographical Info</a>
        @else
            <a class="btn btn-primary btn-xs" data-toggle="modal" href="#addMeta" data-placement="left" data-content="click 'add user' button to add new user"  style="margin-left: 83%">
                <strong>Add Biographical Info</strong>
            </a>
        @endif
           <div class="panel">
              <div class="panel-body">
                 <div class="table-primary">
                    @if(isset($data))
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                            <tr>
                                <th class="col-lg-4">Father's Name</th>
                                <td>{{ isset($data->fathers_name)?$data->fathers_name : ''}}</td>
                            </tr>
                            <tr>
                                <th>Mother's Name</th>
                                <td>{{ isset($data->mothers_name)?$data->mothers_name:''}}</td>
                            </tr>
                            <tr>
                                <th>Father's Occupation</th>
                                <td>{{ isset($data->fathers_name)?$data->fathers_name : ''}}</td>
                            </tr>
                            <tr>
                                <th>Father's Phone</th>
                                <td>{{ isset($data->mothers_name)?$data->mothers_name:''}}</td>
                            </tr>
                            <tr>
                                <th>Is Freedom Fighter</th>
                                <td>
                                    @if(isset($data->freedom_fighter))
                                      {{ $data['freedom_fighter']==1 ? 'Yes' : 'No'}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Mother Occupation</th>
                                <td>{{ isset($data->mothers_name)?$data->mothers_name:''}}</td>
                            </tr>
                            <tr>
                                <th>Mother Phone</th>
                                <td>{{ isset($data->fathers_name)?$data->fathers_name : ''}}</td>
                            </tr>
                            <tr>
                                <th>National ID#</th>
                                <td>{{ isset($data->mothers_name)?$data->mothers_name:''}}</td>
                            </tr>
                            <tr>
                                <th>Driving Licence</th>
                                <td>{{ isset($data->fathers_name)?$data->fathers_name : ''}}</td>
                            </tr>
                            <tr>
                                <th>Passport</th>
                                <td>{{ isset($data->mothers_name)?$data->mothers_name:''}}</td>
                            </tr>
                            <tr>
                                <th>Place Of Birth</th>
                                <td>{{ isset($data->fathers_name)?$data->fathers_name : ''}}</td>
                            </tr>
                            <tr>
                                <th>Marital Status</th>
                                <td>{{ isset($data->mothers_name)?$data->mothers_name:''}}</td>
                            </tr>
                            <tr>
                                <th>Nationality</th>
                                <td>{{ isset($data->fathers_name)?$data->fathers_name : ''}}</td>
                            </tr>
                            <tr>
                                <th>Religion</th>
                                <td>{{ isset($data->mothers_name)?$data->mothers_name:''}}</td>
                            </tr>
                            <tr>
                                <th>Present Address</th>
                                <td>{{ isset($data->fathers_name)?$data->fathers_name : ''}}</td>
                            </tr>
                            <tr>
                                <th>Permanent Address</th>
                                <td>{{ isset($data->mothers_name)?$data->mothers_name:''}}</td>
                            </tr>
                        <tr>
                            <th>Signature</th>
                                <td>
                                @if(isset($data->signature))
                                    <img src="{{ URL::to($data->signature) }}">
                                @else
                                    <img src="{{ URL::to('/assets/img/default.jpg') }}" width="80px" height="80px">
                                @endif
                                </td>

                        </tr>
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

<div class="modal fade" id="metaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="z-index: 1050">
        <div class="modal-content">

        </div>
    </div>
</div>
<!-- modal -->

