<?php
global $wp;
$current_url = file_get_contents("php://input");
$data = json_decode(stripcslashes(trim($current_url,'"')));
//$current_url .= home_url(add_query_arg(array(), $wp->request));
function catch_post(){
    var_dump($_REQUEST);
}

//add_action( 'init', 'catch_post');

$name = "Undefined name";

if(isset($_POST['name'])){
    $name = $_POST['name'];
}

$message = '<h2 class="text-center">These are your survey results</h2>';
$message .= '<h3 class="text-center">Based on the information you have entered</h3>';
$message .= '<table><tr style="background-color: #f5f7f7;"><td>';
$message .= '<h4 class="text-center padded">Your BMI is <b>'.$data->bmi.' kg/m²</b></h4>';
$message .= '</td></tr><tr><td style="background-color: #f5f7f7;">';
$message .= '<h4 class="text-center padded">Your unplanned weight loss is <b>'.$data->uwl.'%</b></h4>';
$message .= '</td></tr><tr style="background-color: #f5f7f7;"><td>';
$message .= '<h4 class="text-center padded">This suggests a <b>'.$data->must.'</b> risk of being malnourished</h4>';
$message .= '</td></tr>';
// loop links
if(is_array($data->links)) {
    $message .= "<tr><td><ul>";
    foreach($data->links as $link) {
        $message .= "<li><a href='".$link."'>".substr($link, strrpos($link, "/")+1)."</a></li>";
    }
    $message .= "</ul></td></tr>";
}
// loop mustLinks
if(is_array($data->mustLinks)) {
    $message .= "<tr><td><ul>";
    foreach($data->mustLinks as $link) {
        $message .= "<li><a href='".$link->link."'>".$link->name."</a></li>";
    }
    $message .= "</ul></td></tr>";
}
$message .= "<tr><td>If you require further advice or have any concerns please speak to your cancer nurse specialist</td></tr>";
$message .= '<tr><td bgcolor="#00A8C6" style="font-size: 0; line-height: 0; padding: 0 10px 0 10px;" height="140" align="center" class="responsive-image">
    <img src="https://wessexcanceralliance.nhs.uk/img/WCA_Email.jpg" alt="" /></td></tr>';
$message .= '</table>';

$to_email = $data->email;
$subject = 'Personalised dietary advice';
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=UTF-8';
$headers[] = 'From: Wessex Cancer Alliance <noreply@wessexcanceralliance.nhs.uk>';

if(mail($to_email, $subject, $message, implode("\r\n", $headers))) {
    echo true;
}else{
    echo false;
}

?>