<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-body">
                <div class="table-primary">

                        <section class="col-lg-12">
                            <div class="col-lg-3">
                            <p><strong>User Role : </strong>{{isset($user_data->relRoleInfo->title)?ucfirst($user_data->relRoleInfo->title):''}}</p>
                                <p><strong>Branch :</strong> {{isset($user_data->relBranch->title)?ucfirst($user_data->relBranch->title):''}}
                                </p>
                            </div>
                            <div class="col-lg-6">
                                @if(isset($user_data))
                                    <li><p>User Name : <b>{{isset($user_data->username)?$user_data->username:''}}</b></p></li>
                                    <li>
                                        <p>
                                            Password : <a data-toggle="modal" href="#passwordModal">
                                                <ins> Change Password</ins>
                                            </a>
                                        </p>
                                    </li>
                                    <li><p>Email Address : {{isset($user_data->email)?$user_data->email:''}}</p></li>
                                @else
                                    {{"No data found !"}}
                                @endif
                            </div>
                            <div class="col-lg-3">

                            </div>
                        </section>
                </div>
            </div>
        </div>
    </div>
</div>



