<?
include("../_inc/db_connect.php");

$dir = "../";
//$page = "visit";
//$curDate = date('Y-m-d');
//$noSurvey = 1;

$topLevel = "../";
?>

<!DOCTYPE html>
<html>
<head>

<title>Survey</title>

<? include($dir."_inc/common-header.php"); ?>

</head>

<body ontouchstart="">
    <div id="survey">
        <? $pageTitle= "Feedback"; include "../_inc/header.php"; ?>
	
	<section>
	<h1>Let us know what you think of our <em>TAP into CMA</em>!</h1>
    
    <form id="survey-form" action="thanks.php" method="post" data-ajax="false">
        
        <div>
        <label for="satisfied">How satisfied are you with our multimedia tour?
        <span>1 = dissatisfied | 5 = satisfied</span>
        </label>
        <input class="slider" type="range" name="satisfaction" id="satisfaction" value="3" min="1" max="5" step="0" />
        <p id="sat-value">Your rating: <span></span></p>
        </div>
        
        <div>
        <label for="notSatisfied">If not satisfied, please explain why:</label>
                <textarea cols="40" rows="8" name="notSatisfied" id="notSatisfied"></textarea>
        </div>
        
        <div>
        <label for="additions">What additional info would you like added to our multimedia tours?
        </label>
            <textarea cols="40" rows="8" name="additions" id="additions"></textarea>
        </div>
        
        <div>
        <label for="comments">Additional comments:
        </label>
            <textarea cols="40" rows="8" name="comments" id="comments"></textarea>
        </div>
            
        <div>
        <label for="age">What's your age?</label>
        <input type="text" name="age" id="age" value="" width="25%" />
        </div>
        
        <input type="submit" value="Submit" id="submit">
    
    </form>
    
    </section>
    </div>    

    <? 

        $level= "../"; 
        include '../_inc/footer.php'; ?>  
    <script>
$(function(){
    
    $("#submit").click(function(){
        setTimeout(function(){$(this).attr('disabled', 'true');}, 1000);
    });
    $("#satisfaction").change(function(){
        $("#sat-value span").html($(this).val());
        console.log($(this).val());
    });
    $("#satisfaction").change();

});
</script>  

</body>


</html>