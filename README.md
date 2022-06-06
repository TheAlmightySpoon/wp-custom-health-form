# wp-custom-health-form
 Wessex Cancer Alliance BMI Form

The from can be added to ANY page via the admin editor by inserting the shortcode <strong>[wpvueform]</strong> into the content input field

In order to update the pdf links you'll need to follow the steps oulined below:
<ul>
 <li>Download the wp-custom-health-form repository</li>
 <li>Locate the file named App.vue</li>
 <li>Open the file in your editor or IDE of choice (An IDE is recommended as you'll be required to run a build command and this will bedependent on npm being installed)</li>
 <li>On line 133 you will see a JSON object with the "How you'be been feeling" symptoms. This is where you add any new symptoms (Keep note of the position in the object where you add any new opations as this correlates to the links object below)</li>
 <li>On line 147 you will see a JSON object with the corresponding links to the symptoms defined in the object on line 133.  This is where you add/update the links to the relevant PDFs</li>
 <li>Once you've made the required changes, open a terminal window, navigate to the root directory of the wp-custom-health-form repository on your local machine then run <code>npm run build</code></li>
 <li>Once the build preocess has finished you should see an output similar to this: 
  <code>
  <table>
   <thead>
    <tr>
     <th>File</th><th>Size</th><th>Gzipped</th>
    </tr>
   </thead>
   <tbody>
    <tr>
     <td>dist\js\chunk-vendors.da9b823c.js</td><td>231.07 KiB</td><td>73.45 KiB</td>
    </tr>
    <tr>
     <td>dist\js\app.296d13d6.js</td><td>29.22 KiB</td><td>7.32 KiB</td>
    </tr>
    <tr>
     <td>dist\css\chunk-vendors.0467b896.css</td><td>365.45 KiB</td><td>43.76 KiB</td>
    </tr>
    <tr>
     <td>dist\css\app.97c7393e.css</td><td>2.20 KiB</td><td>0.70 KiB</td>
    </tr>
   </tbody>
  </code>
  <code>Images and other types of assets omitted.</code><br />
  <code>Build at: 2022-06-06T08:30:31.522Z - Hash: 93a97f77ae1a66f3 - Time: 30594ms</code></li>
 <li>Locate the wp-vue-weight-form.php file in your local copy of the wp-custom-health-form repository and update line 9 <code>wp_register_script('wpvue_vuejs', plugin_dir_url( __FILE__ ).'dist/js/app.296d13d6.js', true);</code> to match the output of the build process <code>dist\js\app.296d13d6.js</code></li>
 <li>Once the above steps have been completed, all that's left is to open an FTP client of your choice, navigate to <code>/wessexcanceralliance.nhs.uk/html/wp-content/plugins/wp-vue-weight-form</code> then copy wp-vue-weight-form.php and the /dist folder from your local machine.</li>
</ul>
