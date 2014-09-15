        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Admin/Employees
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                    <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th class="hidden-phone">User Name</th>
                        <th class="hidden-phone">Cell</th>
                        <th class="hidden-phone">Skype</th>
                        <th class="hidden-phone">Rol</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
					$query	=	$this->db->select('*')->from('admin_users')->get();

					if($query->num_rows > 0)
					{
						foreach($query->result() as $res)
						{
						?>
                    <tr class="gradeC">
                        <td><?=$res->adminId?></td>
                        <td><?=$res->first_name?> - <?=$res->last_name?></td>
                        <td class="hidden-phone"><?=$res->user_name?></td>
                        <td class="center hidden-phone"><?=$res->cell?></td>
                        <td class="center hidden-phone"><?=$res->skype?></td>
                        <td class="center hidden-phone"><?=$res->role?></td>
                        <td><a href="<?=base_url()?>admin/admin_users/editUser/<?=$res->adminId?>">Edit</a> | <a onclick="return confirm('Are you sure to delete this?')" href="<?=base_url()?>admin/admin_users/delete/<?=$res->adminId?>">Delete</a></td>
                    </tr>
                    <?php
						}
					}
					?>
                   
                    </tbody>
                    </table>

                    </div>
                    </div>
                </section>
            </div>
        </div>
        