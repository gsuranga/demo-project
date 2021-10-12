<?php
if ($extraData != '') {
    
   foreach ($extraData as $value) {
         $delar_name= $value->delar_name;  
         $delar_num= $value->delar_num;  
         $delar_addess= $value->delar_address;  
         $shop_name= $value->delar_shop_name;  
         $dealer_id= $value->delar_id;  
         $religion= $value->religion;  
         $passport_no=$value->passport_no;  
         $business_started_date=$value->business_started_date;  
         $period_with_dimo= $value->period_with_dimo;  
         $manager_name= $value->manager_name;  
         $p_number= $value->p_number;  
         $delar_code= $value->delar_code;  
         $date_account_open= $value->date_account_open;  
         $discount_percentag=$value->discount_percentage;  
         $delar_shop_name= $value->delar_shop_name;  
         $txt_remarksO= $value->txt_remarksO;  
         $dob= $value->dob;  
         $telP= $value->telP;  
         $telO= $value->telO;  
         $emailO= $value->emailO;  
         $emailP=$value->emailP;  
         $mobileO= $value->mobileO;  
         $mobileP= $value->mobileP;  
      
      
        $city_id= $value->city_id;  
        $district_id= $value->district_id;  
        $dealer_type=$value->dealer_type;  
        $business_address=$value->business_address;  
        $male_staff= $value->male_staff;  
        $female_staff= $value->female_staff;  
        $fax_no=$value->fax_no;  
        $computer_status=$value->computer_status;  
        $dealer_nic=$value->nic_no;      
                
                    
                    
 } }  




$create_dealer = array(
    'id' => 'create_dealer',
    'name' => 'create_dealer',
    'type' => 'submit',
    'value' => 'submit'
);

$reset_dealer = array(
    'id' => 'reset_dealer',
    'name' => 'reset_dealer',
    'type' => 'reset',
    'value' => 'Reset'
);
// get dealer data back into form===harshan ====edited=============>>>>>>>>>>>>
// get dealer data back into form===harshan ====edited=============>>>>>>>>>>>>
// made again by cp........................................



$_instance = get_instance();
?>
<?php echo form_open('delar/createDelarNew'); ?>

<body>
     
 

    <table width="70%">
        <td> <input type="hidden" name="delar_id" id="delar_id" value="<?php 
        
        if(isset( $_REQUEST['tokendealer_id'])){
        echo  $_REQUEST['tokendealer_id'];
      //  $idd=$_REQUEST['tokendealer_id'];
        
        
        
        }
        
        ?>" >
            
            <?php 
              $_REQUEST['tokendealer_id'];
            
//            if(isset( $_REQUEST['tokendealer_id'])){
//               $idd =$_REQUEST['tokendealer_id']; 
//               ?>
            <script>
//            testdealer(//<?php //echo $idd; ?>);
//            
//            
//            
//            function testdealer(id){
//                
//                
//                
//            }
//            </script>
          
            
            <?php
//                
//                
//               
//           }
//            
//            ?>
            
            
            
        <tr>
            <td>Name of the dealer</td>
            <td> <input type="text" name="delar_name" id="delar_name" value="<?php echo $delar_name; ?>" >
                <?php echo form_error('delar_name'); ?></td>

        </tr>
        <tr>
            <td>Dealer Number</td>
            <td> <input type="text" name="delar_num" id="delar_num"  value="<?php echo $delar_num; ?>"  >
                <?php echo form_error('delar_num'); ?></td>

        </tr>
        <tr>
            <td>Date of birth(DD/MM/YY)</td>
            <td><input type="date" id="dob" name="dob" ></td>
        </tr><?php //   ?>
        <tr>
            <td>Religion</td>
            <td><select id="cmb_religion_type" name="cmb_religion_type">
                   
                    <option>----Select religion----</option>
                     <?php
                    if(isset($religion)){
                      echo '<option selected>'.$religion.'</option>';  
                        
                    }
                    
                    
                    ?>
                    <option >Buddhist</option>
                    <option>Islam</option>
                    <option>Hindu</option>
                    <option>Catholic</option>
                    <option>Other</option>
                </select> </td></tr>
        <tr>
            <td>Address</td>
            <td><textarea id="address" name="address" ><?php echo $delar_addess; ?></textarea></td>
        </tr>


        <tr>
            <td>NIC No</td>
            <td colspan="1"><input type="text" id="nic" name="nic" value="<?php echo $dealer_nic; ?>"></td>

            <td>Passport NO</td>
            <td colspan="1"><input type="text" id="passport" name="passport" value="<?php echo $passport_no; ?>"></td>
        </tr>

        <tr>
            <td>Contact - Mobile</td>
            <td><input type="text" style="width: 40%" id="mobilep" name="mobilep" value="<?php echo $mobileP; ?>">
               </td>

        </tr>

        <tr>
            <td>Contact - Land line</td>
            <td><input type="text" style="width: 40%" id="telp" name="telp" value="<?php echo $telP; ?>">
               
            </td>

        </tr>



        <td>Email</td>
        <td><input type="text" id="emailp" name="emailp" value="<?php echo $emailP; ?>"></td>

    </tr>

</table>


<table width="846" class="SytemTable" border="1" cellpadding="0" cellspacing="0" id="tbl_dealer"  >
    <thead>
        <tr>
            <td></td>
            <td>DEPENDENTS</td>
            <td>NAME</td>
            <td>GENDER</td> 
            <td>BIRTHDAY</td>
            <td>AGE</td>
            <td></td>

        </tr>
    </thead>
    <tbody>
        <tr><td>
                <input type="button" value="+" onclick="add_new_dealer();"/>  
            </td>

            <td>
                <input type="text" id="txt_dependents" name="txt_dependents"  autocomplete="off"/>
            </td>
            <td>
                <input type="text" id="txt_name" name="txt_name"  autocomplete="off"/>
            </td>

            <td><select id="cmb_status_type" name="cmb_status_type">
                    <option>----Select Gender Type----</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select> </td>
<!--    <input type="text" id="txt_gender" name="txt_gender"  autocomplete="off"/>-->

            <td>
                <input type="date" id="txt_birthday" name="txt_birthday"  autocomplete="off"/>
            </td>
            <td>
                <input type="text" id="txt_age" name="txt_age"  autocomplete="off"/>
            </td>
            <td><input type="hidden" name="row_count" id="row_count" value="1"/>
                <input type="button"  value="-" onclick="remove_select_row();"/>   
            </td>
        </tr>
    </tbody>
</table>


</body>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
<body>
    <table width="100%" cellsapcing="3" cellpadding="3">
        <tr class="ContentTableTitleRow">
            <td>BUSINESS DETAILS</td>

        </tr>




        <table width="50%">
            <tr>
                <td>Name of the Organization</td>
                <td> <input type="text" style="width: 60%" id="delar_shop_name" name="delar_shop_name" value="<?php echo $shop_name; ?>">
                    <?php echo form_error('delar_shop_name'); ?></td>
            </tr>

            <tr>
                <td>Type of the business</td>
                <td><select style="width: 60%"id="cmb_business_type" name="cmb_business_type" >
                        <option value="Not Selest">----Select Business Type----</option>
                        <option value="Propriator">Propriator</option>
                        <option value="Partnership">Partnership</option>
                        <option value="PVT LTD">PVT LTD</option>
                        <option value="PLC">PLC</option>
                        <option value="Other">Other</option>
                    </select> </td></tr>

            <tr>
                <td>Province/District</td>
                <td> 
                    <?php ?>
                    <select style="width: 60%" name="district_name" id="district_name"
                            <option value="0">-----Select District---</option>
                        <option>Colombo</option><option>Gampaha</option>
                        <option>Kalutara</option><option>Kandy</option>
                        <option>Matale</option><option>Nuwaraeliya</option>
                        <option>Batticaloa</option><option>Trincomalee</option>
                        <option>Ampara</option><option>Jaffna</option>
                        <option>Mannar</option><option>Mullaitivu</option>
                        <option>Vavuniya</option><option>Anuradhapura</option>
                        <option>Polonnaruwa</option><option>Kurunegala</option>
                        <option>Puttalam</option><option>Ratnapura</option>
                        <option>Kegalle</option><option>Galle</option>
                        <option>Matara</option><option>Hambantota</option>
                        <option>Badulla</option><option>Monaragala</option>
                        <option>Galle</option>
                        
                    </select>
                </td>

            </tr>
            
            <tr>
                <td>DS Division</td>
                <td><input type="text" style="width: 60%" id="ds_pro" name="ds_pro" > </td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
            <td>Date of the Business as Started</td>
                <td><input type="date" style="width: 60%" id="date_of_the_start" name="date_of_the_start"> </td>
            </tr>
             <tr></tr>
              <tr></tr>
            
            <tr></tr>
            <tr>
                <td>For how long have been dealing with DIMO </td>
                <td><input type="text" style="width: 60%" id="periods" name="periods" value="<?php echo $period_with_dimo; ?>"></td>
            </tr>


            <tr></tr>
            <tr></tr>
            <tr></tr>

            <tr>
                <td>Name of the manager</td>
                <td><input type="text" style="width: 60%" id="mgr_name" name="mgr_name" value="<?php echo $manager_name; ?>"></td>

            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td>Phone number</td>
                <td><input type="text" style="width: 60%" id="p_no" name="p_no" value="<?php echo $p_number; ?>"></td>

            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>

            <tr>
                <td>Address</td>
                <td><textarea id="address_mgr"  style="width: 60%" name="address_mgr">
                    
<?php echo $business_address; ?>
                    </textarea></td>
            </tr>


            <tr>
                <td>Number of staff</td>

                <td>Male<input type="text" style="width: 40px"id="staff_male" name="staff_male" value="<?php echo $male_staff ?>">
                    Female<input type="text" style="width: 40px" id="staff_female" name="staff_female" value="<?php echo $female_staff ?>"></td>
            </tr>


            <table width="846" class="SytemTable" border="1" cellpadding="0" cellspacing="0" id="tbl_dealer1"  >
    <thead>
        <tr>
            <td></td>
            <td>Employee</td>
            <td>NAME</td>
            <td>GENDER</td> 
            <td>BIRTHDAY</td>
            <td>AGE</td>
            <td></td>

        </tr>
    </thead>
    <tbody>
        <tr><td>
                <input type="button" value="+" onclick="add_new_dealer1();"/>  
            </td>

            <td>
                <input type="text" id="txt_dependents1" name="txt_dependents1"  autocomplete="off"/>
            </td>
            <td>
                <input type="text" id="txt_name1" name="txt_name1"  autocomplete="off"/>
            </td>

            <td><select id="cmb_status_type1" name="cmb_status_type1">
                    <option>----Select Gender Type----</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select> </td>
<!--    <input type="text" id="txt_gender" name="txt_gender"  autocomplete="off"/>-->

            <td>
                <input type="date" id="txt_birthday1" name="txt_birthday1"  autocomplete="off"/>
            </td>
            <td>
                <input type="text" id="txt_age1" name="txt_age1"  autocomplete="off"/>
            </td>
            <td><input type="hidden" name="row_count1" id="row_count1" value="1"/>
                <input type="button"  value="-" onclick="remove_select_row1();"/>   
            </td>
        </tr>
    </tbody>
</table>
            <table width="50%" cellsapcing="3" cellpadding="3">
            <tr>
                <td>Contact - Land line</td>
                <td><input type="text" style="width: 60%" id="contact_land" name="contact_land" value="<?php echo $telO; ?> ">
                   </td>
            </tr>

            <tr>
                <td>Contact - Mobile</td>
                <td><input type="text" style="width: 60%" id="contact_mobile" name="contact_mobile"value="<?php echo $mobileO; ?> ">
                    </td>

            </tr>

            <tr>
                <td>Contact - Fax</td>
                <td><input type="text" style="width: 60%" id="fax" name="fax"   value="<?php echo $fax_no; ?> "></td>

            </tr>

            <tr>
                <td>Email</td>
                <td><input type="text" style="width: 60%" id="email" name="email" value="<?php echo $emailO; ?>"></td>

            </tr>


            <tr>
                <td>Other Dealerships</td>
                <td><input type="text" style="width: 60%" id="other" name="other"></td>
            </tr>
            <!--            widuranga start
                        <tr>
                            <td>Dealer Location</td>
                            <td>
                        <input type="text" name="dealer_location" id="dealer_location"  onkeyup="search_location();" value=""/>
                            </td>
                            <td><input type="hidden" name="long" id="long"/></td>
                            <td><input type="hidden" name="lat" id="lat"/><td>
                        </tr>
            
                    </table>
                    <div id="map" style="width: 800px;height: 400px;"></div>
            
                    widuranga end
                    <table>-->
            <tr>
                <td>Availability of Computer Facility</td>
              <?php 
              $msg = '';
              
              if(isset($computer_status) == '11' && $computer_status =='' ){
                  $msg = 'checked';
              
                echo $computer_status;
              }else{
                                    $msg = '';

                  
              }
                ?>
                
                <td> <input type="checkbox" name="computer"  value="Yes" <?php echo $msg;   ?>  id="computer">Yes<br>
                    <input type="checkbox" name="computer1" value="No"  id="computer1"> No</td>
            </tr>
            <tr>
                <td>Remarks</td>
            <td>
                
                <textarea id="txt_remarks" name="txt_remarks" > <?php echo $txt_remarksO; ?>  </textarea> 
                 
               
            </tr>
            
            </td>
            <tr>
                
                
                <td></td>
                <td>
                    <?php echo form_input($create_dealer); ?>
                    <?php echo form_input($reset_dealer); ?>
                </td>
                <td>


                </td>
            </tr>
            </table>
        </table>

    </table>


    <?php echo form_close(); 
    
   ?>


 