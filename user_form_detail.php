
<div class="container">
      <div class="row">
        <div class="col-sm-4" >
   
   

            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $user['firstname']." ".$user['lastname']; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Department:</td>
                        <td><?php echo $user['department']; ?></td>
                      </tr>
                      <tr>
                        <td>Skills:</td>
                        <td><?php echo $user['skills']; ?></td>
                      </tr>
                      <tr>
                        <td>Subject in interests</td>
                        <td><?php echo $user['subjectintrst']; ?></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>College</td>
                        <td><?php echo $user['collegename'] ?></td>
                      </tr>
                        <tr>
                        <td>Home Address</td>
                        <td>Kathmandu,Nepal</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:info@support.com"><?php echo $user['email'];?></a></td>
                      </tr>
                        <td>Phone Number</td>
                        <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                                 </div>

            </div>
              
            
          </div>
        </div>
      </div>
    </div>