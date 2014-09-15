
    
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading"> Add Admin/Employee <span class="tools pull-right"> <a class="fa fa-chevron-down" href="javascript:;"></a> </span> </header>
          <div class="panel-body">
            <div class="form">
              <form class="cmxform form-horizontal " id="signupForm" method="post" action="" enctype="multipart/form-data">
                <div class="form-group ">
                  <label for="firstname" class="control-label col-lg-3">Firstname</label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="firstname" name="firstname" type="text" />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="lastname" class="control-label col-lg-3">Lastname</label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="lastname" name="lastname" type="text" />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="username" class="control-label col-lg-3">Username</label>
                  <div class="col-lg-6">
                    <input class="form-control " id="username" name="username" type="text" />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="password" class="control-label col-lg-3">Password</label>
                  <div class="col-lg-6">
                    <input class="form-control " id="password" name="password" type="password" />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="email" class="control-label col-lg-3">Email</label>
                  <div class="col-lg-6">
                    <input class="form-control " id="email" name="email" type="email" />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="cell" class="control-label col-lg-3">Cell</label>
                  <div class="col-lg-6">
                    <input type="text" class="form-control cell" data-mask="(999) 999-9999" name="cell" id="cell" required="required">
                    <span class="cell-error label label-danger" style="display:none;"></span>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="addr1" class="control-label col-lg-3">Address 1</label>
                  <div class="col-lg-6">
                    <input class="form-control " id="address_one" name="address_one" type="text" />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="address_two" class="control-label col-lg-3">Address 2</label>
                  <div class="col-lg-6">
                    <input class="form-control " id="address_two" name="address_two" type="text" />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="phone" class="control-label col-lg-3">Phone</label>
                  <div class="col-lg-6">
                    <input class="form-control " id="phone" name="phone" type="text" />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="skype" class="control-label col-lg-3">Skype</label>
                  <div class="col-lg-6">
                    <input class="form-control " id="skype" name="skype" type="text" />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="status" class="control-label col-lg-3 col-sm-3">Status</label>
                  <div class="col-lg-6 col-sm-9">
                    <input  type="checkbox" style="width: 20px" class="checkbox form-control" id="status" name="status" />
                  </div>
                </div>
                <div class="form-group last">
                  <label class="control-label col-md-3">Image Upload</label>
                  <div class="col-md-9">
                    <div data-provides="fileupload" class="fileupload fileupload-new">
                      <div style="width: 200px; height: 150px;" class="fileupload-new thumbnail"> <img alt="" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"> </div>
                      <div style="max-width: 200px; max-height: 150px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail"></div>
                      <div> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                        <input type="file" class="default" name="userfile">
                        </span> <a data-dismiss="fileupload" class="btn btn-danger fileupload-exists" href="#"><i class="fa fa-trash"></i> Remove</a> </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-3 col-lg-6">
                    <button class="btn btn-primary btn-submit" type="submit">Save</button>
                    <button class="btn btn-default" type="button">Cancel</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </section>
      </div>
    </div>
    
   
