<?php 
$id = $_GET['id'];
if(!$id){
  echo "hell";
}
echo $id;
?>
<!DOCTYPE html>
<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/index.css" type="text/css" rel="stylesheet">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">
  <title></title>
  <style>
  .card-wrapper{
    display: flex;
    justify-content: center;
    min-height: calc(100vh - 8rem);
  }
  </style>
 </head>
 <body>
  <div class="content-wrapper">
   <div class="content">
    <div class="card-content" style="padding: 1vh 2vw;">
     <div class="level-item">
      <span style="font-size: 1rem; margin-bottom: 1.5vh;"><strong>Junction/Room/Amenities</strong></span>
     </div>
     <div class="level-item">
      <form method="POST" enctype="multipart/form-data" style="width: 100%;">

      <div class="field is-horizontal">
        <div class="field-label  is-small">
          <label class="label">Name</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control">
             <input class="input  is-small" type="text" placeholder="Enter junction name" name="building_name" id="Name_input">
            </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label  is-small">
          <label class="label">Nearby services</label>
        </div>
        <div class="field-body">
         <div class="field">
           <div class="control">
             <textarea class="textarea  is-small" placeholder="Services near the selected junction" rows="3"></textarea>
           </div>
         </div>
        </div>
      </div>
      <div class="field is-horizontal">
            <div class="field-label  is-small">
              <label class="label">Description</label>
            </div>
            <div class="field-body">
             <div class="field">
               <div class="control">
                 <textarea class="textarea  is-small" placeholder="Description" rows="3"></textarea>
               </div>
             </div>
            </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label  is-small">
              <label class="label">Audio landmark</label>
            </div>
            <div class="field-body">
             <div class="file has-name is-fullwidth is-dark is-outlined is-small">
               <label class="file-label">
                 <input class="file-input" type="file" name="resume">
                 <span class="file-cta">
                   <span class="file-icon">
                     <i class="fas fa-upload"></i>
                   </span>
                   <span class="file-label">
                     Choose a file…
                   </span>
                 </span>
                 <span class="file-name is-dark"></span>
               </label>
             </div>
            </div>
            <div class="level-item">
             <a class="button is-warning  is-small">Clear</a>
            </div>
           </div>

           <div class="field is-horizontal">
             <div class="field-label  is-small">
               <label class="label">Graphical image</label>
             </div>
             <div class="field-body">
              <div class="file has-name is-fullwidth is-small is-dark is-outlined">
                <label class="file-label">
                  <input class="file-input" type="file" name="resume">
                  <span class="file-cta">
                    <span class="file-icon">
                      <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                      Choose a file…
                    </span>
                  </span>
                  <span class="file-name is-primary"></span>
                </label>
              </div>
             </div>
             <div class="level-item">
              <a class="button is-warning  is-small">Clear</a>
             </div>
            </div>
       <div class="level-item">
        <div class="field" style="width: 100%;">
          <p class="control" style="margin-top:0.5rem;">
           <strong><input id="button" type="submit" value="Upload" name="submit_image" class="button is-success is-fullwidth"/></strong>
          </p>
        </div>
       </div>
       <div class="level-item">
        <div class="field">
          <p class="control" style="margin-top: 1rem;">
           <button id="but-cancel" class="button is-warning is-small is-outlined">Cancel</button>
          </p>
        </div>
       </div>

      </form>
     </div>
    </div>
   </div>
  </div>

 </body>
</html>
