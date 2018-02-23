<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Information about differencies between two dates</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link rel="stylesheet" href="/DateDifferencies/css/styles.css" />

<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 -->

<script src="/DateDifferencies/js/jquery-3.2.1.min.js" /></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

</head>
<body>
	<div class="container">
			<div class="row">
				<div class="col s11">

					<form method="post" action="/DateDifferencies/php/processDates.php">
						<!-- input class="form-control" name="date" /> -->
						<label for="firstDate">Choose from here first date</label>
						<input type="text" name="firstDate" class="datepicker" /><br />

						<label for="secondDate">Choose from here second date</label>
						<input type="text" name="secondDate" class="datepicker" />

						<button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
					</form>	

				</div>	
			</div>	

			
	 	
 	</div>

 	<!-- <script src="/DateDifferencies/js/datepicker.js"></script>
    <script>
        var input = document.querySelector('input[name="date"]');
        var picker = datepicker(input);

    </script> -->

    <script type="text/javascript">
    	$('.datepicker').pickadate({
		    selectMonths: true, // Creates a dropdown to control month
		    selectYears: 15, // Creates a dropdown of 15 years to control year,
		    today: 'Today',
		    clear: 'Clear',
		    close: 'Ok',
		    closeOnSelect: false // Close upon selecting a date,
	  });
    </script>

</body>
</html>

