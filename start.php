<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
</head>

<body>
<div class="container">

  <!-- Start page image -->
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <img class="img-responsive tocenter" src="media/companions.jpg" alt="Image of dog snoozing on owner's lap">
        </div>
      </div>
    </div>
  </div>
  
  <!-- Sign In Modal -->
  <div id="signInModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title"><div class="slackey"><div class="textLarge">Sign in</div></div></div>
        </div>
        <div class="modal-body">
          <div class="g-signin2" data-onsuccess="onSignIn"></div>
          
          <?php $result == 'success' ?>
          <?php echo $result  ?>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Register Modal -->
  <div id="registerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title"><div class="slackey"><div class="textLarge">Register</div></div></div>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>