<?php
   session_start();
   
   if (isset($_SESSION['id'])) {
      include 'php/connection.php';
   }else{
   	header("location: index.php");
   }
   ?>
<html>
   <head>
      <title>Upload Product</title>
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <script type="text/javascript" src='js/jquery.js'></script>
      <script type="text/javascript" src='js/main.js'></script>
   </head>
   <body>
      <?php include 'comp/page_header.php';?>
      <?php include 'comp/bar_menu.php';?>
      <div id="post_product_result_container">
      </div>
      <!--post_product_result_container-->
      <div id='sell_product_general_container'>
         <div id='sell_product_container_interior'>
            <hr id='hr_upload_item'>
            <a id='select_images_title'>Sell A Product</a><br>
            <form id='upload_product_form' >
               <input type='text' name='item_name' placeholder='Name Of Your Product' class='upload_item_inputs'>
               <select name='item_categorie' class='upload_item_inputs_select'>
                  <option>Electronics</option>
                  <option>Books</option>
                  <option>Cell Phones</option>
                  <option>Clothing</option>
                  <option>Computers</option>
                  <option>Videogames</option>
                  <option>Consoles</option>
                  <option>Furniture</option>
                  <option>Sports</option>
                  <option>Cameras</option>
                  <option>Musical Instruments</option>
               </select>
               <!--Select the categorie of the product-->
               <input type='text' name='item_phone_number' placeholder='phone Number' class='upload_item_inputs'>
               <select name='item_status' class='upload_item_inputs_select'>
                  <option>New</option>
                  <option>Used</option>
                  <option>Broken</option>
               </select>
               <select name='item_country' class='upload_item_inputs_select'>
                  <option>Afghanistan</option>
                  <option>Albania</option>
                  <option>Algeria</option>
                  <option>American Samoa</option>
                  <option>Andorra</option>
                  <option>Angola</option>
                  <option>Anguilla</option>
                  <option>Antarctica</option>
                  <option>Antigua and Barbuda</option>
                  <option>Argentina</option>
                  <option>Armenia</option>
                  <option>Aruba</option>
                  <option>Australia</option>
                  <option>Austria</option>
                  <option>Azerbaijan</option>
                  <option>Bahamas</option>
                  <option>Bahrain</option>
                  <option>Bangladesh</option>
                  <option>Barbados</option>
                  <option>Belarus</option>
                  <option>Belgium</option>
                  <option>Belize</option>
                  <option>Benin</option>
                  <option>Bermuda</option>
                  <option>Bhutan</option>
                  <option>Bolivia</option>
                  <option>Bosnia and Herzegovina</option>
                  <option>Botswana</option>
                  <option>Bouvet Island</option>
                  <option>Brazil</option>
                  <option>British Indian Ocean Territory</option>
                  <option>Brunei Darussalam</option>
                  <option>Bulgaria</option>
                  <option>Burkina Faso</option>
                  <option>Burundi</option>
                  <option>Cambodia</option>
                  <option>Cameroon</option>
                  <option>Canada</option>
                  <option>Cape Verde</option>
                  <option>Cayman Islands</option>
                  <option>Central African Republic</option>
                  <option>Chad</option>
                  <option>Chile</option>
                  <option>China</option>
                  <option>Christmas Island</option>
                  <option>Cocos Islands</option>
                  <option>Colombia</option>
                  <option>Comoros</option>
                  <option>Congo</option>
                  <option>Congo, Democratic Republic of the</option>
                  <option>Cook Islands</option>
                  <option>Costa Rica</option>
                  <option>Cote d'Ivoire</option>
                  <option>Croatia</option>
                  <option>Cuba</option>
                  <option>Cyprus</option>
                  <option>Czech Republic</option>
                  <option>Denmark</option>
                  <option>Djibouti</option>
                  <option>Dominica</option>
                  <option>Dominican Republic</option>
                  <option>Ecuador</option>
                  <option>Egypt</option>
                  <option>El Salvador</option>
                  <option>Equatorial Guinea</option>
                  <option>Eritrea</option>
                  <option>Estonia</option>
                  <option>Ethiopia</option>
                  <option>Falkland Islands</option>
                  <option>Faroe Islands</option>
                  <option>Fiji</option>
                  <option>Finland</option>
                  <option>France</option>
                  <option>French Guiana</option>
                  <option>French Polynesia</option>
                  <option>Gabon</option>
                  <option>Gambia</option>
                  <option>Georgia</option>
                  <option>Germany</option>
                  <option>Ghana</option>
                  <option>Gibraltar</option>
                  <option>Greece</option>
                  <option>Greenland</option>
                  <option>Grenada</option>
                  <option>Guadeloupe</option>
                  <option>Guam</option>
                  <option>Guatemala</option>
                  <option>Guinea</option>
                  <option>Guinea-Bissau</option>
                  <option>Guyana</option>
                  <option>Haiti</option>
                  <option>Heard Island and McDonald Islands</option>
                  <option>Honduras</option>
                  <option>Hong Kong</option>
                  <option>Hungary</option>
                  <option>Iceland</option>
                  <option>India</option>
                  <option>Indonesia</option>
                  <option>Iran</option>
                  <option>Iraq</option>
                  <option>Ireland</option>
                  <option>Israel</option>
                  <option>Italy</option>
                  <option>Jamaica</option>
                  <option>Japan</option>
                  <option>Jordan</option>
                  <option>Kazakhstan</option>
                  <option>Kenya</option>
                  <option>Kiribati</option>
                  <option>Kuwait</option>
                  <option>Kyrgyzstan</option>
                  <option>Laos</option>
                  <option>Latvia</option>
                  <option>Lebanon</option>
                  <option>Lesotho</option>
                  <option>Liberia</option>
                  <option>Libya</option>
                  <option>Liechtenstein</option>
                  <option>Lithuania</option>
                  <option>Luxembourg</option>
                  <option>Macao</option>
                  <option>Madagascar</option>
                  <option>Malawi</option>
                  <option>Malaysia</option>
                  <option>Maldives</option>
                  <option>Mali</option>
                  <option>Malta</option>
                  <option>Marshall Islands</option>
                  <option>Martinique</option>
                  <option>Mauritania</option>
                  <option>Mauritius</option>
                  <option>Mayotte</option>
                  <option>Mexico</option>
                  <option>Micronesia</option>
                  <option>Moldova</option>
                  <option>Monaco</option>
                  <option>Mongolia</option>
                  <option>Montenegro</option>
                  <option>Montserrat</option>
                  <option>Morocco</option>
                  <option>Mozambique</option>
                  <option>Myanmar</option>
                  <option>Namibia</option>
                  <option>Nauru</option>
                  <option>Nepal</option>
                  <option>Netherlands</option>
                  <option>Netherlands Antilles</option>
                  <option>New Caledonia</option>
                  <option>New Zealand</option>
                  <option>Nicaragua</option>
                  <option>Niger</option>
                  <option>Nigeria</option>
                  <option>Norfolk Island</option>
                  <option>North Korea</option>
                  <option>Norway</option>
                  <option>Oman</option>
                  <option>Pakistan</option>
                  <option>Palau</option>
                  <option>Palestinian Territory</option>
                  <option>Panama</option>
                  <option>Papua New Guinea</option>
                  <option>Paraguay</option>
                  <option>Peru</option>
                  <option>Philippines</option>
                  <option>Pitcairn</option>
                  <option>Poland</option>
                  <option>Portugal</option>
                  <option>Puerto Rico</option>
                  <option>Qatar</option>
                  <option>Romania</option>
                  <option>Russian Federation</option>
                  <option>Rwanda</option>
                  <option>Saint Helena</option>
                  <option>Saint Kitts and Nevis</option>
                  <option>Saint Lucia</option>
                  <option>Saint Pierre and Miquelon</option>
                  <option>Saint Vincent and the Grenadines</option>
                  <option>Samoa</option>
                  <option>San Marino</option>
                  <option>Sao Tome and Principe</option>
                  <option>Saudi Arabia</option>
                  <option>Senegal</option>
                  <option>Serbia</option>
                  <option>Seychelles</option>
                  <option>Sierra Leone</option>
                  <option>Singapore</option>
                  <option>Slovakia</option>
                  <option>Slovenia</option>
                  <option>Solomon Islands</option>
                  <option>Somalia</option>
                  <option>South Africa</option>
                  <option>South Georgia</option>
                  <option>South Korea</option>
                  <option>Spain</option>
                  <option>Sri Lanka</option>
                  <option>Sudan</option>
                  <option>Suriname</option>
                  <option>Svalbard and Jan Mayen</option>
                  <option>Swaziland</option>
                  <option>Sweden</option>
                  <option>Switzerland</option>
                  <option>Syrian Arab Republic</option>
                  <option>Taiwan</option>
                  <option>Tajikistan</option>
                  <option>Tanzania</option>
                  <option>Thailand</option>
                  <option>The Former Yugoslav Republic of Macedonia</option>
                  <option>Timor-Leste</option>
                  <option>Togo</option>
                  <option>Tokelau</option>
                  <option>Tonga</option>
                  <option>Trinidad and Tobago</option>
                  <option>Tunisia</option>
                  <option>Turkey</option>
                  <option>Turkmenistan</option>
                  <option>Tuvalu</option>
                  <option>Uganda</option>
                  <option>Ukraine</option>
                  <option>United Arab Emirates</option>
                  <option>United Kingdom</option>
                  <option>United States</option>
                  <option>United States Minor Outlying Islands</option>
                  <option>Uruguay</option>
                  <option>Uzbekistan</option>
                  <option>Vanuatu</option>
                  <option>Vatican City</option>
                  <option>Venezuela</option>
                  <option>Vietnam</option>
                  <option>Virgin Islands, British</option>
                  <option>Virgin Islands, U.S.</option>
                  <option>Wallis and Futuna</option>
                  <option>Western Sahara</option>
                  <option>Yemen</option>
                  <option>Zambia</option>
                  <option>Zimbabwe</option>
               </select>
               <input type='text' name='item_city' placeholder='Your City' class='upload_item_inputs'>
               <input type='text' name='item_price' placeholder='Price $ [ In Dollars]' class='upload_item_inputs'>
               <textarea name='item_description' placeholder='Description... ( Max 385 characters )'></textarea>
               <!-- SELECT IMAGES TO POST TITLE --><br><br>
               <hr id='hr_upload_item'>
               <a id='select_images_title'> Select Images</a>
               <!-- IMAGE FILES --><br><br>
               <div class='item_image_input_container' >
                  <h5 class='select_image_h5'> <img class='camera_icon_select_image' src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMS4xLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDEwMCAxMDA7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMTZweCIgaGVpZ2h0PSIxNnB4Ij4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNNTAsNDBjLTguMjg1LDAtMTUsNi43MTgtMTUsMTVjMCw4LjI4NSw2LjcxNSwxNSwxNSwxNWM4LjI4MywwLDE1LTYuNzE1LDE1LTE1ICAgIEM2NSw0Ni43MTgsNTguMjgzLDQwLDUwLDQweiBNOTAsMjVINzhjLTEuNjUsMC0zLjQyOC0xLjI4LTMuOTQ5LTIuODQ2bC0zLjEwMi05LjMwOUM3MC40MjYsMTEuMjgsNjguNjUsMTAsNjcsMTBIMzMgICAgYy0xLjY1LDAtMy40MjgsMS4yOC0zLjk0OSwyLjg0NmwtMy4xMDIsOS4zMDlDMjUuNDI2LDIzLjcyLDIzLjY1LDI1LDIyLDI1SDEwQzQuNSwyNSwwLDI5LjUsMCwzNXY0NWMwLDUuNSw0LjUsMTAsMTAsMTBoODAgICAgYzUuNSwwLDEwLTQuNSwxMC0xMFYzNUMxMDAsMjkuNSw5NS41LDI1LDkwLDI1eiBNNTAsODBjLTEzLjgwNywwLTI1LTExLjE5My0yNS0yNWMwLTEzLjgwNiwxMS4xOTMtMjUsMjUtMjUgICAgYzEzLjgwNSwwLDI1LDExLjE5NCwyNSwyNUM3NSw2OC44MDcsNjMuODA1LDgwLDUwLDgweiBNODYuNSw0MS45OTNjLTEuOTMyLDAtMy41LTEuNTY2LTMuNS0zLjVjMC0xLjkzMiwxLjU2OC0zLjUsMy41LTMuNSAgICBjMS45MzQsMCwzLjUsMS41NjgsMy41LDMuNUM5MCw0MC40MjcsODguNDMzLDQxLjk5Myw4Ni41LDQxLjk5M3oiIGZpbGw9IiNGRkZGRkYiLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" /> Select Image.. [ Thumbnail ]</h5>
                  <input class='item_images_input' type='file' name='item_image_one' >
               </div>
               <!--item_image_input_container-->
               <div class='item_image_input_container'>
                  <h5 class='select_image_h5'><img class='camera_icon_select_image' src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMS4xLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDEwMCAxMDA7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMTZweCIgaGVpZ2h0PSIxNnB4Ij4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNNTAsNDBjLTguMjg1LDAtMTUsNi43MTgtMTUsMTVjMCw4LjI4NSw2LjcxNSwxNSwxNSwxNWM4LjI4MywwLDE1LTYuNzE1LDE1LTE1ICAgIEM2NSw0Ni43MTgsNTguMjgzLDQwLDUwLDQweiBNOTAsMjVINzhjLTEuNjUsMC0zLjQyOC0xLjI4LTMuOTQ5LTIuODQ2bC0zLjEwMi05LjMwOUM3MC40MjYsMTEuMjgsNjguNjUsMTAsNjcsMTBIMzMgICAgYy0xLjY1LDAtMy40MjgsMS4yOC0zLjk0OSwyLjg0NmwtMy4xMDIsOS4zMDlDMjUuNDI2LDIzLjcyLDIzLjY1LDI1LDIyLDI1SDEwQzQuNSwyNSwwLDI5LjUsMCwzNXY0NWMwLDUuNSw0LjUsMTAsMTAsMTBoODAgICAgYzUuNSwwLDEwLTQuNSwxMC0xMFYzNUMxMDAsMjkuNSw5NS41LDI1LDkwLDI1eiBNNTAsODBjLTEzLjgwNywwLTI1LTExLjE5My0yNS0yNWMwLTEzLjgwNiwxMS4xOTMtMjUsMjUtMjUgICAgYzEzLjgwNSwwLDI1LDExLjE5NCwyNSwyNUM3NSw2OC44MDcsNjMuODA1LDgwLDUwLDgweiBNODYuNSw0MS45OTNjLTEuOTMyLDAtMy41LTEuNTY2LTMuNS0zLjVjMC0xLjkzMiwxLjU2OC0zLjUsMy41LTMuNSAgICBjMS45MzQsMCwzLjUsMS41NjgsMy41LDMuNUM5MCw0MC40MjcsODguNDMzLDQxLjk5Myw4Ni41LDQxLjk5M3oiIGZpbGw9IiNGRkZGRkYiLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" /> Select Image..</h5>
                  <input class='item_images_input' type='file' name='item_image_two' >
               </div>
               <!--item_image_input_container-->
               <div class='item_image_input_container'>
                  <h5 class='select_image_h5'><img class='camera_icon_select_image' src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMS4xLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDEwMCAxMDA7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMTZweCIgaGVpZ2h0PSIxNnB4Ij4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNNTAsNDBjLTguMjg1LDAtMTUsNi43MTgtMTUsMTVjMCw4LjI4NSw2LjcxNSwxNSwxNSwxNWM4LjI4MywwLDE1LTYuNzE1LDE1LTE1ICAgIEM2NSw0Ni43MTgsNTguMjgzLDQwLDUwLDQweiBNOTAsMjVINzhjLTEuNjUsMC0zLjQyOC0xLjI4LTMuOTQ5LTIuODQ2bC0zLjEwMi05LjMwOUM3MC40MjYsMTEuMjgsNjguNjUsMTAsNjcsMTBIMzMgICAgYy0xLjY1LDAtMy40MjgsMS4yOC0zLjk0OSwyLjg0NmwtMy4xMDIsOS4zMDlDMjUuNDI2LDIzLjcyLDIzLjY1LDI1LDIyLDI1SDEwQzQuNSwyNSwwLDI5LjUsMCwzNXY0NWMwLDUuNSw0LjUsMTAsMTAsMTBoODAgICAgYzUuNSwwLDEwLTQuNSwxMC0xMFYzNUMxMDAsMjkuNSw5NS41LDI1LDkwLDI1eiBNNTAsODBjLTEzLjgwNywwLTI1LTExLjE5My0yNS0yNWMwLTEzLjgwNiwxMS4xOTMtMjUsMjUtMjUgICAgYzEzLjgwNSwwLDI1LDExLjE5NCwyNSwyNUM3NSw2OC44MDcsNjMuODA1LDgwLDUwLDgweiBNODYuNSw0MS45OTNjLTEuOTMyLDAtMy41LTEuNTY2LTMuNS0zLjVjMC0xLjkzMiwxLjU2OC0zLjUsMy41LTMuNSAgICBjMS45MzQsMCwzLjUsMS41NjgsMy41LDMuNUM5MCw0MC40MjcsODguNDMzLDQxLjk5Myw4Ni41LDQxLjk5M3oiIGZpbGw9IiNGRkZGRkYiLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" /> Select Image..</h5>
                  <input class='item_images_input' type='file' name='item_image_three' >
               </div>
               <!--item_image_input_container-->
               <!-- UPLOAD AN ITEM SUBMIT BUTTTON -->
               <input type='submit' name='item_upload_submit' value='Publish And Sell My Product' id='upload_item_submit'>
            </form>
         </div>
         <!--sell_product_container_interior-->
      </div>
      <!--sell_product_general_container-->
   </body>
</html>