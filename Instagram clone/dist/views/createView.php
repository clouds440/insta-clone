<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
  <div class="container mx-auto flex justify-center items-center">
    <div class="bg-gray-950 w-1/2">
      <form id="postForm" action="postHandler.php" method="post" enctype="multipart/form-data">

        <label for="postUpload" class="bg-blue-500 text-white py-2 my-5 cursor-pointer rounded-md flex justify-center">
          Select from computer
          <input type="file" id="postUpload" name="postUpload" accept="image/*" style="display: none;" onchange="handleFileChange(this)" novalidate>
        </label>

        <img id="preview" src="#" alt="">

        <div class="px-3 w-100 font-weight-bold">
          <p id="errorMessage" style="color: red;"></p>
        </div>

        <textarea id="postDescription" name="postDescription" maxlength="255" class="w-full h-24 mb-4 p-2 bg-gray-800 my-16" placeholder="Write a caption"></textarea>

        <input type="submit" value="Share" class="bg-blue-500 text-white py-2 mx-auto w-40 rounded-md flex justify-center cursor-pointer"/>

      </form>
    </div>
  </div>

  <script>
      // Post picture preview after uploading
      function handleFileChange(input) {
          var fileInput = input;
          var img = document.getElementById('preview');

          var reader = new FileReader();

          reader.onload = function(e) {
              img.src = e.target.result;
          };

          if (fileInput.files && fileInput.files[0]) {
              reader.readAsDataURL(fileInput.files[0]);
              img.style.width = "100%"
              img.style.height = "260px"
              img.style.objectFit = "cover"
              img.style.borderRadius = "15px"
              img.style.marginBottom = "10px"
              document.getElementById("errorMessage").innerHTML = ""
          }
      }
      
      var form = document.getElementById('postForm');
      form.addEventListener('submit', function(event) {
        console.log('Form submitted');
        var fileInput = document.getElementById('postUpload');
        if (!fileInput.files || fileInput.files.length === 0) {
            document.getElementById("errorMessage").innerHTML = "Please select an Image first"
            event.preventDefault();
          }
      });
  </script>
</body>
</html>