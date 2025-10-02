<div class="modal fade" id="addUsers">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Fomu ya Usajili kwa Watumiaji wapya</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning alert-dismissible">
                      <button type="button" class="close btn-xs" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <span id="userRegisterAlert" class="font-weight-bold">
                            Sajili Mtumiaji mpya hapa
                        </span>                      
                    </div>

                    <form id="addUsersForm" method="POST">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstName">Jina La Kwanza
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="firstName" id="firstName" class="form-control" required="required" placeholder="Ingiza jina la mwanzo" style="border: solid 1px green;">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="middleName">Jina la kati</label>
                                    <input type="text" name="middleName" id="middleName" class="form-control" placeholder="Ingiza Jina la Kati" style="border: solid 1px green;">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastName">Jina la Mwisho
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="lastName" id="lastName" class="form-control"
                                        required="required" placeholder="Ingiza Jina la Mwisho" style="border: solid 1px green;">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="userPhone">Namba ya Simu
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="tel" name="userPhone" id="userPhone" class="form-control"
                                        required = "required" pattern="[255]{3}[0-9]{9}" placeholder="eg: 255773217012" minlength="12" maxlength="12" title="Phone number should start with 255 and remaing 9 digit with 0-9" style="border: solid 1px green;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="userName">Baruapepe/Jina la Mtumiaji
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" required="required" name="userName" id="userName" class="form-control" placeholder="Ingiza Baruapepe / Jina la Mtumiaji" style="border: solid 1px green;">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="userRole">Jukumu
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select required="required" class="form-control" id="userRole" name="userRole" style = "border: solid 1px green;" onchange="showInstituteByRole()">
                                        <option value="" hidden>chagua Jukumu</option>
                                        <?php
                                            if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                                                ?>
                                                <option value="Msimamizi mkuu">Msimamizi mkuu</option>
                                                <option value="Muangalizi mkuu">Muangalizi mkuu</option>
                                                <option value="Mwenyekiti bodi">Mwenyekiti wa Bodi</option>
                                                <?php
                                            }
                                        ?>
                                        
                                        <option value="Msimamizi msaidizi">Msimamizi msaidizi</option>
                                        <option value="Muangalizi msaidizi">Muangalizi msaidizi</option>
                                        <option value="Afisa mapato">Afisa mapato</option>
                                        <option value="Mkusanyaji">Mkusanyaji</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <?php
                                    // if ($_SESSION['insttype'] != 'WIZARA') {
                                    //   $json = file_get_contents($ipConnect.'/selectInstitutionById/'.$_SESSION['instituteid']); //receive json from url
                                    // }else{
                                    //     $json = file_get_contents($ipConnect.'/selectInstitutionInfo'); //receive json from url
                                    // }

                                    // $arr = json_decode($json, true); //covert json data into array format
                                ?>
                                <div class="form-group" id="instituteByRoleDiv">
                                    <label for="instituteidus">Taasisi
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" id="instituteidus" name="instituteidus" required="required" style="border: solid 1px green;" onchange="showZonesByIstitute()">
                                        <option>chagua taasisi</option>
                                        <?php
                                        // foreach ($arr as $key => $value) {
                                        //   echo '<option value="'.$value['instituteid'].'">'.$value['instname'].'</option>';
                                        // }
                                      ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" id="zonesByIstituteDiv">
                                    <label for="zoneid">Zoni
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" id="zoneid" name="zoneid" required="required" style="border: solid 1px green;">
                                        <option hidden="">chagua zoni</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-info">
                            <span class="far fa-save"></span>&nbsp;
                            Hifadhi
                        </button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <div class="modal fade" id="editUsers">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-green">
                    <h4 class="modal-title">Fomu ya Kubadili Taarifa za Mtumiaji</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning alert-dismissible">
                      <button type="button" class="close btn-xs" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <span id="userUpdateAlert" class="font-weight-bold">
                            Badili taarifa za mtumiaji hapa
                        </span>                      
                    </div>
                    <form id="editUsersForm" method="POST">
                        <input type="hidden" name="useridu" id="useridu">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstnameu">Jina La Kwanza
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" required="required" name="firstnameu" id="firstnameu" class="form-control" placeholder="Ingiza jina la mwanzo" style="border: solid 1px green;">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="middlenameu">Jina la kati</label>
                                    <input type="text" name="middlenameu" id="middlenameu" class="form-control"
                                        placeholder="Ingiza Jina la Kati" style="border: solid 1px green;">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastnameu">Jina la Mwisho
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" required="required" name="lastnameu" id="lastnameu" class="form-control" placeholder="Ingiza Jina la Mwisho" style="border: solid 1px green;">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phonenumberu">Nambari ya Simu
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" required="required" name="phonenumberu" id="phonenumberu" class="form-control" placeholder="Ingiza Namba ya Simu" pattern="[255]{3}[0-9]{9}" minlength="12" maxlength="12" placeholder="eg: 255773217012" title="Phone number should start with 255 and remaing 9 digit with 0-9" style="border: solid 1px green;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="usernameu">Baruapepe/Jina la Mtumiaji
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" required="required" name="usernameu" id="usernameu" class="form-control" placeholder="Ingiza Baruapepe / Jina la Mtumiaji" style="border: solid 1px green;">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="uroleu">Jukumu
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" id="uroleu" name="uroleu" required="required" style = "border: solid 1px green;">
                                        <option id="uroleu2" value="" hidden>chagua Jukumu</option>
                                        <?php
                                            if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                                                ?>
                                                <option value="Msimamizi mkuu">Msimamizi mkuu</option>
                                                <option value="Muangalizi mkuu">Muangalizi mkuu</option>
                                                <?php
                                            }
                                        ?>
                                        
                                        <option value="Msimamizi msaidizi">Msimamizi msaidizi</option>
                                        <option value="Muangalizi msaidizi">Muangalizi msaidizi</option>
                                        <option value="Afisa mapato">Afisa mapato</option>
                                        <option value="Mkusanyaji">Mkusanyaji</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <?php
                                    if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                                        $json = file_get_contents($pubIP.'selectInstitutionInfo'); //receive json from url
                                    }else{
                                        $json = file_get_contents($pubIP.'selectInstitutionById/'.$_SESSION['instituteid']); //receive json from url
                                    }

                                    $arr = json_decode($json, true); //covert json data into array format
                                ?>
                                <div class="form-group">
                                    <label for="instituteidus1">Taasisi
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" id="instituteidus1" name="instituteidus1" required="required" style="border: solid 1px green;" onchange="showZonesByIstitute2()">
                                        <option value="" id="instituteidus2" hidden>Chagua taasisi</option>
                                        <?php
                                        foreach ($arr as $key => $value) {
                                          echo '<option value="'.$value['instituteid'].'">'.$value['instname'].'</option>';
                                        }
                                      ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6" id="zonesByIstituteDiv2">
                                <div class="form-group">
                                    <label for="zoneidu">Zoni
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" id="zoneidu" name="zoneidu" required="required"
                                        style="border: solid 1px green;">
                                        <option id="zoneidu2" hidden="">chagua zoni</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-success">
                        <span class="fas fa-pencil-alt"></span>&nbsp;
                        Badili
                    </button>&nbsp;
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->