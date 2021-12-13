<?php
// connecting to database
$conn = mysqli_connect("localhost", "root", "", "bot") or die("Database Error");

// getting user message through ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);
if($getMesg=="appointment" || $getMesg=="Appointment" )
{
		//checking user query to database query
	$check_data = "SELECT * FROM tbl_doctime WHERE id = 1";
	$run_query = mysqli_query($conn, $check_data) or die("Error");

	// if user query matched to database query we'll show the reply otherwise it go to else statement
	if(mysqli_num_rows($run_query) > 0){
	    //fetching replay from the database according to the user query
	    $fetch_data = mysqli_fetch_assoc($run_query);
	    //storing replay to a varible which we'll send to ajax

        $check_data2 = "SELECT * FROM tbl_doctime WHERE id = 1";
	    $run_query = mysqli_query($conn, $check_data2) or die("Error");

        if(mysqli_num_rows($run_query) == 1)
        {
            $id = $fetch_data['id'];
            $date = $fetch_data['date_time'];
            $name = $fetch_data['docname'];
            $result = "Your Token number is: $id <br>
            Your Doctor's name is: $name <br> 
            He will be available at: $date";
            echo $result;
        }
        else
        {
            echo '...';
        }
	}
	else
	{
	echo "
	Invalid option<br> Please choose any of the options below: <br>
	<button id = 'loc'> Location </button>
	<button id='oh'> Opening Hour</button>
	<button id='appointment'> Appointment </button>
	";
	}
}
else
{
	//checking user query to database query
	$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
	$run_query = mysqli_query($conn, $check_data) or die("Error");

	// if user query matched to database query we'll show the reply otherwise it go to else statement
	if(mysqli_num_rows($run_query) > 0){
	    //fetching replay from the database according to the user query
	    $fetch_data = mysqli_fetch_assoc($run_query);
	    //storing replay to a varible which we'll send to ajax
	    $replay = $fetch_data['replies'];
	    echo $replay;
	}
	else
	{
		echo "
		Invalid option<br> Please choose any of the options below: <br>
		<button id='loc'> Location </button>
		<button id='oh'> Opening Hour</button>
		<button id='appointment'> Appointment </button>
		";
	}
}
?>
<!-- Ajax for invalid option -->
 <script>
        $(document).ready(function(){
            $("#appointment").click(function(){
                    $value = 'I want to book an appointment';
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: './core/message.php',
                    type: 'POST',
                    data: 'text=appointment',
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-robot"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
            $("#oh").click(function(){
                    $value = 'Can I know your Opening Hour?';
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: './core/message.php',
                    type: 'POST',
                    data: 'text=opening',
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-robot"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
            $("#loc").click(function(){
                    $value ='Can I know where the clinic is located at?';
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: './core/message.php',
                    type: 'POST',
                    data: 'text=location',
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-robot"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
</script>